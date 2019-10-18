<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\UserRole;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', ['users' => User::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => UserRole::manager,
            // The below technique is of course not the correct approach, but I
            // can't be bothered to spend time implementing it correctly
            // since the functionality wasn't in the specification and this is
            // project won't ever be deployed. Basically, I'm just setting the
            // password to something that is impractical to crack so as to
            // prevent authentication. I don't feel that administrators should
            // be responsible for creating passwords. Therefore, an email
            // message would be sent to the email address given that would
            // contain an expiring password-set link. If the password isn't set
            // before the link expires, an administrator would need to reissue
            // the email. Normally, instead of making an arbitrarily difficult
            // initial password, I'd use another field that would be used to
            // disable authentication.
            'password' => Hash::make(substr(str_shuffle('abdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~!@#$%^&*()-_=+[]\\{}|;:",./<>?'), 0, 32)),
        ]);

        return redirect()->route('users.show', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if (array_key_exists('name', $validated) && !is_null($validated['name'])) {
            $user->name = $validated['name'];
        }

        if (array_key_exists('email', $validated) && !is_null($validated['email'])) {
            $user->email = $validated['email'];
        }

        $user->save();

        return redirect()->route('users.show', compact('user'));
    }

    /** @noinspection PhpDocMissingThrowsInspection */
    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // TODO: disallow deletion of currently authenticated user
        /** @noinspection PhpUnhandledExceptionInspection */
        $user->delete();

        return redirect()->route('users.index');
    }
}
