@extends('pages.app')
@section('content')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{route('dashboard-index')}}">Dashboard</a></li>
                        </ol>

                        <div class="card mb-4" style="width: 78rem;">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Employe
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                   <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Ssn</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Dependen</th>
                                            <th scope="col">Project</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Dlocation</th>
                                            <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ( $employes as $key => $emp)
                                            <tr>
                                            <th scope="row">{{ $employes->firstItem() +$key }}</th>
                                            <td>{{ $emp->ssn }}</td>
                                            <td>{{ $emp->Fname }}</td>
                                            <td>{{ $emp->depen->count() }}</td>
                                            <td>{{ $emp->works->count() }}</td>
                                             <td>{{ $emp->depart->Dname }}</td>
                                            <td>{{ $emp->depart->locs->Dlocation }}</td>
                                             <td>
                                               <a href="{{ route('dashboard-detail',$emp->ssn) }}">
                                                     <div class="btn btn-primary">
                                                    DETAIL
                                                    </div>
                                               </a>

                                             </td>
                                            </tr>
                                        @endforeach

                                        {{  $employes->links() }}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

@endsection




