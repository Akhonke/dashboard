<?php

$CI=&get_instance();

########################################################################################################################
# Collect Input
########################################################################################################################
$cardCvv              = trim(@$_POST['card']['cvv']);
$cardExpiryMonth      = trim(@$_POST['card']['expiry-month']);
$cardExpiryYear       = trim(@$_POST['card']['expiry-year']);
$cardHolder           = trim(@$_POST['card']['holder']);
$cardNumber           = trim(@$_POST['card']['number']);
$transactionReference = trim($_POST['transaction']['reference']);
$transactionAmount    = trim($_POST['transaction']['amount']);
$consumerFirstname    = trim($_POST['consumer']['firstname']);
$consumerLastname     = trim($_POST['consumer']['lastname']);
$consumerEmail        = trim($_POST['consumer']['email']);
$currency             = trim($_POST['transaction']['currency']);
$client =  $CI->create_payment($product->cat_id);
?>
