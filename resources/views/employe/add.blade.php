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


                <form class="" action="{{ route('employe.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Prenom</label>
                        <input type="text" name="prenom" value="{{ old('prenom') }}" class="form-control" required placeholder="Saisir votre Prenom"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Nom</label>
                        <input type="text" name="nom" class="form-control"  value="{{ old('nom') }}"  required placeholder="Saisir votre Nom"/>
                      </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Telephone</label>
                        <input type="text" name="telephone" ata-parsley-type="number" value="{{ old('telephone') }}"  class="form-control"   required placeholder="Saisir votre Téléphone"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Sexe</label>

                            <select class="custom-select" name="sexe" required>
                                <option value="" selected>Selectionner</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Date Naissance</label>
                        <input type="date" name="datenaiss" value="{{ old('datenaiss') }}"   class="form-control"  required placeholder="Saisir date de Naissance"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Date d'Entrée</label>
                        <input type="date" name="dateentre" value="{{ old('dateentre') }}"   class="form-control"   required placeholder="Saisir  date d'entrée"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Date de fin de contrat</label>
                        <input type="date" name="findecontrat" value="{{ old('findecontrat') }}"   class="form-control"  required placeholder="Saisir date fin de contrat "/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Poste</label>
                        <input type="text" name="poste" class="form-control"  value="{{ old('poste') }}"   placeholder="Saisir le poste"/>
                      </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Situation matrimonial</label>
                        <input type="text" name="sm" value="{{ old('sm') }}"   class="form-control"  required placeholder="Saisir Situation matrimoniale"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Nombre d'enfant</label>
                        <input type="number" name="nbenfant" ata-parsley-type="number" value="{{ old('nbenfant') }}"  class="form-control"   required placeholder="Saisir nombre d'enfant"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Statut</label>

                            <select class="custom-select" name="statut" required>
                                <option selected>Selectionner</option>
                                <option value="Stage">Stage</option>
                                <option value="CDD">CDD</option>
                                <option value="CDI">CDI</option>
                            </select>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">Niveau d'étude</label>
                        <input type="number" name="etude" ata-parsley-type="number" value="{{ old('etude') }}"  class="form-control"   required placeholder="Saisir Niveau d'étude"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="mb-2 pb-1">adresse</label>
                        <input type="text" name="adresse" ata-parsley-type="text" value="{{ old('adresse') }}"  class="form-control"   required placeholder="Saisir Adresse"/>
                    </div>
                    <div class="form-group mb-0">
                        <label class="my-2 py-1">Lien du dossier du candidat</label>
                        <div>
                            <input parsley-type="url" type="lien" class="form-control" value="{{ old('lien') }}"
                                 name="lien"   required placeholder="Saisir le lien du dossier du candidat"/>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label class="my-2 py-1">Projet</label>
                        <div>
                            <select class="custom-select" name="projet_id" required>
                                <option selected>Selectionner</option>
                            @foreach ($projets as $projet )
                            <option value="{{ $projet->id }}">{{ $projet->nomp }}</option>
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
        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

@endsection
