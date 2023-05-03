<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

class SupportService //elo do nosso repositório para o nossos controllers
{
    protected $repository;

    public function __construct()
    {
        
    }
    
    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null // stdClass é utilizado no Laravel como um objeto genérico para manipulação de dados, especialmente em casos onde a estrutura dos dados não é conhecida antecipadamente.
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateSupportDTO $dto): stdClass // classe genérica
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateSupportDTO $dto): stdClass|null // classe genérica
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }



}