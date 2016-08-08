#language: pt

@javascript
Funcionalidade: Adiciona produto ao carrinho
    Para que eu possa pesquisar e adicionar um produto ao carrinho
    Eu preciso de um site com estes recursos
    Assim poderei pesquisar e adicionar um produto ao carrinho

    @pesquisa
    Cenário: Pesquisar por TV
        Dado que eu estou em "http://www.walmart.com.br"
        Quando pesquiso pelo item "TV"
        E clico no botão "Procurar"
        Então o site deverá retornar produtos com o nome "TV"

    @detalhes
    Cenário: Clicar em uma das TVs do resultado da pesquisa
        Quando clico na TV
        Então o site deverá exibir os detalhes da TV

    @carrinho
    Cenário: Adicionar o produto ao carrinho
        Quando clico no botão "Adicionar ao carrinho"
        E clico no botão "Continuar"
        E clico no carrinho
        Então a TV deverá estar no carrinho