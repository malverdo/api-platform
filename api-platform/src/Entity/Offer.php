<?php
// api/src/Entity/Offer.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Filter\RegexpFilter;
use App\Controller\ListeEquipementsController;
use App\Controller\GetWeather;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\ExistsFilter;
use ApiPlatform\Core\Serializer\Filter\GroupFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;


//              "controller"=ListeEquipementsController::class
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
 *         },
 *              "get_weather": {
 *             "method": "GET",
 *             "path": "/places/{id}/weather",
 *             "controller": GetWeather::class
 *              }
 *     }
 *
 * )
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "price": "exact","product.id": "exact"})
 * @ApiFilter(BooleanFilter::class, properties={"bool"})
 * @ApiFilter(DateFilter::class, properties={"createdAt": DateFilter::EXCLUDE_NULL})
 * @ApiFilter(ExistsFilter::class, properties={"createdAt", "bool"})
 * @ApiFilter(GroupFilter::class, arguments={"parameterName": "groups", "overrideDefaultGroups": false, "whitelist": {"list"}})
 * @ApiFilter(RegexpFilter::class, properties={"description"})
 * @ApiFilter(PropertyFilter::class)
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
     * @Groups({"list"})
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
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank(message="не указана цена")
     */
    public $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="offers")
     */
    public $product;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\NotNull( message="не указана bool")
     * @Assert\Type(type="bool",message="не булл")
     */
    public $bool;

    public function getId(): ?int
    {
        return $this->id;
    }
}