<?php
/**
 * This file is part of the Ecommerce-Vouchers package
 *
 * @package Ecommerce-Shipping
 */

/**
 * Shipping namespace
 */
namespace Heystack\Subsystem\Shipping;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

use Heystack\Subsystem\Core\ContainerExtensionConfigProcessor;

/**
 * Container extension for Heystack.
 *
 * If Heystacks services are loaded as an extension (this happens when there is
 * a primary services.yml file in mysite/config) then this is the container
 * extension that loads heystacks services.yml
 *
 * @copyright  Heyday
 * @author Glenn Bautista <glenn@heyday.co.nz>
 * @author Cam Spiers <cameron@heyday.co.nz>
 * @package Ecommerce-Vouchers
 *
 */
class ContainerExtension extends ContainerExtensionConfigProcessor implements ExtensionInterface
{

    /**
     * Loads a services.yml file into a fresh container, ready to me merged
     * back into the main container
     *
     * @param  array            $config
     * @param  ContainerBuilder $container
     * @return null
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(ECOMMERCE_SHIPPING_BASE_PATH . '/config')
        );

        $loader->load('services.yml');
        
        $this->processConfig($config, $container);
    }

    /**
     * Returns the namespace of the container extension
     * @return type
     */
    public function getNamespace()
    {
        return 'shipping';
    }

    /**
     * Returns Xsd Validation Base Path, which is not used, so false
     * @return boolean
     */
    public function getXsdValidationBasePath()
    {
        return false;
    }

    /**
     * Returns the container extensions alias
     * @return type
     */
    public function getAlias()
    {
        return 'shipping';
    }

}