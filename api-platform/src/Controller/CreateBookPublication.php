<?php
namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\Routing\Annotation\Route;

class CreateBookPublication
{


    /**
     * @Route(
     *     name="product_post_publication",
     *     path="/products/{id}/publication",
     *     methods={"POST"},
     *     defaults={
     *         "_api_resource_class"=Product::class,
     *         "_api_item_operation_name"="post_publication"
     *     }
     * )
     */
    public function __invoke(Product $data): Product
    {
        dd($data);

        return $data;
    }
}