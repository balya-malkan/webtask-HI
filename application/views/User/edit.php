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
echo "<input type='hidden' name='id' value='$r[idUser]'>";
/**$gender=array(1=>'Laki Laki',2=>'Perempuan');
$kawin=array(1=>'Kawin',2=>'Belum Kawin');
$class="class='form-control'";
*/
$active=array(1=>'Yes',2=>'No');
$class2     ="class='form-control' id='status'";

$level=array(1=>'Admin',2=>'Manager',3=>'Supervisor',4=>'Super User');
$class      ="class='form-control' id='level'";

$jabatan=array(1=>'President',2=>'Vice President',3=>'Director',4=>'Advisor',5=>'General Manager',
6=>'Manager',7=>'As-Manager',8=>'Superviser',9=>'Staff');
$class3      ="class='form-control' id='jabatan'";
?>
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Entry Record</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">

    <tr>
    <td width="150">Name</td><td>
        <?php echo inputan('text', 'nama','col-sm-4','Name ..', 1, $r['sName'],'');?>
    </td>
    </tr>
	    </tr>
	    <td width="150">position</td><td>
        <div class="col-sm-3">
        <?php echo form_dropdown('jabatan',$jabatan,$r['jabatanID'],$class3);?>
        </div>
		</td>
	
	<tr>
	
	 <tr>
    <td width="150">User Login</td><td>
        <?php echo inputan('text', 'userlogin','col-sm-4','User Login ..', 1, $r['sUsername'],'');?>
    </td>
    </tr>
	
	<tr>
    <td width="150">Password</td><td>
        
		<div class = "col-sm-3"><input type = "password" name= "password"></div>
    </td>
    </tr>
	
	 <tr>
    <td width="150">Divisi</td><td>
        <?php echo editcombo('divisi', 'tm_divisi', 'col-sm-3', 'snamadivisi', 'nkddivisi', '', '',$r['nkddivisi']);?>
    </td>
    </tr>
	<tr>
    <td width="150">Level</td><td>
        <div class="col-sm-3">
        <?php echo form_dropdown('level',$level,$r['nLevel'],$class);?>
        </div>
    </td>
    </tr>
	<tr>
    <td width="150">Status Active</td><td>
        <div class="col-sm-3">
        <?php echo form_dropdown('status',$active,$r['nActive'],$class);?>
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