<!-- <?= $viewreceived->sender_type ?> <br>
<?php if ($viewreceived->sender_type == 'organization') {

    print_r($viewreceived->sender_id);
?>
<?php } ?><br>

<?= $viewreceived->created_at ?><br>

<?= $viewreceived->subject ?><br>

<?= $viewreceived->message ?><br> -->

<style>
    .brdr h6 {
        margin-top: 20px;
    }

    .brdr {
        border-bottom: 1px solid #eee;
    }
</style>



<?php
$senders = explode(',', $viewreceived->sender_id);

?>

<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Inbox View</h3>

                    </div>

                    <div class="card-body">

                        <div class="row" style="background-color:   ">
                            <div class="col-md-12">
                                <div class="reciver-type brdr">
                                    <h6 style="">Sender Type : </h6>
                                    <p><?php if ($viewreceived->sender_type == 'organization') {
                                            print_r('Organization');
                                        } else if ($viewreceived->sender_type == 'trainer') {
                                            print_r('Training Provider');
                                        } else if ($viewreceived->sender_type == 'projectmanager') {
                                            print_r('Project Manager');
                                        } else if ($viewreceived->sender_type == 'facilitator') {
                                            print_r('Facilitator');
                                        } else if ($viewreceived->sender_type == 'superadmin') {
                                            print_r('Super Admin');
                                        } ?> </p>
                                </div>
                                <div class="recivers brdr">
                                    <h6>Sender :</h6>
                                    <div class="row">
                                        <?php if ($viewreceived->sender_type == 'organization') { ?>



                                        <?php  } else if ($viewreceived->sender_type == 'trainer') { ?>
                                            <?php foreach ($senders as $sender) {
                                                $trainer = $this->common->accessrecord('trainer', [], ['id' => $sender], 'row');  ?>
                                                <div class="col-md-2">
                                                    <p><?= $trainer->full_name . ' ' .  $trainer->surname ?></p>
                                                </div>
                                            <?php } ?>
                                        <?php } else if ($viewreceived->sender_type == 'projectmanager') { ?>

                                            <?php foreach ($senders as $sender) {
                                                $projectmanager = $this->common->accessrecord('project_manager', [], ['id' => $sender], 'row');  ?>
                                                <div class="col-md-2">
                                                    <p><?= $projectmanager->fullname . ' ' .  $projectmanager->surname ?></p>
                                                </div>
                                            <?php  } ?>
                                        <?php  } else if ($viewreceived->sender_type == 'facilitator') { ?>
                                            <?php foreach ($senders as $sender) {
                                                $facilitator = $this->common->accessrecord('facilitator', [], ['id' => $sender], 'row');  ?>
                                                <div class="col-md-2">
                                                    <p><?= $facilitator->fullname . ' ' .  $facilitator->surname ?></p>
                                                </div>
                                            <?php } ?>

                                        <?php  } else if ($viewreceived->sender_type == 'superadmin') { ?>
                                            <div class="col-md-2">
                                                <p>Super Admin</p>
                                            </div>

                                        <?php  } ?>

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
                                    <p style="line-height:1.5;"> <?= $viewreceived->message ?>
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>