<?php
namespace Mzcoding;

use Mzcoding\Config;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Client as GuzzleClient;

/**
 * @method getReasonPhrase()
 */
class Client
{
	protected $client, $config;
	protected $params, $headers, $auth = [];

    public function __construct(Config $config, bool $init = true)
    {
       $this->config = $config;
        	
       if($init) {
          $this->clientInit($config);
       }
    }
   /**
     * Get current client instance
     *
     * @return null|\GuzzleHttp\Client
     */
    public function getClient(): ?\GuzzleHttp\Client
    {
        return $this->client;
    }

    public function clientInit(array $config = []): \GuzzleHttp\Client
    {
       return new \GuzzleHttp\Client($config);
    }

    /**
     * @param array $headers
     * @return Client
     */
   public function setHeaders(array $headers = []): Client
   {
       $this->headers = array_merge($this->headers, $headers);
       return $this;
   }
    /**
     * @return array
     */
   public function getHeaders(): array
   {
      return $this->headers;
   }
    /**
     * @param array $credentials
     * @return Client
     */
    public function setAuth(array $credentials = []): Client
    {
        $this->auth = $credentials;
        return $this;
    }

    /**
     * @return array
     */
    public function getAuth(): array
    {
        return (array)$this->auth;
    }

    public function request(string $url, string $method = 'GET', array $params = []): Response
    {
       $method = strtoupper($method);
       $params['headers'] = $this->getHeaders();
       if( $this->auth ) {
           $options['auth'] = $this->auth;
       }
       if((bool)$this->config['debug']) {
           $options['debug'] = (bool)$this->config['debug'];
       }

       $response = $this->client->request($method, $this->config['base_url'] . "/" . $url, $params);
       return new Response($response);
    }

}