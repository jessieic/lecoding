<?php
ini_set('safe_mode', FALSE);
$originPath  = "/Users/JessieicLu/Downloads/凡花改图";
$rootPath = "/Users/JessieicLu/Downloads/fh";
function deldir($dir)
{
    //先删除目录下的文件：
    $dh = opendir($dir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $dir . "/" . $file;
            if (!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
        }
    }

    closedir($dh);
    //删除当前文件夹：
    if (rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}
if (is_dir($rootPath)) {
    deldir($rootPath);
}
mkdir($rootPath, 0777);
$cmd = "sudo chmod  -R 0777  " . $rootPath;
shell_exec($cmd);


function listFile($flodername,$originPath,$rootPath){
    if (!is_dir($flodername)) {
        return "不是有效目录";
    }
    if ($fd = opendir($flodername)) {
        while($file = readdir($fd)) {
            if ($file != "." && $file != "..") {
                $newPath = $flodername.DIRECTORY_SEPARATOR.$file;
                if (is_dir($newPath)&& $file!="原图") {
                    listFile($newPath,$originPath,$rootPath);
                } else if(is_file($newPath) && substr($newPath,-3)=="jpg"){
                    $newFileName = str_replace(DIRECTORY_SEPARATOR,'_',str_replace($originPath,'',$newPath));
                    var_dump("CP:".$newPath."======>".$rootPath .DIRECTORY_SEPARATOR. $newFileName);
                    copy($newPath, $rootPath .DIRECTORY_SEPARATOR. $newFileName);
                }
            }
        }
    } else {
        return false;
    }
}

$re = listFile($originPath,$originPath,$rootPath);
