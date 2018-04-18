<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>StickyTableHeaders/css/component.css" />
		 <!--jquery fixtable header -->
		<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>FixedTableHeader/css/style.css" />
		--> 
		
 <?php
  //---------------test next and previus month ----------------
 $year		= $nYear;
 $month		= $nMonth;
 $total_days= $total_days;
 
 $sLinkPrev	= "schedule/PrevMonth/".$year."/".$month;							
 $sLinkNext	= "schedule/NextMonth/".$year."/".$month;	
 
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
		//$level = $this->session->userdata('level');
		//var_dump($level);exit;
		echo anchor($this->uri->segment(1).'/post',"<i class='fa fa-pencil-square-o'></i> Add Schedule",array('class'=>'btn btn-danger   btn-sm','title'=>'Tambah Data'));
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
 <div class="">    

					<table class="overflow-y">
                        <thead>
                            <tr>
                               <?php 
								foreach($list_fieldname as $sFieldName){
									echo "<th>".$sFieldName."</th>";
								}
                               ?>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
													
							for($i;$i<=$total_days ;$i++){
								$nInsert=0;
								//Set Format Date
								if($i < 10){
									$checkdate = $year.'-'.$month.'-0'.$i;
								}else{
									$checkdate = $year.'-'.$month.'-'.$i;
								}
								//var_dump($total_days);
								//End Set Format Date
								foreach ($record as $r ){
									if($checkdate==$r['Date']){
										$nInsert=1;
										$DateHolidayCheck = date("w",strtotime($checkdate));
										if(($DateHolidayCheck=="6") || ($DateHolidayCheck=="0")){?>
										<tr>
											<th bgcolor="#31bc86";font-weight="bold";color="#fff";><?php echo $i; ?></th>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr.Tadatoshi Yoshimoto']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr.Fery Tjandra']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr.Dally Wijaya']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Ikuhiro Yamaishi']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Kuniaki Nakato']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Noriyuki Uchida']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Masakazu Nakajima']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Seiichi Murakami']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Hiroshi Yabuno']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Yoshito Wakizaka']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. T Matsumoto']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Takeshi Yamakado']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Wahju Tulus']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Gandjar W']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Simin W']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mrs. Yanny']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mrs. Rinayani']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Mukiyar']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Alif Cholisana']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Ali Akbar']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Adiya Talka Lubis']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Andriansah']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mrs. Endah']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Dindin k']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Dedy Yuliadi']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Supyan']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Prijanto']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mr. Suhanda']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mrs. Syafitri']);?></td>
											<td bgcolor="#FA5858"><?php echo strtoupper($r['Mrs. Anita Tresia']);?></td>
										</tr>
										<?php 
										break;
										}else{
										/*isi disini jika ada schedule di bukan sabtu minggu */
										 ?>
										 <tr>
											<th bgcolor="#31bc86";font-weight="bold";color="#fff";><?php echo $i; ?></th>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr.Tadatoshi Yoshimoto']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr.Fery Tjandra']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr.Dally Wijaya']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Ikuhiro Yamaishi']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Kuniaki Nakato']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Noriyuki Uchida']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Masakazu Nakajima']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Seiichi Murakami']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Hiroshi Yabuno']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Yoshito Wakizaka']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. T Matsumoto']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Takeshi Yamakado']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Wahju Tulus']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Gandjar W']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Simin W']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mrs. Yanny']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mrs. Rinayani']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Mukiyar']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Alif Cholisana']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Ali Akbar']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Adiya Talka Lubis']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Andriansah']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mrs. Endah']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Dindin k']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Dedy Yuliadi']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Supyan']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Prijanto']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mr. Suhanda']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mrs. Syafitri']);?></td>
											<td class="table  table-bordered"><?php echo strtoupper($r['Mrs. Anita Tresia']);?></td>
										</tr>
										 <?php 
										break;
										}
									}else{
     									}
								}
								/* end jika ada schedule */
								if($nInsert==0){
									$DateHolidayCheck = date("w",strtotime($checkdate));
									if(($DateHolidayCheck=="6") || ($DateHolidayCheck=="0")){?>
										<tr>
											<th bgcolor="#FA5858"><?php echo $i; ?></th>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
											<td bgcolor="#FA5858"></td>
										</tr>
								<?php
									}else{?>
										<tr>
											<th bgcolor="#31bc86"><?php echo $i; ?></th>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
											<td class="table  table-bordered"></td>
										</tr>
								<?php	
									}
								}
							}?>
                        </tbody>
                    </table>


</div>

                    <!-- END Datatables -->