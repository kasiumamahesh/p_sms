

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Plan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Home</a></li>
                    <li>Plan</li>
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
                        <a href="<?php echo base_url('admin/listplan') ;?>" class="btn btn-sm btn-info">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <strong class="card-title">Edit Plan</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/save_edit_plan')?>" id="edit_message" name="edit_message">
                            <div class="row">
							<input type='hidden' value="<?php echo $plan->plan_id;?>" name='p_id'>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="em_name" name="ep_name" value="<?php echo $plan->plan_name;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of Smses per day</label>
										     <input type="text" id="am_name" name="ep_sms" value="<?php echo $plan->sms_per_day;?>" class="form-control">
                                        
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
    $(document).ready(function() {
    $('#edit_message').bootstrapValidator({

        fields: {
            em_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter name'
                    }
                }
            },
            em_message: {
                validators: {
                    notEmpty: {
                        message: 'Please enter message'
                    }
                }
            }
            }
        })

    });
</script>