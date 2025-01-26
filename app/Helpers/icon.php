<?php

function icon($request){

    $fb = $request['fb'];
    $insta = $request['insta'];
    $yt = $request['yt'];
    $pt = $request['pt'];
    $ln = $request['ln'];
    $tw = $request['tw'];

    $sm_icons = [
       'facebook' => $fb,
       'instagram' => $insta,
       'youtube' => $yt,
       'pinterest' => $pt,
       'linkedin' => $ln,
       'twitter' => $tw,
    ];
    return $sm_icons;

}