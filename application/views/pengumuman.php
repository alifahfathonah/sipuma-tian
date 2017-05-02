
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>Informasi</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->


	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 		<! -- BLOG POSTS LIST -->
	 		<div class="col-lg-12">

	 		</div>
	 		<! -- SIDEBAR -->
	 	</div><! --/row -->

	 <div class="col-lg-4">
	 		<div class="row">
	 		<h4>Berita</h4>
		 		<div class="hline"></div>
		 		<?php foreach ($berita as $s): ?>
					<ul class="popular-posts">
		                <li>
		                    <a href="<?php echo base_url(); ?>content/<?=$s['category']?>/<?=$s['slug']?>">
                             <img src="<?php echo base_url(); ?>file/artikel/<?=$s['img_header']?>" alt="<?=$s['title']?>" width="70px" height="70px"/>
                            </a>
		                    <p><a href="<?php echo base_url(); ?>content/<?=$s['category']?>/<?=$s['slug']?>"><?=$s['title']?></a></p>
		                    <em>
		                    	<?php
                                            $tanggal        = $s['date'];
                                            $namahari       = date('D',strtotime($tanggal));

                                            if ($namahari == "Sunday") $namahari = "Minggu";
                                                else if ($namahari == "Mon") $namahari = "Senin";
                                                else if ($namahari == "Tue") $namahari = "Selasa";
                                                else if ($namahari == "Wed") $namahari = "Rabu";
                                                else if ($namahari == "Thu") $namahari = "Kamis";
                                                else if ($namahari == "Fri") $namahari = "Jumat";
                                                else if ($namahari == "Sat") $namahari = "Sabtu";
                                        ?>
		                    </em>
		                    <?=$namahari ?>, <?=$tanggal ?>
		                </li>
		            </ul>
		        <?php endforeach ?>
	 	</div>
	 </div>
	 <div class="col-lg-4">
	 		<div class="row">
	 		<h4>Pengumuman</h4>
		 		<div class="hline"></div>
		 		<?php foreach ($pengumuman as $s): ?>
					<ul class="popular-posts">
		                <li>
		                    <a href="<?php echo base_url(); ?>content/<?=$s['category']?>/<?=$s['slug']?>">
                             <img src="<?php echo base_url(); ?>file/artikel/<?=$s['img_header']?>" alt="<?=$s['title']?>" width="70px" height="70px"/>
                            </a>
		                    <p><a href="<?php echo base_url(); ?>content/<?=$s['category']?>/<?=$s['slug']?>"><?=$s['title']?></a></p>
		                    <em>
		                    	<?php
                                            $tanggal        = $s['date'];
                                            $namahari       = date('D',strtotime($tanggal));

                                            if ($namahari == "Sunday") $namahari = "Minggu";
                                                else if ($namahari == "Mon") $namahari = "Senin";
                                                else if ($namahari == "Tue") $namahari = "Selasa";
                                                else if ($namahari == "Wed") $namahari = "Rabu";
                                                else if ($namahari == "Thu") $namahari = "Kamis";
                                                else if ($namahari == "Fri") $namahari = "Jumat";
                                                else if ($namahari == "Sat") $namahari = "Sabtu";
                                        ?>
		                    </em>
		                    <?=$namahari ?>, <?=$tanggal ?>
		                </li>
		            </ul>
		        <?php endforeach ?>
	 	</div>
	 </div>
	 </div><! --/container -->


	