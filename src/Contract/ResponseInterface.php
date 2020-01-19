<?php


namespace Mzcoding\Contract;


use GuzzleHttp\Psr7\Response as GuzzleResponse;

interface ResponseInterface
{
    function get(): GuzzleResponse;
}