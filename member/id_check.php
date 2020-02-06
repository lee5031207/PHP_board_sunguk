<?header("content-type:text/html; charset=UTF-8");

include("../lib/dbconnection.php");
$connect = dbconn();  //db함수 호출


$user_id=$_REQUEST['userdata'];

$query = "select * from member where user_id = '$user_id'";
$result = mysql_query($query,$connect);
$data = mysql_fetch_array($result);


if(!$user_id){
   echo "아이디를 입력해 주십시오";
}else if($data[user_id] != $user_id){
    echo $user_id;
    echo "는 사용 가능한 아이디 입니다.";
}else{
    echo $user_id; 
    echo"는 이미 존재하는 아이디 입니다";
}

?>