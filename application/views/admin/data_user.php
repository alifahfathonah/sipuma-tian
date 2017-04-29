 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
     <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
      <div class="box-body">
        <br />
    <button class="btn btn-success" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i> Add User</button>
    <br />
    <br />

    <table id="table_id" class="table table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID User</th>
          <th>Username</th>
          <th>Role</th>
          <th style="width:125px;">Action</p></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($user as $users){?>
             <tr>
                <td><?php echo $users->id_user; ?></td>
                <td><?php echo $users->username; ?></td>
                <td><?php echo $users->nama_role; ?></td>

                <td>
                  <button class="btn btn-warning" onclick="edit_user(<?php echo $users->id_user;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger" onclick="delete_user(<?php echo $users->id_user;?>)"><i class="glyphicon glyphicon-remove"></i></button>


                </td>
              </tr>
             <?php }?>
      </tbody>
    </table>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<script src="<?php echo base_url();?>assets/login/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/login/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/login/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/login/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/login/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/login/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/login/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/login/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

  <script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; //for save method string
    var table;


    function add_user()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_user(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('C_Admin/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_user"]').val(data.id_user);
            $('[name="username"]').val(data.username);
            $('[name="password"]').val(data.password);
            $('[name="id_role"]').val(data.id_role);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('C_Admin/user_add')?>";
      }
      else
      {
        url = "<?php echo site_url('C_Admin/update_user')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_user(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('C_Admin/delete_user')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">User Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id_user"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Username</label>
              <div class="col-md-9">
                <input name="username" placeholder="Username" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-9">
                <input name="password" placeholder="Password" class="form-control" type="password">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">ID Role</label>
              <div class="col-md-9">
                <!-- <input name="id_role" placeholder="ID Role" class="form-control" type="text"> -->
                <select name="id_role" placeholder="ID Role" class="form-control">
                  <option value="1">Administrator</option>
                  <option value="2">HIMA</option>
                </select>
              </div>
            </div>

          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

      </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
      
      <!-- Your Page Content Here -->
    