<?php
session_start();
?>
<head>
    <title>Pannila Divition</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />	
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!--vender-->
    <link href="vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
        $(document).ready(function () {
            $('#salesTable').DataTable({
                responsive: true
            });
        });
    </script>
</head>
<body>
    <!---start-wrap---->
    <!---start-header---->
    <div class="header">
        <div class="wrap">
            <!---start-logo---->
            <div class="logo">
                <a href="index.php"><img src="images/logoone.jpg" title="logo" /></a>
            </div>
            <!---End-logo---->
            <!---start-top-nav---->
            <div class="top-nav">
                <ul>
                    <li><a href="index.php">Our Village</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li class="active"><a href="plans.php">plans</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
            <!---End-top-nav---->
        </div>
        <!---End-header---->
    </div>
    <!---End-wrap---->
    <div class="clear"> </div>

    <!--start-plans-404page---->
    <div class="content">
        <div class="wrap">
            <!---start-contact---->
            <div class="section group">	
                <div class="col-sm-12 span_2_of_3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pannila Division Family Information :
                            <span class="pull-right">
                                <a href="#addnew" data-toggle="modal" style="margin-top: -5px;" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> Add New Family Details</a>
                                <?php include ('full_details.php'); ?>
                            </span>
                        </div>
                        <div class="itemde"></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="salesTable">
                                <thead>
                                    <tr>
                                        <th class="hidden"></th>
                                        <th>Home Number</th>
                                        <th>Address</th>
                                        <th>Members</th>
                                        <th>Entered Date</th>
                                        <th>Full Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include './connection_sql.php';
                                    $sql = "select * from view_family_main  group by home_no";
                                    foreach ($conn->query($sql) as $row) {
                                        
                                        ?>
                                        <tr>
                                            <td class="hidden"></td>
                                            <td><?php echo $row['home_no']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row["home_no"]; ?></td>
                                            <td><?php echo $row['enterdate']; ?></td>
                                            <td align="center">
                                                <a href="#detail<?php echo $row['home_no']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
                                                <?php include ('full_details.php'); ?>

                                            </td>
                                            <td align="center">
                                                <button data-target="#edit_<?php echo $row['home_no']; ?>" class="btn btn-success btn-sm" data-toggle="modal" ><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                                <button data-target="#del_<?php echo $row['home_no']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" ><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                                <?php include('full_details.php'); ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!---End-contact---->
        <div class="wrap">
            <!---start-contact---->

            <!--        //-->
            <div class="clear"> </div>
        </div>
        <!--End-plans-404page---->
        <div class="clear"> </div>
    </div>
    <!---End-content---->
    <div class="clear"> </div>
    <!---start-footer---->
    <?php include("footer.php"); ?>

