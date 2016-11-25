<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

return apply_filters( 'yith_wcqw_panel_payments_options', array(

        'payments' => array(

            'payments_options_start'          => array(
                'type'  => 'sectionstart',
            ),

            'payments_options_title'          => array(
                'title' => __( 'PayPal settings', 'yith_wc_product_vendors' ),
                'type'  => 'title',
                'desc'  => __( 'Configure here PayPal in order to process the payment of commissions.', 'yith_wc_product_vendors' ),
                'id'    => 'yith_wpv_payments_options_title'
            ),

			'payment_gateway' => array(
				'id' => 'payment_gateway',
				'type' => 'select',
				'title' => __( 'PayPal Service', 'yith_wc_product_vendors' ),
				'desc' => __( 'Choose the PayPal service to pay the commissions to vendors (the only option currently available is MassPay).', 'yith_wc_product_vendors' ),
				'options' => array(
					'masspay' 	=> __( 'MassPay', 'yith_wc_product_vendors' ),
					//'standard' 	=> __( 'Standard', 'yith_wc_product_vendors' ),
				),
				'default' => 'masspay'
			),

            'payment_method' => array(
	            'id' => 'payment_method',
	            'type' => 'select',
	            'title' => __( 'Payment Method', 'yith_wc_product_vendors' ),
	            'desc' => __( 'Choose how to pay the commissions to vendors', 'yith_wc_product_vendors' ),
	            'options' => array(
		            'manual' => __( 'Pay manually', 'yith_wc_product_vendors' ),
		            'choose' => __( 'Let vendors decide', 'yith_wc_product_vendors' ),
	            ),
	            'default' => 'choose',
            ),

             'payment_minimum withdrawals' => array(
	            'id' => 'payment_minimum_withdrawals',
	            'type' => 'number',
	            'title' => __( 'Minimum Withdrawal', 'yith_wc_product_vendors' ) . ' ' . get_woocommerce_currency_symbol(),
	            'desc' => __( "Set the minimum value for commission withdrawals. This setting will update all vendors' accounts that still have a threshold lower than the one set.", 'yith_wc_product_vendors' ),
	            'custom_attributes' => array(
		            'min' => 1
	            ),
	            'default' => 1
            ),

           /* 'paypal_adaptive_enable' => array(
	            'id' => 'paypal_adaptive_enable',
	            'type' => 'checkbox',
	            'title' => __( 'Enable PayPal Adaptive', 'yith_wc_product_vendors' ),
	            'desc' => __( 'Use PayPal Adaptive Payments for instant payments of commissions', 'yith_wc_product_vendors' ),
	            'default' => 'yes'
            ),*/

            'paypal_sandbox' => array(
	            'id' => 'paypal_sandbox',
	            'type' => 'checkbox',
	            'title' => __( 'Sandbox environment', 'yith_wc_product_vendors' ),
	            'desc' => __( 'Set environment as sandbox, for test purpose', 'yith_wc_product_vendors' ),
	            'default' => 'yes'
            ),
            'paypal_api_username' => array(
	            'id' => 'paypal_api_username',
	            'type' => 'text',
	            'title' => __( 'API Username', 'yith_wc_product_vendors' ),
	            'desc' => sprintf( __( 'API username of PayPal administration account (if empty, settings of PayPal in <a href="%s">WooCommmerce Settings page</a> apply).', 'yith_wc_product_vendors' ), admin_url( 'admin.php?page=wc-settings&tab=checkout&section=wc_gateway_paypal' ) )
            ),
            'paypal_api_password' => array(
	            'id' => 'paypal_api_password',
	            'type' => 'text',
	            'title' => __( 'API Password', 'yith_wc_product_vendors' ),
	            'desc' => sprintf( __( 'API password of PayPal administration account (if empty, settings of PayPal in <a href="%s">WooCommmerce Settings page</a> apply).', 'yith_wc_product_vendors' ), admin_url( 'admin.php?page=wc-settings&tab=checkout&section=wc_gateway_paypal' ) )
            ),
            'paypal_api_signature' => array(
	            'id' => 'paypal_api_signature',
	            'type' => 'text',
	            'title' => __( 'API Signature', 'yith_wc_product_vendors' ),
	            'desc' => sprintf( __( 'API signature of PayPal administration account (if empty, settings of PayPal in <a href="%s">WooCommmerce Settings page</a> apply).', 'yith_wc_product_vendors' ), admin_url( 'admin.php?page=wc-settings&tab=checkout&section=wc_gateway_paypal' ) )
            ),
            'paypal_payment_mail_subject' => array(
	            'id' => 'paypal_payment_mail_subject',
	            'type' => 'text',
	            'title' => __( 'Payment Email Subject', 'yith_wc_product_vendors' ),
	            'desc' => __( 'Subject for email sent by PayPal to customers when payment request is registered', 'yith_wc_product_vendors' )
            ),
            'paypal_ipn_notification_url' => array(
	            'id' => 'paypal_ipn_notification_url',
	            'type' => 'text',
	            'title' => __( 'Notification URL', 'yith_wc_product_vendors' ),
	            'desc' => __( 'Copy this URL and set it into PayPal admin panel, to receive IPN from their server', 'yith_wc_product_vendors' ),
	            'default' => site_url() . '/?paypal_ipn_response=true',
	            'css' => 'width: 400px;',
	            'custom_attributes' => array(
		            'readonly' => 'readonly'
	            )
            ),

            'vendors_options_end'          => array(
                'type'  => 'sectionend',
            ),
        )
    )
);