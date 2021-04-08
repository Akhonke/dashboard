<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">All Project Managers List</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered " style="width:100%">

                                <thead>

                                    <tr>

                                        <th>S. No.</th>

                                        <th>Organization</th>

                                        <th>Full Name</th>

                                        <th>Surname</th>

                                        <th>Project Manager</th>

                                        <th>Email</th>

                                        <th>Landline Number</th>

                                        <th>Mobile Number</th>

                                        <th>Province</th>

                                        <th>District</th>

                                        <!-- <th>Region</th> -->

                                        <th>city</th>

                                        <th>Municipality</th>

                                        <th>Suburb</th>

                                        <th>Street name</th>

                                        <th>Street Number</th>

                                        <th>Tax Clearance</th>

                                        <th>Company Documents</th>

                                        <th>Assesor Acreditations</th>

                                        <th>Seta Creditiations</th>

                                        <th>Moderator Accreditations</th>

                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) {

                                            $programme = $this->common->accessrecord('organisation', [], ['id' => $row->organization], 'row');

                                            if (!empty($programme)) {

                                                $Organization = $programme->organisation_name;
                                            } else {

                                                $Organization = "";
                                            }

                                    ?>

                                            <tr id="del-<?= $row->id ?>">

                                                <td><?= $i; ?></td>

                                                <td><?= $Organization; ?></td>

                                                <td><?= $row->fullname; ?></td>

                                                <td><?= $row->surname; ?></td>

                                                <td><?= $row->project_manager; ?></td>

                                                <td><?= $row->email_address; ?></td>

                                                <td><?= "+27-" . $row->landline_number; ?></td>

                                                <td><?= "+27-" . $row->mobile_number; ?></td>

                                                <td><?= $row->province ?></td>

                                                <td><?= $row->district ?></td>

                                                <!-- <td><?= $row->region ?></td> -->

                                                <td><?= $row->city ?></td>

                                                <td><?= $row->municipality ?></td>

                                                <td><?= $row->Suburb ?></td>

                                                <td><?= $row->Street_name ?></td>

                                                <td><?= $row->Street_number ?></td>



                                                <td> <?php

                                                        if (!empty($row->tax_clearance)) { ?>
                                                        <i class="btn btn-primary"><a href="<?= BASEURL . 'uploads/project/tax_clearance/' . $row->tax_clearance ?>" target="_blank">Download</a></i>


                                                        <!-- <img src="<?= BASEURL . 'uploads/project/tax_clearance/' . $row->tax_clearance ?>" width="50px"> -->

                                                    <?php } ?>

                                                </td>



                                                <td><?php if (!empty($row->company_registration_documents)) {

                                                        $company_registration_documents = explode(',', $row->company_registration_documents);

                                                        foreach ($company_registration_documents as $value) {

                                                            if (!empty($value)) {

                                                    ?>
                                                                <i class="btn btn-primary"><a href="<?= BASEURL . 'uploads/project/company_documents/' . $value ?>" target="_blank">Download</a></i>

                                                                <!-- <img src="<?= BASEURL . 'uploads/project/company_documents/' . $value ?>" width="50px"> -->

                                                    <?php }
                                                        }
                                                    } ?>

                                                </td>

                                                <td> <?php if (!empty($row->assesor_acreditations)) { ?>
                                                        <i class="btn btn-primary"><a href="<?= BASEURL . 'uploads/project/assesor_acreditations/' . $row->assesor_acreditations ?>" target="_blank">Download</a></i>

                                                        <!-- <img src="<?= BASEURL . 'uploads/project/assesor_acreditations/' . $row->assesor_acreditations ?>" width="50px"> -->

                                                    <?php } ?>

                                                </td>

                                                <td>

                                                    <?php if (!empty($row->moderator_accreditations)) { ?>

                                                        <!-- <img src="<?= BASEURL . 'uploads/project/moderator_accreditations/' . $row->moderator_accreditations ?>" width="50px"> -->
                                                        <i class="btn btn-primary"><a href="<?= BASEURL . 'uploads/project/moderator_accreditations/' . $row->moderator_accreditations ?>" target="_blank">Download</a></i>

                                                    <?php } ?>

                                                </td>

                                                <td>

                                                    <?php if (!empty($row->seta_creditiations)) { ?>

                                                        <!-- <img src="" width="50px"> -->
                                                        <i class="btn btn-primary"><a href="<?= BASEURL . 'uploads/project/seta_creditiations/' . $row->seta_creditiations ?>" target="_blank">Download</a></i>

                                                    <?php } ?>

                                                </td>

                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row->id ?>" data-name="<?= $row->id ?>" onclick="view(<?= $row->id; ?>)" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>


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

                                                    <a href="create_project?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                    <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deletedataprojectmanager('project_manager&behalf','id',<?= $row->id ?>)"><i class="fa fa-trash"></i></a>

                                                    <?php $tablenm_id = 'project_manager' . '.' . $row->id;

                                                    ?>

                                                    <i data="<?php echo $tablenm_id; ?>" class="status_checks btn

                                                <?php echo ($row->status) ? 'btn-success' : 'btn-warning' ?>"><?php echo ($row->status) ? 'Active' : 'Inactive' ?></i>

                                                </td>

                                            </tr>



                                    <?php $i++;
                                        }
                                    } ?>







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
            var Organization = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var fullname = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var surname = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var project_manager = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var email_address = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var landline_number = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            var mobile_number = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
            var province = $(event.relatedTarget).closest("tr").find("td:eq(8)").text();
            var district = $(event.relatedTarget).closest("tr").find("td:eq(9)").text();
            // var region = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
            var city = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
            var municipality = $(event.relatedTarget).closest("tr").find("td:eq(11)").text();
            var Suburb = $(event.relatedTarget).closest("tr").find("td:eq(12)").text();
            var Street_name = $(event.relatedTarget).closest("tr").find("td:eq(13)").text();
            var Street_number = $(event.relatedTarget).closest("tr").find("td:eq(14)").text();

            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");

            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Organization   :  </span><span class='pull-right'>" + Organization +
                "</div><div class=col-sm-12><span class='pull-left'>Full Name:  </span><span class='pull-right'>" + fullname +
                "</div><div class=col-sm-12><span class='pull-left'> SurName: </span><span class='pull-right'> " + surname +
                "</div><div class=col-sm-12><span class='pull-left'>Project Manager :  </span><span class='pull-right'>" + project_manager +
                "</div><div class=col-sm-12><span class='pull-left'>Email Address : </span><span class='pull-right'> " + email_address +
                "</div><div class=col-sm-12><span class='pull-left'>Landline Number  :  </span><span class='pull-right'>" + landline_number +
                "</div><div class=col-sm-12><span class='pull-left'>Mobile Number :  </span><span class='pull-right'>" + mobile_number +
                "</div><div class=col-sm-12><span class='pull-left'>province  :  </span><span class='pull-right'>" + province +
                "</div><div class=col-sm-12><span class='pull-left'>District  : </span><span class='pull-right'> " + district +
                "</div><div class=col-sm-12><span class='pull-left'>City : </span><span class='pull-right'> " + city +
                "</div><div class=col-sm-12><span class='pull-left'>Municipality : </span><span class='pull-right'> " + municipality +
                "</div><div class=col-sm-12><span class='pull-left'>Suburb :  </span><span class='pull-right'>" + Suburb +
                "</div><div class=col-sm-12><span class='pull-left'>Street Name :  </span><span class='pull-right'>" + Street_name +
                "</div><div class=col-sm-12><span class='pull-left'>Street Number : </span><span class='pull-right'> " + Street_number +


                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>