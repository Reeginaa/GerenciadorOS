--
-- inserir dados na tabela MARCA
--
INSERT INTO marca(id, nomeMarca, observacaoMarca) VALUES (1, "LG", "Atua no setor de eletrônicos, celulares, etc.");
INSERT INTO marca(id, nomeMarca, observacaoMarca) VALUES (2, "Panasonic", "Empresa Japonesa");

--
-- inserir dados na tabela EQUIPAMENTO
--
INSERT INTO equipamento(id, nomeEquipamento, modelo, numeroSerie, observacoesEquipamento, codigoMarca) 
	VALUES(10, "TV", "Led", "55gb42", "As barras de LED queimam com facilidade", 1);
INSERT INTO equipamento(id, nomeEquipamento, modelo, numeroSerie, observacoesEquipamento, codigoMarca)
	VALUES(11, "Rádio", "Bluetooth", "gbdf78780", "Problema na conexão com dispositivos", 2);
    
--
-- inserir dados na tabela TIPO PESSOA
--
INSERT INTO tipopessoa(id, tipo, descricao) VALUES (20, "Cliente", "Consulta o andamento da sua OS e aprova orçamento");
INSERT INTO tipopessoa(id, tipo, descricao) VALUES (21, "Administrador", "Realiza todos os CRUD");

--
-- inserir dados na tabela PESSOA
--
INSERT INTO pessoa (id, nome, cpf, rg, dataNascimento, sexo, logradouro, numero, complemento, bairro, cidade, email, senha, telefone, termos, codigoTipoPessoa) 
	VALUES (30, "Maria Regina Cerbaro", "025.458.997-88", "4587632982", '2000-08-30', "Feminino", "Rua das Hortências", 552, "Casa azul", "Centro", "São Domingos do Sul", "admin@admin.com", "admin", "+55 (54) 98425-6655", '1', 21);
INSERT INTO pessoa (id, nome, cpf, rg, dataNascimento, sexo, logradouro, numero, complemento, bairro, cidade, email, senha, telefone, termos, codigoTipoPessoa) 
    VALUES (31, "Leonardo Vicenzi", "032.558.996-52", "1478652302", '1999-11-03', "Masculino", "Rua 15 de Novembro", 1142, "Estrada de Chão", "Consoladora", "Guaporé", "leonardo@gmail.com", "leonardo", "+55 (54) 98154-6652", '1', 20);
    
--
-- inserir dados na tabela STATUS SERVIÇO
--
INSERT INTO statusservico (id, status, descricaoStatus) VALUES (40, "EM ANDAMENTO", "Sendo analisado pelo técnico");
INSERT INTO statusservico (id, status, descricaoStatus) VALUES(41, "AGUARDANDO APROVAÇÃO", "Aguardando aprovação do orçamento");

--
-- inserir dados na tabela SERVICOS
--
INSERT INTO servico (id, servico, valor, desconto) VALUES (50, "Troca de peça", '50.00', NULL);
INSERT INTO servico (id, servico, valor, desconto) VALUES (51, "Formatação de PC", '80.00', NULL);

--
-- inserir dados na tabela PEÇA
--
INSERT INTO peca (id, item, quantidade, valorCompra, valorVenda, desconto) VALUES (60, "Placa mãe", 5, '25.00', '40.00', NULL);
INSERT INTO peca (id, item, quantidade, valorCompra, valorVenda, desconto) VALUES (61, "SSD", 10, '210.00', '300.00', NULL);
INSERT INTO peca (id, item, quantidade, valorCompra, valorVenda, desconto) VALUES (62, "Botão power", 2, '10.00', '25.00', NULL);

--
-- inserir dados na tabela ORDEM DE SERVIÇO
--
INSERT INTO ordemservico (id, dataInicio, dataTermino, defeito, observacoesOS, quantidade, valorTotal, termos, assinatura, codigoStatusServico, codigoPessoa, codigoEquipamento) 
	VALUES (70, '2020-09-12', NULL, "Faixa preta na tela", "Com cabo de força", NULL, NULL, 1, 1, 40, 31, 10);
INSERT INTO ordemservico(id, dataInicio, dataTermino, defeito, observacoesOS, quantidade, valorTotal, termos, assinatura, codigoStatusServico, codigoPessoa, codigoEquipamento) 
	VALUES (71, '2020-08-18', NULL, "Não liga", NULL, NULL, NULL, 1, 1, 41, 31, 11);

--
-- inserir dados na tabela ANEXO ORÇAMENTO
--
INSERT INTO anexoorcamento (id, descricaoAnexo, arquivo, codigoOS) VALUES (80, "Orçamento rádio Leonardo", "Orçamento Barramento do rádio.pdf", 71);

--
-- inserir dados na tabela OS PECA
--
INSERT INTO ospeca (id, codigoOS, codigoPeca, valorPeca) VALUES (90, 71, 62, '25.00');

--
-- inserir dados na tabela OS SERVICO
--
INSERT INTO osservico (id, codigoOS, codigoServico, valorServico) VALUES (100, 71, 50, '50.00');
