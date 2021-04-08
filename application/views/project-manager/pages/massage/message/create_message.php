<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Message</h3>

                    </div>

                    <div class="card-body">
                    <style>

.myaccount-tab-menu {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
}
.address_details p {
    margin: 0;
}
.address_details {
    box-shadow: 0 4px 12px #0000004d;
    background: #ffff;
    padding: 10px;
}
.myaccount-tab-menu a:hover, .myaccount-tab-menu a.active {
    background-color: #20bcd5!important;
    border-color: #20bcd5;
    color: #fff;
}
.myaccount-tab-menu a {
    border: 1px solid #efefef;
    border-bottom: none;
    color: #222222;
    font-weight: 400;
    font-size: 15px;
    display: block;
    padding: 17px 15px;
    text-transform: capitalize;
}
.myaccount-tab-menu a i.fa {
    font-size: 14px;
    text-align: center;
    width: 25px;
}
.tab-content .tab-pane.active {
    height: auto;
    opacity: 1;
    overflow: visible;
    visibility: visible;
}
.tab-content .tab-pane {
    display: block;
    height: 0;
    max-width: 100%;
    opacity: 0;
    overflow: hidden;
    visibility: hidden;
}
.myaccount-table table th, .myaccount-table .table th {
    color: #222222;
    padding: 10px;
    font-weight: 400;
    background-color: #f8f8f8;
    border-color: #ccc;
    border-bottom: 0;
}
.myaccount-content form {
    margin-top: -20px;
}
.single-input-item {
    margin-top: 20px;
}
.single-input-item label {
    color: #222222;
    text-transform: capitalize;
    font-size: 14px;
}
.single-input-item label.required:after {
    content: '*';
    color: red;
    font-size: 14px;
    margin-left: 3px;
    margin-top: 5px;
}
.single-input-item input, .single-input-item textarea {
    color: #555555;
    border: 1px solid #ccc;
    padding: 12px 10px;
    width: 100%;
    font-size: 14px;
    background: #f7f7f7;
}
.btn-sqr {
    color: #fff;
    font-size: 12px;
    border-radius: 0;
    background-color: #fa5807;
    padding: 5px 15px;
    border-radius: 30px;
    margin-top: 15px;
}
.myaccount-table table td, .myaccount-table .table td {
    padding: 10px;
    vertical-align: middle;
    border-color: #ccc;
}
.myaccount-table {
    white-space: nowrap;
    font-size: 14px;
}
.myaccount-content {
    border: 1px solid #eeeeee;
    padding: 30px;
}
.myaccount-content h5 {
    border-bottom: 1px dashed #ccc;
    padding-bottom: 10px;
    margin-bottom: 25px;
}
.myaccount-content .welcome a {
    color: #222222;
}
</style>


<div class="my-account-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-envelope" aria-hidden="true"></i>
                                                Compose</a>
                                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                            Inbox</a>
                                            <a href="#download" data-toggle="tab"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            Sent</a>
                                            
                                            <a href="#address-edit" data-toggle="tab"><i class="fa fa-bell" aria-hidden="true"></i>
                                                Important</a>
                                            <a href="#account-info" data-toggle="tab"><i class="fa fa-trash" aria-hidden="true"></i>Trash</a>
                                         
                                        </div>
                                    </div>
                              <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active in" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Write Message</h5>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label class="form-control-label">Role<span style="color:red;font-weight:bold;"> *</span></label>
                                                            <select class="form-control" id="" name="">
                                                                <option  value="" hidden>Select Your Role</option>
                                                            </select>
                                                            <label id="Role-error" class="error" for="role"></label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-control-label">Reciver<span style="color:red;font-weight:bold;"> *</span></label>
                                                            <select class="form-control" id="" name="">
                                                                <option  value="" hidden>Select Your Reciver</option>
                                                            </select>
                                                            <label id="Role-error" class="error" for="role"></label>
                                                        </div>  
                                                        <div class="col-md-6">
                                                            <label class="form-control-label">Subject<span style="color:red;font-weight:bold;"> *</span></label>
                                                            <input type="text" placeholder="Enter Your Subject" class="form-control" value="" id="" name="">
                                                            <label id="" class="error" for=""></label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-control-label">Attachment File</label>
                                                            <input type="file" name="" class="form-control">
                                                        </div>   
                                                        
                                                            <div class="col-md-12">
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        
                                                   </div>
                                                   
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Inbox</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Sender</th>
                                                                    <th>Subject</th>
                                                                    <th>Message</th>
                                                                    <th>Time</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>  Danielle Solomon</td>
                                                                    <td> Enquiries</td>
                                                                    <td>	Please sir i need little cash</td>
                                                                    <td>    	01.Sep.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>  Danielle Solomon</td>
                                                                    <td> Enquiries</td>
                                                                    <td>	Please sir i need little cash</td>
                                                                    <td>    	01.Sep.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>  Danielle Solomon</td>
                                                                    <td> Enquiries</td>
                                                                    <td>	Please sir i need little cash</td>
                                                                    <td>    	01.Sep.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="download" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5> Sent</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                <th>Receiver</th>
                                                                    <th>Subjects</th>
                                                                    <th>Message</th>
                                                                    <th>Time</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Important</h5>
                                                    <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                <th>#</th>
                                                                <th>Type</th>
                                                                    <th>Sender / Receiver	</th>
                                                                    <th>Subjects</th>
                                                                    <th>Message</th>
                                                                    <th>Time</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td><i class="fa fa-paper-plane" aria-hidden="true"></i></td>
                                                                    <td>Danielle Solomon	</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>6.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td><i class="fa fa-paper-plane" aria-hidden="true"></i></td>
                                                                    <td>Danielle Solomon	</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>6.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td><i class="fa fa-paper-plane" aria-hidden="true"></i></td>
                                                                    <td>Danielle Solomon	</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>6.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td><i class="fa fa-paper-plane" aria-hidden="true"></i></td>
                                                                    <td>Danielle Solomon	</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>6.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td><i class="fa fa-paper-plane" aria-hidden="true"></i></td>
                                                                    <td>Danielle Solomon	</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>6.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td><i class="fa fa-paper-plane" aria-hidden="true"></i></td>
                                                                    <td>Danielle Solomon	</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>6.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                   
                                                    
                                                   
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Trash</h5>
                                                    <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                <th>Receiver</th>
                                                                    <th>Subjects</th>
                                                                    <th>Message</th>
                                                                    <th>Time</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>   Md. Ballayet Mollha</td>
                                                                    <td>Enquiry</td>
                                                                    <td>Enquiry</td>
                                                                    <td>	05.Jul.2020</td>
                                                                    <td><a href="#" class="btn btn-sqr">View</a>
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div> <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
                   

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>