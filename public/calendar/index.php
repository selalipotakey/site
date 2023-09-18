<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendar</title>
    <link rel="stylesheet" type="text/css" href="/style.css?ver=1.2">
  </head>

  <body>
    
    <?php $version='1.2'; include "../includes/header.html";?>
  
    <main>

      <?php $version='1.2'; include "../includes/dropdown.html";?>

      <div class="information">

        <h1>Now playing:</h1>

        <!-- this is from when cameron (2022) was trying to make a completley locally hosted google calendar by copy-pasting google's code, does not work (yet) -->
        <!-- <iframe src="/calendar/custom_calendar.php?ver=2.0" style="border: 0; padding-bottom: 0rem;" frameborder="0" scrolling="no"></iframe> -->

        <iframe id='month-calendar'src="https://calendar.google.com/calendar/embed?src=c_4fc3c45e628e887f98469415227560c128c1bb24156da8dadec5ea688afa0997%40group.calendar.google.com&ctz=America%2FChicago" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        <iframe id='agenda-calendar'src="https://calendar.google.com/calendar/embed?src=c_4fc3c45e628e887f98469415227560c128c1bb24156da8dadec5ea688afa0997%40group.calendar.google.com&ctz=America%2FChicago" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

        <!--<h3 style="padding: 1rem 0rem;"><i>Stylized Fall 2023 calendar <u><a href="https://drive.google.com/file/d/1CzuClOQONkkR2ofjLKJhpHiDRpd5o7Du/view?usp=sharing" target="_blank">here</a></u>-->

        <h1>Series this quarter:</h1>

        <div class="series-list">

          <div class="series-tile reverse">
            <a href="/calendar/Fall_2023/monday"><img src="/images/2023fall/m-1931.jpg" alt="M (1931) still"></a>
            <div class="series-text">
              <a href="/calendar/Fall_2023/monday">
                <p class="day">Monday</p>
                <p class="title">Proto-noir: The Roots of the Film Noir Movement</p>
              </a>
              <p class="programmer">Programmed by: Kathleen Geier</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/Fall_2023/tuesday"><img src="/images/2023fall/the-searchers-1956.jpg" alt="The Searchers (1956) still"></a>
            <div class="series-text">
              <a href="/calendar/programmers-picks">
                <p class="day">Tuesday</p>
                <p class="title">False Preachers</p>
              </a>
              <p class="programmer">Programmed by: Hannah Ozmun</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/Fall_2023/wednesday"><img src="/images/2023fall/pacifiction-2022.jpeg" alt="Pacifiction (2022) still"></a>
            <div class="series-text">
              <a href="/calendar/special-events">
              <p class="day">Wednesday</p>  
              <p class="title">The Films of Ang Lee</p>
              </a>
              <p class="programmer">Programmed by: Wei Lu</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/Fall_2023/thursday-1"><img src="/images/2023fall/the-searchers-1956.jpg" alt="The Searchers (1956) still"></a>
            <div class="series-text">
              <a href="/calendar/programmers-picks">
              <p class="day">Thursday I</p>  
              <p class="title">In the Club: 90s Electronic Music and Beyond</p>
              </a>
              <p class="programmer">Programmed by: Addison Wood</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/Fall_2023/thursday-2"><img src="/images/2023fall/pacifiction-2022.jpeg" alt="Pacifiction (2022) still"></a>
            <div class="series-text">
              <a href="/calendar/special-events">
              <p class="day">Thursday II</p>  
              <p class="title">Depths of the Grindhouse</p>
              </a>
              <p class="programmer">Programmed by: Max Newman and Brian McKendry</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/Fall_2023/friday"><img src="/images/2023fall/the-searchers-1956.jpg" alt="The Searchers (1956) still"></a>
            <div class="series-text">
              <a href="/calendar/programmers-picks">
              <p class="day">Friday</p>  
              <p class="title">Amour Four</p>
              </a>
              <p class="programmer">Programmed by: Cyrus Westerlund</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/Fall_2023/saturday"><img src="/images/2023fall/pacifiction-2022.jpeg" alt="Pacifiction (2022) still"></a>
            <div class="series-text">
              <a href="/calendar/special-events">
              <p class="day">Saturday</p>  
              <p class="title">New Releases & Miscellaneous Screenings</p>
              </a>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/Fall_2023/sunday"><img src="/images/2023fall/the-searchers-1956.jpg" alt="The Searchers (1956) still"></a>
            <div class="series-text">
              <a href="/calendar/programmers-picks">
              <p class="day">Sunday</p>  
              <p class="title">Open Veins: Postcolonial Cinema of the Luso-Hispanic World</p>
              </a>
              <p class="programmer">Programmed by: Addison Wood</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/Fall_2023/special-events"><img src="/images/2023fall/pacifiction-2022.jpeg" alt="Pacifiction (2022) still"></a>
            <div class="series-text">
              <a href="/calendar/special-events">
              <p class="title">SPECIAL EVENTS</p>
              </a>
            </div>
          </div>

<!--

          <div class="series-tile reverse">
            <a href="/calendar/thursday-1"><img src="/images/2023spring/series_stills/amores-perros-2000.jpg" alt="AMORES PERROS still"></a>
            <div class="series-text">
              <a href="/calendar/thursday-1">
                <p class="day">Thursday I</p>
                <p class="title">The Three Amigos of Cinema</p>
              </a>
              <p class="programmer">Programmed by: </p>
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
-->

        </div>

      </div>
 
    </main>
    
    <?php include "../includes/footer.html" ?>
    <script src="/js/resize-menu.js"></script>
    <script src="/js/calendar-resize.js"></script>

  </body>
</html>