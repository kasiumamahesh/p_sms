
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
                        <strong class="card-title">Group List</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Contact Numbers</th>
										<th>group count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
								
                                <tbody>
                        <?php if($status==1){ $count=1;foreach($grouplist as $gp):?>
						
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $gp->group_name;?></td>
                                        <td>
										<?php $numbers=explode(',',$gp->cont_numbers);
										$gcount=1;
										foreach($numbers as $number){
											if($gcount<4) {
										?>
										<div class=''>
											<?php echo $number; ?>
											
										</div>
										
											<?php } else{?>

										<div class="morecontacts" style='display:none'>
										<?php echo $number; ?>
										</div>
										<?php } $gcount++;
										}?>
										<button class="phonenum btn btn-primary btn-sm" >Read More</button>
										
										</td>
										<td><?php echo $gp->cnt;?></td>
										
                                        <td>
                                        
                                            <a id="phone-num" class="text-priamry" href="<?php echo base_url('admin/groupedit/').base64_encode($gp->group_id);?>">
                                                <button type="button" class="btn btn-sm social btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="<?php echo base_url('admin/groupdelete/').base64_encode($gp->group_id);?>" class='confirmation'>
                                                <button type="button" class="btn btn-sm social btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                  
									<?php $count++; endforeach;}else{echo 'no groups ';}?>
									
                                </tbody>
								
                            </table>
                    
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script type="text/javascript">
$(".phonenum").click(function(){
    $(".morecontacts").toggle();
});
</script >

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>

