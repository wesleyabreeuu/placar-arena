@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header text-center bg-primary text-white">
                <h4><i class="fas fa-user-plus"></i> Criar Conta</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Nome --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input id="name" type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input id="email" type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Senha --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input id="password" type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               name="password" required>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Confirmar Senha --}}
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirmar Senha</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    {{-- Botão --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> Criar Conta
                        </button>
                    </div>

                    {{-- Link para login --}}
                    <div class="mt-3 text-center">
                        <a href="{{ route('login') }}">Já tem uma conta? Faça login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
