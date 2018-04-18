
		<!-- FullCalendar -->
		<link href="<?php echo base_url(); ?>gentelella/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>gentelella/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
 	
		
	
<div class="">
    <div class="page-title">
	  <div class="title_left">
		<h3>Calendar Schedule
			<small>
			Click to add/edit Data
			</small>
		</h3>
	  </div>            
    </div>
	<div class="clearfix"></div>
	<div class="row">
	  <div class="col-md-12">
		<div class="x_panel">
		  
		  <!-- calender --------------------------------------->
		  <div class="x_content">
	
			<div id='calendar'></div> <!--untuk memanggil calender-------->

		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
<!-- /page content -->

   </div>
    </div>
     <!-- calendar modal pop up insert-->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit">Save</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title2" name="title2">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->
    
    <!-- FullCalendar --> 
   
       
       
		<script src="<?php echo base_url(); ?>gentelella/vendors/moment/min/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>gentelella/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
       <!-- Custom Theme Scripts -->
        <!-- FullCalendar -->
	  <script>
     $(document).ready(function() {
		
		var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
		
		$.ajax({
			url: "<?php echo site_url("home/fetchdata");?>",
			type: 'POST', // Send post data
			data: 'type=fetch',
			async: false,
			success: function(response){
				json_events = response;
			}
		});
		//initial calender 
		//alert(json_events);
        var calendar = $('#calendar').fullCalendar({
		  events: JSON.parse(json_events),//gw
		  utc: true,
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
		  editable : true,
		  droppable:true
      });
	  
	});
    </script>
    <!-- /FullCalendar -->
  
