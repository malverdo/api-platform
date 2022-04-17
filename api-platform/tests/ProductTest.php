<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use Symfony\Component\HttpFoundation\Response;

class ProductTest extends ApiTestCase
{
    /**
     * @return void
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function testGetProduct():void
    {
        //стучится в бд test_api
        $harry = static::createClient();
        $response = static::createClient()->request('GET', 'http://localhost/api/products');
        $a = 0;
        $this->assertEquals(Response::HTTP_CREATED, $harry->getResponse()->getStatusCode());


    }
}