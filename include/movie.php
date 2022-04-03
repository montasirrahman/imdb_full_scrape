<form action="insert.php" method="post">

<?php
echo '
Movie <b style="color: red;">*</b>
<textarea id="text" cols="40" rows="1" name="mo_tv_ep" placeholder="" required>movie</textarea>

IMDB ID <b style="color: red;">*</b>
<textarea id="text" cols="40" rows="1" name="imdb_id" placeholder="" required>'.$tt.'</textarea>
';

echo '

Title <b style="color: red;">*</b>
<textarea id="text" cols="40" rows="1" name="title" placeholder="" required>'.$imdb->find('h1.sc-b73cd867-0.eKrKux', 0)->plaintext.''.$imdb->find('h1.sc-b73cd867-0.cAMrQp', 0)->plaintext.''.$imdb->find('h1.sc-b73cd867-0.fbOhB', 0)->plaintext.'</textarea>

Year <b style="color: red;">*</b>
<textarea id="text" cols="40" rows="1" name="year_r" placeholder="" required>'.$imdb->find('span.sc-52284603-2.iTRONr', 0)->plaintext.'</textarea>



Images URL:
<textarea id="text" cols="40" rows="1" name="image_url" placeholder="" >'.$imdb->find('div.ipc-media.ipc-media--poster-27x40.ipc-image-media-ratio--poster-27x40.ipc-media--baseAlt.ipc-media--poster-l.ipc-poster__poster-image.ipc-media__img . img.ipc-image', 0)->src.'</textarea>


Genres : 
<textarea id="text" cols="40" rows="1" name="genre" placeholder="" >'.$imdb->find('span.ipc-chip__text', 0)->plaintext.','.$imdb->find('span.ipc-chip__text', 1)->plaintext.','.$imdb->find('span.ipc-chip__text', 2)->plaintext.'</textarea>


Plot (max - char190) : 
<textarea id="text" cols="40" rows="2" name="plot" placeholder="" maxlength="190">'.$imdb->find('span.sc-16ede01-0.fMPjMP', 0)->plaintext.'</textarea>

Rating : 
<textarea id="text" cols="40" rows="1" name="rating" placeholder="" >'.$imdb->find('span.sc-7ab21ed2-1.jGRxWM', 0)->plaintext.'</textarea>

Number of People :  
<textarea id="text" cols="40" rows="1" name="number_of_people" placeholder="" >'.$imdb->find('div.sc-7ab21ed2-3.dPVcnq', 0)->plaintext.'</textarea>
';

echo '
Moviemeter or Popularity : 
<textarea id="text" cols="40" rows="1" name="moviemeter" placeholder="">'.$imdb->find('div.sc-edc76a2-1.gopMqI', 0)->plaintext.'</textarea>

';

//--------------------Director----------
$word0 = 'nm';
$mystring0 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 0)->href.'';
 
// Test if string contains the word 
if(strpos($mystring0, $word0) == false){
    echo "not available Director <br>";
} else{
    $director = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 0)->href.'';
	$director2 = basename(parse_url($director, PHP_URL_PATH));
	
	echo 'Director :
	<textarea id="text" cols="40" rows="1" name="director" placeholder="" >'.$director2.'</textarea> 
	';
}

//------------------writer---------------

$word1 = 'nm';
$mystring1 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 1)->href.'';
 
// Test if string contains the word 
if(strpos($mystring1, $word1) == false){
    echo "not available Writer <br>";
} else{
	$writers01 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 1)->href.'';
	$writers1 = basename(parse_url($writers01, PHP_URL_PATH));

	$writers02 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 2)->href.'';
	$writers2 = ',' . basename(parse_url($writers02, PHP_URL_PATH));

	$writers03 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 3)->href.'';
	$writers3 = ',' . basename(parse_url($writers03, PHP_URL_PATH));

	echo 'Writers : 
	<textarea id="text" cols="40" rows="1" name="writers" placeholder="" >'.$writers1 . $writers2 . $writers3.'</textarea>
	';
}


//--------------------Artist----------
$word2 = 'nm';
$mystring2 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 0)->href.'';
 
// Test if string contains the word 
if(strpos($mystring2, $word2) == false){
    echo "not available Artist <br>";
} else{
	$artists01  = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 0)->href.'';
	$artists1 = basename(parse_url($artists01, PHP_URL_PATH));

	$artists02 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 1)->href.'';
	$artists2 = ',' . basename(parse_url($artists02, PHP_URL_PATH));

	$artists03 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 2)->href.'';
	$artists3 = ',' . basename(parse_url($artists03, PHP_URL_PATH));

	$artists04 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 3)->href.'';
	$artists4 = ',' . basename(parse_url($artists04, PHP_URL_PATH));

	$artists05 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 4)->href.'';
	$artists5 = ',' . basename(parse_url($artists05, PHP_URL_PATH));

	$artists06 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 5)->href.'';
	$artists6 = ',' . basename(parse_url($artists06, PHP_URL_PATH));

	$artists07 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 6)->href.'';
	$artists7 = ',' . basename(parse_url($artists07, PHP_URL_PATH));

	$artists08 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 7)->href.'';
	$artists8 = ',' . basename(parse_url($artists08, PHP_URL_PATH));

	$artists09 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 8)->href.'';
	$artists9 = ',' . basename(parse_url($artists09, PHP_URL_PATH));

	$artists010 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 9)->href.'';
	$artists10 = ',' . basename(parse_url($artists010, PHP_URL_PATH));

	$artists011 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 10)->href.'';
	$artists11 = ',' . basename(parse_url($artists011, PHP_URL_PATH));

	$artists012 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 11)->href.'';
	$artists12 = ',' . basename(parse_url($artists012, PHP_URL_PATH));

	$artists013 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 12)->href.'';
	$artists13 = ',' . basename(parse_url($artists013, PHP_URL_PATH));

	$artists014 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 13)->href.'';
	$artists14 = ',' . basename(parse_url($artists014, PHP_URL_PATH));

	$artists015 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 14)->href.'';
	$artists15 = ',' . basename(parse_url($artists015, PHP_URL_PATH));

	$artists016 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 15)->href.'';
	$artists16 = ',' . basename(parse_url($artists016, PHP_URL_PATH));

	$artists017 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 16)->href.'';
	$artists17 = ',' . basename(parse_url($artists017, PHP_URL_PATH));

	$artists018 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 17)->href.'';
	$artists18 = ',' . basename(parse_url($artists018, PHP_URL_PATH));




	echo 'Artists : 
	<textarea id="text" cols="40" rows="1" name="artists" placeholder="" >'.$artists1 . $artists2 . $artists3 . $artists4 . $artists5 . $artists6 . $artists7 . $artists8 . $artists9 . $artists10 . $artists11 . $artists12 . $artists13 . $artists14 . $artists15 . $artists16 . $artists17 . $artists18.'</textarea>
	';

}
?>


	 <script>
	 function clickme_s() {
	  console.log('You clicked me');
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
	<button type="submit" class="btn-primary"  onclick="clickme_s()">Add Record</button>

<!--
class="btn-primary"
-->
	
</form>