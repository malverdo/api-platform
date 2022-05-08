<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Accaunt;
use App\Repository\AccauntRepository;

class AccauntDataPersister implements ContextAwareDataPersisterInterface
{
    public $accauntRepository;

    public function __construct(AccauntRepository $accauntRepository)
    {
        $this->accauntRepository = $accauntRepository;
    }


    public function supports($data, array $context = []): bool
    {
        return $data instanceof Accaunt;
    }

    public function persist($data, array $context = [])
    {
        // call your persistence layer to save $data
        $this->accauntRepository->save($data);
        return $data;
    }

    public function remove($data, array $context = [])
    {
        // call your persistence layer to delete $data
        $a = 0;
    }
}