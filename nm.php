<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<div class="width_all">
	<form action="insert_nm.php" method="post">
<?php
		include("asset/simple_html_dom.php");
		 	
		// Show Data from database
		error_reporting(E_ERROR | E_WARNING | E_PARSE); 


		include 'include/db.php';
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
		//----------------imdb_all------------------
		
		$sql = "SELECT imdb_nm FROM imdb_nm ORDER by id DESC limit 0,1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			$nm_imdb = $row["imdb_nm"];
			echo $nm_imdb ;
		  }
		} else {
		  echo "0 record <br>";
		}
		
		
		
		// imdb_nm + 1 
			$plus1 =  substr($nm_imdb, 2, 20);
			$plus2 = 1;
			$sum_plus = $plus1 + $plus2;
			$nm2 = 'nm' . sprintf('%07d', $sum_plus);
			
			echo ' Adding <b style="color: #1A73E8">'.$nm2.'</b>' ;
?>	

<?php

//$nm = 'nm0000001';

$nm = $nm2; //tt1160419



$imdb0 = file_get_html($imdbUrl . '/name/' . $nm);



echo '<br>';

//---------------------------------------------------



$a_c = ''.$imdb0.'';

$c_c = strlen($a_c);

if ($c_c > 1) {
    echo "All Good <br>";
	$imdb = file_get_html($imdbUrl . '/name/' . $nm);
} else {
    echo "Plus 1 <br>";

	$plus3 =  substr($nm, 2, 20);

	echo '<b style="color: #000">nm' . $plus3 . '</b>  ';

	$nm = $plus3 + 1;

	$nm = 'nm' . sprintf('%07d', $nm);

	echo '<b style="color: #1A73E8">'.$nm.'</b>' ;

	$imdb = file_get_html($imdbUrl . '/name/' . $nm);
}


//---------------------------------------------------

echo '<br>';

//start scrape-------------------------------------------------------------------------------------

echo '<title>'.$imdb->find('h1.header . span.itemprop', 0)->plaintext.'</title>';

//---------------------------------------------------S

echo
'IMDB ID <b style="color: red;">*</b>  <br>
<textarea id="text" cols="40" rows="1" name="imdb_nm" placeholder="" required>'.$nm.'</textarea>';

echo '<br>';

//nm
echo '
nm <b style="color: red;">*</b> <br>
<textarea id="text" cols="40" rows="1" name="name" placeholder="" required>'.$imdb->find('h1.header . span.itemprop', 0)->plaintext.'</textarea>
';

echo '<br>';

//work_as
echo '
work_as <b style="color: ;">*</b> <br>
<textarea id="text" cols="40" rows="1" name="work_as" placeholder="" >'.$imdb->find('div[id=name-job-categories] . a', 0)->plaintext.''.$imdb->find('div[id=name-job-categories] . a', 1)->plaintext.''.$imdb->find('div[id=name-job-categories] . a', 2)->plaintext.'</textarea>
';

echo '<br>';

//img src
echo '
image_url <b style="color: ;">*</b> <br>
<textarea id="text" cols="40" rows="1" name="image_url" placeholder="" >'.$imdb->find('img[id=name-poster]', 0)->src.'</textarea>
';

echo '<br>';

//bio

echo '
bio <b style="color: ;">*</b> <br>
<textarea id="text" cols="40" rows="1" name="bio" placeholder="" >'.$imdb->find('div.inline', 0)->plaintext.'</textarea>
';

echo '<br>';

//born
echo '
born <b style="color: red;">*</b> <br>
<textarea id="text" cols="40" rows="1" name="b_date" placeholder="" >'.$imdb->find('div[id=name-born-info]', 0)->plaintext.'</textarea>
';

echo '<br>';

//Died
echo '
Died <b style="color: ;">*</b> <br>
<textarea id="text" cols="40" rows="1" name="died" placeholder="" >'.$imdb->find('div[id=name-death-info]', 0)->plaintext.'</textarea>
';

echo '<br>';

//Personal Details--------------------------
//Alternate Names:
echo '
Alternate Names <b style="color: ;">*</b> <br>
<textarea id="text" cols="40" rows="1" name="al_name" placeholder="" >'.$imdb->find('div[id=details-akas]', 0)->plaintext.'</textarea>
';

echo '<br>';

//Height:

echo '
Height  <b style="color: ;">*</b> <br>
<textarea id="text" cols="40" rows="1" name="height" placeholder="" >'.$imdb->find('div[id=details-height]', 0)->plaintext.'</textarea>
';

echo '<br>';

//details-parents:

echo '
details-parents <b style="color: ;">*</b> <br>
<textarea id="text" cols="40" rows="1" name="parents" placeholder="" >'.$imdb->find('div[id=details-parents]', 0)->plaintext.'</textarea>
';

echo '<br>';


?>
	 <script>
	 function clickme_s() {
	  console.log('You clicked me brother');
	}
	let intervalFunction;
	let count = 0;
	window.onload = function () {
	  intervalFunction = setInterval(function () {
		if (typeof document.getElementsByClassName('btn-primary')[0] != "undefined") {
		  document.getElementsByClassName('btn-primary')[0].click();
		  count++;
		  if (count === 1) {
			console.log("Now you have clicked me 1 times!! let me take a break")
			clearInterval(intervalFunction)
		  }
		}
	  }, 1);
	}
	</script>
	<br><br><br>
	<button type="submit"  class="btn-primary" onclick="clickme_s()">Add Record</button>

<!--
class="btn-primary"
-->
	
</form>		
	</div>
</body>
</html>