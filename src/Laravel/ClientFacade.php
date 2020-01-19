<?php
namespace Mzcoding\Laravel;

use Mzcoding\Dadata\Client; 
use Illuminate\Support\Facades\Facade;

class ClientFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Client::class;
    }
}
