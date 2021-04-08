<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">All Projects List</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered " style="width:100%">

                                <thead>

                                    <tr>

                                        <th>S. No.</th>
                                        <th>Project Name</th>

                                        <th>Project Type</th>

                                        <th>Province</th>

                                        <th>District</th>

                                        <!-- <th>Region</th> -->

                                        <th>City</th>

                                        <th>Municipality</th>

                                        <th>Planned Project Start Date</th>

                                        <th>Actual Project Start Date</th>

                                        <th>Planned Project End Date</th>

                                        <th>Actual Project End Date</th>

                                        <th>Project Owner Fullname</th>

                                        <th>Project Owner Surname</th>

                                        <th>Project Owner Email</th>

                                        <th>Project Owner Mobile</th>

                                        <th>Project Owner Landline</th>

                                        <th>Project Owner ID</th>

                                        <th>Project Owner Gender</th>

                                        <th>Project Owner Date of Birth</th>

                                        <th>Pre Implementation Planned Start Date</th>

                                        <th>Pre Implementation Actual Start Date</th>

                                        <th>Pre Implementation Planned End Date</th>

                                        <th>Pre Implementation Actual End Date</th>

                                        <th>Implementation Planned Start Date</th>

                                        <th>Implementation Actual Start Date</th>

                                        <th>Implementation Planned End Date</th>

                                        <th>Implementation Actual End Date</th>

                                        <th>Closeout Planned Start Date</th>

                                        <th>Closeout Actual Start Date</th>

                                        <th>Closeout Planned End Date</th>

                                        <th>Closeout Actual End Date</th>
                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) {

                                            $programme = $this->common->accessrecord('programme_director', [], ['id' => $row->organization], 'row');

                                            if (!empty($programme)) {

                                                $project_director = $programme->project_director;
                                            } else {

                                                $project_director = "";
                                            }


                                            $district = $this->common->accessrecord('district', [], ['id' => $row->district], 'row');

                                            if ((!empty($district->name))) {

                                                $district_name = $district->name;
                                            } else {

                                                $district_name = "";
                                            }

                                            // $region = $this->common->accessrecord('region', [], ['id' => $row->region], 'row');

                                            // if ((!empty($region->region))) {

                                            //     $region_name = $region->region;
                                            // } else {

                                            //     $region_name = "";
                                            // }

                                            $city = $this->common->accessrecord('city', [], ['id' => $row->city], 'row');

                                            if ((!empty($city->city))) {

                                                $city_name = $city->city;
                                            } else {

                                                $city_name = "";
                                            }

                                            $municipality = $this->common->accessrecord('municipality', [], ['id' => $row->municipality], 'row');

                                            if ((!empty($municipality->municipality))) {

                                                $municipality_name = $municipality->municipality;
                                            } else {

                                                $municipality_name = "";
                                            }

                                    ?>

                                            <tr id="del-<?= $row->id ?>">

                                                <td><?= $i; ?></td>

                                                <!-- <td><?= $project_director; ?></td> -->

                                                <td><?= $row->project_name; ?></td>

                                                <td><?= $row->project_type; ?></td>

                                                <td><?= $row->province; ?></td>

                                                <td><?= $district_name; ?></td>

                                                <!-- <td><?= $region_name; ?></td> -->

                                                <td><?= $city_name; ?></td>

                                                <td>
                                                    <?= $municipality_name ?>
                                                </td>

                                                <td><?= $row->planned_start_date; ?></td>

                                                <td><?= $row->actual_start_date; ?></td>

                                                <td><?= $row->planned_end_date; ?></td>

                                                <td><?= $row->actual_end_date; ?></td>

                                                <td><?= $row->project_owner_name; ?></td>

                                                <td><?= $row->project_owner_surname; ?></td>

                                                <td><?= $row->project_owner_email; ?></td>

                                                <td><?= $row->project_owner_mobile; ?></td>

                                                <td><?= $row->project_owner_landline; ?></td>

                                                <td><?= $row->project_owner_id_number; ?></td>

                                                <td><?= $row->project_owner_gender; ?></td>

                                                <td><?= $row->project_owner_dob ?></td>

                                                <td><?= $row->pre_implement_planned_start_date ?></td>

                                                <td><?= $row->pre_implement_actual_start_date ?></td>

                                                <td><?= $row->pre_implement_planned_end_date ?></td>

                                                <td><?= $row->pre_implement_actual_end_date ?></td>

                                                <td><?= $row->implement_planned_start_date ?></td>

                                                <td><?= $row->implement_actual_start_date ?></td>

                                                <td><?= $row->implement_planned_end_date; ?></td>

                                                <td><?= $row->implement_actual_end_date ?></td>

                                                <td><?= $row->closeout_planned_start_date ?></td>

                                                <td><?= $row->closeout_actual_start_date ?></td>

                                                <td><?= $row->closeout_planned_end_date ?></td>

                                                <td><?= $row->closeout_actual_end_date ?></td>





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
                                                    <!-- <a href="create_project?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> -->

                                                    <!-- <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deletedataprojectmanager('project_manager&behalf','id',<?= $row->id ?>)"><i class="fa fa-trash"></i></a> -->

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
            var project_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var project_type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var province = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var district = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var city = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var municipality = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            var planned_start_date = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
            var actual_start_date = $(event.relatedTarget).closest("tr").find("td:eq(8)").text();
            var planned_end_date = $(event.relatedTarget).closest("tr").find("td:eq(9)").text();
            var actual_end_date = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
            var project_owner_name = $(event.relatedTarget).closest("tr").find("td:eq(11)").text();
            var project_owner_surname = $(event.relatedTarget).closest("tr").find("td:eq(12)").text();
            var project_owner_email = $(event.relatedTarget).closest("tr").find("td:eq(13)").text();
            var project_owner_mobile = $(event.relatedTarget).closest("tr").find("td:eq(14)").text();
            var project_owner_landline = $(event.relatedTarget).closest("tr").find("td:eq(15)").text();
            var project_owner_id_number = $(event.relatedTarget).closest("tr").find("td:eq(16)").text();
            var project_owner_gender = $(event.relatedTarget).closest("tr").find("td:eq(17)").text();
            var project_owner_dob = $(event.relatedTarget).closest("tr").find("td:eq(18)").text();
            var pre_implement_planned_start_date = $(event.relatedTarget).closest("tr").find("td:eq(19)").text();
            var pre_implement_actual_start_date = $(event.relatedTarget).closest("tr").find("td:eq(20)").text();
            var pre_implement_planned_end_date = $(event.relatedTarget).closest("tr").find("td:eq(21)").text();
            var pre_implement_actual_end_date = $(event.relatedTarget).closest("tr").find("td:eq(22)").text();
            var implement_planned_start_date = $(event.relatedTarget).closest("tr").find("td:eq(23)").text();
            var implement_actual_start_date = $(event.relatedTarget).closest("tr").find("td:eq(24)").text();
            var implement_planned_end_date = $(event.relatedTarget).closest("tr").find("td:eq(25)").text();
            var implement_actual_end_date = $(event.relatedTarget).closest("tr").find("td:eq(26)").text();
            var closeout_planned_start_date = $(event.relatedTarget).closest("tr").find("td:eq(27)").text();
            var closeout_actual_start_date = $(event.relatedTarget).closest("tr").find("td:eq(28)").text();
            var closeout_planned_end_date = $(event.relatedTarget).closest("tr").find("td:eq(29)").text();
            var closeout_actual_end_date = $(event.relatedTarget).closest("tr").find("td:eq(30)").text();
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");
            // var src = $(event.relatedTarget).closest("tr").find("td:eq(26).image-col img").attr("src");

            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Project Name  :  </span><span class='pull-right'>" + project_name +
                "</div><div class=col-sm-12><span class='pull-left'>Project Type:  </span><span class='pull-right'>" + project_type +
                "</div><div class=col-sm-12><span class='pull-left'>Province:  </span><span class='pull-right'>" + province +
                "</div><div class=col-sm-12><span class='pull-left'>District : </span><span class='pull-right'> " + district +
                "</div><div class=col-sm-12><span class='pull-left'>City : </span><span class='pull-right'> " + city +
                "</div><div class=col-sm-12><span class='pull-left'>Municipality : </span><span class='pull-right'> " + municipality +
                "</div><div class=col-sm-12><span class='pull-left'>Planned Project Start Date : </span><span class='pull-right'> " + planned_start_date +
                "</div><div class=col-sm-12><span class='pull-left'>Actual Project Start Date : </span><span class='pull-right'> " + actual_start_date +
                "</div><div class=col-sm-12><span class='pull-left'>Planned Project End Date : </span><span class='pull-right'> " + planned_end_date +
                "</div><div class=col-sm-12><span class='pull-left'>Actual Project End Date : </span><span class='pull-right'> " + actual_end_date +
                "</div><div class=col-sm-12><span class='pull-left'>Project Owner Fullname :  </span><span class='pull-right'>" + project_owner_name +
                "</div><div class=col-sm-12><span class='pull-left'>Project Owner Surname  : </span><span class='pull-right'> " + project_owner_surname +
                "</div><div class=col-sm-12><span class='pull-left'>Project Owner Email : </span><span class='pull-right'> " + project_owner_email +
                "</div><div class=col-sm-12><span class='pull-left'>Project Owner Mobile : </span><span class='pull-right'> " + project_owner_mobile +
                "</div><div class=col-sm-12><span class='pull-left'>Project Owner Landline : </span><span class='pull-right'> " + project_owner_landline +
                "</div><div class=col-sm-12><span class='pull-left'>Project Owner ID :  </span><span class='pull-right'>" + project_owner_id_number +
                "</div><div class=col-sm-12><span class='pull-left'>Project Owner Gender :  </span><span class='pull-right'>" + project_owner_gender +
                "</div><div class=col-sm-12><span class='pull-left'>Project Owner Date of Birth :  </span><span class='pull-right'>" + project_owner_dob +
                "</div><div class=col-sm-12><span class='pull-left'>Pre Implementation Planned Start Date : </span><span class='pull-right'> " + pre_implement_planned_start_date +
                "</div><div class=col-sm-12><span class='pull-left'>Pre Implementation Actual Start Date :  </span><span class='pull-right'>" + pre_implement_actual_start_date +
                "</div><div class=col-sm-12><span class='pull-left'>Pre Implementation Planned End Date :  </span><span class='pull-right'>" + pre_implement_planned_end_date +
                "</div><div class=col-sm-12><span class='pull-left'>Pre Implementation Actual End Date  : </span><span class='pull-right'> " + pre_implement_actual_end_date +
                "</div><div class=col-sm-12><span class='pull-left'>Implementation Planned Start Date  :  </span><span class='pull-right'>" + implement_planned_start_date +
                "</div><div class=col-sm-12><span class='pull-left'>Implementation Actual Start Date : </span><span class='pull-right'> " + implement_actual_start_date +
                "</div><div class=col-sm-12><span class='pull-left'>Implementation Planned End Date : </span><span class='pull-right'> " + implement_planned_end_date +
                "</div><div class=col-sm-12><span class='pull-left'>Implementation Actual End Date : </span><span class='pull-right'> " + implement_actual_end_date +
                "</div><div class=col-sm-12><span class='pull-left'>Closeout Planned Start Date :  </span><span class='pull-right'>" + closeout_planned_start_date +
                "</div><div class=col-sm-12><span class='pull-left'>Closeout Actual Start Date : </span><span class='pull-right'> " + closeout_actual_start_date +
                "</div><div class=col-sm-12><span class='pull-left'>Closeout Planned End Date : </span><span class='pull-right'> " + closeout_planned_end_date +
                "</div><div class=col-sm-12><span class='pull-left'>Closeout Actual End Date : </span><span class='pull-right'> " + closeout_actual_end_date +
                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>