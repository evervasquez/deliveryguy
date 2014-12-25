@extends('index')

@section('content')
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