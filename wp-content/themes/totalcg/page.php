<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
?>

<section id="about_img" class="about_intro_ing">
<img src="<?php if ( $image ) 
	   { echo $image[0]; } 
	  else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
</section>

	<section id="primary" class="content-area">
		<main id="main" class="site-main container">

     <div class="col-md-12">


     	 

			<?php

			/* Start the Loop */ 
			while ( have_posts() ) :
				the_post();



     	  the_title( '<h1>', '</h1>' );

          the_content();

			//	get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			
			?>
</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
endwhile; // End of the loop.
get_footer();
