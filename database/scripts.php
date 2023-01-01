<?php
    require dirname(__FILE__) . '/../../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__) . '/../../ext_includes/');
    $dotenv->safeload();

    $mysqli = new mysqli($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB']);

    if($mysqli->connect_error) {
        exit('Error connecting to database.'); //Should be a message a typical user could understand in production
    }

    function format_to_italics($unformatted_string, $already_italicized=FALSE) {
        $substring_array = explode('_', $unformatted_string);
        if (count($substring_array)%2 == 0) {
            return $unformatted_string;
        } else {
            $new_string = "";
            $i = 0;
            while ($i < count($substring_array)) {
                if ($i%2 == 0) {
                    $new_string .= $substring_array[$i];
                } else {
                    if (! $already_italicized) {
                        $new_string .= '<i>' . $substring_array[$i] . '</i>';
                    } else {
                        $new_string .= '</i>' . $substring_array[$i] . '<i>';
                    }
                }
                $i += 1;
            }
            return $new_string;
        }
    }

    function format_showdate_tostr($row_showdate) {
    $showdate_array = explode('; ', $row_showdate);
    $i = 0;
    $showdate_string = "";
    while ($i < count($showdate_array)) {
        $showdate_substring = date("D, M jS Y", strtotime($showdate_array[$i]));
        $showdate_string .= $showdate_substring . "; ";
        $i++;
    }
    $showdate_string = substr($showdate_string, 0, -2);
    return $showdate_string;
    }

    function format_full_showdate_tostr($row_full_showdate) {
    $full_showdate_array = explode('; ', $row_full_showdate);
    $i = 0;
    $showdate_string = "";
    while ($i < count($full_showdate_array)) {
        list($showdate, $showtime) = explode(' ', $full_showdate_array[$i]);
        $showdate_substring = date("D, M jS Y", strtotime($showdate));
        $showtime_substring = date("g:iA", strtotime($showtime));
        $showdate_string .= $showtime_substring . " " . $showdate_substring . "; ";
        $i++;
    }
    $showdate_string = substr($showdate_string, 0, -2);
    return $showdate_string;
    }

    function format_title_year($film_title, $film_year) {
    $title_array = explode(' // ', $film_title);
    $year_array = explode(' // ', $film_year);
    $i = 0;
    $title_year_string = "";
    while ($i < count($title_array)) {
        $title_year_substring = $title_array[$i];
        if (!empty($year_array[$i])) {
            $title_year_substring .= ' (' . $year_array[$i] . ')';
        }
        $title_year_string .= $title_year_substring . ' // ';
        $i++;
    }
    $title_year_string = substr($title_year_string, 0, -4);
    return $title_year_string;
    }

    function format_dir_run_form($director, $runtime, $film_format) {
    $director_array = explode(' // ', $director);
    $runtime_array = explode(' // ', $runtime);
    $format_array = explode(' // ', $film_format);
    $i = 0;
    $dir_run_form_string = "";
    $director_string = "";
    if (count(array_flip($director_array)) === 1) {
        $director_string = end($director_array);
    } else {
        $i = 0;
        while ($i < count($director_array)) {
            $director_string .= $director_array[$i] . " // ";
            $i++;
        }
        $director_string = substr($director_string, 0, -4);
    }

    $runtime_string = "";
    $i = 0;
    while ($i < count($runtime_array)) {
        $runtime_string .= $runtime_array[$i] . "m // ";
        $i++;
    }
    $runtime_string = substr($runtime_string, 0, -4);

    $format_string = "";
    if (count(array_flip($format_array)) === 1) {
        $format_string = end($format_array);
    } else {
        $i = 0;
        while ($i < count($format_array)) {
            $format_string .= $format_array[$i] . " // ";
            $i++;
        }
        $format_string = substr($format_string, 0, -4);
    }

    if (!empty($director_string)) {
        $dir_run_form_string .= $director_string . ' &middot ';
    }
    if (!empty($runtime_string)) {
        $dir_run_form_string .= $runtime_string . ' &middot ';
    }
    if (!empty($format_string)) {
        $dir_run_form_string .= $format_string . ' &middot ';
    }
    $dir_run_form_string = substr($dir_run_form_string, 0, -9); 
    return $dir_run_form_string;
    }

    function format_screening($row, $show_series=TRUE) {
        if (str_contains($row['full_showdate'], ":")) {
            $formatted_showdate = format_full_showdate_tostr($row['full_showdate']);
        } else {
            $formatted_showdate = format_showdate_tostr($row['full_showdate']);
        }
        echo "<h1 style='padding-bottom: 0;'>{$formatted_showdate}</h1>";

        // need to standardize image paths before adding this in.
        // echo "<img src='/images/2023winter/the-strange-love-of-martha-ivers-1946.jpg' alt='The Strange Love of Martha Ivers (1946) still'>"; // take out the style=padding above and below when putting back in the image.

        $film_year_line = format_title_year($row['film_title'], $row['release_year']);
        echo "<h2 style='padding-top: 0;'>{$film_year_line}</h2>";

        if ($show_series and !empty($row['series_name'])) {
            echo "<h3><a href='/archive/series?series_id={$row['series_id']}&screening_id={$row['screening_id']}'><u><i>{$row['series_name']}</i></u></a></h3>";
        }

        $dir_run_form_line = format_dir_run_form($row['director'], $row['runtime'], $row['format']);
        if (!empty($dir_run_form_line)){
            echo "<h3>{$dir_run_form_line}</h3>";
        }

        if (!empty($row['capsule'])){
            $formatted_capsule = format_to_italics($row['capsule']);
            echo "<p>{$formatted_capsule}</p>";
        }
        if (!empty($row['notes'])){
            $formatted_notes = format_to_italics($row['notes'], TRUE);
            echo "<i><p>{$formatted_notes}</p></i>";
        }
    }

    function get_number_of_screenings($mysqli_object, $film_id) {
    
    echo '<br>';

    $query_number_of_screenings = "SELECT `times`.`id` as times_id,
            `films`.`title` as film_name,
            `films`.`releaseyear` as release_year
    FROM `times`
    INNER JOIN `screenings` ON `times`.`screenings_id` = `screenings`.`id`
    INNER JOIN `instances` ON `screenings`.`id` = `instances`.`screenings_id`
    INNER JOIN `films` ON `instances`.`films_id` = `films`.`id`
    WHERE `films`.`id` = ?;";

    $film_id_array = explode(' // ', $film_id);

    $i = 0;
    while ($i < count($film_id_array)) {
        $film_id = (int)$film_id_array[$i];
        $stmt = $mysqli_object->prepare($query_number_of_screenings);
        $stmt->bind_param('i', $film_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result_num_rows = $result->num_rows;
        $single_row = $result->fetch_assoc();
        $film_name = $single_row['film_name'];
        $release_year = $single_row['release_year'];
        $num_screenings_string = '<p><i>' . $film_name . '</i> (' . $release_year . ') has been screened <u>' . $result_num_rows . ' time';
        if (!($result_num_rows == 1)) {
            $num_screenings_string .= 's';
        }
        echo $num_screenings_string . '</u>.</p>';
        $i++;
    }

    echo '<br>';

    return NULL;
    
    }

    function format_series_info($row) {

        echo '<div class="text-section">';

        $series_title_line = "<h1>";
        if (!empty($row['slot']) and !(strtoupper($row['slot']) == 'SPECIAL EVENT'))
            $series_title_line .= strtoupper($row['slot']) . ' - ';
        $series_title_line .= $row['series_name'] . '</h1>';
        echo $series_title_line;

        if (!empty($row['programmer'])) {
            $programmer_array = explode(' // ', $row['programmer']);
            
            if (count($programmer_array) == 1) {
                $programmer_string = $programmer_array[0];
            } elseif (count($programmer_array) == 2) {
                $programmer_string = $programmer_array[0] . ' and ' . $programmer_array[1];
            } else {
                $programmer_string = "";
                $i = 0;
                while ($i < count($programmer_array) - 1) {
                    $programmer_string .= $programmer_array[$i] . ', ';
                    $i++;
                }
                $programmer_string .= 'and ' . end($programmer_array);
            }
            echo '<h3>Programmed by: ' . $programmer_string . '</h3>';
        }

        if (!empty($row['essay'])) {
            $essay = format_to_italics($row['essay']);
            $paragraph_array = preg_split("/\r\n|\n|\r/", $essay);
            $i = 0;
            while ($i < count($paragraph_array)) {
                echo '<p>' . $paragraph_array[$i] . '</p>';
                $i++;
            }
        }

        if (!empty($row['notes'])) {
            $notes = format_to_italics($row['notes'], TRUE);
            $paragraph_array = preg_split("/\r\n|\n|\r/", $notes);
            $i = 0;
            while ($i < count($paragraph_array)) {
                echo '<p><i>' . $paragraph_array[$i] . '</i></p>';
                $i++;
            }
        }

        echo '</div>';

        return NULL;
    }

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
    function format_showdate_table_films($row_showdate) {
        $showdate_array = explode(' // ', $row_showdate);
        $showdate_string = "";
        $i = 0;
        while ($i < count($showdate_array)) {
            $showdate_string .= date("n/d/y", strtotime($showdate_array[$i])) . '; ';
            $i++;
        }
        $showdate_string = substr($showdate_string, 0, -2);
        return $showdate_string;
    }
    function format_names_table_films($row_names) {
        $names_array = explode(' // ', $row_names);

        $names_string = $names_array[0];
        $i = 1;
        while ($i < count($names_array) - 1) {
          $names_string .= ", " . $names_array[$i];
          $i++;
        }
        if (count($names_array) > 1) {
          $names_string .= " and " . end($names_array);
        }
        return $names_string;
    }
    function construct_table_films($result, $result_num_rows) {
        if ($result_num_rows > 0) {
            echo '<table class="query-results films">
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
            while ($row = $result->fetch_assoc()) {
                $encoded_get_query = urlencode($_GET['query']);
                echo "<tr>
                  <td><a href=/archive/screening?screening_id={$row['screening_id']}&query={$encoded_get_query}&field={$_GET['field']}><u>" . $row['film_title'] . '</u></a></td>
                  <td>' . $row['release_year'] . '</td>
                  <td>';
                  
                  echo format_names_table_films($row['director']);

                  echo '</td>
                  <td>';

                  echo format_showdate_table_films($row['showdate']);

                  echo '</td>
                  <td>' . $row['format'] . '</td>
                  <td>';
                  
                  echo "<a href=/archive/series?series_id={$row['series_id']}&query={$encoded_get_query}&field={$_GET['field']}><u>" . $row['series_name'] . '</u></a>';
                  
                  echo '</td>
                </tr>';
            }
            echo '</tbody>
            </table>';
          }
    }
    function simple_query_title($mysqli_object, $query_value) {
        $film_listing_query = 'SELECT * FROM
            (SELECT `films`.`title` as film_title,
            `films`.`id` as film_id,
            `films`.`releaseyear` as release_year,
            GROUP_CONCAT(DISTINCT `directors`.`name` SEPARATOR " // ") AS director
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
            `series`.`id` as series_id,
            `screenings`.`id` AS screening_id,
            GROUP_CONCAT(DISTINCT `times`.`showdate` ORDER BY `times`.`showdate` ASC SEPARATOR " // ") AS showdate
            FROM `screenings`
            INNER JOIN `series` ON `screenings`.`series_id` = `series`.`id` 
            INNER JOIN `times` ON `screenings`.`id` = `times`.`screenings_id`
            GROUP BY `screenings`.`id`) t3
        ON t2.screening_id = t3.screening_id 
        
        ORDER BY showdate DESC;';

        $query_value = '%' . $query_value . '%';
        list($result, $result_num_rows) = load_simple_query($mysqli_object, $film_listing_query, $query_value);

        construct_table_films($result, $result_num_rows);

        return NULL;
    }
    function simple_query_director($mysqli_object, $query_value) {

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
            `series`.`id` as series_id,
            `screenings`.`id` AS screening_id,
            GROUP_CONCAT(DISTINCT `times`.`showdate` ORDER BY `times`.`showdate` ASC SEPARATOR ", ") AS showdate
            FROM `screenings`
            INNER JOIN `series` ON `screenings`.`series_id` = `series`.`id` 
            INNER JOIN `times` ON `screenings`.`id` = `times`.`screenings_id`
            GROUP BY `screenings`.`id`) t3
        ON t2.screening_id = t3.screening_id 
        
        ORDER BY showdate DESC;';


        $query_value = '%' . $query_value . '%';
        list($result, $result_num_rows) = load_simple_query($mysqli_object, $director_listing_query, $query_value);

        construct_table_films($result, $result_num_rows);

        return NULL;
    }
    // simple_query_all not working until find a better way to use collation with a fulltext search (what MATCH AGAINST is)
    // i.e. can't throw COLLATE command with MATCH AGAINST
    function simple_query_all($mysqli_object, $query_value) {
        $query_all = 'SELECT
            film_title,
            t1.film_id as film_id,
            release_year,
            director,
            format,
            t3.screening_id as screening_id,
            series_id,
            series_name,
            showdate,
        MATCH (film_title) AGAINST ( ? ) AS rel_title,
        MATCH (series_name) AGAINST ( ? ) AS rel_series_name,
        MATCH (director) AGAINST ( ? ) AS rel_director,
        MATCH (release_year) AGAINST ( ? ) AS rel_release_year
        FROM
            (SELECT `films`.`title` as film_title,
            `films`.`id` as film_id,
            `films`.`releaseyear` as release_year,
            GROUP_CONCAT(DISTINCT `directors`.`name` SEPARATOR " // ") AS director
            FROM `films`
            INNER JOIN `films_directors` ON `films`.`id` = `films_directors`.`films_id` 
            INNER JOIN `directors` ON `films_directors`.`directors_id` = `directors`.`id` 
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
            `series`.`id` as series_id,
            `screenings`.`id` AS screening_id,
            GROUP_CONCAT(DISTINCT `times`.`showdate` ORDER BY `times`.`showdate` ASC SEPARATOR " // ") AS showdate
            FROM `screenings`
            INNER JOIN `series` ON `screenings`.`series_id` = `series`.`id` 
            INNER JOIN `times` ON `screenings`.`id` = `times`.`screenings_id`
            GROUP BY `screenings`.`id`) t3
        ON t2.screening_id = t3.screening_id 

        WHERE MATCH (film_title, series_name, director, release_year) AGAINST ( ? )
        COLLATE utf8mb4_general_ci LIKE ?
        ORDER BY showdate DESC;';

        $query_value = '%' . $query_value . '%';
        list($result, $result_num_rows) = load_simple_query($mysqli_object, $query_all, $query_value);

        construct_table_films($result, $result_num_rows);

        return NULL;
    }
    function construct_table_series($result, $result_num_rows) {
        if ($result_num_rows > 0) {
            echo '<table class="query-results series">
            <thead>
              <tr>
                <th scope="col">Series Title</th>
                <th scope="col">Programmer</th>
                <th scope="col">Dates</th>
                <th scope="col">Quarter</th>
                <th scope="col">Year</th>
                <th scope="col">Slot</th>
              </tr>
            </thead>
            <tbody>';

            while ($row = $result->fetch_assoc()) {
                $encoded_get_query = urlencode($_GET['query']);
                echo "<tr>";
                  
                  echo "<td>" . "<a href=/archive/series?series_id={$row['series_id']}&query={$encoded_get_query}&field={$_GET['field']}><u>" . $row['series_name'] . '</u></a></td>';
                  
                  if (!empty($row['programmer'])) {
                    echo '<td>' . format_names_table_films($row['programmer']) . '</td>';
                  } else {
                    echo '<td> - </td>';
                  }
                  
                  if (!empty($row['startdate']) and !empty($row['startdate'])) {
                    echo '<td>' . format_showdate_table_films($row['startdate']) . ' - ' . format_showdate_table_films($row['enddate']) . '</td>';
                  } else {
                    echo '<td> - </td>';
                  }
                  
                  if (!empty($row['quarter'])) {
                    echo '<td>' . $row['quarter'] . '</td>';
                  } else {
                    echo '<td> - </td>';
                  }

                  if (!empty($row['quarter_year'])) {
                    echo '<td>' . $row['quarter_year'] . '</td>';
                  } else {
                    echo '<td> - </td>';
                  }

                  if (!empty($row['slot'])) {
                    echo '<td>' . $row['slot'] . '</td>';
                  } else {
                    echo '<td> - </td>';
                  }
                  
                echo '</tr>';
            }
            echo '</tbody>
            </table>';
        }
    }
    function simple_query_series($mysqli_object, $query_value) {
        $query_series = 'SELECT * FROM 
            (SELECT `programmers`.`id` as programmer_id,
                GROUP_CONCAT(`programmers`.`name` SEPARATOR " // ") as programmer,
                `series_programmers`.`series_id` as ser_prog_series_id
            FROM `programmers`
            INNER JOIN `series_programmers` ON `programmers`.`id` = `series_programmers`.`programmers_id`
            GROUP BY `series_programmers`.`series_id`) t1  
        
        RIGHT JOIN 
            (SELECT `series`.`id` as series_id,
                `series`.`name` as series_name,
                `series`.`slot` as slot,
                `series`.`essay` as essay,
                `series`.`notes` as notes,
                `quarters`.`id` as quarter_id,
                `quarters`.`quarter` as quarter,
                `quarters`.`year` as quarter_year,
                `quarters`.`startdate` as startdate,
                `quarters`.`enddate` as enddate
            FROM `series`
            LEFT JOIN `quarters` ON `series`.`quarters_id` = `quarters`.`id`
            WHERE `series`.`name` COLLATE utf8mb4_general_ci LIKE ?) t2
        ON t1.ser_prog_series_id = t2.series_id
        ORDER BY startdate DESC, quarter_year DESC, quarter;';

        $query_value = '%' . $query_value . '%';
        list($result, $result_num_rows) = load_simple_query($mysqli_object, $query_series, $query_value);

        construct_table_series($result, $result_num_rows);

        return NULL;
    }
?>