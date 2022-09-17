<?php

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LgIKCKp2nU3RioBmyj1E19P5jkRVO9kAMmITT1u9JFw33z1eEu3E7V87Otj6qLCeLTkZbs36Q55iznaFrjhZeIF00jEaHr8W7');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/stripe-integration';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1LgK8NKp2nU3RioBrYf5Wh3v',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);