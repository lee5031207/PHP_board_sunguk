<?header("content-type:text/html; charset=UTF-8"); 

include("../../lib/dbconnection.php");
$connect = dbconn();
$member=member();

if(!$member[user_id])error("로그인 후 이용해 주세요");

?>

<script>
var result = confirm("삭제하시겠습니까?");

if(result==true){
    <?  
        $no=$_GET[no];
        $id=$_GET[id];
        
        $query_file= "select * from bbs1 where no='$no' and user_id='$member[user_id]'";
        $result = mysql_query($query_file,$connect);
        $data = mysql_fetch_array($result);

        if($data[file01]){
            $del_file = "./data/".$data[file01];
            if($data[file01] && is_file($del_file)){  //is_file = 파일이 존재하는지 확인하는 함수 
                unlink($del_file);  //실제 파일을 삭제하는 함수
            }
        }

        //전체 글 삭제시 그 게시판 번호의 댓글도 삭제
        $comment_query = "delete from bbs_comment where bbs1_no = '$no' ";
        mysql_query($comment_query,$connect);
        
        
        $query="delete from bbs1 where no='$no' and id='$id' and user_id='$member[user_id]'";
        mysql_query($query,$connect);
    ?>
}

window.alert("삭제되었습니다.");
location.href="./list.php";
</script>

