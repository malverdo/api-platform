<?php

namespace App\Controller;


use ApiPlatform\Core\Annotation\ApiResource;


class GetWeather
{
    public function __invoke($id): string
    {
        $a = 10;
        return 'hello world';
    }
}