@extends('admin')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-2">
        <h1 class="display-3">Alterar Status Serviço</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('statusServicos.update', $statusServico->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status" value={{$statusServico->status}}>
            </div>
            <div class="form-group">
                <label for="descricaoStatus">Descrição</label>
                <textarea name="descricaoStatus" class="form-contol" type="text" value={{$statusServico->descricaoStatus}}></textarea>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
@endsection
