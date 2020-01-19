<?php
namespace Mzcoding\Dadata;

use GuzzleHttp\Exception\ClientException;
use Mzcoding\Config;
use Mzcoding\Client as BaseClient;

class Client 
{
    /**
     * Return Dadata API client object
     *
     * @param array $params
     *
     * @return \Mzcoding\Client
     */
    public function getClient(array $params = []): BaseClient
    {
        $parameters = config('mzcoding-client');
        $parameters = array_merge($parameters, $params);
        /** @var TYPE_NAME $parameters */
        $config     = new Config($parameters);
        $response =  new BaseClient($config);
        $code = $response->getStatusCode();
        if($code !== 200 || $code !== 201) {
            /** @var TYPE_NAME $code */
            throw new ClientException("Error exception: " . $code);
        }

        if ($code !== 429) {
            /** @var TYPE_NAME $response */
            throw new ClientException($code . ' ' . $response->getReasonPhrase());
        }

        return $response;
    }
	 
}