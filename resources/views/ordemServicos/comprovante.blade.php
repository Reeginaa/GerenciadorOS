<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprovante</title>
</head>
<body>
    <h1>Logo da loja</h1>
    <hr>
    <h3>Comprovante</h3>
    <hr>
    <br>
    <form>
        <label><b>Cliente: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->pessoa->nome }}">
        @endforeach
        <label><b>Data Entrada: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->dataInicio }}">
        @endforeach
        <br> <br>
        <label><b>CPF: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->pessoa->cpf }}">
        @endforeach
        <label><b>Equipamento: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->equipamento->nomeEquipamento }}">
        @endforeach
        <br><br>
        <label><b>Defeito: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->defeito }}">
        @endforeach
        <label><b>Observações: </b></label>
        @foreach ($ordemServico as $item)
            <input type="text" value="{{ $item->observacoesOS }}">
        @endforeach
    </form>
    <br>
    <hr>
    <h3><u>Termos</u></h3>
    <li>Todo Serviço realizado tem <b>garantia de 3 meses</b>, apartir
        da <b>data de término</b>.</li>
    <li>Após o decorrer de <b>3 meses</b> e <b>3 tentativas</b> de contato
        com o cliente, e o equipamento permanecer nos aposentos da loja, a <b>loja tem
        total liberdade para realizar o descarte, venda, doação ou leilão do mesmo</b>.</li>
    <li>Se por acaso o cliente comparecer ao estabelecimento para a retirada do equipamento e o mesmo
        estiver ainda nos aposentos do estabelecimento, <b>após o decorrer de 3 meses, o cliente deverá
        pagar uma multa</b>.</li>
    <br>
    <hr>
    <br>
    <p>____________________________________________________</p>
    <p>Assinatura do cliente</p>
    <br><br><br>
    <p><b>OBSERVAÇÃO:</b> Este comprovante deve ser apresentado na retirada do equipamento, ele serve
    para comprovar que você deixou seu equipamento conosco, não o <b>perca</b> e nem <b>esqueça</b>
    de leva-lo consigo na retirada. Somente devolvemos seu equipamento com a apresentação do mesmo.</p>
</body>
</html>
