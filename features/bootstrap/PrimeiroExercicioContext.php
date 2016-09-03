<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Client;

/**
 * Defines application features from the specific context.
 */
class PrimeiroExercicioContext extends MinkContext implements Context, SnippetAcceptingContext
{
    private $tituloProduto;

    /**
     * Initializes context.
     */
    public function __construct()
    {
    }

    /**
     * @Given que eu estou em :pagina
     */
    public function queEuEstouEm($pagina)
    {
        $this->visit($pagina);
        $this->getSession()->maximizeWindow();
    }

    /**
     * @When pesquiso pelo item :itemBusca
     */
    public function pesquisoPeloItem($itemBusca)
    {
        $this->fillField('suggestion-search', $itemBusca);   
    }

    /**
     * @When clico no botão :botao
     */
    public function clicoNoBotao($botao)
    {
        $this->pressButton($botao);
    }

    /**
     * @Then a página deverá ter resultados de busca para o termo :termoBuscado
     */
    public function aPaginaDeveraTerResultadosDeBuscaParaOTermo($termoBuscado)
    {
        $this->getSession()->wait(10000, 'document.getElementById(\'product-list\')!=null == true');
        $this->assertPageContainsText('Resultados de busca para "'. $termoBuscado . ' "');
    }

    /**
     * @When clico no primeiro produto listado
     */
    public function clicoNoPrimeiroProdutoListado()
    {
        $produto = $this->getSession()->getPage()->find('xpath', '//*[@id=\'product-list\']/section/ul/li[1]/section/a/span');
        $this->tituloProduto = $produto->getText();
        $produto->click();
    }

    /**
     * @Then a página do produto deverá ser exibida
     */
    public function aPaginaDoProdutoDeveraSerExibida()
    {
        $this->getSession()->wait(5000);
        $this->assertPageContainsText($this->tituloProduto);
    }

    /**
     * @When adiciono o produto ao carrinho
     */
    public function adicionoOProdutoAoCarrinho()
    {
        $botao = $this->getSession()->getPage()->find('xpath', '//*[@id=\'buybox-Walmart\']/div[2]/div/div[5]/button');
        $botao->click();
    }

    /**
     * @When clico em :texto
     */
    public function clicoEm($texto)
    {
        $this->getSession()->wait(5000);
        $elemento = $this->getSession()->getPage()->find('xpath', '//*[text()="' . $texto . '"]');
        $elemento->click();
    }

    /**
     * @When clico no carrinho
     */
    public function clicoNoCarrinho()
    {
        $carrinho = $this->getSession()->getPage()->find('xpath', '//*[@id=\'site-topbar\']/div[2]/div[1]/a');
        $carrinho->click();
    }

    /**
     * @Then a TV deverá estar no carrinho
     */
    public function aTvDeveraEstarNoCarrinho()
    {
        $this->getSession()->wait(5000, 'document.getElementsByClassName(\'link-description\')!=null == true');
        $this->assertPageContainsText($this->tituloProduto);        
    }
}
