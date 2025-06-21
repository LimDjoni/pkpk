<!-- Header -->
<?php $title = "Contact Us | PKPK";
$page = "hubungi-kami"; 
include 'include/header.php' ?>
<!-- Header -->
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Navbar -->
	<?php include 'include/navbar.php' ?>
	<!-- Navbar -->

	<!-- Subheader -->
	<?php include 'include/subheader.php' ?>
	<!-- Subheader -->

	<!-- Contact Section Begin -->
	<section class="contact-section spad2">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-5">
					<div class="contact-text">
						<h4>Jakarta</h4>
						<p style="white-space: pre-line;">The Bellezza Permata Hijau,
							Office Tower Lantai 15. 15 OF-1 
							Jl. Letnan Jendral Soepeno No. 34, 
							Arteri Permata Hijau, RT.005 RW.002
						Grogol Utara, Kebayoran Lama, Jakarta Selatan 12210, Indonesia.</p>
						<div class="ct-item"> 
							<div class="ct-text">
								<h5>Phone</h5>
								<ul>
									<li>021-29181077</li> 
								</ul>
							</div>
						</div>
						<div class="ct-item"> 
							<div class="ct-text">
								<h5>Email</h5>
								<p>marketing@pkpk-tbk.co.id</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7 col-md-7">
					<div class="contact-form">
						<h3>Enquiry!</h3> 
						<form id="contact-form" method="post" action="proceed" role="form">
							<input type="text" name="fullname" id="fullname" placeholder="Full Name">
							<input type="text" name="phonenumber" id="phonenumber" placeholder="Phone number">
							<input type="text" name="email" id="email" placeholder="Email Address">
							<input type="text" name="subject" id="subject" placeholder="Subject">
							<textarea name="message" id="message" placeholder="Message"></textarea>

							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LcInT8aAAAAAEap9qRoTc86qVpTMpMRP_7WiobR" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
								<input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
								<div class="help-block with-errors"></div>
								<div id="spinner" class="spinner-border text-success" role="status" style="width: 3rem; height: 3rem; display: none;">
									<span class="sr-only">Loading...</span>
								</div>
							</div>
							<div class="messages"></div>
							<button type="submit" class="site-btn">Submit</button>  
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact Section End --> 
	 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<!-- Footer -->
	<?php include 'include/footer.php' ?>
	<!-- Footer -->
</body>

</html>

	<script>
	$('#contact-form').on('submit', function (e) {
		e.preventDefault(); // Stop default form

		$('.site-btn').prop('disabled', true);
		$('#spinner').show();
		$('.messages').html('');

		$.ajax({
			type: 'POST',
			url: 'proceed.php', // make sure this path is correct
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				$('#spinner').hide();
				$('.site-btn').prop('disabled', false);
				if (response.type === 'success') {
					$('.messages').html('<div class="alert alert-success">' + response.message + '</div>');
					$('#contact-form')[0].reset();
					grecaptcha.reset(); // Reset reCAPTCHA
				} else {
					$('.messages').html('<div class="alert alert-danger">' + response.message + '</div>');
				}
			},
			error: function () {
				$('#spinner').hide();
				$('.site-btn').prop('disabled', false);
				$('.messages').html('<div class="alert alert-danger">There was a server error. Please try again later.</div>');
			}
		});
	}); 
	</script>