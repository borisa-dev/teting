<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use app\Interfaces\Repositories\IUserRepository;

class UserController extends Controller
{

    public function __construct(public IUserRepository $userRepository)
    {
    }

    /**
     * @return UserCollection
     */
    public function index()
    {
        return new UserCollection($this->userRepository->getAllWithPaginate(columns: ['name', 'email', 'created_at']));
    }

    /**
     * @param StoreUserRequest $request
     * @return UserResource
     */
    public function store(StoreUserRequest $request): UserResource
    {
        return new UserResource($this->userRepository->create($request->all()));
    }

    /**
     * @param string $id
     * @return UserResource
     */
    public function show(string $id): UserResource
    {
        return new UserResource($this->userRepository->findById($id));
    }

    /**
     * @param UpdateUserRequest $request
     * @param string            $id
     * @return mixed
     */
    public function update(UpdateUserRequest $request, string $id): mixed
    {
        return $this->userRepository->update($id, $request->all());
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function destroy(string $id)
    {
        return $this->userRepository->deleteById($id);
    }
}
