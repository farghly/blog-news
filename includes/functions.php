<?php
/*
    * PDO URL:http://php.net/manual/en/book.pdo.php
    * 
*/


function query_stat($stat){
    global $connect;
    $result = $connect->query($stat);
    return $result;
}
    /*
        * SelectTablelimit function take 2 arguments
            *  TableName 
            *  count of row that you will display in query
    */

function SelectTableLimit($tableName,$limit){
    $resultSelect =  query_stat('SELECT *FROM '.$tableName.' limit '.$limit);
    $getresult  = $resultSelect->fetchAll();
   /* 
    $resultSelect = $connect->prepare('SELECT *FROM '.$tableName.' limit '.$limit);
    $resultSelect->execute();*/
    return $getresult;
}
    /*
        * SelectTable function take one argument
            *  TableName that you will select from it.
    */
function SelectTable($tableName){
    $resultSelect = query_stat('SELECT *FROM '.$tableName);
    $getresult  = $resultSelect->fetchAll();
   /* 
    $resultSelect = $connect->prepare('SELECT *FROM '.$tableName.' limit '.$limit);
    $resultSelect->execute();*/


    return $getresult;
}

function SelectTableOrd($tableName,$limit,$order){
    $resultSelect =  query_stat('SELECT *FROM '.$tableName.' limit '.$limit.' ORDER BY '.$order);
    $getresult  = $resultSelect->fetchAll();
   /* 
    $resultSelect = $connect->prepare('SELECT *FROM '.$tableName.' limit '.$limit);
    $resultSelect->execute();*/
    return $getresult;
}


function SelectTableCondition($tableName,$user_id,$session_user_id){
    $resultSelect =  query_stat("Select *From ".$tableName." Where ".$user_id."= ".$session_user_id);
    $getresult  = $resultSelect->fetch(PDO::FETCH_ASSOC);
    return $getresult;
}
function SelectTableConditionLimit($tableName,$cat_status,$status,$limit){
    $resultSelect =  query_stat("Select *From ".$tableName.' Where '.$cat_status.'= '.$status.' limit '.$limit);
    $getresult  = $resultSelect->fetchAll();
    return $getresult;
}


/***/
function Row_Count($tableName){
    $resultSelect =  query_stat('SELECT count(*) FROM '.$tableName);
    $row_count    = $resultSelect->fetchColumn();
    return $row_count;
}
function Row_CountLimit($tableName,$status,$num){
    global $connect;
    $resultSelect = $connect->query('SELECT count(*) FROM '.$tableName." Where ".$status.'='.$num);
    $row_count    = $resultSelect->fetchColumn();
    return $row_count;
}

/* multiple join
SELECT table1.col,table2.col,table3.col 
FROM table1 
INNER JOIN 
(table2 INNER JOIN table3 
ON table3.id=table2.id) 
ON table1.id(f-key)=table2.id
AND //add any additional filters HERE
*/

function joinTable($tbl_1,$tbl_2,$cat_id,$post_id){
    //global $connect;
    $resultSelect  =  query_stat("SELECT ".$tbl_1.'.* ,'.$tbl_2.'.*'." FROM ".$tbl_1." INNER JOIN ".$tbl_2." ON ".$tbl_1.'.'.$cat_id."=".$tbl_2.'.'.$cat_id);
    $joinTable = $resultSelect->fetchAll();
    return $joinTable;
}

function UpdateTable($tableName,$old_name,$new_name,$row_update_id,$row_id){
    global $connect;

   $updateTable =$connect->query('UPDATE '.$tableName.' SET '.$old_name.'='."'$new_name'".' WHERE '.$row_update_id.'='.$row_id);
    
    $updateResult = $updateTable->execute();
    return $updateTable;
}

function DeleteRow($tableName,$row_id,$post_id){
    global $connect;
	$query   = $connect->prepare("DELETE FROM ".$tableName.' WHERE '.$row_id
    .'='.$post_id);
    $affected = $query->execute();
    return $affected;
}

function InsertData($tableName,$columns,$values){
    global $connect;
    $resultSelect = $connect->prepare('INSERT INTO '.$tableName.' ('.$columns.')'. ' VALUES '.'('."'$values'".')');
    $getresult  = $resultSelect->execute();;
    return $getresult;
}


function pageLocation($location){
    return header("location:".$location.".php");
}
function pageLocationSpecial($location){
    return header("location:".$location);
}

function SessionDisplay($type,$message_name){
   if(isset($_SESSION[$message_name])):?>
    <ul>
       <li><div class="alert alert-<?php echo $type;?> text-center"><i class="fa fa-power-off"></i>
    <?php
    echo $_SESSION[$message_name];
    unset($_SESSION[$message_name]);
    ?>
    
    </div> 
    </li>
   </ul>         
<?php endif;}?>
<?php
function SessionMessage($type,$txt){
    return $_SESSION[$type]=$txt;
}

function counter(){
    static $a = 0;
    $a++;
    echo $a;
}

function edit_delete_link($url,$id,$class,$name,$font,$txt){?>
    <td><a href="<?php echo $url.'='.$id;?>"><div class='btn btn-<?php echo $class;?>' name="<?php echo $name;?>"><i class='fa fa-<?php echo $font;?>'></i><?php echo ' '.$txt;?></div></a></td>
<?php }

// session expire
// http://phppot.com/php/user-login-session-timeout-logout-in-php/
function isLoginSessionExpired() {
	$login_session_duration = 10; 
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["user_id"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}

 
/*select specific number of words -->support english and arabic language*/

function first_words($text, $count)
{
    $words = explode(' ', $text);

    $result ='';
    for ($i = 0; $i < $count && isset($words[$i]); $i++) {
        $result .= $words[$i].' ';
    }

    return $result;
}
/*select specific number of words -->support english language only*/
/*function get_words($sentence, $count) {
  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
  return $matches[0];
}*/


/*
    * function to git title in the url

*/


function get_title($url){
  $str = file_get_contents($url);
  if(strlen($str)>0){
    $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
    preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
    return $title[1];
  }
}
