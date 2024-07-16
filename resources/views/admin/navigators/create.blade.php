<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Criar Navegador</h1>
                <form action="{{ route('admin.navigators.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto</label>
                        <input type="file" name="photo" id="photo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lions">Produto</label>
                        <select name="lions" id="lions" class="form-control" required>
                            <option value="1">Lions car club</option>
                            <option value="0">Programa G30</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Criar</button>
                    <a class="button" href="{{ route('admin.navigators.index') }}">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
