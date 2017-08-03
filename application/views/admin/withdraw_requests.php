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
                                            <li class="active"><span>Withdraw Requests</span></li>
                                        </ol>
                                        <h1>Withdraw Requests</h1>
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
                                                        <th><span>Withdrawal Id</span></th>
                                                        <th><span>Amount</span></th>
                                                        <th><span>Status</span></th>
                                                        <th><span>Request Date</span></th>
                                                        <th><span>Accept Request</span></th>
<!--                                                    <th><span>Access Permissions</span></th>
                                                        <th><span>Action</span></th>-->
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
        <div class="modal fade" id="withdrawals_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refresh_table()"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title" id="myModalLabel">Accept Withdrawals ? </h1>
                    </div>
                    <form method="post" accept-charset="utf-8" id="confirm_delete" novalidate="novalidate" enctype="multipart/form-data">  
                        <div class="modal-body">                            
                            <input type="hidden" class="form-control" id="withdrawals_id" name="withdrawals_id">
                            <label id="withdrawals_record_msg"></label>                                                                                
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-default" type="button"  data-dismiss="modal" onclick="accept_withdrawals()" name="delete_btn" id="delete_btn" value="Accept">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh_table()">Cancel</button>
                        </div>
                    </form>
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
                                        "sAjaxSource": "<?php echo base_url(); ?>auth_admin/get_withdraw_requests",
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
                                                mData: 'withdrawal_id',
                                                aTargets: [1]
                                            },
                                            {
                                                mData: 'amount',
                                                aTargets: [2]
                                            },
                                            {
                                                mData: 'withdrawal_status_text',
                                                aTargets: [3]
                                            },
                                            {
                                                mData: 'created_date',
                                                aTargets: [4]
                                            },
                                            {
                                                "bSortable": false,
                                                mData: '',
                                                aTargets: [5],
                                                mRender: function (data, type, full)
                                                {
                                                    if (full['record_status'] == 0) {
                                                        var html = '<a class="btn btn-sm btn-primary btn_m10" onClick="withdrawals_modal(' + full['id'] + ')"><i class="glyphicon glyphicon-check"></i></a>';
                                                        html += "</a>";
                                                        return html;
                                                    } else {
                                                        var html = 'Accepted';;
                                                        return html;
                                                    }
                                                }
                                            }
                                        ]
                                    });
                                });
                                function withdrawals_modal(id = null) {
                                    $('#withdrawals_id').val('');
                                    $('#withdrawals_id').val(id);
                                    $('#withdrawals_record_msg').text('Are you sure you want to this accept withdrawal request ?');
                                    $('#withdrawals_record_modal').modal('show');
                                }
                                function accept_withdrawals()
                                {
                                    var withdrawal_id = $('#withdrawals_id').val();
                                    $.ajax({
                                        url: "<?php echo base_url(); ?>auth_admin/accept_withdrawals/",
                                        type: "POST",
                                        data: {withdrawal_id: withdrawal_id},
                                        dataType: "JSON",
                                        success: function (response)
                                        {
                                            alert(response);
                                            $('#accountlist').dataTable().fnReloadAjax();
                                        }
                                    });
                                }
                                function refresh_table() {
                                    $('#accountlist').dataTable().fnReloadAjax();
                                }
        </script>
    </body>
</html>


