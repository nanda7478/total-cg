<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>



    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/slider/slick.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/slider/slick-theme.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/awesomefont/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/Custom.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet">
    <script src="<?php echo get_template_directory_uri(); ?>/js-main/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js-main/popper.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js-main/bootstrap.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/slider/slick.min.js"></script>
     <script src="<?php echo get_template_directory_uri(); ?>/js-main/jquery.sameheight.min.js"></script> 
     <link rel="stylesheet" href="https://use.typekit.net/rdr3tay.css">
     

    <!--   <script type="text/javascript">
 jQuery(window).scroll(function(){
 var header_h = jQuery (".main_header").height();
    if (jQuery(window).scrollTop() >= header_h  ) {
       jQuery('.main_header').addClass('affix');
      var header_ht = jQuery (".header_top").height();
     jQuery('body').css('padding-top', header_h);
//     jQuery('.header_top').css('display', 'none');
//     jQuery('.into-warpper').css('margin-top','99px');
    }
    else {
       jQuery('.main_header').removeClass('affix');
      jQuery('body').css('padding-top', '0');
//    jQuery('.header_top').css('display', 'block');
//     jQuery('.into-warpper').css('margin-top','0px');
    }
}); 
</script>  -->
    <script>
    function openNav() { 
        document.getElementById("mySidenav").style.left = "0";
         document.body.classList.add("noscroll");
        document.getElementById("wpadminbar").classList.add('fixed_top');
    }
    
    function closeNav() {
        document.getElementById("mySidenav").style.left = "-70%";
      document.body.classList.remove("noscroll");
         document.getElementById("wpadminbar").classList.remove('fixed_top');
    }
    </script>
<script>
 jQuery(document).ready(function(){
  jQuery('.hidden-links, .mobile-parent-nav-menu-item, .main-menu-more').remove();
  jQuery('.menu_wrapper ul li').each(function (){
    if(jQuery(this).find("ul").hasClass("sub-menu")){
        jQuery(this).append("<section class='sub_menus'><div class='container add_sub'></div></section>");   
       var text12 = jQuery(this).children(".sub-menu").html();
   jQuery(this).find(".add_sub").append(text12);
   jQuery(this).children(".sub-menu").remove();
 }
  
 var mql = window.matchMedia("screen and (max-width: 767px)")
 if (mql.matches){  
if (jQuery(this).hasClass("menu-item-has-children")) {
    jQuery(this).append("<i class='fa menu_sub_show'>&#xf107;</i>");
    jQuery('.sub_menus').hide();
   
}
 } 
   });
  jQuery('.menu-item-has-children .menu_sub_show').click(function() {
 // jQuery('.sub_menus').hide();
  jQuery(this).parent().find('.sub_menus').toggle();
// jQuery(this).parent().find('.sub_menus').show();
});
});
</script> 
    
    </head>
    <body <?php body_class(); ?>>
<div id="page" class="site">
<header class="main_header">
      <section class="logo_section">
    <div class="container">
          <div class="row">
        <div class="col-md-12 logo_wrapper"><a href="<?php echo get_site_url(); ?>"> <img src="<?php the_field('logo_image', 'option'); ?>"> </a></div>
      </div>
        </div>
  </section>
      <section class="menu_section">
    <div class="container">
          <div class="row">
        <div class="col-md-12 menu_must">
              <div class="menu_wrapper">
            <div id="mySidenav" class="sidenav"> <a href="javascript:void(0)" class="closebtn m_view" onclick="closeNav()">&times;</a>
                  <?php 
      wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'container_class' => 'menu',
                    'container_id' => '',
                    'menu_class'    => 'table_menu',
                    'menu_id'      => '',  
                                
                   ) ); ?>
                </div>
            <span class="main_icon m_view" onclick="openNav()">&#9776; </span> </div>
              <div class="social_wrapper">
            <?php $social_media = get_field('social_media' , 'option'); ?>
            <ul>
                  <li> <a target="_blank" href="<?php echo $social_media['facebook_link'];  ?>"> <i class="fa fa-facebook"></i> </a> </li>
                  <li> <a target="_blank" href="<?php echo $social_media['twitter_link'];  ?>"> <i class="fa fa-twitter"></i></a> </li>
                  <li> <a target="_blank" href="<?php echo $social_media['linkedin_link'];  ?>"> <i class="fa fa-linkedin"></i></a> </li>
                </ul>
          </div>
            </div>
      </div>
        </div>
  </section>
    </header>
