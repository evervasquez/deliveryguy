<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'); }}
    {{ HTML::style('assets/css/signin.css'); }}

</head>
<body>
<div class="container">

        {{ Form::open(array('route' => 'login','id' => 'formulario','action' =>'login','role'=>'form','class'=>'form-signin')) }}
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="User" required autofocus>
        {{ $errors->first('username','<p class="error_message">:message</p>') }}
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        {{ $errors->first('password','<p class="error_message">:message</p>') }}
        <div class="checkbox">
            <label>
                <input type="checkbox" checked name="remember" id="remember"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    {{ Form::close() }}
    <!-- /widget-main -->
    @if (Session::has('message'))
    <span class="text-success">{{ Session::get('message') }}</span>
    @endif

    @if (Session::has('error'))
    <span > {{ Session::get('error') }}</span>
    @endif
</div>
<!-- /container -->
</body>
</html>