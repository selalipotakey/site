<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/style.css?ver=1.2">
  </head>

  <body>
    
    <?php $version='1.2'; include "./includes/header.html";?>
  
    <main>

      <?php $version='1.2'; include "./includes/dropdown.html";?>
      
      <div class="information">

      <h1>
          Playing this quarter:
        </h1>

        <div class="carousel">

          <button class="carousel__button carousel__button--left is-hidden">
            <img src="/images/site/chevron_left.svg" alt="left carousel button">
          </button>

          <div class="carousel__track-container">
            <ul class="carousel__track">

              <li class="carousel__slide current-slide">
                <a href="/calendar/silver-screen#point-blank">
                  <img class="carousel__image" src="/images/2023summer/point-blank-1976.jpg" alt="Point Blank (1976) still">
                </a>
                <div clas="description">
                  <a href="/calendar/silver-screen#point-blank">
                    <p class="event-title fittext">
                      Point Blank (Fri. 8/4 @ 7:00PM || Sun. 8/5 @ 4:00PM)
                    </p>
                  </a>
                  <p class="capsule fittext">Betrayed by the man he thought he knew best, Walker (Lee Marvin) returns to L.A. seeking revenge only to be caught up in an endless hunt for his ex-partner, Reese (John Vernon). Equal parts American genre film and European arthouse, <i>Point Blank</i> contains the nihilism of a man who has lost himself in the face of constant double-crossing and is plagued by the remnants of the Second World War. With stellar photography by Philip Lathrop, John Boorman’s major breakthrough is today an enshrined classic that helped to usher in the new age of hard-boiled American crime cinema.
                  </p>
                </div>
              </li>

              <li class="carousel__slide">
                <a href="/calendar/silver-screen#once-upon-a-time-in-hollywood">
                  <img class="carousel__image" src="/images/2023summer/once-upon-a-time-in-hollywood-2019.jpg" alt="Once Upon a Time in Hollywod (2019) still">
                </a>
                <div clas="description">
                  <a href="/calendar/silver-screen#once-upon-a-time-in-hollywood">
                    <p class="event-title fittext">
                      Once Upon a Time in Hollywood (Fri. 8/11 @ 7:00PM || Sun. 8/12 @ 4:00PM)
                    </p>
                  </a>
                  <p class="capsule fittext">Betrayed by the man he thought he knew best, Walker (Lee Marvin) returns to L.A. seeking revenge only to be caught up in an endless hunt for his ex-partner, Reese (John Vernon). Equal parts American genre film and European arthouse, <i>Point Blank</i> contains the nihilism of a man who has lost himself in the face of constant double-crossing and is plagued by the remnants of the Second World War. With stellar photography by Philip Lathrop, John Boorman’s major breakthrough is today an enshrined classic that helped to usher in the new age of hard-boiled American crime cinema.
                  </p>
                </div>
              </li>

            </ul>
          </div>

          <button class="carousel__button carousel__button--right">
            <img src="/images/site/chevron_right.svg" alt="right carousel button">
          </button>

          <div class="carousel__nav">
            <button class="carousel__indicator current-slide"></button>
            <!--<button class="carousel__indicator"></button>-->
            <button class="carousel__indicator"></button>
          </div>
          
        </div>

        <br><br><br><br><br>

      </div>

      <div class="screenings-list">

        <div class="text-section">
          <h1>This Week: </h1>
          <h3><i>$5 tickets, theater opens 30 minutes before the screening.</i></h3> 
        </div>

        <div id="the-flaming-forest" class="anchor screening">
          <a href="/calendar/programmers-picks#the-flaming-forest">
          <h2>The Flaming Forest (1926)</h2>
          <img src="/images/2023summer/the-flaming-forest-1926.jpg" alt="The Flaming Forest (1926) still">
          </a>
          <h3>Reginald Barker &middot; 70m &middot; 35mm</h3>
          <p><i>Preserved by the Library of Congress.</i></p>
          <p><b>Tickets: July 28th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=6BAAEE27-3BBC-42EC-A890-45BE3E939C55" target="_blank">4:00PM</a></u>
                &middot; July 29th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=E5DB43D8-3E87-486A-996A-4C6C1A90FFA6" target="_blank">7:00PM</a></u>
          </b></p>
        </div>
        
        <div id="play-it-as-it-lays" class="anchor screening">
          <a href="/calendar/silver-screen#play-it-as-it-lays">  
          <h2>Play It As It Lays (1972)</h2>
          <img src="/images/2023summer/play-it-as-it-lays-1972.jpg" alt="Play It As It Lays (1972) still">
          </a>
          <h3>Frank Perry &middot; 99m &middot; 35mm</h3>
          <p>Here at Doc, we've got Didion fever! Rarely screened publicly, <i>Play It as It Lays</i> captures the sun-drenched burnout of the classic 1970 novel of the same name. Maria, a restless actress brilliantly played by Tuesday Weld, finds herself in a loveless marriage and near constant mental turmoil as she travels back and forth between L.A. and Vegas. Expressing a distinct Didion brand of nihilism, Frank Perry’s <i>Play It as It Lays</i> is perhaps the only big screen adaptation to do the late writer's work justice.</p>
          <p><b>Tickets: July 28th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=52C5E3BC-6C0A-4B88-8E20-BE8CE1DEAFA9" target="_blank">7:00PM</a></u>
                &middot; July 29th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=C6C4F24A-84AF-4D30-8896-28F4CDED38CC" target="_blank">4:00PM</a></u>
          </b></p>
        </div>
        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>