<?php
/**
 * This file is part of the Ecommerce-Vouchers package
 *
 * @package Ecommerce-Shipping
 */

/**
 * Interfaces namespace
 */
namespace Heystack\Shipping\Types\CountryBased\Interfaces;

use Heystack\Ecommerce\Locale\Interfaces\CountryInterface as CountryBaseInterface;

/**
 * Defines what methods/functions a Country class needs to implement
 *
 * @copyright  Heyday
 * @author Glenn Bautista <glenn@heyday.co.nz>
 * @package Ecommerce-Shipping
 */
interface CountryInterface extends CountryBaseInterface
{
    /**
     * Returns the cost of shipping to the country in question
     * @return \SebastianBergmann\Money\Money
     */
    public function getShippingCost();
}
