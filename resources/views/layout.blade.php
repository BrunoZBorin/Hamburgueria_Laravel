<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hamburgueria Valbernielson's</title>
</head>
<body>
<div class="container">
<nav>
    <div class="card-header bg-danger text-white">Hamburgueria Valbernielson's</div>
</nav>
<div class="jumbotron bg-warning"><h1>@yield('header')</h1></div>
@yield('content')
<footer> <div class="card-footer text-center bg-warning">
    Fazendo hamburgueres desde 2020
    </div></footer>
</div>   
</body>
</html>