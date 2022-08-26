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
                    <li class="breadcrumb-item"><a href="{{ route('employe.index') }}">Projet</a></li>
                    <li class="breadcrumb-item active">Enregistrer Projet</li>
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


            {!! Form::model($employe, ['method'=>'PATCH','route'=>['employe.update', $employe->id],'enctype'=>'multipart/form-data']) !!}
            @csrf
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Prenom</label>
                <input type="text" name="prenom" value="{{$employe->prenom}}" class="form-control" required placeholder="Saisir votre Prenom"/>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Nom</label>
                <input type="text" name="nom" class="form-control"  value="{{$employe->nom }}"  required placeholder="Saisir votre Nom"/>
              </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Telephone</label>
                <input type="text" name="telephone" ata-parsley-type="number" value="{{ $employe->telephone }}"  class="form-control"   required placeholder="Saisir votre Téléphone"/>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Sexe</label>

                    <select class="custom-select" name="sexe" required>
                        <option selected>Selectionner</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Date Naissance</label>
                <input type="text" name="datenaiss" value="{{$employe->datenaiss }}"   class="form-control"  required placeholder="Saisir date de Naissance"/>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Date d'Entrée</label>
                <input type="text" name="dateentre" value="{{$employe->dateentre }}"   class="form-control"   required placeholder="Saisir  date d'entrée"/>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Date de fin de contrat</label>
                <input type="text" name="findecontrat" value="{{$employe->findecontrat }}"   class="form-control"  required placeholder="Saisir date fin de contrat "/>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Situation matrimonial</label>
                <input type="text" name="sm" value="{{$employe->sm }}"   class="form-control"  required placeholder="Saisir Situation matrimoniale"/>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Nombre d'enfant</label>
                <input type="text" name="nbenfant" ata-parsley-type="number" value="{{ $employe->nbenfant }}"  class="form-control"   required placeholder="Saisir nombre d'enfant"/>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Statut</label>

                    <select class="custom-select" name="statut" required>
                        <option value="Stage" {{old('statut', $employe->statut) == 'Stage' ? 'selected' : ''}}>Stage</option>
                        <option value="CDD" {{old('statut', $employe->statut) == 'CDD' ? 'selected' : ''}}>CDD</option>
                        <option value="CDI" {{old('statut', $employe->statut) == 'CDI' ? 'selected' : ''}}>CDI</option>
                    </select>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Niveau d'étude</label>
                <input type="text" name="etude" ata-parsley-type="number" value="{{ $employe->etude }}"  class="form-control"   required placeholder="Saisir Niveau d'étude"/>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Adresse</label>
                <input type="text" name="adresse" ata-parsley-type="number" value="{{ $employe->adresse }}"  class="form-control"   required placeholder="Saisir Niveau d'étude"/>
            </div>
            <div class="form-group mb-0">
                <label class="my-2 py-1">Lien du dossier du candidat</label>
                <div>
                    <input parsley-type="url" type="lien" class="form-control" value="{{$employe->lien }}"
                    name="lien"   required placeholder="Saisir le lien du dossier du candidat"/>
                </div>
            </div>
            <div class="form-group mb-0">
                <label class="my-2 py-1">Lien du dossier du candidat</label>
                <div>
                    <select class="custom-select" name="projet_id" required>
                        <option >Selectionner</option>
                    @foreach ($projets as $projet )
                    <option {{old('projet_id', $employe->projet_id) == $projet->id ? 'selected' : ''}}  value="{{ $projet->id }}">{{ $projet->nomp }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group mb-0">
                <label class="mb-2 pb-1">Photo</label>
                <input type="file" name="image" ata-parsley-type="number"   class="form-control"   />
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
