@extends('admin')

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="ui">
            <h1 class="text-center">Editar Status Serviço</h1>
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

            <form action="{{route('statusServicos.update', $registro->id) }}" method="post" class="form-group text-center">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="status">Status: *</label>
                    <input id="status" type="text" class="form-control" name="status"
                     value="{{$registro->status}}" required>
                </div>
                <div class="form-group">
                    <label for="descricaoStatus">Descrição: </label>
                    <textarea name="descricaoStatus" id="descricaoStatus" type="text" class="form-control"
                     placeholder="Escrevas as observações desse estatus se desejar" value="{{ $registro->descricaoStatus }}"></textarea>
                </div>
                <hr class="hr-light">
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<br><br><br><br>
@endsection
