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
        <h1 class="centered-title">RANKING CRUZEIRO</h1>
        <table class="customers-table" border="1">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nome da Loja</th>
                    <th>Proprietário</th>
                    <th>Dobrou Mês 1</th>
                    <th>Dobrou Mês 2</th>
                    <th>Indicou 1</th>
                    <th>Indicou 2</th>
                    <th>Indicou 3</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>
                        <img src="{{ Storage::url($customer->logo_url) }}" alt="Logo da Loja" width="50">
                        </td>
                        <td>{{ $customer->store_name }}</td>
                        <td>{{ $customer->store_owner }}</td>
                        <td>{{ $customer->dobrou_mes1 }}</td>
                        <td>{{ $customer->dobrou_mes2 }}</td>
                        <td>{{ $customer->referral_1 }}</td>
                        <td>{{ $customer->referral_2 }}</td>
                        <td>{{ $customer->referral_3 }}</td>
                        <td>
                            <a class="button" href="{{ route('admin.customers.edit', $customer->id) }}">Editar</a>
                            <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
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
        <a class="button" href="{{ route('admin.customers.create') }}">Adicionar Novo Cliente</a>
        <a class="button" href="{{ url('/') }}">Painel Mentorado</a>
    </div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.querySelector('.customers-table tbody');
        const rows = table.querySelectorAll('tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            cells.forEach((cell, index) => {
                if (index !== 0) { // Exclude the ID column
                    if (cell.textContent.trim() === '1') {
                        cell.textContent = 'Sim';
                    } else if (cell.textContent.trim() === '0') {
                        cell.textContent = 'Não';
                    }
                }
            });
        });
    });
</script>

