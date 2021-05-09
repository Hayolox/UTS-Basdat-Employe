<?php

namespace App\Http\Controllers;

use App\Department;
use App\Project;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;

class ProjectController extends Controller
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

           $query = Project::with(['depart'])->get();

           return Datatables::of($query)->addIndexColumn()
           ->addColumn('action', function($item){
                return '
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" class="delete-form" >
                    Action
                </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="'.route('project.edit',$item->Pnumber).'">Edit</a>
                        <form Onsubmit = " return confirm(\'yakin Hapus Data?\')" action="'.route('project.destroy',$item->Pnumber).'" method="POST" >
                            '. method_field('delete'). csrf_field() .'

                            <button type="submit" class="dropdown-item text-danger "> Delete</button>
                        </form>
                    </div>

            </div>
                ';
           })->addIndexColumn()->rawColumns(['action'])->make();
       }

        return view('project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departmens = Department::get();
         return view('project.create', compact('departmens'));
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
        Project::create($aatr);
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
        $project = Project::findOrFail($id);
        $departmens = Department::get();

         return view('project.edit', compact('project','departmens'));
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
        $item = Project::findOrFail($id);
        $item->update($aatr);
         return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $aatr = Project::findOrFail($id);
        Alert::success('Berhasil menghapus data !')->persistent('Confirm');
       $aatr->delete();
       return back();
    }
}
