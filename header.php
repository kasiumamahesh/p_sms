<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prachatech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url().'assets/img/fav.png';?>">

    <link rel="stylesheet" href="<?php echo base_url().'assets/css/normalize.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrapValidator.min.css';?>">
    
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/themify-icons.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css';?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	 <script src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js';?>"></script>
    
</head>

<body>
	<?php if($this->session->flashdata('success')): ?>
<div class="alert_msg1 animated slideInUp bg-succ">
   <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert_msg1 animated slideInUp bg-warn">
   <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<div class="modal fade" id="delete-modal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>    <a  class="btn btn-primary" data-dismiss="modal">Ok</a>
        </div> 
        </div>
      </div>
    </div>