<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
        <li class="breadcrumb-item"><a href="<?= base_url('superAdmin-dashboard') ?>"><i class="material-icons">home</i> Home</a></li>
         <li class="breadcrumb-item active" aria-current="page">Create Bank</li>
        </ol>
    </nav>
</div>
<div class="col-md-12"> 
    <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateBankForm" >
        <div class="form-group row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <label class="form-control-label">Enter Bank Name<span style="color:red;font-weight:bold;"> *</span></label>
                <input type="text" name="bankname" list="bankname" class="form-control">
                <?php echo form_error('bankname', '<div class="error" style="color:red">', '</div>'); ?>

                <datalist id="bankname">
                    <option value="Boston">
                    <option value="Cambridge">
                    <option value="Absa Bank">
                    <option value="African Bank Limited">
                    <option value="Bidvest Bank Limited">   
                    <option value="Capitec Bank Limited">
                    <option value="FirstRand Bank - A subsidiary of First Rand Limited">
                    <option value="Grindrod Limited">
                    <option value="Imperial Bank South Africa">
                    <option value="Investec Bank Limited">
                    <option value="Nedbank Limited">
                    <option value="Sasfin Bank Limited">
                    <option value="Teba Bank Limited">
                    <option value="Standard Bank of South Africa">
                    <option value="Barclays Africa Group">
                    <option value="Albaraka Bank Limited">
                    <option value="Habib Overseas Bank Limited">
                    <option value="Habib Bank AG Zurich">
                    <option value="Mercantile Bank Limited">
                    <option value="South African Bank of Athens Limited">
                    <option value="Bank of Baroda">
                    <option value="Bank of China">
                    <option value="Bank of Taiwan">
                    <option value="BNP Paribas">
                    <option value="Calyon Corporate and Investment Bank">
                    <option value="China Construction Bank Corporation">
                    <option value="Citibank N.A.">
                    <option value="Deutsche Bank AG">
                    <option value="JPMorgan Chase Bank">
                    <option value="Société Générale">
                    <option value="Standard Chartered Bank">
                    <option value="State Bank of India">
                    <option value="Hongkong and Shanghai Banking Corporation">
                    <option value="Royal Bank of Scotland">
                </datalist>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </form>
</div>