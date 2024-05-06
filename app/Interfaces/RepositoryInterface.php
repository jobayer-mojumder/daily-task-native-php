<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    public function all(): ?Collection;
    public function findOrFail(int $id): ?Model;
    public function find(int $id): ?Model;
    public function findByColumn(string $column, string $value): ?Model;
}
