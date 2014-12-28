@extends('index')

@section('content')
<div class="col-lg-12">
    <h1 class="page-header">List Deliveries</h1>
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: right">
            <a href="{{route('deliveries.create')}}" class="btn btn-primary">new delivery</a>
        </div>
        <div class="panel-body">
            <div class="table-responsive"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        var url = 'deliveries';
        var grid_table = $(".table-responsive");
        var iddatable = "datatable";
        var col_names = ['Id','Company Name','Delivery Code', 'Customer', 'Type Buy','Reservation','Confirmation',''];
        var col_hidden = [true,true, true,true,true,true,true]
        var accion = [1];

        loadTable(iddatable, 'GET', url + '/getAll', url, grid_table, col_names, accion, col_hidden);

    });
</script>
@overwrite