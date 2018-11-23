

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Group</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Home</a></li>
                    <li>Group</li>
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
                        <a href="group_list.php" class="btn btn-sm btn-info">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <strong class="card-title">Edit Group</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/save_edit_group')?>"  id="edit_group">
                            <div class="row">
							<input type="hidden" value='<?php echo $gpdata->group_id;?>' id="eg_name" name="gid" >
                                <div class="col-md-6">
                                    <div class="form-group">
									
                                        <label>Name</label>
                                        <input type="text" value='<?php echo $gpdata->group_name;?>' id="eg_name" name="eg_name" placeholder="Enter name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Contact Numbers</label>
                                        <textarea id="eg_contacts" name="eg_contacts" placeholder="Enter numbers here..." class="form-control"><?php echo $gpdata->cont_numbers;?></textarea>
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
    $('#edit_group').bootstrapValidator({

        fields: {
            eg_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter name'
                    }
                }
            },
            eg_contacts: {
                validators: {
                    notEmpty: {
                        message: 'Please enter contacts'
                    }
                }
            }
            }
        })

    });
</script>