<!doctype html>
<html lang='{{ app()->getLocale() }}'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>Neteller MiddleMan</title>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:100,600' rel='stylesheet' type='text/css'>        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <style>
            .content {
                text-align: center;
                margin-top: 120px;
            }
            .table>thead>tr>th {
                text-align: center;
            }
            .input-group {
                display: flex;
                width: 50%;
                float: right;
            }
            .btn.btn-success {
                padding: 5px 40px;
                letter-spacing: 1px;
                border-bottom-left-radius: 0px;
                border-top-left-radius: 0px;
                margin-right: 30px;
            }
            table {
                border-bottom: 1px solid;
            }
            .table {
                padding-top: 30px;  
            }
            .table th {
                background: #ebedef;
            }
        </style>
    </head>
    <body>    
        <div class='content'>
            <div class='container'>                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <form action='{{route("add")}}' method='post'>
                    {{ csrf_field() }}
                    <div class='input-group'>
                        <input type='text' class='form-control' name='host_url' autocomplete='off'/>
                        <button class='btn btn-success'>Add</button>
                        <a href="{{ route('logout') }}" class='btn btn-danger'
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>
                </form>            
                <div class='table-responsive table table-hover'>
                    <table id='dataTable' class='table table-hover'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Payment Hub</th>
                                <th class='actions'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($hosts as $key => $host) { ?>
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$host->url}}</td>
                                        <td><a href='/delete/{{$host->id}}'>Delete</a></td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
