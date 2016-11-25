<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'YITH_WC_Email_New_Vendor_Registration' ) ) :

/**
 * New Order Email
 *
 * An email sent to the admin when a new order is received/paid for.
 *
 * @class 		YITH_WC_Email_New_Vendor_Registration
 * @version		2.0.0
 * @package		WooCommerce/Classes/Emails
 * @author 		WooThemes
 * @extends 	WC_Email
 *
 * @property YITH_Commission $object
 */
class YITH_WC_Email_New_Vendor_Registration extends WC_Email {

	/**
	 * Constructor
	 */
	function __construct() {

		$this->id 				= 'new_vendor_registration';
		$this->title 			= __( 'New Vendor Registration', 'yith_wc_product_vendors' );
		$this->description		= __( 'New Vendor has requested to access to your store', 'yith_wc_product_vendors' );

		$this->heading 			= __( 'New Vendor Registration', 'yith_wc_product_vendors' );
		$this->subject      	= __( '[{site_title}] - New Vendor Registration', 'yith_wc_product_vendors' );

		$this->template_html 	= 'emails/new-vendor-registration.php';
		$this->template_plain 	= 'emails/plain/new-vendor-registration.php';

		// Triggers for this email
		add_action( 'yith_new_vendor_registration', array( $this, 'trigger' ) );

		// Call parent constructor
		parent::__construct();

		// Other settings
		$this->recipient = $this->get_option( 'recipient' );

		if ( ! $this->recipient )
			$this->recipient = get_option( 'admin_email' );
	}

	/**
	 * trigger function.
	 *
	 * @access public
	 *
	 * @param YITH_Commission $commission Commission paid
	 */
	function trigger( $vendor ) {
		if ( !  $vendor instanceof YITH_Vendor || ! $this->is_enabled() || ! $this->get_recipient() ) {
			return;
		}

		$this->object = $vendor;
		$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
	}

	/**
	 * get_content_html function.
	 *
	 * @access public
	 * @return string
	 */
	function get_content_html() {
		ob_start();
		yith_wcpv_get_template( $this->template_html, array(
			'vendor'        => $this->object,
			'email_heading' => $this->get_heading(),
			'sent_to_admin' => true,
			'plain_text'    => false
		), '' );
		return ob_get_clean();
	}

	/**
	 * get_content_plain function.
	 *
	 * @access public
	 * @return string
	 */
	function get_content_plain() {
		ob_start();
		yith_wcpv_get_template( $this->template_plain, array(
			'vendor'        => $this->object,
			'email_heading' => $this->get_heading(),
			'sent_to_admin' => true,
			'plain_text'    => true
		), '' );
		return ob_get_clean();
	}

	/**
	 * Initialise Settings Form Fields
	 *
	 * @access public
	 * @return void
	 */
	function init_form_fields() {
		$this->form_fields = array(
			'enabled' => array(
				'title' 		=> __( 'Enable/Disable', 'yith_wc_product_vendors' ),
				'type' 			=> 'checkbox',
				'label' 		=> __( 'Enable this email notification', 'yith_wc_product_vendors' ),
				'default' 		=> 'yes'
			),
			'recipient' => array(
				'title' 		=> __( 'Recipient(s)', 'yith_wc_product_vendors' ),
				'type' 			=> 'text',
				'description' 	=> sprintf( __( 'Enter recipients (comma separated) for this email. Defaults to <code>%s</code>.', 'yith_wc_product_vendors' ), esc_attr( get_option('admin_email') ) ),
				'placeholder' 	=> '',
				'default' 		=> ''
			),
			'subject' => array(
				'title' 		=> __( 'Subject', 'yith_wc_product_vendors' ),
				'type' 			=> 'text',
				'description' 	=> sprintf( __( 'This controls the email subject line. Leave it blank to use the default subject: <code>%s</code>.', 'yith_wc_product_vendors' ), $this->subject ),
				'placeholder' 	=> '',
				'default' 		=> ''
			),
			'heading' => array(
				'title' 		=> __( 'Email Heading', 'yith_wc_product_vendors' ),
				'type' 			=> 'text',
				'description' 	=> sprintf( __( 'This controls the main heading contained in the email notification. Leave it blank to use the default heading: <code>%s</code>.', 'yith_wc_product_vendors' ), $this->heading ),
				'placeholder' 	=> '',
				'default' 		=> ''
			),
			'email_type' => array(
				'title' 		=> __( 'Email type', 'yith_wc_product_vendors' ),
				'type' 			=> 'select',
				'description' 	=> __( 'Choose format for emails that will be sent.', 'yith_wc_product_vendors' ),
				'default' 		=> 'html',
				'class'			=> 'email_type wc-enhanced-select',
				'options'		=> $this->get_email_type_options()
			)
		);
	}
}

endif;

return new YITH_WC_Email_New_Vendor_Registration();
