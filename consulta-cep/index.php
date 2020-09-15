<!DOCTYPE html>
<html>
    <head>
        <title>consultar cep</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <form action="index.php" method="get">
          <label class="label">CEP:</label>
          <input type="number" name="cep" id="cep">
          <p><?php $buscaCep ?></p>
        </form>
    </body>
</html>

<?php

$cep = $_GET['cep'];
$client = new http\Client;
$request = new http\Client\Request;

$request->setRequestUrl('https://brasilapi.com.br/api/cep/v1/'$cep);
$request->setRequestMethod('GET');
$request->setHeaders([
  'user-agent' => 'vscode-restclient'
]);

$client->enqueue($request)->send();
$response = $client->getResponse();

$buscaCep = $response->getBody();