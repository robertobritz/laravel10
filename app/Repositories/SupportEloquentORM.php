<?php 

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use app\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function getAll(string $filter = null): array
    {

    }
    public function findOne(string $id): stdClass|null
    {

    }
    public function delete(string $id): void
    {

    }
    public function new(CreateSupportDTO $dto): stdClass
    {

    }
    public function update(UpdateSupportDTO $dto): stdClass|null
    {

    }
}