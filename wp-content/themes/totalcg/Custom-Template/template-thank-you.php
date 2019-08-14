<?php /*Template Name: Contact Thank You */
get_header(); 

$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 

?>

<?php  while ( have_posts() ) : the_post(); ?>
 

 

<section id="about_img" class="about_intro_ing">

<img src="<?php if ( $image ) 
     { echo $image[0]; } 
    else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
</section>


<section class="contact_wrapper">
	<div class="container">
		
		<div class="row">
			 <div class="col-md-7 contact_form">
			 	<div class="contact_head">
			 		<h2><?php the_title(); ?></h2> 
			 		<?php the_content();?> 
			 	</div>
			 	<div class="contact_body">
			 		
<?php // echo do_shortcode('[contact-form-7 id="253" title="Contact Us"]'); ?>

			 	</div>
			 	

			 </div>
			 <div class="col-md-5 cont_right"> 
              <div class="office_add">
              	
              	<?php the_field('contact_address', 22); ?>
              	<!-- 
              	<h3>Total Comfort Group Headquarters</h3>
              	<span>246 Industrial Way
				West, Suite Q</span>
              	<span>Eatontown, New Jersey
				07724</span>
                <ul> 
                	<li>P: 877-558-5590</li>
                	<li>F: 732-527-0100</li>
                </ul>
			--> 

              </div>

<div class="usa_map">
         <?php // the_field('google_map'); ?>

         <?php the_field('google_map', 22); ?>
</div>


 

  <div class="more_btn">
<a href="<?php echo get_permalink( get_page_by_title( 'Locations' ) )?>">VIEW OUR SERVICE REGIONS</a></div>
 
			 </div>

		</div>

	</div>

</section>


 
<?php endwhile; ?>
 
<?php get_footer(); ?>