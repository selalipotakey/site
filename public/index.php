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
                <a href="/calendar/silver-screen#carwash">
                  <img class="carousel__image" src="/images/2023summer/welcome-to-la-1976.jpg" alt="Welcome to L.A. (1976) still">
                </a>
                  <div class="description">
                    <a href="/calendar/silver-screen#welcome-to-la">
                      <p class="event-title fittext">
                      Welcome to L.A. (7/14 @ 7:00PM || 7/15 @ 4:00PM)
                      </p>
                    </a>
                    <p class="capsule fittext">Want to get to know the city of one-night stands? Here’s your ticket. Keith Carradine, Sissy Spacek, and Harvey Keitel will take you on quite the tour of trysts, affairs, break-ups, and flings. Ostensibly a tale of the music world’s hollow core and a great excuse to look at absolutely miserable hot people, <i>Welcome to L.A.</i> is the cinematic embodiment of <i>summertime sadness</i> (I had to do it). A directorial debut for Alan Rudolph, the AD who cut his teeth on <i>The Long Goodbye</i> and <i>Nashville</i>, this one explodes with a wicked ensemble and a memorable score.
                    </p>
                  </div>
              </li>

              <li class="carousel__slide">
                <a href="/calendar/silver-screen#beyond-the-valley-of-the-dolls">
                  <img class="carousel__image" src="/images/2023summer/beyond-the-valley-of-the-dolls-1970.jpg" alt="Beyond the Valley of the Dolls (1970) still">
                </a>
                  <div class="description">
                    <a href="/calendar/silver-screen#beyond-the-valley-of-the-dolls">
                      <p class="event-title fittext">
                      Beyond the Valley of the Dolls (7/21 @ 7:00PM || 7/22 @ 4:00PM)
                      </p>
                    </a>
                    <p class="capsule fittext">We tried writing a description of this one… and failed miserably. Here’s some of the original promo material instead: “The First Of The Shock Rock! Russ Meyer promised to make the wildest, craziest, funniest, the farthest out Musical-Horror-Sex-Comedy ever released. He has succeeded.” “This is not a sequel– there has NEVER been anything like it!” “The world is full of them, the super-octane girls who are old at twenty… if they get to be twenty.” “This time… they’ve really gone <i>Beyond the Valley of the Dolls</i>.”
                    </p>
                  </div>
              </li>

              <li class="carousel__slide">
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

            </ul>
          </div>

          <button class="carousel__button carousel__button--right">
            <img src="/images/site/chevron_right.svg" alt="right carousel button">
          </button>

          <div class="carousel__nav">
            <button class="carousel__indicator current-slide"></button>
            <button class="carousel__indicator"></button>
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

        <div id="the-searchers" class="anchor screening">
          <h2>The Searchers (1956)</h2>
          <img src="/images/2023summer/the-searchers-1956.jpg" alt="The Searchers (1956) still">
          <h3>John Ford &middot; 119m &middot; 35mm</h3>
          <p>The beloved middle-child western sandwiched between the old-school and revisionists, The Searchers takes a decidedly complex look at one man’s delirious search for his abducted niece. Closer in spirit to Heart of Darkness than Gunsmoke, John Ford subtly questions the ideologies of the American west and its isolated inhabitants driven to humanity’s edge. With the mesmerizing imagery of Monument Valley as a backdrop for the likes of John Wayne and Natalie Wood, The Searchers serves as a touchstone for one of American cinema’s earliest reckonings with the racism of the American west(ern).</p>
          <p><b>Tickets: July 7th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=D6A9D413-22DB-4E48-AC52-8FD9A71B6C67" target="_blank">4:00PM</a></u>
                &middot; July 8th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=5099868A-972E-4D2D-AC72-013A80917499" target="_blank">7:00PM</a></u>
          </b></p>
        </div>
        
        <div id="a-star-is-born" class="anchor screening">
          <h2>A Star is Born (1976)</h2>
          <img src="/images/2023summer/a-star-is-born-1976.jpg" alt="A Star is Born (1976) still">
          <h3>Frank Pierson &middot; 139m &middot; DCP</h3>
          <p>Not the first nor the last time this story would be told, but the only version written by Joan Didion. Need we say more? Sure, why not. The 1976  <i>A Star Is Born</i> is the most recognizable adaptation of the classic story despite a generation accustomed to picturing Lady Gaga and Bradley Cooper in the starring roles. Barbara Streisand provides the tunes and Kris Kristofferson brings the raw '70s male sex appeal in the electric story of Esther and John: brought together by rock-and-roll, torn apart by alcohol and jealousy.</p>
          <p><b>Tickets: July 7th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=8487B4C1-76BC-4E7C-B926-227D5F3A07D3" target="_blank">7:00PM</a></u>
                &middot; July 8th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=2C2D693D-0E94-4AD3-ADA6-E00F5A229415" target="_blank">4:00PM</a></u>
          </b></p>
        </div>
        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>