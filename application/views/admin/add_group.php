

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
                    <li><a href="<?php echo base_url('admin');?>">Home</a></li>
                    <li>Group</li>
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
                        <strong class="card-title">Add Group</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php  echo base_url('admin/savegroup');?>"  id="add_group">
                            <div class="row"> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="ag_name" name="ag_name" placeholder="Enter name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Number(Contact Numbers must be seperated with space or newline)</label>
                                        <textarea id="ag_contacts" name="ag_contacts" placeholder="Enter numbers here..." class="form-control"></textarea>
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
    
    $('#add_group').bootstrapValidator({

        fields: {
            ag_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter name'
                    }
                }
            },
            ag_contacts: {
                validators: {
                    notEmpty: {
                        message: 'Please enter contacts'
                    }
                }
            }
            }
        

    });
</script>

