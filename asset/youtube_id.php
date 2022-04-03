
<?php
$api_key = 'AIzaSyCV8AbCqvnRRmVFd50wmQpKpYN1y7m_I7I';
  
$arr_list = array();
if (array_key_exists('q', $_GET) && array_key_exists('max_result', $_GET) && array_key_exists('order', $_GET)) {
    $formatted_keyword = implode("+", explode(" ", $_GET['q']));
    $url = "https://www.googleapis.com/youtube/v3/search?q=$formatted_keyword&order=". $_GET['order'] ."&part=snippet&type=video&maxResults=". $_GET['max_result'] ."&key=". $api_key;
  
    if (array_key_exists('pageToken', $_GET)) {
        $url .= "&pageToken=". $_GET['pageToken'];
    }
 
    $arr_list = getYTList($url);
}
  
function getYTList($api_url = '') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $arr_result = json_decode($response);
    if (isset($arr_result->items)) {
        return $arr_result;
    } elseif (isset($arr_result->error)) {
        //print error $arr_result->error
    }
}
?>
 
<form method="get">
    <p><input type="text" name="q" placeholder="Enter keyword" value="<?php if(array_key_exists('q', $_GET)) echo $_GET['q']; ?>" required></p>
    <p><input type="number" name="max_result" placeholder="Max Results" min="1" max="50" value="1" ></p>
    <p>
        <?php $arr_orders = ['relevance']; ?>
        <select name="order" >
            <?php foreach ($arr_orders as $order) { ?>
                <option value="<?php echo $order; ?>" <?php if(array_key_exists('order', $_GET) && ($order==$_GET['order'])) echo 'selected'; ?>><?php echo ucfirst($order); ?></option>
            <?php } ?>
        </select>
    </p>
    <p><input type="submit" value="Submit"></p>
</form>
 
<?php
if (!empty($arr_list)) {
    echo '<ul>';
    foreach ($arr_list->items as $item) {
        echo "<li>". $item->snippet->title ."<h1 class='youtube_id_scrape'>". $item->id->videoId ."<h1></li>";
    }
    echo '</ul>';
  
    $url = "?q=". $_GET['q'] ."&max_result=". $_GET['max_result'] ."&order=". $_GET['order'];
    if (isset($arr_list->prevPageToken)) {
        echo '<a href="'.$url.'&pageToken='.$arr_list->prevPageToken.'">Previous</a>';
    }
  
    if (isset($arr_list->nextPageToken)) {
        echo '<a href="'.$url.'&pageToken='.$arr_list->nextPageToken.'">Next</a>';
    }
}
?>