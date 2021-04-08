<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Training Providers Quarterly Report</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Training Provider Name</th>
                                        <th>Training Provider Surname</th>
                                        <th>Company</th>
                                        <th>Total Report</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    if (!empty($training)) {
                                        foreach ($training as $key => $value) {

                                            $i++;
                                    ?>
                                            <tr id="del-<?= $value->id ?>" class="filters">
                                                <td><?= $i ?></td>
                                                <td><?= $value->full_name ?></td>
                                                <td><?= $value->surname ?></td>
                                                <td><?= $value->company_name ?></td>
                                                <td><i style="margin: 0 20px 0 10px">
                                                    </i>
                                                    <?php
                                                    if (!empty($value->total_report)) {
                                                    ?>
                                                        <a href="Provider-Created-Quaterly-Report-list?id=<?= $value->id ?>" class="btn btn-info btn-sm">View</a>
                                                    <?php
                                                    } else {?>
                                                    <p style="color: red;">No Data Available...</p>
                                                <?php         
                                                    }
                                                    ?>
                                                </td>
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
                                    <?php
                                        }
                                    }
                                    ?>
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
            var company_name = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();

            // var landline = $(event.relatedTarget).closest("tr").find("td:eq(16)").text(); 




            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12> <span class='pull-left'>Full Name : </span><span class='pull-right'> " + full_name +
                "</div><div class=col-sm-12> <span class='pull-left'>Surname :</span><span class='pull-right'> " + surname +
                "</div><div class=col-sm-12> <span class='pull-left'>Company Name : </span><span class='pull-right'>" + company_name +



                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>