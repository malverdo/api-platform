<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Validator\Constraints\MinimalProperties;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Action\NotFoundAction;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 *  @ApiResource(
 *     attributes={"security"="is_granted('ROLE_ADMINQ') or object.description == 'text cool'"},
 *     collectionOperations={"get"={
         "openapi_context"= {"description" = "# Pop a great rabbit picture by color!\n\n!"}
 *     },
 *     "post"={"validation_groups"={"test"}}
 *     },
 *     normalizationContext={"groups"={"write"},"jsonld_embed_context"=true},
 *     subresourceOperations={
 *          "api_products_accaunt_get_subresource"={
 *              "method"="GET"
 *          },
 *      }
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
     * @Groups({"write"})
     */
    public $description;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="не указана цена")
     * @Assert\Range(min=0, minMessage="The price must be superior to 0.")
     * @Assert\Type(type="float")
     * @Groups({"write"})
     */
    public $price;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank(message="не указана цена")
     * @Groups({"write"})
     */
    public $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="accaunt")
     * @Groups({"write"})
     * @ApiProperty(readableLink=false, writableLink=false)
     * @ApiSubresource
     */
    public $product;

    /**
     * @ORM\Column(type="text")
     * @Groups({"write"})
     * @Assert\NotBlank(groups={"test"},  message="нет name ", payload={"severity": "warning"})
     */
    public $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\NotNull( message="не указана bool")
     * @Assert\Type(type="bool",message="не булл")
     * @Groups({"write"})
     */
    public $bool;

    /**
     * @var string[] Describe the product
     * @Groups({"write"})
     * @MinimalProperties(groups={"test"})
     * @ORM\Column(type="json", nullable=true)
     */
    public $properties;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups({"write"})
     */
    public function getWrite(): int
    {
        return $b = $this->id + 9;
    }
}