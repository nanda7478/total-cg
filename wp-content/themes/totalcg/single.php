<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<style type="text/css"> 
  
  .menu_wrapper ul li.menu-item-30:before {
    background: #f2bf18;
}
</style>
  
<section id="about_img" class="about_intro_ing"> 

<img src="http://www.demosrvr.com/wp/total-cg/wp-content/uploads/2019/01/img_header_Blog.jpg"> 
</section>

<div class="container back_hot">
 <a href="<?php echo get_permalink( get_page_by_title( 'Blog' ) )?>" class="back-btn"><i class="fa">&#xf104;</i> Back To Blog </a>
  

  </div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="container warpper_over">
    <div class="row">
      <div class="col-md-12 blog-right">
        <?php while ( have_posts() ) : the_post();?>
        <?php echo get_the_post_thumbnail(); ?>
        <?php endwhile; ?>
        <h1 class="tittle2">
          <?php the_title();?>
        </h1>
       
       <div class="blogs_info">
        <div class="blof_date"><?php echo get_the_date('F j, Y'); ?></div>
        <div class="social_icon"> <span>SHARE</span>
          <ul>
           
            <li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"> <i class="fa">&#xf09a;</i> </a></li>

             <li class="tw"><a href="https://twitter.com/intent/tweet?text=<?php the_title() ?>&url=<?php the_permalink(); ?>" target="_blank"> <i class="fa">&#xf099;</i> </a></li>
            
          </ul>
        </div>
        </div>
         
        <?php  if( get_field('sub_title') ){ echo'<h4>'.get_field('sub_title').'</h4>';}  ?>
         


          <?php the_content(); ?>
         
      </div>


<div class="previous_arrow">
      <?php previous_post_link('%link', '<i class="fa">&#xf104;</i>PREVIOUS POST'); ?>
    </div>


   <div class="next_arrow">
      <?php next_post_link('%link', 'NEXT POST<i class="fa">&#xf105;</i>'); ?>
    </div>   


    </div>
    
  
  </div>
</article>



  <div class="fix">
    <div class="container">

      <div class="col-md-12 col-xl-10  offset-xl-1">
      <h3 class="rel_blog"> Related Blog </h3>
      <div class="more_event">
        <div class="row fix-content">
          <?php 
    $orig_post = $post;
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) :
      $category_ids = array();
      foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
      $args=array(
          'category__in' => $category_ids,
          'post__not_in' => array($post->ID),
          'posts_per_page'=> 3, // Number of related posts that will be shown.
          'caller_get_posts'=>1
      );
      $my_query = new wp_query( $args );
      if($my_query->have_posts()):?>
          <?php while( $my_query->have_posts()) : ?>
          <div class="col-sm-12 col-md-4 fix-box">
            <div class="thumb_img">  
              <?php $my_query->the_post();?>
              <?php echo get_the_post_thumbnail($post_id,'blog-thumbnails'); ?> </div>
            <div class="bolg_catins">

 <div class="blog_btn">
          
           <?php echo the_time('m.d.y'); ?>                             
          
          
       <span>   
  <?php         $category = get_the_category();
    echo  $firstCategory = $category[0]->cat_name; ?>
</span> 
           
           
          </div>
          

             <h4> <?php the_title(); ?>
              <a class="btn_a blog_read" href="<?php the_permalink();?>">Read More <span><i class="fa fa-arrow-right"></i></span> </a></h4> 

            </div>
            <!--End blog--> 
            
          </div>
          <?php  endwhile; ?>
          <?php endif; ?>
          <?php endif; ?>
          <?php $post = $orig_post;
      wp_reset_query(); ?>
        </div>
      </div>
      </div>
      
      
    </div>
  </div>
  </div>
</article>
<?php get_footer(); ?>
