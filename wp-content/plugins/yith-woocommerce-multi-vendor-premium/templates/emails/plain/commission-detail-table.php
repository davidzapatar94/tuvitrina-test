<?php
/**
 * Admin new order email
 *
 * @author WooThemes
 * @package WooCommerce/Templates/Emails/HTML
 * @version 2.0.0
 *
 * @var string $email_heading
 * @var YITH_Commission $commission
 * @var WC_Order $order
 * @var WC_Product $product
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

echo __( 'Status', 'yith_wc_product_vendors' ) . ':';
echo $commission->get_status( 'display' ) . " \n\n";

echo __( 'Date', 'yith_wc_product_vendors' ) . ':';
echo $commission->get_date( 'display' ) . " \n\n";

echo __( 'Amount', 'yith_wc_product_vendors' ) . ':';
echo $commission->get_amount( 'display' ) . " \n\n";

echo __( 'PayPal email', 'yith_wc_product_vendors' ) . ':';
echo $vendor->paypal_email . " \n\n";

echo __( 'Vendor', 'yith_wc_product_vendors' ) . ':';
echo $vendor->name . " \n\n";

echo __( 'Order number', 'yith_wc_product_vendors' ) . ':';
echo $order->get_order_number() . " \n\n";

echo __( 'Product', 'yith_wc_product_vendors' ) . ':';
echo $item['name'] . " \n\n";