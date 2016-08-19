# Teste para QA do Walmart.com (utilizando php)


1 - No site vamos validar a seguinte sequência de ações:

* Procurar pelo termo "tv" na busca
* Validar que a busca teve resultados
* Clicar em um dos resultados e validar que a página do produto abriu corretamente
* Adicionar o Produto ao carrinho
* Abrir o carrinho e validar que o mesmo foi adicionado com sucesso

2 - Os correios possuem uma API pública, que dado um determinado CEP, ela te retorna as informações do mesmo. O modelo da chamada é o seguinte:

GET na url http://cep.correiocontrol.com.br/$CEP... - substitua $CEP_A_SER_TESTADO pelo cep que desejar validar.

Exemplo:

GET - http://cep.correiocontrol.com.br/1304...

Resposta:

{ bairro: "Jardim Bela Vista", logradouro: "Rua Jundiaí", cep: "15806320", uf: "SP", localidade: "Catanduva"

}

A partir das informações acima, vamos implementar cenários de teste que valide uma chamada com um cep válido e outra com cep inválido para essa API (implemente quantos cenários achar interessante, sempre validando o status code HTTP da resposta).

Validação individualmente de cada campo do JSON de resposta.
