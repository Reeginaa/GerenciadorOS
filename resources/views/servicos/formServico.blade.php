@extends('admin')

<title>Adicionar Serviço</title>

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="ui">
            <h1 class="text-center">Adicionar Serviço</h1>
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

                <form action="{{ route('servicos.store') }}" method="post" class="form-group text-center">
                    @csrf
                    <div class="form-group">
                        <label for="servico">Serviço: *</label>
                        <input type="text" class="form-control" name="servico" required
                         placeholder="Escreva o serviço">
                    </div>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="form-group col-lg-6">
                            <label for="valor">Valor: *</label>
                            <input type="real" class="form-control" name="valor" required onkeypress="$(this).mask('R$ #.##0,00')">
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    <hr class="hr-light">
                    <button type="submit" class="btn btn-success">
                        <i class="far fa-save mr-1"></i>Salvar
                    </button>
                    <button type="reset" class="btn btn-warning">
                        <i class="fas fa-backspace mr-1"></i>Limpar
                    </button>
                    <a href="{{ route('servicos.index') }}" class="btn btn-danger">
                        <i class="fas fa-undo mr-1"></i>Voltar
                    </a>
                </form>
            </div>

        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<br><br><br>
@endsection
