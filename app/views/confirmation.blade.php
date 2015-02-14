@extends('sign-up')

@section('content')
    <div class="container">
        <h2>{{dd($employee)}} Welcome to DeliveryGuy</h2>
        <p>To complete the registration has to create a strong password for your future income.</p>
        {{ Form::open(array('route' => 'employee.sign-up','class'=> 'form-inline','role'=>'form')) }}
            <input name="token" type="hidden">
            <div class="form-group">
                <label class="sr-only" for="email">Email:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label class="sr-only" for="pwd">Password:</label>
                <input type="password_confirmation" class="form-control" id="pwd" placeholder="Repeat password">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        {{ Form::close() }}
    </div>
@overwrite