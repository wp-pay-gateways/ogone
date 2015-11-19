<?php

class Pronamic_WP_Pay_Gateways_Ogone_OrderStandard_Integration extends Pronamic_WP_Pay_Gateways_Ogone_AbstractIntegration {
	public function __construct() {
		parent::__construct();

		$this->id   = 'ogone-orderstandard';
		$this->name = 'Ingenico/Ogone - OrderStandard';
	}

	public function get_config_factory_class() {
		return 'Pronamic_WP_Pay_Gateways_Ogone_OrderStandard_ConfigFactory';
	}

	public function get_config_class() {
		return 'Pronamic_WP_Pay_Gateways_Ogone_OrderStandard_Config';
	}

	public function get_gateway_class() {
		return 'Pronamic_WP_Pay_Gateways_Ogone_OrderStandard_Gateway';
	}
}