<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Accaunt;
use App\Repository\AccauntRepository;
use ApiPlatform\Core\DataProvider\PaginatorInterface;

final class AccauntCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    /**
     * @var AccauntRepository
     */
    private $accauntRepository;


    /**
     * @param AccauntRepository $accauntRepository
     */
    public function __construct(
        AccauntRepository $accauntRepository
    ) {
        $this->accauntRepository = $accauntRepository;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Accaunt::class === $resourceClass;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): array
    {
        $array  = $this->accauntRepository->findAll();
        // Retrieve the blog post collection from somewhere
        return $array;
    }
}