@extends('admin')

<title>Adicionar Status Serviço</title>
@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="ui">
            <h1 class="text-center">Adicionar Status Serviço</h1>
            <hr class="hr-light">
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

                <form action="{{ route('statusServicos.store') }}" method="post" class="form-group text-center">
                    @csrf
                    <div class="form-group">
                        <label for="status">Status: *</label>
                        <input id="status" type="text" class="form-control" name="status"
                         required placeholder="Informe o status">
                    </div>
                    <div class="form-group">
                        <label for="descricaoStatus">Descrição: </label>
                        <textarea name="descricaoStatus" id="descricaoStatus" type="text" class="form-control"
                         placeholder="Escrevas as observações desse estatus se desejar"></textarea>
                    </div>
                    <hr class="hr-light">
                    <button type="submit" class="btn btn-success">
                        <i class="far fa-save mr-1"></i>Salvar
                    </button>
                    <button type="reset" class="btn btn-warning">
                        <i class="fas fa-backspace mr-1"></i>Limpar
                    </button>
                    <a href="{{ route('statusServicos.index') }}" class="btn btn-danger">
                        <i class="fas fa-undo mr-1"></i>Voltar
                    </a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<br><br><br><br>
@endsection
