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

        <iframe id='month-calendar' src="https://calendar.google.com/calendar/embed?src=c_fa39927f52bb048b3430d89de031cf8d6de4122ab05aa1da8c0fab0ea30681b1%40group.calendar.google.com&ctz=America%2FChicago" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        <iframe id='agenda-calendar'src="https://calendar.google.com/calendar/embed?src=c_fa39927f52bb048b3430d89de031cf8d6de4122ab05aa1da8c0fab0ea30681b1%40group.calendar.google.com&ctz=America%2FChicago" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

        <!--<h3 style="padding: 1rem 0rem;"><i>Stylized Fall 2023 calendar <u><a href="https://drive.google.com/file/d/1CzuClOQONkkR2ofjLKJhpHiDRpd5o7Du/view?usp=sharing" target="_blank">here</a></u>-->
        <br><br>

        <h1>Series this quarter:</h1>

        <div class="series-list">

          <div class="series-tile reverse">
            <a href="/calendar/Winter_2024/monday"><img src="/images/2024winter/hell-bent-for-leather-1960.jpg" alt="Hell Bent for Leather (1960) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/monday">
                <p class="day">Monday</p>
                <p class="title">A Brief Intro to George Sherman</p>
              </a>
              <p class="programmer">Programmed by: Hunter Koch</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/Winter_2024/tuesday"><img src="/images/2024winter/city-of-god-2002.png" alt="City of God (2002) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/tuesday">
                <p class="day">Tuesday</p>
                <p class="title">Antropofagia: Reinventing Class and Race in Brazilian Cinema</p>
              </a>
              <p class="programmer">Gabriel Correa</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/Winter_2024/wednesday"><img src="/images/2024winter/aguirre-the-wrath-of-god-1972.png" alt="Aguirre, the Wrath of God (1972) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/wednesday">
              <p class="day">Wednesday</p>  
              <p class="title">Conquistador of the Useless: The Films of Werner Herzog</p>
              </a>
              <p class="programmer">Programmed by: Cameron Poe</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/Winter_2024/thursday-1"><img src="/images/2024winter/possession-1981.png" alt="Possession (1981) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/thursday-1">
              <p class="day">Thursday I</p>  
              <p class="title">Mirroring</p>
              </a>
              <p class="programmer">Programmed by: Isaiah Terry</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/Winter_2024/thursday-2"><img src="/images/2024winter/party-girl-1995.png" alt="Party Girl (1995) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/thursday-2">
              <p class="day">Thursday II</p>  
              <p class="title">Computer Vision: Experiments in Digital Cinema</p>
              </a>
              <p class="programmer">Programmed by: Bret Hart</p>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/Winter_2024/friday"><img src="/images/2024winter/the-piano-teacher-2001.png" alt="The Piano Teacher (2001) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/friday">
              <p class="day">Friday</p>  
              <p class="title">Mommy Issues: Freudian Relationships in Film</p>
              </a>
              <p class="programmer">Programmed by: Stephanie Chung</p>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/Winter_2024/saturday-1"><img src="/images/2024winter/son-of-godzilla-1967.png" alt="Son of Godzilla (1967) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/saturday-1">
              <p class="day">Saturday I</p>  
              <p class="title">Dinosaurs Plus! on Film</p>
              </a>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/Winter_2024/saturday-2"><img src="/images/2024winter/asteroid-city-2023.webp" alt="Asteroid City (2023) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/saturday-2">
              <p class="day">Saturday II</p>  
              <p class="title">New Releases</p>
              </a>
            </div>
          </div>

          <div class="series-tile reverse">
            <a href="/calendar/Winter_2024/sunday-1"><img src="/images/2024winter/eternal-sunshine-of-the-spotless-mind-2004.jpeg" alt="Eternal Sunshine of the Spotless Mind (2004) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/sunday-1">
              <p class="day">Sunday I</p>  
              <p class="title">Special Events</p>
              </a>
            </div>
          </div>

          <div class="series-tile">
            <a href="/calendar/Winter_2024/sunday-2"><img src="/images/2024winter/all-that-jazz-1979.png" alt="All That Jazz (1979) still"></a>
            <div class="series-text">
              <a href="/calendar/Winter_2024/sunday-2">
              <p class="day">Sunday II</p>  
              <p class="title">Revising the Musical</p>
              </a>
              <p class="programmer">Programmed by: Honor Torrance and Cyrus Westerlund</p>
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