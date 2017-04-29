 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Artikel
        <small>Lihat data artikel</small>
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

    <a href="<?php echo base_url(); ?>C_Admin/form_artikel" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add Content</a>
    <br />
    <br />

    <table id="table_id" class="table table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Judul</th>
          <th>Url/Slug</th>
          <th>Tanggal</th>
          <th>Kategori</th>
          <th>Status</th>
          <th style="width:125px;">Aksi</p></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($artikel as $artikels){?>
             <tr>
                <td><?php echo $artikels->id; ?></td>
                <td><?php echo character_limiter($artikels->title,20) ?></td>
                <td><?php echo character_limiter($artikels->slug,20) ?></td>
                <td><?php echo $artikels->date; ?></td>
                <td><?php echo character_limiter($artikels->category,40)?></td>
                <td><?php echo $artikels->status; ?></td>

                <td>
                  <button class="btn btn-warning" onclick="edit_artikel(<?php echo $artikels->id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger" onclick="delete_artikel(<?php echo $artikels->id;?>)"><i class="glyphicon glyphicon-remove"></i></button>


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

      </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
      
      <!-- Your Page Content Here -->
    