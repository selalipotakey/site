<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendar</title>
    <link rel="stylesheet" type="text/css" href="/style.css?ver=1.1">
  </head>

  <body>
    
    <?php $version='1.2'; include "../includes/header.html";?>
  
    <main>

      <?php $version='1.2'; include "../includes/dropdown.html";?>

      <div class="information">

        <h1>Now playing:</h1>

        <!-- <iframe src="/calendar/custom_calendar.php?ver=2.0" style="border: 0; padding-bottom: 0rem;" frameborder="0" scrolling="no"></iframe> -->

        <iframe id='month-calendar' src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FChicago&src=Y19hN2I2ZWFjZWYzZjgyMDQyYjQzMGZlMGYzMDZiMTZlZTYxNGVmYTk1OGQ4NjI0ZmQzOGI2MTE0OTU1MmU5ZDQ2QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23795548" style="border-width:0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>

        <iframe id='agenda-calendar' src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FChicago&mode=AGENDA&src=Y19hN2I2ZWFjZWYzZjgyMDQyYjQzMGZlMGYzMDZiMTZlZTYxNGVmYTk1OGQ4NjI0ZmQzOGI2MTE0OTU1MmU5ZDQ2QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23795548" style="border-width:0;" width="800" height="600" frameborder="0" scrolling="no"></iframe>

        <h3 style="padding: 1rem 0rem;"><i>Stylized Winter 2023 calendar <u><a href="https://drive.google.com/file/d/1Lp3VCSCAdpdr44ZCJb_WmTHuANuNUfmr/view?usp=sharing" target="_blank">here</a></u>; stylized Winter 2023 booklet <u><a href="https://drive.google.com/file/d/1xW2ho_JBqHTe7wfKraEQDeJAVkMbihTx/view?usp=sharing" target="_blank">here</a></u>.</i></h3>

        <h1>Series this quarter:</h1>

        <div class="series-list">

          <div class="series-tile reverse">
            <a href="/calendar/special-events"><img src="/images/2023winter/who-killed-captain-alex-2010.jpg" alt="WHO KILLED CAPTAIN ALEX still"></a>
            <div class="series-text">
              <a href="/calendar/special-events">
                <p class="title">Special Events</p>
              </a>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/monday"><img src="/images/2023winter/series_stills/baby-face-1933.jpg" alt="BABY FACE still"></a>
            <div class="series-text">
              <a href="/calendar/monday">
                <p class="day">Monday</p>
                <p class="title">Baby Face: The Films of Barbara Stanwyck</p>
              </a>
              <p class="programmer">Programmed by: Deany Cheng</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/tuesday"><img src="/images/2023winter/series_stills/free-chol-soo-lee-2022.jpg" alt="FREE CHOL SOO LEE still"></a>
            <div class="series-text">
              <a href="/calendar/tuesday">
                <p class="day">Tuesday</p>
                <p class="title">Asian American Media</p>
              </a>
              <p class="programmer">Programmed by: Carson Wang and Tien-Tien Jong</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/wednesday"><img src="/images/2023winter/series_stills/the-grand-illusion-1937.jpeg" alt="THE GRAND ILLUSION still"></a>
            <div class="series-text">
              <a href="/calendar/wednesday">
                <p class="day">Wednesday</p>
                <p class="title">Jean Renoir: The Grand Reality</p>
              </a>
              <p class="programmer">Programmed by: John Litweiler</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/thursday-1"><img src="/images/2023winter/series_stills/grave-of-the-fireflies-1988.png" alt="GRAVE OF THE FIREFLIES still"></a>
            <div class="series-text">
              <a href="/calendar/thursday-1">
                <p class="day">Thursday I</p>
                <p class="title">Splicing of the Atom: Nuclear Taboo in Cinema</p>
              </a>
              <p class="programmer">Programmed by: Max de Saint-Exupery</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/thursday-2"><img src="/images/2023winter/series_stills/jackass-the-movie-2002.jpeg" alt="JACKASS THE MOVIE still"></a>
            <div class="series-text">
              <a href="/calendar/thursday-2">
                <p class="day">Thursday II</p>
                <p class="title">Blow Up My Video: Movies Shot on Video, Shown on Film</p>
              </a>
              <p class="programmer">Programmed by: Zachary Vanes and Brian McKendry</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/friday"><img src="/images/2023winter/series_stills/love-liza-2002.jpeg" alt="LOVE LIZA still"></a>
            <div class="series-text">
              <a href="/calendar/friday">
                <p class="day">Friday</p>
                <p class="title">Philip Seymour Hoffman: A Retrospective</p>
              </a>
              <p class="programmer">Programmed by: Rocco Fantini</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/saturday"><img src="/images/2023winter/series_stills/bardo-2022.jpeg" alt="BARDO still"></a>
            <div class="series-text">
              <a href="/calendar/saturday">
                <p class="day">Saturday</p>
                <p class="title">The Docshees of Idasherin: New Releases</p>
              </a>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/sunday"><img src="/images/2023winter/series_stills/the-phantom-carriage-1921-option2.jpeg" alt="THE PHANTOM CARRIAGE still"></a>
            <div class="series-text">
              <a href="/calendar/sunday">
                <p class="day">Sunday</p>
                <p class="title">Facing Life, Meeting Death</p>
              </a>
              <p class="programmer">Programmed by: Hannah Halpern</p>
            </div>
          </div>

        </div>

      </div>
 
    </main>
    
    <?php include "../includes/footer.html" ?>
    <script src="/js/resize-menu.js"></script>
    <script src="/js/calendar-resize.js"></script>

  </body>
</html>