@extends('pages.app')
@section('content')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                             <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Department</a></li>
                            <li class="breadcrumb-item active">Tables</li>

                        </ol>
                        <div >
                            <a href="{{ route('department.create') }}" class="btn btn-primary mb-2">Tambahkan Data</a>
                        </div>
                        <div class="card mb-4" style="width: 78rem;">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Department
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Dname</th>
                                                <th>Mgr_SSN</th>
                                                <th>Mgr_start_date</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

@endsection




@push('addon-script')

     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>

    <script>

           var datatable = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'Dname', name: 'Dname'},
                    { data: 'Mgr_ssn', name: 'Mgr_ssn'},
                    { data: 'Mgr_start_date', name: 'Mgr_start_date'},
                    { data: 'action',
                      name: 'action',
                      orderable: false,
                      searcable: false,
                      width : '15%',

                    },

                ]
            });



    </script>




@endpush
