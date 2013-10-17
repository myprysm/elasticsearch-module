<?php
/**
 * User: damien
 * Date: 10/17/13
 * Time: 10:19 AM
 * © Social Unit, tous droits réservés,
 * La reproduction ou l'utilisation de tout ou partie de ce code est interdite.
 */

namespace Elasticsearch\Factory;


use Elasticsearch\Client;
use Elasticsearch\Options\Configuration;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ClientFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('Config');

        $es_conf = new Configuration($config['elasticsearch']);

        return new Client($es_conf->toArray());
    }

}