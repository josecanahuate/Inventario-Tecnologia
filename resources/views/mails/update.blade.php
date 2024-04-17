<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h1>Dispisitivo: {{ $device->id }}<strong>ACTUALIZADO</strong></h1>
    <p>Se ha <strong>actualizado</strong> el dispositivo con id: {{ $device->id }}</p>
    <div>
        Nombre del dispositivo: {{ $device->name }} <br>
        Descripcion del dispositivo: {{ $device->description }} <br>
    </div>
</body>
</html>
