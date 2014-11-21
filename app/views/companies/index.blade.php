@extends('index')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Companies</h1>
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align: right">
                <a href="{{route('companies.create')}}" class="btn btn-primary">new company</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive"></div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function () {
        /*$('#dataTables-example').dataTable({
            "ajax": '{{ url('/')}}'+'/companies/getAll'
        });*/

        var url = 'companies';
        var grid_table = $(".table-responsive");
        var iddatable = "datatable";
        var col_names = ['Company Name', 'Address', 'Phone','Latitude','Logitude',''];
        var col_hidden = [true, true,true,true,true,true]
        var accion = [1];

        loadTable(iddatable, 'GET', url + '/getAll', url, grid_table, col_names, accion, col_hidden);

    });
</script>
@overwrite