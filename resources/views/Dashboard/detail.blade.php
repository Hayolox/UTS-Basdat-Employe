@extends('pages.app')
@section('content')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail {{ $employes->Fname }}</li>
                        </ol>
                        <div class="card mb-4" style="width: 78rem;">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                              Detail Data {{ $employes->Fname }}
                            </div>
                            <div class="card-body">
                               <form>



                              <div class="container">
                                   <div class="mt-5 mb-2">
                                            <h4>Data Employe</h4>
                                  </div>
                                  <div class="row">
                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="ssn">ssn</label>
                                            <input disabled type="ssn" name="ssn" value="{{ $employes->ssn }}" class="form-control" id="Fname" aria-describedby="ssn" placeholder="ssn">
                                            </div>
                                      </div>

                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="ssn">Fname</label>
                                            <input  disabled type="ssn" Fname="ssn" value="{{ $employes->Fname }}" class="form-control" id="Fname" aria-describedby="ssn" placeholder="ssn">
                                            </div>
                                      </div>

                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="ssn">Lname</label>
                                            <input disabled type="ssn" Fname="ssn" value="{{ $employes->Lname }}" class="form-control" id="Fname" aria-describedby="ssn" placeholder="ssn">
                                            </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="ssn">Bdate</label>
                                            <input disabled type="ssn" name="ssn" value="{{ $employes->Bdate }}" class="form-control" id="Fname" aria-describedby="ssn" placeholder="ssn">
                                            </div>
                                      </div>

                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="Fname">Address</label>
                                            <input disabled type="Fname" Fname="Fname" value="{{ $employes->Address }}" class="form-control" id="Fname" aria-describedby="Fname" placeholder="ssn">
                                            </div>
                                      </div>

                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="Bdate">Sex</label>
                                            <input disabled type="Bdate" Fname="Bdate" value="{{ $employes->Sex }}" class="form-control" id="Fname" aria-describedby="ssn" placeholder="ssn">
                                            </div>
                                      </div>
                                  </div>

                                   <div class="row">
                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="ssn">Salary</label>
                                            <input disabled type="ssn" name="ssn" value="Rp {{ number_format($employes->Salary ,0,",",".") }}" class="form-control" id="Fname" aria-describedby="ssn" placeholder="ssn">
                                            </div>
                                      </div>

                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="Fname">Super_ssn</label>
                                            <input disabled type="Fname" Fname="Fname" value="{{ $employes->Super_ssn }}" class="form-control" id="Fname" aria-describedby="Fname" placeholder="ssn">
                                            </div>
                                      </div>

                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="Bdate">Department</label>
                                            <input disabled type="Bdate" Fname="Bdate" value="{{ $employes->depart->Dname  }}" class="form-control" id="Fname" aria-describedby="ssn" placeholder="ssn">
                                            </div>
                                      </div>

                                      <div class="col-4">
                                            <div class="form-group">
                                            <label for="Bdate">Department Location</label>
                                            <input disabled type="Bdate" Fname="Bdate" value="{{ $employes->depart->locs->Dlocation }}" class="form-control" id="Fname" aria-describedby="ssn" placeholder="ssn">
                                            </div>
                                      </div>
                                  </div>

                                  <div class="mt-5 mb-2">
                                            <h4>Data Dependent</h4>
                                  </div>


                                     <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Dependent_name</th>
                                            <th scope="col">sex</th>
                                            <th scope="col">Bdate</th>
                                             <th scope="col">Relationship</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employes->depen as $depen)
                                            <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $depen->Dependent_name }}</td>
                                            <td>{{  $depen->sex}}</td>
                                            <td>{{  $depen->Bdate}}</td>
                                            <td>{{  $depen->Relationship}}</td>

                                            </tr>
                                             @endforeach
                                        </tbody>
                                        </table>



                                      <div class="mt-5 mb-2">
                                            <h4>Data Works</h4>
                                  </div>


                                     <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Pname</th>
                                            <th scope="col">Plocation</th>
                                            <th scope="col">Dnumber</th>
                                            <th scope="col">Hours</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($employes->works as $work)
                                            <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $work->projects->Pname }}</td>
                                            <td>{{ $work->projects->Plocation }}</td>
                                            <td>{{ $work->projects->depart->Dname }}</td>
                                             <td>{{ $work->Hours }}</td>


                                            </tr>


                                             @endforeach
                                        </tbody>


                                        </table>

                                </form>
                            </div>
                        </div>
                    </div>
                </main>
@endsection




