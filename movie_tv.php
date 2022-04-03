
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<div class="width_all">
			
		<?php
		include("asset/simple_html_dom.php");
		 ?>		

		<?php
		// Show Data from database
		error_reporting(E_ERROR | E_WARNING | E_PARSE); 
		error_reporting(E_ERROR | E_PARSE);


		include 'include/db.php';
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
		//----------------imdb_all------------------
		
		$sql = "SELECT id, mo_tv_ep, imdb_id, title FROM imdb_all ORDER by id DESC limit 0,1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			$tt_imdb = $row["imdb_id"];
			//echo $tt_imdb ;
		  }
		} else {
		  echo "0 results ";
		}
		
		//----------------imdb_ep------------------

		$sql0 = "SELECT id, mo_tv_ep, imdb_id, title FROM imdb_ep ORDER by id DESC limit 0,1";
		$result0 = $conn->query($sql0);

		if ($result0->num_rows > 0) {
		  // output data of each row
		  while($row0 = $result0->fetch_assoc()) {
			$tt_imdb0 = $row0["imdb_id"];
			//echo $tt_imdb0 ;
		  }
		} else {
		  echo "<span>*No data in Episode*</span>";
		}
		$conn->close();
		?>			
		
		<?php 
		// Finding the max value in imdb_all & imdb_ep
			 $n1 = substr($tt_imdb, 2, 20);
			 $n2 = substr($tt_imdb0, 2, 20);
			 $max0 = max($tt_imdb, $tt_imdb0);
			 
			 echo 'Max all,ep <b style="color:green">'.$max0.' </b>' ;
			 
		// imdb_all & imdb_ep max value + 1 
			$plus1 =  substr($max0, 2, 20);
			$plus2 = 1;
			$sum_plus = $plus1 + $plus2;
			$tt2 = 'tt' . sprintf('%07d', $sum_plus);
			
			echo 'Adding <b style="color: #1A73E8">'.$tt2.'</b>' ;
		?>	
		
		
	
		
		

<?php
/*
$word01 = "title";
$mystring01 = "title, title, releaseinfo";
 
// Test if string contains the word 
if(strpos($mystring01, $word01) !== false){
    echo "not avalable";
} else{
    echo "show!";
}
*/
?>	
			

<?php 	

// tt1877830 tt5788792 tt11434042

//$tt = 'tt0010219';

$tt = $tt2; //tt1160419



$imdb0 = file_get_html($imdbUrl . '/title/' . $tt);





//---------------------------------------------------
echo '<br>';


$a_c = ''.$imdb0.'';

$c_c = strlen($a_c);

if ($c_c > 1) {
    echo "All Good <br>";
	$imdb = file_get_html($imdbUrl . '/title/' . $tt);
} else {
    echo "Plus 1 <br>";

	$plus3 =  substr($tt, 2, 20);

	echo '<b style="color: #000">tt' . $plus3 . '</b>  ';

	$tt = $plus3 + 1;

	$tt = 'tt' . sprintf('%07d', $tt);

	echo '<b style="color: #1A73E8">'.$tt.'</b>' ;

	$imdb = file_get_html($imdbUrl . '/title/' . $tt);
}

echo '<br>';
//---------------------------------------------------









echo '<title>'.$imdb->find('h1.sc-b73cd867-0.eKrKux', 0)->plaintext.'</title>';

$allep = ''.$imdb->find('a.ipc-button.ipc-button--single-padding.ipc-button--center-align-content.ipc-button--default-height.ipc-button--core-baseAlt.ipc-button--theme-baseAlt.ipc-button--on-textPrimary.ipc-text-button.subnav__all-episodes-button.sc-2a366625-5.febJEF . div.ipc-button__text', 0)->plaintext.'';



	if (strlen($allep) > '2') {
  		echo $allep;
		
//---------Episode-------------		

		include("include/episode.php");	
		
	} else {

		$movtv = ''.$imdb->find('span.sc-89e7233a-1.dWZpw.episode-guide-text', 0)->plaintext.'';

		if (strlen($movtv) < '2') {

//------------------------------------------------------------------------------Movie-------		
		
		include("include/movie.php");	
			  
		} else {
	
//----------------------------------------------------------------TV-Shows-----------------	

		include("include/tv-show.php");

		}


	}

						
?>
		
	</div>
</body>
</html>

