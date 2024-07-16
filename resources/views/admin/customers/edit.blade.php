<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="store_name">Nome da Loja:</label>
                <input type="text" id="store_name" name="store_name" value="{{ $customer->store_name }}" required>
            </div>
            <div>
                <label for="store_owner">Nome do Proprietário:</label>
                <input type="text" id="store_owner" name="store_owner" value="{{ $customer->store_owner }}" required>
            </div>
            <div>
                <label for="logo">Logo da Loja:</label>
                <input type="file" id="logo" name="logo">
                @if($customer->logo_url)
                    <img src="{{ Storage::url($customer->logo_url) }}" alt="Logo da Loja" width="100">
                @endif
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
                <input type="checkbox" id="dobrou_mes1" name="dobrou_mes1" value="1" {{ $customer->dobrou_mes1 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="dobrou_mes2">Dobrou Mês 2:</label>
                <input type="checkbox" id="dobrou_mes2" name="dobrou_mes2" value="1" {{ $customer->dobrou_mes2 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="referral_1">Referral 1:</label>
                <input type="checkbox" id="referral_1" name="referral_1" value="1" {{ $customer->referral_1 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="referral_2">Referral 2:</label>
                <input type="checkbox" id="referral_2" name="referral_2" value="1" {{ $customer->referral_2 ? 'checked' : '' }}>
            </div>
            <div>
                <label for="referral_3">Referral 3:</label>
                <input type="checkbox" id="referral_3" name="referral_3" value="1" {{ $customer->referral_3 ? 'checked' : '' }}>
            </div>
            <button type="submit">Salvar</button>
            <a class="button" href="{{ route('admin.customers.index') }}">Cancelar</a>
        </form>
    </div>
</body>
</html>
