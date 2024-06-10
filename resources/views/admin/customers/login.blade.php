@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="loginform">
<form id="loginForm" onsubmit="return verifyCredentials(event)">
    @csrf
    <label for="username">Username :</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password :</label>
    <input type="password" id="password" name="password" required><br><br><br>
    <button type="submit" class="btnlogin">Login</button>
    <button onclick="window.location.href='/'" class="btnlogin">Voltar</button>
</form>
</div>

<script>
    function verifyCredentials(event) {
        event.preventDefault();
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        if (username === 'admin' && password === 'cruzeiro') {
            window.location.href = '/admin/customers';
        } else {
            alert('Credenciais incorretas, tente novamente');
        }
    }

    
</script>

@endsection

