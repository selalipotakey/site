<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Screening</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
  </head>

  <body>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.html" ?>
  
    <main>

      <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/dropdown.html" ?>

      <div class="screenings-list">
        
        <?php 
          require_once $_SERVER['DOCUMENT_ROOT'] . '/connection.php';

          echo "<a href='/archive/testing?query={$_GET["query"]}&field={$_GET["field"]}'><p><u><i>Return to search</i></u></p></a><br>";

          $screening_id = $_GET['screening_id'];

          $screening_query = 'SELECT * FROM
                (SELECT `films`.`title` as film_title,
                `films`.`id` as film_id,
                `films`.`releaseyear` as release_year,
                GROUP_CONCAT(DISTINCT `directors`.`name` SEPARATOR ", ") AS director
                FROM `films`
                INNER JOIN `films_directors` ON `films`.`id` = `films_directors`.`films_id` 
                INNER JOIN `directors` ON `films_directors`.`directors_id` = `directors`.`id`
                GROUP BY `films`.`id`) t1  

            INNER JOIN 
                (SELECT `instances`.`films_id` as film_id,
                `instances`.`format` as format,
                `instances`.`runtime` as runtime,
                `instances`.`screenings_id` as screening_id
                FROM `instances`) t2
            ON t1.film_id = t2.film_id

            INNER JOIN
                (SELECT
                `series`.`name` AS series_name, 
                `screenings`.`id` AS screening_id,
                `screenings`.`capsule` AS capsule,
                `screenings`.`notes` AS notes,
                `screenings`.`image_path` AS image_path,
                GROUP_CONCAT(DISTINCT `times`.`showdate` ORDER BY `times`.`showdate` ASC SEPARATOR ", ") AS showdate
                FROM `screenings`
                INNER JOIN `series` ON `screenings`.`series_id` = `series`.`id` 
                INNER JOIN `times` ON `screenings`.`id` = `times`.`screenings_id`
                WHERE `screenings`.`id` = ?
                GROUP BY `screenings`.`id`) t3
            ON t2.screening_id = t3.screening_id;';

            $stmt = $mysqli->prepare($screening_query);
            $stmt->bind_param('s', $screening_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $result_num_rows = $result->num_rows;

            if ($result_num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h1>{$row['showdate']}</h1>";

                    // echo "<img src='/images/2023winter/the-strange-love-of-martha-ivers-1946.jpg' alt='The Strange Love of Martha Ivers (1946) still'>";

                    $film_year_line = $row['film_title'];
                    if (!empty($row['release_year'])){
                        $film_year_line .= " ({$row['release_year']})";
                    }
                    echo "<h2>{$film_year_line}</h2>";

                    $dir_run_form_line = NULL;
                    if (!empty($row['director'])){
                        $dir_run_form_line .= "{$row['director']}";
                    }
                    if (!empty($row['runtime'])){
                        if (!empty($dir_run_form_line)) {
                            $dir_run_form_line .= " &middot ";
                        }
                        $dir_run_form_line .= "{$row['runtime']}m";
                    }
                    if (!empty($row['format'])){
                        if (!empty($dir_run_form_line)) {
                            $dir_run_form_line .= " &middot ";
                        }
                        $dir_run_form_line .= "{$row['format']}";
                    }
                    echo "<h3>{$dir_run_form_line}</h3>";

                    if (!empty($row['capsule'])){
                        echo "<p>{$row['capsule']}</p>";
                    }
                    if (!empty($row['notes'])){
                        echo "<i><p>{$row['notes']}</p></i>";
                    }
                }
            }
        ?>
        <div class="screening">

          <h1>7:00PM Monday, February 6th</h1>
          <p>When an unhappily married couple—played by Barbara Stanwyck and Kirk Douglas (in his first film!)—reunites with their childhood friend (Van Heflin) with whom they share a terrible secret, drama ensues, in <i>The Strange Love of Martha Ivers</i>. One of a string of darker antiheroine roles Stanwyck took on after the success of <i>Double Indemnity</i>, the film shows her comfort with morally ambiguous characters, which was unique among megastars at the time.</p>
          <p><i>Preserved by the Library of Congress.</i></p>

        </div>

      </div>
        
    </main>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html" ?>
    <script src="/js/resize-menu.js"></script>

  </body>
</html>