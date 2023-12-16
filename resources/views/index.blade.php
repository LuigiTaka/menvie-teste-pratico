@extends("base")


@section("main")
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Menvies CRUD - Lista de Registros </h2>
        </div>
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('pessoas.create') }}"> Novo cadastro</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
{!! $pessoas->links() !!}
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th colspan="2">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($pessoas as $pessoa)
        <tr>
            <td>{{ $pessoa->id }}</td>
            <td>{{ $pessoa->nome }}</td>
            <td>{{ $pessoa->email }}</td>
            <td>{{ $pessoa->telefone }}</td>
            <td>
                <form action="{{ route('pessoas.destroy',$pessoa->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('pessoas.edit',$pessoa->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <!-- @todo Adicionar confirmação -->
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $pessoas->links() !!}

@endsection
