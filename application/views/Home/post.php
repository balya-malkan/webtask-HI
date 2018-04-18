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

?>
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Entry Record</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">

    <tr>
    <td width="150">Schedule Date<td>
        <?php echo inputan('text', 'tanggal','col-sm-4','Schedule Date ..', 0, '',array('id'=>'datepicker'));?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Destination<td>
        <?php echo inputan('text', 'desti','col-sm-4','Destination ..', 0, '','');?>
    </td>
    </tr>
 
    <tr>
    <td width="180">Attendance</td><td>
        <div class="col-sm-100">
        <?php echo textarea('att', '', 'col-sm-10', 3, '');?>
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