@extends('pages.app')
@section('content')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employee</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                            <li class="breadcrumb-item active">Edit</li>
                        <div class="card mb-4" style="width: 78rem;">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Edit  DataTable Employe
                            </div>
                            <div class="card-body">
                               <form method="POST" action="{{ route('employee.update',$employee->ssn) }}" onsubmit="return confirm('Yakin Update Data')">
                                    @method('PUT')
                                    @csrf


                                <div class="form-group">
                                    <label for="ssn">Fname</label>
                                    <input type="ssn" name="ssn" value="{{ $employee->ssn }}" class="form-control" id="Fname" aria-describedby="ssn" placeholder="ssn">
                                </div>

                                <div class="form-group">
                                    <label for="Fname">Fname</label>
                                    <input type="Fname" name="Fname" value="{{ $employee->Fname }}" class="form-control" id="Fname" aria-describedby="Fname" placeholder="Fname">
                                </div>

                                <div class="form-group">
                                    <label for="Minit">Lname</label>
                                    <input type="Lname" value="{{ $employee->Lname }}" name="Lname" class="form-control" id="Lname" aria-describedby="Lname" placeholder="Lname">
                                </div>

                                <div class="form-group">
                                        <label for="Sex">SEX</label>
                                        <select name="Sex" id="Sex" class="form-control @error('Sex') is-invalid @enderror">
                                         <option value="{{ $employee->Sex }}" selected>{{ $employee->Sex }}</option>
                                         <option value="F">F</option>
                                         <option value="M">M</option>

                                        </select>

                                         @error('Sex')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Minit">Minit</label>
                                    <input type="Minit" value="{{ $employee->Minit }}" name="Minit" class="form-control" id="Minit" aria-describedby="Minit" placeholder="Minit">
                                </div>

                                <input type="text"
                                class="datepicker-here form-control"
                                data-language='en'
                                name="Bdate"
                                data-multiple-dates="3"
                                placeholder="Chosee date"
                                value="{{ $employee->Bdate }}"
                                data-multiple-dates-separator=", "
                                data-position='top left'/>

                                <div class="form-group">
                                    <label for="Address">Address</label>
                                    <input type="Address" value="{{ $employee->Address }}" name="Address" class="form-control" id="Address" aria-describedby="Minit" placeholder="Address">
                                </div>


                                <div class="form-group">
                                    <label for="Salary">Salary</label>
                                    <input type="Salary"  value="{{ $employee->Salary }}" name="Salary" class="form-control" id="Salary" aria-describedby="Salary" placeholder="Salary">
                                </div>

                                <div class="form-group">
                                        <label for="sub_category_name">Departemnt Name</label>
                                        <select name="Dno" id="Dno" class="form-control">
                                         <option  value="{{ $employee->Dno }}" selected>{{ $employee->depart->Dname }}</option>
                                        @foreach ($departments as $depart)
                                                <option value="{{ $depart->Dnumber }}">{{ $depart->Dname }}</option>
                                        @endforeach
                                        </select>
                                </div>


                                <div class="form-group">
                                        <label for="Super_ssn">Super_ssn</label>
                                        <select  name="Super_ssn" id="Super_ssn" class="form-control @error('Super_ssn') is-invalid @enderror">
                                         <option value="{{ $employee->Super_ssn }}" selected>{{ $employee->depart->Dname  }}</option>
                                        @foreach ($departments as $depart)
                                                <option value="{{ $depart->Mgr_ssn }}">{{ $depart->Dname }}</option>
                                        @endforeach
                                        </select>

                                         @error('Super_ssn')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>



                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
@endsection




