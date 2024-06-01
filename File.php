<?php

class File{
    
    public static function slug($text){
        $find = array("/Ğ/","/Ü/","/Ş/","/İ/","/Ö/","/Ç/","/ğ/","/ü/","/ş/","/ı/","/ö/","/ç/", "/I/");
        $replace = array("g","u","s","i","o","c","g","u","s","i","o","c","i");
        $text = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/"," ",$text);
        $text = preg_replace($find,$replace,$text);
        $text = preg_replace("/ +/"," ",$text);
        $text = preg_replace("/ /","-",$text);
        $text = preg_replace("/\s/","",$text);
        $text = strtolower($text);
        $text = preg_replace("/^-/","",$text);
        $text = preg_replace("/-$/","",$text);
        return $text;
    }

    public static function upload($name, $dir, $size){
        if(isset($_FILES[$name])){
            if(!empty($_FILES[$name]["name"])){
                if(strpos($size, "KB")){
                    $img_size = floatval($size)*1024;
                }
                elseif(strpos($size, "MB")){
                    $img_size = floatval($size)*1048576;
                }
                elseif(strpos($size, "GB")){
                    $img_size = floatval($size)*1073741824;
                }

                $upload_path = $dir."/";
                $file_info = pathinfo($_FILES[$name]["name"]);
                $filename = self::slug($file_info["filename"]).".".$file_info["extension"];
                $unique_filename = rand(0, 999).uniqid().self::slug($file_info["filename"]).".".$file_info["extension"];
                $filename_with_path = $upload_path.$unique_filename;
      
                if($_FILES[$name]["size"] < $img_size){
                    $upload_control = move_uploaded_file($_FILES[$name]["tmp_name"], $filename_with_path);
                    if($upload_control){
                        $array = ["status"=> "success", "msg"=> "The file has been uploaded successfully!", "name"=> $filename_with_path];
                        return $array;
                    }else{
                        $array = ["status"=> "error", "msg"=> "An error occurred while uploading the file!", "name"=> ""];
                        return $array;
                    }
                }else{
                    return ["status"=> "error", "msg"=> "The file you are trying to upload exceeds the maximum file size limit!", "name"=> ""];
                }
            }else{
                return ["status"=> "error", "msg"=> "Please, select a file.", "name"=> ""];
            }
        }else{
            return false;
        }
    }

}

?>
