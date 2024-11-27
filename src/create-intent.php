<?php
include "vendor/autoload.php";
$stripe = new \Stripe\StripeClient("");
$intent = $stripe->paymentIntents->create([
    // To allow saving and retrieving payment methods, provide the Customer ID.
    "amount" => 1500,
    "currency" => "gbp",
    // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
    "automatic_payment_methods" => ["enabled" => true],
]);
echo json_encode(["client_secret" => $intent->client_secret]);
?>
