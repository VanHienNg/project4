<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Redirect,Response;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['staff'] = Staff::orderBy('id', 'desc')->paginate(6);

        return view('admin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staffId = $request->staff_id;
        $staff = Staff::updateOrCreate(
                 ['id' => $staffId],
                 ['name' => $request->name,
                  'position' => $request->positon,
                  'office' => $request->office,
                  'age' => $request->age,
                  'start_date' => $request->start_date,
                  'salary' => $request->salary
                 ]);
        return Response::json($staff);
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
        $where = array('id' => $id);
        $staff = Staff::where($where)->first();

        return Response::json($staff);
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
        $staff = Staff::where('id',$id)->delete();

        return Response::json($staff);
    }
}
