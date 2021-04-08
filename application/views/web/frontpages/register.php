<!-- <form action="<?= base_url('WebClient/create') ?>" method="POST">
   <input type="text" class="form-control" placeholder="name" name="name">
   <input type="text" class="form-control" placeholder="surname" name="surname">
   <input type="text" class="form-control" placeholder="amount" name="amount">
   <input type="text" class="form-control" placeholder="currency" name="currency">
   <input type="text" class="form-control" placeholder="email" name="email">
   <input type="text" class="form-control" placeholder="reference" name="reference">
   <input type="text" class="form-control" placeholder="page" name="page">
   <input type="text" class="form-control" placeholder="successurl" name="successurl">
   <input type="text" class="form-control" placeholder="cancelurl" name="cancelurl">
   <input type="text" class="form-control" placeholder="errorurl" name="errorurl">
   <input type="number" class="form-control" placeholder="cardnumber" name="number">
   <input type="text" class="form-control" placeholder="cardHolder" name="cardHolder">
   <input type="text" class="form-control" placeholder="expiryYear" name="expiryYear">
   <input type="text" class="form-control" placeholder="expiryMonth" name="expiryMonth">
   <input type="text" class="form-control" placeholder="type" name="type">
   <input type="text" class="form-control" placeholder="cvv" name="cvv">

   <button class="btn btn-primary" type="submit">submit</button>
</form> -->
<!-- 
<div class="card-body">

   <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= base_url('WebClient/create') ?>">

      <!-- <div class="line"></div> --

      <div class="form-group row">

         <div class="col-md-6">
            <label class="form-control-label">First Name<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="text" class="form-control" placeholder="name" name="name" required>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">Surname Name<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="text" class="form-control" placeholder="surname" name="surname" required>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">Amount<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="text" class="form-control" placeholder="amount" name="amount" value="1" readonly>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">Currency<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="text" class="form-control" placeholder="currency" name="currency" value="ZAR" readonly>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">Email<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="text" class="form-control" placeholder="email" name="email" required>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">Card Number<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="number" class="form-control" placeholder="cardnumber" name="number" required>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">Card Holder Name<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="text" class="form-control" placeholder="cardHolder" name="cardHolder" required>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">Expiry Year<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="text" class="form-control" placeholder="expiryYear" name="expiryYear" required>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">Expiry Month<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="text" class="form-control" placeholder="expiryMonth" name="expiryMonth" required>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">Card Type<span style="color:red;font-weight:bold;"> *</span></label>
            <select class="form-control" name="type" required>
               <option label="Choose Your Card Type" value="" hidden></option>
               <option value="visa">Visa</option>
               <option value="Mastercard">Mastercard</option>

            </select>
         </div>
         <div class="col-md-6">
            <label class="form-control-label">CVV<span style="color:red;font-weight:bold;"> *</span></label>
            <input type="text" class="form-control" placeholder="cvv" name="cvv" required>
         </div>

      </div>


      <div class="form-group row" >

      </div>

      <div class="line"></div>

      <div class="form-group row">

         <div class="col-md-12">

            <div class="text-center">

               <button type="submit" class="btn btn-primary">Submit</button>

            </div>

         </div>

      </div>

   </form>
   <a href="https://developer.paygenius.co.za/pay/epsitech/en/178a9371-66cd-4c6b-932a-f38ce9f851b3"><img src="https://developer.paygenius.co.za/pg/res/btn/178a9371-66cd-4c6b-932a-f38ce9f851b3.png" width="177" height="48" alt="Pay" title="Pay Now with PayGenius" /></a>
</div> -->



<div class="row">
    <h1>Card Information</h1>
    <form method="POST" action="<?= base_url('WebClient/create') ?>">
        <h3>Consumer Information</h3>
        <div class="col-md-12">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="consumer[firstname]" placeholder="First Name" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="consumer[lastname]" placeholder="Last Name" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="consumer[email]" placeholder="Email" class="form-control"/>
            </div>
        </div>
        <h3>Transaction Information</h3>
        <div class="col-md-12">
            <div class="form-group">
                <label>Transaction Reference</label>
                <input type="text" name="transaction[reference]" placeholder="Transaction Reference" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Amount</label>
                <input type="text" name="transaction[amount]" placeholder="Amount" class="form-control"/>
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
        <h3>Card Information</h3>
        <div class="col-md-12">
            <div class="form-group">
                <label>Card Number</label>
                <input type="text" name="card[number]" placeholder="Card Number" class="form-control"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Expiry Month</label>
                <select class="form-control" name="card[expiry-month]">
                    <option value="1">01 - January</option>
                    <option value="2">02 - February</option>
                    <option value="3">03 - March</option>
                    <option value="4">04 - April</option>
                    <option value="5">05 - May</option>
                    <option value="6">06 - June</option>
                    <option value="7">07 - July</option>
                    <option value="8">08 - August</option>
                    <option value="9">09 - September</option>
                    <option value="10">10 - October</option>
                    <option value="11">11 - November</option>
                    <option value="12">12 - December</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Expiry Year</label>
                <select class="form-control" name="card[expiry-year]">
                    <?php for ($i = date('Y'), $c = date('Y') + 20; $i < $c; $i++): ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Card Holder Name</label>
                <input type="text" name="card[holder]" placeholder="Card Holder Name" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>CVV</label>
                <input type="text" name="card[cvv]" placeholder="CVV" class="form-control"/>
            </div>
        </div>

        <div class="col-md-12">
            <input type="submit" value="Submit"/>
        </div>
    </form>
</div>