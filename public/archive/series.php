<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Series</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
  </head>

  <body>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.html" ?>
  
    <main>

      <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/dropdown.html" ?>

      <div class="screenings-list">
        
        <?php 

          require_once $_SERVER['DOCUMENT_ROOT'] . '/../database/scripts.php';

          if (array_key_exists("query", $_GET) and array_key_exists("field", $_GET)) {
            $encoded_get_query = urlencode($_GET["query"]);
            echo "<a href='/archive/?query={$encoded_get_query}&field={$_GET["field"]}'><p><u><i>Return to search</i></u></p></a><br>";
          } elseif (array_key_exists("screening_id", $_GET)) {
            echo "<a href='/archive/screening?screening_id={$_GET['screening_id']}'><p><u><i>Return to screening</i></u></p></a><br>";
          }
        
          $series_id = $_GET['series_id'];

          $series_info_query = 'SELECT * FROM 
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
              WHERE `series`.`id` = ? ) t2
          ON t1.ser_prog_series_id = t2.series_id
          ORDER BY startdate DESC, quarter_year DESC, quarter;';

          $stmt = $mysqli->prepare($series_info_query);
          $stmt->bind_param('s', $series_id);
          $stmt->execute();
          $result = $stmt->get_result();
          $stmt->close();
          $result_num_rows = $result->num_rows;

          if ($result_num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  format_series_info($row);
              }
          }
          
          $series_query = 'SELECT GROUP_CONCAT(`t1`.`film_title` SEPARATOR " // ") as film_title,
              GROUP_CONCAT(`t1`.`film_id` SEPARATOR " // ") as film_id,
              GROUP_CONCAT(`t1`.`release_year` SEPARATOR " // ") as release_year,
              GROUP_CONCAT(`t1`.`director` SEPARATOR " // ") as director,
              GROUP_CONCAT(`t2`.`format` SEPARATOR " // ") as format,
              GROUP_CONCAT(`t2`.`runtime` SEPARATOR " // ") as runtime,
              screening_id,
              series_name,
              capsule,
              notes,
              image_path,
              full_showdate
          FROM (SELECT `films`.`title` as film_title,
                  `films`.`id` as film_id,
                  `films`.`releaseyear` as release_year,
                  GROUP_CONCAT(DISTINCT `directors`.`name` SEPARATOR ", ") AS director
              FROM `films`
              INNER JOIN `films_directors` ON `films`.`id` = `films_directors`.`films_id` 
              INNER JOIN `directors` ON `films_directors`.`directors_id` = `directors`.`id`
              GROUP BY `films`.`id`) t1  
          
          INNER JOIN 
          (SELECT `instances`.`films_id` as instances_film_id,
              `instances`.`format` as format,
              `instances`.`runtime` as runtime,
              `instances`.`screenings_id` as instances_screening_id
          FROM `instances`) t2
          ON t1.film_id = t2.instances_film_id
          
          INNER JOIN
          (SELECT
              `series`.`name` AS series_name, 
              `series`.`id` AS series_id,
              `screenings`.`id` AS screening_id,
              `screenings`.`capsule` AS capsule,
              `screenings`.`notes` AS notes,
              `screenings`.`image_path` AS image_path
          FROM `screenings`
          INNER JOIN `series` ON `screenings`.`series_id` = `series`.`id` 
          WHERE `series`.`id` = ?
          GROUP BY `screenings`.`id`) t3
          ON t2.instances_screening_id = t3.screening_id
          
          INNER JOIN (SELECT times_screening_id,
              GROUP_CONCAT(semi_showdate ORDER BY semi_showdate ASC SEPARATOR "; ") as full_showdate
              FROM (SELECT CONCAT(showdate, " ", showtime) as semi_showdate,
                      `times`.`screenings_id` as times_screening_id  
                  FROM `times`) t5
              GROUP BY times_screening_id) t4
          on t3.screening_id = times_screening_id
          GROUP BY screening_id
          ORDER BY full_showdate ASC';

            $stmt = $mysqli->prepare($series_query);
            $stmt->bind_param('s', $series_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $result_num_rows = $result->num_rows;

            if ($result_num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    format_screening($row, FALSE);
                    get_number_of_screenings($mysqli, $row['film_id']);
                }
            }
        
        $mysqli->close();
        ?>

      </div>
        
    </main>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html" ?>
    <script src="/js/resize-menu.js"></script>

  </body>
</html>