<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <title>Oficina</title>
</head>
<body>
<div class="list-group">
    <a type="button" href="{{ url('pqrs')}}" class="list-group-item list-group-item-action">Pqrs</a>
    <a type="button" href="{{ url('eventos')}}" class="list-group-item list-group-item-action">Inscripción a eventos</a>
    <a type="button" href="{{ url('clasificados')}}" class="list-group-item list-group-item-action">Clasificados</a>
    <a type="button" href="{{ url('clasificado')}}" class="list-group-item list-group-item-action">Lista de
        clasificados</a>
</div>
</body>
</html>
