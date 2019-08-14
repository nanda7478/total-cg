<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<style type="text/css">
	.error_main { text-align: center;     padding-top: 50px;
    padding-bottom: 120px; 	}
	.error_main h3 {  font-family: 'din_condensedbold'; font-size: 192px; text-transform: uppercase;
	line-height: 120px;
    max-width: 660px;
    width: 100%;
    margin: 0 auto;
    border-bottom: 1px solid #EEB515; padding-top: 19px;
	 }
	.error_main h3 span { display: block;  font-size: 95px;     line-height: 99px;  }
	.error_main p { font-size:21px;   line-height:25px; margin: 17px 0 30px;  }
	.error_main p span { display: block;  } 

	.error_main p a { color: #000;     border-bottom: 2px solid #929191;       }
	.error_main p a:hover { border-bottom: none;  }

</style>
<section id="about_img" class="about_intro_ing">

<img src="<?php if ( $image ) 
     { echo $image[0]; } 
    else { echo get_template_directory_uri ().'/image/img_header__404Error.jpg'; }  ?>"> 
</section>

	<section id="primary" class="content-area error_page">
		 <div class="container">
		 	
		 	<div class="col-md-8 offset-md-2 error_main">
		 		 <h3>404 <span> Error </span></h3>
                 <p>Whoops! The page you are looking for does not exist
<span> Please visit our <a href="<?php echo get_permalink( get_page_by_title( 'Home' ) )?>">home</a> page.</span> </p>
		 	</div>

		 </div>


	</section><!-- #primary -->

<?php
get_footer();
