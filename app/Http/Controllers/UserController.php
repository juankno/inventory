<?php

namespace App\Http\Controllers;

use App\Http\Requests\Filters\UserFilterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{

    public function __construct(protected UserRepositoryInterface $userRepository) {}


    /**
     * List all users.
     *
     * This method is responsible for displaying a list of all users in the system.
     * It can be used to retrieve user data from the database and return it in a suitable format,
     * such as JSON or HTML.
     *
     * @response AnonymousResourceCollection<LengthAwarePaginator<UserResource>>
     */
    public function index(UserFilterRequest $request)
    {
        $users = $this->userRepository->all($request->validated());

        return UserResource::collection($users);
    }


    /**
     * Create a new user.
     *
     * This method is responsible for storing a new user in the system.
     * It typically involves validating the incoming request data, creating a new user record in the database.
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->userRepository->create($request->validated());

        return new UserResource($user);
    }

    /**
     * Display the specified user.
     *
     * This method is used to show a specific user by their ID.
     * It retrieves the user from the repository and returns it as a resource.
     */
    public function show(int $userId)
    {
        $user = $this->userRepository->find($userId);

        return new UserResource($user);
    }

    /**
     * Update the specified user.
     *
     * This method is used to update an existing user in the system.
     * It typically involves validating the incoming request data and updating the user record in the database.
     */
    public function update(UpdateUserRequest $request, int $userId)
    {
        $user = $this->userRepository->update($userId, $request->validated());

        return new UserResource($user);
    }

    /**
     * Delete the specified user.
     *
     * This method is used to delete a user from the system.
     * It typically involves removing the user record from the database.
     */
    public function destroy(int $userId)
    {
        $this->userRepository->delete($userId);

        return response()->noContent();
    }
}
