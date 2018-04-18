 <h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>
 
<?php
echo form_open_multipart($this->uri->segment(1).'/edit');
echo "<input type='hidden' name='id' value='$r[id]'>";
$room = array('Meeting Room 1'=>'Meeting Room 1','Meeting Room 2'=>'Meeting Room 2','Meeting Room 3'=>'Meeting Room 3','Meeting Room 4'=>'Meeting Room 4',
'Training Room'=>'Training Room','Guest Room 1'=>'Guest Room 1','Guest Room 2'=>'Guest Room 2','Lobby'=>'Lobby');


$plant = array('PT.HI-LEX INDONESIA TANGERANG'=>'PT.HI-LEX INDONESIA TANGERANG','PT.HI-LEX INDONESIA CIKARANG'=>'PT.HI-LEX INDONESIA CIKARANG',
'PT.HI-LEX CIREBON'=>'PT.HI-LEX CIREBON','PT.HI-LEX PART INDONESIA'=>'PT.HI-LEX PART INDONESIA');;
?>
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Entry Record</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">

	<tr>
    <td width="150">Event Date<td>
        <?php echo inputan('text', 'tanggal','col-sm-4','Event Date ..', 0, $r['dDate'],array('id'=>'datepicker'));?>
    </td>
    </tr>
	
    <tr>
    <td width="150">Event Name</td><td>
        <?php echo inputan('text', 'desc','col-sm-4','Event Name ..', 1, $r['sDesc'],'');?>
    </td>
    </tr>
 
	
	<tr>
    <td width="150">Event Time</td><td>
        <?php echo inputan('time', 'waktu','col-sm-3','Event Time ..', 1, $r['swaktu'],'');?>
		  <div class ="col-sm-1">s/d</div>
		<?php echo inputan('time', 'waktu2','col-sm-3','Event Time ..', 1, $r['swaktuEnd'],'');?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Room</td><td>
		<div class="col-md-4">
        <?php echo form_dropdown('room',$room,$r['slocation'],"class='form-control'");?>
		</div>
    </td>
    </tr>
	
	<tr>
    <td width="50">Plant</td><td>
		<div class="col-md-6">
        <?php  echo form_dropdown('plant',$plant,$r['plant'],"class='form-control'");?>
		</div>
    </td>
    </tr>
	
    <tr>
    <td width="180">PIC</td><td>
        <div class="col-sm-100">
        <?php echo textarea('member', '', 'col-sm-10', 3, $r['sMember']);?>
        </div>
	</td>
    </tr>

    <td></td><td colspan="2"> 
    <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
    <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
    </td></tr>
    
</table>
  </div></div>
</form>