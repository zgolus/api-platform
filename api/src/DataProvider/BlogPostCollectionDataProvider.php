<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\BlogPost;
use App\Entity\Image;

final class BlogPostCollectionDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
{
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return BlogPost::class === $resourceClass;
    }

    public function getCollection(string $resourceClass, string $operationName = null): \Generator
    {
        $post1 = new BlogPost(1);
        $post1->images->add(new Image(1, 'flowers.jpg'));
        $post2 = new BlogPost(2);
        $post2->images->add(new Image(2, 'cars.jpg'));

        yield $post1;
        yield $post2;
    }
}

