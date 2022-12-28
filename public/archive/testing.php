<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archive</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <style>
        form.database-query {
          display: flex;
          flex-flow: row wrap;
          align-items: center;
          width: 100%;
        }
        .database-query input[type=text] {
          box-sizing: border-box;
          height: 3.5rem;
          width: 70%;
          border: 1px solid #000000;
          border-radius: 0px;
          background-color: #ffffff;
        }
        .database-query input[type=text]:focus {
          outline: none;
          background-color: #f8f8f8;
        }
        .dtabase-query input[type=submit] {
          margin-right: 0;
        }

        ul.query-results {
            list-style: none;
        }

        table.query-results-films {
          table-layout: fixed;
          width: 100%;
          border-collapse: collapse;
          margin-bottom: 2rem;
          /* border: .3rem solid #000000; */
        }
        table.query-results-films {
          border: .25rem solid #000000;
        }
        th, td {
          border: .15rem solid #000000;
        }

        .query-results-films thead th:nth-child(1) {
          width: 30%;
        }

        thead th:nth-child(2) {
          width: 20%;
        }

        thead th:nth-child(3) {
          width: 15%;
        }

        thead th:nth-child(4) {
          width: 35%;
        }

        th, td {
          line-height: 1.5;
          font-size: 1.8rem;
          white-space: normal;
          word-wrap: break-word;
          padding: 0rem .5rem;
        }

        @media (min-width: 850px) {
          .information {
              width: 75%;
          }
        }

    </style>
  </head>

  <body>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.html"; ?>
  
    <main>

      <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/dropdown.html"; ?>

      <div class="information">

        <h1><a href="/archive/testing"><u>Screening Database</u></a></h1>

        <form class="database-query" method="GET">
          <input type="text" name="simple-query"/>
          <select name="simple-field" id="simple-search-select">
            <option value="films.title">Film Title</option>
            <!-- <option value="directors.name">Director</option> -->
          </select>
          <input type="submit" value="Search"/>
        </form>

        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/connection.php';
            if ($_GET) {
                $simple_field = $_GET['simple-field'];
                $simple_table = explode('.', $simple_field)[0];
                $simple_query = "%{$_GET['simple-query']}%";

                
                if ($simple_field == "films.title") {
                    $film_listing_query = 'SELECT `films`.`title` AS film_title, 
                      GROUP_CONCAT(DISTINCT `directors`.`name` SEPARATOR ", ") AS director, 
                      GROUP_CONCAT(DISTINCT `times`.`showdate` ORDER BY `times`.`showdate` ASC SEPARATOR ", ") AS showdate, 
                      `series`.`name` AS series_name, 
                      `screenings`.`id` AS screening_id 
                    FROM `films` 
                    INNER JOIN `films_directors` ON `films`.`id` = `films_directors`.`films_id` 
                    INNER JOIN `directors` ON `films_directors`.`directors_id` = `directors`.`id` 
                    INNER JOIN `instances` ON `films`.`id` = `instances`.`films_id` 
                    INNER JOIN `screenings` ON `instances`.`screenings_id` = `screenings`.`id` 
                    INNER JOIN `series` ON `screenings`.`series_id` = `series`.`id` 
                    INNER JOIN `times` ON `screenings`.`id` = `times`.`screenings_id` 
                    WHERE `films`.`title` COLLATE utf8mb4_general_ci LIKE ? 
                    GROUP BY `screenings`.`id` 
                    ORDER BY `times`.`showdate` DESC;';

                    $film_listing_query = 'SELECT * FROM
                      (SELECT `films`.`title` as film_title,
                        `films`.`id` as film_id,
                        GROUP_CONCAT(DISTINCT `directors`.`name` SEPARATOR ", ") AS director
                      FROM `films`
                      INNER JOIN `films_directors` ON `films`.`id` = `films_directors`.`films_id` 
                      INNER JOIN `directors` ON `films_directors`.`directors_id` = `directors`.`id`
                      WHERE `films`.`title` COLLATE utf8mb4_general_ci LIKE ? 
                      GROUP BY `films`.`id`) t1  

                    INNER JOIN 
                      (SELECT `instances`.`films_id` as film_id,
                        `instances`.`screenings_id` as screening_id
                      FROM `instances`) t2
                    ON t1.film_id = t2.film_id

                    INNER JOIN
                      (SELECT
                        `series`.`name` AS series_name, 
                        `screenings`.`id` AS screening_id,
                        GROUP_CONCAT(DISTINCT `times`.`showdate` ORDER BY `times`.`showdate` ASC SEPARATOR ", ") AS showdate
                      FROM `screenings`
                      INNER JOIN `series` ON `screenings`.`series_id` = `series`.`id` 
                      INNER JOIN `times` ON `screenings`.`id` = `times`.`screenings_id`
                      GROUP BY `screenings`.`id`) t3
                    ON t2.screening_id = t3.screening_id 
                    
                    ORDER BY showdate DESC
                    
                    ;';


                    $stmt_films = $mysqli->prepare($film_listing_query);
                    $stmt_films->bind_param('s', $simple_query);
                    $msc = microtime(true);
                    $stmt_films->execute();
                    $msc = round(microtime(true)-$msc, 3);
                    $result_films = $stmt_films->get_result();
                    $stmt_films->close();
                    $result_films_num_rows = mysqli_num_rows($result_films);
                    echo "<p>Fetched {$result_films_num_rows} result(s) in {$msc} seconds.</p>";
                    if ($result_films_num_rows > 0) {
                        echo '<table class="query-results-films">
                        <thead>
                          <tr>
                            <th scope="col">Film Title</th>
                            <th scope="col">Director(s)</th>
                            <th scope="col">Screening Date(s)</th>
                            <th scope="col">Series</th>
                          </tr>
                        </thead>
                        <tbody>';
                        while ($row = mysqli_fetch_assoc($result_films)) {
                            echo '<tr>
                              <td>' . $row['film_title'] . '</td>
                              <td>';
                              
                              $director_array = explode(', ', $row['director']);
                              echo $director_array[0];
                              $i = 1;
                              while ($i < count($director_array) - 1) {
                                echo ", " . $director_array[$i];
                                $i++;
                              }
                              if (count($director_array) > 1) {
                                echo " and " . end($director_array);
                              }

                              echo '</td>
                              <td>';

                              // formats times to make them look pretty
                              $showdate_array = explode(', ', $row['showdate']);
                              echo date("m/d/y", strtotime($showdate_array[0]));
                              $i = 1;
                              while ($i < count($showdate_array) - 1) {
                                echo ", " . date("m/d/y", strtotime($showdate_array[$i]));
                                $i++;
                              }
                              if (count($showdate_array) > 1) {
                                echo " and " . date("m/d/y", strtotime(end($showdate_array)));
                              }

                              echo '</td>
                              <td>';
                              
                              echo $row['series_name'];
                              
                              echo '</td>
                            </tr>';
                        }
                        echo '</tbody>
                        </table>';
                    }
                }

                // } elseif ($simple_field == "directors.name") {
                //     $base_query = $base_query . " INNER JOIN films_directors ON directors.id = films_directors.directors_id INNER JOIN films on films_directors.films_id = films.id";
                // }

                // $stmt_films = $mysqli->prepare($base_query.";");
                // $stmt_films->bind_param('s', $simple_query);
                // $msc = microtime(true);
                // $stmt_films->execute();
                // $result_films = $stmt_films->get_result();
                // $stmt_films->close();
                // $msc = microtime(true)-$msc;
                // echo $msc . ' s'; // in seconds
                // echo ($msc * 1000) . ' ms'; // in millseconds
                // $result_films_num_rows = mysqli_num_rows($result_films);
                // if ($result_films_num_rows > 0) {
                //     while ($row = mysqli_fetch_assoc($result_films)) {
                //         // echo $row['name'] . '<br>';
                //         echo implode(" ", $row) . '<br>';
                //     }
                // }
            }
        ?>

        <!-- <h3>Using the Database</h3>
        <p>The Doc Films screening database currently logs all film screenings and series from XXX through the most recent season as queryable information for interested parties. There are some important points you should know about using the database:</p>
        <ol>
          <li>This page is only optimized for desktop as of now. We apologize for any inconvenience.</li>
          <li>Some entries may be wrong.</li>
        </ol> -->
      </div>
        
    </main>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html"; ?>
    <script src="/js/resize-menu.js"></script>

  </body>
</html>