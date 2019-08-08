<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function showstaff() {
        $name = 'Ai';
        $position = 'actress';
        $office = 'Tokyo';
        $age = '45';
        $start_date = '2008-10-20';
        $salary = '1,000,000';
        return view("admin")->with([
            'name' => $name,
            'position' => $position,
            'office' => $office,
            'age' => $age,
            'start_date' => $start_date,
            'salary' => $salary
        ]);
    }
}
