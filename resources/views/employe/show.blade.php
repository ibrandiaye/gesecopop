@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employe.index') }}">employe</a></li>
                    <li class="breadcrumb-item active">{{ $employe->prenom }} {{ $employe->nom }}</li>
                </ol>
            </div>
            <h4 class="page-title">{{ $employe->prenom }}  {{ $employe->nom }}</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12">
<br><br>
            <!-- Simple card -->
            <div class="card">
                {{--  <img class="card-img-top img-fluid" src="/assets/images/small/img-2.jpg" alt="Card image cap">  --}}
                <div class="card-body">
                    <div class="card-avatar">
                        <a class="card-thumbnail card-inner" href="#">
                            @if($employe->photo)
                            <img class="rounded-circle img-thumbnail img-fluid" src="{{ asset('image/'.$employe->photo) }}" alt="Teddy Wilson">
                            @else
                            <img class="rounded-circle img-thumbnail img-fluid" src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="Teddy Wilson">
                            @endif

                        </a>
                    </div>
                    <h6 class="card-title">{{ $employe->prenom }} {{ $employe->nom }}</h6>
                    <p> Sexe: {{ $employe->sexe }}</p>
                    <p> Date Naissance : {{ Carbon\Carbon::parse($employe->datenaiss)->format('d-m-Y')   }}</p>
                    <p>Situation matrimonial: {{ $employe->sm }}</p>
                    <p>Nombre d'enfant: {{  $employe->nbenfant }}</p>
                    <p>Nombre d'années d'étude: {{ $employe->etude }}</p>
                    <p>Adresse: {{ $employe->adresse }}</p>
                    <h6 class="font-14 mt-0">Contrats</h6>
                    @foreach ($employe->contrats as $contrat)
                        <p>Poste: {{ $contrat->poste }}</p>
                        <p>Date Début {{  Carbon\Carbon::parse( $contrat->datedebut)->format('d-m-Y')  }}</p>
                        <p> Date Fin: {{ Carbon\Carbon::parse($contrat->datefin)->format('d-m-Y')  }}</p>
                        <p> Type de contrat: {{ $contrat->type }}</p>
                      <td>  <a href="{{ route('contrat.edit', $contrat->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route'=>['contrat.destroy', $contrat->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            {!! Form::close() !!}
</td>
<hr>
                @endforeach

                </div>
            </div>

    </div>
</div>
@endsection
