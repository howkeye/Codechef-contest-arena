<?php
include 'functions/auth.php';
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
echo $data_json->status."<br>";

$contests=$data_json->result->data->content->contestList;
$arr= array();
for ($x = 0; $x <count($contests,COUNT_NORMAL); $x++) {
    $contest_name= $contests[$x]->name;
    $contest_code= $contests[$x]->code;
   //  var_dump($contest_name);
    // var_dump($contest_code);
    
     
    array_push($arr, $contest_name." (".$contest_code.")");
    array_push($arr,$contest_code);

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


 var x= <?php echo ($json_data);?>;
var s=x.toString();
document.getElementById("demo").innerHTML =s;

</script>

</body>
</html>