<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boxes</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Example Component</div>

                <div class="panel-body">

                    <table class="table-simple table-bordered">
                        <thead>
                        <tr>
                            <th>Номер</th>
                            <th>Количество</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model->id}}</td>
                                <td>{{$model->sum}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

    <div id="app">
        <example></example>



        <script src="js/app.js" charset="utf-8"></script>
    </div>
</body>
</html>