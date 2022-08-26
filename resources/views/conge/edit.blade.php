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
                    <li class="breadcrumb-item"><a href="{{ route('conge.index') }}">Projet</a></li>
                </ol>
            </div>
            <h4 class="page-title">Enregistrer Projet</h4>
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


            {!! Form::model($conge, ['method'=>'PATCH','route'=>['conge.update', $conge->id]]) !!}
            @csrf

            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Date début</label>
                <input type="date" name="date_debut" value="{{ $conge->date_debut }}" class="form-control" required placeholder="Saisir Date début"/>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Date Fin</label>
                <input type="date" name="date_fin" class="form-control"  value="{{ $conge->date_fin }}"  required placeholder="Saisir Date Fin"/>
              </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Type de conge</label>

                    <select class="custom-select" name="type_conge_id" required>
                        <option value="" selected>Selectionner</option>
                        @foreach ($typeConges as $typeConge )
                        <option value="{{ $typeConge->id }}" {{old('type_conge_id', $typeConge->id) == $conge->type_conge_id ? 'selected' : ''}}>{{ $typeConge->type }} </option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group mb-0">
                <label class="my-2 py-1">Employé</label>
                <div>
                    <select class="custom-select" name="employe_id" required>
                        <option selected>Selectionner</option>
                    @foreach ($employes as $employe )
                    <option value="{{ $employe->id }}" {{old('employe_id', $employe->id) == $conge->employe_id ? 'selected' : ''}}>{{ $employe->prenom }} {{ $employe->nom }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Enregistrer
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
