
<?php
include 'include/db.php';
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$imdb_nm = mysqli_real_escape_string($conn, $_POST['imdb_nm']);


	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$work_as = mysqli_real_escape_string($conn, $_POST['work_as']);
	$birth = mysqli_real_escape_string($conn, $_POST['birth']);
	$image = mysqli_real_escape_string($conn, $_POST['image']);
	$image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
	$bio = mysqli_real_escape_string($conn, $_POST['bio']);
	$b_date = mysqli_real_escape_string($conn, $_POST['b_date']);
	$died = mysqli_real_escape_string($conn, $_POST['died']);
	$al_name = mysqli_real_escape_string($conn, $_POST['al_name']);
	$height = mysqli_real_escape_string($conn, $_POST['height']);
	$parents = mysqli_real_escape_string($conn, $_POST['parents']);
	$youtube_t = mysqli_real_escape_string($conn, $_POST['youtube_t']);
 
// attempt insert query execution
$sql = "INSERT INTO imdb_nm (imdb_nm, name, work_as, birth, image, bio, b_date, died, al_name, height, parents, youtube_t, image_url) VALUES ('$imdb_nm', '$name', '$work_as', '$birth', '$image', '$bio', '$b_date', '$died', '$al_name', '$height', '$parents', '$youtube_t', '$image_url')";
if(mysqli_query($conn, $sql)){
    echo 'Records added successfully.<meta http-equiv="refresh" content="0;url=nm.php" />';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);
?>

