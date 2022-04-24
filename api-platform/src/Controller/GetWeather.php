<?php

namespace App\Controller;


use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(itemOperations={
 *     "get": {
 *         "method": "GET"
 *     }
 * })
 */
class GetWeather
{
    public function __invoke($id): string
    {
        $a = 10;
        return 'hello world';
    }
}