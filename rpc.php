<?php include('config.php');

if (isset($_POST['queryString'])) {
    $queryString = $_POST['queryString'];
    if (strlen($queryString) > 0) {
        $query = "SELECT CITY_NAME FROM city_tab WHERE CITY_NAME LIKE '$queryString%' LIMIT 4";
        $result = mysqli_query($conn, $query) or die("Failed: " . mysqli_error($conn));

        if (mysqli_num_rows($result) != 0) {
            $num = mysqli_num_rows($result);
            $i = 0;
            while ($i < $num) {
                mysqli_data_seek($result, $i);
                $row = mysqli_fetch_assoc($result);
                $name = $row['CITY_NAME'];
                echo '<li onClick="fill(\'' . $name . '\');">' . $name . '</li>';
                $i++;
            }
        } else {
            echo 'There is no such Record.';
        }
    } else {
        // Dont do anything.
    } // There is a queryString.
} else {
    echo 'There should be no direct access to this script!';
}

//}
