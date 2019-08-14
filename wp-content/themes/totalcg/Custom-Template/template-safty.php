<?php 
/* Template Name: Safty Page */
get_header (); 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 

?>
 
<?php /*?>
  
<script src="<?php echo get_template_directory_uri(); ?>/js-main/jquery.sub.sameheight.min.js"></script> <?php */?>

 

<?php while ( have_posts() ): the_post(); ?>
<div style="display: none;">
	<?php
if( have_rows('safety_list') ):
     while ( have_rows('safety_list') ) : the_row(); ?>     
        <img src="<?php the_sub_field('safety_image')?>" alt="no" >
   <?php endwhile; endif; ?>
</div>


<section id="about_img" class="about_intro_ing">
 <img src="<?php if ( $image ) 
	   { echo $image[0]; } 
	  else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
</section>
<section id="safety" class="safety_main">
		<div class="container">
		<div class="row">
			<div class="col-md-12 safety_txt">
				<h1> <span><?php the_title(); ?> </span> </h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>
<section class="safety_works">
	<div class="container">
<?php

if( have_rows('safety_list') ): 
	 $about_list= 0;
    while ( have_rows('safety_list') ) : the_row(); ?>

         
      

  <?php  if ($about_list % 2 == 0) { ?>

		<div class="row safety_works_up">

			 <div class="col-md-6 safety_works_wrapper max_well order-md-12">
	 
             <div class="max_well"><img src="<?php  if( get_sub_field('safety_image') ){ the_sub_field('safety_image');} else { echo get_template_directory_uri().'/image/safety1.jpg'; } ?>" alt="no" ></div>
			  </div>

			  <div class="col-md-6 safety_works_wrapper">
			  	<div class="safety_txt_middle">
			  	<h2><?php   the_sub_field('safety_title'); ?></h2>
			  <?php   the_sub_field('safety_content'); ?>

</div>
			  </div>
			 
		</div>

 <?php } else {   ?>

		<div class="row safety_works_down">
			    <div class="col-md-6 safety_works_wrapper max_well">
 
<div class="max_well"><img src="<?php  if( get_sub_field('safety_image') ){ the_sub_field('safety_image');} else { echo get_template_directory_uri().'/image/safety1.jpg'; } ?>" alt="no" ></div>
			    </div>
			  <div class="col-md-6 safety_works_wrapper">
			  	<div class="safety_txt_middle">
			  	<h2><?php   the_sub_field('safety_title'); ?></h2>
			  <?php   the_sub_field('safety_content'); ?>
 </div>
			  </div>
			

		</div>

 <?php } ?>

 <?php 
$about_list++; 
  endwhile;
endif;

?>



	</div>

</section>

<?php endwhile;  ?>


<?php get_footer(); ?>