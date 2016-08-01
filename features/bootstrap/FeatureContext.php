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
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
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
        sleep(10);
    }

    /**
     * @When pesquiso pelo item :arg1
     */
    public function pesquisoPeloItem($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When clico no botão :arg1
     */
    public function clicoNoBotao($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then o site deverá retornar produtos com o nome :arg1
     */
    public function oSiteDeveraRetornarProdutosComONome($arg1)
    {
        throw new PendingException();
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
