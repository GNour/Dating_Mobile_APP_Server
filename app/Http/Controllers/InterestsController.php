<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserInterest;

class InterestsController extends Controller
{
    public function AddInterest(Request $request){
        $validated = Validator::make($request->all(),['name' => 'reqired|string|between:1,100',
        ])

        if ($validated->fails()){
            return response()->json($validatedd->errors()->toJson(), 400);
        }

        $interest = UserInterest::create(array_merge($validated->validated(), ["user_id"]=>auth()->user()->id]));

        return response()->json([
            'message'=>'New interest added to your profile!'
            'interest' => $interest,], 201);
            
        
    }
    
}
