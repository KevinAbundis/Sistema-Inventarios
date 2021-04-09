<!DOCTYPE html>
<html>
<head>
    <title>Chevrolet Matriz - Welcome</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/static/css/style.css?v='.time()) }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@700&display=swap" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/f672163810.js" crossorigin="anonymous"></script>

</head>
<body>

    <nav class="navbar navbar-expand-lg shadow">
        {{-- <img class="img1" src="{{ url('/static/images/Chevrolet.png') }}"> --}}
        <img class="img1" src="{{ url('/static/images/FirmaChevroletLogos.png') }}">
        <h2>SISTEMA DE INVENTARIOS</h2>
        <a class="navbar-brand" href="{{ url('/login') }}">INICIAR SESIÓN</a>
    </nav>

    <div >
       <img class="img2" src="{{ url('/static/images/chevrolet-acapulco.png') }}">
   </div>



</body>
</html>
