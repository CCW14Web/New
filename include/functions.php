<?php


function mysql_prep($value) {
    $magic_quotes_active = get_magic_quotes_gpc();
    $new_enough_php = function_exists("mysql_real_escape_string"); // i.e. PHP >= v4.3.0
    if ($new_enough_php) { // PHP v4.3.0 or higher
        // undo any magic quote effects so mysql_real_escape_string can do the work
        if ($magic_quotes_active) {
            $value = stripslashes($value);
        }
        $value = mysql_real_escape_string($value);
    } else { // before PHP v4.3.0
        // if magic quotes aren't already on then add slashes manually
        if (!$magic_quotes_active) {
            $value = addslashes($value);
        }
        // if magic quotes are active, then the slashes already exist
    }
    return $value;
}

function connect() {
include 'constants.php';
    global $pdo;
    $pdo = new PDO("mysql:host=".$DBADD.";dbname=".$DB."", $DBUNAME, $DBPASS);
}

function get_songs_by_name($letter) {
    global $pdo;
    $stmt = $pdo->prepare('
                         SELECT *
                         FROM songsdb
                         WHERE display_name LIKE :letter
                         order by display_name 
                         LIMIT 50');
    $stmt->execute(array(':letter' => $letter . '%'));
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function dynamic_path()
{
//To genrate dynamic relative paths.
            $currdir=getcwd();
            $currdir=realpath($currdir);
            function parsePathComponents($path,$endSlash=true,$base=true)
            {
                for($path = trim($path),
                $slash = strstr(PHP_OS,'WIN') ? '\/' : '/',
                $retArray = array(),
                $str = $temp = "",
                $x = 0;
                $char = @$path{$x}; $x++)
                { 
                if(!strstr($slash,$char)) $temp .= $char;
                elseif($temp){
                $str .= $temp;
                $retArray[$temp] = $str.($endSlash ? $slash{0} : '');
                $str .= $slash{0};
                $temp = "";
                }
            }
            $base&&$temp and $retArray[$temp] = $str.$temp;
            return $retArray;
            }
            $pathComps = parsePathComponents($currdir);
            $dircount=0;
            while ($dir = current($pathComps)) {
                if (key($pathComps) == 'Dove') 
                    $dircount=0;
                next($pathComps);
                $dircount=$dircount+1;
            }
            $dircount=$dircount-1;
            $parentdir='';
            while($dircount)
            {
                $parentdir=$parentdir.'../';
                $dircount=$dircount-1;
            }
			return $parentdir;

}

function clean($str) {
            $str = @trim($str);
            if (get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
        }
        
function generateGuid($include_braces = false) {
    if (function_exists('com_create_guid')) {
        if ($include_braces === true) {
            return com_create_guid();
        } else {
            return substr(com_create_guid(), 1, 36);
        }
    } else {
        mt_srand((double) microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
       
        $guid = substr($charid,  0, 4) .
                substr($charid,  4, 4) .
                substr($charid,  8, 4) .
                substr($charid, 12, 4) ;
               
 
        if ($include_braces) {
            $guid = '{' . $guid . '}';
        }
   
        return $guid;
    }
}        
        
      


?>