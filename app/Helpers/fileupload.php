<?php
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;


function fileupload($type,$file){

     $filename = $type.rand(100000,999999).'.'.'webp';
    //  $file->move(public_path("upload"),$filename);
     $manager = new ImageManager(Driver::class);  
     $image = $manager->read($file);
     $encoded = $image->toWebp(70);  
     $encoded->save(public_path("upload/".$filename));
     return $filename;
     
    //  $path = public_path("upload");
    //  $filename = $type.'-'.rand(100000,999999).'.'.$file->getClientOriginalExtension();
    //  $file->move(public_path("upload"),$filename);
    //  return $filename;
}

?>