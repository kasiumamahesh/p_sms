
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Plan Type</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/dashboard');?>" >Home</a></li>
                    <li>Plan Type</li>
                    <li>Add</li>
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
                        <strong class="card-title">Add Plan</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/saveplan');?>" id="add_message">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Plan Type</label>
                                        <input type="text" id="am_name" name="ap_name" placeholder="Enter name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of smses per day</label>
                                         <input type="text" id="am_name" name="ap_sms" placeholder="Enter Number of smses" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Add</button>
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
    $('#add_message').bootstrapValidator({

        fields: {
            ap_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter name'
                    }
                }
            },
            ap_sms: {
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