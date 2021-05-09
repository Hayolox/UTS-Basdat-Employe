@extends('pages.app')
@section('content')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item"><a href="{{ route('workson.index') }}">Workson</a></li>
                            <li class="breadcrumb-item active">Tables</li>

                        </ol>
                        <div >
                            <a href="{{ route('workson.create') }}" class="btn btn-primary mb-2">Tambahkan Data</a>
                        </div>
                        <div class="card mb-4" style="width: 78rem;">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Workson
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Essn</th>
                                                <th>Pno</th>
                                                <th>Hours</th>
                                                <th>Action</th>
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
                    { data: 'Essn', name: 'Essn'},
                    { data: 'projects.Pname', name: 'projects.Pname'},
                    { data: 'Hours', name: 'Hours'},
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
