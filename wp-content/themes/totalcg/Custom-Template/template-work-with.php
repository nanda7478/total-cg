<?php /* Template Name: Work with us*/
get_header(); 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>

<style type="text/css">
   

</style> 

<?php  while ( have_posts() ) : the_post(); ?>

 

<section id="about_img" class="about_intro_ing"> 

<img src="<?php if ( $image ) 
	   { echo $image[0]; } 
	  else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 

 </section>
 
 <section id="about" class="about_main">
	
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 works_txt">
				<h1><span><?php the_title(); ?></span></h1>
				 <?php the_content();?> 
			</div>

		</div>

	</div>

</section>
 
 <section class="apply_wrapper">
   <div class="container">
     <div class="row">
        <div class="col-md-6 apply_container">
          <div class="apply_info">
            <h2>careers</h2>
            <a href="<?php echo get_permalink( get_page_by_title( 'Careers' ) )?>">See All Available positions</a>
          </div>
        
        </div>
        <div class="col-md-6 apply_container">
          <div class="apply_info">
            <h2>Vendors</h2>
            <a href="<?php echo get_permalink( get_page_by_title( 'Vendors' ) )?>">Become a Vendor with TCG</a>
          </div>
        
        </div>   
     </div>  
      </div>
  </section>





<?php endwhile; ?>
























<?php get_footer();?>