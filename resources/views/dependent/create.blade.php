@extends('pages.app')
@section('content')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('dependent.index') }}">Dependent</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                        <div class="card mb-4" style="width: 78rem;">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Input  DataTable Dependent
                            </div>
                            <div class="card-body">
                               <form method="POST" action="{{ route('dependent.store') }}" >
                                   @csrf
                                <div class="form-group">
                                    <label for="Dependent_name ">Dependent_name</label>
                                    <input type="Dependent_name" name="Dependent_name" class="form-control @error('Dependent_name') is-invalid @enderror" id="Dependent_name" aria-describedby="Dependent_name" placeholder="Dependent_name">
                                        @error('Dependent_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                        <label for="select-state">Essn</label>
                                        <select name="Essn" id="select-state" placeholder="Pick a state...">
                                        <option selected>Pick a ssn</option>
                                        @foreach ($employs as $employ)
                                            <option value="{{ $employ->ssn }}">{{ $employ->ssn }}</option>
                                        @endforeach
                                </select>
                                </div>

                                <div class="form-group">
                                        <label for="sex">SEX</label>
                                        <select name="sex" id="sex" class="form-control">
                                         <option selected>Choose...</option>
                                         <option value="F">Female</option>
                                         <option value="M">Male</option>

                                        </select>
                                </div>



                                <input type="text"
                                class="datepicker-here form-control"
                                data-language='en'
                                name="Bdate"
                                data-multiple-dates="3"
                                placeholder="Chosee date"
                                data-multiple-dates-separator=", "
                                data-position='top left'/>

                                 <div class="form-group mt-2">
                                    <label for="Relationship">Relationship</label>
                                    <input type="Relationship" name="Relationship" class="form-control @error('Relationship') is-invalid @enderror" id="Relationship" aria-describedby="Relationship" placeholder="Relationship">
                                        @error('Relationship')
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

@push('addon-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
     <script>
         $(document).ready(function () {
      $('select').selectize({
          sortField: 'int'
      });
  });
     </script>


@endpush




