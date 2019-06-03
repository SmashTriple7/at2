<?php
/**
 * Stats.php
 *
 * PHP version 7
 * 
 * @category File
 * @package  Package
 * @author   Jonah Cummins <P458162@tafe.wa.edu.au>
 * @license  https://www.php.net/license/3_01.txt PHP licence 3.01
 * @link     http://pear.php.net/package/PackageName
 */
    $oneCount = 0;
    $oneText = "";
    
    $twoCount = 0;
    $twoText = "";
    
    $threeCount = 0;
    $threeText = "";
    
    $fourCount = 0;
    $fourText = "";
    
    $fiveCount = 0;
    $fiveText = "";
    
    $sixCount = 0;
    $sixText = "";
    
    $sevenCount = 0;
    $sevenText = "";
    
    $eightCount = 0;
    $eightText = "";
    
    $nineCount = 0;
    $nineText = "";
    
    $tenCount = 0;
    $tenText = "";
    
    // qry to get the top searched items in the database
    $conn = mysqli_connect("localhost:3307", "root", "usbw", "movies_db");
    $qry = "SELECT Title, Search
            FROM movies
            ORDER BY Search DESC
            LIMIT 10;";        
    $result = mysqli_query($conn, $qry);
    $count = 1;
    // asigns the qry to the correct varible
while ($row = mysqli_fetch_assoc($result)) {
    if ($count == 1) {
            $oneCount = $row['Search'];
            $oneText = $row['Title'];
    }
    if ($count == 2) {
            $twoCount = $row['Search'];
            $twoText = $row['Title'];
    }
    if ($count == 3) {
            $threeCount = $row['Search'];
            $threeText = $row['Title'];
    }
    if ($count == 4) {
            $fourCount = $row['Search'];
            $fourText = $row['Title'];
    }
    if ($count == 5) {
            $fiveCount = $row['Search'];
            $fiveText = $row['Title'];
    }
    if ($count == 6) {
            $sixCount = $row['Search'];
            $sixText = $row['Title'];
    }
    if ($count == 7) {
            $sevenCount = $row['Search'];
            $sevenText = $row['Title'];
    }
    if ($count == 8) {
            $eightCount = $row['Search'];
            $eightText = $row['Title'];
    }
    if ($count == 9) {
            $nineCount = $row['Search'];
            $nineText = $row['Title'];
    }
    if ($count == 10) {
            $tenCount = $row['Search'];
            $tenText = $row['Title'];
    }
        $count = $count+1;
}
    // creates image
    header("Content-type: image/png");
    $image = @imagecreate(600, 450);
    $backgroundColour = imagecolorallocate($image, 255, 255, 255);
    $textColour = imagecolorallocate($image, 0, 0, 0);
    $green = imagecolorallocate($image, 0, 255, 0);

    // bar chart
    imagestring($image, 31, 5, 5, "Statistics", $textColour);    
    imagestring($image, 31, 5, 50, "Count", $textColour);        
    imageline($image, 55, 50, 55, 400, $textColour);
    imageline($image, 55, 400, 515, 400, $textColour);
    imagestring($image, 31, 525, 400, "Movies", $textColour);
    
    // one bar
    imagefilledrectangle($image, 65, 399-($oneCount*15), 100, 399, $green);
    imagestring($image, 31, 65, 399-($oneCount*15), $oneCount, $textColour);
    imagestringup($image, 31, 65, 399-($oneCount*15)-10, $oneText, $textColour);
    
    // two bar
    imagefilledrectangle($image, 110, 399-($twoCount*15), 145, 399, $green);
    imagestring($image, 31, 110, 399-($twoCount*15), $twoCount, $textColour);
    imagestringup($image, 31, 110, 399-($twoCount*15)-10, $twoText, $textColour);
    
    // three bar
    imagefilledrectangle($image, 155, 399-($threeCount*15), 190, 399, $green);
    imagestring($image, 31, 155, 399-($threeCount*15), $threeCount, $textColour);
    imagestringup($image, 31, 155, 399-($threeCount*15)-10, $threeText, $textColour);
    
    // four bar
    imagefilledrectangle($image, 200, 399-($fourCount*15), 235, 399, $green);
    imagestring($image, 31, 200, 399-($fourCount*15), $fourCount, $textColour);
    imagestringup($image, 31, 200, 399-($fourCount*15)-10, $fourText, $textColour);
    
    // five bar
    imagefilledrectangle($image, 245, 399-($fiveCount*15), 280, 399, $green);
    imagestring($image, 31, 245, 399-($fiveCount*15), $fiveCount, $textColour);
    imagestringup($image, 31, 245, 399-($fiveCount*15)-10, $fiveText, $textColour);
    
    // six bar
    imagefilledrectangle($image, 290, 399-($sixCount*15), 325, 399, $green);
    imagestring($image, 31, 290, 399-($sixCount*15), $sixCount, $textColour);
    imagestringup($image, 31, 290, 399-($sixCount*15)-10, $sixText, $textColour);
    
    // seven bar
    imagefilledrectangle($image, 335, 399-($sevenCount*15), 370, 399, $green);
    imagestring($image, 31, 335, 399-($sevenCount*15), $sevenCount, $textColour);
    imagestringup($image, 31, 335, 399-($sevenCount*15)-10, $sevenText, $textColour);
    
    // eight bar
    imagefilledrectangle($image, 380, 399-($eightCount*15), 415, 399, $green);
    imagestring($image, 31, 380, 399-($eightCount*15), $eightCount, $textColour);
    imagestringup($image, 31, 380, 399-($eightCount*15)-10, $eightText, $textColour);
    
    // nine bar
    imagefilledrectangle($image, 425, 399-($nineCount*15), 460, 399, $green);
    imagestring($image, 31, 425, 399-($nineCount*15), $nineCount, $textColour);
    imagestringup($image, 31, 425, 399-($nineCount*15)-10, $nineText, $textColour);
    
    // ten bar
    imagefilledrectangle($image, 470, 399-($tenCount*15), 505, 399, $green);
    imagestring($image, 31, 470, 399-($tenCount*15), $tenCount, $textColour);
    imagestringup($image, 31, 470, 399-($tenCount*15)-10, $tenText, $textColour);
    
    imagepng($image);
    imagedestroy($image);
?>