<!--  <br>


<br>

<br>

<br> -->




<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i>Home</a></li>
            <li class="breadcrumb-item"><a href="#">Inbox View</a></li>

        </ol>
    </nav>
    <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
            <h6>Inbox View</h6>
            <!-- <a href="#" class="ms-text-primary">Add Tickets</a> -->
        </div>
        <div class="ms-panel-body">
            <div class="row" style="background-color:   ">
                <div class="col-md-12">
                    <div class="reciver-type brdr">
                        <h6 style="">Sender Type : </h6>
                        <p><?= $viewreceived->sender_type ?></p>
                    </div>
                    <div class="recivers brdr">
                        <h6>Senders :</h6>
                        <div class="row">
                            <div class="col-md-2">
                                <p><?php if ($viewreceived->receiver_type == 'organization') {

                                        print_r($$viewreceived->sender_id);
                                    ?>
                                    <?php } ?></p>
                            </div>

                        </div>

                    </div>
                    <div class="date brdr">
                        <h6>Date :</h6>
                        <p><?= $viewreceived->created_at ?></p>
                    </div>
                    <div class="subject brdr">
                        <h6>Subject :</h6>
                        <p><?= $viewreceived->subject ?></p>
                    </div>
                    <div class="message brdr">
                        <h6>Message :</h6>
                        <p style="line-height:1.5;"> <?= $viewreceived->message ?>  </p>
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