<style type="text/css">
  .container {
    display: initial;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default checkbox */
  .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }

  /* Create a custom checkbox */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
  }

  /* On mouse-over, add a grey background color */
  .container:hover input~.checkmark {
    background-color: #ccc;
  }

  /* When the checkbox is checked, add a blue background */
  .container input:checked~.checkmark {
    background-color: #2196F3;
  }

  /* Create the checkmark/indicator (hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the checkmark when checked */
  .container input:checked~.checkmark:after {
    display: block;
  }

  /* Style the checkmark/indicator */
  .container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  }
</style>
<div class="container-fluid px-xl-5">
  <section class="py-5">
    <div class="row">
      <!-- Form Elements -->
      <div class="col-lg-12 mb-1">
        <div class="card">
          <?php if (!empty($_GET['id'])) {
            $name = 'Update';
          } else {
            $name = "Add";
          } ?>
          <div class="card-header">
            <h3 class="h6 text-uppercase mb-0"><?= $name ?> User</h3>
          </div>
          <?php
          // ECHO '<pre>';print_r($_SESSION);
          if ((!empty($this->session->flashdata('error'))) && ($this->session->flashdata('error') != 'error')) { ?>
            <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
          <?php } ?>
          <div class="card-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="">
              <!-- <div class="line"></div> -->
              <div class="form-group row">
                <div class="col-md-6">
                  <label class="form-control-label">User First Name </label>
                  <input type="text" placeholder="Enter Your First Name" name="first_name" class="form-control " value="<?= (isset($record)) ? $record->first_name : ''; ?>" id="first_name">
                </div>
                <div class="col-md-6">
                  <label class="form-control-label">User Second Name</label>
                  <input type="text" placeholder="Enter Your Second Name" name="second_name" class="form-control second_name" value="<?= (isset($record)) ? $record->second_name : ''; ?>" id="second_name">

                </div>
                <div class="col-md-6">
                  <label class="form-control-label">Designation</label>
                  <input type="text" placeholder="Enter  Designation Title" name="designation" class="form-control designation" value="<?= (isset($record)) ? $record->designation : ''; ?>" id="designation">
                </div>

                <div class="col-md-6">
                  <span style="position: absolute;top:45px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                  <label class="form-control-label">Mobile Number</label>
                  <input type="text" placeholder="Enter Mobile Number" class="form-control mobile" name="mobile" value="<?= (isset($record)) ? $record->mobile : ''; ?>" id="mobile" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Primary cellphone number 9 digit with 0-9">
                  <label id="mobile-error" class="error" for="mobile"></label>

                </div>

                <div class="col-md-6">
                  <label class="form-control-label">Email</label>
                  <input type="text" placeholder="Enter Email" name="email" class="form-control " value="<?= (isset($record)) ? $record->email : ''; ?>" id="email">

                </div>
                <div class="col-md-6">
                  <label class="form-control-label">Password</label>
                  <input type="password" placeholder="Enter Password" name="password" class="form-control " value="<?= (isset($record)) ? base64_decode($record->password) : ''; ?>" id="password">
                </div>
              </div>

              <div class="line"></div>
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><?= $name ?></button>
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

</script>