

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
                    <li><a href="<?php echo base_url('admin');?>">Home</a></li>
                    <li>Edit Profile</li>
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
                        <a href="profile.php" class="btn btn-sm btn-info">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <strong class="card-title">Edit Profile</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/save_edit_profile') ;?>" id="edit_profile" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Name</label>
                                        <input type="text" id="ep_name" name="ep_name" value="<?php echo $admin->name;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Email Id</label>
                                        <input type="email" id="ep_email" name="ep_email" value="<?php echo $admin->login_email;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Phone Number</label>
                                        <input type="text" id="ep_number" name="ep_number" value="<?php echo $admin->mobile_no;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Location</label>
                                        <input type="text" id="ep_location" name="ep_location" value="<?php echo $admin->location;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Profile Pic</label>
                                        <input type="file" id="ep_profile_pic" name="ep_profile_pic" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->



<script>
    $(document).ready(function() {
    $('#edit_profile').bootstrapValidator({

        fields: {
            ep_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter name'
                    }
                }
            },
            ep_email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter email'
                    }
                }
            },
            ep_number: {
                validators: {
                    notEmpty: {
                        message: 'Please enter number'
                    }
                }
            }
            }
        })

    });
</script>