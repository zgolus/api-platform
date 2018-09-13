<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     itemOperations={
 *          "get",
 *     },
 *     collectionOperations={
 *       "get","post"
 *     },
 *     attributes={
 *          "denormalization_context"={
 *              "groups"={"write"}
 *          },
 *          "normalization_context"={
 *              "groups"={"read"}
 *          }
 *     }
 * )
 */
class BlogPost
{
    /**
     * @var int
     * @ApiProperty(identifier=true)
     * @Groups({"read"})
     */
    private $id;

    /**
     * @var string
     * @ApiProperty()
     * @Groups({"read", "write"})
     */
    public $title;

    /**
     * @var string
     * @ApiProperty()
     * @Groups({"read", "write"})
     */
    public $author;

    /**
     * @var Image[]
     * @ApiSubresource()
     * @Groups({"read", "write"})
     */
    public $images;

    public function __construct(int $id) {
        $this->id     = $id;
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}