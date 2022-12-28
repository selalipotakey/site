<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/connection.php';

    $simple_field = $_GET['simple-field'];
    $simple_table = explode('.', $simple_field)[0];
    $simple_query = $_GET['simple-query'];

    $stmt_films = $mysqli->prepare("SELECT * FROM {$simple_table} WHERE {$simple_field} COLLATE utf8mb4_general_ci = ? ;");
    $stmt_films->bind_param('s', $simple_query);
    $stmt_films->execute();
    $result_films = $stmt_films->get_result();
    $stmt_films->close();

    $result_films_num_rows = mysqli_num_rows($result_films);

    if ($result_films_num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result_films)) {
            echo $row['title'] . ' ' . $row['releaseyear'] . '<br>';
        }
    }
?>