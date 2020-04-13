
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <center><h4 class="modal-title" id="myModalLabel">Add New Family</h4></center>
            </div>
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Home No</label>
                            <input type="text" placeholder="Home No" id="home_no" name="home_no" class="form-control input-sm">
                        </div>
                        <div class="col-sm-3">
                            <label>Name</label>
                            <input type="text" placeholder="Owner" id="owner"  name="owner" class="form-control input-sm">
                        </div>
                        <div class="col-sm-3">
                            <label>Entered Date</label>
                            <input type="date"  id="enter_date" name="enter_date" class="form-control input-sm">
                        </div>
                        <div class="col-sm-3">
                            <label>Address</label>
                            <input type="text"  id="address" name="address" class="form-control input-sm">
                        </div>
                    </div>
                    <div style="height:10px;"></div>

                    <div class="row">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <tr class='info'>
                                <th style="width: 120px;">Name</th>
                                <th style="width: 120px;">Job</th>
                                <th style="width: 10px;">Nic</th>
                                <th style="width: 120px;">B Day</th>
                                <th style="width: 120px;">Married/Unmarried</th>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" placeholder="Name" id="name" name="name" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" placeholder="Job" id="job"  name="job" class="form-control input-sm">
                                </td>

                                <td>
                                    <input type="text" placeholder="Nic" id="nic" name="nic" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="date" id="bday" name="bday" class="form-control dt">
                                </td>
                                <td>
                                    <input type="checkbox" id="sex" name="sex" class="input-sm">
                                </td>
                                <td><button type="submit" onclick="ADD();"class="btn btn-default"><i class="glyphicon glyphicon-plus-sign"></i> </button></a></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <div id="itemdetails"></div>

            <div class="modal-footer">
                <div class="row">
                    <div id="msg_box" class="col-sm-6">

                    </div>
                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cancel"></i> Close</button>
                        <button type="submit" onclick="save_inv();"  class="btn btn-success"><i class="glyphicon glyphicon-saved"></i> Save</button>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="detail<?php echo $row['home_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Family Details </h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Home No</label>
                            <input type="text" disabled="" placeholder="Home No" value="<?php echo $row['home_no']; ?>" id="itemdesc" class="form-control input-sm">
                        </div>
                        <div class="col-sm-3">
                            <label>Name</label>
                            <input type="text" disabled="" placeholder="Name" value="<?php echo $row['owner']; ?>" id="itemdesc" class="form-control input-sm">
                        </div>
                        <div class="col-sm-3">
                            <label>Entered Date</label>
                            <input type="date" disabled="" value="<?php echo $row['enterdate']; ?>"  id="itemdesc" class="form-control input-sm">
                        </div>
                        <div class="col-sm-3">
                            <label>Address</label>
                            <input type="text" disabled="" value="<?php echo $row['address']; ?>"  id="address" class="form-control input-sm">
                        </div>
                    </div>
                    <div style="height:10px;"></div>

                    <div class="row">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <tr class='info'>
                                <th style="width: 120px;">Name</th>
                                <th style="width: 120px;">Job</th>
                                <th style="width: 120px;">Nic</th>
                                <th style="width: 120px;">B Day</th>
                                <th style="width: 120px;">Married/Unmarried</th>
                            </tr>

                            <tbody>
                                <?php
                                include './connection_sql.php';
                                $total = 0;
                                $pd = "select * from view_family_main where home_no='" . $row['home_no'] . "'";
                                foreach ($conn->query($pd) as $pdrow) {
                                    ?>
                                    <tr>
                                        <td><?php echo ucwords($pdrow['name']); ?></td>
                                        <td align="right"><?php echo $pdrow['job']; ?></td>
                                        <td><?php echo $pdrow['nic']; ?></td>
                                        <td><?php echo $pdrow['bday']; ?></td>
                                        <?php
                                        if ($pdrow['sex'] == 1) {
                                            echo" <td><input type='checkbox' disabled checked='' id='price' class='input-sm'></td>";
                                        } else {
                                            echo" <td><input type='checkbox' disabled  id='price' class='input-sm'></td>";
                                        }
                                        ?>

                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Supplier -->
<div class="modal fade" id="del_<?php echo $row['home_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Family</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5><center>House No: <strong id="xx"><?php echo $row['home_no']; ?></strong></center></h5>
                </div>                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" onclick="del_item1();" data-dismiss="modal" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Edit Customer -->
<div class="modal fade" id="edit_<?php echo $row['home_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Family Details </h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Home No</label>
                            <input type="text" disabled="" placeholder="Home No" value="<?php echo $row['home_no']; ?>" id="itemdesc" class="form-control input-sm">
                        </div>
                        <div class="col-sm-3">
                            <label>Name</label>
                            <input type="text"  placeholder="Name" value="<?php echo $row['owner']; ?>" id="itemdesc" class="form-control input-sm">
                        </div>
                        <div class="col-sm-3">
                            <label>Entered Date</label>
                            <input type="date"  value="<?php echo $row['enterdate']; ?>"  id="itemdesc" class="form-control input-sm">
                        </div>
                        <div class="col-sm-3">
                            <label>Address</label>
                            <input type="text"  value="<?php echo $row['address']; ?>"  id="address" class="form-control input-sm">
                        </div>
                    </div>
                    <div style="height:10px;"></div>

                    <div class="row">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <tr class='info'>
                                <th style="width: 120px;">Name</th>
                                <th style="width: 120px;">Job</th>
                                <th style="width: 10px;">Nic</th>
                                <th style="width: 120px;">B Day</th>
                                <th style="width: 120px;">Married/Unmarried</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" placeholder="Name" id="name" name="name" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="text" placeholder="Job" id="job"  name="job" class="form-control input-sm">
                                </td>

                                <td>
                                    <input type="text" placeholder="Nic" id="nic" name="nic" class="form-control input-sm">
                                </td>
                                <td>
                                    <input type="date" id="bday" name="bday" class="form-control dt">
                                </td>
                                <td>
                                    <input type="checkbox" id="sex" name="sex" class="input-sm">
                                </td>
                                <td><button type="submit" onclick="ADD();"class="btn btn-default"><i class="glyphicon glyphicon-plus-sign"></i> </button></a></td>
                            </tr>
                            <tbody>
                                <?php
                                include './connection_sql.php';
                                $total = 0;
                                $pd = "select * from view_family_main where home_no='" . $row['home_no'] . "'";
                                foreach ($conn->query($pd) as $pdrow) {
                                    ?>
                                    <tr>
                                        <td><?php echo ucwords($pdrow['name']); ?></td>
                                        <td><?php echo $pdrow['job']; ?></td>
                                        <td><?php echo $pdrow['nic']; ?></td>
                                        <td><?php echo $pdrow['bday']; ?></td>
                                        <?php
                                        if ($pdrow['sex'] == 1) {
                                            echo" <td><input type='checkbox'  checked='' id='price' class='input-sm'></td>";
                                        } else {
                                            echo" <td><input type='checkbox'   id='price' class='input-sm'></td>";
                                        }
                                        ?>

                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div id="msg_box" class="col-sm-6">

                    </div>
                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cancel"></i> Close</button>
                        <button type="submit" onclick="edit();"  class="btn btn-success"><i class="glyphicon glyphicon-saved"></i> Edit</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.modal -->
<script src="js/plans.js"></script>