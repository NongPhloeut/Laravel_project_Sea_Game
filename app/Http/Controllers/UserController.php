<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        return response()->json(['Create cuccessfully'=>true,'data'=>$user],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $user = User::store($request);

        return response()->json(['Gets cuccessfully'=>true,'data'=>$user],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return response()->json(['Create cuccessfully'=>true,'data'=>$user],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
        $user = User::store($request,$id);

        return response()->json(['Update cuccessfully'=>true,'data'=>$user],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $user = User::find($id);
        // $user->delete();
        // return response()->json(['Delete cuccessfully'=>true,'data'=>$user],202);
    }
}
