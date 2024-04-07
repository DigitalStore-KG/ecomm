<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createAdmins');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      =>  ['required','string'],
            'email'     =>  ['required','email','unique:users,email'],
            'role'      =>  ['required'],
            'password'  =>  ['required','min:5'],
            'confirm_password' =>   ['required','same:password'],
            
        ]);

        unset($validated['password'],$validated['confirm_password']);
        $validated['password']=Hash::make($request->password);
        
        try {
            $user= User::create($validated);
            if($user){
                return back()->with('message','Record created successfully');
            }
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
        
    }
    public function login(){
        return view('admin.login');
    }
    public function loginCheck(Request $request){
        $validated= $request->validate([
            'email' =>  ['required','email'],
            'password'=>    ['required'],
            'role'  =>  ['required'],
        ]);
        if(Auth::attempt($validated)){
            return redirect()->route('dashboard');
        }else{
            return back()->with('message','Credentials does not match');
        }
    }
    public function logout(){
        auth::logout();
        return redirect()->route('login.admins');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
