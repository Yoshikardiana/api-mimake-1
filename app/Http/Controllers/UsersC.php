<?php

namespace App\Http\Controllers;

use App\Models\usersM;
use Illuminate\Http\Request;
use App\Http\Resources\usersR;

class UsersC extends Controller
{
    public function index(){
        $users = usersM::all();
        // return response()-> json($users);
        return usersR::collection($users);
    }

    public function detail($id){
        $users = usersM::findOrFail($id);
    return new usersR($users);
    }
}
