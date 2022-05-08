<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ApiResource(subresourceOperations={
 *     "api_questions_answer_get_subresource"={
 *         "method"="GET",
 *         "normalization_context"={"groups"={"foobar"}}
 *     }
 * })
 */
class Answer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @ORM\Column
     * @Groups({"foobar"})
     */
    public $content;

    /**
     * @ORM\OneToOne(targetEntity="Question", mappedBy="answer")
     */
    public $question;

    public function getId(): ?int
    {
        return $this->id;
    }
}