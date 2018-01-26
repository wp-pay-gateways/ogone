<?php

namespace Pronamic\WordPress\Pay\Gateways\Ingenico;

/**
 * Title: Ingenico DirectLink
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @since 1.0.0
 */
class DirectLink {
	/**
	 * Ogone DirectLink test API endpoint URL
	 *
	 * @var string
	 */
	const API_TEST_URL = 'https://secure.ogone.com/ncol/test/orderdirect.asp';

	/**
	 * Ogone DirectLink test API endpoint URL
	 *
	 * @var string
	 */
	const API_TEST_UTF8_URL = 'https://secure.ogone.com/ncol/test/orderdirect_utf8.asp';

	/**
	 * Ogone DirectLink production API endpoint URL
	 *
	 * @var string
	 */
	const API_PRODUCTION_URL = 'https://secure.ogone.com/ncol/prod/orderdirect.asp';

	/**
	 * Ogone DirectLink production API endpoint URL
	 *
	 * @var string
	 */
	const API_PRODUCTION_UTF8_URL = 'https://secure.ogone.com/ncol/prod/orderdirect_utf8.asp';

	/////////////////////////////////////////////////

	/**
	 * Constructs and initializes an Ogone DirectLink object
	 */
	public function __construct() {

	}
}
