<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordem Serviço</title>
</head>
<body>
    <h1>Logo da loja</h1>
    <hr>
    <h3>Ordem de Serviço</h3>
    <hr>
    <br>
    <form>
        <label><b>Cliente: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->pessoa->nome }}">
        @endforeach
        <label><b>CPF: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->pessoa->cpf }}">
        @endforeach
        <br><br>
        <label><b>Data Entrada: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->dataInicio }}">
        @endforeach
        <label><b>Data Término: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->dataTermino }}">
        @endforeach
        <br><br>
        <label><b>Equipamento: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->equipamento->nomeEquipamento }}">
        @endforeach
        <label><b>Defeito: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->defeito }}">
        @endforeach
        <br><br>
        <label><b>Observacoes: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->observacoesOS }}">
        @endforeach
        <label><b>Status: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->statusServico->status }}">
        @endforeach
    </form>
    <hr>
    <h3><u>Serviço</u></h3>
    <table>
        <thead>
            <tr>
                <td>Serviço</td>
                <td>Valor</td>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($ordemServico as $item)
                <tr>
                    <td>{{ $item->servico }}</td>
                    <td>{{  }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
    <hr>
    <h3><u>Peças</u></h3>
    <table>
        <thead>
            <tr>
                <td>Qtd</td>
                <td>Peça</td>
                <td>Valor Unitário</td>
                <td>Valor Total</td>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <hr>
    <br>
    <form>
        <label><b>Valor Total: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->valorTotal }}">
        @endforeach
    </form>
    <hr>
    <h4><u>Observações: </u></h4>
    <li>A garantia de 3 meses é apartir da data de término do concerto,
        não da data que o cliente retirou o equipamento da loja.</li>
</body>
</html>
