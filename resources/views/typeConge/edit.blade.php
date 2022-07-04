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
                    <li class="breadcrumb-item"><a href="{{ route('type-conge.index') }}">Type de congé</a></li>
                    <li class="breadcrumb-item active">Enregistrer typeConge</li>
                </ol>
            </div>
            <h4 class="page-title">Modifier Type de congé</h4>
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


            {!! Form::model($typeConge, ['method'=>'PATCH','route'=>['type-conge.update', $typeConge->id]]) !!}
            @csrf

                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Type Congé</label>
                        <input type="text" class="form-control" name="type" value="{{ $typeConge->type }}" required placeholder="Type something"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Durée de congé</label>
                        <input type="number" class="form-control" name="nbj" value="{{ $typeConge->nbj}}" min="1" required placeholder="Durée du congé en jour"/> JOURS
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Annuler
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/js/fr.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

@endsection
