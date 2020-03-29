<?php 
function decode_contest_code($code){

    $flag=0;
    $result="";
    for($i=0;$i<strlen($code);$i++){
    
        if($code[$i]=="]")
            $flag=0;
        if($flag==1)
            $result=$result.$code[$i];


        if($code[$i]=="[")
            $flag=1;
    }
    if($result!="")
    return $result;
    return $code;
} 



//echo decode_contest_code("lumanhau aguca avha (ajhga) [ltime80]");
