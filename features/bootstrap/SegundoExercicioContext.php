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
class SegundoExercicioContext extends MinkContext implements Context, SnippetAcceptingContext
{
    public $apiResponse;

    /**
     * Initializes context.
     */
    public function __construct()
    {
    }

    /**
     * @Given que requisito uma busca pelo cep :numeroCep
     * @Given que requisito uma busca sem passar um cep
     */
    public function queRequisitoUmaBuscaPeloCep($numeroCep = "")
    {
        $client = new GuzzleHttp\Client();
        $client = new Client([
            'base_uri' => 'http://api.postmon.com.br/v1/cep/',
            'timeout'  => 2.0,
        ]);
        $this->apiResponse = $client->request('GET', $numeroCep, ['http_errors' => false]);
    }

    /**
     * @Then devo ter o status :statusCode
     */
    public function devoTerOStatus($statusCode)
    {
        \PHPUnit_Framework_Assert::assertEquals($statusCode, $this->apiResponse->getStatusCode());

    }

    /**
     * @Then devo ter o :campo como :dado
     */
    public function devoTerOComo($campo, $dado)
    {
        $apiResponse = json_decode($this->apiResponse->getBody(), true);
        \PHPUnit_Framework_Assert::assertEquals($dado, $apiResponse[$campo]);
    }

    /**
     * @Then as seguintes informações do estado:
     */
    public function asSeguintesInformacoesDoEstado(TableNode $infoEstado)
    {
        $apiResponse = json_decode($this->apiResponse->getBody(), true);
        foreach ($infoEstado as $linha) {
            $dado = $apiResponse["estado_info"][$linha['informacao']];
            \PHPUnit_Framework_Assert::assertEquals($linha['dado'], $dado);
        }
    }

    /**
     * @Then as seguintes informações da cidade:
     */
    public function asSeguintesInformacoesDaCidade(TableNode $infoCidade)
    {
        $apiResponse = json_decode($this->apiResponse->getBody(), true);
        foreach ($infoCidade as $linha) {
            $dado = $apiResponse["cidade_info"][$linha['informacao']];
            \PHPUnit_Framework_Assert::assertEquals($linha['dado'], $dado);
        }
    }
}
