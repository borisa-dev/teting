<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait CrudTrait
{
    abstract public function getModel(): Builder;

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->getModel()->get();
    }

    public function create(array $data): \Illuminate\Database\Eloquent\Model|Builder
    {
        return $this->getModel()->create($data);
    }

    public function findById($id): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|Builder|array|null
    {
        return $this->getModel()->findOrFail($id);
    }

    public function update($id, array $data): mixed
    {
        $record = $this->findById($id);
        $record->fill($data)->save();
        return $record;
    }

    public function deleteById($id)
    {
        return $this->findById($id)->delete();
    }
}
