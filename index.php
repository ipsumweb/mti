<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>

<body>
<?php include 'topnav.php'; ?>

<div class="container"> 
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-sm-3 hidden-xs" style="padding-right: 0px;">
      <img class="img img-responsive" src="_images/home-page-sidebar.png" />
    </div>
    <div class="col-sm-9 col-xs-12" style="padding-left: 0px;">
		<img class="img img-responsive" src="_images/home-page-top.png" />
		<div style="padding-left: 25px">
    <h1>Hand Lay-Up Fiberglass Reinforced Plastic Laminate (FRP) Online Training</h1>
      <h2>Online Training</h2>  
      
      <p>This course was created by the Materials Technology Institute: a non-for-profit technology development organization that maximizes performance by providing global leadership in materials technology to improve safety, reliability, sustainability and profitability. </p>
	  <p>
		  <span data-toggle="modal" data-target="#myModal">
		  <img class="img img-responsive" src="_images/home-page-get-started.png" />
	  	</span>
	  </p>
		
		<div class="row" style="margin: 40px 0; margin-left: -15px;">
			<div class="col-sm-4">
					<a  href='http://www.mti-global.org' target="_blank">
						<img class="img img-responsive center-block" src="_images/home-page-icon-star.png" />
					</a>

			</div>

			<div class="col-sm-4">
				
					<a  href='https://marketplace.mimeo.com/mtiglobal#name=13' target="_blank">
						<img class="img img-responsive center-block" src="_images/home-page-icon-book.png" />
					</a>

			</div>			

			
			<div class="col-sm-4">

					<a href='mailto:mtiadmin%40mti-global.org?subject=Contact%20me%20when%20new%20training%20is%20available' target="_blank">
						<img class="img img-responsive center-block" src="_images/home-page-icon-info.png" />
					</a>

			</div>
			
		</div>
		
		<div class="row" style="margin: 40px 0; margin-left: -15px;">
			<div class="col-sm-12">
				<a href="http://www.mti-frptraining.org/" target="_blank">
					<img class="img img-responsive" src="_images/home-page-clickable.png" />
				</a>
			</div>
		</div>
		
		
		<div class="row" style="margin: 40px 15px 40px 0px; ">
			<div class="col-sm-12" style="background: #d9eaf6; padding: 20px;">
				<div class="row">
					<div class="col-sm-6">
						<p class="lead">
						Location and contact info?
						</p>
					</div>
					<div class="col-sm-6 text-right">
						<a href="http://mti-global.org/" class="lead" target="_blank">
					mti-global.org
						</a>
					</div>
				</div>
			</div>
		</div>
		  
	
	  

	  
	  <!-- <p style="text-align: right;"><a class="btn btn-default" href="frp-training-slide1.php" role="button">Get started &raquo;</a></p> -->
	  
  		</div><!-- end misc styling div -->
	  
    </div><!-- end col sm 9-->
  </div>
  <hr>
  <footer>
    <p>&copy; <?php echo date('Y'); ?> PACE Oregon State in collaboration with <a href='http://www.mti-global.org' target="_blank">MTI Inc.</a><br>Credit for picture and video for this course: RL Industries, PITSA, and Maverick Applied Science Inc.</p>
  </footer>
</div>
<!-- /container -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <h2 class='page-header text-center'>
      	Thank you for your interest in MTI's<br>
        <span class='text-info'>Hand Lay-Up Fiber Reinforced Plastic Laminate</span> Online Demo Course!
      </h2>
      
      <p>To continue, please enter your email address below.</p>
      
<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({ 
    portalId: '451937',
    formId: 'f761589b-0444-4a78-a5d0-872c1e1b0f81'
  });
</script>


      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->

</body>
</html>
<style type='text/css'>
.modal .page-header {margin-top: 0px;}
ul.has-error {display:none !important;}
</style>

<script>
$(document).ready( function() {
	//var no_form = window.location.hash.substr(1);
    
    //if( ! no_form )
        //$('#myModal').modal('show');
		
		$('#myModal').on('hidden.bs.modal', function (e) {
			console.log('hidden, woo');
		})
});
</script>