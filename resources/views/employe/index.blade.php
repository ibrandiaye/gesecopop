@section('css')
<!-- Plugins css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />@extends('layout')
<link href="{{ asset('assets/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employe.index') }}">employe</a></li>
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

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1"  class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>prenom</th>
                        <th>nom</th>
                        <th>sexe</th>
                        <th>Date de Naissance</th>
                        <th>Date d'entrée</th>
                        <th>Date fin de contrat</th>
                        <th>Situation matrimonial</th>
                        <th>Nombre d'enfanté</th>
                        <th>Statut</th>
                        <th>Nombre d'années d'étude</th>
                        <th>Salaire</th>
                        <th>Lien</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $employe)
                            <tr>
                                <td>{{ $employe->id }}</td>
                                <td>{{ $employe->prenom }}</td>
                                <td>{{ $employe->nom }}</td>
                                <td>{{ $employe->sexe }}</td>
                                <td>{{ $employe->datenaiss }}</td>
                                <td>{{ $employe->dateentre }}</td>
                                <td>{{ $employe->findecontrat }}</td>
                                <td>{{ $employe->sm }}</td>
                                <td>{{ $employe->nbenfant }}</td>
                                <td>{{ $employe->statut }}</td>
                                <td>{{ $employe->etude }}</td>
                                <td>{{ $employe->salaire }}</td>
                                <td><a href="{{ $employe->lien }}">Dossier</a> </td>
                                <td>  <a href="{{ route('employe.edit', $employe->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['employe.destroy', $employe->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    {!! Form::close() !!}
    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
@section('script')
<!-- Required datatable js -->
<script src=" {{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src=" {{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
<script src="{{ asset('assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
        <script src="{{ asset('assets/pages/re-table.init.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#tech-companies-1').DataTable();
    } );
</script>

@endsection
