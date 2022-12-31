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

      function format_screening($row) {
        if (str_contains($row['full_showdate'], ":")) {
            $formatted_showdate = format_full_showdate_tostr($row['full_showdate']);
        } else {
            $formatted_showdate = format_showdate_tostr($row['full_showdate']);
        }
        echo "<h1 style='padding-bottom: 0;'>{$formatted_showdate}</h1>";

        // echo "<img src='/images/2023winter/the-strange-love-of-martha-ivers-1946.jpg' alt='The Strange Love of Martha Ivers (1946) still'>"; // take out the style=padding above and below when putting back in the image.

        $film_year_line = format_title_year($row['film_title'], $row['release_year']);
        echo "<h2 style='padding-top: 0;'>{$film_year_line}</h2>";

        if (!empty($row['series_name'])) {
            echo "<h3><i>{$row['series_name']}</i></h3>";
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

?>