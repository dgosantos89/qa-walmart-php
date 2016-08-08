<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
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
        $this->getSession()->wait(3000, 'document.getElementById(\'product-list\')!=null');
        $this->assertPageContainsText('Resultados de busca para "'. $termoBuscado . '\"');
    }

    /**
     * @When clico na TV
     */
    public function clicoNaTv()
    {
        throw new PendingException();
    }

    /**
     * @Then o site deverá exibir os detalhes da TV
     */
    public function oSiteDeveraExibirOsDetalhesDaTv()
    {
        throw new PendingException();
    }

    /**
     * @When clico no carrinho
     */
    public function clicoNoCarrinho()
    {
        throw new PendingException();
    }

    /**
     * @Then a TV deverá estar no carrinho
     */
    public function aTvDeveraEstarNoCarrinho()
    {
        throw new PendingException();
    }
}
