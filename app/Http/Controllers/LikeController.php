<?php


namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Sneaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function toggleLike(Request $request, Sneaker $sneaker)
    {
        $user = Auth::user();

        // Check if the user has already liked the sneaker
        $existingLike = Like::where('user_id', $user->id)
            ->where('sneaker_id', $sneaker->id)
            ->first();

        if ($existingLike) {
            // If the user has already liked the sneaker, unlike it
            $existingLike->delete();
            $message = 'You have unliked the sneaker.';
        } else {
            // If the user has not liked the sneaker, create a new like
            $like = new Like();
            $like->user_id = $user->id;
            $like->sneaker_id = $sneaker->id;
            $like->save();
            $message = 'You have liked the sneaker.';
        }

        return redirect()->back()->with('success', $message);
    }
}
