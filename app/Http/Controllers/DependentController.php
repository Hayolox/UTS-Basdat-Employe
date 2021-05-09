<?php

namespace App\Http\Controllers;

use App\Dependent;
use App\Employee;
use App\Http\Requests\DependentRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\Datatables\Datatables;

class DependentController extends Controller
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

           $query = Dependent::get();

           return Datatables::of($query)->addIndexColumn()
           ->addColumn('action', function($item){
                return '
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" class="delete-form" >
                    Action
                </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="'.route('dependent.edit',$item->	Id_Dependent).'">Edit</a>
                        <form Onsubmit = " return confirm(\'yakin Hapus Data?\')" action="'.route('dependent.destroy',$item->Id_Dependent).'" method="POST" >
                            '. method_field('delete'). csrf_field() .'

                            <button type="submit" class="dropdown-item text-danger "> Delete</button>
                        </form>
                    </div>

            </div>
                ';
           })->addIndexColumn()->rawColumns(['action'])->make();
       }

        return view('dependent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $employs = Employee::paginate(10);
         return view('dependent.create', compact('employs'));
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
        Dependent::create($aatr);
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
         $dependent = Dependent::findOrFail($id);
         $employs = Employee::all();
         return view('dependent.edit', compact('dependent','employs'));
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
        $item = Dependent::findOrFail($id);
        $item->update($aatr);
         return redirect()->route('dependent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $aatr = Dependent::findOrFail($id);
        Alert::success('Berhasil menghapus data !')->persistent('Confirm');
       $aatr->delete();
       return back();
    }
}
