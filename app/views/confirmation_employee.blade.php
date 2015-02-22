@extends('layout')

@section('content')
    <div class="container">
        <h2>{{ucwords($employee['first_name']).' '.ucwords($employee['last_name'])}} Welcome to DeliveryGuy</h2>
        <p>To complete the registration has to create a strong password for your future income.</p>
        {{ Form::open(array('route' => 'confirmation.post','class'=> 'form-inline','role'=>'form')) }}
        <input name="_type" type="hidden" value="{{base64_encode(base64_encode($employee['code']))}}">
        <input name="email" type="hidden" value="{{$employee['email']}}">
        {{ $errors->first('email','<p class="error_message">:message</p>') }}
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
            {{ $errors->first('password','<p class="error_message">:message</p>') }}

        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        {{ Form::close() }}
    </div>
@overwrite