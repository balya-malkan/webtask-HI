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
echo "<input type='hidden' name='id' value='$r[nkddivisi]'>";
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
    <td width="150">Division Code</td><td>
        <?php echo inputan('text', 'divisicd','col-sm-4','Division Code..', 1, $r['nkddivisi'],'');?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Division Name</td><td>
        <?php echo inputan('text', 'divisiname','col-sm-4','Division Name..', 1, $r['snamadivisi'],'');?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Description</td><td>
        <?php echo inputan('text', 'desc','col-sm-4','Description..', 1, $r['sdesc'],'');?>
    </td>
    </tr>

           
    <td></td><td colspan="2"> 
    <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
    <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
    </td></tr>
    
</table>
  </div></div>
</form>