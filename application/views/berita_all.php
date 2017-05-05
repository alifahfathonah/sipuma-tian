<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>Blog List.</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 
	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 	<?php foreach ($kueri as $g): ?>    
                        <?php
                            $kat;

                            if($g->category == 'news'){
                                $kat = 'BERITA';
                            }
                            else if($g->category == 'kampus'){
                                 $kat = 'KAMPUS';
                            }
                            else if ($g->category == 'elearning'){
                                 $kat = 'E-LEARNING';
                            }
                            else if ($g->category == 'berita'){
                                $kat = 'Berita';
                            }
        ?>

	 	
	 		<! -- BLOG POSTS LIST -->
	 		<div class="col-lg-12">
	 			<! -- Blog Post 1 -->
	 			<div >
		 		</div>
		 		<h3 class="ctitle"><a title="<?=$g->title?>" href="<?=base_url(); ?>content/<?=$g->category ?>/<?=$g->slug ?>"><?=character_limiter($g->title) ?></a></h3>
		 		<img   src="<?php echo base_url();?>file/artikel/<?=$g->img_header ?>" height="30%">
		 		

		 		<p><csmall>
		 			<?php
                        $tanggal        = $g->date;
                        $namahari       = date('D',strtotime($tanggal));
						if ($namahari == "Sunday") $namahari = "Minggu";
                        else if ($namahari == "Mon") $namahari = "Senin";
                        else if ($namahari == "Tue") $namahari = "Selasa";
                        else if ($namahari == "Wed") $namahari = "Rabu";
                        else if ($namahari == "Thu") $namahari = "Kamis";
                        else if ($namahari == "Fri") $namahari = "Jumat";
                        else if ($namahari == "Sat") $namahari = "Sabtu";
                    ?>
                 <?=$namahari ?>, <?=$g->date?>

		 		</csmall> | <csmall2>By: Admin - 3 Comments</csmall2>
		 		<div class="hline"></div>
		 		
		 		<div class="spacing"></div>
			
	 		
			</div><! --/col-lg-8 -->
	 		
	 		<?php endforeach ?>
	 		<?=$pagination ?>
	 		
	 	</div><! --/row -->
	 </div><! --/container -->
