<?php /* Template Name: FAQ Page  */
get_header();

$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 
 
?> 
 

<?php  while ( have_posts() ) : the_post(); ?>

<section id="work_img" class="about_intro_ing">

<img src="<?php if ( $image ) 
     { echo $image[0]; } 
    else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
</section>

<section id="work_us" class="work_us_main">
  
  <div class="container">
    <div class="row">
      <div class="col-md-12 work_us_txt">
        <h1> <span><?php the_title(); ?></span></h1>
         <?php the_content();?> 

      </div>

    </div>

  </div>

</section>



<?php endwhile; ?>

<section id="posting" class="posting_wrapper">
  <div class="container">
    <div class="row">



       



      <div class="col-md-12 career_post at_work"> 
        
        <!--Accordion wrapper-->
        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true"> 
      
      
         
                 

  
<?php if( have_rows('faq_list') ):
$career_count= 1;
    while ( have_rows('faq_list') ) : the_row(); ?>

        
  <?php // the_sub_field('sub_field_name');  ?>


 
    
          <!-- Accordion card -->
          <div class="card"> 
            
            <!-- Card header -->
            <div class="card-header career_post_title" role="tab" id="headingOne<?php echo $career_count;?>"> <a class="<?php if($career_count == 1){ echo ''; }else{ echo 'collapsed';} ?>" data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne<?php echo $career_count;?>" aria-expanded="false" aria-controls="collapseOne<?php echo $career_count;?>">
              <h5 class="mb-0"> <?php the_sub_field('faq_title');?> 
               <!--  <i class="fa fa-minus rotate-icon"></i><i class="fa fa-minus "></i> -->
       
          <div class="add_arr">
        <span class="one_arrow rotate_d"></span>
         <span class="one_arrow"></span>
    </div>   

                 </h5>
              </a> </div>
            
            <!-- Card body -->
            <div id="collapseOne<?php echo $career_count;?>" class="collapse <?php if($career_count == 1){ echo 'show'; } ?>" role="tabpanel" aria-labelledby="headingOne<?php echo $career_count;?>" data-parent="#accordionEx">
              <div class="card-body career_post_post">
                <?php the_sub_field('faq_content');?>
                 </div>
            </div>
          </div>
          <!-- Accordion card --> 
 
           
 <?php
 $career_count++;
    endwhile;
endif;
 
   
     ?>

          
          
           
          
          
         </div> 
           
          
        </div>
        <!-- Accordion wrapper --> 
        
      </div>
     
    </div>
  </div>
</section>























<?php get_footer();?>