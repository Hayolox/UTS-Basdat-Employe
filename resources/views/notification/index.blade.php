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
                                DataTable Notification
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                   <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Essn</th>
                                            <th scope="col">Notification</th>
                                            <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ( $notifs as $key => $notif)
                                            <tr>
                                            <th scope="row">{{ $notifs->firstItem() +$key }}</th>
                                            <td>{{ $notif->essn }}</td>
                                            <td>{{ $notif->notif }}</td>


                                            </tr>
                                        @endforeach

                                        {{  $notifs->links() }}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

@endsection




