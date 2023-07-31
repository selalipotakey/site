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
            <!--<button class="carousel__indicator"></button>,,,-->
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

        <div id="clash-of-the-wolves" class="anchor screening">
          <a href="/calendar/programmers-picks#clash-of-the-wolves">  
          <h2>Clash of the Wolves (1925)</h2>
          <img src="/images/2023summer/clash-of-the-wolves-1925.jpg" alt="Clash of the Wolves (1925) still">
          </a>
          <h3>Noel M. Smith &middot; 74m &middot; 35mm</h3>
          <p><i>Preserved by the Library of Congress.</i></p>
          <p>No better way to spend the dog days of summer! Shot on location in what would later become Joshua Tree National Park, <i>THE CLASH OF THE WOLVES</i> tells the story of halfbreed alpha wolf Lobo and borax prospector Dave Weston, who become best friends and butt heads with William “Borax” Horton, the scheming local chemist looking to nab Dave’s newest borax claim. Starring beloved canine star Rin Tin Tin (he does his own stunts!) in his first comedic role, <i>THE CLASH OF THE WOLVES<i> is the silent era predecessor for modern stories of man’s best friend.</p>
          <p><b>Tickets: August 4th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=42939F3B-150A-434C-B1DB-68EF1AD246DF" target="_blank">4:00PM</a></u>
                &middot; August 5th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=4F4F6223-07E8-42DF-B1BD-3645C2B48C4C" target="_blank">7:00PM</a></u>
          </b></p>
        </div>
        
        <div id="point-blank" class="anchor screening">
          <a href="/calendar/silver-screen#point-blank">
          <h2>Point Blank (1976)</h2>
          <img src="/images/2023summer/point-blank-1976.jpg" alt="Point Blank (1976) still">
          </a>
          <h3>John Boorman &middot; 92m &middot; DCP</h3>
          <p>Betrayed by the man he thought he knew best, Walker (Lee Marvin) returns to L.A. seeking revenge only to be caught up in an endless hunt for his ex-partner, Reese (John Vernon). Equal parts American genre film and European arthouse, <i>Point Blank</i> contains the nihilism of a man who has lost himself in the face of constant double-crossing and is plagued by the remnants of the Second World War. With stellar photography by Philip Lathrop, John Boorman’s major breakthrough is today an enshrined classic that helped to usher in the new age of hard-boiled American crime cinema.</p>
          <p><b>Tickets: August 4th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=22666EE9-8AC2-4156-9B4E-48BE8626BC4C" target="_blank">7:00PM</a></u>
                &middot; August 5th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=EFE529CF-49A4-4B33-BF53-9A673ED0AE58" target="_blank">4:00PM</a></u>
          </b></p>
        </div>
        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>