#language: pt

Funcionalidade: Informações de um CEP
    Para que eu possa obter informações de um CEP
    Eu preciso de uma API com estes recursos
    Assim poderei obter os dados de um endereço a partir de um CEP

    Cenário: Busca por CEP válido

    Cenário: Busca por CEP inexistente

    Cenário: Busca sem passar CEP

    Cenário: Busca com CEP em formato inválido

(implemente quantos cenários achar interessante, sempre validando o status code HTTP da resposta).
Validação individualmente de cada campo do JSON de resposta.

Exemplo:

GET - http://cep.correiocontrol.com.br/1304...

Resposta:

{ bairro: "Jardim Bela Vista", logradouro: "Rua Jundiaí", cep: "15806320", uf: "SP", localidade: "Catanduva"

}