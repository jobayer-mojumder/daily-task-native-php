<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\RepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;
    protected $defaultOrder = null;

    public function all(): ?Collection
    {
        if (!is_null($this->defaultOrder)) {
            return $this->model->orderBy($this->defaultOrder[0], $this->defaultOrder[1])->get();
        }
        return $this->model->all();
    }

    public function create(Request $request): Model
    {
        return $this->model->create($request->all());
    }

    public function destroy(int $id): Model
    {
        $this->model->destroy($id);
        return $this->model;
    }

    public function findOrFail(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function findByColumn(string $column, string $value): ?Model
    {
        $result = $this->model->where($column, $value)->first();
        if (is_null($result == null)) {
            abort(403);
        }
        return $result;
    }

    public function findTrashed(int $id): ?Model
    {
        return $this->model->onlyTrashed()
            ->find($id);
    }

    public function paginate(int $limit): LengthAwarePaginator
    {
        if (!is_null($this->defaultOrder)) {
            return $this->model->orderBy($this->defaultOrder[0], $this->defaultOrder[1])->paginate($limit);
        }
        return $this->model->paginate($limit);
    }

    public function update(int $id, Request $request): Model
    {
        $object = $this->model->findOrFail($id);
        $object->fill($request->all());
        $object->save();
        return $object;
    }

    public function pluck(string $column, string $key = null): array
    {
        return $this->model->get()->pluck($column, $key);
    }

    public function insert(array $rows): void
    {
        $this->model->insert($rows);
    }
}
