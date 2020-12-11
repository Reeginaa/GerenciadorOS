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
            <input type="text" value="{{ $ordemServico->pessoa->nome }}">
        <label><b>CPF: </b></label>
            <input type="text" value="{{ $ordemServico->pessoa->cpf }}">
        <br><br>
        <label><b>Data Entrada: </b></label>
            <input type="text" value="{{ $ordemServico->dataInicio }}">
        <label><b>Data Término: </b></label>
            <input type="text" value="{{ $ordemServico->dataTermino }}">
        <br><br>
        <label><b>Equipamento: </b></label>
            <input type="text" value="{{ $ordemServico->equipamento->nomeEquipamento }}">
        <label><b>Defeito: </b></label>
            <input type="text" value="{{ $ordemServico->defeito }}">
        <br><br>
        <label><b>Observacoes: </b></label>
            <input type="text" value="{{ $ordemServico->observacoesOS }}">
        <label><b>Status: </b></label>
            <input type="text" value="{{ $ordemServico->statusServico->status }}">
    </form>
    <hr>
    <h3><u>Serviço</u></h3>
    <table>
        <thead>
            <tr>
                <td>|Serviço|</td>
                <td>Valor|</td>
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
            <input type="text" value="R$ {{ $ordemServico->valorTotal }}">
    </form>
    <hr>
    <h4><u>Observações: </u></h4>
    <li>A garantia de 3 meses é apartir da data de término do concerto,
        não da data que o cliente retirou o equipamento da loja.</li>
</body>
</html>
