<!DOCTYPE html>
<html lang="en">

<head>
  <title>Archive</title>
</head> 

<body>
  <h1>Series (Under construction...)</hi>

  <div class="container">
      <form action="" method="GET" name="">
        <table>
          <tr>
            <th>Series Name</th>
            <th>Programmer</th>
            <th>Slot</th>
            <th>Quarter</th>
            <th>Year</th>
          </tr>
          <input type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Enter your search keywords"/>
          <input type="submit" name="" value="Search" />
          <br><br>
      </form>
  </div>

  <?php
        include 'connection.php';

        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $search_string = "SELECT series.name AS series_name, series.programmer AS programmer, series.slot AS slot, quarters.quarter AS quarter, quarters.year AS year FROM series INNER JOIN quarters ON series.quarters_id = quarters.id WHERE ";
        $display_words = "";
  
        $keywords = explode(' ', $search);			
        foreach ($keywords as $word){
          $search_string .= "series.name LIKE '%".$word."%' OR ";
          $display_words .= $word.' ';
        }
        $search_string = substr($search_string, 0, strlen($search_string)-4);
        $display_words = substr($display_words, 0, strlen($display_words)-1);
        $search_string .= ';';
  
        $query = mysqli_query($link, $search_string);
        $result_count = mysqli_num_rows($query);
  
        if($result_count > 0)
        {
          while($row = mysqli_fetch_assoc($query))
          {
            echo "<tr>";
            echo "<td>" . $row["series_name"] . "</td>";
            echo "<td>" . $row["programmer"] . "</td>";
            echo "<td>" . $row["slot"] . "</td>";
            echo "<td>" . $row["quarter"] . "</td>";
            echo "<td>" . $row["year"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo 'There were no results for your search. Try searching for something else.';
        }
  
        mysqli_close($link);
    ?>

</body>