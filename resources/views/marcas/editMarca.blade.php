@extends('admin')

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="ui">
            <h1 class="text-center">Alterar Marca</h1>
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

            <form action="{{ route('marcas.update', $marca->id) }}" class="form-group text-center">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nomeMarca">Marca: *</label>
                    <input type="text" class="form-control" name="nomeMarca" required value={{ $marca->nomeMarca }} >
                </div>
                <div class="form-group">
                    <label for="observacaoMarca">Observações: </label>
                    <textarea name="observacaoMarca" class="form-control" type="text"
                     placeholder="Escreva as observações de marca se necessário" value={{ $marca->observacaoMarca }}></textarea>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<br><br><br><br>
@endsection
