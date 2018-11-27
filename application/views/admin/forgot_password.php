

<body class="" style="background-image:url('assets/img/mobile-background.png');background-size:cover;">
    <div class="container">
        <div class="login-content mx-auto mt-5 pt-5">
            <div class="login-logo">
                <a href="#">
                    <img class="align-content" src="assets/img/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="<?php echo base_url('admin/forgotpass'); ?>" method="post" id="forgot_pass">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>



<script>
    $(document).ready(function() {
    $('#forgot_pass').bootstrapValidator({

        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter email'
                    }
                }
            }
            }
        })

    });
</script>