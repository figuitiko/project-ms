<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 20%;">Nombre</th>
        <th style="width: 20%;">Apellidos</th>
        <th style="width: 20%;">Respuesta</th>
        <th style="width: 5%;">total</th>
    </tr>
    </thead>
    <tbody>

    @foreach($quizzedWithTotal as $key => $quizzedTotal)
        <tr>

            <td>{{$quizzedTotal->name}}</td>
            <td>{{$quizzedTotal->last_name}}</td>
            <td>{{$quizzedTotal->content}}</td>
            <td>{{$quizzedTotal->total}}</td>



        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
