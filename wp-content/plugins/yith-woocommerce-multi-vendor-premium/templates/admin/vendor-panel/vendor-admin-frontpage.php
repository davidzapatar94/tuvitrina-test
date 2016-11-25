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
        <h3><?php _e( 'Vendor shop page information', 'yith_wc_product_vendors' ) ?></h3>

        <input type="hidden" name="update_vendor_id" value="<?php echo $vendor->id ?>" />
        <input type="hidden" name="action" value="yith_admin_save_fields" />
        <input type="hidden" name="page" value="<?php echo ! empty( $_GET['page'] ) ? $_GET['page'] : '' ?>" />
        <input type="hidden" name="tab" value="<?php echo ! empty( $_GET['tab'] ) ? $_GET['tab'] : '' ?>" />

        <?php echo wp_nonce_field( 'yith_vendor_admin_update', 'yith_vendor_admin_update_nonce', true, false ) ?>

        <div class="form-field">
            <label for="vendor_description"><?php  _e( 'Description:', 'yith_wc_product_vendors' ) ?></label>
            <?php if( 'yes' == get_option( 'yith_wpv_vendors_option_editor_management', 'no' ) ) : ?>
                <?php YITH_Vendors()->admin->add_wp_editor( $vendor->description, array( 'media_buttons' => 'yes' == get_option( 'yith_wpv_vendors_option_editor_media', 'no' ) ? true : false ), false ); ?>
            <?php else: ?>
                <textarea id="vendor_description" name="yith_vendor_data[description]" rows="10" cols="50" class="large-text"><?php echo esc_textarea( stripslashes( $vendor->description ) ) ?></textarea>
            <?php endif; ?>
            <br/>
            <span class="description"><?php _e( "Description for Vendor Tab in single product page.", 'yith_wc_product_vendors' ); ?></span>
        </div>

        <?php YITH_Vendors()->admin->add_upload_field( 'div', $vendor->header_image, 'header_image' ) ?>

        <?php if( $show_gravatar ) : ?>
            <div class="form-field">
                <label for="vendor_show_gravatar"><?php  _e( 'Enable store header logo:', 'yith_wc_product_vendors' ) ?></label>
                <input type="checkbox" id="vendor_show_gravatar" name="yith_vendor_data[show_gravatar]" value="yes" <?php checked( 'yes', $vendor->show_gravatar )?> />
                <span class="description"><?php _e( "Show logo in the vendor's store header page", 'yith_wc_product_vendors' ); ?></span>
            </div>
        <?php endif; ?>

        <h3><?php _e( 'Contact information :', 'yith_wc_product_vendors' ) ?></h3>

        <div class="form-field contact-info">
            <label for="yith_vendor_location"><?php _e( 'Location', 'yith_wc_product_vendors' ); ?></label>
            <input type="text" class="regular-text" name="yith_vendor_data[location]" id="yith_vendor_location" placeholder="<?php _e( 'MyStore S.A. Avenue MyStore 55, 1800 Vevey, Switzerland', 'yith_wc_product_vendors' ); ?>" value="<?php echo $vendor->location ?>" />
            <br/>
            <span class="description"><?php _e( "Store address. e.g.: MyStore S.A. Avenue MyStore 55, 1800 Vevey, Switzerland", 'yith_wc_product_vendors' ); ?></span>

            <label for="yith_vendor_store_email"><?php _e( 'Store email', 'yith_wc_product_vendors' ); ?></label>
            <input type="text" class="regular-text" name="yith_vendor_data[store_email]" id="yith_vendor_store_email" value="<?php echo $vendor->store_email ?>" />
            <br/>
            <span class="description"><?php _e( "Insert store email address.", 'yith_wc_product_vendors' ); ?></span>

            <label for="yith_vendor_telephone"><?php _e( 'Telephone', 'yith_wc_product_vendors' ); ?></label>
            <input type="text" class="regular-text" name="yith_vendor_data[telephone]" id="yith_vendor_telephone" value="<?php echo $vendor->telephone ?>" />
            <br/>
            <span class="description"><?php _e( "Insert store telephone number.", 'yith_wc_product_vendors' ); ?></span>

            <label for="vendor_vat"><?php _e( 'VAT/SSN:', 'yith_wc_product_vendors' ) ?></label>
            <input id="vendor_vat" type="text" name="yith_vendor_data[vat]" value="<?php echo $vendor->vat ?>" class="regular-text <?php echo ! $vendor->vat && YITH_Vendors()->is_vat_require() ? 'required' : '' ?>"  />
            <br />
            <span class="description"><?php _e( 'The VAT/SSN of your store.', 'yith_wc_product_vendors' ); ?></span>

            <label for="vendor_legal_notes"><?php _e( 'Company legal notes', 'yith_wc_product_vendors' ) ?></label>
            <input id="vendor_vat" type="text" name="yith_vendor_data[legal_notes]" value="<?php echo $vendor->legal_notes ?>" class="regular-text"  />
            <br />
            <span class="description"><?php _e( 'Insert company legal notes (e.g. Managing Directors, Court of registration, Commercial registration number, ecc.)', 'yith_wc_product_vendors' ); ?></span>
        </div>

        <h3><?php _e( 'Social profile:', 'yith_wc_product_vendors' ) ?></h3>

        <div class="form-field">
            <?php $socials = $vendor->socials ?>
            <?php foreach( $social_fields as $social => $social_args ) : ?>
                <label for="yith_vendor_social_<?php echo $social ?>"><?php echo $social_args['label'] ?></label>
                <input type="text" class="regular-text" name="yith_vendor_data[socials][<?php echo $social ?>]" id="yith_vendor_social_<?php $social ?>" value="<?php echo isset( $socials[ $social ] ) ? $socials[ $social ] : '' ?>" placeholder="http://" /><br />
            <?php endforeach; ?>
            <br/>
            <span class="description"><?php _e( "Add social page link here", 'yith_wc_product_vendors' ); ?></span>
        </div>

        <div class="submit">
            <input name="Submit" type="submit" class="button-primary" value="<?php echo esc_attr( __( 'Save Front page Settings', 'yith_wc_product_vendors' ) ) ?>" />
        </div>
    </form>
</div>
