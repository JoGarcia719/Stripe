<?php

require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgBjGKQOWb7wjoC2tRF7loqg5zhHTLQBbLv3on5tgbhidixA5F2F0TedRdWCJknXbApTQrMDxY9QkjdaW24UD0k00cjBmooL5'
);
$product = $stripe->products->retrieve(
	'prod_MP0OLZSjiy1gJ4',
	[]
);
$price = $stripe->prices->retrieve('price_1LgDb8KQOWb7wjoCsa5fEEtk',[]);
echo '<pre>';
var_dump($product);
var_dump($price);
echo '</pre>';
?><!DOCTYPE html>
<html>
  <head>
    <title>Buy</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <section>
      <div class="product">
        <img src="<?php echo array_pop($product->images); ?>" alt="<?php echo $product->name; ?>" />
        <div class="description">
          <h3><?php echo $product->name; ?></h3>
          <p><?php echo $product->description; ?></p>
          <h5><?php echo strtoupper($price->currency); ?> <?php echo $price->unit_amount_decimal; ?></h5>
        </div>
      </div>
      <form action="/create-checkout-session.php" method="POST">
        <button type="submit" id="checkout-button">Checkout</button>
      </form>
    </section>
  </body>
</html>