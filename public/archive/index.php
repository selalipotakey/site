<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archive</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <style>
        form.database-query {
          display: flex;
          flex-flow: row wrap;
          align-items: center;
          width: 100%;
          line-height: 1.5;
          font-size: 1.8rem;
        }
        .database-query input[type=text] {
          box-sizing: border-box;
          height: 3.5rem;
          width: 70%;
          border: .25rem solid #000000;
          border-right: .125rem solid #000000;
          border-radius: 0px;
          background-color: #ffffff;
          padding: 0rem .5rem;
          line-height: 1.5;
          font-size: 1.8rem;
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
          line-height: 1.5;
          font-size: 1.8rem;
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
          line-height: 1.5;
          font-size: 1.8rem;
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

        /* for infinite loading screen xx */
        .ajax-load{
            background: white;
            padding: 10px 0px;
            max-width: 10%;
            height: auto;
        }

        .center {
          display: block;
          margin-left: auto;
          margin-right: auto;
        }

        table.query-results {
          table-layout: fixed;
          width: 100%;
          border-collapse: collapse;
          margin-bottom: 2rem;
        }
        table.query-results {
          border: .25rem solid #000000;
        }
        th, td {
          border: .15rem solid #000000;
        }

        table.films thead th:nth-child(1) {
          width: 30%;
        }
        table.films thead th:nth-child(2) {
          width: 10%;
        }
        table.films thead th:nth-child(3) {
          width: 15%;
        }
        table.films thead th:nth-child(4) {
          width: 17%;
        }
        table.films thead th:nth-child(5) {
          width: 8%;
        }
        table.films thead th:nth-child(6) {
          width: 20%;
        }

        table.series thead th:nth-child(1) {
          width: 35%;
        }
        table.series thead th:nth-child(2) {
          width: 20%;
        }
        table.series thead th:nth-child(3) {
          width: 15%;
        }
        table.series thead th:nth-child(4) {
          width: 10%;
        }
        table.series thead th:nth-child(5) {
          width: 10%;
        }
        table.series thead th:nth-child(6) {
          width: 10%;
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

        <p>While the screening database is partially constructed, calendar records from 1936-2019 can be found on <u><a href="https://www.breezesofnight.com/1/7doc.cgi" target="_blank">our old database</a></u>.</p>

        <br>

        <h1><a href="/archive"><u>Screening Database</u></a></h1>
        <p><i>*Note: the screening database catalogues screenings from Fall 2021 through Summer 2023. It is not optimized for searching on mobile.</i></p>

        <br>

        <form class="database-query" method="GET">
          <input type="text" placeholder="Enter your query..." name="query" value="<?php if (isset($_GET['query'])) echo $_GET['query']; ?>"/>
          <select name="field" id="simple-search-select">
            <option value="films.title" <?php if ($_GET and $_GET['field']=="films.title") {echo "selected='selected'"; } ?>>Film Title</option>
            <option value="directors.name" <?php if ($_GET and $_GET['field']=="directors.name") {echo "selected='selected'"; } ?>>Director</option>
            <option value="series.name" <?php if ($_GET and $_GET['field']=="series.name") {echo "selected='selected'"; } ?>>Series</option>
          </select>
          <input type="submit" value="Search"/>
        </form>

        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/../database/scripts.php';
            if ($_GET) {
                $simple_field = $_GET['field'];
                $simple_query = $_GET['query'];
                
                if ($simple_field == "all_fields") {
                  simple_query_all($mysqli, $simple_query);
                } elseif ($simple_field == "films.title") {
                  simple_query_title($mysqli, $simple_query);
                } elseif ($simple_field == "directors.name") {
                  simple_query_director($mysqli, $simple_query);
                } elseif ($simple_field == "series.name") {
                  simple_query_series($mysqli, $simple_query);
                }

            }
            $mysqli->close();
        ?>

      </div>

      <div class="ajax-load text-center" style="display:none" class="center">
        <img src="/images/site/loading.gif" alt="loading...">
      </div>
        
    </main>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html"; ?>
    <script src="/js/resize-menu.js"></script>
    <script src="/js/infinite-scroll.js"></script>

  </body>
</html>