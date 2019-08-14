  <?php
  /**
   * The template for displaying the footer
   *
   * Contains the closing of the #content div and all content after.
   *
   * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
   *
   * @package WordPress
   * @subpackage Twenty_Nineteen
   * @since 1.0.0 
   */

  ?>
    
     

     <footer class="footer_bootom">
         <div class="container container_max">
           <div class="row">
             <div class="col-md-12 col-lg-5 site_punch">
               <div class="copy_info"><?php the_field('copyright_information', 'option'); ?></div>
               <div class="marking_info"><?php the_field('copyright_sub_information', 'option'); ?></div>
             </div>
             <div class="col-md-12 col-lg-7 menu_footer_g"> 
             <?php 
            wp_nav_menu(
              array(
                'theme_location' => 'footer',
                'menu_class'     => 'footer-menu',
                'depth'          => 1,
              )
            );
            ?>

             <div class="social_footer">
               <?php 
             $social_media = get_field('social_media' , 'option'); 
            ?> 
             <ul>
                  <li> <a target="_blank" href="<?php echo $social_media['facebook_link'];  ?>">
                    <i class="fa fa-facebook"></i> </a> </li>
              <li> <a target="_blank" href="<?php echo $social_media['twitter_link'];  ?>">
                    <i class="fa fa-twitter"></i></a> </li>
               <li> <a target="_blank" href="<?php echo $social_media['linkedin_link'];  ?>">
                   <i class="fa fa-linkedin"></i></a> </li>
             </ul>
          </div>
             </div>
           
           </div>
         </div>
       
       </footer>


       <script>
jQuery(document).ready(function() { 
    jQuery('.home_slider').slick({ 
         autoplay: true ,
         autoplaySpeed: 4000,
        dots: false, // true , false
        infinite: true,  
      draggable: false,
     fade: true,
        arrows: true,
        speed: 1200,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
  
    jQuery('.client_view').slick({
        slidesToShow: 4,
        slidesToScroll: 4, 
     autoplay: true ,
         autoplaySpeed: 1200,
        dots: false, // true , false
        infinite: true,  
    arrows: true,
        speed: 1200, 
        responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
     }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        centerMode: true,  
        centerPadding: '0px',
     }
    },

     ]  
       
    });
  
     });
   
   </script>
   



  </div><!-- #page -->

  <?php wp_footer(); ?>

  </body>
  </html>
