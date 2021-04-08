<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                         
                     <h3 class="h6 text-uppercase mb-0">Add New Projects</h3>
                    </div>
                                       
                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateOrganisationForm" novalidate="novalidate">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Project Name </label>
                                    <input type="text" placeholder="Enter Your Project Name" name="" class="form-control organisation_name error" value="" id="" aria-invalid="true"><label id="organisation_name-error" class="error" for="">Please enter your organisation name</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Full Name</label>
                                    <input type="text" placeholder="Enter Your Full Name" name="fullname" class="form-control fullname error" value="" id="fullname"><label id="fullname-error" class="error" for="fullname">Please enter your fullname name</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Surname</label>
                                    <input type="text" placeholder="Enter Your Surname" name="surname" class="form-control surname error" value="" id="surname"><label id="surname-error" class="error" for="surname">Please enter your surname name</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Email </label>
                                    <input type="text" placeholder="Enter Your Email" name="email_address" class="form-control error" value=""><label id="email_address-error" class="error" for="email_address">Please enter a valid email address</label>
                                </div>
                               
                                 <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Landline Number</label>
                                    <input type="text" placeholder="Enter Your Landline Number" name="landline_number" class="form-control error" value="" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Landline number 9 digit with 0-9"><label id="landline_number-error" class="error" for="landline_number">Please enter your mobile number</label>
                                </div>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Mobile Number</label>
                                    <input type="text" placeholder="Enter Your Mobile Number" name="mobile_number" class="form-control error" value="" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Mobile number 9 digit with 0-9"><label id="mobile_number-error" class="error" for="mobile_number">Please enter your mobile number</label>
                                </div>
                                 <div class="col-md-6">
                                    <label class="form-control-label">Province</label>
                                    <select class="form-control province error" name="province">
                                        <option label="Choose Your Province"></option>
                                                                                <option value="Mpumalanga">Mpumalanga                                        </option>
                                                                                <option value="Gauteng">Gauteng                                        </option>
                                         
                                    </select>
                                    <label id="province-error" class="error" for="province">Please select your province name</label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">District</label>
                                       <select class="form-control district_option error" name="district">
                                                                                           <option label="Select Your District"></option>
                                                                                   </select>
                                    <label id="district-error" class="error" for="district">Please select your district</label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Region</label>
                                      <select class="form-control error" id="region" name="region">
                                                                                <option label="Select Your Region"></option>
                                                                         </select>
                                    <label id="region-error" class="error" for="region">Please select your region</label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">City</label>
                                    <select class="form-control error" name="city" id="city">
                                       
                                                                                           <option label="Select Your City"></option>
                                                                                    </select>
                                    <label id="city-error" class="error" for="city">Please select your city</label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Suburb</label>
                                    <input type="text" placeholder="Enter Your Suburb" class="form-control error" name="Suburb" value="">
                                    <label id="Suburb-error" class="error" for="Suburb">Please enter your Suburb</label>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Street name</label>
                                    <input type="text" placeholder="Enter Your Street Name" class="form-control error" name="Street_name" value="">
                                    <label id="Street_name-error" class="error" for="Street_name">Please enter your street name</label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Street Number</label>
                                    <input type="text" placeholder="Enter Your Street Number" class="form-control error" name="Street_number" value="">
                                    <label id="Street_number-error" class="error" for="Street_number">Please enter your street number</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Password</label>
                                    <input type="password" placeholder="Enter Your Password" class="form-control password error" name="password" value="" id="password">
                                    <label id="password-error" class="error" for="password">Please enter your password</label>
                                </div>
                              <input type="hidden" name="created_by" value="1">
                            </div>
                            <div class="line"></div>
                            <div class="form-group row" id="assessorfield">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Add</button>
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