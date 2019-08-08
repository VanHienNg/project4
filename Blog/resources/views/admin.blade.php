<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin</title>

  <!-- Custom fonts for this template -->
  <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('template/vendor/jquery-validate/jquery.validate.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Products List</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="admin.blade.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Staffs List</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="col-xs-12 text-right add-option-btn">
                  <a href="javascript:void(0)" class="btn btn-info col-xs-3 mb-2" id="add-staff-btn">Add new staff</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  
                  <tbody id="staff-crud">
                    @foreach($staff as $staff_info)
                    <tr id="staff_id_{{ $staff_info->id }}">
                      <td>{{ $staff_info->name }}</td>
                      <td>{{ $staff_info->position }}</td>
                      <td>{{ $staff_info->office}}</td>
                      <td>{{ $staff_info->age }}</td>
                      <td>{{ $staff_info->start_date }}</td>
                      <td>${{ $staff_info->salary }}</td>
                      <td>
                        <a href="javascript:void(0)" class="btn btn-info table-option-btn" id="edit-staff" data-id="{{ $staff_info->id }}">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger table-option-btn" id="delete-staff" data-id="{{ $staff_info->id }}">Delete</a>
                        <a href="javascript:void(0)" class="btn btn-info table-option-btn" id="showlist-btn" data-id="{{ $staff_info->id }}">Show Product</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  {{ $staff->links() }}
                </table>
              </div>

              <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="staffCrudModal"></h4>
                    </div>
                    <div class="modal-body">
                      <form id="staffForm" name="staffForm" class="form-horizontal">
                        <input type="hidden" name="staff_id" id="staff_id">
                        
                        <div class="form-group">
                          <label for="name" class="col-sm-3 control-label">Name:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Fullname" value="" maxlength="50" required="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="position" class="col-sm-3 control-label">Position:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="position" name="position" placeholder="Staff, Manager, Director, ..." value="" maxlength="20" required="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="office" class="col-sm-3 control-label">Office:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="office" name="office" placeholder="NewYork, Tokyo, Hanoi, ..." value="" maxlength="10" required="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="age" class="col-sm-3 control-label">Age:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="age" name="age" placeholder="Enter Age" value="" maxlength="3" required="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="start_date" class="col-sm-3 control-label">Start date:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Enter start working date" value="" maxlength="10" required="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="salary" class="col-sm-3 control-label">Salary:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter Salary" value="" maxlength="20" required="">
                          </div>
                        </div>

                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" id="btn-save" value="create">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <style>
    .add-option-btn {
      margin-bottom: 5px;
    }
    #add-option-btn {
      background: blue;
      color: white;
    }
    .table-option-btn {
      color: white;
      width: 25%;
    }
    #del-option-btn {
      background: red;
    }
    #update-option-btn {
      background: green;
    }
    #showlist-btn {
      width: 47%;
    }
    
  </style>

  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      //Add button
      $('#add-staff-btn').click(function() {
        $('#btn-save').val('create-staff');
        $('#staffForm').trigger('reset');
        $('#staffCrudModal').html("Add New Staff");
        $('#ajax-crud-modal').modal('show');
        
      });

      //Edit button
      $('body').on('click', '#edit-staff', function() {
        var staff_id = $(this).data('id');
        $.get('admin/'+ staff_id +'/edit', function(data) {
          $('#staffCrudModal').html('Edit Staff');
          $('#btn-save').val("edit-staff");
          $('#ajax-crud-modal').modal('show');
          $('#name').val(data.name);
          $('#position').val(data.position);
          $('#office').val(data.office);
          $('#age').val(data.age);
          $('#start_date').val(data.start_date);
          $('#salary').val(data.salary);
        })
      });

      //Delete button
      $('body').on('click', '#delete-staff', function() {
        var staff_id = $(this).data('id');
        confirm("Are you sure want to delete this staff?");

        $.ajax({
          type: "DELETE",
          url: "{{ url('admin') }}"+'/' + staff_id,
          success: function(data) {
            $('#staff_id_' + staff_id).remove();
          },
          error: function(data) {
            console.log('Error:', data);
          }
        });
      });
    });
    
    //Submit edit + add form
    if($('#staffForm').length > 0) {
      $('staffForm').validate({
        submitHandler: function(form) {
          var actionType = $('#btn-save').val();
          $('#btn-save').html('Sending..');

          $.ajax({
            data: $('#staffForm').serialize(),
            type: "POST",
            url: "{{ url('admin') }}"+'/store',
            dataType: 'json',
            success: function(data) {
              var staff = '<tr id="staff_id_'+ data.id +'"><td>'+ data.name +'</td><td>'+ data.position +'</td><td>'+ data.office +'</td><td>'+ data.age +'</td><td>'+ data.start_date +'</td><td>'+ data.salary +'</td>';
              staff += '<td><a href="javascript:void(0)" class="btn btn-danger table-option-btn" id="edit-staff" data-id="'+ data.id +'">Edit</a></td>'
              staff += '<td><a href="javascript:void(0)" class="btn btn-info table-option-btn" id="delete-staff" data-id="'+ data.id +'">Delete</a></td>'
              staff += '<td><a href="javascript:void(0)" class="btn btn-info table-option-btn" id="showlist-btn" data-id="'+ data.id +'">Show Product</a></td>'
            
              if(actionType == "create-staff") {
                $('#staff-crud').prepend(staff);
              } else {
                $("#staff_id_" + data.id).replaceWith(staff);
              }

              $('#staffForm').trigger("reset");
              $('#ajax-crud-modal').modal('hide');
              $('#btn-save').html('Save Changes');
            },
            error: function(data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
            }
          });
        }
      })
    }
  </script>

</body>

</html>
