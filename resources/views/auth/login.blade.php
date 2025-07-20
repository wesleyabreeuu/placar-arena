@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 90vh;">
    <div class="card shadow-sm" style="width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">🔐 Acesso ao Placar Arena</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">📧 E-mail</label>
                    <input type="email" class="form-control" name="email" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">🔒 Senha</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Lembrar-me</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">➡️ Entrar</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center small text-muted">
            © {{ date('Y') }} Placar Arena
        </div>
    </div>
</div>
@endsection
