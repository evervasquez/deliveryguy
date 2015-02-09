<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <br/>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h4>Registrate como:</h4>
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#company" aria-controls="company" role="tab" data-toggle="tab">Restaurante</a></li>
                    <li role="presentation"><a href="#guy" aria-controls="guy" role="tab" data-toggle="tab">Repartidor</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="company">
                        <div class="panel panel-default">
                            <br/>
                            <div class="panel-body">
                                <form class="form form-vertical">
                                    <div class="control-group">
                                        <label>Name</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Enter Name">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label>Message</label>
                                        <div class="controls">
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label>Category</label>
                                        <div class="controls">
                                            <select class="form-control"><option>options</option></select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary">
                                                Post
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div><!--/panel content-->
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="guy">
                        <div class="panel panel-default">
                            <br/>
                            <div class="panel-body">
                                <form class="form form-vertical">
                                    <div class="control-group">
                                        <label>Name</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label>Message</label>
                                        <div class="controls">
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label>Category</label>
                                        <div class="controls">
                                            <select class="form-control"><option>options</option></select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary">
                                                Post
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div><!--/panel content-->
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<!-- /container -->
</body>
</html>