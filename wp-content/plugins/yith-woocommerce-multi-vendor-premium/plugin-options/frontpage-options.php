<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

$vendor_name_style = get_option('yith_wpv_vendor_name_style', 'theme');
$wc_account_settings_uri = esc_url(add_query_arg(array('page' => 'wc-settings', 'tab' => 'account'), admin_url('admin.php')));
return array(

    'frontpage' => array(

        'frontpage_wc_options_start' => array(
            'type' => 'sectionstart',
        ),

        'frontpage_wc_options_title' => array(
            'title' => __('WooCommerce Pages', 'yith_wc_product_vendors'),
            'type' => 'title',
            'id' => 'yith_wpv_wc_options_title'
        ),

        'frontpage_loop_vendor_name' => array(
            'title' => __('Show vendor\'s name in shop page', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Select if you want to show vendor\'s name below products in Shop page.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_name_in_loop',
            'default' => 'yes'
        ),

        'frontpage_single_product_vendor_name' => array(
            'title' => __('Show vendor\'s name in single product page', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Select if you want to show vendor\'s name below products in Single product page.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_name_in_single',
            'default' => 'yes'
        ),

        'frontpage_categories_vendor_name' => array(
            'title' => __('Show vendor\'s name in product category page', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Select if you want to show vendor\'s name below products in Product category page.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_name_in_categories',
            'default' => 'yes'
        ),

        'frontpage_item_sold' => array(
            'title' => __('Show "Item sold" information in single product page', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Select if you want to show the text "Item sold" in single product page among category and tag information', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_show_item_sold',
            'default' => 'no'
        ),

        'frontpage_report_abuse' => array(
            'title' => __('Show "Report abuse" link', 'yith_wc_product_vendors'),
            'type' => 'select',
            'desc' => __('Choose if you want to show the "Report abuse" link under product thumbnails in single product page.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_report_abuse_link',
            'options' => array(
                'none' => __('Disabled', 'yith_wc_product_vendors'),
                'all' => __('All products', 'yith_wc_product_vendors'),
                'vendor' => __("Only for vendor's products", 'yith_wc_product_vendors')
            ),
            'default' => 'none'
        ),

        'frontpage_report_abuse_text' => array(
            'title' => __('"Report abuse" link text', 'yith_wc_product_vendors'),
            'type' => 'text',
            'desc' => __('The report abuse link text.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_report_abuse_link_text',
            'default' => __("Report abuse", 'yith_wc_product_vendors')
        ),

        'frontpage_vendor_tab_text' => array(
            'title' => __('Vendor Tab', 'yith_wc_product_vendors'),
            'type' => 'text',
            'desc' => __('Change the label of "Vendor Tab" in single product page.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_tab_text_text',
            'default' => YITH_Vendors()->get_vendors_taxonomy_label('singular_name'),
        ),

        'frontpage_wc_options_end' => array(
            'type' => 'sectionend',
        ),

        'frontpage_wc_registration_options_start' => array(
            'type' => 'sectionstart',
        ),

        'frontpage_wc_registration_options_title' => array(
            'title' => __("Vendor's registration page", 'yith_wc_product_vendors'),
            'type' => 'title',
            'id' => 'yith_wpv_wc_registration_options_title'
        ),

        'frontpage_vendors_registration_page' => array(
            'title' => __('Enable Vendors registration in "My Account" page', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => sprintf(__('To make this option available you have to enable registration from "My Account" page in <a href="%s">WooCommerce > Settings > Account</a>', 'yith_wc_product_vendors'), $wc_account_settings_uri),
            'id' => 'yith_wpv_vendors_my_account_registration',
            'default' => 'no'
        ),

        'frontpage_vendors_registration_auto_approve' => array(
            'title' => __('Auto enable vendor account', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('After registration, the seller is entitled to sell. If you disable this option, the administrator must enable the vendor account manually', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendors_my_account_registration_auto_approve',
            'default' => 'no'
        ),

        'frontpage_vendors_registration_vat' => array(
            'title' => __('VAT/SSN number', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Mark this field required', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendors_my_account_required_vat',
            'default' => 'no'
        ),

        'frontpage_vendors_registration_terms_and_conditions' => array(
            'title' => __('Terms and conditions', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Mark this field required', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendors_registration_required_terms_and_conditions',
            'default' => 'no'
        ),

        'frontpage_wc_registration_options_end' => array(
            'type' => 'sectionend',
        ),

        'frontpage_become_a_vendor_start' => array(
            'type' => 'sectionstart',
        ),

        'frontpage_become_a_vendor_title' => array(
            'title' => __("Become a vendor page", 'yith_wc_product_vendors'),
            'type' => 'title',
            'id' => 'yith_wpv_wc_become_a_vendor_options_title'
        ),

        'frontpage_become_a_vendor_page' => array(
            'title' => __('"Become a vendor" page', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_become_a_vendor_page_id',
            'type' => 'single_select_page',
            'default' => 0,
            'class' => 'wc-enhanced-select-nostd',
            'css' => 'min-width:300px;',
            'desc_tip' => __('This sets the page where add the "become a vendor" form.', 'yith_wc_product_vendors'),
        ),

        'frontpage_become_a_vendor_end' => array(
            'type' => 'sectionend',
        ),

        'frontpage_terms_and_conditions_start' => array(
            'type' => 'sectionstart',
        ),

        'frontpage_terms_and_conditions_title' => array(
            'title' => __("Terms and conditions page", 'yith_wc_product_vendors'),
            'type' => 'title',
            'id' => 'yith_wpv_wc_terms_and_conditions_options_title'
        ),

        'frontpage_terms_and_conditions_page' => array(
            'title' => __('"Terms and conditions" page', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_terms_and_conditions_page_id',
            'type' => 'single_select_page',
            'default' => 0,
            'class' => 'wc-enhanced-select-nostd',
            'css' => 'min-width:300px;',
            'desc_tip' => __('This sets the page for vendors Terms and conditions.', 'yith_wc_product_vendors'),
        ),

        'frontpage_terms_and_conditions_end' => array(
            'type' => 'sectionend',
        ),

        'frontpage_options_start' => array(
            'type' => 'sectionstart',
        ),

        'frontpage_options_title' => array(
            'title' => __('Vendor\'s Store Page', 'yith_wc_product_vendors'),
            'type' => 'title',
            'id' => 'yith_wpv_vendors_options_title'
        ),

        'frontpage_rewrite_rules' => array(
            'title' => __('Vendor store slug prefix', 'yith_wc_product_vendors'),
            'type' => 'text',
            'desc' => __('Change the vendor store slug prefix. I.E.: http://mywebsite.com/{store_slug}/vendor_name', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_taxonomy_rewrite',
            'default' => 'vendor'
        ),

        'frontpage_name_options' => array(
            'title' => __('Store link', 'yith_wc_product_vendors'),
            'type' => 'select',
            'desc' => __('Select the style you want to use:', 'yith_wc_product_vendors'),
            'options' => array(
                'theme' => __('Theme style', 'yith_wc_product_vendors'),
                'custom' => __('Custom style', 'yith_wc_product_vendors'),
            ),
            'id' => 'yith_wpv_vendor_name_style',
            'default' => 'theme'
        ),

        'frontpage_color_name' => array(
            'title' => __('Vendor\'s name label color', 'yith_wc_product_vendors'),
            'type' => 'color',
            'desc' => __('Use it in shop page and single product page', 'yith_wc_product_vendors'),
            'id' => 'yith_vendors_color_name',
            'default' => '#bc360a',
            'custom_attributes' => 'theme' == $vendor_name_style ? array('readonly' => 'readonly') : array(),
        ),

        'frontpage_color_name_hover' => array(
            'title' => __('Vendor\'s name label color (on hover)', 'yith_wc_product_vendors'),
            'type' => 'color',
            'desc' => __('Use it in shop page and single product page (on hover)', 'yith_wc_product_vendors'),
            'id' => 'yith_vendors_color_name_hover',
            'default' => '#ea9629',
            'custom_attributes' => 'theme' == $vendor_name_style ? array('readonly' => 'readonly') : array(),
        ),


        'frontpage_header_skin' => array(
            'title' => __('Style for header image in vendor store page', 'yith_wc_product_vendors'),
            'type' => 'select',
            'desc' => __('Skin 1: Black background and white font color, Skin 2: White background and black font color', 'yith_wc_product_vendors'),
            'id' => 'yith_vendors_skin_header',
            'options' => array(
                'skin1' => __('Skin 1', 'yith_wc_product_vendors'),
                'skin2' => __('Skin 2', 'yith_wc_product_vendors'),
            ),
            'default' => 'skin1'
        ),

        'frontpage_header_show_gravatar_image' => array(
            'title' => __('Show vendor logo in vendor store page', 'yith_wc_product_vendors'),
            'type' => 'select',
            'desc' => __('Enable/Disable the vendor logo (user avatar) in vendor store page.', 'yith_wc_product_vendors'),
            'id' => 'yith_vendors_show_gravatar_image',
            'options' => array(
                'enabled' => __('Let vendors decide', 'yith_wc_product_vendors'),
                'disabled' => __("Don't show vendor logo", 'yith_wc_product_vendors'),
            ),

        ),

        'frontpage_header_gravatar_image_size' => array(
            'title' => __('Image size for vendor logo in vendor store page', 'yith_wc_product_vendors'),
            'type' => 'number',
            'desc' => __('Change the default image size for logo (Default: 62 px).', 'yith_wc_product_vendors'),
            'id' => 'yith_vendors_gravatar_image_size',
            'default' => '62',
            'css' => 'width: 70px'
        ),

        'frontpage_tab_position' => array(
            'title' => __('Vendor tab position in single product page', 'yith_wc_product_vendors'),
            'type' => 'select',
            'desc' => __('Select the position for "Vendor" tab in single product page. You can set to show the tab before or after WooCommerce tabs', 'yith_wc_product_vendors'),
            'id' => 'yith_vendors_tab_position',
            'options' => array(
                1 => __('First tab', 'yith_wc_product_vendors'),
                99 => __('After WooCommerce tabs', 'yith_wc_product_vendors')
            ),
            'default' => 99
        ),

        'frontpage_related_products' => array(
            'title' => __('Settings for vendor\'s "Related products"', 'yith_wc_product_vendors'),
            'type' => 'select',
            'desc' => __('Select related products to show in single product pages:', 'yith_wc_product_vendors'),
            'id' => 'yith_vendors_related_products',
            'options' => array(
                'disable' => __('Do not show related products', 'yith_wc_product_vendors'),
                'default' => __('Related products from the entire store', 'yith_wc_product_vendors'),
                'vendor' => __("Related products from vendor's shop", 'yith_wc_product_vendors'),
            ),
            'default' => 'vendor'
        ),

        'frontpage_description' => array(
            'title' => __('Show vendor\'s description in store page', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Select if you want to show vendor\'s description after the header of Store page.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_store_description',
            'default' => 'no'
        ),

        'frontpage_page_name' => array(
            'title' => __('Show vendor\'s name in store page', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Select if you want to show vendor\'s name below products in Store page.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_name_in_store',
            'default' => 'yes'
        ),

        'frontpage_total_sales' => array(
            'title' => __('Show total vendor\'s sales in store page', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Select if you want to show total vendor\'s sales in the header of Store page.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_total_sales',
            'default' => 'no'
        ),

        'frontpage_vat' => array(
            'title' => __('Show VAT/SSN in store page', 'yith_wc_product_vendors'),
            'type' => 'checkbox',
            'desc' => __('Select if you want to show the VAT/SSN information in the header of Store page.', 'yith_wc_product_vendors'),
            'id' => 'yith_wpv_vendor_show_vendor_vat',
            'default' => 'yes'
        ),

        'frontpage_options_end' => array(
            'type' => 'sectionend',
        ),

        'frontpage_gmaps_key_start' => array(
            'type' => 'sectionstart',
        ),

        'frontpage_gmaps_key_title' => array(
            'title' => __("Google API Key", 'yith_wc_product_vendors'),
            'type' => 'title',
            'id' => 'yith_wpv_wc_registration_options_title'
        ),

        'frontpage_gmaps_key' => array(
            'title' => __('Google Maps API Key', 'yith_wc_product_vendors'),
            'type' => 'text',
            'desc' => sprintf('%s %s. %s <a href="%s" target="_blank">%s</a>',
                __('If you have an API KEY for Google Maps, you can add it', 'yith_wc_product_vendors'),
                _x('here', '[admin] placeholder link', 'yith_wc_product_vendors'),
                __('Don’t know what an API KEY is or how to use it? For further information, please click', 'yith_wc_product_vendors'),
                esc_url('//developers.google.com/maps/documentation/javascript/get-api-key'),
                _x('here', '[admin] placeholder link', 'yith_wc_product_vendors')
            ),
            'id' => 'yith_wpv_frontpage_gmaps_key',
            'default' => '',
            'css' => 'width: 330px;'
        ),

        'frontpage_gmaps_key_end' => array(
            'type' => 'sectionend',
        ),
    )
);