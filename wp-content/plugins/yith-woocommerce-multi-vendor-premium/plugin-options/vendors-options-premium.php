<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
return array(

    'vendors' => array(
        'vendors_product_amount_start'      => array(
            'type' => 'sectionstart',
        ),

        'vendors_product_amount_limit'      => array(
            'title'   => __( 'Enable product amount limit', 'yith_wc_product_vendors' ),
            'desc'    => __( 'Limit product amount for each vendor', 'yith_wc_product_vendors' ),
            'id'      => 'yith_wpv_enable_product_amount',
            'default' => 'no',
            'type'    => 'checkbox',
        ),

        'vendors_product_amount'            => array(
            'title'             => __( 'Product amount limit', 'yith_wc_product_vendors' ),
            'type'              => 'number',
            'default'           => 25,
            'desc'              => __( 'Set a maximum number of products that each vendor can publish', 'yith_wc_product_vendors' ),
            'id'                => 'yith_wpv_vendors_product_limit',
            'css'               => 'width:65px;',
            'custom_attributes' => array(
                'min'  => 1,
                'step' => 1
            )
        ),

        'vendors_product_listing'           => array(
            'title'    => __( 'Product listings', 'yith_wc_product_vendors' ),
            'desc'     => __( 'Hide vendor products from store loop page', 'yith_wc_product_vendors' ),
            'id'       => 'yith_wpv_hide_vendor_products',
            'default'  => 'no',
            'desc_tip' => __( 'Hide products belonging to vendors from store loop page - this means that vendor products will only be visible on the individual vendor pages.', 'yith_wc_product_vendors' ),
            'type'     => 'checkbox',
        ),

        'vendors_skip_reviews'              => array(
            'title'   => __( 'Skip admin review', 'yith_wc_product_vendors' ),
            'type'    => 'checkbox',
            'desc'    => __( 'If you enable this option any vendor could publish products without super admin authorization. This is the default option for any new vendor It is possible to override these settings for each vendor. ', 'yith_wc_product_vendors' ),
            'id'      => 'yith_wpv_vendors_option_skip_review',
            'default' => 'no'
        ),

        'vendors_force_review'              => array(
            'title'   => __( 'Force "Skip reviews" option for all vendors', 'yith_wc_product_vendors' ),
            'type'    => 'button',
            'name'    => __( 'Force option', 'yith_wc_product_vendors' ),
            'desc'    => __( 'Force "Skip admin review" options for all vendors.', 'yith_wc_product_vendors' ),
            'id'      => 'yith_wpv_vendors_skip_review_for_all',
            'default' => 'no'
        ),

        'vendors_yit_shortcodes_management' => function_exists( 'YIT_Shortcodes' ) ? array(
            'title'   => __( 'Enable YIT Shortcodes Button', 'yith_wc_product_vendors' ),
            'type'    => 'checkbox',
            'desc'    => __( 'If you enable this option, each vendor will be able to use YIT Shortcodes in Add/Edit Product page.', 'yith_wc_product_vendors' ),
            'id'      => 'yith_wpv_yit_shortcodes',
            'default' => 'no'
        ) : false,

        'vendors_product_amount_end'        => array(
            'type' => 'sectionend',
        ),

        'new_section_options'               => array(
            'vendors_coupons_start'           => array(
                'type' => 'sectionstart',
            ),

            'vendors_coupons_title'           => array(
                'title' => __( 'Coupon management', 'yith_wc_product_vendors' ),
                'type'  => 'title',
                'desc'  => '',
                'id'    => 'yith_wpv_vendors_coupons_title'
            ),

            'vendors_coupon_management'       => array(
                'title'   => __( 'Enable coupon management', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( 'If you enable this option, each vendor will be able to create coupon for their own products.', 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_coupon_management',
                'default' => 'no'
            ),

            'vendors_coupons_end'             => array(
                'type' => 'sectionend',
            ),

            'vendors_reviews_start'           => array(
                'type' => 'sectionstart',
            ),

            'vendors_review_title'            => array(
                'title' => __( 'Review management', 'yith_wc_product_vendors' ),
                'type'  => 'title',
                'desc'  => '',
                'id'    => 'yith_wpv_vendors_reviews_title'
            ),

            'vendors_review_management'       => array(
                'title'   => __( 'Enable review management', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( 'If you enable this option, each vendor will be able to manage reviews on his/her own products independently.', 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_review_management',
                'default' => 'no'
            ),

            'vendors_review_end'              => array(
                'type' => 'sectionend',
            ),

            'vendors_order_start'             => array(
                'type' => 'sectionstart',
            ),

            'vendors_order_title'             => array(
                'title' => __( 'Order management', 'yith_wc_product_vendors' ),
                'type'  => 'title',
                'desc'  => '',
                'id'    => 'yith_wpv_vendors_orders_title'
            ),

            'vendors_order_management'        => array(
                'title'   => __( 'Enable order management', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( 'If you enable this option, each vendor will be able to manage orders on his/her own products independently.', 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_order_management',
                'default' => 'no'
            ),

            'vendors_order_synchronization'   => array(
                'title'   => __( 'Order synchronization', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( "All changes made to general orders will be synchronized with the individual vendor's order", 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_order_synchronization',
                'default' => 'no'
            ),

            'vendors_order_refund_management' => array(
                'title'   => __( 'Order refund management', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( "If you enable this option, each vendor will be able to manage refund on his/her own orders independently.", 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_order_refund_synchronization',
                'default' => 'yes'
            ),

            'vendors_order_hide_customer'     => array(
                'title'   => __( 'Hide Customer Section', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( "Check this option to prevent vendors from seeing 'Customer' section in order details", 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_order_hide_customer',
                'default' => 'no'
            ),

            'vendors_order_hide_payment'     => array(
                'title'   => __( 'Hide Payment Information', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( "Check this option to prevent vendors from seeing 'Payment' section in order details", 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_order_hide_payment',
                'default' => 'no'
            ),

            'vendors_order_end'               => array(
                'type' => 'sectionend',
            ),

            'vendors_featured_start'          => array(
                'type' => 'sectionstart',
            ),

            'vendors_featured_title'          => array(
                'title' => __( 'Featured Products management', 'yith_wc_product_vendors' ),
                'type'  => 'title',
                'desc'  => '',
                'id'    => 'yith_wpv_vendors_featured_title'
            ),

            'vendors_featured_management'     => array(
                'title'   => __( 'Enable featured products management', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( 'If you enable this option, each vendor will be able to set "Featured" on his/her own products independently (this option can be override for each vendor).', 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_featured_management',
                'default' => 'no'
            ),

            'vendors_featured_end'            => array(
                'type' => 'sectionend',
            ),

            'vendors_editor_start'            => array(
                'type' => 'sectionstart',
            ),

            'vendors_editor_title'            => array(
                'title' => __( 'Advanced editor', 'yith_wc_product_vendors' ),
                'type'  => 'title',
                'desc'  => '',
                'id'    => 'yith_wpv_vendors_editor_title'
            ),

            'vendors_editor_management'       => array(
                'title'   => __( 'Enable advanced editor for vendor description', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( 'If you enable this option, each vendor will be able to use an advanced editor for store description.', 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_editor_management',
                'default' => 'no'
            ),

            'vendors_editor_media'       => array(
                'title'   => __( 'Enable media button in text editor', 'yith_wc_product_vendors' ),
                'type'    => 'checkbox',
                'desc'    => __( 'If you enable this option, each vendor will be able to use the media button in advanced editor.', 'yith_wc_product_vendors' ),
                'id'      => 'yith_wpv_vendors_option_editor_media',
                'default' => 'no'
            ),

            'vendors_editor_end'              => array(
                'type' => 'sectionend',
            ),
        ),
    ),
);