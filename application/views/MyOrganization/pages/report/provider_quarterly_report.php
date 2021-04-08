<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->


            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Quarterly Report List

                        </h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>Serial No.</th>

                                        <!-- <th>Organization Name</th> -->
                                        <th>Full Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <!-- <th>Image</th> -->
                                        <th>Landline</th>
                                        <th>District</th>
                                        <!-- <th>Region</th> -->
                                        <th>Province</th>
                                        <th>City</th>
                                        <th>Municipality</th>
                                        <th>Suburb</th>
                                        <th>Street Name</th>
                                        <th>Street Number</th>
                                        <!-- <th>Project Manager Name</th> -->
                                        <th>Company Name</th>
                                        <!-- <th>Attach Documents</th> -->
                                        <th>Project Manager</th>
                                        <th>Total Report</th>
                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody>
                                    <?php $i = 1;
                                    foreach ($reports as $rpt) { ?>
                                        <tr>

                                            <td><?= $i ?></td>
                                            <!-- <td><?= $rpt->organization ?></td> -->
                                            <td><?= $rpt->full_name ?></td>
                                            <td><?= $rpt->surname ?></td>
                                            <td><?= $rpt->email ?></td>
                                            <td><?= $rpt->mobile ?></td>
                                            <td><?= $rpt->landline ?></td>
                                            <td><?= $rpt->district ?></td>
                                            <!-- <td><?= $rpt->region ?></td> -->
                                            <td><?= $rpt->province ?></td>
                                            <td><?= $rpt->city ?></td>
                                            <td><?= $rpt->municipality ?></td>
                                            <td><?= $rpt->Suburb ?></td>
                                            <td><?= $rpt->Street_name ?></td>
                                            <td><?= $rpt->Street_number ?></td>
                                            <!-- <td><?= $rpt->project_id ?></td> -->
                                            <td><?= $rpt->company_name ?></td>
                                            <td><?= $rpt->project_manager ?></td>
                                            <td><?= $rpt->total_report ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $rpt->id ?>" data-name="<?= $rpt->id ?>" onclick="view(<?= $rpt->id; ?>)" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>

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

                </div>

            </div>

        </div>

    </section>

</div>

<script>
    function view() {

        debugger;

        $("#exampleModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on("show.bs.modal", function(event) {
            var button = $(event.relatedTarget); // button the triggered modal
            var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var ss = $(this).attr("photoss");
            var base_url = "your base url";
            var full_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var surname = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var email = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var mobile = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var landline = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var district = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            var province = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
            var city = $(event.relatedTarget).closest("tr").find("td:eq(8)").text();
            var municipality = $(event.relatedTarget).closest("tr").find("td:eq(9)").text();
            var Suburb = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
            var Street_name = $(event.relatedTarget).closest("tr").find("td:eq(11)").text();
            var Street_number = $(event.relatedTarget).closest("tr").find("td:eq(12)").text();
            var company_name = $(event.relatedTarget).closest("tr").find("td:eq(13)").text();
            var project_manager = $(event.relatedTarget).closest("tr").find("td:eq(14)").text();
            var total_report = $(event.relatedTarget).closest("tr").find("td:eq(15)").text();
            // var landline = $(event.relatedTarget).closest("tr").find("td:eq(16)").text(); 




            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Full Name :  </span><span class='pull-right'>  " + full_name +
                "</div><div class=col-sm-12><span class='pull-left'>Surname : </span><span class='pull-right'>  " + surname +
                "</div><div class=col-sm-12><span class='pull-left'>Email : </span><span class='pull-right'>  " + email +
                "</div><div class=col-sm-12><span class='pull-left'>Mobile :  </span><span class='pull-right'> " + mobile +
                "</div><div class=col-sm-12><span class='pull-left'>Landline :  </span><span class='pull-right'> " + landline +
                "</div><div class=col-sm-12><span class='pull-left'>District :  </span><span class='pull-right'> " + district +
                "</div><div class=col-sm-12><span class='pull-left'>Province :  </span><span class='pull-right'> " + province +
                "</div><div class=col-sm-12><span class='pull-left'>City :  </span><span class='pull-right'> " + city +
                "</div><div class=col-sm-12><span class='pull-left'>Municipality  :  </span><span class='pull-right'> " + municipality +
                "</div><div class=col-sm-12><span class='pull-left'>Suburb :  </span><span class='pull-right'> " + Suburb +
                "</div><div class=col-sm-12><span class='pull-left'>Street Name :  </span><span class='pull-right'> " + Street_name +
                "</div><div class=col-sm-12><span class='pull-left'>Street Number : </span><span class='pull-right'>  " + Street_number +
                "</div><div class=col-sm-12><span class='pull-left'>Company Name : </span><span class='pull-right'>  " + company_name +
                "</div><div class=col-sm-12><span class='pull-left'>Project Manager :  </span><span class='pull-right'> " + project_manager +
                "</div><div class=col-sm-12><span class='pull-left'>Total Report :  </span><span class='pull-right'> " + total_report +


                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>