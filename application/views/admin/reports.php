

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Reports</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Home</a></li>
                    <li>Reports</li>
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
                        <strong class="card-title">Reports</strong>
                    </div>
                    <div class="card-body">
                        <form method="" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Campaign</label>
                                        <select class="form-control" name="" id="">
                                            <option value="" disabled selected>Select</option>
                                            <option value="1">xxxxx</option>
                                            <option value="1">xxxxx</option>
                                            <option value="1">xxxxx</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Date</label>
                                        <select class="form-control" name="" id="campaign">
                                            <option value="" disabled selected>Select</option>
                                            <option value="1">xxxxx</option>
                                            <option value="1">xxxxx</option>
                                            <option value="1">xxxxx</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="text-center schedule-file" id="1" style="display:none;">
                                <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->




<script> 
   $('#campaign').change(function() {
        $('.schedule-file').hide();
        $('#' + $(this).val()).show();
 });
</script>