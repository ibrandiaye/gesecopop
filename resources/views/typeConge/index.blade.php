@extends('layout')
@section('css')
<!-- Plugins css -->
<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('type-conge.index') }}">Type de Congé</a></li>
                </ol>
            </div>
            <h4 class="page-title">Liste des  types de Congé</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>durée</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($typeConges as $typeConge)
                            <tr>
                                <td>{{ $typeConge->id }}</td>
                                <td>{{ $typeConge->type }}</td>
                                <td>{{ $typeConge->nbj }} jours</td>
                                <td>  <a href="{{ route('type-conge.edit', $typeConge->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['type-conge.destroy', $typeConge->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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
@endsection
@section('script')
<!-- Required datatable js -->
<script src=" {{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src=" {{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable2').DataTable();
    } );
</script>

@endsection
