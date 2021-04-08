<!-- <?=$viewsent->receiver_type?> <br>
<?php if($viewsent->receiver_type == 'organization'){
   $receivers = explode(',',$viewsent->receiver_id);
    print_r($receivers);
    ?>
<?php } ?><br>

<?=$viewsent->created_at?><br>

<?=$viewsent->subject?><br>

<?=$viewsent->message?><br> -->


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
                        <p>Organization Name </p>
                    </div>
                    <div class="recivers brdr">
                        <h6>Receivers :</h6>
                        <div class="row">
                            <div class="col-md-2">
                                <p>digilims.info@gmail.com</p>
                            </div>
                            <div class="col-md-2">
                                <p>test@gmail.com</p>
                            </div>
                            <div class="col-md-2">
                                <p>view@gmail.com</p>
                            </div>
                            <div class="col-md-2">
                                <p>info@gmail.com</p>
                            </div>
                            <div class="col-md-2">
                                <p>test@gmail.com</p>
                            </div>
                            <div class="col-md-2">
                                <p>view@gmail.com</p>
                            </div>
                        </div>

                    </div>
                    <div class="date brdr">
                        <h6>Date :</h6>
                        <p>23-10-2020</p>
                    </div>
                    <div class="subject brdr">
                        <h6>Subject :</h6>
                        <p>Subject Content</p>
                    </div>
                    <div class="message brdr">
                        <h6>Message :</h6>
                        <p style="line-height:1.5;"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.


                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

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