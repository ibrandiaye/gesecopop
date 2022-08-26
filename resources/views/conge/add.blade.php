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
                    <li class="breadcrumb-item"><a href="{{ route('conge.create') }}">Congé</a></li>
                    <li class="breadcrumb-item active">Enregistrer un Congé</li>
                </ol>
            </div>
            <h4 class="page-title">Enregistrer un congé</h4>
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
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

                <form class="" action="{{ route('conge.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Date début</label>
                        <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut') }}" class="form-control" required placeholder="Saisir Date début"/>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Durée</label>
                            <input type="number" id="duree" class="form-control" value="{{ old('duree') }}" name="duree" placeholder="Durée" required>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Date Fin</label>
                        <input type="date" id="date_fin" name="date_fin" class="form-control"  value="{{ old('date_fin') }}"   placeholder="Saisir Date Fin"/>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Annee</label>
                            <input type="number" id="annee" class="form-control" value="{{ old('annee') }}" name="annee" placeholder="Année" required>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Type de congé</label>

                            <select class="custom-select" name="type_conge_id" required>
                                <option value="" selected>Selectionner</option>
                                @foreach ($typeConges as $typeConge)
                                    <option value="{{ $typeConge->id }}" {{ old('type_conge_id')==$typeConge->id ? 'selected' : '' }}>{{ $typeConge->type }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group mb-0">
                        <label class="my-2 py-1">Employé</label>
                        <div>
                            <select class="custom-select" name="employe_id" required>
                                <option selected>Selectionner</option>
                            @foreach ($employes as $employe )
                            <option value="{{ $employe->id }}" {{ old('employe_id')==$employe->id ? 'selected' : '' }}>{{ $employe->prenom }} {{ $employe->nom }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Enregister
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
<script src="{{ asset('assets/js/fr.js') }}"></script>
<script src="{{ asset('assets/plugins/m/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
<!-- form-picker-custom Js -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>


        <script>
            $(document).ready(function () {

                $("#duree").keyup(function(){

                   var date = $("#date_debut").val();
                   var new_date = moment(date).add( $("#duree").val(), 'days');
                   $("#date_fin").val(new_date.format('YYYY-MM-DD'));
                   moment(new_date, "MM-DD-YYYY");
                   console.log(new_date);
                   $("#annee").val(new_date.format('YYYY'));
                  });
            });
        </script>
@endsection
