<?php
/**
 * User: damien
 * Date: 10/17/13
 * Time: 11:01 AM
 * © Social Unit, tous droits réservés,
 * La reproduction ou l'utilisation de tout ou partie de ce code est interdite.
 */

return array(
    'elasticsearch' => array(
        'hosts' => array('127.0.0.1')
    ),
    'service_manager' => array(
        'factories' => array(
            'Elasticsearch\Client' => 'Elasticsearch\Factory\ClientFactory'
        )
    )
);