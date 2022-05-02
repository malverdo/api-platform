<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 *  @ApiResource(
 *     collectionOperations={"get","post"},
 *     itemOperations={"get"}
 * )
 *  @ORM\Entity
 */
class Accaunt
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
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank(message="не указана цена")
     */
    public $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="accaunt")
     */
    public $product;

    /**
     * @ORM\Column(type="text")
     */
    public $name;

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