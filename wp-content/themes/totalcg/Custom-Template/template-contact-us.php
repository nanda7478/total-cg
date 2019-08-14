<?php /*Template Name: Contact us*/
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
			 		<h1><?php the_title(); ?></h1> 
			 		<?php the_content();?> 
			 	</div>
			 	<div class="contact_body">
			 		
<?php echo do_shortcode('[contact-form-7 id="253" title="Contact Us"]'); ?>

			 	</div>
			 	

			 </div>
			 <div class="col-md-5 cont_right"> 
              <div class="office_add">
              	
              	<?php the_field('contact_address'); ?>
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

  <?php the_field('google_map'); ?>
        <!--  <img src="<?php // echo get_template_directory_uri ();?>/image/map.png" /> 

         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3043.9748459198913!2d-74.06029078460837!3d40.276308979381696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c22f13c7b876d7%3A0x7400199aa8d0f583!2s246+Industrial+Way+W+Suite+Q%2C+Eatontown%2C+NJ+07724%2C+USA!5e0!3m2!1sen!2sin!4v1548311262841" width="600" height="450" frameborder="0" allowfullscreen></iframe> -->
</div>


 

  <div class="more_btn">
<a href="<?php echo get_permalink( get_page_by_title( 'Locations' ) )?>">VIEW OUR SERVICE REGIONS</a></div>
 
			 </div>

		</div>

	</div>
 
</section>


<script type="text/javascript">

 

jQuery(document).ready(function() {
	
	const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get('sub_service');
 // alert(myParam);

 
if ( myParam == "HVAC/R" ) {
     jQuery(".wpcf7-select option[value='HVAC/R']").attr("selected", "selected");
    
}
else if (myParam == "Electrical") {
   jQuery(".HowCanWeHelp option[value='ELECTRICAL']").attr("selected", "selected"); 
}
else if (myParam == "PLUMBING") {
   jQuery(".HowCanWeHelp option[value='PLUMBING']").attr("selected", "selected"); 
}
else if (myParam == "PROJECT MANAGEMENT") {
   jQuery(".HowCanWeHelp option[value='PROJECT MANAGEMENT']").attr("selected", "selected"); 
}
else if (myParam == "FACTORY AUTHORIZED STAT-UPS") {
   jQuery(".HowCanWeHelp option[value='FACTORY AUTHORIZED STAT-UPS']").attr("selected", "selected"); 
}
 else {
  //  alert('track not here');
     //  alert('track present');
}
    
});


</script>
<?php endwhile; ?>
 
<?php get_footer(); ?>