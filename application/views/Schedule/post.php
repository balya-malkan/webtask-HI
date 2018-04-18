 <h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>
<style>
.kolom-sejajar{
    	margin:0; 
		padding:0; 
		float: center;
}

#kolom-kiri{
     float: left;
}
#kolom-kanan{
     float: center;
	
}
</style>

<!-- for support tag input type date html5 -->
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
	webshims.polyfill('forms forms-ext');
</script>
<!-- end input type date html5 -->

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
       <div class="kolom-sejajar"> 
		<div class ="col-sm-4"><input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>"></div>
		<div class ="col-sm-1"><h5>To</h5></div>
		<div class ="col-sm-3"><input type="date" name="tanggalto" value="<?php echo date('Y-m-d'); ?>"></div>
	   </div>
	</td>
    </tr>
	
	<tr>
    <td width="150">Destination<td>
        <?php echo inputan('text', 'desti','col-sm-4','Destination ..', 0, '','');?>
    </td>
    </tr>
	
 <?php
	$level = $this->session->userdata('level');
	if ($level == 4 or $level == 1){
	?>
		<tr>
			<td width="180">PIC</td><td>
			<div class="col-sm-100">
			<?php echo buatcombo('bosnya','tm_user','col-sm-6','sName','idUser','nLevel not in (1,3,4)','');?>
			</div>
			</td>
		</tr>
	<?php
	}
?>
    <tr>
    <td width="180">Note</td><td>
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