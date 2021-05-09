@extends('pages.app')
@section('content')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Deplocation</li>
                        </ol>
                        <div >
                            <a href="{{ route('deplocation.create') }}" class="btn btn-primary mb-2">Tambahkan Data</a>
                        </div>
                        <div class="card mb-4" style="width: 78rem;">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Deplocation
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Dnumber</th>
                                                <th>Dep Location</th>
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

                    { data: 'depart.Dname', name: 'depart.Dname'},
                     { data: 'Dlocation', name: 'Dlocation'},
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
