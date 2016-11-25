<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * @var YITH_Vendor $vendor
 */
?>
<div class="wrap yith-vendor-admin-wrap" id="vendor-details">

    <form method="post" action="admin.php" enctype="multipart/form-data">
        <h3><?php _e( 'Store general information', 'yith_wc_product_vendors' ) ?></h3>

        <input type="hidden" name="update_vendor_id" value="<?php echo $vendor->id ?>" />
        <input type="hidden" name="action" value="yith_admin_save_fields" />
        <input type="hidden" name="page" value="<?php echo ! empty( $_GET['page'] ) ? $_GET['page'] : '' ?>" />
        <input type="hidden" name="tab" value="<?php echo ! empty( $_GET['tab'] ) ? $_GET['tab'] : '' ?>" />

        <?php echo wp_nonce_field( 'yith_vendor_admin_update', 'yith_vendor_admin_update_nonce', true, false ) ?>

        <div class="form-field">
            <label for="vendor_name"><?php _e( 'Name:', 'yith_wc_product_vendors' ) ?></label>
            <input id="vendor_name" type="text" name="yith_vendor_data[name]" value="<?php echo $vendor->name ?>" class="regular-text"  />
            <br />
            <span class="description"><?php _e( 'Store name (displayed in vendor tabs and vendor store page).', 'yith_wc_product_vendors' ); ?></span>
        </div>

        <div class="form-field">
            <label for="vendor_slug"><?php _e( 'Slug:', 'yith_wc_product_vendors' ) ?></label>
            <input id="vendor_slug" type="text" name="yith_vendor_data[slug]" value="<?php echo $vendor->slug ?>" class="regular-text"  />
            <br />
            <span class="description"><?php _e( 'The “slug” is the URL-friendly version of the name. It is usually lowercased and contains only letters, numbers and hyphens.', 'yith_wc_product_vendors' ); ?></span>
        </div>

         <div class="form-field yith-choosen">
            <label for="yith_vendor_admins"><?php _e( 'Vendor Shop Admins', 'yith_wc_product_vendors' ); ?></label>
             <input type="hidden"
                    class="wc-customer-search"
                    id="yith_vendor_admins"
                    name="yith_vendor_data[admins]"
                    data-placeholder="<?php esc_attr_e( 'Search for a shop admins&hellip;', 'yith_wc_product_vendors' ); ?>"
                    data-selected='<?php echo $vendor_admins['selected'] ?>'
                    value="<?php echo $vendor_admins['value'] ?>"
                    data-allow_clear="true"
                    data-multiple="true" />
            <br />
            <span class="description"><?php _e( 'User that can manage products in this vendor shop and view sale reports.', 'yith_wc_product_vendors' ); ?></span>
        </div>

        <h3><?php _e( 'Store capability and rate:', 'yith_wc_product_vendors' ) ?></h3>

        <div class="form-field">
            <ul>
                <li>
                    <strong><?php _e( 'Commission Rate: ', 'yith_wc_product_vendors' ); ?></strong>
                    <?php echo $vendor->get_commission() * 100 ?>%
                </li>
                 <li>
                    <strong><?php _e( "Skip admin review: ", 'yith_wc_product_vendors' ); ?></strong>
                    <?php 'yes' == $vendor->skip_review ? _e( 'Enabled', 'yith_wc_product_vendors' ) : _e( 'Disabled', 'yith_wc_product_vendors' ) ?>
                </li>
                <li>
                    <strong><?php _e( "Sale status: ", 'yith_wc_product_vendors' ); ?></strong>
                    <?php 'yes' == $vendor->enable_selling ? _e( 'Enabled', 'yith_wc_product_vendors' ) : _e( 'Disabled', 'yith_wc_product_vendors' ) ?>
                </li>
                 <li>
                    <strong><?php _e( "Registration date: ", 'yith_wc_product_vendors' ); ?></strong>
                    <?php echo $vendor->get_registration_date( 'display' ) ?>
                </li>
            </ul>
        </div>

        <div class="submit">
            <input name="Submit" type="submit" class="button-primary" value="<?php echo esc_attr( __( 'Save Vendor Settings', 'yith_wc_product_vendors' ) ) ?>" />
        </div>
    </form>
</div>
