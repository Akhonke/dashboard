
                    <div class="card-body">
                    <?php
                                 foreach ($project as $key => $row) {
                                $district = $this->common->accessrecord('district',[],['id'=>$row['district']],'row');
                                // print_r($district);die;

                                if((!empty($district->name)) ){

                                $district_name = $district->name;

                                }else{

                                    $district_name = "";  

                                }

                                $region = $this->common->accessrecord('region',[],['id'=>$row['region']],'row');

                                if((!empty($region->region)) ){

                                $region_name = $region->region;

                                }else{

                                    $region_name = "";  

                                }

                                $city = $this->common->accessrecord('city',[],['id'=>$row['city']],'row');

                                if((!empty($city->city)) ){

                                $city_name = $city->city;

                                }else{

                                    $city_name = "";  

                                }


                            ?>

                            <?php }?>

                        <ul>
                            <li><b>Project Name</b>:- <?= $row['project_name']; ?></li>
                            <li><b>Project Type</b>  :- <?= $row['project_type']; ?></li>
                            <li><b>Province</b> :- <?= $row['province']; ?></li>
                            <li><b>District</b> :- <?= $district_name ?></li>
                            <li><b>Region</b> :- <?= $region_name; ?></li>
                            <li><b>City</b> :- <?= $city_name; ?></li>
                            <li><b>Planned Project Start Date</b> :- <?=date("d-m-Y", strtotime($row['planned_start_date']) ) ; ?></li>
                            <li><b>Actual Project Start Date</b> :- <?= date("d-m-Y", strtotime($row['actual_start_date'])); ?></li>
                            <li><b>Planned Project End Date</b> :- <?= date("d-m-Y", strtotime($row['planned_end_date'])); ?></li>
                            <li><b>Actual Project End Date</b> :- <?= date("d-m-Y", strtotime($row['actual_end_date'])); ?></li>
                            <li><b>Project Owner Fullname</b> :- <?= $row['project_owner_name']; ?></li>
                            <li><b>Project Owner Surname</b> :- <?= $row['project_owner_surname']; ?></li>
                            <li><b>Project Owner Email</b> :- <?= $row['project_owner_email']; ?></li>
                            <li><b>Project Owner Mobile</b> :- <?= $row['project_owner_mobile']; ?></li>
                            <li><b>Project Owner Landline</b> :- <?= $row['project_owner_landline']; ?></li>
                            <li><b>Project Owner ID</b> :- <?= $row['project_owner_id_number']; ?></li>
                            <li><b>Project Owner Gender</b> :- <?= $row['project_owner_gender']; ?></li>
                            <li><b>Project Owner Date of Birth</b> :- <?= $row['project_owner_dob']; ?></li>
                            <li><b>Pre Implementation Planned Start Date</b> :- <?= date("d-m-Y", strtotime($row['pre_implement_planned_start_date'])); ?></li>
                            <li><b>Pre Implementation Actual Start Date</b> :- <?= date("d-m-Y", strtotime($row['pre_implement_actual_start_date'])); ?></li>
                            <li><b>Pre Implementation Planned End Date</b> :- <?= date("d-m-Y", strtotime($row['pre_implement_planned_end_date'])); ?></li>
                            <li><b>Pre Implementation Actual End Date</b> :- <?= date("d-m-Y", strtotime($row['pre_implement_actual_end_date'])); ?></li>
                            <li><b>Implementation Planned Start Date</b> :- <?= date("d-m-Y", strtotime($row['implement_planned_start_date'])); ?></li>
                            <li><b>Implementation Actual Start Date</b> :- <?= date("d-m-Y", strtotime($row['implement_actual_start_date'])); ?></li>
                            <li><b>Implementation Planned End Date</b> :- <?= date("d-m-Y", strtotime($row['implement_planned_end_date'])); ?></li>
                            <li><b>Implementation Actual End Date</b> :- <?= date("d-m-Y", strtotime($row['implement_actual_end_date'])); ?></li>
                            <li><b>Closeout Planned Start Date</b> :- <?= date("d-m-Y", strtotime($row['closeout_planned_start_date'])); ?></li>
                            <li><b>Closeout Actual Start Date</b> :- <?= date("d-m-Y", strtotime($row['closeout_actual_start_date'])); ?></li>
                            <li><b>Closeout Planned End Date</b> :- <?= date("d-m-Y", strtotime($row['closeout_planned_end_date'])); ?></li>
                            <li><b>Closeout Actual End Date</b> :- <?= date("d-m-Y", strtotime($row['closeout_actual_end_date'])); ?></li>
                           
                        </ul>
                    </div>
               