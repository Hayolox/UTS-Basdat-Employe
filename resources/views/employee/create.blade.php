@extends('pages.app')
@section('content')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employee</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                        <div class="card mb-4" style="width: 78rem;">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Input  DataTable Employe
                            </div>
                            <div class="card-body">
                               <form method="POST" action="{{ route('employee.store') }}" >
                                   @csrf
                                <div class="form-group">
                                    <label for="ssn">SSN</label>
                                    <input type="ssn" name="ssn" class="form-control @error('ssn') is-invalid @enderror" id="ssn" aria-describedby="ssn" placeholder="SSN">
                                        @error('ssn')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Fname">Fname</label>
                                    <input type="Fname" name="Fname" class="form-control @error('ssn') is-invalid @enderror" id="Fname" aria-describedby="Fname" placeholder="Fname">
                                     @error('Fname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>



                                <div class="form-group">
                                    <label for="Minit">Lname</label>
                                    <input type="Lname" name="Lname" class="form-control @error('ssn') is-invalid @enderror" id="Lname" aria-describedby="Lname" placeholder="Lname">
                                    @error('Lname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>



                                <div class="form-group">
                                        <label for="Sex">SEX</label>
                                        <select name="Sex" id="Sex" class="form-control @error('Sex') is-invalid @enderror">
                                         <option selected>Choose...</option>
                                         <option value="F">Female</option>
                                         <option value="M">Male</option>

                                        </select>

                                         @error('Sex')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Minit">Minit</label>
                                    <input type="Minit" name="Minit" class="form-control @error('Minit') is-invalid @enderror" id="Minit" aria-describedby="Minit" placeholder="Minit">
                                    @error('Minit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>
                                 <div class="form-group">
                                    <label for="Bdate">Bdate</label>
                                     <input type="text"
                                        class="datepicker-here form-control"
                                        data-language='en'
                                        name="Bdate"
                                        data-multiple-dates="3"
                                        placeholder="Chosee date"
                                        data-multiple-dates-separator=", "
                                        data-position='top left'/>
                                </div>


                                <div class="form-group">
                                    <label for="Address">Address</label>
                                    <input type="Address" name="Address" class="form-control @error('Address') is-invalid @enderror" id="Address" aria-describedby="Minit" placeholder="Address">
                                    @error('Address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>


                                <div class="form-group">
                                    <label for="Salary">Salary</label>
                                    <input type="Salary" name="Salary" class="form-control @error('Address') is-invalid @enderror" id="Salary" aria-describedby="Salary" placeholder="Salary">
                                    @error('Salary')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>


                                <div class="form-group">
                                        <label for="sub_category_name">Departemnt Name</label>
                                        <select name="Dno" id="Dno" class="form-control @error('Address') is-invalid @enderror">
                                         <option selected>Choose...</option>
                                        @foreach ($departments as $depart)
                                                <option value="{{ $depart->Dnumber }}">{{ $depart->Dname }}</option>
                                        @endforeach
                                        </select>

                                         @error('Super_ssn')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>



                                <div class="form-group">
                                        <label for="Super_ssn">Super_ssn</label>
                                        <select name="Super_ssn" id="Super_ssn" class="form-control @error('Super_ssn') is-invalid @enderror">
                                         <option value="0" selected>Choose...</option>
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


