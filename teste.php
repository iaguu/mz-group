<?php
require '../../../../vendor/autoload.php';

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;

// Configurar o token de acesso
MercadoPagoConfig::setAccessToken('TEST-4655759090720734-082501-4d106934a1a2f56b8638cb739542bdfd-1386581309');

// Criar uma instância do PreferenceClient
$preferenceClient = new PreferenceClient();

// Dados da preferência
$items = [
    [
        "title" => "Product Title",
        "quantity" => 1,
        "unit_price" => 100.00
    ]
];

$payer = [
    "email" => "customer@example.com"
];

$backUrls = [
    "success" => "https://www.yoursite.com/success",
    "failure" => "https://www.yoursite.com/failure",
    "pending" => "https://www.yoursite.com/pending"
];

$request = [
    "items" => $items,
    "payer" => $payer,
    "back_urls" => $backUrls,
    "auto_return" => "approved",
    "external_reference" => "YOUR_REFERENCE_ID"
];

try {
    // Criar e salvar a preferência
    $response = $preferenceClient->create($request);
    
    // Acessar propriedades do objeto retornado
    $preferenceId = $response->id;
    $initPoint = $response->init_point;
    
    echo "Link de pagamento: " . $initPoint;
} catch (MPApiException $e) {
    // Exibir mensagem de erro detalhada
    echo "Erro na API: " . $e->getMessage();
    // Opcional: Exibir o código de status HTTP da resposta
    echo "Código de status HTTP: " . $e->getCode();
}
?>
