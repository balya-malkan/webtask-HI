 <h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>
 
<?php
echo form_open_multipart($this->uri->segment(1).'/post');
/**$gender=array(1=>'Laki Laki',2=>'Perempuan');
$kawin=array(1=>'Kawin',2=>'Belum Kawin');
$class="class='form-control'";
*/

$room = array('Meeting Room 1'=>'Meeting Room 1','Meeting Room 2'=>'Meeting Room 2','Meeting Room 3'=>'Meeting Room 3','Meeting Room 4'=>'Meeting Room 4',
'Training Room'=>'Training Room','Guest Room 1'=>'Guest Room 1','Guest Room 2'=>'Guest Room 2','Lobby'=>'Lobby');

$plant = array('PT.HI-LEX INDONESIA TANGERANG'=>'PT.HI-LEX INDONESIA TANGERANG','PT.HI-LEX INDONESIA CIKARANG'=>'PT.HI-LEX INDONESIA CIKARANG',
'PT.HI-LEX CIREBON'=>'PT.HI-LEX CIREBON','PT.HI-LEX PART INDONESIA'=>'PT.HI-LEX PART INDONESIA');
?>
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Entry Record</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">

    
	<tr>
    <td width="50">Category</td><td>
		<div class="col-md-3">
        <?php  echo form_dropdown('type',array('1'=>'INTERNAL','2'=>'EXTERNAL'),'',"class='form-control'");?>
		</div>
	</td>
    </tr>
	
	<tr>
    <td width="150">Event Name</td><td>
        <?php echo inputan('text', 'desc','col-sm-4','Event Name ..', 1, '','');?>
    </td>
    </tr>
 
     <tr>
    <td width="150">Event Date<td>
        <?php echo inputan('text', 'tanggal','col-sm-4','Event Date ..', 0, '',array('id'=>'datepicker'));?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Event Time</td><td>
        <?php echo inputan('time', 'waktu','col-sm-3','Event Time ..', 1, '','');?>
	   <div class ="col-sm-1">s/d</div>
		<?php echo inputan('time', 'waktu2','col-sm-3','Event Time ..', 1, '','');?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Room</td><td>
		<div class="col-md-4">
        <?php echo form_dropdown('room',$room,'',"class='form-control'");?>
		</div>
    </td>
    </tr>
	
	<tr>
    <td width="50">Plant</td><td>
		<div class="col-md-6">
        <?php  echo form_dropdown('plant',$plant,'',"class='form-control'");?>
		</div>
    </td>
    </tr>
	
    <tr>
    <td width="180">PIC</td><td>
        <div class="col-sm-100">
        <?php echo textarea('pic', '', 'col-sm-10', 5, '');?>
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