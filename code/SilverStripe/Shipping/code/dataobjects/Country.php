<?php

use Heystack\Subsystem\Shipping\Types\CountryBased\Interfaces\CountryInterface;
use Heystack\Subsystem\Shipping\Traits\CountryTrait;

class Country extends DataObject implements CountryInterface
{
    use CountryTrait;

    public static $db = array(
        'Name' => 'Varchar(255)',
        'CountryCode' => 'Varchar(255)',
        'ShippingCost' => 'Decimal(10,2)'
    );

    public static $summary_fields = array(
        'Name',
        'CountryCode',
        'ShippingCost'
    );

    public function getShippingCost()
    {
        $price = $this->record['ShippingCost'];

        $currencyService = Heystack\Subsystem\Core\ServiceStore::getService(Heystack\Subsystem\Ecommerce\Currency\CurrencyService::STATE_KEY);

        $activeCurrencyCode = $currencyService->getActiveCurrency()->getIdentifier();

        switch ($activeCurrencyCode) {
            case 'NZD':
                $price *= 1;
                break;
            case 'USD':
                $price *= 2;
                break;
            default:
                $price *= 3;
                break;
        }

        return $price;
    }
}
