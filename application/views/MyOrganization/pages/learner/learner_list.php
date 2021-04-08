<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Learners List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Training Provider</th>
                                        <th>Full name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Other Mobile</th>
                                        <th>ID Number</th>
                                        <th>SETA</th>
                                        <th>Province</th>
                                        <th>District</th>
                                        <th>City</th>
                                        <th>Municipality</th>
                                        <!-- <th>Region</th> -->
                                        <th>Suburb</th>
                                        <th>Street name</th>
                                        <th>Street number</th>
                                        <th>Learnership Sub Type</th>
                                        <th>Gender</th>
                                        <th>Learner Accepted Training</th>
                                        <th>Assessment</th>
                                        <th>Disable</th>
                                        <th>U.I.F Beneficiary</th>
                                        <th>Reason</th>
                                        <th>Class Name</th>
                                        <th>I.D.Copy</th>
                                        <th>Certificate Copy</th>
                                        <th>Contract Copy</th>
                                        <th>Upload File Formate(Excel)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($learner)) {
                                        $i = 0;
                                        foreach ($learner as $key => $value) {
                                            $i++;
                                    ?>
                                            <tr id="del-<?= $value->id ?>">
                                                <td><?= $i ?></td>
                                                <td><?= $value->trining_provider ?></td>
                                                <td><?= $value->first_name ?></td>
                                                <td><?= $value->surname ?></td>
                                                <td><?= $value->email ?></td>
                                                <td><?= '+27-' . $value->mobile ?></td>
                                                <td><?= '+27-' . $value->mobile_number ?></td>
                                                <td><?= $value->id_number ?></td>
                                                <td><?= $value->SETA ?></td>
                                                <td><?= $value->province ?></td>
                                                <td><?= $value->district ?></td>
                                                <td><?= $value->city ?></td>
                                                <td><?= $value->municipality ?></td>
                                                <!-- <td><?= $value->region ?></td> -->
                                                <td><?= $value->Suburb ?></td>
                                                <td><?= $value->Street_name ?></td>
                                                <td><?= $value->Street_number ?></td>
                                                <td><?= $value->learnershipSubType ?></td>
                                                <td><?= $value->gender ?></td>
                                                <td><?= $value->learner_accepted_training ?></td>
                                                <td><?= $value->assessment ?></td>
                                                <td><?= $value->disable ?></td>
                                                <td><?= $value->utf_benefits ?></td>
                                                <td><?= $value->reason ?></td>
                                                <td><?= $value->classname ?></td>
                                                <td class="image-col">
                                                    <?php if (!empty($value->id_copy)) { ?>
                                                        <img src="<?= BASEURL . 'uploads/learner/id_copy/' . $value->id_copy ?>" width="50px" height="50px">

                                                    <?php } ?>
                                                </td>
                                                <td class="image-col1">
                                                    <?php if (!empty($value->certificate_copy)) { ?>
                                                        <img src="<?= BASEURL . 'uploads/learner/certificate_copy/' . $value->certificate_copy ?>" width="50px" height="50px">
                                                    <?php } ?>
                                                </td>
                                                <td class="image-col2">
                                                    <?php if (!empty($value->contract_copy)) { ?>
                                                        <img src="<?= BASEURL . 'uploads/learner/contract_copy/' . $value->contract_copy ?>" width="50px" height="50px">
                                                    <?php } ?>
                                                </td>
                                                <td><?php if (!empty($value)) { ?>
                                                        <a href="<?= BASEURL . 'uploads/learner/LearnerSheetDemo.xls' ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $value->id ?>" data-name="<?= $value->id ?>" onclick="view(<?= $value->id; ?>)" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
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


                                                    <!-- <a href="create_learner?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> -->
                                                    <!-- <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deletedataLearner('learner&behalf','id',<?= $value->id ?>)"><i class="fa fa-trash"></i></a> -->
                                                    <?php $tablenm_id = 'learner' . '.' . $value->id;
                                                    if (($value->learner_accepted_training == "no") || ($value->learner_accepted_training == "No")) { ?>
                                                        <i data="<?php echo $tablenm_id; ?>" class="status_accepted btn btn-warning" data-learner="<?php echo $value->learner_accepted_training; ?>">Not Accepted</i>
                                                    <?php } else { ?>
                                                        <i data="<?php echo $tablenm_id; ?>" class="status_change btn btn-success" data-learner="<?php echo $value->learner_accepted_training; ?>">Accepted</i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
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

        $("#exampleModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on("show.bs.modal", function(event) {
            var button = $(event.relatedTarget); // button the triggered modal
            var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var ss = $(this).attr("photoss");
            var base_url = "your base url";
            var trining_provider = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var first_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var surname = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var email = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var mobile = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var mobile_number = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            var id = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
            var SETA_no = $(event.relatedTarget).closest("tr").find("td:eq(8)").text();
            var province = $(event.relatedTarget).closest("tr").find("td:eq(9)").text();
            var district = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
            var city = $(event.relatedTarget).closest("tr").find("td:eq(11)").text();
            var municipality = $(event.relatedTarget).closest("tr").find("td:eq(12)").text();
            var Suburb = $(event.relatedTarget).closest("tr").find("td:eq(13)").text();
            var Street_name = $(event.relatedTarget).closest("tr").find("td:eq(14)").text();
            var Street_number = $(event.relatedTarget).closest("tr").find("td:eq(15)").text();
            var learnershipSubType = $(event.relatedTarget).closest("tr").find("td:eq(16)").text();
            var gender = $(event.relatedTarget).closest("tr").find("td:eq(17)").text();
            var learner_accepted_training = $(event.relatedTarget).closest("tr").find("td:eq(18)").text();
            var assessment = $(event.relatedTarget).closest("tr").find("td:eq(19)").text();
            var disable = $(event.relatedTarget).closest("tr").find("td:eq(20)").text();
            var utf_benefits = $(event.relatedTarget).closest("tr").find("td:eq(21)").text();
            var reason = $(event.relatedTarget).closest("tr").find("td:eq(22)").text();
            var classname = $(event.relatedTarget).closest("tr").find("td:eq(23)").text();
            var id_copy = $(event.relatedTarget).closest("tr").find("td:eq(24).image-col img").attr("src");
            var certificate_copy = $(event.relatedTarget).closest("tr").find("td:eq(25).image-col1 img").attr("src");
            var contract_copy = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col2 img").attr("src");


            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>First Name:</span><span class='pull-right'> " + first_name +
                "</div><div class=col-sm-12><span class='pull-left'>SurName: </span><span class='pull-right'>" + surname +
                "</div><div class=col-sm-12><span class='pull-left'>Email: </span><span class='pull-right'>" + email +
                "</div><div class=col-sm-12><span class='pull-left'>Mobile : </span><span class='pull-right'>" + mobile +
                "</div><div class=col-sm-12><span class='pull-left'>Mobile Number :</span><span class='pull-right'> " + mobile_number +
                "</div><div class=col-sm-12><span class='pull-left'>ID :</span><span class='pull-right'> " + id +
                "</div><div class=col-sm-12><span class='pull-left'>SETA: </span><span class='pull-right'>" + SETA_no +
                "</div><div class=col-sm-12><span class='pull-left'>Province  :</span><span class='pull-right'> " + province +
                "</div><div class=col-sm-12><span class='pull-left'>District : </span><span class='pull-right'>" + district +
                "</div><div class=col-sm-12><span class='pull-left'>City : </span><span class='pull-right'>" + city +
                "</div><div class=col-sm-12><span class='pull-left'>Municipality  : </span><span class='pull-right'>" + municipality +
                "</div><div class=col-sm-12><span class='pull-left'>Suburb :</span><span class='pull-right'> " + Suburb +
                "</div><div class=col-sm-12><span class='pull-left'>Street Name:</span><span class='pull-right'> " + Street_name +
                "</div><div class=col-sm-12><span class='pull-left'>Street Number: </span><span class='pull-right'>" + Street_number +
                "</div><div class=col-sm-12><span class='pull-left'>Learner Ship Sub Type: </span><span class='pull-right'>" + learnershipSubType +
                "</div><div class=col-sm-12><span class='pull-left'>Gender : </span><span class='pull-right'>" + gender +
                "</div><div class=col-sm-12><span class='pull-left'>Learner Accepted Training:</span><span class='pull-right'> " + learner_accepted_training +
                "</div><div class=col-sm-12><span class='pull-left'>Assessment  :</span><span class='pull-right'> " + assessment +
                "</div><div class=col-sm-12><span class='pull-left'>Disable :</span><span class='pull-right'> " + disable +
                "</div><div class=col-sm-12><span class='pull-left'>UTF Benefits  :</span><span class='pull-right'> " + utf_benefits +
                "</div><div class=col-sm-12><span class='pull-left'>Reason : </span><span class='pull-right'>" + reason +
                "</div><div class=col-sm-12><span class='pull-left'>Classname : </span><span class='pull-right'>" + classname +
                "</div><div class=col-sm-12><span class='pull-left'>ID Copy  : </span><span class='pull-right'>" + ' <img width="50" src="' + id_copy + '" / > ' +
                "</div><div class=col-sm-12><span class='pull-left'>Certificate Copy : </span><span class='pull-right'>" + ' <img width="50" src="' + certificate_copy + '" / > ' +
                "</div><div class=col-sm-12><span class='pull-left'>Contract Copy:</span><span class='pull-right'> " + ' <img width="50" src="' + contract_copy + '" / > ' +

                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>