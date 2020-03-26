<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                </tr>
            @endforeach    
        </tbody>    
    </table>    
</body>    
</html>