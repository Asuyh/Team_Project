<!-- Everyone create the same schema and password.. -->
<?php
$conn = oci_connect('ALL_GROCERS_HUB', 'Sh@mbhu123', '//localhost/xe');

if (!$conn) {
	$e = oci_error();
	echo "Error";
	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
?>

  