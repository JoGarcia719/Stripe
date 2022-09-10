<?php
require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
    'sk_test_51LgIKCKp2nU3RioBmyj1E19P5jkRVO9kAMmITT1u9JFw33z1eEu3E7V87Otj6qLCeLTkZbs36Q55iznaFrjhZeIF00jEaHr8W7'
  );
  $result=$stripe->products->retrieve(
    
    'prod_MP8PbXbSKcogOV',
    []
  );

  var_dump($result);