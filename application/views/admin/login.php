

<body class="" style="background-image:url('<?php echo base_url().'assets/img/mobile-background.png';?>')";background-size:cover;">
    <div class="container">
        <div class="login-content mx-auto mt-5 pt-5">
            <div class="login-logo">
                <img class="align-content" src="<?php echo base_url().'assets/img/logo.png';?>" alt="Prachatech">
            </div>
            <div class="login-form">
                <form method="post" action="<?php echo base_url('admin/checking');?>" id="login_form">
                    <div class="form-group">
                        <label>Email address</label>
						                        <input type="email" id="lf_email" name="email" class="form-control" placeholder="Email" value="
						<?php if($this->input->cookie('remember')){
							echo $this->input->cookie('username');
						}?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="lf_password" name="password" placeholder="Password"  class="form-control"  value="<?php if($this->input->cookie('remember')){
							echo $this->input->cookie('password');
						}?>">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"  name='remember_me'> Remember Me
                        </label>
                        <label class="pull-right">
                            <a href="<?php echo base_url('login/forgot_password');?>">Forgot Password?</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>



<script>
	$(document).ready(function() {
    $('#login_form').bootstrapValidator({
        
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter email'
                    }
                }
            },
           password: {
                validators: {
                    notEmpty: {
                        message: 'Please enter password'
                    }
                }
            }
            }
        })
     
    });
</script>
