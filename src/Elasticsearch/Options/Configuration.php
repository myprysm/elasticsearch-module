<?php
/**
 * User: damien
 * Date: 10/17/13
 * Time: 10:24 AM
 * © Social Unit, tous droits réservés,
 * La reproduction ou l'utilisation de tout ou partie de ce code est interdite.
 */

namespace Elasticsearch\Options;


use Elasticsearch\Exception\IllegalParameterException;
use Monolog\Logger;
use Zend\Stdlib\AbstractOptions;

class Configuration extends AbstractOptions {
    /**
     * An array containing the different hosts for the elasticsearch cluster.
     * e.g. array('127.0.0.1', 'es.server.com:9200')
     * @var array
     */
    private $hosts = array("127.0.0.1");

    /**
     * Logger object used to log elasticsearch
     * @var Logger
     */
    private $logObject = null;

    /**
     * Storage path for log
     * @var string
     */
    private $logPath = "elasticsearch.log";

    /**
     * Log level for log logger
     * @var int
     */
    private $logLevel = \Monolog\Logger::WARNING;

    /**
     * Logger object used to trace elasticsearch
     * @var Logger
     */
    private $traceObject = null;

    /**
     * Storage path for trace
     * @var string
     */
    private $tracePath = "elasticsearch.log";

    /**
     * Log level for trace logger
     * @var int
     */
    private $traceLevel = \Monolog\Logger::WARNING;

    /**
     * Guzzle additionnal opts
     * @var array
     */
    private $guzzleOptions = array();

    /**
     * Connection class name used by elasticsearch client
     * @var string
     */
    private $connectionClass = '\Elasticsearch\Connections\GuzzleConnection';

    /**
     * Connection factory class name used by elasticsearch client
     * @var string
     */
    private $connectionFactoryClass = '\Elasticsearch\Connections\ConnectionFactory';

    /**
     * Connection pool class name used by elasticsearch client
     * @var string
     */
    private $connectionPoolClass = '\Elasticsearch\ConnectionPool\StaticConnectionPool';

    /**
     * Additionnal connection pool parameters
     * @var array
     */
    private $connectionPoolParams = array('randomizeHosts' => true);

    /**
     * Node selector class name to allow elasticsearch client to chose on which node to query data
     * @var string
     */
    private $selectorClass = '\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector';

    /**
     * Serializer class name for array to json conversions
     * @var string
     */
    private $serializerClass = '\Elasticsearch\Serializers\ArrayToJSONSerializer';


    /**
     * Indicates if the client has to sniff on start
     * @var bool
     */
    private $sniffOnStart = false;

    /**
     * Additionnal connection parameters
     * @var array
     */
    private $connectionParams = array();

    /**
     * @param string $connectionClass
     */
    public function setConnectionClass($connectionClass) {
        if (!is_string($connectionClass)) {
            throw new IllegalParameterException("Connection class has to be a string");
        }

        $this->connectionClass = $connectionClass;
    }

    /**
     * @return string
     */
    public function getConnectionClass() {
        return $this->connectionClass;
    }

    /**
     * @param string $connectionFactoryClass
     */
    public function setConnectionFactoryClass($connectionFactoryClass) {
        if (!is_string($connectionFactoryClass)) {
            throw new IllegalParameterException("Connection factory class has to be a string");
        }

        $this->connectionFactoryClass = $connectionFactoryClass;
    }

    /**
     * @return string
     */
    public function getConnectionFactoryClass() {
        return $this->connectionFactoryClass;
    }

    /**
     * @param array $connectionParams
     */
    public function setConnectionParams($connectionParams) {
        if (!is_array($connectionParams)) {
            throw new IllegalParameterException("Connection parameters have to be an array");
        }

        $this->connectionParams = $connectionParams;
    }

    /**
     * @return array
     */
    public function getConnectionParams() {
        return $this->connectionParams;
    }

    /**
     * @param string $connectionPoolClass
     */
    public function setConnectionPoolClass($connectionPoolClass) {
        if (!is_string($connectionPoolClass)) {
            throw new IllegalParameterException("Connection pool class has to be a string");
        }

        $this->connectionPoolClass = $connectionPoolClass;
    }

    /**
     * @return string
     */
    public function getConnectionPoolClass() {
        return $this->connectionPoolClass;
    }

    /**
     * @param array $connectionPoolParams
     */
    public function setConnectionPoolParams($connectionPoolParams) {
        if (!is_array($connectionPoolParams)) {
            throw new IllegalParameterException("Connection pool parameters have to be an array");
        }

        $this->connectionPoolParams = $connectionPoolParams;
    }

    /**
     * @return array
     */
    public function getConnectionPoolParams() {
        return $this->connectionPoolParams;
    }

    /**
     * @param array $guzzleOptions
     */
    public function setGuzzleOptions($guzzleOptions) {
        if (!is_array($guzzleOptions)) {
            throw new IllegalParameterException("Guzzle options have to be an array");
        }

        $this->guzzleOptions = $guzzleOptions;
    }

    /**
     * @return array
     */
    public function getGuzzleOptions() {
        return $this->guzzleOptions;
    }

    /**
     * @param array $hosts
     */
    public function setHosts($hosts) {
        if (is_string($hosts)) {
            $hosts = array($hosts);
        }

        if (!is_array($hosts)) {
            throw new IllegalParameterException("Hosts has to be set as a single string or an array of strings");
        }

        $this->hosts = $hosts;
    }

    /**
     * @return array
     */
    public function getHosts() {
        return $this->hosts;
    }

    /**
     * @param int $logLevel
     */
    public function setLogLevel($logLevel) {
        if (!is_int($logLevel)) {
            throw new IllegalParameterException("Log level has to be an integer (@see Monolog\\Logger class for log levels)");
        }
        $this->logLevel = $logLevel;
    }

    /**
     * @return int
     */
    public function getLogLevel() {
        return $this->logLevel;
    }

    /**
     * @param \Monolog\Logger $logObject
     */
    public function setLogObject($logObject) {
        if (!($logObject instanceof Logger)) {
            throw new IllegalParameterException("Logger has to be an instance of Monolog\\Logger for Elasticsearch Client");
        }

        $this->logObject = $logObject;
    }

    /**
     * @return \Monolog\Logger
     */
    public function getLogObject() {
        return $this->logObject;
    }

    /**
     * @param string $logPath
     */
    public function setLogPath($logPath) {
        if (!is_string($logPath)) {
            throw new IllegalParameterException("Log path has to be a string");
        }

        $this->logPath = $logPath;
    }

    /**
     * @return string
     */
    public function getLogPath() {
        return $this->logPath;
    }

    /**
     * @param string $selectorClass
     */
    public function setSelectorClass($selectorClass) {
        if (!is_string($selectorClass)) {
            throw new IllegalParameterException("Selector class has to be a string");
        }

        $this->selectorClass = $selectorClass;
    }

    /**
     * @return string
     */
    public function getSelectorClass() {
        return $this->selectorClass;
    }

    /**
     * @param string $serializerClass
     */
    public function setSerializerClass($serializerClass) {
        if (!is_string($serializerClass)) {
            throw new IllegalParameterException("Serializer class has to be a string");
        }

        $this->serializerClass = $serializerClass;
    }

    /**
     * @return string
     */
    public function getSerializerClass() {
        return $this->serializerClass;
    }

    /**
     * @param boolean $sniffOnStart
     */
    public function setSniffOnStart($sniffOnStart) {
        if (!is_bool($sniffOnStart)) {
            throw new IllegalParameterException("Sniff on start parameter is expected as boolean value");
        }

        $this->sniffOnStart = $sniffOnStart;
    }

    /**
     * @return boolean
     */
    public function getSniffOnStart() {
        return $this->sniffOnStart;
    }

    /**
     * @param int $traceLevel
     */
    public function setTraceLevel($traceLevel) {
        if (!is_int($traceLevel)) {
            throw new IllegalParameterException("Trace log level has to be an integer (@see Monolog\\Logger class for log levels)");
        }

        $this->traceLevel = $traceLevel;
    }

    /**
     * @return int
     */
    public function getTraceLevel() {
        return $this->traceLevel;
    }

    /**
     * @param \Monolog\Logger $traceObject
     */
    public function setTraceObject($traceObject) {
        if (!($traceObject instanceof Logger)) {
            throw new IllegalParameterException("Logger has to be an instance of Monolog\\Logger for Elasticsearch Client");
        }

        $this->traceObject = $traceObject;
    }

    /**
     * @return \Monolog\Logger
     */
    public function getTraceObject() {
        return $this->traceObject;
    }

    /**
     * @param string $tracePath
     */
    public function setTracePath($tracePath) {
        if (!is_string($tracePath)) {
            throw new IllegalParameterException("Trace path has to be a string");
        }

        $this->tracePath = $tracePath;
    }

    /**
     * @return string
     */
    public function getTracePath() {
        return $this->tracePath;
    }


}