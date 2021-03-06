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
        Então a página deverá ter resultados de busca para o termo "TV"

    @detalhes
    Cenário: Clicar em uma das TVs do resultado da pesquisa
        Quando clico no primeiro produto listado
        Então a página do produto deverá ser exibida

    @carrinho
    Cenário: Adicionar o produto ao carrinho
        Quando adiciono o produto ao carrinho
        E clico em "Continuar"
        E clico no carrinho
        Então a TV deverá estar no carrinho