<?php
require_once "settings.php";

$dbconn = @mysqli_connect($host, $username, $password, $database);

if ($dbconn) {
    $query = "SELECT * FROM cars";
    $result = mysqli_query($dbconn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Car ID</th>";
            echo "<th>Make</th>";
            echo "<th>Model</th>";
            echo "<th>Price</th>";
            echo "<th>Year of Manufacture</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['car_id'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['yom'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>There are no cars to display.</p>";
        }
    } else {
        echo "<p>Error executing query: " . mysqli_error($dbconn) . "</p>";
    }

    mysqli_close($dbconn);
} else {
    echo "<p>Unable to connect to the database.</p>";
}
?>
