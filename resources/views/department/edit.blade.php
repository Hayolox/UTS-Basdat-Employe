@extends('pages.app')
@section('content')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Department</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                        <div class="card mb-4" style="width: 78rem;">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Edit  DataTable Department
                            </div>
                            <div class="card-body">
                               <form method="POST" action="{{ route('department.update',$department->Dnumber) }}" >
                                   @csrf
                                    @method('PUT')
                                <div class="form-group">
                                    <label for="Dnumber ">Dnumber</label>
                                    <input type="Dnumber" name="Dnumber" value="{{ $department->Dnumber }}" class="form-control @error('Dnumber') is-invalid @enderror" id="Dnumber" aria-describedby="Dnumber" placeholder="Dnumber">
                                        @error('Dnumber')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Dname">Dname</label>
                                    <input type="Dname" name="Dname" value="{{ $department->Dname }}" class="form-control" id="Dname" aria-describedby="Dname" placeholder="Dname">
                                </div>

                                <div class="form-group">
                                    <label for="Mgr_ssn">Mgr_ssn</label>
                                    <input type="Mgr_ssn" name="Mgr_ssn" value="{{ $department->Mgr_ssn }}" class="form-control" id="Mgr_ssn" aria-describedby="Mgr_ssn" placeholder="Mgr_ssn">
                                </div>


                                <div class="form-group">
                                        <label for="Mgr_ssn">Mgr_ssn</label>
                                        <select name="Mgr_ssn" id="Super_ssn" class="form-control @error('Mgr_ssn') is-invalid @enderror">
                                         <option value="{{ $department->Mgr_ssn }}" selected>{{ $department->Mgr_ssn }}</option>
                                        @foreach ($employs as $employe)
                                                <option value="{{ $employe->ssn }}">{{ $employe->ssn }}</option>
                                        @endforeach
                                        </select>

                                         @error('Super_ssn')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>


                                <input type="text"
                                class="datepicker-here form-control"
                                data-language='en'
                                name="Mgr_start_date"
                                value="{{$department->Mgr_start_date  }}"
                                data-multiple-dates="3"
                                placeholder="Chosee Mgr_Start_Ssn"
                                data-multiple-dates-separator=", "
                                data-position='top left'/>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
@endsection




