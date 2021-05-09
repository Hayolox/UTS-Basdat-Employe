<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employes = Employee:: paginate(10);
        return view ('Dashboard.index', compact('employes'));
    }

    public function detail($id)
    {
        $employes = Employee::findOrFail($id);
        return view ('Dashboard.detail', compact('employes'));
    }



}
