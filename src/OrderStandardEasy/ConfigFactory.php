<?php

namespace Pronamic\WordPress\Pay\Gateways\Ingenico\OrderStandardEasy;

use Pronamic\WordPress\Pay\Core\GatewayConfigFactory;

/**
 * Title: Ingenico order standard easy config factory
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.3.2
 * @since 1.0.0
 */
class ConfigFactory extends GatewayConfigFactory {
	private $config_class;

	public function __construct( $config_class = __NAMESPACE__ . '\Config', $config_test_class = __NAMESPACE__ . '\Config' ) {
		$this->config_class      = $config_class;
		$this->config_test_class = $config_test_class;
	}

	public function get_config( $post_id ) {
		$mode = get_post_meta( $post_id, '_pronamic_gateway_mode', true );

		$config_class = ( 'test' === $mode ) ? $this->config_test_class : $this->config_class;

		$config = new $config_class();

		$form_action_url = get_post_meta( $post_id, '_pronamic_gateway_ogone_form_action_url', true );

		if ( '' !== $form_action_url ) {
			$config->set_form_action_url( $form_action_url );
		}

		$config->mode     = $mode;
		$config->psp_id   = get_post_meta( $post_id, '_pronamic_gateway_ogone_psp_id', true );
		$config->order_id = get_post_meta( $post_id, '_pronamic_gateway_ogone_order_id', true );

		return $config;
	}
}
