<?php
/* Template Name: Sub-service Page*/
get_header();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 
?>

<script type="text/javascript">
jQuery(document).ready(function() {
  var str = jQuery(".services_head_at h1 span").text();
var n = str.length;
   if (n > 32 ){ jQuery(".services_head_at h1").css('width','123%')  } 
  });
</script>
 
<?php while( have_posts() ):the_post() ?>


<section id="about_img" class="about_intro_ing">

<img src="<?php if ( $image ) 
	   { echo $image[0]; } 
	  else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
 
 </section>
 
 
 <section class="service_details">
   <div class="container">
     <div class="row">
       <div class="col-md-6 services_txt_at">
         <div class="services_head_at">
           <h1>
            <img src="<?php  if( get_field('sub_services_icon') ){ the_field('sub_services_icon');} else { echo get_template_directory_uri().'/image/fea_services.png'; } ?>" alt="no"><span> Services: <?php the_title();?> </span></h1> 
           <?php the_content();?> 
           
         </div> 
         <div class="services_body">

<?php the_field('sub_services_content')?>

           
           
         </div>
       </div>
        <div class="col-md-6 services_img">

        <div class="main_sub_img">
          <img src="<?php  if( get_field('sub_services_image') ){ the_field('sub_services_image');} else { echo get_template_directory_uri().'/image/electrical.jpg'; } ?>" alt="">
</div>


        </div>


        <div class="col-md-12 service_contat">
         <a href="<?php echo get_permalink( get_page_by_title( 'Contact Us' ) )?>?sub_service=<?php the_title();?>">For More Information, Contact Us</a> </div>
     
     </div> 


   </div>
 
 </section>
<?php endwhile; ?>

<?php get_footer();?>