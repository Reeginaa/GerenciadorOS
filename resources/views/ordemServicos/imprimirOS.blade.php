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
            <label>{{ $ordemServico->pessoa->nome }}</label>
        <label><b>CPF: </b></label>
            <label>{{ $ordemServico->pessoa->cpf }}</label>
        <label><b>Status: </b></label>
            <label>{{ $ordemServico->statusServico->status }}</label>
        <br><br>
        <label><b>Data Entrada: </b></label>
            <label>{{ date('d/m/Y', strtotime($ordemServico->dataInicio)) }}</label>
        <label><b>Data Término: </b></label>
            @if ($ordemServico->dataTermino != null)
                <label>{{ date('d/m/Y', strtotime($ordemServico->dataTermino)) }}</label>
            @else
                <label>{{ $ordemServico->dataTermino }}</label>
            @endif
        <label><b>Observacoes: </b></label>
            <label>{{ $ordemServico->observacoesOS }}</label>
        <br><br>
        <label><b>Equipamento: </b></label>
            <label>{{ $ordemServico->equipamento->nomeEquipamento }}</label>
        <label><b>Defeito: </b></label>
            <label>{{ $ordemServico->defeito }}</label>
        <br><br>
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
            @foreach ($ordemServico->osServico as $item)
                <tr>
                    <td>|{{ $item->servico->servico }}|</td>
                    <td>R$ {{ $item->servico->valor }}|</td>
                </tr>
            @endforeach
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
            @foreach ($ordemServico->osPeca as $item)
                <tr>
                    <td>{{ $item->qtd }}</td>
                    <td>{{ $item->peca->item }}</td>
                    <td>R$ {{ $item->peca->valorVenda }}</td>
                    <td>R$ {{ $item->valor_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <br>
    <form>
        <label><b>Valor Total: </b></label>
            <label>R$ {{ $ordemServico->valorTotal }}</label>
    </form>
    <hr>
    <h4><u>Observações: </u></h4>
    <li>A garantia de 3 meses é apartir da data de término do concerto,
        não da data que o cliente retirou o equipamento da loja.</li>
</body>
</html>
