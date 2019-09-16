<?php

namespace App\Http\Controllers;

use App\User;
use App\PartnerCompanie;
use App\PartnerEmployee;
use Illuminate\Http\Request;

class PartnerEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'employee created';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $companies = PartnerCompanie::all(['id', 'company_name']);

        return view('employee/create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PartnerEmployee::create([
            'date_birth' => $request['date_birth'],
            'description' => $request['description'],
            'FK_user' => $request['FK_user'],
            'FK_company' => $request['FK_company'],
        ]);
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $resUser = User::where('role', '=' , 'trainer')->find($user);
        if(!$resUser){
            echo 'not a trainer, we need a redirect here';
        }else{ 
            $res = $resUser->userEmployee;
            if($res ->isEmpty()){
                PartnerEmployee::create(['FK_user' => $user]);
                return redirect('employee/'.$user);
            }else{
              
               /*
                resUser = User Table
                res = PartnerEmployee Table
               */
               return view('employee.show', compact('resUser', 'res'));
            }
        }
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
        PartnerEmployee::where('id', $id)->update($request->except(['_token','_method']));
        return redirect('/employee');
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
