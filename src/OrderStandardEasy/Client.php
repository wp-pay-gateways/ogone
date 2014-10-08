<?php

/**
 * Title: Ogone OrderStandard easy client
 * Description:
 * Copyright: Copyright (c) 2005 - 2011
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.0
 */
class Pronamic_WP_Pay_Gateways_Ogone_OrderStandardEasy_Client {
	/**
	 * An payment type indicator for iDEAL
	 *
	 * @var string
	 */
	const PAYMENT_TYPE_IDEAL = 'iDEAL';

	//////////////////////////////////////////////////

	/**
	 * The URL for testing
	 *
	 * @var string
	 */
	private $payment_server_url;

	//////////////////////////////////////////////////

	/**
	 * Home URL
	 *
	 * @var string
	 */
	private $data;

	//////////////////////////////////////////////////

	/**
	 * Constructs and initialize a iDEAL easy object
	 *
	 * @param string $psp_id
	 */
	public function __construct( $psp_id ) {
		$this->data = new Pronamic_WP_Pay_Gateways_Ogone_Data();
		$this->data->set_field( Pronamic_WP_Pay_Gateways_Ogone_Parameters::PSPID, $psp_id );

		$this->set_payment_type( self::PAYMENT_TYPE_IDEAL );
	}

	//////////////////////////////////////////////////

	/**
	 * Get the payment server URL
	 *
	 * @return the payment server URL
	 */
	public function get_payment_server_url() {
		return $this->payment_server_url;
	}

	/**
	 * Set the payment server URL
	 *
	 * @param string $url an URL
	 */
	public function set_payment_server_url( $url ) {
		$this->payment_server_url = $url;
	}

	//////////////////////////////////////////////////
	// Data
	//////////////////////////////////////////////////

	/**
	 * Get data
	 *
	 * @return Pronamic_WP_Pay_Gateways_Ogone_Data
	 */
	public function get_data() {
		return $this->data;
	}

	//////////////////////////////////////////////////

	/**
	 * Get the iDEAL HTML
	 */
	public function get_html_fields() {
		return Pronamic_IDeal_IDeal::htmlHiddenFields( $this->data->get_fields() );
	}
}
