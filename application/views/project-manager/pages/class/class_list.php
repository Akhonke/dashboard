<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Class List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered  " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Training Provider</th>
                                        <th>Learnership Type</th>
                                        <th>Learnership Sub Type</th>
                                        <th>Class Name</th>
                                        <th>Facilitator</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($record)) {
                                        foreach ($record as $key_one => $value_one) {
                                            $i = 1;
                                            foreach ($value_one as $key => $row) {
                                                $learnership_type = $this->common->accessrecord('learnership', [], ['id' => $row->learnership_id], 'row');
                                                if (!empty($learnership_type)) {
                                                    $type = $learnership_type->name;
                                                } else {
                                                    $type = "";
                                                }
                                                $learner = $this->common->accessrecord('learnership_sub_type', ['sub_type'], ['id' => $row->learnership_sub_type_id], 'row');
                                                $learner_nm = $learner ? $learner->sub_type : '';
                                                $trainer = $this->common->accessrecord('trainer', ['full_name', 'company_name'], ['id' => $row->trainer_id], 'row');
                                                $trainer_nm = $trainer ? $trainer->company_name : '';

                                                $facilitatordata = $this->common->accessrecord('facilitator', [], ['id' => $row->facilitator_id], 'row');
                                                if (!empty($facilitatordata)) {
                                                    $facilitator = $facilitatordata->fullname;
                                                } else {
                                                    $facilitator = "";
                                                }
                                    ?>

                                                <tr id="del-<?= $row->id ?>">
                                                    <td><?= $i; ?></td>
                                                    <td><?= $trainer_nm; ?></td>
                                                    <td><?= $type; ?></td>
                                                    <td><?= $learner_nm; ?></td>
                                                    <td><?= $row->class_name; ?></td>
                                                    <td><?= $facilitator; ?></td>

                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="view()" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">

                                                                    <div class="modal-body " id="personDetails">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <a href="projectmanager-create-class?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deleterecordClass('class_name&behalf','id','<?= $row->id ?>','<?= $row->class_name ?>')"><i class="fa fa-trash"></i></a> -->
                                                    </td>
                                                </tr>
                                    <?php $i++;
                                            }
                                        }
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
        $("#exampleModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        }).on("show.bs.modal", function(event) {
            var button = $(event.relatedTarget); // button the triggered modal
            var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var ss = $(this).attr("photoss");
            var base_url = "your base url";
            var trainer_nm = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var learner_nm = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var class_name = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var facilitator = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();

            // var landline = $(event.relatedTarget).closest("tr").find("td:eq(16)").text(); 




            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Training Provider : </span><span class='pull-right'>   " + trainer_nm +
                "</div><div class=col-sm-12><span class='pull-left'>Learnership Type : </span><span class='pull-right'>  " + type +
                "</div><div class=col-sm-12><span class='pull-left'>Learnership Sub Type : </span><span class='pull-right'>  " + learner_nm +
                "</div><div class=col-sm-12><span class='pull-left'>Class Name : </span><span class='pull-right'>  " + class_name +
                "</div><div class=col-sm-12><span class='pull-left'>Facilitator Name : </span><span class='pull-right'>  " + facilitator +

                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>