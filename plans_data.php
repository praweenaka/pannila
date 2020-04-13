<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "setitem") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    if ($_GET["Command1"] == "del_item") {
        $sql = "delete from family_main where home_no='" . $_GET['home_no'] . "' ";

        $result = $conn->query($sql);
    }
    if ($_GET["Command1"] == "add_tmp") {

        $sql1 = "Insert into tmp_family_main_item(home_no,name,job,nic,bday,sex)values
    ('" . $_GET['home_no'] . "','" . $_GET['name'] . "','" . $_GET['job'] . "','" . $_GET['nic'] . "','" . $_GET['bday'] . "','" . $_GET['check'] . "') ";

        $result1 = $conn->query($sql1);
    }

    $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\">
					  <tr class='info'>
                               
                            </tr>";

    $i = 1;

    $sql = "Select * from tmp_family_main_item where home_no='" . $_GET['home_no'] . "'";
//    $x = $_SESSION['mealType'];
    foreach ($conn->query($sql) as $row) {

        $ResponseXML .= "<tr> 
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['job'] . "</td>
                            <td>" . $row['nic'] . "</td>
                            <td>" . $row['bday'] . "</td>
                            <td><input type = \"checkbox\" checked name=\"radio\" ></td>
                            <td><a class=\"btn btn-danger btn-xs\" onClick=\"del_item('" . $row['home_no'] . "')\"> <span class='glyphicon glyphicon-remove'></span></a></td>
			    </tr>";

        $i = $i + 1;
    }

    $ResponseXML .= "</table>]]></sales_table>";
    $ResponseXML .= "<item_count><![CDATA[" . $i . "]]></item_count>";
    $ResponseXML .= "</salesdetails>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "setitem1") {
    $sql3 = "delete from family_main where home_no='" . $_GET['home_no'] . "'";
    $result = $conn->query($sql3);
}


if ($_GET["Command"] == "save_item") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
//        $sql = "delete from food_menu_master_vip where itemCode = '" . $_GET['itemcode'] . "'";
//        $result = $conn->query($sql);

        $sql = "Insert into family_main (home_no,owner,enterdate,address)values 
    ('" . $_GET['home_no'] . "','" . $_GET['owner'] . "','" . $_GET['enter_date'] . "','" . $_GET['address'] . "') ";
        $result = $conn->query($sql);

        $sql1 = "select * from tmp_family_main_item where home_no='" . $_GET['home_no'] . "'";
        foreach ($conn->query($sql1) as $row) {

            $sql1 = "Insert into family_main_item(home_no,name,job,nic,bday,sex)values
    ('" . $_GET['home_no'] . "','" . $row['name'] . "','" . $row['job'] . "','" . $row['nic'] . "','" . $row['bday'] . "','" . $row['sex'] . "') ";

            $result1 = $conn->query($sql1);
        }

        $sql3 = "delete from tmp_family_main_item where home_no='" . $_GET['home_no'] . "'";
        $result = $conn->query($sql3);


        $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
?>