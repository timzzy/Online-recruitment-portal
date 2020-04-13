	<?php
		
		
		//$lo= (($r==1)?'one'):(($r==2)?'two'):(($r==3)?'three'):'none';
		//echo $lo;
		//die;
		 	
		$pagetitle="Upload Vision- Job Portal";
		include_once('pages/header.php');



	
		
?>	


		<div class="ocontainer main ">
	<div class="orow">

		<h1 class="padg10 bmaroon">
			<img src="images/logo_oau.png" width="100" height="100">
		Upload Your Vision for the University Here</h1>
		
</div>
			

		<div class="w3_agile_main_grids">
			<div class="oagileits_w3layouts_main_grid bwhite padg20">

					
              <?php

				$result=$handle->getallrow('typee','MEMBER','members','member_id','D');
				while($row=fetcharray($result)){
				$name= $row['title']." ".$row['lname']." ".$row['fname']." ".$row['oname'];
				$mid= $row['member_id'];
				$birth_cert=$row['birth_cert'];
				$academic_upload=$row['academic_upload'];
				$cv=$row['cv'];
				$picture=$row['picture'];

              	//$dir= mkdir("APPLICANTS/".$mid.$name,0777,TRUE);
				@$copy1= copy($birth_cert, 'APPLICANTS/'.$birth_cert);//copy birth cert

				//Lets get the member visions
				$result2=$handle->getallrow('member_id',$mid,'vision','rec_id','D');
				foreach ($result2 as $row2) {



				}//Ends:;foreach



				 }//Ends: while



				
              	//$dir= mkdir("APPLICANTS/".$mid.$name,0777,TRUE);
				//$copy= copy('fo1/'.$h, 'fo2/'.$h);


              ?>

       		
        <!-- **********************************Ends: the Bar Code -->

					<!--//my contents-->



			</div>
		</div>
		

<?php include_once('pages/footer.php');?>