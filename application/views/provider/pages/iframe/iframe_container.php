<div class="container-fluid px-xl-5">
   <section class="py-5">
      <div class="row">
         <!-- Form Elements -->
         <div class="col-lg-12 mb-1">
            <div class="card">
               <div class="card-header">
                  <h3 class="h6 text-uppercase mb-0">Compose Bulk Messages</h3>
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

                     .myaccount-tab-menu a:hover,
                     .myaccount-tab-menu a.active {
                        background-color: #20bcd5 !important;
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

                     .myaccount-table table th,
                     .myaccount-table .table th {
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

                     .single-input-item input,
                     .single-input-item textarea {
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

                     .myaccount-table table td,
                     .myaccount-table .table td {
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

                  <style>

                  #myIframe {
                    width:100%;
                  }

                  </style>
                  <div class="my-account-wrapper section-padding">
                     <div class="container">

<iframe src="<?php echo $url; ?>" id="myIframe"></iframe>

    <script>
    // Selecting the iframe element
    var iframe = document.getElementById("myIframe");

    // Adjusting the iframe height onload event
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    }
    </script>


                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>