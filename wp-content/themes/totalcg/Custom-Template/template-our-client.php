<?php /* Template Name: Our Client*/
get_header();
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');

?> 


<?php  while ( have_posts() ) : the_post(); ?>



<section id="about_img" class="about_intro_ing">

<img src="<?php if ( $featured_img_url ) 
	   { echo $featured_img_url; } 
	  else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 

 </section>
 
 
 
<section class="client_txt_wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12 client_txt">
         <h1><span> <?php the_title();?></span> </h1>
         <?php the_content();?>
      </div>  
    </div>
    </div>
</section> 
  
  <?php endwhile; ?> 


 <section class="our_client_wrapper">
   <div class="container">
    <div class="row our_client_list">


 
     
          
<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
<?php $args = array(
           'post_type' => 'client' ,
           'order' => 'ASC' ,
           'posts_per_page' => -1,
      // 'orderby'=>'title',
           'paged' => $paged, 
                        ); ?> 
      <?php query_posts($args); ?>
      <?php 
 
 while ( have_posts() ) : the_post(); 
   
   $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 
   
   ?>
   
   <div class="col-6 col-md-3 client_logo">
     <img src="<?php if ( $image ) 
     { echo $image[0]; } 
    else { echo get_template_directory_uri ().'/image/client_1.png'; }  ?>">
  </div>
 
            
<?php
     endwhile; // End of the loop.
     ?>
  
      
     


     

    </div>  
   </div>
  </section>




























<?php get_footer();?>