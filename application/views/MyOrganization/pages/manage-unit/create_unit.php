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



                        <h3 class="h6 text-uppercase mb-0">Add New Unit</h3>



                    </div>



                    <div class="card-body">



                        <form class="form-horizontal" method="post" id="unitform">

                            <div class="form-group row">

                                <div class="col-md-6">



                                    <label class="form-control-label">Title<span style="color:red;font-weight:bold;"> *</span></label>



                                    <input type="text" placeholder="Enter Your Unit Title" class="form-control" id="title" name="title" value="<?= (isset($units)) ? $units->title : ''; ?>">

                                    <span class='error_validate' style='color:red;'><?= form_error('title') ?></span>

                                </div>



                                <div class="col-md-6">



                                    <label class="form-control-label">Standard Id<span style="color:red;font-weight:bold;"> *</span></label>



                                    <input type="number" placeholder="Enter Your Standard Id" class="form-control" name="standard_id" id="standard_id" value="<?= (isset($units)) ? $units->standard_id : ''; ?>" onkeypress="this.value=this.value.replace(/[^0-9]/g,'')">

                                    <span class='error_validate' style='color:red;'><?= form_error('standard_id') ?></span>

                                </div>



                                <div class="col-md-6">



                                    <label class="form-control-label">Credit<span style="color:red;font-weight:bold;"> *</span></label>



                                    <input type="number" placeholder="Enter Your Cradit" class="form-control" name="total_credits" id="total_credits" value="<?= (isset($units)) ? $units->total_credits : ''; ?>" onkeypress="this.value=this.value.replace(/[^0-9]/g,'')">

                                    <span class='error_validate' style='color:red;'><?= form_error('total_credits') ?></span>

                                </div>

                                <div class="col-md-6">



                                    <label class="form-control-label">Unit Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <select class="form-control" name="unit_standard_type">

                                      <?php if(empty($_GET['id'])){ ?>

                                        <option value=""  hidden >Select Unit Type</option>

                                      <?php } ?>

                                        <option value="core" <?php if(isset($units)&&$units->unit_standard_type=='core'){ echo 'selected'; } ?>>Core</option>

                                        <option value="fundamental" <?php if(isset($units)&&$units->unit_standard_type=='fundamental'){ echo 'selected'; } ?>>Fundamental</option>

                                        <option value="elective" <?php if(isset($units)&&$units->unit_standard_type=='elective'){ echo 'selected'; } ?>>Elective</option>

                                    </select>

                                     <label id="unit_standard_type-error" class="error" for="unit_standard_type"></label>

                                      <span class='error_validate' style='color:red;'><?= form_error('unit_standard_type') ?></span>

                                </div>

                              



                            </div>



                            <div class="line"></div>



                            <div class="form-group row">



                                <div class="col-md-12">



                                    <div class="text-center">

                                        <?= (isset($units)) ? '<button type="submit" class="btn btn-primary">Update</button>' : '<button type="submit" class="btn btn-primary">Add</button>'; ?>

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

  

  $("#unitform").validate({

    rules: {

      title: "required",

      standard_id: {

        required: true,

        minlength: 5

      },

       total_credits: {

        required: true,

      },

      unit_standard_type: {

        required: true,

      }

    },

    messages: {

      title: "Please enter your title",

      standard_id: {

        required: "Please enter your standard id",

        minlength: "Your standerd id must be at least 5 characters long"

      },

      total_credits: {

        required: "Please enter your total credits"

      },

      unit_standard_type: {

        required: "Please choose your unit standerd type"

      }

    },

    submitHandler: function(form) {

      form.submit();

    }

  });

});

</script>













