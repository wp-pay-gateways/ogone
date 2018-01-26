<?php

namespace Pronamic\WordPress\Pay\Gateways\Ingenico\DirectLink;

use Pronamic\WordPress\Pay\Core\Util;
use Pronamic\WordPress\Pay\Core\XML\Security;
use Pronamic\WordPress\Pay\Gateways\Ingenico\DirectLink;
use Pronamic\WordPress\Pay\Gateways\Ingenico\Error;
use Pronamic_WP_Pay_Gateways_Ogone_OrderResponseParser;
use WP_Error;

/**
 * Title: Ingenico DirectLink client
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @since 1.0.0
 */
class Client {
	/**
	 * Error
	 *
	 * @var WP_Error
	 */
	private $error;

	/////////////////////////////////////////////////

	/**
	 * API URL
	 *
	 * @var string
	 */
	public $api_url;

	/////////////////////////////////////////////////

	/**
	 * Constructs and initializes an Ogone DirectLink client
	 */
	public function __construct() {
		$this->api_url = DirectLink::API_PRODUCTION_URL;
	}

	/////////////////////////////////////////////////

	/**
	 * Get error
	 *
	 * @return WP_Error
	 */
	public function get_error() {
		return $this->error;
	}

	/////////////////////////////////////////////////

	/**
	 * Order direct
	 *
	 * @param array $data
	 *
	 * @return bool|OrderResponse
	 */
	public function order_direct( array $data = array() ) {
		$order_response = false;

		$result = Util::remote_get_body( $this->api_url, 200, array(
			'method'    => 'POST',
			'sslverify' => false,
			'body'      => $data,
		) );

		if ( is_wp_error( $result ) ) {
			$this->error = $result;
		} else {
			$xml = Util::simplexml_load_string( $result );

			if ( is_wp_error( $xml ) ) {
				$this->error = $xml;
			} else {
				$order_response = Pronamic_WP_Pay_Gateways_Ogone_OrderResponseParser::parse( $xml );

				if ( ! empty( $order_response->nc_error ) ) {
					$ogone_error = new Error(
						Security::filter( $order_response->nc_error ),
						Security::filter( $order_response->nc_error_plus )
					);

					$this->error = new WP_Error( 'ogone_error', (string) $ogone_error, $ogone_error );
				}
			}
		}

		return $order_response;
	}
}
