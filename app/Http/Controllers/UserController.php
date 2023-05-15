<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\ShowUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $user = UserResource::collection($users);
        return response()->json(['Create cuccessfully'=>true,'users'=>$user],202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
 
        $users = User::store($request);
       
        return response()->json(['Gets cuccessfully'=>true,'users'=>$users],202);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $user = new ShowUserResource($user);
        return response()->json(['Create cuccessfully'=>true,'data'=>$user],202);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        $user = User::store($request,$id);

        return response()->json(['Update cuccessfully'=>true,'data'=>$user],202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
    
        if($user == null){
            return response()->json(['id not found'=>false],404);
        }

        $user->delete();
        return response()->json(['Delete cuccessfully'=>true,'data'=>$user],202);
    }
}
