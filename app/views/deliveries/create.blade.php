@extends('index')

@section('content')
<div class="col-lg-12">
    <h1 class="page-header">New Deliveries</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            Login Form Deliveries
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    {{ Form::open(array('route' => 'deliveries.store','id' => 'formulario','role'=>'form')) }}
                    <div class="form-group">
                        <label>Company Name</label>
                        <select name="company_id" class="form-control">
                            @foreach($companies['companies'] as $company)
                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Delivery Code</label>
                        <input type="text" class="form-control" disabled name="deliveryCod">
                    </div>
                    <div class="form-group">
                        <label>Customer</label>
                        <select name="customer_id" class="form-control">
                            @foreach($companies['customers'] as $customer)
                            <option value="{{$customer->id}}">{{$customer->fullname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type Buy</label>
                        <select name="typebuy_id" class="form-control">
                            <option value="1">Card</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <a href="{{route('deliveries')}}" class="btn btn-default">Reset Button</a>
                    {{ Form::close() }}
                </div>
                <!-- /.col-lg-6 (nested) -->
                <div class="col-lg-3">

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