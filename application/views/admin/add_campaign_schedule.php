

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Campaign Scheduling</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin');?>">Home</a></li>
                    <li>Campaign Scheduling</li>
                    <li class="active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Add Schedule</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('Schedule/save_schedule');?>" id="add_schedule">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="as_type" id="as_type">
                                            <option value="" disabled selected>Select</option>
											<?php foreach($plans as $plan):?>
                                            <option value="<?php echo $plan->plan_id ?>"><?php echo $plan->plan_name ?></option>
											<?php endforeach;?>
                                         <!--   <option value="">xxxxx</option>
                                            <option value="">xxxxx</option>-->
                                        </select>
                                    </div>
                                </div>
                           <!--     <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SMS's / Day</label>
                                        <input type="text" id="as_sms_day" name="as_sms_day" placeholder="Enter no.of sms's per day" class="form-control">
                                    </div>
                                </div> -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Time</label>
                                        <input type="time" id="as_time" name="as_time" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Start Date</label>
                                        <input type="date" id="as_sdate" name="as_sdate" placeholder="" class="form-control">
                                        <!-- <div class="cal-icon">
											<input class="form-control datetimepicker" type="text" value="12/10/2018">
										</div> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">End Date</label>
                                        <input type="date" id="as_edate" name="as_edate" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" name="" id="">
                                        <label class="form-control-label">Select Group</label>
                                        <select class="form-control" name="gid" id="">
                                            <option value="" disabled selected>Select</option>
											<?php foreach($groups as $group):?>
                                            <option value="<?php echo $group->group_id; ?>"><?php echo $group->group_name;?></option>
											<?php endforeach;?>
                                           <!-- <option value="">xxxxx</option>
                                            <option value="">xxxxx</option>-->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <!-- <div class="form-group" name="" id="">
                                        <label class="form-control-label">Group</label>
                                        <input type="text" id="" name="" placeholder="Enter group name" class="form-control">
                                    </div>-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" name="" id="">
                                        <label class="form-control-label">Select Message</label>
                                        <select class="form-control" name="mid" id="selectmsg">
                                            <option value="" disabled selected>Select</option>
											<?php foreach($msgs as $msg):?>
                                            <option value="<?php echo $msg->template_id;?>"><?php echo $msg->template_name;?></option>
											<?php endforeach;?>
                                            <!--<option value="">xxxxx</option>
                                            <option value="">xxxxx</option>-->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" name="" id="">
									<input type="checkbox" id='checkmsg' name="" value="">
                                        <label class="form-control-label">Message</label>
                                        <textarea id="txtmsg" name="txtmsg" placeholder="Enter message here..." class="form-control" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name='sch' value='1' class="btn btn-sm btn-success">Start</button>
                           <button type="submit"  name='sch'  value='2' class="btn btn-sm btn-primary">Save</button>
                            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
  
	$(document).ready(function() {
    $('#checkmsg').click(function(){
		
		if (this.checked) {
        $('#selectmsg').attr('disabled', 'disabled');
		$('#txtmsg').removeAttr('disabled');
		
    } else {
        $('#txtmsg').attr('disabled', 'disabled');
		$('#selectmsg').removeAttr('disabled');
    }
		
		
	}); 
	$('#add_schedule').on('submit',function(){
		sdate=$('#as_sdate').val();
		edate=$('#as_edate').val();
		if(new Date(edate) < new Date(sdate))
            {
                 alert('end date must be after the date of  start date or same day');
				 return false;
                }
			
		
	});
	});

</script>


<script>
    $(document).ready(function() {
        $('#add_schedule').bootstrapValidator({

            fields: {
                as_type: {
                    validators: {
                        notEmpty: {
                            message: 'Type is required'
                        }
                    }
                },
                as_sms_day: {
                    validators: {
                        notEmpty: {
                            message: 'SMS/day is required'
                        }
                    }
                },
                as_time: {
                    validators: {
                        notEmpty: {
                            message: 'Time is required'
                        }
                    }
                },
                as_sdate: {
                    validators: {
                        notEmpty: {
                            message: 'Start date is required'
                        }
                    }
                },
                as_edate: {
                    validators: {
                        notEmpty: {
                            message: 'End date is required'
                        }
                    }
                },
            }
        })

    });
</script>
