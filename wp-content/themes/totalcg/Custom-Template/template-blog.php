<?php 
/*
Template Name: Blog page
 */
get_header(); 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );  
?>
 


<section id="about_img" class="about_intro_ing"> 

<img src="<?php if ( $image ) 
     { echo $image[0]; } 
    else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
</section>

<section id="about" class="blog_main">
  

  <div class="container">
    <div class="row">
      <div class="col-md-12 blog_txt">
        <h1>Blog </h1>
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
query_posts( array (
	                        
						 'order'=>'ASC',
						 'posts_per_page' => 9, 
						 'post_status' => 'publish',
						 'paged' => $paged));

$post_doc = 0;
while ( have_posts() ) : the_post(); 
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
          
          <div class="blog_details">
          
           <?php echo the_time('m.d.y'); ?>                             
          
          
       <span>   
  <?php         $category = get_the_category();
		echo	$firstCategory = $category[0]->cat_name; ?>
</span> 
           
           
          </div>
          
          
          <div class="blog_profile_warpper">
            <h4> <a href="<?php the_permalink();?>">
              <?php the_title (); ?>
              </a> </h4>
             
            <p> 
                <?php $content = get_the_content();
   $add_content = strip_tags($content);
   echo substr($add_content,0,180 ); ?> 
            </p>
            
            <div class="blog_link">
            <a class="btn_a" href="<?php the_permalink();?>">Read More <span><i class="fa fa-arrow-right"></i></span> </a></div>  <!--End blog_link-->
            
          </div>
          <!--End doctor_profile_warpper--> 
          
        </div>
      </div>
      <?php
 $post_doc++;            

     endwhile; // End of the loop.
	 
	                                             global $wp_rewrite;
                                            $paginate_base = get_pagenum_link(1);
                                            if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
                                                $paginate_format = '';
                                                $paginate_base = add_query_arg('paged', '%#%');
                                            } else {
                                                $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
                                                    user_trailingslashit('page/%#%/', 'paged');;
                                                $paginate_base .= '%_%';
                                            }

                                            echo '<div aria-label="Page navigation blog_Page" id="pagination" class="col-lg-12 doctor_pagination"> <ul class="pagination justify-content-center ">';

$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  if ( 1 === $paged) {

 echo '<span aria-hidden="true"><i style="font-size:18px; line-height: 0;" class="fa">&#xf104;</i></span> <span class="sr-only">Previous</span>'; 

} 

                                            echo paginate_links( array(
                                                'base' => $paginate_base,
                                                'format' => $paginate_format,
                                                'total' => $wp_query->max_num_pages,
                                                'mid_size' => 1,
                                                'current' => ($paged ? $paged : 1), 
                                                'type' => '',
                                     	    	'prev_text' => __('<span aria-hidden="true"><i style="font-size:18px; line-height: 0;" class="fa">&#xf104;</i></span> <span class="sr-only">Previous</span>'),
                                                'next_text' => __('<span aria-hidden="true"><i style="font-size:18px; line-height: 0;" class="fa">&#xf105;</i></span> <span class="sr-only">Next</span>'),
                                            ));


if ( $wp_query->max_num_pages ==  $paged   ) {

  echo '<span aria-hidden="true"><i style="font-size:18px; line-height: 0;" class="fa">&#xf105;</i></span> <span class="sr-only">Next</span>';

}
                                            echo "</ul></div>";

//  echo $post_doc; 
     ?>
     
    </div>
  </div>
</section>
<!-- end  blog_list-->

<script> 

$(document).ready(function(e) {
    
	 var mql = window.matchMedia("screen and (min-width: 768px)")
if (mql.matches){ // if media query matches
  jQuery(document).ready(function(e) {
	  jQuery('.blog_list').each(function(){  
       var highestBox = 0;
       jQuery('.doctor_profile', this).each(function(){
         if(jQuery(this).height() > highestBox) {
          highestBox = jQuery(this).height(); 
        }
      });  
      	    jQuery('.doctor_profile',this).height(highestBox); 
    }); 
});
}

	
	
	
});


</script>



<?php  while ( have_posts() ) : the_post(); ?>


<?php endwhile; ?>
<?php get_footer();  ?>
