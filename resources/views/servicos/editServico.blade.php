@extends('admin')

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="ui">
            <h1 class="text-center">Alterar Serviço</h1>
            <hr class="hr-light">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('servicos.update', $servico->id) }}" class="form-group text-center">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="servico">Serviço: *</label>
                    <input type="text" class="form-control" name="servico" required
                     placeholder="Escreva o serviço" value={{$servico->servico}}>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="valor">Valor: *</label>
                        <input type="real" name="valor" class="form-control" required value={{$servico->valor}}>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="desconto">Desconto: </label>
                        <input type="number" name="desconto" class="form-control" value={{$servico->desconto}}>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<br><br><br><br>
@endsection
