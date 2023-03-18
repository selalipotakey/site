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

        <!-- this is from when cameron (2022) was trying to make a completley locally hosted google calendar by copy-pasting google's code, does not work (yet) -->
        <!-- <iframe src="/calendar/custom_calendar.php?ver=2.0" style="border: 0; padding-bottom: 0rem;" frameborder="0" scrolling="no"></iframe> -->

        <iframe id='month-calendar' src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FChicago&mode=MONTH&src=Y184MzJiMWNjNWE1MTNlYzdiZDMwYWQ4YTNjYWJlYzcxYjE5MWJjYzM3NDkzMTg1ZjBhYmRmMmE0NTJkZjZjZmNjQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%237CB342" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

        <iframe id='agenda-calendar' src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FChicago&mode=AGENDA&src=Y184MzJiMWNjNWE1MTNlYzdiZDMwYWQ4YTNjYWJlYzcxYjE5MWJjYzM3NDkzMTg1ZjBhYmRmMmE0NTJkZjZjZmNjQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%237CB342" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

        <h3 style="padding: 1rem 0rem;"><i>Stylized Spring 2023 calendar <u><a href="https://drive.google.com/file/d/1FnskRLtxNhJRzr50aAOf0GUh6-AtOlqK/view?usp=share_link" target="_blank">here</a></u><!--; stylized Winter 2023 booklet <u><a href="https://drive.google.com/file/d/1xW2ho_JBqHTe7wfKraEQDeJAVkMbihTx/view?usp=sharing" target="_blank">here</a></u>.--></i></h3>

        <h1>Series this quarter:</h1>

        <div class="series-list">

          <div class="series-tile reverse">
            <a href="/calendar/special-events"><img src="/images/2023spring/everything-everywhere-all-at-once-2022.jpg" alt="EEAAO still"></a>
            <div class="series-text">
              <a href="/calendar/special-events">
                <p class="title">Special Events</p>
              </a>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/wednesday"><img src="/images/2023spring/series_stills/johanna-darc-of-mongolia-1989.jpeg" alt="JOAN OF ARC OF MONGOLIA still"></a>
            <div class="series-text">
              <a href="/calendar/wednesday">
                <p class="day">Wednesday</p>
                <p class="title">Delphine Seyrig, More Than a Muse</p>
              </a>
              <p class="programmer">Programmed by: Hannah Yang</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/thursday-1"><img src="/images/2023spring/series_stills/amores-perros-2000.jpg" alt="AMORES PERROS still"></a>
            <div class="series-text">
              <a href="/calendar/thursday-1">
                <p class="day">Thursday I</p>
                <p class="title">The Three Amigos of Cinema</p>
              </a>
              <p class="programmer">Programmed by: Rocco Fantini</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/thursday-2"><img src="/images/2023spring/series_stills/naked-lunch-1991.jpg" alt="NAKED LUNCH still"></a>
            <div class="series-text">
              <a href="/calendar/thursday-2">
                <p class="day">Thursday II</p>
                <p class="title">Skin Under Skin: A Retrospective of David Cronenberg</p>
              </a>
              <p class="programmer">Programmed by: Isaiah Terry</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/friday"><img src="/images/2023spring/series_stills/2001-a-space-odyssey-1968.png" alt="2001 A SPACE ODYSSEY still"></a>
            <div class="series-text">
              <a href="/calendar/friday">
                <p class="day">Friday</p>
                <p class="title">Sight & Sound: The Greatest?</p>
              </a>
              <p class="programmer">Programmed by: Addison Wood</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/saturday"><img src="/images/2023spring/series_stills/tar-2022.jpeg" alt="TAR still"></a>
            <div class="series-text">
              <a href="/calendar/saturday">
                <p class="day">Saturday</p>
                <p class="title">Dóc: New Releases</p>
              </a>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/sunday"><img src="/images/2023spring/series_stills/la-pointe-courte-1955.jpeg" alt="LA POINTE COURTE still"></a>
            <div class="series-text">
              <a href="/calendar/sunday">
                <p class="day">Sunday</p>
                <p class="title">The Decisive Moment: Photographers Turned Filmmakers</p>
              </a>
              <p class="programmer">Programmed by: Ian Resnick</p>
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