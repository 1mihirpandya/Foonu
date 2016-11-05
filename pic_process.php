<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>FOONU</title>
<link rel="icon" href="favicon.png" type="image/png">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
<link href="css/animate.css" rel="stylesheet" type="text/css">
 
<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->
 
</head>
<body>
<?php
/* $website = "http://calorielab.com/search/?search_input=";
$subject = $_POST['name'];
$subjectA = explode(" ", $subject);
foreach ($subjectA as &$value)
{
	$website =  $website . $value. "+";
}
$website = substr($website, 0, -1);
$file = file_get_contents($website);
$data = substr($file, stripos($file, '<td class="value cals">'));
$file = substr($data,stripos($data, '>') );
$data = substr($file,1, stripos($file, '<')-1 ); */

$item;
$cal;
$fat;
$serv;
$u;
$website ='https://api.nutritionix.com/v1_1/search/';
$subject = $_POST['name'];
$subjectA = explode(" ", $subject);
foreach ($subjectA as &$value)
{
	$website =  $website . $value. "%20";
}
$website = substr($website, 0, -3)."?fields=item_name%2Citem_id%2Cbrand_name%2Cnf_calories%2Cnf_total_fat&appId=111990de&appKey=fdabdbb9a38dfe894f0aa3aca433a17f";
$file = file_get_contents($website);
$file = json_decode($file,true);
//var_dump($file);
foreach ($file['hits'] as &$value)
{
	if ($value['fields']['brand_name'] == 'USDA')
	{
		$item = $value['fields']["item_name"];
		$cal = $value['fields']["nf_calories"];
		$fat = $value['fields']["nf_total_fat"];
		$serv = $value['fields']["nf_serving_size_qty"];
		$u = $value['fields']["nf_serving_size_unit"];
		break;
	}
	else if (strcasecmp($value['fields']['brand_name'], $subject)==0)
	{
		$item = $value['fields']["item_name"];
		$cal = $value['fields']["nf_calories"];
		$fat = $value['fields']["nf_total_fat"];
		$serv = $value['fields']["nf_serving_size_qty"];
		$u = $value['fields']["nf_serving_size_unit"];
		break;
	}
}
if (is_null($item))
{
		$item = $file['hits'][0]['fields']["item_name"];
		$cal = $file['hits'][0]['fields']["nf_calories"];
		$fat = $file['hits'][0]['fields']["nf_total_fat"];
		$serv = $file['hits'][0]['fields']["nf_serving_size_qty"];
		$u = $file['hits'][0]['fields']["nf_serving_size_unit"];
}
if (is_null($item))
{
	$item = 'Oops! Please make sure you spelled the word correctly.';
}









/*$website = "http://calorielab.com/search/?search_input=";
$subject = $_POST['name'];
$subjectA = explode(" ", $subject);
foreach ($subjectA as &$value)
{
	$website =  $website . $value. "+";
}
$website = substr($website, 0, -1);
$file = file_get_contents($website);
$data = substr($file, stripos($file, '<td class="value cals">'));
$file = substr($data,stripos($data, '>') );
$data = substr($file,1, stripos($file, '<')-1 );
*/












//echo $data;
//$data = substr($file, stripos($file, '<td class="value
// cals">'),stripos($file, 'more'));
//echo $data;




//$data = getTextBetweenTags($string, $tagname)



//$val = substr($data, 0, stripos($file, 'more'));
//echo $val;
//$data = substr($file, stripos($file, 'value cals">'), stripos($file, '</td>', stripos($file, 'value cals">')));

//$val = substr($data, 0, stripos($data, '<'));
//echo $val;
//require 'vendor/autoload.php';
//$pic = base64_encode($_POST['pic']);
//print_r($response->raw_body);
//$response = Unirest\Request::post("https://camfind.p.mashape.com/image_requests",
/*   array(
    "X-Mashape-Key" => "9QoOglXPjlmshAyXrUEqooGxKXrsp1vrRfujsn7zYaVgcJiz3O",
    "Content-Type" => "application/x-www-form-urlencoded",
    "Accept" => "application/json"
  ),
  array(
    "focus[x]" => "480",
    "focus[y]" => "640",
    "image_request[altitude]" => "27.912109375",
    "image_request[language]" => "en",
    "image_request[latitude]" => "35.8714220766008",
    "image_request[locale]" => "en_US",
    "image_request[longitude]" => "14.3583203002251",
    "image_request[remote_image_url]" => "http://upload.wikimedia.org/wikipedia/en/2/2d/Mashape_logo.png"
  )
);
//echo "hi";
print_r($response->raw_body);

$response = Unirest\Request::get("https://camfind.p.mashape.com/image_responses/$response",
  array(
    "X-Mashape-Key" => "9QoOglXPjlmshAyXrUEqooGxKXrsp1vrRfujsn7zYaVgcJiz3O",
    "Accept" => "application/json"
  )
);
echo "hello"; */
?>
<header id="header_wrapper">
  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="index.html"><img src="img/logo.png" alt="logo"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
			  <!--<li class="active"><a href="#hero_section" class="scroll-link">Home</a></li>
			  <li><a href="#aboutUs" class="scroll-link">About Us</a></li>-->
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>


<footer class="footer_wrapper" id="contact" style="background-color:#77DD77">
  <div class="container">
    <section class="page_section contact" id="contact">
      <div class="contact_section">
      <h2><?php echo $item?></h2>
        <h2></h2>
        <div class="row">
          <div class="col-lg-4">
            
          </div>
          <div class="col-lg-4">
           
          </div>
          <div class="col-lg-4">
          
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 wow">	
		 <div class="contact_info">

                            <div class="detail">
                                <h2><?php echo "Calories: ".$cal?></h2>
                            </div>
                            <div class="detail">
                                <h2><?php echo "Fat: ".$fat." grams"?></h2>
                            </div>
                            <div class="detail">
                                <h2><?php echo "Serving size: ".$serv." ".$u?></h2>
                            </div>
                        </div>
       		  
			  
          
        </div>
        <div class="col-lg-8 wow">
          <div class="form">
<form method="post" action="pic_process.php">
 <input class="input-text" type="text" name="name" id="name" value="" placeholder="food" align="texttop"/>
  <br><br>
  <input class="input-btn" type="submit" value="upload">
</form></div>
        </div>
      </div>
    </section>
  </div>
</footer>


<div class="container">
   <div class="footer_bottom"><span>Made by Mihir Pandya, Brian Lin, Kaushik Ravikumar, and Raghav Sreeram</span> </div>
  </div>




<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/wow.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>