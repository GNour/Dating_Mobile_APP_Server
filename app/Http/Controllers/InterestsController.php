<?php

namespace App\Http\Controllers;

use App\Models\UserInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InterestsController extends Controller
{
    public function addInterest(Request $request)
    {
        $validated = Validator::make($request->all(), ['name' => 'required|string|between:1,100',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors()->toJson(), 400);
        }

        $interest = UserInterest::create(array_merge($validated->validated(), ["user_id" => auth()->user()->id]));

        return response()->json([
            'message' => 'New interest added to your profile!',
            'interest' => $interest], 201);

    }

    public function removeInterest($id)
    {

        $interest = UserInterest::find($id);
        if ($interest->user_id == Auth::user()->id) {
            $interest->delete();
            return response()->json([
                'message' => 'interest successfully removed from your profile!',
                'interest' => $interest,
            ], 201);} else {
            return "You cannot remove an interest not related to your profile!";}

    }

}
