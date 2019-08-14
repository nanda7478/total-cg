<?php /*Template Name: Service Page*/
get_header();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 
?>
 


<?php  while ( have_posts() ) : the_post(); ?>


<section id="about_img" class="about_intro_ing">

<img src="<?php if ( $image ) 
	   { echo $image[0]; } 
	  else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
 
 </section>

<section id="about" class="about_main">
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 services_txt"> 
				<h1><span> <?php the_title();?> </span></h1>
				<?php the_content(); ?>

			</div>

		</div>

	</div>

</section>

<?php endwhile; ?>


<section class="our_services_wrapper">
	<div class="container">
		<div class="row">
		<div class="col-md-12 our_services_list">
			<ul>


			    <?php if( have_rows('sub_page') ): 
    while ( have_rows('sub_page') ) : the_row();?>
     <li>        
<div class="service_icon"><a class="heading" href="<?php the_sub_field('sub_page_link'); ?>"><img src="<?php  if( get_sub_field('sub_page_icon') ){ the_sub_field('sub_page_icon');} else { echo get_template_directory_uri().'/image/fea_services.png'; } ?>" alt=""></a></div>
					<div class="service_txt">
						<h2><a class="heading" href="<?php the_sub_field('sub_page_link'); ?>"><?php    the_sub_field('sub_page_title'); ?></a> </h2>
                        <p><?php the_sub_field('sub_page_content'); ?></p>
                        <a class="go_link" href="<?php the_sub_field('sub_page_link'); ?>">FIND OUT MORE</a>
					</div>

        </li>
  <?php   endwhile; endif; ?>

				 


                  <!--
					<li>
					<div class="service_icon"><img src="<?php echo get_template_directory_uri(); ?>/image/fea_services.png" alt=""></div>
					<div class="service_txt">
						<h3><a class="heading" href="#">HAAC/R</a> </h3>
                        <p>we offer a variety of HVAC/R services, from installation to preventative maintenance, that will ensure masimum comfort.</p>
                        <a class="go_link" href="#">FIND OUT MORE</a>
					</div>
				</li>	-->

			</ul>
		</div>
		</div>
	</div>

</section>





















<?php get_footer();?>