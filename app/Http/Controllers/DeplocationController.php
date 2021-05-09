<?php

namespace App\Http\Controllers;

use App\Department;
use App\Deplocation;
use App\Employee;
use App\Http\Requests\DeplocationRequest;
use App\Project;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;

class DeplocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())

       {

           $query = Deplocation::with(['depart'])->get();

           return Datatables::of($query)
           ->addColumn('action', function($item){
                return '
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" class="delete-form" >
                    Action
                </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="'.route('deplocation.edit',$item->Dnumber).'">Edit</a>
                        <form Onsubmit = " return confirm(\'yakin Hapus Data?\')" action="'.route('deplocation.destroy',$item->Dnumber).'" method="POST" >
                            '. method_field('delete'). csrf_field() .'

                            <button type="submit" class="dropdown-item text-danger "> Delete</button>
                        </form>
                    </div>

            </div>
                ';
           })->addIndexColumn()->rawColumns(['action'])->make();
       }

        return view('deplocation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departments = Department::get();
         return view('deplocation.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aatr = $request->all();
        Deplocation::create($aatr);
        return back()->withSuccess('Data Berhasil Di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $deplocation = Deplocation::findOrFail($id);
        $departments = Department::get();
         return view('deplocation.edit', compact('deplocation','departments'));
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
        $aatr = $request->all();
        $item = Deplocation::findOrFail($id);
        $item->update($aatr);
         return redirect()->route('deplocation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $aatr = Deplocation::findOrFail($id);
        Alert::success('Berhasil menghapus data !')->persistent('Confirm');
       $aatr->delete();
       return back();
    }
}
