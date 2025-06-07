<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login a user.
     *
     * This method handles user authentication.
     * It validates the credentials and returns a token if successful.
     *
     * @unauthenticated
     */
    public function login(LoginUserRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->device_name ?? 'default')->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => new UserResource($user)
        ], Response::HTTP_OK);
    }

    /**
     * Register a new user.
     *
     * This method handles user registration.
     * It validates the input data and creates a new user account.
     *
     * @unauthenticated
     */
    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? UserRole::User,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken($request->device_name ?? 'default')->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => new UserResource($user)
        ], Response::HTTP_CREATED);
    }

    /**
     * Logout the authenticated user.
     *
     * This method invalidates the user's session or token.
     * It ensures that the user is logged out securely.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully'
        ], Response::HTTP_OK);
    }

    /**
     * Get the authenticated user details.
     *
     * This method retrieves the details of the currently authenticated user.
     * It returns user information such as ID, name, and email.
     */
    public function user(Request $request)
    {
        return new UserResource($request->user());
    }
}
