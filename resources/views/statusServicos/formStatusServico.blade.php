@extends('admin')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Adicionar Status Serviço</h1>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('statusServicos.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status">
                </div>
                <div class="form-group">
                    <label for="descricaoStatus">Descrição</label>
                    <input type="text" class="form-control" name="descricaoStatus">
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </form>
        </div>
    </div>
</div>
@endsection
