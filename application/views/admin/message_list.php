

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
                    <li><a href="<?php echo base_url('admin');?>">Home</a></li>
                    <li>Message</li>
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
                        <strong class="card-title">Message List</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php if($status==1){$count=1;foreach($msglist as $row):?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row->template_name; ?></td>
                                        <td><?php echo $row->template_content; ?></td>
                                        <td>
                                           <!-- <a href="#">
                                                <button type="button" class="btn btn-sm social btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </button> 
                                            </a> -->
                                            <a href="<?php echo base_url('admin/edit_message/').base64_encode($row->template_id);?>">
                                                <button type="button" class="btn btn-sm social btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="<?php echo base_url('admin/delete_message/').base64_encode($row->template_id);?>">
                                                <button type="button" class="btn btn-sm social btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                               <!--     <tr>
                                        <td>2</td>
                                        <td>xxxxxxxxx</td>
                                        <td>xxxxxxxxxxxxxxxxxxx</td>
                                        <td>
                                            <a href="#">
                                                <button type="button" class="btn btn-sm social btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="edit_message.php">
                                                <button type="button" class="btn btn-sm social btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="#">
                                                <button type="button" class="btn btn-sm social btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>xxxxxxxxx</td>
                                        <td>xxxxxxxxxxxxxxxxxxx</td>
                                        <td>
                                            <a href="#">
                                                <button type="button" class="btn btn-sm social btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="edit_message.php">
                                                <button type="button" class="btn btn-sm social btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="#">
                                                <button type="button" class="btn btn-sm social btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr> -->
								<?php $count++;
								endforeach;
							
								}?>
                                </tbody>
                            </table>
                    
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

