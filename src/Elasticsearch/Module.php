<?php
/**
 * User: damien
 * Date: 10/17/13
 * Time: 10:17 AM
 * © Social Unit, tous droits réservés,
 * La reproduction ou l'utilisation de tout ou partie de ce code est interdite.
 */

namespace Elasticsearch;


class Module {

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig() {
        return include __DIR__ . '/../../config/module.config.php';
    }
}