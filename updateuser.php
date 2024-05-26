<?php
include("connection.php");
if(isset($_GET['email'])){
$Temail=$_GET['email'];
//$PASS=md5('Password1');
$PASS='Password1';
$password = md5($PASS);
$isdisable='false';
$Trole='trader';
$updateVcodeSql = "UPDATE USERS SET PASSWORD=:passwords,IS_DISABLED=:isdisable WHERE EMAIL=:email and USER_ROLE=:role_user";
$stidVcodeUpdate = oci_parse($conn,$updateVcodeSql);
oci_bind_by_name($stidVcodeUpdate, ':passwords', $password);
oci_bind_by_name($stidVcodeUpdate, ':email', $Temail);
oci_bind_by_name($stidVcodeUpdate, ':role_user', $Trole);
oci_bind_by_name($stidVcodeUpdate, ':isdisable', $isdisable);
oci_execute($stidVcodeUpdate, OCI_COMMIT_ON_SUCCESS);

$approved='Yes';
$select="select * from users where email=:email";
$stid=(oci_parse($conn,$select));
oci_bind_by_name($stid, ':email', $Temail);
oci_execute($stid,OCI_COMMIT_ON_SUCCESS);  
while (($rowname = oci_fetch_object($stid))!= false) {
    $userid= $rowname->USER_ID;   
$updateidSql = "UPDATE SHOP_REQUEST SET IS_APPROVED=:approved WHERE USER_ID=:userid";
$stididUpdate = oci_parse($conn,$updateidSql);
oci_bind_by_name($stididUpdate, ':userid', $userid);
oci_bind_by_name($stididUpdate, ':approved', $approved);
oci_execute($stididUpdate, OCI_COMMIT_ON_SUCCESS);
oci_commit($conn);
oci_free_statement($stididUpdate);

 // Retrieve the SHOP_REQUEST_ID of the updated row
    $selectSql = "SELECT SHOP_REQUEST_ID FROM SHOP_REQUEST WHERE USER_ID=:userid";
    $stidSelect = oci_parse($conn, $selectSql);
    oci_bind_by_name($stidSelect, ':userid', $userid);
    oci_execute($stidSelect);

    $shopRequestId = null;
    if ($row = oci_fetch_assoc($stidSelect)) {
        $shopRequestId = $row['SHOP_REQUEST_ID'];
    }
    oci_free_statement($stidSelect);

    $updateshop = "INSERT INTO SHOP (SHOP_REQUEST_ID) VALUES (:shop_id)";
$stdiupdateshop = oci_parse($conn, $updateshop);
oci_bind_by_name($stdiupdateshop, ':shop_id', $shopRequestId);  // Corrected function name
oci_execute($stdiupdateshop);
oci_free_statement($stdiupdateshop);
oci_close($conn);




echo "You have accepted this trader account";
}
}
?>
