<?php

namespace Pronamic\WordPress\Pay\Gateways\Ingenico;

use Pronamic\WordPress\Pay\Gateways\Ingenico\DataGeneralHelper;
use Pronamic\WordPress\Pay\Gateways\Ingenico\DataHelper;

/**
 * Title: Ingenico data customer helper class
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @see     https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/e-commerce
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.3.0
 */
class DataCustomerHelper extends DataHelper {
	/**
	 * Set customer name.
	 *
	 * Will be pre-initialised (but still editable) in the Customer Name field of the credit card details.
	 *
	 * @param string $email
	 *
	 * @return DataGeneralHelper
	 */
	public function set_name( $name ) {
		return $this->set_field( 'CN', $name );
	}

	/**
	 * Set customer email address.
	 *
	 * @param string $email
	 *
	 * @return DataGeneralHelper
	 */
	public function set_email( $email ) {
		return $this->set_field( 'EMAIL', $email );
	}

	/**
	 * Set customer street name and number.
	 *
	 * @param string $adress
	 *
	 * @return DataGeneralHelper
	 */
	public function set_address( $address ) {
		return $this->set_field( 'OWNERADDRESS', $address );
	}

	/**
	 * Set customer postcode or ZIP code.
	 *
	 * @param string $zip
	 *
	 * @return DataGeneralHelper
	 */
	public function set_zip( $zip ) {
		return $this->set_field( 'OWNERZIP', $zip );
	}

	/**
	 * Set customer town/city/...
	 *
	 * @param string $town
	 *
	 * @return DataGeneralHelper
	 */
	public function set_town( $town ) {
		return $this->set_field( 'OWNERTOWN', $town );
	}

	/**
	 * Set customer country.
	 *
	 * @param string $city
	 *
	 * @return DataGeneralHelper
	 */
	public function set_country( $country ) {
		return $this->set_field( 'OWNERCTY', $country );
	}

	/**
	 * Set customer telephone number.
	 *
	 * @param string $number
	 *
	 * @return DataGeneralHelper
	 */
	public function set_telephone_number( $number ) {
		return $this->set_field( 'OWNERTELNO', $number );
	}
}
