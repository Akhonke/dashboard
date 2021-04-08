<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                           <?php if(!empty($_GET['id'])){
                                $name ="Update";
                           }else{
                                $name ="Add";
                           }?>
                        <h3 class="h6 text-uppercase mb-0"><?= $name; ?> Income Item</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="CreateIncomeItem" enctype="multipart/form-data">
                            <!-- <div class="line"></div> -->                            
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <h3 class="h6 text-uppercase mb-0"></h3>
                                </div>
                                <div class="col-md-6">                                       
                                    <label class="form-control-label">Date</label>
                                    <input type="date" placeholder=" Enter Your Date" class="form-control date" name="date" value="<?= (isset($record)) ? $record->date : ''; ?>" id="date">
                                   <label id="date-error" class="error" for="date"></label>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-control-label">Amount</label>
                                    <input type="text" placeholder="Enter Your amount" class="form-control amount" name="amount" value="<?= (isset($record)) ? $record->amount : ''; ?>" id="amount">
                                    <label id="amount-error" class="error" for="amount"></label>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Payer</label>

                                    <input type="text" placeholder="Enter Your Payer" class="form-control payer" name="payer" value="<?= (isset($record)) ? $record->payer : ''; ?>" id="payer">
                                    <label id="payer-error" class="error" for="payer"></label>
                                </div>

                                <div class="col-md-12">

                                    <label class="control-label" for="description">Description</label>

                                    <textarea name="description" id="description" rows="10" cols="80" ><?= (isset($record)) ? $record->description : ''; ?></textarea>   
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-5" ><?= $name?></button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
