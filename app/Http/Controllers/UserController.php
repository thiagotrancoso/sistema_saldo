<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileFormRequest;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $user->image = Storage::url($user->image);

        return view('site.profile.profile', [
            'user' => $user
        ]);
    }

    public function update(ProfileFormRequest $request, ProfileService $profileService)
    {
        return $profileService->update($request->all());
    }
}
