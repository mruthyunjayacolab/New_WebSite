<?php
include 'db.php';



if (isset($_POST['delete'])) {
$id = $_POST['rid'];

//DELETE FROM `breaking_news` WHERE 1
$sql_delete = mysqli_query($db,"DELETE FROM `ads` WHERE id = '$id'");

}
?>
<script>

alert("Deleted");
window.location = "advertisement.php";

</script>