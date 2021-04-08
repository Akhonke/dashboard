<?php require_once('includes/include.php') ?>
<?php

use PayGenius\LookupTransactionRequest;
use PayGenius\Sample\ExceptionHandler;
use PayGenius\Sample\PayGeniusClientFactory;

$transactionReference = $_GET['trx'];
$id = $_GET['id'];
$plan = $_GET['plan'];

$client = PayGeniusClientFactory::create();

try {
  $response = $client->lookupTransaction(new LookupTransactionRequest($transactionReference));
} catch (Exception $exception) {
  ExceptionHandler::display($exception);
}

$reference = $response->reference;
$amount = number_format($response->amount / 100, 2, '.', '');
$currency = $response->currency;
$status = $response->status;


$servername = "localhost";
$username = "digilim";
$password = "DigiLims@2021";
$dbname = "digilims_";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO payment_gateway (reference, amount, currency, user_id, status,plan_id)
VALUES ('$reference', '$amount', '$currency','$id','$status','$plan')";


if ($conn->query($sql) === TRUE) {
  header('Location: https://digilims.com/success_payment_page');
?>
  <?php include_once('includes/header.php') ?>

  <div class="row">
    <h1>Payment Complete</h1>
    <dl>
      <dt>Reference</dt>
      <dd><?php e($response->reference) ?></dd>
      <dt>Amount</dt>
      <dd><?php e(number_format($response->amount / 100, 2, '.', '')) ?></dd>
      <dt>Currency</dt>
      <dd><?php e($response->currency) ?></dd>
      <dt>Status</dt>
      <dd><?php e($response->status) ?></dd>
      <dt>id</dt>
      <dd><?php e($id) ?></dd>
    </dl>
  </div>

<?php include_once('includes/footer.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>


<!-- trx = e82ad16f-60b4-4777-a033-265d363e71ca
missingTransactionCount = 0
isAdmin = false
unreconciledTransactionCount = 2 
isLoggedIn = false
hasPos = false
missingMarkoffLatest = 2019-05-22+15%3A05%3A53.0
unreconciledDateRange = 07+Sep+20+-+05+Oct+20
isSuperMerchant = false
isMerchantAdmin = false
allowAdminReturn = false
projectVersion = 2.10.5.89 -->