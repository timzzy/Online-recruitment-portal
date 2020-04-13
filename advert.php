<?php
		

	$pagetitle="Advert- OAU Job Portal";
	include_once('pages/header.php');


 if(@$_GET['rdr']!="advert") {
		display_error('Wrong Link');
	}//ends: 
	



 

?>
	<div class="ocontainer main">
	  <div class="orow">
		<h1 class="padg10 bmaroon">
			<img src="images/logo_oau.png" width="100" height="100">
			<!--Job Advertisement--></h1>
		<div class="w3_agile_main_grids">
			<div class="oagileits_w3layouts_main_grid bwhite padg20 pt30">

					<!--my contents-->

					<center><h1 style="color:red;">Job Advertisements</h1></center><hr>		
						  
					
						<!-- ******************Starts:  TABLE ***************** -->
						 <div class="table-responsive" style="color:#000000; font-size:14px;">
               
             <table id="example" class="display table table-striped table-bordered table-hover" cellspacing="0">
                            
              <tr>
                <th>S/N</th>
                <th>Title/Description</th>
                <th>Document</th>
                <th>Closing Date</th>
                <th>status</th>
              </tr>

                        
           <?php
                    $r=1;
                    $result=$handle->getallrow('typee','ADDED_ADVERT','advert','rec_id','D');
                    //$result=mysqli_query($con,"SELECT * from advert where typee='ADVERT' order by rec_id desc ") or die("cannot select table");
                    while ($row=fetcharray($result)) {

                    //Starts:: Lets update the status if the advert closing date has elapse
                    $rid=$row['rec_id'];//record id
                    $strtotime_today=strtotime(date('Y-m-d'));
                    $strtotime_db= strtotime($row['closing_date']);
                    
                    if ($strtotime_today > $strtotime_db) {
                    	mysqli_query($con, "UPDATE advert set status='INACTIVE' where rec_id='$rid' ");
                    }
                    elseif ($strtotime_today <= $strtotime_db) {
                    	mysqli_query($con, "UPDATE advert set status='ACTIVE' where rec_id='$rid' ");
                    }

                    //Endss:: Lets update the status if the advert closing date has elapse


             ?>
              

              <tr class="text-center">
                    <td><b><?php echo $r?></b></td>
                    <td><b><?php echo $row['cname'];?></b></td>
                    <td>
                      <?php if(empty($row['picture']) OR ($strtotime_today > $strtotime_db) ){
                        echo "---";
                      }else{
                        ?>
                    <br> <a href="<?php echo $row['picture'];?>" target="_blank">View advert details</a>
                    <?php }//end else?>
                    </td>
                    <td><b><?php echo $row['closing_date'];?> <br> </b></td>
                    <td><?php if($row['status'] == "ACTIVE"){echo "<span class=\"label label-sm label-success\">ADVERT IS OPEN</sapn>";}elseif($row['status'] == "INACTIVE"){echo "<span class=\"label label-sm label-danger\">ADVERT IS CLOSED</sapn>";}?></td>

                   
                   
              </tr>


             
              <?php
                $r++;
                }//ends while loop

              ?>
              
             
          </table>
      </div>


						<!-- ******************Endss:  TABLE ***************** -->

					



					<section class="mb30 mt30"><br><hr>
						<center>
							<a href="./?rdr=home" class="bred padg10 white lh25"><i class="fa fa-upload"></i> &laquo; Back Home</a>&nbsp;&nbsp;
							
						</center>
					</section>
					<!--//my contents-->


			</div>
		</div>
		</div><!--row-->
		</div><!--container-->

<?php include_once('pages/footer.php');?>