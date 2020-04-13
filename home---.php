<?php
		
		$pagetitle="Home- Job Portal";
	include_once('pages/header.php');

?>
<body>
	<div class="main">
		<h1>Employee Application Form</h1>
		<div class="w3_agile_main_grids">
			<div class="agileits_w3layouts_main_grid">
					<!--my contents-->
						<center><h1 class="black" style="color:#000000">Welcome to Job Application Form </h1></center>

							<a href="./?rdr=start1" class="btn btn-success">Proceed &raquo;</a>

					<!--//my contents-->


			</div>
		</div>
		<div class="agileits_copyright">
			<p>© 2017 Employee Application Form. All rights reserved <a href="http://w3layouts.com/" target="_blank"></p>
		</div>
	</div>
	<script src="js/filedrag.js"></script>
	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}
		function validatePassword(){
			var pass2=document.getElementById("password2").value;
			var pass1=document.getElementById("password1").value;
			if(pass1!=pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');	 
				//empty string means no validation error
		}
	</script>
	<!-- start-date-piker-->
		<script src="js/jquery-ui.js"></script>
		<script>
			$(function() {
			$( "#datepicker" ).datepicker();
			});
		</script>
	<!-- //End-date-piker -->
</body>
</html>