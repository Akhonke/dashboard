<style>
    .tab-content>.active {
        display: block;
        opacity: 1;
    }

    .nav-tabs .active a {
        color: #fff;
        background-color: #357ffa;
    }
</style>
<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="<?= base_url('superAdmin-dashboard') ?>"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Invoice</a></li>

        </ol>
    </nav>
    <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
            <h6>Total Invoice</h6>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">

                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a href="#example2-tab1" aria-controls="example2-tab1" role="tab" class="active" data-toggle="tab">Monthly</a></li>
                    <li role="presentation"><a href="#example2-tab2" aria-controls="example2-tab2" role="tab" data-toggle="tab">Yearly</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="example2-tab1">
                        <div class="table-responsive">
                            <table id="example2-tab1-dt" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Invoice Id</th>
                                        <th>Client</th>
                                        <th>Organization</th>
                                        <th>Purchase Date</th>
                                        <th>Payment Received</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1;
                                    foreach ($invoice_list as $invoice) {
                                        $current_timestamp = $invoice->created;
                                        $client = $this->common->accessrecord('organisation', ['*'], array('id' => $invoice->user_id), 'row');
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="#"><?= $invoice->reference ?></a></td>
                                            <td> <?php if (!empty($client)) {
                                                        echo $client->fullname  . '  ' . $client->surname;
                                                    } ?></td>
                                            <td>
                                                <?php if (!empty($client)) {
                                                    echo $client->organisation_name;
                                                } ?></td>
                                            <td> <?= date("Y-m-d", strtotime($current_timestamp)); ?></td>
                                            <td><?= $invoice->amount ?> </td>
                                            <td><?= $invoice->status ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="view()" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <!-- <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div> -->
                                                            <div class="modal-body " id="personDetails">

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                        </tr>
                                    <?php $i++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="example2-tab2">
                        <table id="example2-tab2-dt" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Invoice Id</th>
                                    <th>Client</th>
                                    <th>Organization</th>
                                    <th>Purchase Date</th>
                                    <th>Payment Received</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1;
                                foreach ($invoice_list as $invoice) {
                                    $current_timestamp = $invoice->created;
                                    $client = $this->common->accessrecord('organisation', ['*'], array('id' => $invoice->user_id), 'row');
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><a href="#"><?= $invoice->reference ?></a></td>
                                        <td> <?php if (!empty($client)) {
                                                    echo $client->fullname  . '  ' . $client->surname;
                                                } ?></td>
                                        <td>
                                            <?php if (!empty($client)) {
                                                echo $client->organisation_name;
                                            } ?></td>
                                        <td> <?= date("Y-m-d", strtotime($current_timestamp)); ?></td>
                                        <td><?= $invoice->amount ?> </td>
                                        <td><?= $invoice->status ?></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="view()" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body " id="personDetails">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>

                                    </tr>
                                <?php $i++;
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function view() {



        $("#exampleModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on("show.bs.modal", function(event) {
            var button = $(event.relatedTarget); // button the triggered modal
            var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var ss = $(this).attr("photoss");
            var base_url = "your base url";
            var trainername = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var sub_type = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var classname = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var facilitatorname = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var year = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            // var week_date = $(event.relatedTarget).closest("tr").find("td:eq(7)").text(); 



            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Invoice Id : </span><span class='pull-right'> " + trainername +
                "</div><div class=col-sm-12><span class='pull-left'>Client :</span><span class='pull-right'>" + type +
                "</div><div class=col-sm-12><span class='pull-left'>Organization :</span><span class='pull-right'> " + sub_type +
                "</div><div class=col-sm-12><span class='pull-left'>Purchase Date : </span><span class='pull-right'>" + classname +
                "</div><div class=col-sm-12><span class='pull-left'>Payment Received : </span><span class='pull-right'>" + facilitatorname +
                "</div><div class=col-sm-12><span class='pull-left'>Status : </span><span class='pull-right'>" + year +
                //   "</div><div class=col-sm-6>Week Ending Date : " + week_date +

                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>