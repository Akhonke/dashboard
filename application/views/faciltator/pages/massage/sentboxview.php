>
<?php
$receivers = explode(',', $viewsent->receiver_id);

?>

<!--
<?= $viewsent->created_at ?><br>

<?= $viewsent->subject ?><br>

<?= $viewsent->message ?><br> -->


<!-- 
<?= $viewsent->receiver_type ?> <br>
<?php if ($viewsent->receiver_type == 'organization') {
    $receivers = explode(',', $viewsent->receiver_id);
    print_r($receivers);
?>
<?php } ?><br>

<?= $viewsent->created_at ?><br>

<?= $viewsent->subject ?><br>

<?= $viewsent->message ?><br> -->

<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Send View</h3>

                    </div>

                    <div class="card-body">

                        <div class="row" style="background-color:   ">
                            <div class="col-md-12">
                                <div class="reciver-type brdr">
                                    <h6 style="">Receiver Type : </h6>
                                    <p><?php if ($viewsent->receiver_type == 'organization') {
                                            // $receivers = explode(',', $viewsent->receiver_id);
                                            print_r('Organization');
                                        } else if ($viewsent->receiver_type == 'trainer') {
                                            // $receivers = explode(',', $viewsent->receiver_id);
                                            print_r('Training Provider');
                                        } else if ($viewsent->receiver_type == 'projectmanager') {
                                            print_r('Project Manager');
                                        } else if ($viewsent->receiver_type == 'facilitator') {
                                            print_r('Facilitator');
                                        } else if ($viewsent->receiver_type == 'superadmin') {
                                            print_r('Super Admin');
                                        } ?> </p>
                                </div>
                                <div class="recivers brdr">
                                    <h6>Receivers :</h6>
                                    <div class="row">
                                        <?php if ($viewsent->receiver_type == 'organization') { ?>

                                          

                                        <?php  } else if ($viewsent->receiver_type == 'trainer') { ?>
                                            <?php foreach ($receivers as $receiver) {
                                                $trainer = $this->common->accessrecord('trainer', [], ['id' => $receiver], 'row');  ?>
                                                <div class="col-md-2">
                                                    <p><?= $trainer->full_name . ' ' .  $trainer->surname ?></p>
                                                </div>
                                            <?php } ?>
                                        <?php } else if ($viewsent->receiver_type == 'projectmanager') { ?>

                                            <?php foreach ($receivers as $receiver) {
                                                $projectmanager = $this->common->accessrecord('project_manager', [], ['id' => $receiver], 'row');  ?>
                                                <div class="col-md-2">
                                                    <p><?= $projectmanager->fullname . ' ' .  $projectmanager->surname ?></p>
                                                </div>
                                            <?php  } ?>
                                        <?php  } else if ($viewsent->receiver_type == 'facilitator') { ?>
                                            <?php foreach ($receivers as $receiver) { 
                                                $facilitator = $this->common->accessrecord('facilitator', [], ['id' => $receiver], 'row');  ?>
                                                <div class="col-md-2">
                                                    <p><?= $facilitator->fullname . ' ' .  $facilitator->surname ?></p>
                                                </div>
                                            <?php } ?>

                                        <?php  } else if ($viewsent->receiver_type == 'superadmin') { ?>
                                            <div class="col-md-2">
                                                <p>Super Admin</p>
                                            </div>

                                        <?php  } ?>

                                    </div>

                                </div>
                                <div class="date brdr">
                                    <h6>Date :</h6>
                                    <p><?= $viewsent->created_at ?></p>
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

        </div>

    </section>

</div>

<style>
    .brdr h6 {
        margin-top: 20px;
    }

    .brdr {
        border-bottom: 1px solid #eee;
    }
</style>