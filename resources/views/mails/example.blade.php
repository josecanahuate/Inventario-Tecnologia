<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h1>Nuevo Dispositivo en el Inventario</h1>
    <p>Se ha creado un nuevo dispositivo</p>
    <div>
        Nombre del dispositivo: {{ $device->name }} <br>
        Descripcion del dispositivo: {{ $device->description }} <br>
    </div>
</body>
</html>
