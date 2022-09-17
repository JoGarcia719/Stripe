<?php

require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgIKCKp2nU3RioBmyj1E19P5jkRVO9kAMmITT1u9JFw33z1eEu3E7V87Otj6qLCeLTkZbs36Q55iznaFrjhZeIF00jEaHr8W7'
);
$product = $stripe->products->retrieve(
	'prod_MP8PbXbSKcogOV',
	[]
);
$price = $stripe->prices->retrieve('price_1LgK8NKp2nU3RioBrYf5Wh3v',[]);
//echo '<pre>';
//var_dump($product);
//var_dump($price);
//echo '</pre>';
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

