 <h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>
 
<?php
echo form_open_multipart($this->uri->segment(1).'/post');
/**$gender=array(1=>'Laki Laki',2=>'Perempuan');
$kawin=array(1=>'Kawin',2=>'Belum Kawin');
$class="class='form-control'";
*/
?>
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Entry Record</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">

    <tr>
    <td width="150">Activity Name</td><td>
        <?php echo inputan('text', 'desc','col-sm-4','Activity Name ..', 1, '','');?>
    </td>
    </tr>
 
     <tr>
    <td width="150">Activity Date<td>
        <?php echo inputan('text', 'tanggal','col-sm-4','Activity Date ..', 0, '',array('id'=>'datepicker'));?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Activity Time</td><td>
        <?php echo inputan('time', 'waktu','col-sm-3','Activity Time ..', 1, '','');?>
		<div class ="col-sm-1">s/d</div>
		<?php echo inputan('time', 'waktu2','col-sm-3','Event Time ..', 1, '','');?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Location</td><td>
        <?php echo inputan('text', 'lokasi','col-sm-4','Location ..', 1, '','');?>
    </td>
    </tr>
	
    <tr>
    <td width="180">Member</td><td>
        <div class="col-sm-100">
        <?php echo textarea('member', '', 'col-sm-10', 5, '');?>
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