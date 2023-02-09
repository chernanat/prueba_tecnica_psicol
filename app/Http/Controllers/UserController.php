<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function register()
    {
        return view('register');
    }
    public function registerTeacher()
    {
        return view('registerTeacher');
    }
    public function registerStudent()
    {
        return view('registerStudent');
    }
    public function registerSignature()
    {
        return view('registerSignature');
    }
    public function login()
    {
        return view('login');
    }
    public function store(UserRequest $request)
    {
        $person = new User($request->all());
        $person->save();
        return response()->json([
            'saved' => true,
            'person' => $person
        ]);
    }
    public function edit(User $person)
    {
        return $person;
    }
    public function update(Request $request, User $user)
    {
        $user = User::where('id', $request['id']);
        $user->update($request->all());
        return response()->json([
            'updated' => true,
        ], 200);
    }
    public function getUsers(){
        $users = User::where('role','!=','admin')->get();
        return $users;
    }
    public function getTeachers(){
        $teachers = User::where('role','=','teacher')->get();
        return $teachers;
    }
    public function getStudents(){
        $students = User::where('role','=','student')->get();
        return $students;
    }
    public function delete($id)
    {
        // return $id;
        $person = User::find($id);
        $person->delete();
        return response()->json([
            'deleted'=> true,
        ]);
    }
}
