<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendar</title>
    <link rel="stylesheet" type="text/css" href="/style.css?ver=1.1">
  </head>

  <body>
    
    <?php $version='1.1'; include "../includes/header.html";?>
  
    <main>

      <?php $version='1.1'; include "../includes/dropdown.html";?>

      <div class="information">

        <h1>Now playing:</h1>
        <iframe src="/calendar/custom_calendar.php?ver=2.0" style="border: 0; padding-bottom: 0rem;" frameborder="0" scrolling="no"></iframe>
        <h3 style="padding: 1rem 0rem;"><i>Stylized Autumn 2022 calendar <u><a href="https://drive.google.com/file/d/19elwu7IqFMl_H6dt23jEnD0N2hcyJln_/view?usp=sharing" target="_blank">here</a></u>; stylized Autumn 2022 booklet <u><a href="https://drive.google.com/file/d/1rozP_gZuFfShgQqe6dZt0IdqCNf8_ghY/view?usp=sharing" target="_blank">here</a></u>.</i></h3>


        <h1>Weekly series this quarter:</h1>

        <div class="series-list">

          <div class="series-tile reverse">
            <a href="/calendar/special-events"><img src="/images/2022fall/nosferatu-1922.jpg" alt="NOSFERATU still"></a>
            <div class="series-text">
              <a href="/calendar/special-events">
                <p class="title">Special Events</p>
              </a>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/monday"><img src="/images/2022fall/series_stills/whats-up-doc-1972.jpeg" alt="Whats Up Doc still"></a>
            <div class="series-text">
              <a href="/calendar/monday">
                <p class="day">Monday</p>
                <p class="title">Wonderfully Loathsome: Screwball Romance Through the Ages</p>
              </a>
              <p class="programmer">Programmed by: Liam Flanigan</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/tuesday"><img src="/images/2022fall/series_stills/long-days-journey-into-night-2018.jpg" alt="Long Days Journey Into Night still"></a>
            <div class="series-text">
              <a href="/calendar/tuesday">
                <p class="day">Tuesday</p>
                <p class="title">After the 5th: China and the 21st Century</p>
              </a>
              <p class="programmer">Programmed by: Addison Wood</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/wednesday"><img src="/images/2022fall/series_stills/irma-vep-1996.jpg" alt="Irma Vep still"></a>
            <div class="series-text">
              <a href="/calendar/wednesday">
                <p class="day">Wednesday</p>
                <p class="title">Center Stage: The Films of Maggie Cheung</p>
              </a>
              <p class="programmer">Programmed by: Deany Cheng</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/thursday1"><img src="/images/2022fall/series_stills/chimes-at-midnight-1966.jpg" alt="Chimes at Midnight still"></a>
            <div class="series-text">
              <a href="/calendar/thursday1">
                <p class="day">Thursday I</p>
                <p class="title">Shakespeare Remixed</p>
              </a>
              <p class="programmer">Programmed by: Michelle Chow</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/thursday2"><img src="/images/2022fall/series_stills/belladonna-of-sadness-1973.jpg" alt="Chimes at Midnight still"></a>
            <div class="series-text">
              <a href="/calendar/thursday2">
                <p class="day">Thursday II</p>
                <p class="title">Myths, Legends, and Folk Tales: A Brief History of Animation</p>
              </a>
              <p class="programmer">Programmed by: Solana Adedokun</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/friday"><img src="/images/2022fall/series_stills/dogtooth-2009.jpg" alt="Dogtooth still"></a>
            <div class="series-text">
              <a href="/calendar/friday">
                <p class="day">Friday</p>
                <p class="title">Programmers' Picks</p>
              </a>
              <p class="programmer">Programmed by: Addison Wood, Ian Resnick, and Hannah Halpern</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/saturday"><img src="/images/2022fall/series_stills/top-gun-maverick-2022.png" alt="Top Gun Maverick still"></a>
            <div class="series-text">
              <a href="/calendar/saturday">
                <p class="day">Saturday</p>
                <p class="title">Top Doc: Maverdock - New Releases</p>
              </a>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/sunday"><img src="/images/2022fall/series_stills/the-nun-1966.jpg" alt="The Nun still"></a>
            <div class="series-text">
              <a href="/calendar/sunday">
                <p class="day">Sunday</p>
                <p class="title">Jacques Rivette: New Wave Master</p>
              </a>
              <p class="programmer">Programmer: Kathleen Geier</p>
            </div>
          </div>

        </div>

      </div>
 
    </main>
    
    <?php include "../includes/footer.html" ?>
    <script src="/js/resize-menu.js"></script>

  </body>
</html>