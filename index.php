
<?php
/**
 * Index.php
 *
 * PHP version 7
 * 
 * @category File
 * @package  Package
 * @author   Jonah Cummins <P458162@tafe.wa.edu.au>
 * @license  https://www.php.net/license/3_01.txt PHP licence 3.01
 * @link     http://pear.php.net/package/PackageName
 */
require "header.html";
if (!isset($_POST['submit'])) {
    // form for user input
    ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="body">
    <h3 for="title"> Title </h3>
    <input type="title" name="title" id="title">
    
    <h3 for="genre"> Genre </h3>
    <input type="genre" name="genre" id="genre">
    
    <h3 for="rating"> Rating </h3>
    <input type="rating" name="rating" id="rating">
    
    <h3 for ="year"> Year </h3>
    <input type="year" name="year" id="year">
    
    <h3 for="search">&nbsp;</h3>
    <input type="submit" name="submit" value="Search"/> 
</form>

    <?php
} else {
    // Formats $title for it work in SQL if the varible is empty
    $title = $_POST['title'];
    if ($title == "") {
        $title = "NULL";
    } else {
        $title = "'".$title."'";
    }
        
    // Formats $genre for it work in SQL if the varible is empty    
    $genre = $_POST['genre'];
    if ($genre == "") {
        $genre = "NULL";
    } else {
        $genre = "'".$genre."'";
    }
    
    // Formats $rating for it work in SQL if the varible is empty    
    $rating = $_POST['rating'];
    if ($rating == "") {
        $rating = "NULL";
    } else {
        $rating = "'".$rating."'";
    }
    
    // Formats $year for it work in SQL if the varible is empty    
    $year = $_POST['year'];
    if ($year == "") {
        $year = "NULL";
    } else {
        $year = "'".$year."'";
    }

    $conn = mysqli_connect("localhost:3307", "root", "usbw", "movies_db");

    $qry = "SELECT * FROM movies
            WHERE Title = IFNULL(".$title.",Title)
            AND Genre = IFNULL(".$genre.",Genre)
            AND Rating = IFNULL(".$rating.",Rating)
            AND Years = IFNULL(".$year.",Years)";
    
    $result = mysqli_query($conn, $qry);
    
    // creates table headers for results
    if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Studio</th>
                <th>Status</th>
                <th>Sound</th>
                <th>Versions</th>
                <th>Price</th>
                <th>Rating</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Aspect Ratio</th>
            </tr>
        <?php
        // fills in the table with the results
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
            $title = $row['Title'];
            $studio = $row['Studio'];
            $status = $row['Status'];
            $sound = $row['Sound'];
            $version = $row['Versions'];
            $price = $row['Price'];
            $rating = $row['Rating'];
            $year = $row['Years'];
            $genre = $row['Genre'];    
            $aspect = $row['Aspect'];
            $search = $row['Search'];    

            $qry2 = "UPDATE movies SET Search='".($search+1)."' WHERE ID='".$id."'";
            
            mysqli_query($conn, $qry2);
            
            echo "<tr>
                <td>$title</td>
                <td>$studio</td>
                <td>$status</td>
                <td>$sound</td>
                <td>$version</td>
                <td>$price</td>
                <td>$rating</td>
                <td>$year</td>
                <td>$genre</td>
                <td>$aspect</td>
            </tr>";
        }
        echo "</table>";
        // if nothing is found
    } else {
        echo "<p>Nothing Found</p>";
    }
        mysqli_close($conn);
}

require "footer.html";
?>