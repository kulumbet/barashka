<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxes</title>

    <link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">

    <script>
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    </script>
</head>

<body>

<div class="col-md-12">
    <div class="row">

        <div class="col-md-12">
            <div>
                <div id="app">

                </div>
            </div>
        </div>


    </div>

</div>

<script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>

<script src="js/app.js"></script>

</body>

</html>