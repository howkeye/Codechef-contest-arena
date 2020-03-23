
<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css"  >  
    <link rel="stylesheet" href="templates/autocomplete/main.css">
    

    <title>Contest Arena</title> 
</head>


<body  class="page-bootswatch">


<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/"><img src="/templates/images/logo.png"  alt="Logo" width="130">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Codechef Contest Arena</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/aboutus">About Us</a>
      </li>
    </ul>   
  </div>
</nav>
<br>
<div class="container p-3 my-3 border">
<center><h2> Enter Contest code \ problem code:<h2>  </center>

<div class="row" >
<div class=" col-md-5"></div>
<div class=" col-md-2">

<form  class="form-inline my-2 my-lg-0" autocomplete="off" action="/action_page.php">
  <div class="ui-widget" style="width:300px;">
    <input class="form-control form-control-lg" id="tags" type="text" name="myCountry" placeholder="Country">
  
  <button class="btn btn-secondary btn-lg" type="submit">Submit</button>
  </div>
  
</form>
</div>
<div class=" col-md-5"></div>
</div>
</div>


<div class="jumbotron" style="position:fixed;bottom:0px;width:100%; margin:0px;">
  <center>Made with love by Rajat (<a target='_blank' href="https://github.com/howkeye">@howkeye</a>) </center>
  </div>
  </header>

</body>
</html>


<?php
include '../functions/auth.php';
function make_contest_problem_api_request2(){
    $oauth_details['access_token']= "48e46253b893f62522e414a332d14fa8c4b1c631"; 
    $problem_code = "SALARY";
    $contest_code = "PRACTICE";
    $path = "https://api.codechef.com/contests"; //.$contest_code."/problems/".$problem_code;
    $response = make_api_request($oauth_details, $path);
    
    return $response;
}
$data_json= json_decode( make_contest_problem_api_request2()); 

if($data_json->status=="error")
echo "change access_token ";
//echo $data_json->status."<br>";

$contests=$data_json->result->data->content->contestList;
$arr= array();
for ($x = 0; $x <count($contests,COUNT_NORMAL); $x++) {
    $contest_name= $contests[$x]->name;
    $contest_code= $contests[$x]->code;
   //  var_dump($contest_name);
    // var_dump($contest_code);  
     
   // array_push($arr, $contest_name." (".$contest_code.")");
    array_push($arr,$contest_code);

} 
for ($x = 0; $x <count($contests,COUNT_NORMAL); $x++) {
  $contest_name= $contests[$x]->name;
  $contest_code= $contests[$x]->code;
 //  var_dump($contest_name);
  // var_dump($contest_code);
  
   
  array_push($arr, $contest_name." (".$contest_code.")");
 // array_push($arr,$contest_code);

} 

$json_data=json_encode($arr);
file_put_contents('myfile.json', $json_data);
//echo ($json_data);

?>

<html>
<body>
<p id="demo"></p>
<script>
 //responseObj = readJsonFromUrl('myfile.json');
 //var x=['ffftest']


 var contests= <?php echo ($json_data);?>;


</script>

</body>
</html>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    
    $( "#tags" ).autocomplete({
      source: contests
    });
  } );
  </script>
