@extends('layout')
@section('css')
<!-- Plugins css -->
{{-- <link href="assets/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />
<link href="assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
<link href="assets/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet" />
<link href="assets/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" /> --}}
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employe.create') }}">employe</a></li>
                    <li class="breadcrumb-item active">Enregistrer employe</li>
                </ol>
            </div>
            <h4 class="page-title">Enregistrer employe</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


                <form class="" action="{{ route('employe.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Prenom</label>
                        <input type="text" name="prenom" class="form-control" required placeholder="Type something"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Nom</label>
                        <input type="text" name="nom" class="form-control" required placeholder="Type something"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="my-2 py-1">Equal To</label>
                        <div>
                            <input type="password" id="pass2" class="form-control" required
                                    placeholder="Password"/>
                        </div>
                        <div class="m-t-10">
                            <input type="password" class="form-control" required
                                    data-parsley-equalto="#pass2"
                                    placeholder="Re-Type Password"/>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <label class="my-2 py-1">E-Mail</label>
                        <div>
                            <input type="email" class="form-control" required
                                    parsley-type="email" placeholder="Enter a valid e-mail"/>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label class="my-2 py-1">URL</label>
                        <div>
                            <input parsley-type="url" type="url" class="form-control"
                                    required placeholder="URL"/>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label class="my-2 py-1">Digits</label>
                        <div>
                            <input data-parsley-type="digits" type="text"
                                    class="form-control" required
                                    placeholder="Enter only digits"/>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label>Number</label>
                        <div>
                            <input data-parsley-type="number" type="text"
                                    class="form-control" required
                                    placeholder="Enter only numbers"/>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label class="my-2 py-1">Alphanumeric</label>
                        <div>
                            <input data-parsley-type="alphanum" type="text"
                                    class="form-control" required
                                    placeholder="Enter alphanumeric value"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="my-2 py-1">Textarea</label>
                        <div>
                            <textarea required class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

@endsection
