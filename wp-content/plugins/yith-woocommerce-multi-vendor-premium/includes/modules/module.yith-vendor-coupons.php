<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct access forbidden.' );
}

/**
 *
 *
 * @class      YITH_Vendor_Coupons
 * @package    Yithemes
 * @since      Version 2.0.0
 * @author     Your Inspiration Themes
 *
 */
if ( ! class_exists( 'YITH_Vendor_Coupons' ) ) {

    /**
     * YITH_Meta_Box_Coupon_Data Class
     */
    class YITH_Vendor_Coupons extends WC_Meta_Box_Coupon_Data {

        /**
         * Main instance
         */
        private static $_instance = null;

        public function __construct(){
            /* Coupon Management */
            add_filter( 'woocommerce_coupon_discount_types', array( $this, 'coupon_discount_types' ) );
            add_action( 'add_meta_boxes', array( $this, 'add_vendor_coupon_meta_boxes' ), 35 );

            /* Filter coupon list */
            add_action( 'request', array( $this, 'filter_coupon_list' ) );
            add_filter( 'wp_count_posts', array( $this, 'vendor_count_coupons' ), 10, 3 );

        }

        /**
         * Main plugin Instance
         *
         * @static
         * @return YITH_Commissions Main instance
         *
         * @since  1.0
         * @author Andrea Grillo <andrea.grillo@yithemes.com>
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        /**
         * Vendor Coupon Management
         *
         * @Author Andrea Grillo <andrea.grillo@yithemes.com>
         * @since 1.2
         * @internal param \The $coupon_types coupon types
         * @return array The new coupon types list
         */
        public function add_vendor_coupon_meta_boxes(){
            $vendor = yith_get_vendor( 'current', 'user' );

            if( $vendor->is_valid() && $vendor->has_limited_access() ){
                remove_meta_box( 'woocommerce-coupon-data', 'shop_coupon', 'normal' );
                add_meta_box( 'woocommerce-coupon-data', __( 'Coupon Data', 'yith_wc_product_vendors' ), 'YITH_Vendor_Coupons::output', 'shop_coupon', 'normal', 'high' );
            }
        }

        /**
         * Manage vendor taxonomy bulk actions
         *
         * @Author Andrea Grillo <andrea.grillo@yithemes.com>
         * @since 1.2
         * @param $coupon_types The coupon types
         * @return array The new coupon types list
         */
        public function coupon_discount_types( $coupon_types ){
            $vendor = yith_get_vendor( 'current', 'user' );

            if( $vendor->is_valid() && $vendor->has_limited_access() ){
                $to_unset = apply_filters( 'yith_wc_multi_vendor_coupon_types', array( 'fixed_cart', 'percent' ) );
                foreach( $to_unset as $coupon_type_id ){
                    unset( $coupon_types[ $coupon_type_id ] );
                }
            }

            return $coupon_types;
        }

        /**
         * Only show vendor's coupon
         *
         * @author Andrea Grillo <andrea.grillo@yithemes.com>
         *
         * @param  arr $request Current request
         *
         * @return arr          Modified request
         * @since  1.0
         */
        public function filter_coupon_list( $request ) {
            global $typenow;

            $vendor = yith_get_vendor( 'current', 'user' );

            if ( is_admin() && $vendor->is_valid() && $vendor->has_limited_access() && 'shop_coupon' == $typenow ) {
                $request[ 'author__in' ] = $vendor->admins;
            }

            return $request;
        }

        /**
         * Filter the post count for vendor
         *
         * @author   Andrea Grillo <andrea.grillo@yithemes.com>
         *
         * @param $counts   The post count
         * @param $type     Post type
         * @param $perm     The read permission
         *
         * @return arr  Modified request
         * @since    1.3
         * @use wp_post_count action
         */
        public function vendor_count_coupons( $counts, $type, $perm ) {
            $vendor = yith_get_vendor( 'current', 'user' );

            if ( $vendor->is_valid() && $vendor->has_limited_access() && 'shop_coupon' == $type ) {
                $args = array(
                    'post_type'     => $type,
                    'author__in'    => $vendor->get_admins()
                );

                /**
                 * Get a list of post statuses.
                 */
                $stati = get_post_stati();

                // Update count object
                foreach ( $stati as $status ) {
                    $args['post_status'] = $status;
                    $posts               = get_posts( $args );
                    $counts->$status     = count( $posts );
                }
            }

            return $counts;
        }

        /**
         * Output the metabox
         */
        public static function output( $post ) {
            wp_nonce_field( 'woocommerce_save_data', 'woocommerce_meta_nonce' );
            ?>
            <style type="text/css">
                #edit-slug-box, #minor-publishing-actions { display:none }
            </style>
            <div id="coupon_options" class="panel-wrap coupon_data">

                <div class="wc-tabs-back"></div>

                <ul class="coupon_data_tabs wc-tabs" style="display:none;">
                    <?php
                    $coupon_data_tabs = apply_filters( 'woocommerce_coupon_data_tabs', array(
                        'general' => array(
                            'label'  => __( 'General', 'yith_wc_product_vendors' ),
                            'target' => 'general_coupon_data',
                            'class'  => 'general_coupon_data',
                        ),
                        'usage_restriction' => array(
                            'label'  => __( 'Usage Restriction', 'yith_wc_product_vendors' ),
                            'target' => 'usage_restriction_coupon_data',
                            'class'  => '',
                        ),
                        'usage_limit' => array(
                            'label'  => __( 'Usage Limits', 'yith_wc_product_vendors' ),
                            'target' => 'usage_limit_coupon_data',
                            'class'  => '',
                        )
                    ) );

                    foreach ( $coupon_data_tabs as $key => $tab ) {
                        ?><li class="<?php echo $key; ?>_options <?php echo $key; ?>_tab <?php echo implode( ' ' , (array) $tab['class'] ); ?>">
                        <a href="#<?php echo $tab['target']; ?>"><?php echo esc_html( $tab['label'] ); ?></a>
                        </li><?php
                    }
                    ?>
                </ul>
                <div id="general_coupon_data" class="panel woocommerce_options_panel"><?php

                    // Type
                    woocommerce_wp_select( array( 'id' => 'discount_type', 'label' => __( 'Discount type', 'yith_wc_product_vendors' ), 'options' => wc_get_coupon_types() ) );

                    // Amount
                    woocommerce_wp_text_input( array( 'id' => 'coupon_amount', 'label' => __( 'Coupon amount', 'yith_wc_product_vendors' ), 'placeholder' => wc_format_localized_price( 0 ), 'description' => __( 'Value of the coupon.', 'yith_wc_product_vendors' ), 'data_type' => 'price', 'desc_tip' => true ) );

                    // Expiry date
                    woocommerce_wp_text_input( array( 'id' => 'expiry_date', 'label' => __( 'Coupon expiry date', 'yith_wc_product_vendors' ), 'placeholder' => _x( 'YYYY-MM-DD', 'placeholder', 'yith_wc_product_vendors' ), 'description' => '', 'class' => 'date-picker', 'custom_attributes' => array( 'pattern' => "[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" ) ) );

                    do_action( 'woocommerce_coupon_options' );

                    ?></div>
                <div id="usage_restriction_coupon_data" class="panel woocommerce_options_panel"><?php

                    echo '<div class="options_group">';

                    // minimum spend
                    woocommerce_wp_text_input( array( 'id' => 'minimum_amount', 'label' => __( 'Minimum spend', 'yith_wc_product_vendors' ), 'placeholder' => __( 'No minimum', 'yith_wc_product_vendors' ), 'description' => __( 'This field allows you to set the minimum subtotal needed to use the coupon.', 'yith_wc_product_vendors' ), 'data_type' => 'price', 'desc_tip' => true ) );

                    // maximum spend
                    woocommerce_wp_text_input( array( 'id' => 'maximum_amount', 'label' => __( 'Maximum spend', 'yith_wc_product_vendors' ), 'placeholder' => __( 'No maximum', 'yith_wc_product_vendors' ), 'description' => __( 'This field allows you to set the maximum subtotal allowed when using the coupon.', 'yith_wc_product_vendors' ), 'data_type' => 'price', 'desc_tip' => true ) );

                    // Individual use
                    woocommerce_wp_checkbox( array( 'id' => 'individual_use', 'label' => __( 'Individual use only', 'yith_wc_product_vendors' ), 'description' => __( 'Check this box if the coupon cannot be used in conjunction with other coupons.', 'yith_wc_product_vendors' ) ) );

                    // Exclude Sale Products
                    woocommerce_wp_checkbox( array( 'id' => 'exclude_sale_items', 'label' => __( 'Exclude sale items', 'yith_wc_product_vendors' ), 'description' => __( 'Check this box if the coupon should not apply to items on sale. Per-item coupons will only work if the item is not on sale. Per-cart coupons will only work if there are no sale items in the cart.', 'yith_wc_product_vendors' ) ) );

                    echo '</div><div class="options_group">';

                    // Product ids
                    ?>
                    <p class="form-field"><label><?php _e( 'Products', 'yith_wc_product_vendors' ); ?></label>
                        <input type="hidden" class="wc-product-search" data-multiple="true" style="width: 50%;" name="product_ids" data-placeholder="<?php _e( 'Search for a product&hellip;', 'yith_wc_product_vendors' ); ?>" data-action="woocommerce_json_search_products_and_variations" data-selected="<?php
                        $product_ids = array_filter( array_map( 'absint', explode( ',', get_post_meta( $post->ID, 'product_ids', true ) ) ) );
                        $json_ids    = array();

                        foreach ( $product_ids as $product_id ) {
                            $product = wc_get_product( $product_id );
                            if ( is_object( $product ) ) {
                                $json_ids[ $product_id ] = wp_kses_post( $product->get_formatted_name() );
                            }
                        }

                        echo esc_attr( json_encode( $json_ids ) );
                        ?>" value="<?php echo implode( ',', array_keys( $json_ids ) ); ?>" /> <img class="help_tip" data-tip='<?php _e( 'Select products that must have been added to cart to use this coupon.', 'yith_wc_product_vendors' ); ?>' src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" /></p>
                    <?php

                    // Exclude Product ids
                    ?>
                    <p class="form-field"><label><?php _e( 'Exclude products', 'yith_wc_product_vendors' ); ?></label>
                        <input type="hidden" class="wc-product-search" data-multiple="true" style="width: 50%;" name="exclude_product_ids" data-placeholder="<?php _e( 'Search for a product&hellip;', 'yith_wc_product_vendors' ); ?>" data-action="woocommerce_json_search_products_and_variations" data-selected="<?php
                        $product_ids = array_filter( array_map( 'absint', explode( ',', get_post_meta( $post->ID, 'exclude_product_ids', true ) ) ) );
                        $json_ids    = array();

                        foreach ( $product_ids as $product_id ) {
                            $product = wc_get_product( $product_id );
                            if ( is_object( $product ) ) {
                                $json_ids[ $product_id ] = wp_kses_post( $product->get_formatted_name() );
                            }
                        }

                        echo esc_attr( json_encode( $json_ids ) );
                        ?>" value="<?php echo implode( ',', array_keys( $json_ids ) ); ?>" /> <img class="help_tip" data-tip='<?php _e( 'Select products that must have been added to cart to use this coupon.', 'yith_wc_product_vendors' ); ?>' src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" /></p>
                    <?php

                    echo '</div><div class="options_group">';

                    // Customers
                    woocommerce_wp_text_input( array( 'id' => 'customer_email', 'label' => __( 'Email restrictions', 'yith_wc_product_vendors' ), 'placeholder' => __( 'No restrictions', 'yith_wc_product_vendors' ), 'description' => __( 'List of allowed emails to check against the customer\'s billing email when an order is placed. Separate email addresses with commas.', 'yith_wc_product_vendors' ), 'value' => implode(', ', (array) get_post_meta( $post->ID, 'customer_email', true ) ), 'desc_tip' => true, 'type' => 'email', 'class' => '', 'custom_attributes' => array(
                        'multiple' 	=> 'multiple'
                    ) ) );

                    echo '</div>';

                    do_action( 'woocommerce_coupon_options_usage_restriction' );

                    ?></div>
                <div id="usage_limit_coupon_data" class="panel woocommerce_options_panel"><?php

                    echo '<div class="options_group">';

                    // Usage limit per coupons
                    woocommerce_wp_text_input( array( 'id' => 'usage_limit', 'label' => __( 'Usage limit per coupon', 'yith_wc_product_vendors' ), 'placeholder' => _x('Unlimited usage', 'placeholder', 'yith_wc_product_vendors'), 'description' => __( 'How many times this coupon can be used before it is void.', 'yith_wc_product_vendors' ), 'type' => 'number', 'desc_tip' => true, 'class' => 'short', 'custom_attributes' => array(
                        'step' 	=> '1',
                        'min'	=> '0'
                    ) ) );

                    // Usage limit per product
                    woocommerce_wp_text_input( array( 'id' => 'limit_usage_to_x_items', 'label' => __( 'Limit usage to X items', 'yith_wc_product_vendors' ), 'placeholder' => _x( 'Apply to all qualifying items in cart', 'placeholder', 'yith_wc_product_vendors' ), 'description' => __( 'The maximum number of individual items this coupon can apply to when using product discounts. Leave blank to apply to all qualifying items in cart.', 'yith_wc_product_vendors' ), 'desc_tip' => true, 'class' => 'short', 'type' => 'number', 'custom_attributes' => array(
                        'step' 	=> '1',
                        'min'	=> '0'
                    ) ) );

                    // Usage limit per users
                    woocommerce_wp_text_input( array( 'id' => 'usage_limit_per_user', 'label' => __( 'Usage limit per user', 'yith_wc_product_vendors' ), 'placeholder' => _x( 'Unlimited usage', 'placeholder', 'yith_wc_product_vendors' ), 'description' => __( 'How many times this coupon can be used by an invidual user. Uses billing email for guests, and user ID for logged in users.', 'yith_wc_product_vendors' ), 'desc_tip' => true, 'class' => 'short', 'type' => 'number', 'custom_attributes' => array(
                        'step' 	=> '1',
                        'min'	=> '0'
                    ) ) );

                    echo '</div>';

                    do_action( 'woocommerce_coupon_options_usage_limit' );

                    ?></div>
                <?php do_action( 'woocommerce_coupon_data_panels' ); ?>
                <div class="clear"></div>
            </div>
        <?php
        }
    }
}

/**
 * Main instance of plugin
 *
 * @return YITH_Commissions
 * @since  1.0
 * @author Andrea Grillo <andrea.grillo@yithemes.com>
 */
if ( ! function_exists( 'YITH_Vendor_Coupons' ) ) {
    function YITH_Vendor_Coupons() {
        return YITH_Vendor_Coupons::instance();
    }
}

YITH_Vendor_Coupons();
