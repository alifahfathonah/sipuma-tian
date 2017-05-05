 
	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 	
	 		<! -- SINGLE POST -->
	 		<div class="col-lg-8">
	 			<! -- Blog Post 1 -->
		 		<p><img class="img-responsive" src="<?php echo base_url(); ?>file/artikel/<?=$images ?>"></p>
		 		<i class="fa fa-calendar-o">&nbsp;</i><?=$date ?> &nbsp;
                <i class="fa fa-user"></i>&nbsp;Administrator
		 		<a href="single-post.html"><h3 class="ctitle"><?=$judul ?></h3></a>

		 		<p><csmall>
		 		<?php
		 		 $tanggal        = $date;
		 		 $namahari       = date('D',strtotime($tanggal));
		 		 if ($namahari == "Sunday") $namahari = "Minggu";
                 else if ($namahari == "Mon") $namahari = "Senin";
                 else if ($namahari == "Tue") $namahari = "Selasa";
                 else if ($namahari == "Wed") $namahari = "Rabu";
                 else if ($namahari == "Thu") $namahari = "Kamis";
                 else if ($namahari == "Fri") $namahari = "Jumat";
                 else if ($namahari == "Sat") $namahari = "Sabtu";
                ?>
				<?=$namahari ?>, <?=$tanggal ?> - <?=$time ?> WIB 
		 		</csmall> | <csmall2><i class="fa fa-user"></i>&nbsp;Administrator</csmall2></p>
		 		<p><?=$content ?></p>
		 		<div class="spacing"></div>
		 		
		 		<h6>SHARE:</h6>
		 		<p class="share">
		 			<div class="sharethis-inline-share-buttons"></div>		 		
		 		</p>
		 		
			</div><! --/col-lg-8 -->
	 		
	 		
	 		<! -- SIDEBAR -->
	 		<div class="col-lg-4">
		 		<h4>Search</h4>
		 		<div class="hline"></div>
		 			<p>
		 				<br/>
		 				<input type="text" class="form-control" placeholder="Search something">
		 			</p>
		 			
		 		<div class="spacing"></div>
		 		
		 		<h4>Categories</h4>
		 		<div class="hline"></div>
		 		
			 		<p><a href="#"><i class="fa fa-angle-right"></i> Berita</a> <span class="badge badge-theme pull-right">9</span></p>
			 		<p><a href="#"><i class="fa fa-angle-right"></i> Pengumuman</a> <span class="badge badge-theme pull-right">3</span></p>
			 		

		 		<div class="spacing"></div>
		 		
		 		<h4>Recent Posts</h4>
		 		<div class="hline"></div>
		 		<?php foreach ($berita as $s): ?>
					<ul class="popular-posts">
		                <li>
		                    <a href="<?php echo base_url(); ?>content/<?=$s['category']?>/<?=$s['slug']?>">
                             <img src="<?php echo base_url(); ?>file/artikel/<?=$s['img_header']?>" alt="<?=$s['title']?>" width="70px" height="70px"/>
                            </a>
		                    <p><p><a href="<?php echo base_url(); ?>content/<?=$s['category']?>/<?=$s['slug']?>"><?=$s['title']?></a></p></p>
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
		                    <p><?=$namahari ?>, <?=$tanggal ?><p?
		                </li>
		                
		            </ul>
		         <?php endforeach ?>
		 		<div class="spacing"></div>
		 		
		 		
			</div>

			

			<div class="fb-comments" data-href="<?php echo base_url();?>content/<?=$kategori?>/<?=$slug?>" data-width="700px" data-numposts="5"></div>



	 	</div><! --/row -->
	 </div><! --/container -->