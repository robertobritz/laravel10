<?php

namespace App\Services;

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

    public function new(
            string $subject,
            string $status,
            string $body,
    ): stdClass // classe genérica
    {
        return $this->repository->new(
                $subject,
                $status,
                $body,);
    }

    public function update(
        string $id,
        string $subject,
        string $status,
        string $body,
    ): stdClass|null // classe genérica
    {
        return $this->repository->update(
            $id,
            $subject,
            $status,
            $body,
    );
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }



}