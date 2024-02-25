<?php

namespace App\Interfaces\Repositories;

use Illuminate\Support\Collection;

interface IUserRepository extends ICrud
{
    public function getUsersByIds(array $userIds);

    public function getAllWithPaginate(int $page, int $perPage, array $columns);
}
