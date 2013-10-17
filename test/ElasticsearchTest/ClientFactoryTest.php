<?php
/**
 * User: damien
 * Date: 10/17/13
 * Time: 11:11 AM
 * © Social Unit, tous droits réservés,
 * La reproduction ou l'utilisation de tout ou partie de ce code est interdite.
 */

namespace ElasticsearchTest\ElasticsearchTest;


class ClientFactoryTest extends \PHPUnit_Framework_TestCase {

    public function testCreateClient() {
        $client = \ElasticsearchTest\Bootstrap::getServiceManager()->get('Elasticsearch\Client');
        $this->assertNotNull($client, "The client should have been instanciated");
    }

    /**
     * @depends testCreateClient
     */
    public function testClientConnect() {
        $client = \ElasticsearchTest\Bootstrap::getServiceManager()->get('Elasticsearch\Client');
        /* @var $client \Elasticsearch\Client */
        $info = $client->info();

        $this->assertNotEmpty($info, "The es client should have retrieve some informations about cluster");
        $this->assertTrue($info['ok'], "Client is normally connected");
        $this->assertEquals(200, $info['status'], 'Node status should be equal to 200');

    }

}