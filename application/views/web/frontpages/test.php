<!--Values specified below are not static and vary upon request-->
<body onload="document.form.submit();">   
        <!--acsUrl -->
    <form name="form" action="<?php print_r($res->threeDSecure->acsUrl)?>" target="_self" method="POST">
        <!--your callback url-->
        <input type="text" name="TermUrl" value="https://digilims.com/DigiLims/WebClient/demo"  hidden/>
        <!--transactionId-->
        <input type="text" name="MD" value="<?php print_r($res->threeDSecure->transactionId)?>"  hidden/>
        <!--Always set this as THREEDSECURE-->
        <input type="text" name="connector" value="THREEDSECURE"  hidden/>
        <!--paReq-->
        <input type="text" name="paReq" value="<?php print_r($res->threeDSecure->paReq) ?>" hidden/>
        <noscript>
            <input type="submit" value="Click here to continue" />
        </noscript>
    </form>
</body>
