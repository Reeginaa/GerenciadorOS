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
            <label>{{ $ordemServico->pessoa->nome }}</label>
        <label><b>Data Entrada: </b></label>
            <label>{{ date('d/m/Y', strtotime($ordemServico->dataInicio)) }}</label>
        <label><b>CPF: </b></label>
            <label>{{ $ordemServico->pessoa->cpf }}</label>
        <br><br>
        <label><b>Equipamento: </b></label>
            <label>{{ $ordemServico->equipamento->nomeEquipamento }}</label>
        <label><b>Defeito: </b></label>
            <label>{{ $ordemServico->defeito }}</label>
        <br><br>
        <label><b>Observações: </b></label>
            <label>{{ $ordemServico->observacoesOS }}</label>
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
    <hr>
    <p><b>OBSERVAÇÃO:</b> Este comprovante deve ser apresentado na retirada do equipamento, ele serve
    para comprovar que você deixou seu equipamento conosco, não o <b>perca</b> e nem <b>esqueça</b>
    de leva-lo consigo na retirada. Somente devolvemos seu equipamento com a apresentação do mesmo.</p>
</body>
</html>
