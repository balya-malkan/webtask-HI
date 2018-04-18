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
?>
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Entry Record</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">

 
    <tr>
    <td width="150">Schedule Date<td>
        <?php echo inputan('text', 'tanggal','col-sm-4','Schedule Date ..', 0, $r['sdate'],array('id'=>'datepicker'));?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Destination<td>
        <?php echo inputan('text', 'desti','col-sm-4','Location ..', 0, $r['sdestination'],'');?>
    </td>
    </tr>
  <?php
	$level = $this->session->userdata('level');
	if ($level == 4 or $level == 1){
	?>
		<tr>
			<td width="180">PIC</td><td>
			<div class="col-sm-100">
			<?php echo editcombo('bosnya','tm_user','col-sm-6','sName','idUser','nLevel not in (1,3,4)','',$r['idUser']);?>
			</div>
			</td>
		</tr>
	<?php
	}
?>
    <tr>
    <td width="180">Note</td><td>
        <div class="col-sm-100">
        <?php echo textarea('att', '', 'col-sm-10', 3, $r['sattendance']);?>
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