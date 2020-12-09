<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    @foreach ($equipamento as $item)
        <h2>Nome: {{ $item->nomeEquipamento }}</h2>
    @endforeach
</body>
</html>
