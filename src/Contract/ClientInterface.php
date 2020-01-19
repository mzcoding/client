<?php
namespace Mzcoding\Contract;

use Mzcoding\Client;
use Mzcoding\Response;

interface ClientInterface
{
    /**
     * @return \GuzzleHttp\Client|null
     */
    function getClient(): ?\GuzzleHttp\Client;
    function clientInit(array $config = []): \GuzzleHttp\Client;

    /**
     * @param array $headers
     * @return Client
     */
    function setHeaders(array $headers = []): Client;

    /**
     * @param $url
     * @param string $method
     * @param array $params
     * @return Response
     */
    function request($url, $method = 'GET', array $params = []): Response;

}