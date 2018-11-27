<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="<?php 
						$admin=$this->session->userdata('admindetails');
						$pic=$admin['profile_pic'];
						if($admin['profile_pic']==''){
						echo 	base_url().'assets/adminprofilepic/profilepic.png';
						}
						else{
						echo base_url().'assets/adminprofilepic/'.$pic; }?>" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link text-white" href="<?php echo base_url('admin/profile') ;?>"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link text-white" href="<?php echo base_url('admin/change_password') ;?>"><i class="fa fa-cog"></i> Change Password</a>

                        <a class="nav-link text-white" href="<?php echo base_url('login/logout');?>"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>

<!--
                <div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true" aria-expanded="true">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="language">
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-es"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-it"></i>
                        </div>
                    </div>
                </div>
-->

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->