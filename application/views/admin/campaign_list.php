

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
                    <li>List</li>
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
                       	<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Schedule List</a>
				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Saved Campaigns</a>
				
			</div>
		</nav>
                    </div>
					<div class="card-body">
	<div class="default-tab">
	
		<div class="tab-content pl-3 pt-2" id="nav-tabContent">
			<div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				 <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <!--<th>Type</th>-->
                                        <th>Time</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Sms's / day</th>
                                        <th>Group</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php if($status==1){$count=1;foreach($clist as $list):?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <!--<td><?php echo $list->plan_name; ?></td>-->
                                        <td><?php echo $list->send_time;?></td>
                                        <td><?php echo $list->start_date; ?></td>
                                        <td><?php echo $list->end_date; ?></td>
                                        <td><?php echo $list->sms_per_day ;?></td>
                                        <td><?php echo $list->groupnames ;?></td>
                                        <td><?php echo $list->template_content;?></td>
                                        <td>
                                          <!--  <a href="#">
                                                <button type="button" class="btn btn-sm social btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>-->
                                            <a href="<?php echo base_url('schedule/edit_campaign_schedule/').base64_encode($list->schedule_id)?>">
                                                <button type="button" class="btn btn-sm social btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="<?php echo base_url('schedule/delete_campaign_schedule/').base64_encode($list->schedule_id)?>">
                                                <button type="button" class="btn btn-sm social btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
									<?php $count++; endforeach;}?>
                                 
                                </tbody>
                            </table>
                    
                        </div>
			</div>
			<div class="tab-pane " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				 <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Type</th>
                                        <th>Time</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Sms's / day</th>
                                        <th>Group</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php if($savestatus==1){$count=1;foreach($slist as $list):?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $list->plan_name; ?></td>
                                        <td><?php echo $list->send_time;?></td>
                                        <td><?php echo $list->start_date; ?></td>
                                        <td><?php echo $list->end_date; ?></td>
                                        <td><?php echo $list->sms_per_day ;?></td>
                                        <td><?php echo $list->groupnames ;?></td>
                                        <td><?php echo $list->template_content;?></td>
                                        <td>
                                          <!--  <a href="#">
                                                <button type="button" class="btn btn-sm social btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>-->
                                            <a href="<?php echo base_url('schedule/active_schedule/').base64_encode($list->schedule_id)?>">
                                                <button type="button" class="btn btn-sm social btn-primary" title="clear here to active">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                            <a href="<?php echo base_url('schedule/delete_campaign_schedule/').base64_encode($list->schedule_id)?>" class='confirmation'>
                                                <button type="button" class="btn btn-sm social btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
									<?php $count++; endforeach;}?>
                                 
                                </tbody>
                            </table>
                    
                        </div>
			</div>
		   
		</div>

	</div>
</div>
                    
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>

