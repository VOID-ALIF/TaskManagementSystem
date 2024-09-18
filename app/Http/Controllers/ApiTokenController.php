<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiTokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $token = $user->createToken($request->input('name'))->plainTextToken;

        return redirect()->route('profile.show')->with('success', 'Token created successfully. Token: ' . $token);
    }

    public function destroy($tokenId)
    {
        $user = Auth::user();
        $user->tokens()->where('id', $tokenId)->delete();

        return redirect()->route('profile.show')->with('success', 'Token revoked successfully.');
    }
}
