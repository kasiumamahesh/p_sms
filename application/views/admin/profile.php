

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Profile</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                    <li>My Profile</li>
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
                        <strong class="card-title mb-3">Profile</strong>
                        <a href="<?php echo base_url('admin/edit_profile') ;?>" class="btn btn-sm btn-info float-right">
                            <i class="fa fa-edit"></i> Edit Profile
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="<?php 
						$adm=$this->session->userdata('admindetails');
						$pic=$adm['profile_pic'];
						if($adm['profile_pic']==''){
						echo 	base_url().'assets/adminprofilepic/profilepic.png';
						}
						else{
						echo base_url().'assets/adminprofilepic/'.$pic; }?>" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $admin->name;?></h5>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <table class="table mb-0" style="border-left:1px dotted #ccc;">
                                    <tbody>
                                        <tr>
                                            <td>Email Id</td>
                                            <td><?php echo $admin->login_email;?></td>
                                        </tr>
                                       
                                        <tr>
                                            <td>Phone Number</td>
                                            <td><?php echo $admin->mobile_no;?></td>
                                        </tr>
                                        <tr>
                                            <td>Location</td>
                                            <td><?php echo $admin->location;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->


