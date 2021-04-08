<style>

#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6;

}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #20bcd5
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #20bcd5
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #20bcd5;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #20bcd5
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #20bcd5;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;

}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #20bcd5;
    font-size: 1.4em;

}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>

<div class="col-md-12">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb pl-0">
         <li class="breadcrumb-item"><a href="<?=base_url('superAdmin-dashboard')?>"><i class="material-icons">home</i> Home</a></li>
         <li class="breadcrumb-item"><a href="#">Invoice Details</a></li>

      </ol>
   </nav>
   <div class="ms-panel">
      <div class="ms-panel-header ms-panel-custome">
        <h6>Total Invoice</h6>
      </div>
      <div class="ms-panel-body">
      <div id="invoice">

<div class="toolbar hidden-print">
    <div class="text-right">
        <button id="printInvoice" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
        <button class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
    </div>
    <hr>
</div>
<div class="invoice overflow-auto">
    <div style="min-width: 600px">
        <header>
            <div class="row">
                <div class="col">
                    <a target="_blank" href="#">
                    <img src="https://www.waytwodigital.com/DigiLims/assets/super-admin/img/digilims-logo.png" alt="logo" width="250">
                        </a>
                </div>
                <div class="col company-details">
                <h2 class="to" style="padding:0px;">DigiLims</h2>
                    <div>Block C, Stone Ridge Office Park,</br>Greenstone, Modderfontein,Johannesburg,South Africa.</div>
                    <div>1234567890</div>
                   <div>Email:  <a href=" sales@digilims.com"> sales@digilims.com</a></div>
                    <div>Website:  <a href="http://digilims.com/">www.digilims.com/</a></div>
                </div>
            </div>
        </header>
        <main>
            <div class="row contacts">
                <div class="col invoice-to">
                    <div class="text-gray-light">INVOICE TO:</div>
                    <h2 class="to" style="padding:0px;">Organization Name</h2>
                    <div class="address">1234567898 </div>
              
                    <div class="email">Email:  <a href="test@gmail.com">test@gmail.com</a></div>
                    



                </div>
                <div class="col invoice-details">
                    <h1 class="invoice-id">INVOICE</h1>
                    <div class="date">Date of Invoice: 01/10/2018</div>
                    <div class="date">Due Date: 30/10/2018</div>
                </div>
            </div>
            <table class="" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th class="text-left">Package Name</th>
                       
                        <th class="text-right">Price</th>
                        <th class="text-right">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                 
                    <tr>
                        <td class="no">01</td>
                        <td class="text-left"><h3>Standard</h3></td>
                        <td class="unit">R999.00</td>
                 
                        <td class="total">R999.00</td>
                    </tr>
                   
                </tbody>
                <tfoot>
                    
                    <tr>
                    
                    <td class=""></td>
                    <td class=""></td>
                        <td colspan="" style="border-top: 1px solid #aaa;">SUBTOTAL</td>
                        <td style="border-top: 1px solid #aaa;">R999.00</td>
                    </tr>
                    <tr>
                    <td class=""></td>
                    <td class=""></td>
                        <td colspan="" style="border-top: 1px solid #aaa;">TAX 25%</td>
                        <td style="border-top: 1px solid #aaa;">R100.00</td>
                    </tr>
                    <tr>
                    <td class=""></td>
                    <td class=""></td>
                        <td colspan="" style="border-top:1px solid #20bcd5;">GRAND TOTAL</td>
                        <td style="border-top:1px solid #20bcd5;">R100.00</td>
                    </tr>
                </tfoot>
            </table>
            <div class="thanks">Thank you!</div>
            <div class="notices">
                <div>NOTICE:</div>
                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
            </div>
        </main>
        <footer>
            Invoice was created on a computer and is valid without the signature and seal.
        </footer>
    </div>
    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
    <div></div>
</div>
</div>
      </div>
   </div>
</div>
