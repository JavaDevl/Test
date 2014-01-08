<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of img
 *
 * @author Yasha
 */
class img {
static function blobtoimage($blob,$title,$class)
{return '<img class="'.$class.'" src="data:image/png;base64,'.base64_encode($blob)  . '" title='.$title.'>';}

static function blobtoimageurl($blob,$title,$url)
{return '<a href="'.$url.'" class="logourl" targer="_blank"><img class="logo" src="data:image/png;base64,'.base64_encode($blob)  . '" title='.$title.'/></a>';}
}


?>
