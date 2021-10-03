<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserHobby;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class HobbiesController extends Controller
{
    public function addHobby(Request $request) {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|between:1,75',

        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors()->toJson(), 400);
        }

        $hobby = UserHobby::create(
            array_merge($validated->validated(),
            ["user_id" => auth()->user()->id]),

        );

        return response()->json([
            'message' => 'New hobby added to your profile!',
            'hobby' => $hobby,
        ], 201);
    }

    public function removeHobby(Request $request) {

        // $userId = Auth::user()->id;
        // return($userId);
        $hobby = UserHobby::find($request->id);
        if($hobby->user_id == Auth::user()->id){
            $hobby->delete();
            return response()->json([
                'message' => 'Hobby successfully removed from your profile!',
                'hobby' => $hobby
            ], 201);}

        else {
            return "You cannot remove a hobby not related to your profile!";}

    }
}
