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
          border: .25rem solid #000000;
          border-right: .125rem solid #000000;
          border-radius: 0px;
          background-color: #ffffff;
        }
        .database-query input[type=text]:focus {
          outline: none;
          background-color: #f0f0f0;
        }
        .database-query select {
          height: 3.5rem;
          width: 20%;
          border: .25rem solid #000000;
          border-left: .125rem solid #000000;
          border-right: .125rem solid #000000;
          border-radius: 0rem;
        }
        .database-query select:focus {
          outline: none;
          background-color: #f0f0f0;
        }
        .database-query input[type=submit] {
          height: 3.5rem;
          width: 10%;
          background-color: #ffffff;
          border: .25rem solid #000000;
          border-left: .125rem solid #000000;
        }
        .database-query input[type=submit]:hover, input[type=submit]:focus {
          outline: none;
          background-color: #f0f0f0;
        } input[type=submit]:hover {
          cursor: pointer;
        }



        ul.query-results {
            list-style: none;
        }

        table.query-results-films {
          table-layout: fixed;
          width: 100%;
          border-collapse: collapse;
          margin-bottom: 2rem;
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
          width: 7%;
        }
        thead th:nth-child(3) {
          width: 17%;
        }
        thead th:nth-child(4) {
          width: 17%;
        }
        thead th:nth-child(5) {
          width: 8%;
        }
        thead th:nth-child(6) {
          width: 20%;
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

        <h1>Calendar Archive</h1>
        <p>Doc archives past calendars' series pages. Please use the links below to browse past programs, and use the screening database to search for specific films or directors.</p>

        <br>

        <p><a href="/archive/2022-series/"><u>2022 series</u></a></p>
        <p><a href="/archive/2021-series/"><u>2021 series</u></a></p>
        <p><a href="https://docfilms.uchicago.edu/dev/calendar/archive.shtml" target="_blank"><u>2013 through 2020 series</u></a></p>

        <br>

        <h1><a href="/archive/testing"><u>Screening Database</u></a></h1>
        <p><i>*Note: the screening database catalogues screenings from Fall 2021 through Fall 2022. It is not optimized for searching on mobile.</i></p>

        <br>

        <form class="database-query" method="GET">
          <input type="text" placeholder="Enter your query..."name="query"/>
          <select name="field" id="simple-search-select">
            <option value="films.title" <?php if ($_GET and $_GET['field']=="films.title") {echo "selected='selected'"; } ?>>Film Title</option>
            <option value="directors.name" <?php if ($_GET and $_GET['field']=="directors.name") {echo "selected='selected'"; } ?>>Director</option>
          </select>
          <input type="submit" value="Search"/>
        </form>

        <?php
            function load_simple_query($mysqli_object, $sql_query, $query_value) {
              $stmt = $mysqli_object->prepare($sql_query);
              $stmt->bind_param('s', $query_value);
              $msc = microtime(true);
              $stmt->execute();
              $msc = round(microtime(true)-$msc, 3);
              $result = $stmt->get_result();
              $stmt->close();
              $result_num_rows = $result->num_rows;
              echo "<p>Fetched {$result_num_rows} result(s) in {$msc} seconds.</p>";
              return array($result, $result_num_rows);
            }
            function format_director($row_director) {
              $director_array = explode(', ', $row_director);
              echo $director_array[0];
              $i = 1;
              while ($i < count($director_array) - 1) {
                echo ", " . $director_array[$i];
                $i++;
              }
              if (count($director_array) > 1) {
                echo " and " . end($director_array);
              }
              return NULL;
            }
            function format_showdate($row_showdate) {
              $showdate_array = explode(', ', $row_showdate);
              echo date("m/d/y", strtotime($showdate_array[0]));
              $i = 1;
              while ($i < count($showdate_array) - 1) {
                echo ", " . date("m/d/y", strtotime($showdate_array[$i]));
                $i++;
              }
              if (count($showdate_array) > 1) {
                echo " and " . date("m/d/y", strtotime(end($showdate_array)));
              }
              return NULL;
            }

            require_once $_SERVER['DOCUMENT_ROOT'] . '/connection.php';
            if ($_GET) {
                $simple_field = $_GET['field'];
                $simple_query = "%{$_GET['query']}%";

                
                if ($simple_field == "films.title") {
                    $film_listing_query = 'SELECT * FROM
                      (SELECT `films`.`title` as film_title,
                        `films`.`id` as film_id,
                        `films`.`releaseyear` as release_year,
                        GROUP_CONCAT(DISTINCT `directors`.`name` SEPARATOR ", ") AS director
                      FROM `films`
                      INNER JOIN `films_directors` ON `films`.`id` = `films_directors`.`films_id` 
                      INNER JOIN `directors` ON `films_directors`.`directors_id` = `directors`.`id`
                      WHERE `films`.`title` COLLATE utf8mb4_general_ci LIKE ? 
                      GROUP BY `films`.`id`) t1  

                    INNER JOIN 
                      (SELECT `instances`.`films_id` as film_id,
                        `instances`.`format` as format,
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

                    list($result_films, $result_films_num_rows) = load_simple_query($mysqli, $film_listing_query, $simple_query);

                    if ($result_films_num_rows > 0) {
                        echo '<table class="query-results-films">
                        <thead>
                          <tr>
                            <th scope="col">Film Title</th>
                            <th scope="col">Release Year</th>
                            <th scope="col">Director</th>
                            <th scope="col">Screening Date</th>
                            <th scope="col">Format</th>
                            <th scope="col">Series</th>
                          </tr>
                        </thead>
                        <tbody>';
                        while ($row = mysqli_fetch_assoc($result_films)) {
                            echo "<tr>
                              <td><a href=/archive/screening?screening_id={$row['screening_id']}&query={$_GET['query']}&field={$_GET['field']}><u>" . $row['film_title'] . '</a></u></td>
                              <td>' . $row['release_year'] . '</td>
                              <td>';
                              
                              format_director($row['director']);

                              echo '</td>
                              <td>';

                              format_showdate($row['showdate']);

                              echo '</td>
                              <td>' . $row['format'] . '</td>
                              <td>';
                              
                              echo $row['series_name'];
                              
                              echo '</td>
                            </tr>';
                        }
                        echo '</tbody>
                        </table>';
                    }
                } elseif ($simple_field == "directors.name") {
                  $director_listing_query = 'SELECT * FROM
                      (SELECT `films`.`title` as film_title,
                        `films`.`id` as film_id,
                        `films`.`releaseyear` as release_year,
                        GROUP_CONCAT(DISTINCT `directors`.`name` SEPARATOR ", ") AS director
                      FROM `films`
                      INNER JOIN `films_directors` ON `films`.`id` = `films_directors`.`films_id` 
                      INNER JOIN `directors` ON `films_directors`.`directors_id` = `directors`.`id`
                      WHERE `directors`.`name` COLLATE utf8mb4_general_ci LIKE ? 
                      GROUP BY `films`.`id`) t1  

                    INNER JOIN 
                      (SELECT `instances`.`films_id` as film_id,
                        `instances`.`format` as format,
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

                    list($result_directors, $result_directors_num_rows) = load_simple_query($mysqli, $director_listing_query, $simple_query);

                    if ($result_directors_num_rows > 0) {
                        echo '<table class="query-results-films">
                        <thead>
                          <tr>
                            <th scope="col">Film Title</th>
                            <th scope="col">Release Year</th>
                            <th scope="col">Director</th>
                            <th scope="col">Screening Date</th>
                            <th scope="col">Format</th>
                            <th scope="col">Series</th>
                          </tr>
                        </thead>
                        <tbody>';
                        while ($row = mysqli_fetch_assoc($result_directors)) {
                            echo '<tr>
                              <td>' . $row['film_title'] . '</td>
                              <td>' . $row['release_year'] . '</td>
                              <td>';
                              
                              format_director($row['director']);

                              echo '</td>
                              <td>';

                              format_showdate($row['showdate']);

                              echo '</td>
                              <td>' . $row['format'] . '</td>
                              <td>';
                              
                              echo $row['series_name'];
                              
                              echo '</td>
                            </tr>';
                        }
                        echo '</tbody>
                        </table>';
                    }
                }

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