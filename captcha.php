<?php
 
session_start();
 
$permitted_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwzyz';
  
function generate_string($input, $strength = 10) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
  
    return $random_string;
}
 
$my_img = imagecreate( 200, 50 );                             
$background  = imagecolorallocate( $my_img, 255,   255,   255 );
$black = imagecolorallocate( $my_img, 0, 0, 0 );
$grey = imagecolorallocate( $my_img, 90, 90, 90 );
$textcolors = [$black, $grey];
$line_colour = imagecolorallocate( $my_img, 64, 64, 64 );
$string_length = 6;
$captcha_string = generate_string($permitted_chars, $string_length);

$font = getcwd().'/fonts/Aller_BdIt.ttf';
 
$_SESSION['captcha_text'] = $captcha_string;
for($i = 0; $i < $string_length; $i++) {
    $letter_space = 170/$string_length;
    $initial = 15;
     
    imagettftext($my_img, 24, rand(-15, 15), $initial + $i*$letter_space, rand(25, 45), $textcolors[rand(0,1)], $font, $captcha_string[$i]);
  }
// imagettftext($my_img, 24, rand(-15, 15), 15 + 30, rand(25, 45), $text_colour, $font, $captcha_string);
imagesetthickness ( $my_img, 1 );
for($i=0;$i<6;$i++) {
    imageline( $my_img, 0, rand()%50, 200, rand()%50, $line_colour );

}
$pixel_color = imagecolorallocate($my_img, 0,0,255);
for($i=0;$i<1000;$i++) {
    imagesetpixel($my_img,rand()%200,rand()%50,$pixel_color);
} 

header( "Content-type: image/png" );
imagepng( $my_img );
imagedestroy( $my_img );
?>