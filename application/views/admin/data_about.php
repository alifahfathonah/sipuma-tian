<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       About
       <small>Setting About</small>
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

   <table id="table_id" class="table table-bordered table-hover" cellspacing="0" width="100%">
     <thead>
       <tr>
         <th>Image</th>
         <th>Deskripsi</th>
         <th style="width:125px;">Aksi</p></th>
       </tr>
     </thead>

     <tbody>
       <?php foreach($about as $abouts){?>
            <tr>
               <td><?php echo $abouts->img; ?></td>
               <td><?php echo character_limiter($abouts->content,20) ?></td>
               <td>
               <a href="<?= base_url()?>C_Admin/aboutedit/<?= $abouts->id_about ?>"><span class="label label-warning">Edit</span></a>
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
 </script>

     </div>
         </div>
       </div>

     </div>
     <!-- /.row -->

     <!-- Your Page Content Here -->
