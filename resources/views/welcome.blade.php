@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">ENDA RH</a></li>
                    <li class="breadcrumb-item active">Tableau de bord</li>
                </ol>
            </div>
            <h4 class="page-title">Tableau de bord</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-right">
                                <div class="m-l-10">
                                    <h5 class="mt-0">{{ $nbStage }}</h5>
                                    <p class="mb-0 text-muted">Nombre de stagiaire</p>
                                </div>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height:3px;">
                            <div class="progress-bar  bg-success" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-9 text-right align-self-center">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0">{{ $nbCdd }}</h5>
                                    <p class="mb-0 text-muted">Nombre de CDD</p>
                                </div>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height:3px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 48%;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="search-type-arrow"></div>
                        <div class="d-flex flex-row">
                            <div class="col-3 align-self-center">
                                <div class="round ">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                            <div class="col-9 align-self-center text-right">
                                <div class="m-l-10 ">
                                    <h5 class="mt-0">{{ $nbCdi }}</h5>
                                    <p class="mb-0 text-muted">Nombre de CDI</p>
                                </div>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height:3px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->

    </div><!--end col-->


</div><!--end row-->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="datatable"  class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>prenom</th>
                        <th>nom</th>
                        <th>sexe</th>
                        <th>Date de Naissance</th>
                        <th>Date d'entrée</th>
                        <th>Début contrat</th>
                        <th>Fin contrat</th>
                        <th>Situation matrimonial</th>
                        <th>Nombre d'enfanté</th>
                        <th>Statut</th>
                        <th>Nombre d'années d'étude</th>
                        <th>Adresse</th>
                        <th>Lien</th>
                        <th>ancienneté</th>
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
                                <td>{{ Carbon\Carbon::parse($employe->datenaiss)->format('d-m-Y')   }}</td>
                                <td>{{ Carbon\Carbon::parse($employe->datedebut)->format('d-m-Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($employe->dateentre)->format('d-m-Y') }}</td>
                                <td style="color: {{ $employe->restant < 45  ? 'red' : '' }}">{{ Carbon\Carbon::parse($employe->findecontrat)->format('d-m-Y')   }}

                                  {{--    {{ $employe->restant}} jours  --}}
                                </td>
                                <td>{{ $employe->sm }}</td>
                                <td>{{ $employe->nbenfant }}</td>
                                <td>{{ $employe->statut }}</td>
                                <td>{{ $employe->etude }}</td>
                                <td>{{ $employe->adresse }}</td>

                                <td><a href="{{ $employe->lien }}">Dossier</a> </td>
                                <td>{{ $employe->anciennete }} ans</td>
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

