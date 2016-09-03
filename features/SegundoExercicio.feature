#language: pt

Funcionalidade: Informações de um CEP
    Para que eu possa obter informações de um CEP
    Eu preciso de uma API com estes recursos
    Assim poderei obter os dados de um endereço a partir de um CEP

    Cenário: Busca por CEP válido
        Dado que requisito uma busca pelo cep "01001001"
        Então devo ter o status "200"
        E devo ter o "cep" como "01001001"
        E devo ter o "estado" como "SP"
        E as seguintes informações do estado:
          | informacao  | dado         |
          | area_km2    | 248.222,362  |
          | codigo_ibge | 35           |
          | nome        | São Paulo    |
        E devo ter o "cidade" como "São Paulo"
        E as seguintes informações da cidade:
          | informacao  | dado    |
          | area_km2    | 1521,11 |
          | codigo_ibge | 3550308 |
        E devo ter o "bairro" como "Sé"
        E devo ter o "logradouro" como "Praça da Sé"
        E devo ter o "complemento" como "lado par"

    Cenário: Busca por CEP inexistente
        Dado que requisito uma busca pelo cep "04141210"
        Então devo ter o status "404"

    Cenário: Busca sem passar CEP
        Dado que requisito uma busca sem passar um cep
        Então devo ter o status "404"

    Cenário: Busca com CEP em formato inválido
        Dado que requisito uma busca pelo cep "texto"
        Então devo ter o status "404"