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
                                            <li class="active"><span>User Accounts</span></li>
                                        </ol>
                                        <h1>User Accounts</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-box">
                                    <header class="main-box-header clearfix">
                                        <h2 id="page_title" class="pull-right">      
                                            <button type="button" class="btn btn-primary" name="add_user" id="add_user" onClick="location.href = '<?php echo base_url(); ?>auth_admin/add_user'">Add User</button>
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
                                                        <th><span>Email</span></th>
                                                        <th><span>IP Address</span></th>
                                                        <th><span>Last Login Date</span></th>                                                      
                                                        <th><span>Is Suspended</span></th>
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
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refresh_table()"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title" id="myModalLabel"></h1>
                    </div>
                    <form method="post" accept-charset="utf-8" id="confirmdelete" novalidate="novalidate" enctype="multipart/form-data">  
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="hidden" class="form-control" id="type" name="type">
                            <label id="delete_msg"></label>                                                                                
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-default" type="button"  data-dismiss="modal" onclick="account_status()" name="delete_btn" id="delete_btn">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh_table()">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refresh_table()"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title" id="myModalLabel">Delete User Account</h1>
                    </div>
                    <form method="post" accept-charset="utf-8" id="confirm_delete" novalidate="novalidate" enctype="multipart/form-data">  
                        <div class="modal-body">                            
                            <input type="hidden" class="form-control" id="delete_id" name="delete_id">
                            <label id="delete_record_msg"></label>                                                                                
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-default" type="button"  data-dismiss="modal" onclick="ConfirmDelete()" name="delete_btn" id="delete_btn" value="Delete">
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
                                        "sAjaxSource": "<?php echo base_url(); ?>auth_admin/get_user_account",
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
                                            $(nRow).attr("uacc_id", aData.id);
                                        },
                                        aoColumnDefs: [
                                            {
                                                mData: 'uacc_username',
                                                aTargets: [0]
                                            },
                                            {
                                                mData: 'uacc_email',
                                                aTargets: [1]
                                            },
                                            {
                                                mData: 'uacc_ip_address',
                                                aTargets: [2]
                                            },
                                            {
                                                mData: 'uacc_date_last_login',
                                                aTargets: [3]
                                            },
                                            {
                                                mData: '',
                                                aTargets: [4],
                                                mRender: function (data, type, full)
                                                {
                                                    if (full['uacc_suspend'] == 1) {
                                                        var html = '<div class="onoffswitch"><input type="checkbox" name="activate' + full['uacc_id'] + '" class="onoffswitch-checkbox" id="activate' + full['uacc_id'] + '" onClick="user_status(' + full['uacc_id'] + ')" checked><label class="onoffswitch-label" for="activate' + full['uacc_id'] + '"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>';
                                                        return html;
                                                    } else {
                                                        var html = '<div class="onoffswitch"><input type="checkbox" name="inactivate' + full['uacc_id'] + '" class="onoffswitch-checkbox" id="inactivate' + full['uacc_id'] + '" onClick="user_status(' + full['uacc_id'] + ')"><label class="onoffswitch-label" for="inactivate' + full['uacc_id'] + '"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div>';
                                                        return html;
                                                    }
                                                }
                                            },
                                        ]
                                    });
                                });
                                function user_status(user_id) {                                    
                                    $.ajax({
                                        url: "<?php echo base_url(); ?>auth_admin/susped_user/",
                                        type: "POST",
                                        data: {user_id: user_id},
                                        dataType: "JSON",
                                        success: function (data)
                                        {
                                            refresh_table();
                                        }
                                    });
                                }
                                function refresh_table() {
                                    $('#accountlist').dataTable().fnReloadAjax();
                                }
        </script>
    </body>
</html>


