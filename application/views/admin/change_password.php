

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Change Password</li>
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
                        <strong class="card-title">Change Password</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/new_password') ?>" id="change_password" name="change_password">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="text" id="cp_old" name="cp_old" placeholder="Enter Old Password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="text" id="cp_new" name="cp_new" placeholder="Enter New Password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input type="text" id="cp_new_confirm" name="cp_new_confirm" placeholder="Confirm New Password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->




<script>

    $('#change_password').bootstrapValidator({
        
        fields: {
            cp_old: {
                validators: {
                    notEmpty: {
                        message: 'Please enter Password'
                    }
                }
            },
            cp_new: {
                validators: {
                    notEmpty: {
                        message: 'Please enter new password'
                    }
                }
            },
            cp_new_confirm: {
                validators: {
                    notEmpty: {
                        message: 'Please enter confirn password'
                    }
                }
            }
            }
        })
     

</script>
