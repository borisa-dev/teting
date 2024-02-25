<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\Repositories\IUserRepository;

class UserRepository implements IUserRepository
{
    use CrudTrait;


    public function getModel(): Builder
    {
        return User::query();
    }

    public function getAllWithPaginate(int $page = 1, int $perPage = 15, $columns = ['*']): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->getModel()->paginate($perPage, $columns, 'page', $page);
    }

    public function getUsersByIds(array $userIds): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->getModel()->whereIn('id', $userIds)->get();
    }
}
