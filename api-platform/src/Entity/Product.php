<?php
// api/src/Entity/Product.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity
 * @ApiFilter(SearchFilter::class, properties={ "name": "partial"})
 *
 */
class Product // The class name will be used to name exposed resources
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name хоть что-то на русском
     *
     * @ORM\Column
     * @Assert\NotBlank
     * @Groups({"write"})
     */
    public $name;

    // Notice the "cascade" option below, this is mandatory if you want Doctrine to automatically persist the related entity
    /**
     * @ORM\OneToMany(targetEntity="Offer", mappedBy="product", cascade={"persist"})
     * @Groups({"write"})
     */
    public $offers;

    /**
     * @ORM\OneToMany(targetEntity="Accaunt", mappedBy="product", cascade={"persist"})
     * @Groups({"write"})
     */
    public $accaunt;

    public function __construct()
    {
        $this->offers = new ArrayCollection(); // Initialize $offers as a Doctrine collectio
        $this->accaunt = new ArrayCollection(); // Initialize $offers as a Doctrine collectio
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // Adding both an adder and a remover as well as updating the reverse relation is mandatory
    // if you want Doctrine to automatically update and persist (thanks to the "cascade" option) the related entity
    public function addOffer(Offer $offer): void
    {
        $offer->product = $this;
        $this->offers->add($offer);
    }

    public function removeOffer(Offer $offer): void
    {
        $offer->product = null;
        $this->offers->removeElement($offer);
    }

}