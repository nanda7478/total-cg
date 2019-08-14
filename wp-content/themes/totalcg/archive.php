<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

// get the current taxonomy term
 $term = get_queried_object();

$image = get_field ('featured_image', $term ); 
?>
 
 

<section id="about_img" class="about_intro_ing">

<img src="<?php if ( $image ) 
     { echo $image; } 
    else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
</section>


<section id="about" class="blog_main">
  

  <div class="container">
    <div class="row">
      <div class="col-md-12 blog_txt">
       <?php the_archive_title( '<h2 class="page-title">', '</h2>' ); ?>
 <ul> <span>Sort By category Tag:</span>
  <?php
       $args = array(
               'taxonomy' => 'category',
               'orderby' => 'name',
               'order'   => 'ASC'
           );
//get_category_link($category)
   $categories = get_categories($args);
    foreach($categories as $cat){
        ?>
      <li>  <a href="<?php echo get_category_link( $cat->term_id ) ?>">
           <?php echo $cat->name; ?>
      </a></li>
        <?php

        }
  ?>
  </ul>

 

      </div>

    </div>

  </div>

</section>

<section class="blog_list">
  <div class="container">
    <div class="row">

<?php
		 
  $currCat = get_category(get_query_var('cat'));
  $cat_name = $currCat->name;
  $cat_id   = get_cat_ID( $cat_name );

?>

<?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $temp = $wp_query;
  $wp_query = null;
  $wp_query = new WP_Query();
  $wp_query->query('showposts=6&post_type=post&paged='.$paged.'&cat='.$cat_id);  
  while ($wp_query->have_posts()) : $wp_query->the_post();
?>


<?php
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'blog-thumbnails' ); 
				?>

<div class="col-sm-12 col-md-4 col-lg-4 blog_wra_bg">
  <div class="blog_profile blog_a_btn">
    <div class="blog_pik img_hover">
      <?php if ( has_post_thumbnail() ) { ?>
      <a href="<?php the_permalink();?>"> <img class="" alt="220" src="<?php  echo $image[0] ?>" /> </a>
      <?php } else { ?>
      <a href="<?php the_permalink();?>"> <img class="" alt="221" src="<?php echo get_template_directory_uri(); ?>/images/no-blog.jpg" /> </a>
      <?php } ?>
    </div>
    <div class="blog_details"> <?php echo the_time('m.d.y'); ?> <span>
      <?php         $category = get_the_category();
		echo	$firstCategory = $category[0]->cat_name; ?>
      </span> </div>
    <div class="blog_profile_warpper">
      <h4> <a href="<?php the_permalink();?>">
        <?php   the_title (); ?>

        </a> </h4>
      <p>
        <?php $content = get_the_content();
   $add_content = strip_tags($content);
   echo substr($add_content,0,130 ); ?>
      </p>
      <div class="blog_link"> <a class="btn_a" href="<?php the_permalink();?>">Read More <span><i class="fa fa-arrow-right"></i></span> </a></div>
      <!--End blog_link--> 
      
    </div>
    <!--End blog_warpper--> 
    
  </div>
</div>

		<?php	endwhile; ?>
		<?php
  global $wp_query;
 
  $big = 999999999; // need an unlikely integer
  echo '<div class="col-lg-12 paginate-links"><ul class="pagination justify-content-center ">';
    echo paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'prev_text' => __('<span aria-hidden="true"><i style="font-size:18px; line-height: 0;" class="fa">&#xf104;</i></span> <span class="sr-only">Previous</span>'),
    'next_text' => __('<span aria-hidden="true"><i style="font-size:18px; line-height: 0;" class="fa">&#xf105;</i></span> <span class="sr-only">Next</span>'),
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages
    ) );
  echo '</ul></div>';
?>	


    </div></div></section>


 <?php /*?>	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

 

				 
			//	get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

	<?php */?>

<?php
get_footer();
