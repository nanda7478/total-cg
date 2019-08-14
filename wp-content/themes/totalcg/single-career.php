<?php  
if ( ! function_exists( 'wp_handle_upload' ) ) {
  require_once ( ABSPATH . 'wp-admin/includes/file.php' );
}
require_once(ABSPATH . 'wp-admin/includes/image.php');
if($_POST['careerform'] == "Submit"){
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$streetaddress = $_POST['streetaddress'];
	$aptunit = $_POST['aptunit'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$phonenumber = $_POST['phonenumber'];
	$emailaddress = $_POST['emailaddress'];
	$selaryrequirements = $_POST['selaryrequirements'];
	$applypost = $_POST['applypost'];
    $ordertitle = $applypost.' By '.$firstname.'&nbsp;'.$lastname;

	$my_post = array(
					'post_title'    => wp_strip_all_tags($ordertitle),
					'post_status'   => 'pending',
					'post_type'	  => 'careerapply'
					);
    $my_post_id = wp_insert_post($my_post);
	if($my_post_id) 
	{
		update_post_meta($my_post_id, 'first_name', $firstname);
		update_post_meta($my_post_id, 'last_name', $lastname);
		update_post_meta($my_post_id, 'street_address', $firstname);
		update_post_meta($my_post_id, 'aptunit', $streetaddress);
		update_post_meta($my_post_id, 'city', $city);
		update_post_meta($my_post_id, 'state', $state);
		update_post_meta($my_post_id, 'zip_code', $zipcode);
		update_post_meta($my_post_id, 'phone_number', $phonenumber);
		update_post_meta($my_post_id, 'email_address', $emailaddress);
		update_post_meta($my_post_id, 'selary_requirements', $selaryrequirements);
		update_post_meta($my_post_id, 'postion_desired', $applypost);
		

					    /* upload  Cv  Start */
			  if($_FILES['uploadecv']['error'] == 0) {
			    $uploadedfile = $_FILES['uploadecv'];
			    $upload_overrides = array( 'test_form' => false );
			    $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
			    if ( $movefile && !isset( $movefile['error'] ) ) {

			      $wp_filetype = $movefile['type'];
			      $filename = $movefile['file'];
			      $wp_upload_dir = wp_upload_dir();
			      $attachment = array(
			        'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
			        'post_mime_type' => $wp_filetype,
			        'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
			        'post_content' => '',
			        'post_status' => 'inherit'
			      );
			      $attach_id = wp_insert_attachment( $attachment, $filename);
			      $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
			      wp_update_attachment_metadata( $attach_id,  $attach_data );
			      
			      
			      update_post_meta( $my_post_id, 'uploade_cv', $attach_id);
			    }  else {
			      $_SESSION['success'] .= $movefile['error'];
			    }
			  }
			  /* upload  Cv  Close */

			//  $_SESSION['success'] = "Career Apply  Successfully.";
			      wp_redirect('http://www.demosrvr.com/wp/total-cg/work-with-us-thank-you/');
			      die();

	}

}
get_header(); 


$page = get_page_by_title( 'Work with Us' );
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' ); 
// echo $page->ID;
?>

<?php  while ( have_posts() ) : the_post(); ?>
 <style type="text/css">
	.single-career .menu_wrapper ul li.menu-item-67:before {    background: #f2bf18;}
	.single-career .menu_wrapper ul li.menu-item-67 .sub_menus {  display: block;  z-index: 10; }
	  </style> 
 
 <section id="work_img" class="about_intro_ing">
<img src="<?php if ( $image ) 
	   { echo $image[0]; } 
	  else { echo get_template_directory_uri ().'/image/no_banner.jpg'; }  ?>"> 
</section>
 <section id="work_us" class="thanks_main">
		<div class="container">
			<div class="work_us_txt work_us_txt2">
				<h1> <span> Work  with us: Apply<?php // the_title(); ?></span></h1>
				<p>Please fill out the below form in its entirety and upload your resume in the box indicated to be considered.</p>
             
		<?php if(isset($_SESSION['success'])) { ?> 
			<div class="alert alert-success">
			   <?php echo $_SESSION['success']; ?>
			</div>
		<?php unset($_SESSION['success']); } ?>

		<?php if(isset($_SESSION['error'])) { ?>
			<div class="alert alert-danger">
			  <strong>Error!</strong> <?php echo $_SESSION['error']; ?>
			</div>
		<?php unset($_SESSION['error']); } ?>
			</div>	 

 <div class="work_us_form">  
<form  method="post" id="fileForm" name="fileForm" enctype="multipart/form-data">
	<div class="form_heading title_form">
		<h3>PERSONAL INFORMATION</h3>
	</div>
	<div class="form-row">
  <div class="form-group col-md-6">
    <input type="text" class="form-control" name="firstname" value="" placeholder="First Name" required>
  </div>
  <div class="form-group col-md-6">
    <input type="text" class="form-control" name="lastname" value="" placeholder="Last Name" required>
  </div>
</div>

	<div class="form-row">
 <div class="form-group col-md-6">
    <input type="text" class="form-control" name="streetaddress" value="" placeholder="Street Address" required>
  </div>
 
 <div class="form-group col-md-6">
    <input type="text" class="form-control" name="aptunit" value="" placeholder="Apt/unit">
  </div>
</div>
 
 <div class="form-row">
 <div class="form-group col-md-6">
    <input type="text" class="form-control" name="city" value="" placeholder="City" required>
  </div>
 <div class="form-group col-md-3">
<!--
 <input type="text" class="form-control" name="state" value="" placeholder="state" required>
-->
 <select class="form-control" name="state" required>
    <option value="">state</option>
    <option>Alabama</option>    <option> Alaska</option>
    <option>Arizona</option>    <option> Arkansas</option>

    <option> California </option> <option> Colorado</option>
    <option> Connecticut</option> <option> Delaware </option> 
    <option> Florida </option> <option> Georgia </option> 
    <option> Hawaii </option> <option> Idaho </option> <option> Illinois </option> 
    <option>  Indiana </option>  <option> Iowa </option> <option> Kansas </option>
    <option> Kentucky </option><option>  Louisiana </option> 
    <option> Maine </option> <option> Maryland </option> 
    <option> Massachusetts </option> <option> Michigan </option> <option> Minnesota</option>
    <option>  Mississippi </option> <option> Missouri </option>
    <option> Montana </option> <option> Nebraska </option> <option> Nevada </option>
    <option> New Hampshire </option> <option> New Jersey </option><option>  New Mexico</option> 
    <option>  New York </option> <option>  North Carolina</option>
    <option>  North Dakota </option> <option>  Rhode Island </option> 
    <option> South Carolina </option> <option>  South Dakota </option>
    <option>West Virginia </option>	
    <option>Ohio </option> <option> Oklahoma </option>
    <option>Oregon </option> <option> Pennsylvania </option>
    <option>  Tennessee </option> <option> Texas </option> <option> Utah </option>
    <option> Vermont </option> <option> Virginia </option>
    <option>  Washington </option>  <option>Wisconsin Wyoming </option>
</select> 

  </div>

  <div class="form-group col-md-3">
    <input type="number" class="form-control" name="zipcode" value="" placeholder="Zip code" required>
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
    <input type="number" class="form-control" name="phonenumber" value="" placeholder="Phone Number" required>
  </div>

<div class="form-group col-md-6">
    <input type="email" class="form-control" name="emailaddress" value="" placeholder="Email Address" required>
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-6">
<!-- <input type="text" class="form-control" name="selaryrequirements" value="" placeholder="Selary Requirements" required> -->
<select class="form-control" name="selaryrequirements" required>
    <option value="">Salary Requirements</option>
    <option>$20,000 - 35,000</option>
    <option>$35,000 - 50,000</option>
    <option>$50,000 - 65,000</option>
    <option>$65,000 - 80,000</option>
    <option>$80,000 - 100,000</option>
    <option>$100,000 +</option>
</select>
</div>

<div class="form-group col-md-6">
    <select class="form-control" name="postiondesired" required>
    <option value="">Postion Desired</option>
    <option>Account Services Coordinator</option>
    <option>Sales Representative</option>
    <option>Service Technician</option>
</select> 
  </div>
</div>
<div class="form_heading title_form">
		<h3>UPLOAD RESUME <span>(Required)</span></h3>
	</div>
<div class="form-row">
<div class="form-group col-md-6 upload_cv">
	<div class="custom-file-upload">
	<label for="uploadecv1" class="custom-file-upload1">  NO FILE CHOSEN</label>
    <input type="file" class="form-control" name="uploadecv" id="uploadecv1" required>
    <small>ACCEPTED FILE TYPES: .PDF, .DOC, .DOCX, .TXT, .ODF</small>
  </div>
  </div>
  <div class="form-group col-md-6 attached arrow_left">
    <h5 class="attachP">ATTACH <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></h5>
  </div>
</div>

  <div class="form-group">
  	<div class="submit_btn">
  <input type="hidden"  name="applypost" value="<?php the_title(); ?>">
 <input type="submit" name="careerform" value="Submit">
</div>
</div>




</form> 
</div>
  </div>
  


</section>


 
<?php endwhile; ?>

<script>

jQuery(document).ready(function() {
jQuery('#uploadecv1').change(function() {
  var i = jQuery(this).prev('label').clone();
  var file = jQuery('#uploadecv1')[0].files[0].name;
  jQuery(this).prev('label').text(file);

  var ext = $('#uploadecv1').val().split('.').pop().toLowerCase();
if($.inArray(ext, ['pdf','docx','doc','txt','odf']) == -1) {
   // alert('invalid extension!');
   jQuery('label.custom-file-upload1').css('border-color','#F00');
}
else { jQuery('label.custom-file-upload1').css('border-color','#bdbfc1');}

});
});

</script>

 
<?php get_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
<script type="text/javascript">
	jQuery('#fileForm').validate({
    rules: {
        uploadecv: {
            required: true,
            extension: "pdf|docx|doc|txt|odf",
            
        }
    }
});
</script>

 
 