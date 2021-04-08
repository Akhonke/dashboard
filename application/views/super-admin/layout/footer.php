<style type="text/css">
    .btn-secondary {
        color: #fff;
        background-color: #20bcd5;
        border-color: #20bcd5;
    }
</style>


<script src="<?= base_url() ?>assets/admin/cloudfront/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/cloudfront/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="<?= base_url() ?>assets/admin/cloudfront/vendor/popper.js/umd/popper.min.js"> </script>
<script src="<?= base_url() ?>assets/admin/cloudfront/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/admin/cloudfront/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="<?= base_url() ?>assets/admin/jsdelivr/js.cookie.min.js"></script>
<script src="<?= base_url() ?>assets/admin/cloudfront/js/front.js"></script>
<!-- <script src="<?= base_url() ?>assets/admin/sweetalert/sweetalert.js"></script>
<script src="<?= base_url() ?>assets/admin/sweetalert/sweetalert.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $('.table').DataTable({

            dom: 'Bfrtip',
            columnDefs: [{
                'searchable': false,
                'orderable': false,
                'targets': 0
            }, ],
            order: [
                [0, 'asc']
            ],


            buttons: [

                {

                    extend: 'pdfHtml5',

                    orientation: 'landscape', //landscape give you more space

                    pageSize: 'A0', //A0 is the largest A5 smallest(A0,A1,A2,A3,legal,A4,A5,letter))

                },

                'csv', 'excel', 'print', 'colvis'

            ]

        });

        $('.table').addClass('nowrap')
        table.on('order.dt search.dt', function() {
            table.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
                table.cell(cell).invalidate('dom');
            });
        }).draw();

    });
</script>

<!-- <?php if ($page == 'create_region') { ?>
    <script>
        function deleterecord(tablename, columnname, id) {

            swal.fire({

                    title: "Are you sure?",

                    text: "Delete",

                    type: "warning",

                    showCancelButton: true,

                    confirmButtonClass: "btn-danger",

                    confirmButtonText: "Yes, delete it!",

                    cancelButtonText: "No, cancel it!",

                    closeOnConfirm: false,

                    closeOnCancel: false

                },

                function(isConfirm) {

                    if (isConfirm) {

                        $.ajax({

                            type: "GET",

                            url: "deletedata?table=" + tablename + "&behalf=" + columnname + "&data=" + id,

                            success: function(data) {

                                swal.fire("Deleted!", "Record Delete Successfully.", "success");

                                $("#del-" + id).remove();

                            },

                            error: function(jqXHR, textStatus, errorThrown) {

                                swal.fire("Error deleting!", "Please try again", "error");

                            }

                        });

                    } else {

                        swal.fire("Cancelled", "Your data is safe :)", "error");

                    }

                });

        }



        $(function() {

            $.validator.addMethod("fullname", function(value, element) {
                // allow any non-whitespace characters as the host part
                return this.optional(element) || /[a-zA-Z0-9 @&$]*+$/.test(value);
            }, "Only letters and white space allowed.");

            $('#CreateRegionForm').validate({

                rules: {

                    'province': {

                        required: true,

                    },

                    'District': {

                        required: true,

                    },

                    'region': {

                        required: true,
                        fullname: true

                    },

                },

                messages: {

                    'province': {

                        required: 'Please select your province name',

                    },

                    'District': {

                        required: 'Please select your district name',

                    },

                    'region': {

                        required: 'Please enter your region',

                    },

                }

            });

            $.validator.setDefaults({

                submitHandler: function(form) {

                    form.submit();

                }

            });

        });


        $(function() {

            function deleterecord(tablename, columnname, id) {

                swal.fire({

                        title: "Are you sure?",

                        text: "Delete",

                        type: "warning",

                        showCancelButton: true,

                        confirmButtonClass: "btn-danger",

                        confirmButtonText: "Yes, delete it!",

                        cancelButtonText: "No, cancel it!",

                        closeOnConfirm: false,

                        closeOnCancel: false

                    },

                    function(isConfirm) {

                        if (isConfirm) {

                            $.ajax({

                                type: "GET",

                                url: "deletedata?table=" + tablename + "&behalf=" + columnname + "&data=" + id,

                                success: function(data) {

                                    swal.fire("Deleted!", "Record Delete Successfully.", "success");

                                    $("#del-" + id).remove();

                                },

                                error: function(jqXHR, textStatus, errorThrown) {

                                    swal.fire("Error deleting!", "Please try again", "error");

                                }

                            });

                        } else {

                            swal.fire("Cancelled", "Your data is safe :)", "error");

                        }

                    });

            }

            $('#CreateRegionForm').validate({

                rules: {

                    'province': {

                        required: true,

                    },

                    'District': {

                        required: true,

                    },

                    'region': {

                        required: true,

                    },

                },

                messages: {

                    'province': {

                        required: 'Please select your province name',

                    },

                    'District': {

                        required: 'Please select your district name',

                    },

                    'region': {

                        required: 'Please enter your region',

                    },

                }

            });

            $.validator.setDefaults({

                submitHandler: function(form) {

                    form.submit();

                }

            });

        });

        $('#province').change(function() {

            $.ajax({

                url: 'superadmin_get_destrict',

                data: {
                    'value': $('#province').val()
                },

                dataType: 'json',

                type: 'post',

                success: function(data) {

                    var option = '';

                    $.each(data, function(i, star) {

                        if (i == 'error') {

                            $('.district_option').html(option);

                            $('#District-error').show();

                            $('#District-error').html(star);

                        } else {
                            var test = '<option hidden value=' + '>Select District</option>';
                            option += '<option value=' + star.id + '>' + star.name + '</option>'

                            $('.district_option').html(test + option);

                            $('#District-error').hide();

                        }

                    });



                }

            });

        });

        function deletedataRegion(tablename, columnname, id) {

            swal.fire({

                    title: "Are you sure?",

                    text: "Delete",

                    type: "warning",

                    showCancelButton: true,

                    confirmButtonClass: "btn-danger",

                    confirmButtonText: "Yes, delete it!",

                    cancelButtonText: "No, cancel it!",

                    closeOnConfirm: false,

                    closeOnCancel: false

                },

                function(isConfirm) {

                    if (isConfirm) {

                        $.ajax({

                            type: "GET",

                            url: "superadmindeletedataRegion?table=" + tablename + "&behalf=" + columnname + "&data=" + id,

                            dataType: "json",

                            success: function(data) {

                                if (data.status == "true") {

                                    swal.fire("Deleted!", "Record Delete Successfully.", "success");

                                    $("#del-" + id).remove();

                                }

                                if (data.error == "error") {

                                    swal.fire("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");

                                }

                            },

                            error: function(jqXHR, textStatus, errorThrown) {

                                swal.fire("Error deleting!", "Please try again", "error");

                            }

                        });

                    } else {

                        swal.fire("Cancelled", "Your imaginary file is safe :)", "error");

                    }

                });

        }
    </script>
<?php } ?> -->

<?php if ($page == 'create_province') { ?>

    <script>
        function deleterecordProvince(tablename, columnname, id) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({

                        type: "GET",

                        url: "superadmindeleterecordProvince?table=" + tablename + "&behalf=" + columnname + "&data=" + id,

                        dataType: "json",

                        success: function(data) {
                            // alert(data.status);
                            if (data.status == "true") {

                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )

                                // $("#del-" + id).remove();
                                location.reload();

                            }

                            if (data.error == "error") {

                                swalWithBootstrapButtons.fire(
                                    'Error!',
                                    'Please try Again.',
                                    'error'
                                )

                            }

                        },

                        error: function(jqXHR, textStatus, errorThrown) {

                            swal.fire("Error deleting!", "Please try again", "error");

                        }

                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })

        }


        $(function() {
            $.validator.addMethod("fqullname", function(value, element) {

                // allow any non-whitespace characters as the host part

                return this.optional(element) || /^[a-z][a-z\s]*$/i.test(value);

            }, "Only letters and white space allowed.");

            $('#CreateProvinceForm').validate({

                rules: {

                    'name': {

                        required: true,
                        number: false

                    },

                },

                messages: {

                    'name': {

                        required: 'Please enter your province name',

                    },

                }

            });

            $.validator.setDefaults({

                submitHandler: function(form) {

                    form.submit();

                }

            });

        });
    </script>
<?php } ?>

<?php if ($page == 'create_district') { ?>

    <script>
        function deletedataDistrict(tablename, columnname, id) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({

                        type: "GET",

                        url: "deletedataDistrict?table=" + tablename + "&behalf=" + columnname + "&data=" + id,

                        dataType: "json",

                        success: function(data) {
                            // alert(data.status);
                            if (data.status == "true") {

                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )

                                // $("#del-" + id).remove();
                                location.reload();

                            }

                            if (data.error == "error") {

                                swalWithBootstrapButtons.fire(
                                    'Error!',
                                    'Please try Again.',
                                    'error'
                                )

                            }

                        },

                        error: function(jqXHR, textStatus, errorThrown) {

                            swal.fire("Error deleting!", "Please try again", "error");

                        }

                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })




        }
    </script>
    <script>
        $(function() {
            $.validator.addMethod("fullname", function(value, element) {
                // allow any non-whitespace characters as the host part
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Only letters and white space allowed.");

            $('#CreateDistrictForm').validate({

                rules: {

                    'province_id': {

                        required: true,

                    },

                    'name': {

                        required: true,
                        fullname: true

                    },

                },

                messages: {

                    'province_id': {

                        required: 'Please select your province name',

                    },

                    'name': {

                        required: 'Please enter your district name',

                    },

                }

            });

            $.validator.setDefaults({

                submitHandler: function(form) {

                    form.submit();

                }

            });

        });
    </script>
<?php } ?>

<?php if ($page == 'create_city') { ?>

    <script>
        $(function() {
            $.validator.addMethod("fullname", function(value, element) {

                // allow any non-whitespace characters as the host part

                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);

            }, "Only letters and white space allowed.");

            $('#CreateCityForm').validate({

                rules: {

                    'province': {

                        required: true,

                    },

                    'District': {

                        required: true,

                    },

                    'region': {

                        required: true,

                    },

                    'city': {

                        required: true,
                        fullname: true

                    },

                },

                messages: {

                    'province': {

                        required: 'Please select your province name',

                    },

                    'District': {

                        required: 'Please select your district name',

                    },

                    'region': {

                        required: 'Please select your region',

                    },

                    'city': {

                        required: 'Please enter your city',

                    },

                }

            });

            $.validator.setDefaults({

                submitHandler: function(form) {

                    form.submit();

                }

            });

        });

        $('.province').change(function() {

            $.ajax({

                url: 'superadmin_get_destrict',

                data: {
                    'value': $('.province').val()
                },

                dataType: 'json',

                type: 'post',

                success: function(data) {

                    var option = '';

                    $.each(data, function(i, star) {

                        if (i == 'error') {

                            $('.district_option').html(option);

                            $('#District-error').show();

                            $('#District-error').html(star);

                        } else {
                            var test = '<option hidden value=' + '>Select District</option>';
                            option += '<option value=' + star.id + '>' + star.name + '</option>'

                            $('.district_option').html(test + option);

                            $('#District-error').hide();

                        }

                        // }

                    });

                }

            });

        });





        $('.district_option').change(function() {

            $.ajax({

                url: 'superadmin_get_region',

                data: {
                    'value': $('.district_option').val()
                },

                dataType: 'json',

                type: 'post',

                success: function(data) {

                    var option = '';

                    $.each(data, function(i, star) {

                        if (i == 'error') {

                            $('#region').html(option);

                            $('#region-error').show();

                            $('#region-error').html(star);

                        } else {
                            var test = '<option hidden value=' + '>Select Region</option>';
                            option += '<option value=' + star.id + '>' + star.region + '</option>'

                            $('#region').html(test + option);

                            $('#region-error').hide();

                        }

                    });



                }

            });

        });

        function deletedataCity(tablename, columnname, id) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({

                        type: "GET",

                        url: "deletedataCity?table=" + tablename + "&behalf=" + columnname + "&data=" + id,

                        dataType: "json",
                        success: function(data) {
                            // alert(data.status);
                            if (data.status == "true") {

                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )

                                // $("#del-" + id).remove();
                                location.reload();

                            }

                            if (data.error == "error") {

                                swalWithBootstrapButtons.fire(
                                    'Error!',
                                    'Please try Again.',
                                    'error'
                                )

                            }

                        },

                        error: function(jqXHR, textStatus, errorThrown) {

                            swal.fire("Error deleting!", "Please try again", "error");

                        }

                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })

        }
    </script>
<?php } ?>

<?php if ($page == 'create_municipality') { ?>

    <script>
        $(function() {
            $.validator.addMethod("fullname", function(value, element) {

                // allow any non-whitespace characters as the host part

                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);

            }, "Only letters and white space allowed.");

            $('#CreateMunicipalityForm').validate({
                rules: {
                    'province': {
                        required: true,
                    },
                    'District': {
                        required: true,
                    },
                    'region': {
                        required: true,
                    },
                    'city_id': {
                        required: true,
                    },
                    'municipality': {
                        required: true
                    }
                },
                messages: {
                    'province': {
                        required: 'Please select your province name',
                    },
                    'District': {
                        required: 'Please select your district name',
                    },
                    'region': {
                        required: 'Please select your region',
                    },
                    'city_id': {
                        required: 'Please select your city',
                    },
                    'municipality': {
                        required: 'Please enter your municipality name',
                    },
                }
            });
            $.validator.setDefaults({
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
        $('.province').change(function() {
            $.ajax({
                url: 'superadmin_get_destrict',
                data: {
                    'value': $('.province').val()
                },
                dataType: 'json',
                type: 'post',
                success: function(data) {
                    var option = '';
                    $.each(data, function(i, star) {
                        if (i == 'error') {

                            $('.district_option').html(option);
                            $('#District-error').show();
                            $('#District-error').html(star);
                        } else {
                            var test = '<option hidden value=' + '>Select District</option>';
                            option += '<option value=' + star.id + '>' + star.name + '</option>'
                            $('.district_option').html(test + option);
                            $('#District-error').hide();
                        }
                        // }
                    });
                }
            });
        });


        // $('.district_option').change(function() {
        //     $.ajax({
        //         url: 'superadmin_get_region',
        //         data: {
        //             'value': $('.district_option').val()
        //         },
        //         dataType: 'json',
        //         type: 'post',
        //         success: function(data) {
        //             var option = '';
        //             $.each(data, function(i, star) {
        //                 if (i == 'error') {
        //                     $('#region').html(option);
        //                     $('#region-error').show();
        //                     $('#region-error').html(star);
        //                 } else {
        //                     var test = '<option hidden value=' + '>Select Region</option>';
        //                     option += '<option value=' + star.id + '>' + star.region + '</option>'
        //                     $('#region').html(test + option);
        //                     $('#region-error').hide();
        //                 }
        //             });

        //         }
        //     });
        // });

        $('.district_option').change(function() {
            $.ajax({
                url: 'superadmin_get_city',
                data: {
                    'value': $('.district_option').val()
                },
                dataType: 'json',
                type: 'post',
                success: function(data) {
                    var option = '';
                    $.each(data, function(i, star) {
                        if (i == 'error') {
                            $('#city_id').html(option);
                            $('#city_id-error').show();
                            $('#city_id-error').html(star);
                        } else {
                            var test = '<option hidden value=' + '>Select city</option>';
                            option += '<option value=' + star.id + '>' + star.city + '</option>'
                            $('#city_id').html(test + option);
                            $('#city_id-error').hide();
                        }
                    });

                }
            });
        });

        function deletedataMunicipality(tablename, columnname, id) {





            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({

                        type: "GET",
                        url: "deletedataCity?table=" + tablename + "&behalf=" + columnname + "&data=" + id,
                        dataType: "json",
                        success: function(data) {
                            // alert(data.status);
                            if (data.status == "true") {

                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )

                                // $("#del-" + id).remove();
                                location.reload();

                            }

                            if (data.error == "error") {

                                swalWithBootstrapButtons.fire(
                                    'Error!',
                                    'Please try Again.',
                                    'error'
                                )

                            }

                        },

                        error: function(jqXHR, textStatus, errorThrown) {

                            swal.fire("Error deleting!", "Please try again", "error");

                        }

                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })



        }
    </script>
<?php } ?>

<?php if ($page == 'changepassword') { ?>

    <script>
        $(function() {

            $("#ChangepasswordForm").validate({

                rules: {

                    oldpassword: {

                        required: true,

                    },

                    password: {

                        required: true,

                        minlength: 5,

                    },

                    confirm_password: {

                        required: true,

                        minlength: 5,

                        equalTo: "#password",

                    },

                },

                messages: {

                    oldpassword: {

                        required: "Please enter your old password",

                        minlength: "Password must be at least 5 characters long"

                    },

                    password: {

                        required: "Please enter your new password ",

                        minlength: "Password must be at least 5 characters long"

                    },

                    confirm_password: {

                        required: "Please enter your confirm password",

                        minlength: "Confirm password must be at least 5 characters long",

                        equalTo: "Password and confirm password not match!",

                    },

                },

                submitHandler: function(form) {

                    form.submit();

                }

            });

        });
    </script>
<?php } ?>