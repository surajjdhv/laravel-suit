<?php

namespace App\Http\Controllers;

use DB;
use Log;
use Exception;
use App\Models\User;
use App\Events\UserCreatedEvent;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Queries\Filters\FuzzyFilter;

class UserController extends Controller
{
    public function index()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(
                AllowedFilter::custom('search', new FuzzyFilter(
                    'name',
                    'email',
                ))
            )
            ->paginate(request()->query('size') ?? 10)
            ->appends(request()->query());

        return view('user.index')->withUsers($users);
    }

    public function show(User $user)
    {
        return view('user.show')->withUser($user);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try {
            /** @var User */
            $user = User::create(array_merge([
                'name' => $request->name,
                'email' => $request->email,
                'is_active' => $request->is_active ?? 0
            ], $request->password ? ['password' => bcrypt($request->password)] : []));

            DB::commit();

            event(new UserCreatedEvent($user));

            return redirect()->route('user.show', $user);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('user.edit')->withUser($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update(array_merge([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active ?? 0
        ], $request->password ? ['password' => bcrypt($request->password)] : []));

        return redirect()->route('user.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
