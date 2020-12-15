-- -----------------------------------------------------------------------------
-- --------------------FUNÇÃO E TRIGGER PARA TABELA O_S_PECA--------------------
-- -----------------------------------------------------------------------------
CREATE OR REPLACE FUNCTION public.atualiza_estoque()
	RETURNS trigger
	LANGUAGE plpgsql
AS $$
	DECLARE quantidadeEstoque INT;
	BEGIN
		-- ------------------------
	   -- OPERAÇÃO INSERT
	   -- ------------------------
	   IF (TG_OP = 'INSERT') THEN
		 		--toda vez que inserir um item em public.o_s_peca precisa atualizar a quantidade do mesmo na tabela peças
				UPDATE public.pecas
      	SET quantidade = quantidade - NEW.qtd
				WHERE public.pecas.id = NEW.peca_id;

				-- já atualiza também a tabela ordem_servicos adicionando o valor total das peças ao valor total da OS.
 				UPDATE public."ordem_servicos"
        SET "valorTotal" = ("valorTotal" + NEW."valor_total")
        WHERE public."ordem_servicos".id = NEW."ordemServico_id";

        RETURN NEW;
     END IF;

		 -- ------------------------
 	   -- OPERAÇÃO DELETE
 	   -- ------------------------
     IF (TG_OP = 'DELETE') THEN
         --toda vez que remover um item em public.o_s_pecas precisa atualizar a quantidade do mesmo na tabela peças
         UPDATE public.pecas
         SET quantidade = quantidade+OLD.qtd
         WHERE public.pecas.id = OLD.peca_id;

         --atualizando o valor total da OS
		 	 	UPDATE public."ordem_servicos"
        SET "valorTotal" = ("valorTotal" - OLD."valor_total")
        WHERE public."ordem_servicos".id = OLD."ordemServico_id";

				RETURN NEW;
      END IF;
     RETURN NEW;
		end
$$;


-- -----------------------------------------------------------------------------
-- -----------------FUNÇÃO E TRIGGER PARA TABELA O_S_SERVICO--------------------
-- -----------------------------------------------------------------------------
CREATE OR REPLACE FUNCTION public.atualiza_valorTotalOS()
	RETURNS trigger
	LANGUAGE plpgsql
AS $$
	BEGIN
		-- ------------------------
	   -- OPERAÇÕES SÓ PARA INSERT
	   -- ------------------------
	   IF (TG_OP = 'INSERT') THEN
				-- se for uma operação de insert atualiza a tabela ordem_servicos adicionando ao valor total.
 		 		UPDATE public."ordem_servicos"
        SET "valorTotal" = ("valorTotal" + NEW."valorServico")
        WHERE public."ordem_servicos".id = NEW."ordemServico_id";
        RETURN NEW;
     END IF;

     IF (TG_OP = 'DELETE') THEN
         --se for uma operação de Delete, atualiza a tabela ordem_servicos diminuindo o valor do valor total
		 UPDATE public."ordem_servicos"
            SET "valorTotal" = ("valorTotal" - OLD."valorServico")
            WHERE public."ordem_servicos".id = OLD."ordemServico_id";
         RETURN NEW;
      END IF;
     RETURN NEW;
		end
$$;

