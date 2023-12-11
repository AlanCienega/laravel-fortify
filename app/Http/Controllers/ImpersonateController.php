<?php

namespace App\Http\Controllers;

use App\Models\User;

class ImpersonateController extends Controller
{
    public function impersonate(User $user)
    {
        $token = $user->createToken('impersonate-token')->plainTextToken;
        return response()->json(["token" => $token, "user" => $user]);
    }

    public function stopImpersonating(User $user)
    {
        $user->tokens()->where('name', 'impersonate-token')->delete();
        return response()->json(["message" => "Impersonation stopped"]);
    }
}
