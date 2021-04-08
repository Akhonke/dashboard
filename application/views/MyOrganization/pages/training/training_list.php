<div class="container-fluid px-xl-5">



    <section class="py-5">



        <div class="row">



            <!-- Form Elements -->



            <div class="col-lg-12 mb-1">



                <div class="card">



                    <div class="card-header">



                        <h3 class="h6 text-uppercase mb-0">All Training Providers List</h3>



                    </div>



                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered" style="width:100%">



                                <thead>



                                    <tr>



                                        <th>S. No.</th>

                                        <th>Training Provider</th>

                                        <th>Full Name</th>

                                        <th>Surname</th>

                                        <th>Email</th>

                                        <th>Number</th>

                                        <th>Landline</th>

                                        <th>Province</th>

                                        <th>District</th>

                                        <!-- <th>Region</th> -->

                                        <th>City</th>

                                        <th>Municipality</th>

                                        <th>Suburb</th>

                                        <th>Street Name</th>

                                        <th>Street Number</th>

                                        <th>Project Manager</th>

                                        <th>Attach Documents</th>

                                        <th>Action</th>



                                    </tr>



                                </thead>



                                <tbody>

                                    <?php

                                    if (!empty($training)) {

                                        $i = 0;

                                        foreach ($training as $key => $value) {

                                            $project = $this->common->accessrecord('project_manager', [], ['id' => $value->project_id], 'row');

                                            if (!empty($project)) {

                                                $project_manager = $project->project_manager;
                                            } else {

                                                $project_manager = "";
                                            }

                                            $i++;

                                    ?>

                                            <tr id="del-<?= $value->id ?>">

                                                <td><?= $i ?></td>

                                                <td><?= $value->company_name ?></td>

                                                <td><?= $value->full_name ?></td>

                                                <td><?= $value->surname ?></td>

                                                <td><?= $value->email ?></td>

                                                <td><?= "+27-" . $value->mobile ?></td>

                                                <td><?= "+27-" . $value->landline ?></td>

                                                <td><?= $value->province ?></td>

                                                <td><?= $value->district ?></td>

                                                <!-- <td><?= $value->region ?></td> -->

                                                <td><?= $value->city ?></td>

                                                <td><?= $value->municipality ?></td>

                                                <td><?= $value->Suburb ?></td>

                                                <td><?= $value->Street_name ?></td>

                                                <td><?= $value->Street_number ?></td>

                                                <td><?= $project_manager ?></td>

                                                <td class="image-col"><?php if (!empty($value->attach_documents)) {
                                                                            $attach_documents = explode(',', $value->attach_documents);

                                                                            foreach ($attach_documents as $values) {

                                                                                if (!empty($value)) {

                                                                        ?>

                                                                <img src="<?= BASEURL . 'uploads/training/attach_documents/' . $values ?>" width="50px">

                                                    <?php }
                                                                            }
                                                                        } ?>

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

                                                    <!-- <a href="create_training?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i



                                                class="fa fa-edit"></i></a>

                                         <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deletedataTrainingprovider('trainer&behalf','id',<?= $value->id ?>)"><i

                                                        class="fa fa-trash"></i></a> -->

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

        debugger;

        $("#exampleModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on("show.bs.modal", function(event) {
            var button = $(event.relatedTarget); // button the triggered modal
            var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var company_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var full_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var surname = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var email = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var mobile = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var landline = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            var province = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
            var district = $(event.relatedTarget).closest("tr").find("td:eq(8)").text();
            var city = $(event.relatedTarget).closest("tr").find("td:eq(9)").text();
            var municipality = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
            var Suburb = $(event.relatedTarget).closest("tr").find("td:eq(11)").text();
            var Street_name = $(event.relatedTarget).closest("tr").find("td:eq(12)").text();
            var Street_number = $(event.relatedTarget).closest("tr").find("td:eq(13)").text();
            var project_manager = $(event.relatedTarget).closest("tr").find("td:eq(14)").text();

            var src = $(event.relatedTarget).closest("tr").find("td:eq(15).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");

            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Company Name   :  </span><span class='pull-right'>" + company_name +
                "</div><div class=col-sm-12><span class='pull-left'>Full Name:  </span><span class='pull-right'>" + full_name +
                "</div><div class=col-sm-12><span class='pull-left'> SurName: </span><span class='pull-right'> " + surname +
                "</div><div class=col-sm-12><span class='pull-left'>Email : </span><span class='pull-right'> " + email +
                "</div><div class=col-sm-12><span class='pull-left'>Mobile Number :  </span><span class='pull-right'>" + mobile +
                "</div><div class=col-sm-12><span class='pull-left'>Landline Number  :  </span><span class='pull-right'>" + landline +

                "</div><div class=col-sm-12><span class='pull-left'>province  :  </span><span class='pull-right'>" + province +
                "</div><div class=col-sm-12><span class='pull-left'>District  :  </span><span class='pull-right'>" + district +
                "</div><div class=col-sm-12><span class='pull-left'>city :  </span><span class='pull-right'>" + city +
                "</div><div class=col-sm-12><span class='pull-left'>Municipality :  </span><span class='pull-right'>" + municipality +
                "</div><div class=col-sm-12><span class='pull-left'>Suburb :  </span><span class='pull-right'>" + Suburb +
                "</div><div class=col-sm-12><span class='pull-left'>Street Name :  </span><span class='pull-right'>" + Street_name +
                "</div><div class=col-sm-12><span class='pull-left'>Street Number :  </span><span class='pull-right'>" + Street_number +
                "</div><div class=col-sm-12><span class='pull-left'>Attach Documents: </span><span class='pull-right'> " + ' <img width="50" src="' + src + '" / > ' +


                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>