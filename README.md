Elasticsearch Module for Zend Framework 2
=========================================

###1. Installation

As easy as it can be with Composer, just run the following command :

    php <composer.phar> require myprysm/elasticsearch-module dev-master

Or add this line to your composer.json file in the require section :

    "myprysm/elasticsearch-module": "dev-master"

Then update your composer dependencies

    php <composer.phar> update



###2. Configuration

First add the module to your application's requirements :

In the file application.config.php, in the module section, add an "Elasticsearch" entry

All the options provided by the official Elasticsearch PHP API are supported. For more informations about
Elasticsearch client configuration can be found on the [official elasticsearch guide](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/_configuration.html)

The full list of configurations is accessible [here](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/_configuration.html#_full_list_of_configurations)


###3. Use

A client instance can easily be retrieved through service manager :

    $client = $serviceManager->get("Elasticsearch\Client")

For more informations about the use of the PHP Elasticsearch client, get a look to the [official documentation](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/index.html)





