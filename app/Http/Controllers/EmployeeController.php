<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $emp=Employee::all();
        return $emp;
    }
    //storing data or POST
    public function store(Request $request)
    {
        $request->validate([
            "firstName"=>"required|string",
            "lastName"=>"required|string",
            "email"=>"required|string",
            "salary"=>"required|numeric",
        ]);
        // $emp=Employee::create($request->all());
        // $response=[
        //     "employee"=>$emp
        // ];
        // return response($response,201);
        return Employee::create($request->all());
    }
    // Get using  Id
    public function show($id)
    {
        return Employee::find($id);
    }
    // Put
    public function update(Request $request, $id)

    {
        $request->validate([
            "firstName"=>"required|string",
            "lastName"=>"required|string",
            "email"=>"required|string",
            "salary"=>"required|numeric",
        ]);
        $emp=Employee::find($id);
        $emp->update($request->all());
        return $emp;
    }
    // delete
    public function destroy($id)
    {
        return Employee::destroy($id);
    }
}
