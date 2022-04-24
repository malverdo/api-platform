<?php
// api/src/Entity/Offer.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\ListeEquipementsController;
use App\Controller\GetWeather;

/**
 * An offer from my shop - this description will be automatically extracted from the PHPDoc to document the API.
 *
 * @ApiResource(
 *     collectionOperations={
 *         "get","post"
 *     },
 *      itemOperations={
 *         "get" : {
 *             "path"="/offers/{id}",
 *             "requirements"={"id"="\d+"},
 *             "defaults"={"color"="blue"},
 *             "options"={"my_option"="2"},
 *             "schemes"={"http"},
 *             "host"="api-platform.local",
 *             "controller"=ListeEquipementsController::class
 *         },
 *              "get_weather": {
 *             "method": "GET",
 *             "path": "/places/{id}/weather",
 *             "controller": GetWeather::class
 *              }
 *     }
 *
 * )
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "price": "exact", "description": "partial"})
 * @ORM\Entity
 */
class Offer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    public $description;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="не указана цена")
     * @Assert\Range(min=0, minMessage="The price must be superior to 0.")
     * @Assert\Type(type="float")
     */
    public $price;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="offers")
     */
    public $product;

    public function getId(): ?int
    {
        return $this->id;
    }
}