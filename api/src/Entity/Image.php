<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 */
class Image
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
    public $fileName;

    /**
     * @var BlogPost
     * @ApiProperty()
     * @Groups({"read", "write"})
     */
    public $blogPost;

    /**
     * @param int $id
     * @param string $fileName
     */
    public function __construct(int $id, string $fileName)
    {
        $this->id = $id;
        $this->fileName = $fileName;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
}

