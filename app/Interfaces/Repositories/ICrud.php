<?php

namespace app\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Builder;

interface ICrud
{
    public function getModel(): Builder;

    public function getAll();

    public function create(array $data);

    public function update($id, array $data): mixed;

    public function findById($id);

    public function deleteById($id);
}
