<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function edit()
    {
        $timezonelist = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);

        return view('frontend.account.profile', ['timezonelist' => $timezonelist]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->commit();
        session()->flash('alert', ['type' => 'success', 'message' => 'Your profile has been updated.']);

        return redirect(route('account.profile.edit'));
    }
}