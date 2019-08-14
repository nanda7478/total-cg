<?php /*Template Name: Work Thank You*/ 
get_header(); 

$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 

?>
 
<?php  while ( have_posts() ) : the_post(); ?>
 
 
 

<section id="work_img" class="about_intro_ing">

<img src="<?php if ( $image ) 
	   { echo $image[0]; } 
	  else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
</section>

<section id="work_us" class="thanks_main">
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 work_us_txt">
				<h2> <span> Work  with us : Apply<?php // the_title(); ?></span></h2>
				 <?php the_content();?> 

			</div>	 

 <div class="col-md-12 more_btn"> <a href="<?php echo get_permalink( get_page_by_title( 'Work with Us' ) )?>">VIEW MORE POSITIONS</a> </div>
			

		</div>

	</div>

</section>


 
<?php endwhile; ?>
 
<?php get_footer(); ?>