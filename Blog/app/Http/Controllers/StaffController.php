<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;

class StaffController extends Controller
{
    public function index()
    {
        return Staff::all();
    }

    public function show(Staff $staff)
    {
        return $staff;
    }

    public function store(Request $request)
    {
        $staff = Staff::create($request->all());

        return response()->json($staff, 201);
    }

    public function update(Request $request, Staff $staff) 
    {
        $staff = update($request->all());

        return response()->json($staff, 200);
    }

    public function delete(Staff $staff) {
        $staff->delete();

        return response()->json(null, 204);
    }
}
