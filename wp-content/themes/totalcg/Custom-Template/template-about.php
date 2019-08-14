<?php
/* Template Name: About Us */
get_header ();  
  
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );?>
 <script src="<?php echo get_template_directory_uri(); ?>/js-main/jquery.sameheight.min.js"></script> 


<?php  while ( have_posts() ) : the_post(); ?>

<div style="display: none;">
	<?php
if( have_rows('about_list') ):
     while ( have_rows('about_list') ) : the_row(); ?>     
        <img src="<?php the_sub_field('about_list_image')?>" alt="no" >
   <?php endwhile; endif; ?>
</div>

<section id="about_img" class="about_intro_ing">
<img src="<?php if ( $image ) 
	   { echo $image[0]; } 
	  else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
</section>
<section id="about" class="about_main">
		<div class="container">
		<div class="row">
			<div class="col-md-12 about_txt">
				<h1><span> <?php the_field('page_sub_title') ?></span></h1>
				 <?php the_content();?> 
			</div>
		</div>
	</div>
</section>
<section class="about_works">
	<div class="container">
	<?php
if( have_rows('about_list') ):
	$about_list= 0;
    while ( have_rows('about_list') ) : the_row(); ?>
  <?php  if ($about_list % 2 == 0) { ?>
		<div class="row about_works_up">
			  <div class="col-md-6 about_works_wrapper">
			  	<div class="about_txt_middle">
			  	<h3><?php the_sub_field('about_list_title')?></h3>
			  	 <?php the_sub_field('about_list_content')?> 
<?php if ( get_sub_field('about_list_button') ) { ?>
	  <a href="<?php the_sub_field('about_list_link')?>"><?php the_sub_field('about_list_button')?> </a>
<?php } ?>
			  </div>
			  </div>
			  <div class="col-md-6 about_works_wrapper max_well"><img src="<?php the_sub_field('about_list_image')?>" alt="no" >

 <div class="max_well"><img src="<?php  if( get_sub_field('about_list_image') ){ the_sub_field('about_list_image');} else { echo get_template_directory_uri().'/image/safety1.jpg'; } ?>" alt="no" ></div>
			  </div>

		</div>

  <?php } else {   ?>

		<div class="row about_works_down">
			    <div class="col-md-6 about_works_wrapper max_well"><img src="<?php the_sub_field('about_list_image')?>" alt="no" >
<div class="max_well"><img src="<?php  if( get_sub_field('about_list_image') ){ the_sub_field('about_list_image');} else { echo get_template_directory_uri().'/image/safety1.jpg'; } ?>" alt="no" ></div>
			    
			    </div>
			  <div class="col-md-6 about_works_wrapper">
			  	<div class="about_txt_middle">
			  	<h3><?php the_sub_field('about_list_title')?></h3>
			  	 <?php the_sub_field('about_list_content')?> 
<?php if ( get_sub_field('about_list_button') ) { ?>
	  <a href="<?php the_sub_field('about_list_link')?>"><?php the_sub_field('about_list_button')?> </a>
<?php } ?>
</div> 
			  </div>
			

		</div>
		<?php } ?>

 <?php 
$about_list++;
   endwhile;
endif; ?>	
	</div>
</section>
<?php endwhile; ?>

<section class="our_team">
	<div class="container our_team_heading">
<h2><span> OUR TEAM </span> </h2>		
		<div class="row"> 
<?php
if( have_rows('our_team_list') ):
     while ( have_rows('our_team_list') ) : the_row(); ?>
            <div class="col-6 col-md-3 ab_team">
				<div class="ab_team_pik"><img src="<?php the_sub_field('our_team_photo'); ?>" alt="no" ></div>
				<h5><?php the_sub_field('our_team_name'); ?> 
				<span><?php the_sub_field('our_team_position'); ?> </span> </h5>
			</div>
  <?php  endwhile;
endif; ?>
		</div>
	</div> 
</section>

<section id="client" class="client_wrapper">
  <div class="container">
    <h2> <?php the_field('client_wrapper_title') ?></h2>
   <div class="client_view">
              
<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
<?php $args = array(
           'post_type' => 'client' ,
           'order' => 'ASC' ,
           'posts_per_page' => -1,
                   'paged' => $paged,  
                        ); ?> 
      <?php query_posts($args); ?>
      <?php  while ( have_posts() ) : the_post(); 
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
      <div class="client"> 
     <img src="<?php if ( $image ) 
     { echo $image[0]; } 
    else { echo get_template_directory_uri ().'/image/client_1.png'; }  ?>">
  </div>
          
<?php     endwhile; // End of the loop.
     ?>
   
    
    </div>
  </div>
</section>
<!--End client_wrapper-->

<script>

jQuery(document).ready(myfunction);
jQuery(window).on('resize',myfunction);

function myfunction() {
 jQuery('.max_well').sameheight();
}   
  </script>

<?php get_footer(); ?>