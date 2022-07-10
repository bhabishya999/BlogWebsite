<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password,'role'=>'admin'])) {
        $request->session()->regenerate();
        return redirect('/adminhome');
    }
       elseif (Auth::attempt(['email' => $email, 'password' => $password,'role'=>'user'])) {
       $request->session()->regenerate();
       return redirect('/userhome');
    }elseif(Auth::attempt(['email'=>!$email,'password'=>$password])){
       return redirect('/')->with('emailerror',"Entered email is wrong");
     }
     else{
     return redirect('/')->with('error',"Entered email or password is wrong");
 }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
