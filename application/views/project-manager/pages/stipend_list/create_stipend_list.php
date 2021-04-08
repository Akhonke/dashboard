<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Stipends List</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>S No.</th>

                                        <th>Learner Name</th>

                                        <th>Learner Surname</th>

                                        <th>I.D Number</th>

                                        <th>Learnership Type</th>

                                        <th>Learnership Sub Type</th>
                                        <th>Class</th>
                                        <th>Bank Name</th>
                                        <th> Bank Branch Name </th>
                                        <th>Account Type</th>
                                        <th>Branch Code</th>
                                        <th>Account Number</th>
                                        <th> Number of days attended</th>
                                        <th>Total to be paid</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    if (!empty($stipend)) {

                                        $i = 1;

                                        foreach ($stipend as $key => $row) {

                                            $learnership = $this->common->accessrecord('learnership', [], ['id' => $row['learnship_id']], 'row');
                                            if (!empty($learnership)) {
                                                $learnership_name = $learnership->name;
                                            } else {
                                                $learnership_name = '';
                                            }

                                            $sublearnership = $this->common->accessrecord('learnership_sub_type', [], ['id' => $row['learnership_subtype']], 'row');
                                            if (!empty($sublearnership)) {
                                                $sublearnership_name = $sublearnership->sub_type;
                                            } else {
                                                $sublearnership_name = '';
                                            }

                                            $bank = $this->common->accessrecord('bank', [], ['id' => $row['bank_name']], 'row');
                                            if (!empty($bank)) {
                                                $bank_name = $bank->bank_name;
                                            } else {
                                                $bank_name = '';
                                            }
                                    ?>

                                            <tr>

                                                <td><?= $i; ?></td>

                                                <td class="2"><?= $row['learner_name']; ?></td>

                                                <td class="3"><?= $row['learner_surname']; ?></td>

                                                <td class="4"><?= $row['id_number']; ?></td>

                                                <td class="5"><?= $learnership_name ?></td>

                                                <td class="6"><?= $sublearnership_name ?></td>

                                                <td class="7"><?= $row['class']; ?></td>

                                                <td class="8"><?= $row['bank_name'] ?></td>

                                                <td class="9"><?= $row['bank_branch_name']; ?></td>

                                                <td class="10"><?= $row['account_type']; ?></td>

                                                <td class="11"><?= $row['branch_code']; ?></td>

                                                <td class="12"><?= $row['account_number']; ?></td>

                                                <td class="13"><?= $row['total_attendence']; ?></td>

                                                <td class="14"><?= $row['amount']; ?></td>

                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row['id'] ?>" data-name="<?= $row['id'] ?>" onclick="view(<?= $row['id']; ?>)" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <!-- Modal -->
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
                                                    <a href="projectmanager-create_new_stipend?id=<?= $row['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                    <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deleterecord('stipend&behalf','id',<?= $row['id'] ?>)"><i class="fa fa-trash"></i></a>

                                                    <?php $tablenm_id = 'stipend' . '.' . $row['id'];

                                                    ?>





                                                </td>

                                            </tr>

                                    <?php $i++;
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

            var learner_name = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var learner_surname = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var id_number = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var learnership_name = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var sublearnership_name = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var stipendclass = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            var bank_name = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();
            var bank_branch_name = $(event.relatedTarget).closest("tr").find("td:eq(8)").text();
            var account_type = $(event.relatedTarget).closest("tr").find("td:eq(9)").text();
            var branch_code = $(event.relatedTarget).closest("tr").find("td:eq(10)").text();
            var account_number = $(event.relatedTarget).closest("tr").find("td:eq(11)").text();
            var total_attendence = $(event.relatedTarget).closest("tr").find("td:eq(12)").text();
            var amount = $(event.relatedTarget).closest("tr").find("td:eq(13)").text();



            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Learner Name: </span><span class='pull-right'>" + learner_name +
                "</div><div class=col-sm-12><span class='pull-left'>Learner Surname:</span><span class='pull-right'> " + learner_surname +
                "</div><div class=col-sm-12><span class='pull-left'>ID Number:</span><span class='pull-right'> " + id_number +
                "</div><div class=col-sm-12><span class='pull-left'>learnership name  :</span><span class='pull-right'> " + learnership_name +
                "</div><div class=col-sm-12><span class='pull-left'>Sublearnership Name:</span><span class='pull-right'> " + sublearnership_name +
                "</div><div class=col-sm-12><span class='pull-left'>Class: </span><span class='pull-right'>" + stipendclass +
                "</div><div class=col-sm-12><span class='pull-left'>Bank name: </span><span class='pull-right'>" + bank_name +
                "</div><div class=col-sm-12><span class='pull-left'>bank branch name  : </span><span class='pull-right'>" + bank_branch_name +
                "</div><div class=col-sm-12><span class='pull-left'>account type: </span><span class='pull-right'>" + account_type +
                "</div><div class=col-sm-12><span class='pull-left'>branch code : </span><span class='pull-right'>" + branch_code +
                "</div><div class=col-sm-12><span class='pull-left'>account number: </span><span class='pull-right'>" + account_number +
                "</div><div class=col-sm-12><span class='pull-left'>total attendence : </span><span class='pull-right'>" + total_attendence +
                "</div><div class=col-sm-12><span class='pull-left'>Amount:</span><span class='pull-right'> " + amount +
                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>