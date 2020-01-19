<?php

namespace Mzcoding;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Mzcoding\Contract\ResponseInterface;


class Response implements ResponseInterface
{
    private $response;

    /**
     * Response constructor.
     * @param Response $response
     */
    public function __construct(GuzzleResponse $response)
    {
        $this->response = $response;
    }


    /**
     * @return \App\Classes\Client\Guzzle\Response
     */
    public function get(): GuzzleResponse
    {
        return $this->response;
    }
}