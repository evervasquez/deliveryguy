@extends('index')

@section('content')
<script type="text/javascript">
    function initialize() {
        var marcador=null;
        var mapa = new google.maps.Map(document.getElementById("map_canvas"),
            {
                center: new google.maps.LatLng(25.794327247836158, -80.20522713661194),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
        //Creo un evento asociado a "mapa" cuando se hace "click" sobre el
        google.maps.event.addListener(mapa, "click", function(evento) {
            //Obtengo las coordenadas separadas
            if(marcador!=null){
                marcador.setMap(null);
            }
            latitud = evento.latLng.lat();
            longitud = evento.latLng.lng();
            //Creo un marcador utilizando las coordenadas obtenidas y almacenadas por separado en "latitud" y "longitud"
            var coordenadas = new google.maps.LatLng(latitud, longitud);
            $(".latitude").val(latitud);
            $(".longitude").val(longitud);
            /* Debo crear un punto geografico utilizando google.maps.LatLng */
            marcador = new google.maps.Marker({
                position: coordenadas,
                map: mapa,
                animation: google.maps.Animation.DROP,
                title: "Ubicación de Clinica"});
        }); //Fin del evento
    }
    function loadScript() {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCAQb4QGnRfACuyzxoA6v1EYwJhNxSY6kQ&sensor=false&callback=initialize";
        document.body.appendChild(script);
    }
    window.onload = loadScript;
</script>
<style type="text/css">
    #map_canvas{
        padding-left: 0px;
    }
</style>
<div class="col-lg-12">
    <h1 class="page-header">Companies</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            Login Form Company
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4">
                    {{ Form::open(array('route' => 'companies.store','id' => 'formulario','role'=>'form')) }}
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" autofocus name="company_name" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="company_address">
                        </div>
                        <div class="form-group">
                            <label>Bank Account</label>
                            <input type="text" class="form-control" name="company_bank">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="company_phone">
                        </div>
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" class="form-control latitude" disabled  />
                            <input type="hidden" class="form-control latitude" name="company_latitude">
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" class="form-control longitude" disabled />
                            <input type="hidden" class="form-control longitude" name="company_longitude" />
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                        <button type="reset" class="btn btn-default">Reset Button</button>
                    {{ Form::close() }}
                </div>
                <!-- /.col-lg-6 (nested) -->
                <div class="col-lg-8">
                    <label>Click here to choose the location</label>
                    <div id="map_canvas" class="table-responsive" style="width: 100%; height: 450px">
                </div>
                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    </div>
</div>
@overwrite