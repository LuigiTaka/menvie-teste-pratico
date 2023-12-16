@extends("base")

@section("main")
    <div class="d-flex align-items-center justify-content-center flex-column text-center vh-100">
        <h1>Bem-vindo ao Sistema de Gerenciamento de Pessoas!</h1>

        <p class="w-75">Este sistema foi desenvolvido para proporcionar uma maneira eficiente e organizada de gerenciar informações de indivíduos. Com funcionalidades para criação, visualização, edição e exclusão de registros, o CRUD de pessoas oferece uma plataforma completa para a administração desses dados essenciais.</p>

        <a href="{{ route('pessoas.index') }}" class="btn btn-dark mt-3">Cadastro de Pessoas</a>
    </div>

@endsection