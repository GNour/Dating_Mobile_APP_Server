<?php

namespace App\Http\Controllers;

use App\Models\UserConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConnectionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user2_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update response to 1 if the logged in user have been matched by the other user
        $connected = UserConnection::where('user2_id', auth()->user()->id)
            ->where('user1_id', $request->only("user2_id"))
            ->update(["response" => 1]);

        if (!$connected) {
            // Create the connection if both of them haven't previously matched other
            $match = UserConnection::create(array_merge(["user1_id" => auth()->user()->id], $validator->validated()));
        } else {
            $match = "Connected Togather!";
        }

        return response()->json([
            'message' => 'Mathced!!!',
            'body' => $match,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserConnection  $userConnection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserConnection::find($id)->delete();
        return response()->json([
            'message' => 'Unmatched',
        ], 200);
    }
}
