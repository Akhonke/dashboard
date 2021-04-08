<style type="text/css">
   
label{
    border: 0;
    margin-bottom: 3px;
    display: block;
    width: 100%;
  }
  input {
    @include box-sizing(border-box);
  }
  .error {
    color: red;
  }



</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Add New Learnship</h3>

                    </div>

                    <div class="card-body">

                        <form class="form-horizontal" method="post" id="learnshipform">
                            <div class="form-group row">
                                <div class="col-md-6">

                                    <label class="form-control-label">Learnership Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Learnership Type Name" class="form-control" id="name" name="name" value="<?php if(isset($learn)){echo $learn->name; }else{ if(isset($_POST['name'])){echo set_value('name'); }} ?>">
                                    <span class='error_validate' style='color:red;'><?= form_error('name') ?></span>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">SAQA Registration ID<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter SAQA Registration ID" class="form-control" name="saqa_registration_id" id="saqa_registration_id" value="<?php if(isset($learn)){echo $learn->saqa_registration_id; }else{ if(isset($_POST['saqa_registration_id'])){echo set_value('saqa_registration_id'); }} ?>">
                                    <span class='error_validate' style='color:red;'><?= form_error('saqa_registration_id') ?></span>
                                </div>
                            </div>

                            <div class="line"></div>

                            <div class="form-group row">

                                <div class="col-md-12">

                                    <div class="text-center">
                                        <?= (isset($learn)) ? '<button type="submit" class="btn btn-primary">Update</button>' : '<button type="submit" class="btn btn-primary">Add</button>'; ?>
                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<script type="text/javascript">
   
$(function() {
  
  $("#learnshipform").validate({
    rules: {
      name: "required",
      saqa_registration_id: { required: true }
    },
    messages: {
      title: "Please enter your title",
      saqa_registration_id: {
        required: "Please enter your saqa registration id"
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>