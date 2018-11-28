

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
                    <li><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                    <li>Campaign Scheduling</li>
                    <li>Edit</li>
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
                        <a href="<?php echo base_url('admin/listcampaign'); ?>" class="btn btn-sm btn-info">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <strong class="card-title">Edit Schedule</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('schedule/save_edit_campaign');?>" id="edit_schedule">
                            <div class="row">
							<input type='hidden' value="<?php echo $sch->schedule_id;?>" name='s_id'>
							<input type='hidden' value='<?php echo $plans->plan_id ?>' name="es_type">
                               
                               <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SMS's / Day</label>
                                        <input type="text" id="es_sms_day" name="es_sms_day" placeholder="Enter no.of sms's per day" class="form-control">
                                    </div>
                                </div>-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Time</label>
                                        <input type="time" id="es_time" name="es_time" value='<?php echo $sch->send_time; ?>'placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Start Date</label>
                                        <input type="date" id="es_sdate" value='<?php echo $sch->start_date;?>' name="es_sdate" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">End Date</label>
                                        <input type="date" id="es_edate" name="es_edate" value='<?php echo $sch->end_date;?>' placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" name="" id="">
                                        <label class="form-control-label">Select Group</label>
									<select  name="gid[]" data-placeholder="Select Multiple Groups" multiple class="standardSelect form-control">
                                            	<?php foreach($groups as $group):?>
                                            <option value="<?php echo $group->group_id;?>" 
											<?php if(in_array($group->group_id,$sgroups)){echo 'selected';}?>><?php echo $group->group_name;?></option>
											<?php endforeach;?>
                                          
                                        </select>
                                    </div>
                                </div>
                              
                                <div class="col-md-6">
                                    <div class="form-group" name="" id="">
                                        <label class="form-control-label">Select Message</label>
                                        <select class="form-control" name="mid" id="selectmsg"  <?php if($msgstatus==1){ echo 'disabled';} ?>>
                                           
											<?php foreach($msgs as $msg):?>
                                            <option value="<?php echo $msg->template_id;?>" <?php if($msg->template_id==$sch->template_id){echo 'selected';}?>><?php echo $msg->template_name;?></option>
											<?php endforeach;?>
                                           <!-- <option value="">xxxxx</option>
                                            <option value="">xxxxx</option>
                                            <option value="">xxxxx</option>-->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" name="" id="">
											<input type="checkbox" id='checkmsg' name="" value="" <?php if($msgstatus==1){ echo 'checked';} ?>>

                                        <label class="form-control-label">Message</label>
                                        <textarea id="txtmsg" name="txtmsg" placeholder="Enter message here..." class="form-control" <?php if($msgstatus==0){echo 'disabled';} ?>><?php if($msgstatus==1){ echo $msgdet->template_content;} ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
 <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>
<script>
  
	 
    $('#checkmsg').click(function(){
		//alert('d');
		if (this.checked) {
        $('#selectmsg').attr('disabled', 'disabled');
		$('#txtmsg').removeAttr('disabled');
		
    } else {
        $('#txtmsg').attr('disabled', 'disabled');
		$('#selectmsg').removeAttr('disabled');
    }
		
		
	}); 
	$('#add_schedule').on('submit',function(){
		sdate=$('#es_sdate').val();
		edate=$('#es_edate').val();
		if(new Date(edate) < new Date(sdate))
            {
                 alert('end date must be after the date of  start date or same day');
				 return false;
                }
			
		
	});

</script>


<script>
  
    $('#edit_schedule').bootstrapValidator({

        fields: {
            es_type: {
                validators: {
                    notEmpty: {
                        message: 'Type is required'
                    }
                }
            },
            es_sms_day: {
                validators: {
                    notEmpty: {
                        message: 'SMS/day is required'
                    }
                }
            },
            es_time: {
                validators: {
                    notEmpty: {
                        message: 'Time is required'
                    }
                }
            },
            es_sdate: {
                validators: {
                    notEmpty: {
                        message: 'Start date is required'
                    }
                }
            },
            es_edate: {
                validators: {
                    notEmpty: {
                        message: 'End date is required'
                    }
                }
            },
		       'gid[]': {
                validators: {
                    notEmpty: {
                        message: 'group is required'
                    }
                }
            },
            }
        });

   
</script>