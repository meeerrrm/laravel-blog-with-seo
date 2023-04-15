<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class PictureController extends Controller
{
    /**
     * Update the user's photo.
     */
    public function update(Request $request): RedirectResponse
    {
        
        $validated = $request->validateWithBag('updateProfilePicture', [
            'new_profile' => ['required','image'],
        ]);

        $file = $request->file('new_profile');
        $saved_name = str_replace(" ","-",strtolower(Auth::user()->email)).'.'.$file->getClientOriginalExtension();
        $path = $request->file('new_profile')->storeAs('public/picture',$saved_name);

        $request->user()->update([
            'profile_picture' => $saved_name,
        ]);

        return back()->with('status','profile-picture-updated');
    }
}
