

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Message</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Home</a></li>
                    <li>Message</li>
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
                        <a href="<?php echo base_url('admin/listtemplate') ;?>" class="btn btn-sm btn-info">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <strong class="card-title">Edit Message</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/save_edit_message')?>" id="edit_message" name="edit_message">
                            <div class="row">
							<input type='hidden' value="<?php echo $template->template_id;?>" name='t_id'>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="em_name" name="em_name" value="<?php echo $template->template_name;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea id="em_message" name="em_message"  class="form-control"><?php echo $template->template_content;?></textarea>
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