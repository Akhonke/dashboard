<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Assessment List</h3>

                    </div>

                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered nowrap" style="width:100%">

                            <thead>

                                <tr>
                                    <th>Assessment Submission ID.</th>
                                    <th>Learner Name.</th>
                                    <th>Learner Surname.</th>
                                    <th>Status</th>
                                    <th>Assessment Start Date</th>
                                    <th>Assessment End Date</th>
                                    <th>Title</th>
                                    <th>Assessment Type</th>
                                    <th>Submission Type</th>
                                    <th>Class Name</th>
                                    <th>Unit Standard</th>
                                    <th>Programme Name</th>
                                    <th>Programme Number</th>
                                    <th>Intervention Name</th>
                                    <th>Created On</th>
                                    <th>Updated On</th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) { ?>

                                        <tr>

                                            <td><?= $row->id; ?></td>
                                            <td><?= $row->first_name; ?></td>
                                            <td><?= $row->surname; ?></td>
                                            <td><?= $row->status; ?></td>
                                            <td><?= $row->assessment_start_date; ?></td>
                                            <td><?= $row->assessment_end_date; ?></td>
                                            <td><?= $row->title; ?></td>
                                            <td><?= $row->assessment_type; ?></td>
                                            <td><?= $row->submission_type; ?></td>
                                            <td><?= $row->class_name; ?></td>
                                            <td><?= $row->unit_standard; ?></td>
                                            <td><?= $row->programme_name; ?></td>
                                            <td><?= $row->programme_number; ?></td>
                                            <td><?= $row->intervention_name; ?></td>
                                            <td><?= $row->created_date; ?></td>
                                            <td><?= $row->updated_date; ?></td>

                                            <td>

                                                <a href="/moderator-view-assessment-submission?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                            </td>


                                        </tr>

                                <?php $i++; } } ?>

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
//     function view() {

// alert('TODO');
// return;

//         $("#exampleModal").modal({
//             keyboard: true,
//             backdrop: "static",
//             show: false,

//         }).on("show.bs.modal", function(event) {
//             var button = $(event.relatedTarget); // button the triggered modal
//             var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
//             var project_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
//             var project_type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
//             var province = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
//             var district_name = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
//             var city_name = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
//             var municipality = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
//             var planned_start_date = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
//             var actual_start_date = $(event.relatedTarget).closest("tr").find("td:eq(8)").text();
//             var planned_end_date = $(event.relatedTarget).closest("tr").find("td:eq(9)").text();
//             var actual_end_date = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
//             var project_owner_name = $(event.relatedTarget).closest("tr").find("td:eq(11)").text();
//             var project_owner_surname = $(event.relatedTarget).closest("tr").find("td:eq(12)").text();
//             var project_owner_email = $(event.relatedTarget).closest("tr").find("td:eq(13)").text();
//             var project_owner_mobile = $(event.relatedTarget).closest("tr").find("td:eq(14)").text();
//             var project_owner_landline = $(event.relatedTarget).closest("tr").find("td:eq(15)").text();
//             var project_owner_id_number = $(event.relatedTarget).closest("tr").find("td:eq(16)").text();
//             var project_owner_gender = $(event.relatedTarget).closest("tr").find("td:eq(17)").text();
//             var project_owner_dob = $(event.relatedTarget).closest("tr").find("td:eq(18)").text();
//             var pre_implement_planned_start_date = $(event.relatedTarget).closest("tr").find("td:eq(19)").text();
//             var pre_implement_actual_start_date = $(event.relatedTarget).closest("tr").find("td:eq(20)").text();
//             var pre_implement_planned_end_date = $(event.relatedTarget).closest("tr").find("td:eq(21)").text();
//             var pre_implement_actual_end_date = $(event.relatedTarget).closest("tr").find("td:eq(22)").text();
//             var implement_planned_start_date = $(event.relatedTarget).closest("tr").find("td:eq(23)").text();
//             var implement_actual_start_date = $(event.relatedTarget).closest("tr").find("td:eq(24)").text();
//             var implement_planned_end_date = $(event.relatedTarget).closest("tr").find("td:eq(25)").text();
//             var implement_actual_end_date = $(event.relatedTarget).closest("tr").find("td:eq(26)").text();
//             var closeout_planned_start_date = $(event.relatedTarget).closest("tr").find("td:eq(27)").text();
//             var closeout_actual_start_date = $(event.relatedTarget).closest("tr").find("td:eq(28)").text();
//             var closeout_planned_end_date = $(event.relatedTarget).closest("tr").find("td:eq(29)").text();
//             var closeout_actual_end_date = $(event.relatedTarget).closest("tr").find("td:eq(30)").text();

//             //displays values to modal
//             $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>project Name: </span><span class='pull-right'> " + project_name +
//                 "</div><div class=col-sm-12><span class='pull-left'>project type:</span><span class='pull-right'>  " + project_type +
//                 "</div><div class=col-sm-12><span class='pull-left'>province:</span><span class='pull-right'>  " + province +
//                 "</div><div class=col-sm-12><span class='pull-left'>District Name: </span><span class='pull-right'> " + district_name +
//                 "</div><div class=col-sm-12><span class='pull-left'>City Name: </span><span class='pull-right'> " + city_name +
//                 "</div><div class=col-sm-12><span class='pull-left'>Municipality Name: </span><span class='pull-right'> " + municipality +
//                 "</div><div class=col-sm-12><span class='pull-left'>Planned start date: </span><span class='pull-right'> " + planned_start_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>Actual Start Date: </span><span class='pull-right'> " + actual_start_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>planned end date:</span><span class='pull-right'>  " + planned_end_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>actual end date: </span><span class='pull-right'> " + actual_end_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>project owner name: </span><span class='pull-right'> " + project_owner_name +
//                 "</div><div class=col-sm-12><span class='pull-left'>project owner  surname:</span><span class='pull-right'>  " + project_owner_surname +
//                 "</div><div class=col-sm-12><span class='pull-left'>project_owner_email: </span><span class='pull-right'> " + project_owner_email +
//                 "</div><div class=col-sm-12><span class='pull-left'>project_owner_mobile:</span><span class='pull-right'>  " + project_owner_mobile +
//                 "</div><div class=col-sm-12><span class='pull-left'>project_owner_landline: </span><span class='pull-right'> " + project_owner_landline +
//                 "</div><div class=col-sm-12><span class='pull-left'>project_owner_id_number: </span><span class='pull-right'> " + project_owner_id_number +
//                 "</div><div class=col-sm-12><span class='pull-left'>project_owner_gender: </span><span class='pull-right'> " + project_owner_gender +
//                 "</div><div class=col-sm-12><span class='pull-left'>project_owner_dob: </span><span class='pull-right'> " + project_owner_dob +
//                 "</div><div class=col-sm-12><span class='pull-left'>pre_implement_planned_start_date: </span><span class='pull-right'> " + pre_implement_planned_start_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>pre_implement_actual_start_date:</span><span class='pull-right'>  " + pre_implement_actual_start_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>pre_implement_planned_end_date:</span><span class='pull-right'>  " + pre_implement_planned_end_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>pre_implement_actual_end_date:</span><span class='pull-right'> " + pre_implement_actual_end_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>implement_planned_start_date:</span><span class='pull-right'>  " + implement_planned_start_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>implement_actual_start_date: </span><span class='pull-right'> " + implement_actual_start_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>implement_planned_end_date: </span><span class='pull-right'> " + implement_planned_end_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>implement_actual_end_date: </span><span class='pull-right'> " + implement_actual_end_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>closeout_planned_start_date: </span><span class='pull-right'> " + closeout_planned_start_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>closeout_actual_start_date: </span><span class='pull-right'> " + closeout_actual_start_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>closeout_planned_end_date: </span><span class='pull-right'> " + closeout_planned_end_date +
//                 "</div><div class=col-sm-12><span class='pull-left'>closeout_actual_end_date: </span><span class='pull-right'> " + closeout_actual_end_date +
//                 "</span></div></div></span>"))
//         }).on("hide.bs.modal", function(event) {
//             $(this).find("#personDetails").html("");
//         });
//     }
</script>