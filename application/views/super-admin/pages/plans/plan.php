<div class="col-md-12">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb pl-0">
         <li class="breadcrumb-item"><a href="<?=base_url('superAdmin-dashboard')?>"><i class="material-icons">home</i> Home</a></li>
         <li class="breadcrumb-item active" aria-current="page">Plan List</li>
      </ol>
   </nav>
   <div class="ms-panel">
      <div class="ms-panel-header ms-panel-custome">
         <h6> Plans List</h6>
         <?php if ($this->session->flashdata('success')) { ?>
         <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
         </div>
         <?php }?>
      </div>
      <div class="ms-panel-body">
       
         <section id="pricing" class="pricing-section ptb-100 gray-light-bg">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-md-9 col-lg-8">
                     <div class="section-heading text-center mb-4">
                        <h2>Flexible Subscription Options</h2>
                     </div>
                  </div>
               </div>
               <table class="table-hover table-bordered" style="padding-left:200px; padding-right:200px;">
                  <thead>
                     <tr class="active">
                        <th>
                           <h3>Features</h3>
                        </th>
                        <?php foreach ($plan as $planvalue) { ?> 
                        <th style="background:<?php  echo $planvalue->name_color; ?>;">
                           <center>
                              <h3 style="color: #fff !important; "> <?php  echo $planvalue->name; ?></h3>
                           </center>
                        </th>
                       <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <h3>Price</h3>
                        </td>
                        <?php foreach ($plan as $planvalue) { ?> 
                        <td style="background:<?php  echo $planvalue->name_color; ?>;">
                           <center>
                              <h3 style="color: #fff !important;" class="panel-title price"><?php if($planvalue->price==0)  echo "Free";  else echo $planvalue->price; ?> </h3>
                           </center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>FREE E-LEARNING PORTAL</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("FREE E-LEARNING PORTAL", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Learnership Project Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Learnership Project Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Advanced Reporting and Analytics</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Advanced Reporting and Analytics", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Qualification Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Qualification Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>SMS and Email Sending</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("SMS and Email Sending", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Class Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Class Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Learner List Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Learner List Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Stipend Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Stipend Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Attendance Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Attendance Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Facilitator and Moderator Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Facilitator and Moderator Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Drop Out Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Drop Out Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td id="registration">Learner Performance Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Learner Performance Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Host employer Management</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Host employer Management", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Quarterly report Compilation</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Quarterly report Compilation", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Financial Management (including Stipends)</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <?php  $arrayfeatures = explode("%@#$",$planvalue->feature); ?> 
                        <td>
                           <center><i class='<?php if (in_array("Financial Management (including Stipends)", $arrayfeatures)) echo "fas fa-check fa-lg"; else echo "fas fa-times fa-lg"; ?>' style="color:limegreen"></i></center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td>Manage Multiple Projects (Training Projects)</td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <td>
                           <center><i  style="color:limegreen"> <?php  if($planvalue->manage_project_value==0) echo "UNLIMITED"; else echo $planvalue->manage_project_value; ?></i> </center>
                        </td>
                        <?php } ?>
                     </tr>
                     <tr>
                        <td></td>
                        <?php foreach ($plan as $planvalue) { ?>
                        <td>
                           <center><a href="<?php echo base_url('superAdmin-editPlan/').$planvalue->id; ?>"  class="btn btn-brand-02 btn-rounded mb-3" style="margin-top:10px;font-size: 16px !important; margin-bottom:10px;background-color: <?php  echo $planvalue->name_color; ?>;box-shadow:0 4px 12px #1ebdd29c;" onclick="Package('<?php  echo $planvalue->name; ?>','<?php  echo $planvalue->id; ?>')">Edit</a></center>
                        </td>
                        <?php } ?>
                     </tr>   
                  </tbody>
               </table>
            </div>
         </section>
      </div>
   </div>
</div>