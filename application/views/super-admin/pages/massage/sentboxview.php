<!-- 
 <br>
<br>

    <br>

<br>

<br> -->


<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="<?=base_url('superAdmin-dashboard')?>"><i class="material-icons">home</i>Home</a></li>
            <li class="breadcrumb-item"><a href="#">Send View</a></li>

        </ol>
    </nav>
    <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
            <h6>Send View</h6>
            <!-- <a href="#" class="ms-text-primary">Add Tickets</a> -->
        </div>
        <div class="ms-panel-body">
            <div class="row" style="background-color:   ">
                <div class="col-md-12">
                    <div class="reciver-type brdr">
                        <h6 style="">Receiver Type : </h6>
                        <p><?= $viewsent->receiver_type ?> </p>
                    </div>
                    <div class="recivers brdr">
                        <h6>Receivers :</h6>
                        <div class="row">
                            <?php if ($viewsent->receiver_type == 'organization') {
                                $receivers = explode(',', $viewsent->receiver_id);
                                // print_r($receivers);
                                foreach ($receivers as $rece) {
                                    $orgdata = $this->common->accessrecord('organisation', ['*'], array('id' => $rece), 'result');
                            ?>
                             <div class="col-md-2">
                                <p><?php if(isset($orgdata->email_address) && !empty($orgdata->email_address)){ echo $orgdata->email_address; }?></p>
                            </div>

                            <?php  }
                            } ?>
                           

                        </div>

                    </div>
                    <div class="date brdr">
                        <h6>Date :</h6>
                        <p><?= $viewsent->created_at ?> </p>
                    </div>
                    <div class="subject brdr">
                        <h6>Subject :</h6>
                        <p><?= $viewsent->subject ?></p>
                    </div>
                    <div class="message brdr">
                        <h6>Message :</h6>
                        <p style="line-height:1.5;">
                            <?= $viewsent->message ?>
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<style>
    .brdr h6 {
        margin-top: 20px;
    }

    .brdr {
        border-bottom: 1px solid #eee;
    }
</style>