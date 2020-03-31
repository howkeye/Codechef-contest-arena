
<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css"  >  
    <link rel="stylesheet" href="autocomplete/main.css">
    

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
        <a class="nav-link" href="/logout">logout</a>
      </li>
    </ul>   
  </div>
</nav>
<br>
<div class="container p-3 my-3 border">
<center><h2> Enter Contest code \ name:<h2>  </center>

<div class="row" >
<div class=" col-md-5"></div>
<div class=" col-md-2">

<form  class="form-inline my-2 my-lg-0" autocomplete="off" action="/problems">
  <div class="autocomplete" style="width:300px;">
    <input class="form-control form-control-lg" id="myInput" type="text" name="contestCode" placeholder="contest">
    </div>
  <button class="btn btn-primary btn-lg" type="submit">Submit</button>
  
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
session_start();
if(isset($_SESSION['access_token'] )==0 )
     header("Location: ../");



include '../functions/api.php';
function make_contest_problem_api_request2(){
    $oauth_details['access_token']= $_SESSION['access_token']; 
    $problem_code = "SALARY";
    $contest_code = "PRACTICE";
    $path = "https://api.codechef.com/contests"; //.$contest_code."/problems/".$problem_code;
    $response = make_api_request($oauth_details, $path);
    
    return $response;
}

$data_json= json_decode( make_contest_problem_api_request2()); 

if($data_json->status=="error"){
  main(0);
  $data_json= json_decode( make_contest_problem_api_request2()); 
}

//echo " AHGVAB  ".ech.$data_json->status."<br>";

$contests=$data_json->result->data->content->contestList;
$arr= array();
for ($x = 0; $x <count($contests,COUNT_NORMAL); $x++) {
    $contest_name= $contests[$x]->name;
    $contest_code= $contests[$x]->code;
   //  var_dump($contest_name);
    // var_dump($contest_code);
    array_push($arr, $contest_name." [".$contest_code."]");  
    array_push($arr,$contest_code); 
   
   
} 
for ($x = 0; $x <count($contests,COUNT_NORMAL); $x++) {
  $contest_name= $contests[$x]->name;
  $contest_code= $contests[$x]->code;
 //  var_dump($contest_name);
  // var_dump($contest_code);
  
   
 // array_push($arr, $contest_name." (".$contest_code.")");
  //array_push($arr,$contest_code);

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

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
//var countries = ["rajat","shruti","minal","sumit"];


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), contests);
</script>