<?php
use Illuminate\Support\Facades\File;

function removeimage($image_name){
    $filepath = public_Path("upload/");
    if(File::exists($filepath.$image_name)){
        File::delete($filepath.$image_name); 
    }
}
?>