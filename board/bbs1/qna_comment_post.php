<?header("content-type:text/html; charset=UTF-8"); 

include("../../lib/dbconnection.php");
$connect = dbconn();
$member=member();

if(!$member[user_id])error("로그인 후 이용해 주세요");

$comment = $_POST[comment]; //댓글내용
$user_id = $member[user_id];  //아이디
$name = $member[name];  //이름
$bbs1_no = $_GET[no];  //댓글이 들어갈 게시판no
$regdate = date("YmdHis",time());  //날짜 시간

$query = "Insert into qna_comment(user_id,name,comment,bbs1_no,regdate) values('$user_id','$name','$comment','$bbs1_no','$regdate')";
mysql_query("set names utf8", $connect); 
$result = mysql_query($query,$connect);

mysql_close();
?>
<script>
    window.alert('댓글이 정상적으로 작성되었습니다.');
    location.href="./qna_view.php?no=<?=$bbs1_no?>&id=bbs1";
</script>