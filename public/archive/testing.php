<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archive</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
  </head>

  <body>
    
    <?php include "../includes/header.html"; ?>
  
    <main>

      <?php include "../includes/dropdown.html"; ?>

      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/connection.php'; ?>

      <?php 
        $sql_query_films = 'SELECT `title` FROM `films`;';
        $result_films = mysqli_query($conn, $sql_query_films);
        $result_films_num_rows = mysqli_num_rows($result_films);

        if ($result_films_num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result_films)) {
                echo $row['`title`'] . '<br>';
            }
        }
      ?>
        
    </main>
    
    <?php include "../includes/footer.html"; ?>
    <script src="/js/resize-menu.js"></script>

  </body>
</html>