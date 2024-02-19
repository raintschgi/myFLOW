<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        //alte Variante:
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 
        
        //refactoring:
        $this->authorize('viewAny', User::class);
        
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    public function create(User $user)
    {
        $this->authorize('create', $user);

        $roles = Role::pluck('title', 'id');

        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('users.edit', compact('user', 'roles'));
    }
    
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {

        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('users.index');
    }
}
