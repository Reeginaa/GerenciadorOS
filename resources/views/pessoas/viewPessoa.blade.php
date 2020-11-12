@extends('admin')

<title>Dados da Pessoa</title>

@section('main')
<div class="modal fade" id="modalVerPessoa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados de Pessoa</h5>
                <button type="button" class="close" data-dissmiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    <label for="">Nome</label>
                    <p>{{$registro->nome}}</p>
                </div>
                <div class="">
                    <label for="">CPF</label>
                    <p>{{$registro->cpf}}</p>
                </div>
                <div class="">
                    <label for="">RG</label>
                    <p>{{ $registro->rg }}</p>
                </div>
                <div class="">
                    <label for="">Data Nascimento</label>
                    <p>{{ $registro->dataNascimento }}</p>
                </div>
                <div class="">
                    <label for="">Sexo</label>
                    <p>{{ $registro->sexo }}</p>
                </div>
                <div class="">
                    <label for="">Logradouro</label>
                    <p>{{ $registro->logradouro }}</p>
                </div>
                <div class="">
                    <label for="">Nº</label>
                    <p>{{ $registro->numero }}</p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dissmiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endsection
