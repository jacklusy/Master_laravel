@extends('vendor.vendor_dashboard')

@section('vendor')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script
  src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
  integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw="
  crossorigin="anonymous"></script>

  <style>
    .col-lg-12 {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem; 
    }

    .editButton {
        margin-right: 1rem;
    }

    .col-lg-11 {
        width: 100% !important;
        margin-bottom: 1rem; 
    }
    .modal-footer{
        display: flex;
        justify-content: space-between;
    }
    
  </style>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
   
            <nav aria-label="breadcrumb">
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="add_User" data-bs-target="#addUser">Add Admin</button>
            </div>
        </div>
        
    </div>
    <!--end breadcrumb-->
    
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>User Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
    
</div>


    
    <div class="modal fade ajax-model" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <form action="" id="ajaxForm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <input type="hidden" name="admin_id" id="admin_id">
                                <label class="form-control-label" for="input-username">UserName</label>
                                <input type="text" id="username" name="username" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Name</label>
                                <input type="text" id="name" name="name" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Email</label>
                                <input type="email" id="email" name="email" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                            <div class="form-group focused password">
                                <label class="form-control-label" for="input-username">Password</label>
                                <input type="password" id="password" name="password" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Phone</label>
                                <input type="phone" id="phone" name="phone" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Address</label>
                                <input type="text" id="address"  name="address" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <div class="" id="In_active">
                            
                        </div>
        </form>

                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="savebtn" class="btn btn-primary">Save User</button>
                        </div>
                    </div>
                </div>
            </div>

    </div>

<script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>


<script>

    
    $(document).ready(function(){
            
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        
        // function to get user data using Ajax
        function getUserData() {
            $.ajax({
                url: "{{ route('all.admin') }}",
                method: "GET",
                success: function(response) {
                    // empty the table body first
                    $("#user-table tbody").empty();

                    // loop through the response data and append it to the table
                    $.each(response, function(key, admin) {
                        var table = $("#user-table tbody").append(
                            "<tr>" +
                            "<td>" + admin.id + "</td>" +
                            "<td>" + admin.username + "</td>" +
                            "<td>" + admin.name + "</td>" +
                            "<td>" + admin.email + "</td>" +
                            "<td>" + admin.phone + "</td>" +
                            "<td>" + admin.address + "</td>" +
                            "<td>" +
                            "<a href='javascript:void(0)' class='btn btn-info editButton' data-id='" + admin.id + "'>Edit</a>" +
                            "<a href='javascript:void(0)' id='delete' class='btn btn-danger delButton' data-id='" + admin.id + "'>Delete</a>" +
                            "</td>" +
                            "</tr>"
                        );
                    });
                        
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // call the function to display user data on page load
        getUserData();



        var formData = $("#ajaxForm")[0];
        $('#savebtn').click(function(){

            var form = new FormData(formData);
            
            console.log(form);

            $.ajax({
                url: '{{route("admin.store")}}' ,
                method: 'POST' ,
                processData : false ,
                contentType : false ,
                data : form ,

                success : function (response) {
                    getUserData();
                    $(".ajax-model").modal('hide');

                    console.log(response.success , 'response.success');
                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });
        });

        $('body').on('click','.editButton',function(){

            var id = $(this).data('id');
            
            $.ajax({
                url: '{{ url("admin", '') }}' + '/' + id + '/edit' ,
                method: 'GET' ,

                success : function (response) {
                    $(".ajax-model").modal('show');
                    $('.modal-title').html('Edit Admin');
                    $('#savebtn').html('Update');
                    // $('.password').hide();

                    $('#admin_id').val(response.id);
                    $('#username').val(response.username);
                    $('#name').val(response.name);
                    $('#email').val(response.email);
                    $('#phone').val(response.phone);
                    $('#address').val(response.address);
                    console.log(response);

                    $("#In_active").empty();
        
                
                    $("#In_active").html(
                        '<input type="checkbox" name="active" value="1" data-id="' + response.id + '" class="status-toggle" ' + (response.status.active ? 'checked' : '') + '>' + ' ' +
                        '<label class="form-control-label">' + (response.status.active ? "Active" : "Inactive") + '</label>'
                    );
                    
                

                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });


        });

        $('#add_User').click(function(){
            $('.modal-title').html('Create Admin');
            $('.savebtn').html('Save Admin');

            $('#user_id').val('');
            $('#username').val('');
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#address').val('');

        });

       

      

      
        $('body').on('change','#Active',function(){

            var id = $(this).data('id');
            var active = $(this).is(':checked') ? 1 : 0;
            
            $.ajax({
                type: 'POST',
                url: '{{ route("update.status") }}',
                data: {
                    id: id,
                    active: active,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // Update checkbox status

                    $("#In_active").empty();
        
                
                    $("#In_active").html(
                        '<input type="checkbox" name="active" value="1" data-id="' + response.id + '" class="status-toggle" ' + (response.status.active ? 'checked' : '') + '>' + ' ' +
                        '<label class="form-control-label">' + (response.status.active ? "Active" : "Inactive") + '</label>'
                    );

                    if (data.success) {
                        alert('Status updated successfully!');
                    }
                }
            });
        });
      

    });

</script>
@endsection
