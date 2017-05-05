<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       <?php
         if($stat == 'new'){
           echo "Add About Website";
         } else {
           echo "Edit About Website";
         }
       ?>
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

        <!-- Main content -->

                               <!-- form start -->
                               <form role="form" action="<?php echo base_url()?>C_Admin/aboutsave" enctype="multipart/form-data" method="POST">
                                   <div class="box-body">
                                       <div class="form-group">
                                           <label for="exampleInputFile">Image Header Content</label>
                                           <input type="file" name="foto" required="">
                                           <p class="help-block">* Image Type Must JPG/PNG</p>
                                           <?php  ?>
                                       </div>

                                       <div class="form-group">
                                           <label for="exampleInputEmail1">Content</label>
                                           <div class='box-body pad'>
                                               <textarea id="editor1" name="content" rows="10" cols="80"><?=$content ?>
                                               </textarea>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="box-footer">
                                       <button type="submit" class="btn btn-primary">Update</button>
                                   </div>
                               </form>






   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

     </div>
         </div>
       </div>

     </div>
     <!-- /.row -->

     <!-- Your Page Content Here -->
