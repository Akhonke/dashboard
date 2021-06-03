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



                        <h3 class="h6 text-uppercase mb-0">create Unit Standard</h3>



                    </div>



                    <div class="card-body">



                        <form class="form-horizontal" method="post" id="unitform">

                            <div class="form-group row">

                                <div class="col-md-6">



                                    <label class="form-control-label">Unit Standard Name<span style="color:red;font-weight:bold;"> *</span></label>



                                    <input type="text" placeholder="Enter unit title" class="form-control" id="title" name="title" value="<?= (isset($units)) ? $units->title : ''; ?>">

                                    <span class='error_validate' style='color:red;'><?= form_error('title') ?></span>

                                </div>



                                <div class="col-md-6">



                                    <label class="form-control-label">Unit Standard Id<span style="color:red;font-weight:bold;"> *</span></label>



                                    <input type="text" placeholder="Enter Standard Id" class="form-control" name="standard_id" id="standard_id" value="<?= (isset($units)) ? $units->standard_id : ''; ?>" onkeypress="this.value=this.value.replace(/[^0-9]/g,'')">

                                    <span class='error_validate' style='color:red;'><?= form_error('standard_id') ?></span>

                                </div>



                                <div class="col-md-6">



                                    <label class="form-control-label">Number of Credits<span style="color:red;font-weight:bold;"> *</span></label>



                                    <input type="number" placeholder="Enter Credits" class="form-control" name="total_credits" id="total_credits" value="<?= (isset($units)) ? $units->total_credits : ''; ?>" onkeypress="this.value=this.value.replace(/[^0-9]/g,'')">

                                    <span class='error_validate' style='color:red;'><?= form_error('total_credits') ?></span>

                                </div>

                                <div class="col-md-6">



                                    <label class="form-control-label">Unit Standard Type<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Unit Standard Type" class="form-control" name="unit_standard_type" id="unit_standard_type" value="<?= (isset($units)) ? $units->unit_standard_type : ''; ?>" >

                                   
                                    <span class='error_validate' style='color:red;'><?= form_error('unit_standard_type') ?></span>

                                    <label id="unit_standard_type-error" class="error" for="unit_standard_type"></label>

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

        required: true

      },

      unit_standard_type:{

        required:true

      },

    },

    messages: {

      title: "Please enter your Unit Standard Name",

      standard_id: {

        required: "Please enter your standard id",

        minlength: "Your standerd id must be at least 5 characters long"

      },

      total_credits: {

        required: "Please enter your total credits"

      },

      unit_standard_type:{

        required: "Please choose your unit type"

      },

    },

    submitHandler: function(form) {

      form.submit();

    }

  });

});

</script>













