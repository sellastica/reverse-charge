<?php
namespace Sellastica\ReverseCharge;

class ReverseCharge
{
	/** @var \Sellastica\Localization\Model\Country */
	private $ownCountry;


	/**
	 * @param \Sellastica\Localization\Model\Country $ownCountry
	 */
	public function __construct(\Sellastica\Localization\Model\Country $ownCountry)
	{
		$this->ownCountry = $ownCountry;
	}

	/**
	 * @param \Sellastica\Localization\Model\Country $country
	 * @param string|null $tin VAT ID
	 * @return bool
	 */
	public function isReverseChargeCandidate(
		\Sellastica\Localization\Model\Country $country,
		string $tin = null
	): bool
	{
		if (!$this->ownCountry->isEuCountry()
			|| !$country->isEuCountry()
			|| empty($tin)) {
			return false;
		}

		return true;
	}
}