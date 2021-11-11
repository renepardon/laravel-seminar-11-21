<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\CreateRequest;
use App\Http\Requests\Api\User\UpdateRequest;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\Pure;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index(): UserCollection
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFields('id', 'name', 'email', 'created_at', 'updated_at')
            ->allowedFilters('name', 'email')
            ->allowedIncludes('roles', 'permissions')
            ->allowedSorts('id', 'name', 'email')
            ->get();
            // ->paginate(config('app.paginate.per_page'));

        return new UserCollection($users);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        return response()->json(
            new UserResource(
                User::create($request->validated())
            ),
            Response::HTTP_CREATED
        );
    }

    #[Pure] public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    public function update(UpdateRequest $request, User $user)
    {
        if ($user->update($request->validated())) {
            return response()->json(new UserResource($user), Response::HTTP_ACCEPTED);
        }

        return response()->json([], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
    public function forceDestroy(User $user)
    {
        $user->forceDelete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
