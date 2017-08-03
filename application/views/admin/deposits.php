<!DOCTYPE html>
<html>
    <head>
        <?php echo $common; ?>
    </head>
    <body>
        <div id="theme-wrapper">
            <?php echo $header; ?>
            <div id="page-wrapper" class="container">
                <div class="row">
                    <?php echo $sidebar; ?>
                    <div id="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ol class="breadcrumb">
                                            <li><a href="<?php echo base_url(); ?>auth_admin/dashboard">Home</a></li>
                                            <li class="active"><span>Deposits</span></li>
                                        </ol>
                                        <h1>Deposits</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-box">
                                    <header class="main-box-header clearfix">
                                        <h2 id="page_title" class="pull-right">                                                                                        
                                        </h2>
                                    </header>
                                    <?php if ($message != "") { ?>
                                        <div class="alert alert-info fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="fa fa-info-circle fa-fw fa-lg"></i>
                                            <?php echo $message; ?>
                                        </div>
                                    <?php } ?>
                                    <div class="main-box-body clearfix">
                                        <div class="table-responsive">
                                            <table class="table" id="accountlist">
                                                <thead>
                                                    <tr>
                                                        <th><span>User Name</span></th>
                                                        <th><span>Transaction Id</span></th>
                                                        <th><span>Address</span></th>
<!--                                                    <th><span>Confirms Needed</span></th>
                                                        <th><span>Confirms Received</span></th>-->
                                                        <th><span>Amount</span></th>
                                                        <th><span>Status</span></th>
                                                        <th><span>Deposit Date</span></th>                                                        
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $footer; ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>include_files/admin/js/demo-skin-changer.js"></script>  
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.nanoscroller.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/demo.js"></script>        
        <script src="<?php echo base_url(); ?>include_files/admin/js/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/pace.min.js"></script> 
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jquery.dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jQuery.dataTables.reloadAjax.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>include_files/admin/js/jQuery_dataTables_ColumnFilter.js" type="text/javascript"></script>
        <script>
            $(function () {
                var accountlist = $('#accountlist').DataTable({
                    "bServerSide": true,
                    "sAjaxSource": "<?php echo base_url(); ?>auth_admin/get_deposits",
                    "sServerMethod": "POST",
                    "info": false,
                    "fnServerParams":
                            function (aoData) {
                            },
                    "aaSorting": [[2, 'desc'], [1, 'desc']],
                    "iDisplayLength": 10,
                    "bStateSave": true,
                    "fnCreatedRow": function (nRow, aData, iDataIndex)
                    {
                        $(nRow).attr("uacc_username", aData.id);
                    },
                    aoColumnDefs: [
                        {
                            mData: 'uacc_username',
                            aTargets: [0]
                        },
                        {
                            mData: 'transaction_id',
                            aTargets: [1]
                        },
                        {
                            mData: 'address',
                            aTargets: [2]
                        },
//                        {
//                            mData: 'confirms_needed',
//                            aTargets: [3]
//                        },
//                        {
//                            mData: 'confirms_received',
//                            aTargets: [4]
//                        },
                        {
                            mData: 'amount',
                            aTargets: [3]
                        },
                        {
                            mData: 'deposit_status_text',
                            aTargets: [4]
                        },
                        {
                            mData: 'created_date',
                            aTargets: [5]
                        }
                    ]
                });
            });
            function refresh_table() {
                $('#accountlist').dataTable().fnReloadAjax();
            }
        </script>
    </body>
</html>


