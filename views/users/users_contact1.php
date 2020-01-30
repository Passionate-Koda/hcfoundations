<!--breadcumb start here-->
<?php
$page_name = "anything";
$page_title = "Contact Us";
 include "includes/header.php";
 if(array_key_exists("submit", $_POST)){
   $email = $_POST['email'];
   $name = $_POST['name'];
   $message = $_POST['comment'];

   $to = "KIMTEYGhandle@gmail.com";
   $subject = "Message From $name to Hathany Cosmos Foundations";
   $txt = $message. "<hr>the email to this message is $email";
   $headers = "From: $email" . "\r\n" .
   "CC: banjimayowa@gmail.com";
mail($to,$subject,$txt,$headers);
   if(mail($to,$subject,$txt,$headers)){
$message = [];
$message['success'] = "Message Sent Succesfully";
}else{
$message = [];
$message['success'] = "Message cannot be sent at this moment";
}
 }
 ?>



<section class="banner-inner-sec" style="background-image:url('images/ban.jpg')">
	<div class="banner-table">
		<div class="banner-table-cell">
			<div class="container">
				<div class="banner-inner-content">
					<h2 class="banner-inner-title">Contact Us</h2>
					<ul class="xs-breadcumb">
						<li><a href="index"> Home  / </a> Contact</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--breadcumb end here-->
<!-- header about inner section -->


<!-- header company timeline section -->


<!-- header team section -->


<!-- header ready to contact section -->
<!-- <section class="ready-to-contact section-padding" style="background: url(asset/images/about/ready-to-contact.jpg) no-repeat center center /cover"> -->
    <div class="container" >
       <div class="row">
           <div class="col-md-6 "  style="margin-top:20px; margin-bottom:50px">

							 <div class="composs-panel-title">
								 <h3>Contact us</h3>
							 </div>

							 <div class="composs-panel-inner">
								 <div class="comment-form">
									 <div id="respond" class="comment-respond">

										 <form action="#" method="post" class="comment-form">
											 <div class="alert-message ot-shortcode-alert-message alert-green">
												 <strong>Send Us A Message</strong>
											 </div>
                       <?php if(isset($message['success'])){ ?>
											 <div class="alert-message ot-shortcode-alert-message alert-red">
												 <strong><?php echo $message['success'] ?></strong>
											 </div>
                     <?php } ?>
											 <!-- <div class="alert-message ot-shortcode-alert-message">
												 <strong>Warning! This a warning message</strong>
											 </div> -->
											 <div class="well">
												 <p class="contact-form-user">
													 <label class="label-input">
														 <span>Name<i class="required">*</i></span>
														 <input type="text" class="form-control" placeholder="Nickname" name="name" value="" required>
													 </label>
												 </p>
												 <p class="contact-form-email">
													 <label class="label-input">
														 <span>E-mail<i class="required">*</i></span>
														 <input type="email" class="form-control" placeholder="E-mail" name="email" value="" required>
													 </label>
												 </p>
												 <p class="contact-form-comment">
													 <label class="label-input">
														 <span>Message text<i class="required">*</i></span>
														 <textarea name="comment" class="form-control" placeholder="Message text" required></textarea>
													 </label>
												 </p>
												 <p class="form-submit">
													 <input name="submit" type="submit" id="submit" class="btn"  value="Send this message">
												 </p>
											 </div>
										 </form>
									 </div>
								 </div>
           </div>
       </div>
    </div><!-- .container end -->
</section><!-- End ready to contact section -->


<!-- footer section start -->
 <?php include "includes/footer.php"; ?>

<script src="asset/js/jquery-3.2.1.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/jquery-mixtub.js"></script>
<script src="asset/js/jquery.magnific-popup.min.js"></script>
<script src="asset/js/owl.carousel.min.js"></script>
<script src="asset/js/navigation.js"></script>
<script src="asset/js/jquery.appear.min.js"></script>
<script src="asset/js/isotope.js"></script>
<script src="asset/js/wow.min.js"></script>
<script src="asset/js/main.js"></script>

</body>

<!-- Mirrored from html.xpeedstudio.com/bagan/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 19:18:56 GMT -->
</html>
<!-- footer section end -->
