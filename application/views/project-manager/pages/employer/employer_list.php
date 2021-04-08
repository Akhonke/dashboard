<?php
if (isset($_SESSION['admin']['logintype'])) {
    $res = $this->common->accessrecord('user_permission', ['is_view,is_add,is_edit,is_delete'], ['user_type' => 'Provider', 'user_id' => $_SESSION['admin']['id'], 'module_name' => 'Employer'], 'row_array');
} else {
    $res = array();
    if (empty($res)) {
        $logintype = 'main-user';
        $res['is_edit'] = 1;
        $res['is_delete'] = 1;
    }
}
?>

<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Employers List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <!-- <th>Training Provider</th> -->
                                        <!--<th>Learner Place Of Employment</th>-->
                                        <th>Employer Name</th>
                                        <th>Employer Contact Number</th>
                                        <th>Employer Contact Email</th>
                                        <th>Employer Province</th>
                                        <th>Employer District</th>
                                        <th>Employer City</th>
                                        <th>Employer Municipality</th>
                                        <th>Employer Suburb</th>
                                        <th>Employer Street Name</th>
                                        <th>Employer Street Number</th>
                                        <th>Contact Person Name</th>
                                        <th>Contact Person Surname</th>
                                        <th>Contact Person Contact Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($employers)) {
                                        $i = 0;
                                        foreach ($employers as $key => $value) {
                                            $i++; ?>
                                            <tr id="del-<?= $value['id'] ?>">
                                                <td><?= $i ?></td>
                                                <td class="1"><?= $value['employer_name'] ?></td>
                                                <td class="2"><?= '+27-' . $value['employer_contact_number'] ?></td>
                                                <td class="3"><?= $value['employer_contact_email'] ?></td>
                                                <td class="4"><?= $value['employer_province'] ?></td>
                                                <td class="5"><?= $value['employer_district'] ?></td>
                                                <td class="7"><?= $value['employer_city'] ?></td>
                                                <td class="6">
                                                <?php if (!empty($value['municipality'])) { ?>
                                                  <p><?= $value['municipality'] ?></p> 
                                                        <?php }else{ ?>
                                                            <p style="color: red;">No Data Available..</p> 
                                                        <?php } ?>
                                                </td>
                                                <td class="8"><?= $value['employer_Suburb'] ?></td>
                                                <td class="9"><?= $value['employer_Street_name'] ?></td>
                                                <td class="10"><?= $value['employer_Street_number'] ?></td>
                                                <td class="11"><?= $value['contact_person_name'] ?></td>
                                                <td class="12"><?= $value['contact_person_surname'] ?></td>
                                                <td class="13"><?= '+27-' . $value['contact_person_contact_no'] ?></td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $value['id'] ?>" data-name="<?= $value['id'] ?>" onclick="view(<?= $value['id']; ?>)" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>

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

                                                    <?php if ($res['is_edit'] == 1) { ?>
                                                        <a href="Projectmanager-create-employer?id=<?= $value['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <?php }
                                                    if ($res['is_delete'] == 1) { ?>

                                                        <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deleterecord('employer&behalf','id','<?= $value['id'] ?>')"><i class="fa fa-trash"></i></a>
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
    function deleterecord(tablename, columnname, id) {
        swal({
                title: "Are you sure?",
                text: "Delete",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "GET",
                        url: "Traningprovider/deletedata?table=" + tablename + "&behalf=" + columnname + "&data=" + id,
                        success: function(data) {
                            swal("Deleted!", "Record Delete Successfully.", "success");
                            $("#del-" + id).remove();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal("Error deleting!", "Please try again", "error");
                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
    }
</script>



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
            var employer_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var employer_contact_number = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var employer_contact_email = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var employer_province = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var employer_district = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var employer_city = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            var municipality = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
            var employer_Suburb = $(event.relatedTarget).closest("tr").find("td:eq(8)").text();
            var employer_Street_name = $(event.relatedTarget).closest("tr").find("td:eq(9)").text();
            var employer_Street_number = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
            var contact_person_name = $(event.relatedTarget).closest("tr").find("td:eq(11)").text();
            var contact_person_surname = $(event.relatedTarget).closest("tr").find("td:eq(12)").text();
            var contact_person_contact_no = $(event.relatedTarget).closest("tr").find("td:eq(13)").text();


            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Employe Name :  </span><span class='pull-right'>" + employer_name +
                "</div><div class=col-sm-12><span class='pull-left'>Employer Contact Number: </span><span class='pull-right'> " + employer_contact_number +
                "</div><div class=col-sm-12><span class='pull-left'> Employer Contact Email: </span><span class='pull-right'> " + employer_contact_email +
                "</div><div class=col-sm-12><span class='pull-left'>Employer Province :  </span><span class='pull-right'>" + employer_province +
                "</div><div class=col-sm-12><span class='pull-left'>Employer District :  </span><span class='pull-right'>" + employer_district +
                "</div><div class=col-sm-12><span class='pull-left'>Employer City: </span><span class='pull-right'> " + employer_city +
                "</div><div class=col-sm-12><span class='pull-left'>Employer Municipality : </span><span class='pull-right'> " + municipality +
                "</div><div class=col-sm-12><span class='pull-left'>Employer Suburb :  </span><span class='pull-right'>" + employer_Suburb +
                "</div><div class=col-sm-12><span class='pull-left'>Employer Street Name : </span><span class='pull-right'> " + employer_Street_name +
                "</div><div class=col-sm-12><span class='pull-left'>Employer Street Number :  </span><span class='pull-right'>" + employer_Street_number +
                "</div><div class=col-sm-12><span class='pull-left'>Contact person Name  : </span><span class='pull-right'> " + contact_person_name +
                "</div><div class=col-sm-12><span class='pull-left'>Contact person SurName : </span><span class='pull-right'> " + contact_person_surname +
                "</div><div class=col-sm-12><span class='pull-left'>Contact person Contact Number: </span><span class='pull-right'> " + contact_person_contact_no +
                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>