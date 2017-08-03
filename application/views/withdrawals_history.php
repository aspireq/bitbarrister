<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $common; ?>
    </head>
    <body>
        <?php echo $header; ?>
        <section class="memberpanel-banner">
            <div class="container">
                <div class="sub-banner">
                    <div class="sub-banner-text">
                        <h1>Member Panel</h1>
                    </div>
                </div>
            </div>
            <img src="<?php echo base_url(); ?>include_files/img/memberpanel/subbanner.jpg" class="img-responsive sub-banner-img">
        </section>
        <div class="container">
            <div class="row memberpanel">
                <?php echo $member_sidebar; ?>
                <div class="col-md-9">
                    <div class="row panel-header">
                        <div class="col-md-12">
                            <h3>Withdraw History</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 filter">
                            <form method="post">
                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                        <label class="control-label">Transactions :</label>
                                        <select class="form-control">
                                            <option>All Transaction</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                        <label for="from" class="control-label">From :</label>
                                        <input type="text" id="from_date" name="from_date" class="form-control" value="<?php echo ($from_date != "") ? $from_date : ''; ?>">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                        <label for="to" class="control-label">To :</label>
                                        <input type="text" id="to_date" name="to_date" class="form-control" value="<?php echo ($to_date != "") ? $to_date : ''; ?>">
                                    </div>
                                    <div class="form-group col-md-2 col-sm-2 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-sm btn-submit" id="search_report" name="search_report">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Withdrawal Id</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($results)) { ?>
                                        <?php
                                        array_pop($results);
                                        foreach ($results as $data) {
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $data->withdrawal_id; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $data->amount; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $data->created_date; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $data->withdrawal_status_text; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                No transactions found
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pull-right">                                        
                                    <?php
                                    foreach ($links as $key => $link) {
                                        echo "<li>" . $link . "</li>";
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>              
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
        <script src="<?php echo base_url(); ?>include_files/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>include_files/js/bitbarrister.js"></script>
        <script>
            $(function () {
                $("#from_date").datepicker({});
            });
            $(function () {
                $("#to_date").datepicker({});
            });
        </script>
    </body>
</html>