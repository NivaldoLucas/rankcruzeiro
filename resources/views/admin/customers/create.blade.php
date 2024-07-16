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
        <h1>Adicionar Cliente</h1>
        <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="store_name">Nome da Loja:</label>
                <input type="text" id="store_name" name="store_name" required>
            </div>
            <div>
                <label for="store_owner">Nome do Proprietário:</label>
                <input type="text" id="store_owner" name="store_owner" required>
            </div>
            <div>
                <label for="logo">Logo da Loja:</label>
                <input type="file" id="logo" name="logo">
            </div>
            <div class="form-group">
                <label for="navigator_id">Navegador</label>
                <select name="navigator_id" id="navigator_id" class="form-control" required>
                    @foreach($navigators as $navigator)
                        <option value="{{ $navigator->id }}" {{ $customer->navigator_id == $navigator->id ? 'selected' : '' }}>{{ $navigator->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="dobrou_mes1">Dobrou Mês 1:</label>
                <input type="checkbox" id="dobrou_mes1" name="dobrou_mes1" value="1">
            </div>
            <div>
                <label for="dobrou_mes2">Dobrou Mês 2:</label>
                <input type="checkbox" id="dobrou_mes2" name="dobrou_mes2" value="1">
            </div>
            <div>
                <label for="referral_1">Referral 1:</label>
                <input type="checkbox" id="referral_1" name="referral_1" value="1">
            </div>
            <div>
                <label for="referral_2">Referral 2:</label>
                <input type="checkbox" id="referral_2" name="referral_2" value="1">
            </div>
            <div>
                <label for="referral_3">Referral 3:</label>
                <input type="checkbox" id="referral_3" name="referral_3" value="1">
            </div>
            <button type="submit">Criar</button>
            <a class="button" href="{{ route('admin.customers.index') }}">Voltar</a>
        </form>
    </div>
</body>
</html>
