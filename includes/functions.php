<?php
function connect(){
    global $connect;
    return $connect;
}

function queryStat($stat){
    return connect()->query($stat);
}
function prepareStat($stat){
    return connect()->prepare($stat);
}

function selectTableLimit($tableName,$limit){
    $resultSelect =  queryStat('SELECT *FROM '.$tableName.' limit '.$limit)->fetchAll();
    return $resultSelect;
}
    
function selectTable($tableName){
    $resultSelect = queryStat('SELECT *FROM '.$tableName)->fetchAll();
    return $resultSelect;
    
}

function selectTableOrd($tableName,$limit,$order){
    $resultSelect =  queryStat('SELECT *FROM '.$tableName.' limit '.$limit.' ORDER BY '.$order)->fetchAll();
    return $resultSelect;
}


function selectTableCondition($tableName,$user_id,$session_user_id){
    $resultSelect =  queryStat("Select *From ".$tableName." Where ".$user_id."= ".$session_user_id);
    return $resultSelect->fetch(PDO::FETCH_ASSOC);
}
function selectTableConditionLimit($tableName,$cat_status,$status,$limit){
    $resultSelect =  queryStat("Select *From ".$tableName.' Where '.$cat_status.'= '.$status.' limit '.$limit);
    return $resultSelect->fetchAll();
}


/***/
function rowCount($tableName){
    $resultSelect =  queryStat('SELECT count(*) FROM '.$tableName);
    return $resultSelect->fetchColumn();
}
function rowCountLimit($tableName,$status,$num){
    $resultSelect = queryStat('SELECT count(*) FROM '.$tableName." Where ".$status.'='.$num);
    return $resultSelect->fetchColumn();
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
    $resultSelect  =  queryStat("SELECT ".$tbl_1.'.* ,'.$tbl_2.'.*'." FROM ".$tbl_1.
                                " INNER JOIN ".$tbl_2." ON ".$tbl_1.'.'.$cat_id."=".$tbl_2.'.'.$cat_id);
    return $resultSelect->fetchAll();
}

function updateTable($tableName,$old_name,$new_name,$row_update_id,$row_id){
   $updateTable =queryStat('UPDATE '.$tableName.' SET '.$old_name.'='."'$new_name'"
                                             .' WHERE '.$row_update_id.'='.$row_id);
    return $updateTable->execute();
}

function deleteRow($tableName,$row_id,$post_id){
	$query   = prepareStat("DELETE FROM ".$tableName.' WHERE '.$row_id.'='.$post_id)->execute();
    return $query;
}

function InsertData($tableName,$columns,$values){
    $resultSelect = prepareStat('INSERT INTO '.$tableName.' ('.$columns.')'. ' VALUES '.'('."'$values'".')');
   return $resultSelect->execute();
  
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
       <li><div class="alert alert-<?= $type;?> text-center"><i class="fa fa-power-off"></i>
       
    <?=$_SESSION[$message_name];
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
    echo ++$a;  
}

function edit_delete_link($url,$id,$class,$name,$font,$txt){?>
    <td><a href="<?= $url.'='.$id;?>"><div class='btn btn-<?= $class;?>' name="<?= $name;?>">
    <i class='fa fa-<?= $font;?>'></i><?= ' '.$txt;?></div></a></td>
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
