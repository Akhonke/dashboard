<?php

$id = $_GET['id'];


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

$sql = "SELECT * FROM organisation WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//    $result = $conn->query($sql);


if (!empty($row) && $row['paid_and_free'] == 0) {
    header('Location: https://digilims.com/index.php/MyOrganization');
}
$monthyear = explode('/', $row['cardExpiration']);
$month = $monthyear[0];
$year = $monthyear[1];
?>



<style>
    input.form-control {
        height: calc(2.4em + 0.75rem + 2px);
        font-size: 14px;
        background: #fff !important;
    }

    input[type="submit"] {
        width: 100px;
        background: skyblue;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }
</style>


<?php require_once('includes/header.php') ?>
<div class="card-infor-page" style="
    background: #fff;
    box-shadow: 0 4px 12px #0000005e;
    padding: 0;
">
    <div class="row" style="padding:10px 30px;">
        <h1 style="font-size: 18px;text-align: center;color: #1b2e4b;font-weight: bold;">Card Information</h1>
        <form method="POST" action="card-auth.php" id="paymentGetway">
            <h3 style="font-size: 16px;
    padding: 0 15px 0 15px;
    font-weight: bold;">Consumer Information</h3>
            <div class="col-md-12">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="consumer[firstname]" placeholder="First Name" class="form-control" value="<?php echo ($row['fullname']); ?>" readonly />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="consumer[lastname]" placeholder="Last Name" class="form-control" value="<?php echo ($row['surname']); ?>" readonly />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="consumer[email]" placeholder="Email" class="form-control" value="<?php echo ($row['email_address']); ?>" readonly />
                </div>
            </div>
            <h3 style="font-size: 16px;
    padding: 0 15px 0 15px;
    font-weight: bold;">Transaction Information</h3>

            <input type="hidden" name="transaction[reference]" value="<?php echo ($row['id']); ?>" readonly />
            <input type="hidden" name="transaction[plan]" value="<?php echo ($row['packageId']); ?>" readonly />
            <div class="col-md-12">
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="transaction[amount]" placeholder="Amount" class="form-control" value="<?php echo (round($row['packagePrice'], 0)); ?>" readonly />
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Currency</label>
                    <select name="transaction[currency]" class="form-control">
                        <option value="ZAR">ZAR</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Payment Method</label>
                    <select id="Payment" class="form-control" onchange="payment_method()">

                        <!-- <option value="eft">Instant EFT (Only SA Accounts)</option> -->
                        <option value="card">Credit/Debit Card</option>
                    </select>
                </div>
            </div>

            <div id="card_details">
                <h3>Card Information</h3>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Card Number</label>
                        <input type="text" name="card[number]" placeholder="Card Number" id="number" value="<?php echo ($row['cardNumber']); ?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Expiry Month</label>
                        <select class="form-control" name="card[expiry-month]">
                            <option <?php if ($month == '01') {
                                        echo 'selected';
                                    } ?> value="1">01 - January</option>

                            <option <?php if ($month == '02') {
                                        echo 'selected';
                                    } ?> value="2">02 - February</option>
                            <option <?php if ($month == '03') {
                                        echo 'selected';
                                    } ?> value="3">03 - March</option>
                            <option <?php if ($month == '04') {
                                        echo 'selected';
                                    } ?> value="4">04 - April</option>
                            <option <?php if ($month == '05') {
                                        echo 'selected';
                                    } ?> value="5">05 - May</option>
                            <option <?php if ($month == '06') {
                                        echo 'selected';
                                    } ?> value="6">06 - June</option>
                            <option <?php if ($month == '07') {
                                        echo 'selected';
                                    } ?> value="7">07 - July</option>
                            <option <?php if ($month == '08') {
                                        echo 'selected';
                                    } ?> value="8">08 - August</option>
                            <option <?php if ($month == '09') {
                                        echo 'selected';
                                    } ?> value="9">09 - September</option>
                            <option <?php if ($month == '10') {
                                        echo 'selected';
                                    } ?> value="10">10 - October</option>
                            <option <?php if ($month == '11') {
                                        echo 'selected';
                                    } ?> value="11">11 - November</option>
                            <option <?php if ($month == '12') {
                                        echo 'selected';
                                    } ?> value="12">12 - December</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Expiry Year</label>
                        <select class="form-control" name="card[expiry-year]">
                            <?php for ($i = date('Y'), $c = date('Y') + 20; $i < $c; $i++) : ?>
                                <option <?php if ($year == $i) {
                                            echo 'selected';
                                        } ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Card Holder Name</label>
                        <input type="text" name="card[holder]" placeholder="Card Holder Name" value="<?php echo ($row['cardHolderName']); ?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>CVV</label>
                        <input type="text" name="card[cvv]" placeholder="CVV" value="<?php echo ($row['cardCVV']); ?>" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>
</div>
<?php require_once('includes/footer.php') ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // onkeyup="this.value = this.value.replace(/[^\d]/,'');"
    var field = document.querySelector('[id="number"]');
    field.addEventListener('keypress', function(event) {
        var key = event.keyCode;
        if (key === 32) {
            event.preventDefault();
        }
    });

    // $("#card_details").hide();
    // $("#card_details").show();
    function payment_method() {
        var selectPaymentMethod = $('#Payment :selected').val();
        if (selectPaymentMethod === "card") {
            $("#card_details").show();
            $('#paymentGetway').attr('action', 'card-auth.php');
        }
        if (selectPaymentMethod === "eft") {
            $("#card_details").hide();
            $('#paymentGetway').attr('action', 'eft-init.php');
        }

    }
</script>