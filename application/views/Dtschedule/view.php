<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>
 

      
                    <table id="example-datatables" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="90"></th>
                                <th width="7">No.</th>
                                <th>Date</th>
                                <th>Destination</th>
								<th>PIC</th>
								<th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $i=1;
                            foreach ($record as $r)
                            {
                            ?>
                            
                            <tr>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo site_url().'/'.$this->uri->segment(1).'/edit/'.$r->id;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo site_url().'/'.$this->uri->segment(1).'/delete/'.$r->id;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                                            </div>
                                </td>
                                <td><?php echo $i;?></td>
                                <td><?php echo strtoupper($r->sdate)?></td>
                                <td><?php echo strtoupper($r->sdestination);?></td>
								<td><?php echo strtoupper($r->sName);?></td>
								<td><?php echo strtoupper($r->sattendance);?></td>
         
                            </tr>
                            <?php $i++;}?>
                            
                            
                        </tbody>
                    </table>
                    <!-- END Datatables -->