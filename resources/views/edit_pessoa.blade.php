@extends("base")

@section("main")
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 my-2">
            <div class="">
                <h2>Editar Pessoa</h2>
            </div>
            <div class="">
                <a class="btn btn-primary" href="{{ route('pessoas.index') }}" enctype="multipart/form-data">
                    Voltar</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('pessoas.update',$pessoa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" value="{{ $pessoa->nome }}" class="form-control"
                           placeholder="Nome">
                    @error('nome')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email"
                           value="{{ $pessoa->email }}">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telefone:</strong>
                    <input type="tel" name="telefone" value="{{ $pessoa->telefone }}" class="form-control"
                           placeholder="Telefone">
                    @error('telefone')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Salvar</button>
        </div>
    </form>
</div>
@endsection
