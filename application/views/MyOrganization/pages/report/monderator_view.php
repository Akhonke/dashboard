<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Monderators View</h3>

                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered table-responsive" style="width:100%">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Training Provider</th>

                                    <th>Full Name</th>

                                    <th>Surname</th>

                                    <th>Email</th>

                                    <th>Mobile Number</th>

                                    <th>Landline Number</th>

                                    <th>ID Number</th>

                                    <th>Province</th>

                                    <th>District</th>

                                    <th>Region</th>

                                    <th>City</th>

                                    <th>Suburb</th>

                                    <th>Street Name</th>

                                    <th>Street Number</th>

                                    <th>Acreditations Files</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as  $value) {

                                            foreach ($value as $row) {

                                            $trainer =$this->common->accessrecord('trainer', [], ['id'=>$row->trainer_id], 'row');

                                        if(!empty($trainer)){

                                            $trainer_nm = $trainer->company_name;

                                        }else{

                                          $trainer_nm = "";

                                        }

                                         ?>

                                        <tr>

                                            <td><?= $i; ?></td>

                                            <td><?= $trainer_nm; ?></td>

                                            <td><?= $row->fullname; ?></td>

                                            <td><?= $row->surname; ?></td>

                                            <td><?= $row->email; ?></td>

                                            <td><?= '+27-'.$row->mobile; ?></td>

                                            <td><?= '+27-'.$row->landline; ?></td>

                                            <td><?= $row->id_number; ?></td>

                                            <td><?= $row->province; ?></td>

                                            <td><?= $row->district; ?></td>

                                            <td><?= $row->region; ?></td>

                                            <td><?= $row->city; ?></td>

                                            <td><?= $row->Suburb; ?></td>

                                            <td><?= $row->Street_name; ?></td>

                                            <td><?= $row->Street_number; ?></td>

                                            <td>

                                            <?php if(!empty($row->acreditations_file)){

                                                $acreditations_file = unserialize($row->acreditations_file); 

                                                if(!empty($acreditations_file)) {  

                                                   foreach($acreditations_file as $value){

                                            ?> 

                                            <div class="text-center" style="display:inline-block; margin:0 5px; border:1px solid #000;padding:5px"><?= $value['acreditations'] ?><br>

                                                <img src="<?= BASEURL.'uploads/moderator/acreditationsfiles/'.$value['acreditations_file'] ?>" width="50px"></div>

                                            <?php } }

                                            } 

                                            ?>

                                            </td>

                                        </tr>

                                            

                                <?php $i++; } }

                                } ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>