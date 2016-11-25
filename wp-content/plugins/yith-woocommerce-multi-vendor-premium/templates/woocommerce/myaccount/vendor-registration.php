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
	exit; // Exit if accessed directly
}
$firstname          = ! empty( $_POST['vendor-owner-firstname'] )   ? sanitize_text_field( $_POST['vendor-owner-firstname'] ) : '';
$lastname           = ! empty( $_POST['vendor-owner-lastname'] )    ? sanitize_text_field( $_POST['vendor-owner-lastname'] ) : '';
$store_name         = ! empty( $_POST['vendor-name'] )              ? sanitize_text_field( $_POST['vendor-name'] ) : '';
$store_location     = ! empty( $_POST['vendor-location'] )          ? sanitize_text_field( $_POST['vendor-location'] ) : '';
$store_email        = ! empty( $_POST['vendor-email'] )             ? sanitize_email( $_POST['vendor-email'] ) : '';
$store_telephone    = ! empty( $_POST['vendor-telephone'] )         ? sanitize_text_field( $_POST['vendor-telephone'] ) : '';
$vendor_check       = ! empty( $_POST['vendor-register'] )          ? sanitize_text_field( $_POST['vendor-register'] ) : '';
$vat                = ! empty( $_POST['vendor-vat'] )               ? sanitize_text_field( $_POST['vendor-vat'] ) : '';
$register_text      = __( 'Register as a vendor', 'yith_wc_product_vendors' );
?>

<label for="vendor-register" class="inline vendor-register-label">
    <input name="vendor-register" type="checkbox" id="vendor-register" value="yes" <?php checked( $vendor_check, 'yes' )?>>
    <?php echo apply_filters( 'yith_wcmv_register_as_vendor_text', $register_text ) ?>
</label>

<div id="yith-vendor-registration" style="display: <?php echo 'yes' == $vendor_check ? 'block' : 'none' ?>;">
    <p class="form-row form-row-wide">
        <label for="vendor-owner-firstname"><?php _e( 'Owner First Name *', 'yith_wc_product_vendors' )?></label>
        <input type="text" class="input-text" name="vendor-owner-firstname" id="vendor-owner-firstname" value="<?php echo $firstname ?>">
    </p>

    <p class="form-row form-row-wide">
        <label for="vendor-owner-lastname"><?php _e( 'Owner Last Name *', 'yith_wc_product_vendors' )?></label>
        <input type="text" class="input-text" name="vendor-owner-lastname" id="vendor-owner-lastname" value="<?php echo $lastname ?>">
    </p>

    <p class="form-row form-row-wide">
        <label for="vendor-name"><?php _e( 'Store name *', 'yith_wc_product_vendors' )?></label>
        <input type="text" class="input-text" name="vendor-name" id="vendor-name" value="<?php echo $store_name ?>">
    </p>

    <p class="form-row form-row-wide">
        <label for="vendor-location"><?php _e( 'Address *', 'yith_wc_product_vendors' )?></label>
        <input type="text" class="input-text" name="vendor-location" id="vendor-location"value="<?php echo $store_location ?>" placeholder="<?php _e( 'MyStore S.A. Avenue MyStore 55, 1800 Vevey, Switzerland', 'yith_wc_product_vendors' ) ?>">
    </p>

    <p class="form-row form-row-wide">
        <label for="vendor-email"><?php _e( 'Store email *', 'yith_wc_product_vendors' )?></label>
        <input type="text" class="input-text" name="vendor-email" id="vendor-email" value="<?php echo $store_email ?>">
    </p>

    <p class="form-row form-row-wide">
        <label for="vendor-telephone"><?php _e( 'Telephone *', 'yith_wc_product_vendors' )?></label>
        <input type="text" class="input-text" name="vendor-telephone" id="vendor-telephone" value="<?php echo $store_telephone ?>">
    </p>

    <p class="form-row form-row-wide">
        <?php $vat_field_required =  $is_vat_require ? '*' : ''; ?>
        <label for="vendor-vat"><?php echo __( 'VAT/SSN', 'yith_wc_product_vendors' ) . ' ' . $vat_field_required ?></label>
        <input type="text" class="input-text" name="vendor-vat" id="vendor-vat" value="<?php echo $vat ?>">
    </p>

    <?php if( $is_terms_and_conditions_require ) : ?>
        <p class="form-row form-row-wide">
            <input type="checkbox" class="input-checkbox" name="vendor-terms" <?php checked( apply_filters( 'yith_wcmv_terms_is_checked_default', isset( $_POST['vendor-terms'] ) ), true ); ?> id="vendor-terms"  />
            <label for="vendor-terms" class="checkbox"><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank">terms &amp; conditions</a>', 'woocommerce' ), esc_url( get_permalink( get_option( 'yith_wpv_terms_and_conditions_page_id' ) ) ) ); ?> <span class="required">*</span></label>
            <input type="hidden" name="terms-field" value="1" />
        </p>
    <?php endif; ?>
    <input type="hidden" id="vendor-antispam" name="vendor-antispam" value="">
</div>