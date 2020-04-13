<?php
		

	$pagetitle="Complaint- OAU Job Portal";
	include_once('pages/header.php');


				//NOW LETS PROCESS THE CONTACT FORM

				if (isset($_POST['sub_complaint'])) {
										
								$name = mystrip(mysqli_real_escape_string($con, $_POST['name']));
								$phone = mystrip(mysqli_real_escape_string($con, $_POST['phone']));
								$email = mystrip(mysqli_real_escape_string($con, $_POST['email']));
								$dmessage = mystrip(mysqli_real_escape_string($con, $_POST['message']));
								$subject = mystrip(mysqli_real_escape_string($con, $_POST['subject']));
								$timer=time();
								$ad=date('Y-m-d');
                 				$at=get_time();

                 					

                 			if (isset($phone)) {
		           					if((strlen($phone)< 1) || (strlen($phone) > 50)){
		         						display_error('Wrong Phone number, please check your phone number');
		        					}

		        					if (!is_numeric($phone)) {
		        					display_error('Wrong Phone number, only numbers are permitted');
		        					}
		                 	}
					       		
					   		

               if (is_uploaded_file($_FILES['pic']['tmp_name'])) {//picture
                 $target="admin/gallery";
		         $p = $_FILES['pic']['type'];
		         $pi = explode("/",$p);
		         if ($pi[0] != "image") {
		         //display_error("The file you want to upload can only be an image. To correct this please try to Edit the record");
		         }

		         $siz=$_FILES['pic']['size'];
                  if ($siz > 10485760 ) {// 20Mb 26214400   10Mb-- 10485760 
                    display_error(' Academic Qualification File Size too big, Max of 10Mb Uploads');
                  }
		         $uiname = "COMPLAINT-".$name."-".$timer."-".basename($_FILES['pic']['name']); // true name of image
               // copy the temp document to the place for storage
                $move_aca= move_uploaded_file($_FILES['pic']['tmp_name'], $target . "/" .$uiname);
               if (!$move_aca) {
                	display_error('The File You attached was not uploaded succefully. ');
                }
               //prepare document for database
               // prepare new name for picture
               $newpic = $uiname;
               $filestore = $target ."/".$newpic;
               $filest="gallery/".$newpic;
               if(!$filestore){
               echo "picture not successfully uploaded".'<br />';//display_success("picture successfully uploaded");
               }
               /*********************************************************************************************/
             
               }//end of if(is_uploaded: picture)
               else{
               	$filest="";
               }



                $insertion = mysqli_query($con,"INSERT INTO messages(picture,name,phone,email,subject,message,date_added,time_added,typee,status) VALUES('$filest','$name','$phone','$email','$subject','$dmessage','$ad','$at','COMPLAINT','UNREAD')") or die("Cannot insert into the user table");			
                 		
                 		if ($insertion) {

                 			//************************* Starts: log the complaint
                 	$ddate = date('dS, F Y');
					$action_taken = "-->   '". $name . "' with phone no ". $phone." and email ". $email. "  logde a complaint on  ". $ddate ." at ".$at." with the details ". mss($dmessage,0,30)."[...]";
					writeToFile($action_taken,'admin/logs/complaint.txt');
                 	//************************* Endss: log the complaint





            /************************  //STARTS MAIL SENDING  to the user********************************************************/
                  
                      
                    //set the parameters
      $to =$email;
      $subject ='Complaint Details Submission';
      $from = 'no-reply@apply.oauife.edu.ng';

     

      //To send HTML mail, the Content-type header must be set
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

      // Create email headers
      $headers .= 'From: '.$from."\r\n".
              'Reply-To: '.$from."\r\n" .
              'X-Mailer: PHP/' . phpversion();

       

      // Compose a simple HTML email message

      $message = '<html><body>';
      $message .= '<img src="https://apply.oauife.edu.ng/images/logo_oau.png" width="120" height="125"/><br>';
      $message .= '<h1 style="color:#f40;">Dear '. $name .',</h1>';
      $message .= '<p style="color:#080;"> You lodged complaint at apply.oauife.edu.ng and your details are as follows:</p>';
      $message .= '<p><b>Phone: </b>'. $phone.'</p>';
      $message .= '<p><b>Subject: </b>'. $subject.'</p>';
      $message .= '<p><b>Message: </b><br>'. $dmessage.'</p>';
      $message .= '<p><b>Date Submitted: </b>'. $ad.'</p>';
      $message .= '<p><b>Time Submitted: </b>'. $at.'</p>';
      $message .= '<p><b>Delivered to: </b>'. $email.'</p><br>';
      $message .= '<h3 style="color:#080;font-size:18px;">Best Regards<br> Obafemi Awolowo University</h3>';
      $message .= '<small style="color:#080;font-size:14px;">&copy; '. date('Y').'</small>';
      $message .= '<center><h3 style="color:#f40;font-size:16px;">Great Ife! ... for learning and culture</h3></center>';
      $message .= '</body></html>';


      // Sending email

      if(@mail($to, $subject, $message, $headers)){
         // echo 'Your mail has been sent successfully.';
      } else{
          ///echo 'Unable to send email. Please try again.';
      }

            /********************************** //ENDS: MAIL SENDING to member**********************************************/

                 		

                 			
                	ezzzy_msg("Success","Your Complaint has been successfully submitted, We shall get in touch with you as soon as possible.","3000");
                 				
                 		}//ends insertion


			}//ends if the contact is clicked 


 

?>
		<div class="ocontainer main">
	<div class="orow">
		<h1 class="padg10 bmaroon">
			<img src="images/logo_oau.png" width="100" height="100">
			Kindly Fill Out the Forms Below</h1>
		<div class="w3_agile_main_grids">
			<div class="oagileits_w3layouts_main_grid bwhite padg20 pt30">
					<!--my contents-->

						<!--<center>	
						<div style="color:#c6ec2d;">
						<h1 style="font-size:23px; color:#c6ec2d;">Congratulations!!! <br>Your Application is Submitted Succefully</h1>
						<p class="font20">You will be contacted Shortly.</p>
						</div>
						</center>-->



                            <?php
                            		
                                   $sta=mysqli_query($con,"SELECT * from reg_form  where typee='FORM_STATUS'  order by rec_id  desc limit 1 ")or die('Unable');
                                 $row=mysqli_fetch_array($sta);
                                 $dstatus=$row['status'];
                                 if (countrows($sta) == 0) {
                                //insert into the table if record not found
                                mysqli_query($con, "INSERT into reg_form(typee,status)values('FORM_STATUS','ACTIVE') ");
                              }//ends: If
                                 //show form if status is active
                                 if ($dstatus=="ACTIVE") {
                                 
                            ?>
						  
						<form action="./?rdr=complaint" method="post" enctype="multipart/form-data">

					<div class="col-md-2"></div>
					<div class="col-md-7  pt30 agile_main_grid_left">

							<center><h3>Kindly, Submit your complaint here and we shall get in touch with you</h3></center><hr>

											

							<div class="oform-group">
							<label>Your Name:</label>
							<input type="text" name="name" id="" placeholder="" required="">
							</div>

							<div class="oform-group">
							<label>Email:</label>
							<input type="text" name="email" id="" placeholder="" required="">
							</div>

							<div class="oform-group">
							<label>Phone Number:</label>
							<input type="text" name="phone" id="" placeholder="" required="">
							</div>


							<div class="formr-group">
							<label>Subject:</label>
							<input type="text" name="subject" id="" placeholder="" required="">
							</div>


							<div class="formr-group">
							<label>Complaint Details:</label>
							<textarea name="message" required id="mess" class="form-control" rows="8" class="form-control"  style="height:150px;"></textarea><br>
                                 <script language="javascript1.2">
                                  ogenerate_wysiwyg('');
                              </script><br>
							</div>
							

							<div class="forrm-group">
							<label>Attach File relevant to complaint (optional) <br><small  class="font14 red tc">( (Max Upload Size 10Mb):: File format: Pdf or image) </small></label>
							<input type="file" name="pic" accept="application/pdf,image/*" class="form-control">
							</div><br>

					<input type="submit" value="Submit Complaint" class="padg10 bgreen" name="sub_complaint"><br>

					</div>
				
					<div class="clear"> </div>

					<p></p>
				</form>


					<section class="mb30 mt30"><br><hr>
						<center>
							<a href="./?rdr=home" class="bred padg10 white lh25"><i class="fa fa-upload"></i> &laquo; Back Home</a>&nbsp;&nbsp;
							
						</center>
					</section>

					<?php

						}//end: if form status is active
						else{
							header("Refresh: 10; url=./?rdr=home");
							echo '<center>No current recruitment registration at the moment, You will be redirected to home page in <span id="countdowntimer">10 </span> seconds</center>'; 
						}//ends: Else Inactive form
					?>



					<!--//my contents-->


			</div>
		</div>

<?php include_once('pages/footer.php');?>