<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Clientes</title>
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="centered-title">Navegadores</h1>
        <table class="customers-table" border="1">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Produto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($navigators as $navigator)
                <tr>
                    <td><img src="{{ Storage::url($navigator->photo) }}" alt="{{ $navigator->name }}" width="50"></td>
                    <td>{{ $navigator->name }}</td>
                    <td>{{ $navigator->lions ? 'Yes' : 'No' }}</td>
                    <td>
                        <a class="button" href="{{ route('admin.navigators.edit', $navigator->id) }}">Editar</a>
                        <form action="{{ route('admin.navigators.destroy', $navigator->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a class="button" href="{{ route('admin.navigators.create') }}">Adicionar Novo Navegador</a>
        <a class="button" href="{{ url('/') }}">Painel Cruzeiro</a>
        <a class="button" href="{{ url('/admin/customers') }}">Painel Mentorado</a>
    </div>
</body>
</html>

