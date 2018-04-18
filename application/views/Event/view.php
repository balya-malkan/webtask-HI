
<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>StickyTableHeaders/css/component.css" />
  		
		
 <?php
  //---------------test next and previus month ----------------
 $year		= $nYear;
 $month		= $nMonth;
 $total_days= $total_days;
 
 $sLinkPrev	= "event/PrevMonth/".$year."/".$month;							
 $sLinkNext	= "event/NextMonth/".$year."/".$month;	
 
 $namabln=getMonthString($month);
 
 function getMonthString($m){
    if($m==1){
        return "January";
    }else if($m==2){
        return "February";
    }else if($m==3){
        return "March";
    }else if($m==4){
        return "April";
    }else if($m==5){
        return "May";
    }else if($m==6){
        return "June";
    }else if($m==7){
        return "July";
    }else if($m==8){
        return "August";
    }else if($m==9){
        return "September";
    }else if($m==10){
        return "October";
    }else if($m==11){
        return "November";
    }else if($m==12){
        return "December";
    }
}

?>

<style>
.kolom-sejajar{
    	margin:0; 
		padding:0; 
}

#kolom-kiri{
     float: left;
}
#kolom-kanan{
     float: center;
	
}

</style>

<div class ="kolom-sejajar">
	<div id="kolom-kiri">
		<?php 
		echo anchor($this->uri->segment(1).'/post',"<i class='fa fa-pencil-square-o'></i> Add Event",array('class'=>'btn btn-danger   btn-sm','title'=>'Tambah Data'));
		?>
	</div>
	<div id="kolom-kanan">	
		<?php
		$curmonth = date('Y-m');
		if ($curmonth == $year.'-'.$month){
			$i=date('j');
		}else{
			$i=1;
		}
		echo "<h5 align='center'>";
		echo anchor($sLinkPrev,'<< Previous Month ');
		echo "\n Schedule, ".$namabln." ".$nYear."\n";
		echo anchor($sLinkNext,'Next Month >>');
		echo "</h5>";
		?>					
	</div>
</div>
  
                    <table class="overflow-y">
                         <thead>
                            <tr>
							    <th>Date</th>
                                <th colspan="6" style="text-align:center;border-style: 50px solid;border-right-color: black;">INTERNAL</th>
								<th colspan="6" style="text-align:center"> FROM EXTERNAL</th>
							</tr>
							<tr>
                               <th></th>
                                <th>Event</th>
                                <th>Time</th>
								<th>Room</th>
								<th>Plant</th>
                                <th> PIC </th>
								<th style="border-style: 50px solid;border-right-color: black;">Author</th>
								<th>Event</th>
                                <th>Time</th>
								<th>Room</th>
								<th>Plant</th>
                                <th>PIC</th>
								<th>Author</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                             <?php
							$nInsert=0;
                            
													
							for($i;$i<=$total_days;$i++){
								//Set Format Date
								if($i < 10){
									$checkdate = $year.'-'.$month.'-0'.$i;
								}else{
									$checkdate = $year.'-'.$month.'-'.$i;
								}
								//End Set Format Date
								
								$nInsert=0;
								$eventin=0;
								$eventex=0;
								
								$nIndexIn		=0;
								$nIndexEx		=0;
								$nCountRowsIn	=0;
								$nCountRowsEx	=0;
								$sPrintTRStringIn="";
								$sPrintTRStringEx="";
								
								$nSeparateIn=0;
								$nSeparateEx=0;
								
								$seventin	= "";
								$mulaiin	= "";
								$selesaiin	= "";
								$tempatin	= "";
								$plantin	= "";
								$picin		= "";
								$authorin   = "";
								
								//$record=> Internal; $record2=> External
								//===== Get Internal Section Data
								$nIndexIn=0;
								foreach($record as $aRows){
									if($checkdate==$aRows['dDate']){
										$nCountRowsIn=$nCountRowsIn+1;
										
										$eventin	= $aRows['eventin'];
										$mulaiin	= $aRows['mulaiin'];
										$selesaiin	= $aRows['selesaiin'];
										$tempatin	= $aRows['tempatin'];
										$plantin    = $aRows['plantin'];
										$picin		= $aRows['picin'];
										$authorin   = $aRows['authorin'];
										
										$sPrintTRStringIn=$sPrintTRStringIn."
											<th>$i</th>
											<td class='table  table-bordered'>".strtoupper($eventin)."</td>
											<td class='table  table-bordered'>".strtoupper($mulaiin)." - ".strtoupper($selesaiin)."</td>
											<td class='table  table-bordered'>".strtoupper($tempatin)."</td>
											<td class='table  table-bordered'>".strtoupper($plantin)."</td>
											<td class='table  table-bordered'>".strtoupper($picin)."</td>
											<td class='table  table-bordered' style='border-right-color: black'>".strtoupper($authorin)."</td>;
										";
										$nIndexIn=$nIndexIn+1;
									}
								}
								//===== End Get Internal Section Data
								//===== Get External Section Data
								
								$nIndexEx=0;
								foreach($record2 as $aRows){
									if($checkdate==$aRows['dDate']){
										$nCountRowsEx=$nCountRowsEx+1;
										
										$eventex	= $aRows['eventex'];
										$mulaiex	= $aRows['mulaiex'];
										$selesaiex	= $aRows['selesaiex'];
										$tempatex	= $aRows['tempatex'];
										$plantex    = $aRows['plantex'];
										$picex		= $aRows['picex'];
										$authorex	= $aRows['authorex'];
										
										$sPrintTRStringEx=$sPrintTRStringEx."
											<td class='table  table-bordered'>".strtoupper($eventex)."</td>
											<td class='table  table-bordered'>".strtoupper($mulaiex)." - ".strtoupper($selesaiex)."</td>
											<td class='table  table-bordered'>".strtoupper($tempatex)."</td>
											<td class='table  table-bordered'>".strtoupper($plantex)."</td>
											<td class='table  table-bordered'>".strtoupper($picex)."</td>
											<td class='table  table-bordered'>".strtoupper($authorex)."</td>;
										";
										$nIndexEx=$nIndexEx+1;
										
									}
								}
								
								//===== End Get External Section Data
								//===== Set AddRow Empty
								$n=0;
								if($nCountRowsIn>$nCountRowsEx){
									for($n=1;$n<=($nCountRowsIn-$nCountRowsEx);$n++){
										$DateHolidayCheck = date("w",strtotime($checkdate)); 
										if(($DateHolidayCheck=="6") || ($DateHolidayCheck=="0")){
											$sPrintTRStringEx=$sPrintTRStringEx."
												<td bgcolor='#FA5858'></td>
												<td bgcolor='#FA5858'></td>
												<td bgcolor='#FA5858'></td>
												<td bgcolor='#FA5858'></td>
												<td bgcolor='#FA5858'></td>
												<td bgcolor='#FA5858'></td>;
											";
										}else{
											$sPrintTRStringEx=$sPrintTRStringEx."
												<td class='table  table-bordered'> </td>
												<td class='table  table-bordered'> </td>
												<td class='table  table-bordered'> </td>
												<td class='table  table-bordered'> </td>
												<td class='table  table-bordered'> </td>
												<td class='table  table-bordered'> </td>;
											";
										}
										$nIndexEx=$nIndexEx+1;
									}
								}
								
								if($nCountRowsEx>$nCountRowsIn){
									for($n=1;$n<=($nCountRowsEx-$nCountRowsIn);$n++){
										$DateHolidayCheck = date("w",strtotime($checkdate)); 
										if(($DateHolidayCheck=="6") || ($DateHolidayCheck=="0")){
										$sPrintTRStringIn=$sPrintTRStringIn."
											<th>$i</th>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858' style='border-style: 50px solid;border-right-color: black;'></td>;
										";
									}else{
										$sPrintTRStringIn=$sPrintTRStringIn."
											<th>$i</th>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered' style='border-right-color: black'> </td>;
										";
									}
									$nIndexIn=$nIndexIn+1;
										
									}
								}
								//===== End Set AddRow Empty
								//===== Set Row is Empty
								if($nCountRowsIn==0){
									$DateHolidayCheck = date("w",strtotime($checkdate)); 
									if(($DateHolidayCheck=="6") || ($DateHolidayCheck=="0")){
										$sPrintTRStringIn=$sPrintTRStringIn."
											<th>$i</th>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858' style='border-right-color: black'></td>;
										";
									}else{
										$sPrintTRStringIn=$sPrintTRStringIn."
											<th>$i</th>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered' style='border-right-color: black'> </td>;
										";
									}
								}
								if($nCountRowsEx==0){
									$DateHolidayCheck = date("w",strtotime($checkdate)); 
									if(($DateHolidayCheck=="6") || ($DateHolidayCheck=="0")){
										$sPrintTRStringEx=$sPrintTRStringEx."
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>
											<td bgcolor='#FA5858'></td>;
										";
									}else{
										$sPrintTRStringEx=$sPrintTRStringEx."
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>
											<td class='table  table-bordered'> </td>;";
									}
								}
								//===== End Set Row is Empty
								//===== Merge Print String Variable
								$nSeparateIn=substr_count($sPrintTRStringIn,";");
								$nSeparateEx=substr_count($sPrintTRStringEx,";");
								
								$sPrintTRStringIn = explode(';', $sPrintTRStringIn);
								$sPrintTRStringEx = explode(';', $sPrintTRStringEx);
								//var_dump($sPrintTRStringIn[0].$sPrintTRStringEx[0]);exit;
								for($nIndexRow=0; $nIndexRow <=($nSeparateIn-1); $nIndexRow++){
									echo "<tr>";
									echo $sPrintTRStringIn[$nIndexRow].$sPrintTRStringEx[$nIndexRow];
									echo "</tr>";
								}
								//===== End Merge Print String Variable
							}?>

                        </tbody>
                    </table>
		
		
                    <!-- END Datatables -->