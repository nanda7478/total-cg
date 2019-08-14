<?php /*
Template Name: Home Page

*/
get_header();
  $career_apply_title = get_field('career_apply_title');
  $career_apply_content = get_field ('career_apply_content');
  ?>
 
 
<section class="main_silder"> 
  <div class="home_slider"> 

<?php
if( have_rows('slider_home') ):
    while ( have_rows('slider_home') ) : the_row(); ?>

        <div class="side_img">
          <img src="<?php  the_sub_field('slider_image'); ?>">
      <div class="slide_txt">
        <h3> <?php  the_sub_field('slider_title'); ?></h3>
        <p> <?php  the_sub_field('slider_content'); ?></p>
        <a href=" <?php  the_sub_field('slider_button_link'); ?>"> <?php  the_sub_field('slider_button_text'); ?></a> </div>
    </div>

<?php     endwhile;
endif;?>


    </div> 

  <!--end home_slider--> 
  <!--<a class="tr_link" href="#about"></a>--> </section>

<section id="about" class="about_services">
  <div class="container about_services_text">
    <h2><?php the_field('nationwide_service_title')?></h2>
    <div class="row">


<?php
if( have_rows('nationwide_service_list') ):
    while ( have_rows('nationwide_service_list') ) : the_row(); ?>

        <div class="col-6 col-md-3 services_fea">
        <div class="about_services"><a href="<?php  the_sub_field('nationwide_service_link'); ?>"><img src="<?php  the_sub_field('nationwide_service_icon'); ?>"></a></div>
        <h3><a href="<?php  the_sub_field('nationwide_service_link'); ?>"> <?php  the_sub_field('nationwide_service_name'); ?> </a></h3>
      </div>
      

<?php    endwhile;
endif;?>

    </div>
  </div>
  </div>
</section>
<!-- end about_services -->

<section id="services" class="fea_service">
  <div class="container info_services">
    <h2><?php the_field('offers_service_title')?> </h2>
    <div class="row info_list">
    
    <?php

 if( have_rows('offers_service_list') ):
 
 $servicelist= 0;
 
     while ( have_rows('offers_service_list') ) : the_row(); ?>
   
    <?php  if ($servicelist % 2 == 0) { ?>
   <div class="col-md-6 info_list_left">
        <ul>
          <li class="info_list_wrapper">
            <div class="fea_icon"><a href="<?php the_sub_field('offers_service_link'); ?>"> <img src="<?php  the_sub_field('offers_service_icon'); ?>" alt=""></a></div>
            <div class="fea_txt">
              <h4> <a href="<?php the_sub_field('offers_service_link'); ?>">    <?php the_sub_field('offers_service_title'); ?> </a></h4>
              <p>  <?php the_sub_field('offers_service_content'); ?> 
                </p>
            </div>
          </li>
        </ul>
      </div>
   
     <?php } else {   ?>
   
   <div class="col-md-6 info_list_right">
        <ul>
          <li class="info_list_wrapper">
            <div class="fea_txt">
              <h4><a href="<?php the_sub_field('offers_service_link'); ?>"> <?php the_sub_field('offers_service_title'); ?> </a> </h4>
              <p> <?php the_sub_field('offers_service_content'); ?> </p>
            </div>
            <div class="fea_icon"><a href="<?php the_sub_field('offers_service_link'); ?>"><img src="<?php  the_sub_field('offers_service_icon'); ?>" alt=""></a></div>
          </li>
        </ul>
      </div>
      
     <?php } ?>

    <?php $servicelist++;

     endwhile; 
endif; ?>
            </div>
  </div>
</section>

<!-- End fea_wrapper -->
 
<section id="client" class="client_wrapper">
  <div class="container">
    <h2> <?php the_field('client_wrapper_title') ?></h2>
   <div class="client_view">
     
          
<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
<?php $args = array(
           'post_type' => 'client' ,
           'order' => 'ASC' ,
           'posts_per_page' => -1,
     //  'orderby'=>'title',
           'paged' => $paged, 
                        ); ?> 
      <?php query_posts($args); ?>
      <?php 
 
 while ( have_posts() ) : the_post(); 
   
   $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 
   
   ?>
   
   <div class="client">
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
<!--End client_wrapper-->

<style type="text/css">
  
 
</style> 
<section id="posting" class="posting_wrapper">
  <div class="container">
    <div class="row">



      <div class="col-md-12 posting_heading">
        <h2><span> <?php echo $career_apply_title; ?> </span></h2>
        <p><?php echo $career_apply_content; ?> </p>
      </div>



      <div class="col-md-12 career_post"> 
        
        <!--Accordion wrapper-->
        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true"> 
          

    <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
<?php $args = array(
           'post_type' => 'career' ,
           'order' => 'ASC' ,
           'posts_per_page' => 4,
      // 'orderby'=>'title',
           'paged' => $paged, 
                        ); ?> 
      <?php query_posts($args); ?>
      <?php 
 $career_count= 1;
 
 while ( have_posts() ) : the_post();  ?>
    
          <!-- Accordion card -->
          <div class="card"> 
            
            <!-- Card header -->
            <div class="card-header career_post_title" role="tab" id="headingOne<?php echo $career_count;?>"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne<?php echo $career_count;?>" aria-expanded="false" aria-controls="collapseOne<?php echo $career_count;?>">
              <h5 class="mb-0"> <?php the_title();?> 
               <!--  <i class="fa fa-minus rotate-icon"></i><i class="fa fa-minus "></i> -->
       
          <div class="add_arr">
        <span class="one_arrow rotate_d"></span>
         <span class="one_arrow"></span>
    </div>   

               <span><?php the_field('career_locations')?></span> </h5>
              </a> </div>
            
            <!-- Card body -->
            <div id="collapseOne<?php echo $career_count;?>" class="collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $career_count;?>" data-parent="#accordionEx">
              <div class="card-body career_post_post">
                <?php the_content();?>
                <a href="<?php the_permalink();?>">APPLY</a> </div>
            </div>
          </div>
          <!-- Accordion card --> 
 
           
<?php
 $career_count++;
     endwhile; // End of the loop.
     ?>
   
          
        </div>
        <!-- Accordion wrapper --> 
        
      </div>
      <div class="col-md-12 more_btn"> <a href="<?php echo get_permalink( get_page_by_title( 'Work with Us' ) )?>">MORE AVAILABLE POSITIONS</a> </div>
    </div> 
  </div>
</section>

<!--End posting_wrapper-->

<?php get_footer(); ?>
 