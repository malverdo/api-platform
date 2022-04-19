<?php
namespace App\Controller;

use App\Entity\Offer;
use Symfony\Component\Routing\Annotation\Route;

class CreateBookPublication
{


    /**
     * @Route(
     *     name="book_post_publication",
     *     path="/books/{id}/publication",
     *     methods={"POST"},
     *     defaults={
     *         "_api_resource_class"=Offer::class,
     *         "_api_item_operation_name"="post_publication"
     *     }
     * )
     */
    public function __invoke(Offer $data): Offer
    {
        dd($data);

        return $data;
    }
}