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
                  <img class="carousel__image" src="/images/2023summer/carwash-1976.jpg" alt="Carwash (1976) still">
                </a>
                  <div class="description">
                    <a href="/calendar/silver-screen#carwash">
                      <p class="event-title fittext">
                      Car Wash (6/30 @ 7:00PM || 7/1 @ 4:00PM)
                      </p>
                    </a>
                    <p class="capsule fittext">Taking place on a single day of a happening Los Angeles car wash, Michael Schultz’s film is the perfect summer comedy encapsulating the zeitgeist of a rapidly changing American landscape. With an all-star lineup that includes Richard Pryor, Bill Duke, George Carlin, the Pointer Sisters, and Franklyn Ajaye, _Car Wash_ is a hilariously biting flick with an ineffable joie de vivre, and also a major milestone in ‘70s Black studio filmmaking.
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
          <h1>Upcoming Screenings: </h1>
          <h3><i>$5 tickets, theater opens 30 minutes before the screening.</i></h3> 
        </div>

        <div id="pacifiction" class="anchor screening">
          <h1>7:00PM Thursday, June 29rd</h1>
          <a href="/calendar/special-events#pacifiction">
            <img src="/images/2023summer/pacifiction-2022.jpeg" alt="Pacifiction (2022) still">
            <h2>Pacifiction (2022)</h2>
          </a>
          <h3>Albert Serra &middot; 162m &middot; DCP</h3>
          <p>This post-colonial fever dream of French Polynesia was voted best film of 2022 by Cahiers du Cinéma and "suggests John le Carré by way of David Lynch," per A.O. Scott. It's a slow-burning character study of High Commissioner De Roller (Benoît Magimel, The Piano Teacher), who floats through all walks of island life with an easy charisma. But the lush Tahitian setting pulses with a sense of dread that only grows as political alliances shift and unravel.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=87815B79-7B50-4FD8-A6E3-68D37D1B847E" target="_blank">here</a></u>.</b></p>
        </div>
        
        <div id="nashville" class="anchor screening">
          <a href="/calendar/programmers-picks#nashville">
            <img src="/images/2023summer/nashville-1975.jpg" alt="Nashville (1975) still">
            <h2>Nashville (1975)</h2>
          </a>
          <h3>Robert Altman &middot; 159m &middot; DCP</h3>
          <p>The damndest thing you ever saw. Widely regarded as one of Robert Altman’s best works, this all-American satirical epic spans religion, music, and politics. <i>Nashville</i> covers the five days leading up to a presidential candidate gala through the eyes of a massive, 24-person ensemble cast, including an up-and-coming Lily Tomlin, Altman regular Shelley Duvall, and country singers Barbara Jean and Connie White. Bursting at the seams with plot lines, characters, and musical numbers, this grand story captures the county music capital in all its glory, and is the perfect way to ring in this 4th of July weekend.</p>
          <p><b>June 30th &middot; 4:00PM &middot; <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=FDE9F1F3-7CFA-4D23-9851-B05DED1A9F98" target="_blank">tickets</a></u>.</b></p>
          <p><b>June 31st tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=572A111A-7201-4924-A133-DC42CBA70DAE" target="_blank">here</a></u>.</b></p>
        </div>

        <div id="carwash" class="anchor screening">
          <h1>7:00PM Friday, June 30th; 4:00PM Saturday, July 1st</h1>
          <a href="/calendar/silver-screen#carwash">
            <img src="/images/2023summer/carwash-1976.jpg" alt="Carwash (1976) still">
            <h2>Car Wash (1976)</h2>
          </a>
          <h3>Michael Schultz &middot; 97m &middot; 35mm</h3>
          <p>Taking place on a single day of a happening Los Angeles car wash, Michael Schultz’s film is the perfect summer comedy encapsulating the zeitgeist of a rapidly changing American landscape. With an all-star lineup that includes Richard Pryor, Bill Duke, George Carlin, the Pointer Sisters, and Franklyn Ajaye, <i>Car Wash</i> is a hilariously biting flick with an ineffable joie de vivre, and also a major milestone in ‘70s Black studio filmmaking.</p>
          <p><b>June 30th tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=8844C315-6CAC-412C-BFED-E28B63B8F2D9" target="_blank">here</a></u>.</b></p>
          <p><b>July 1st tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=7D7F31FE-6E57-4F8D-91B6-59AB90010A9F" target="_blank">here</a></u>.</b></p>
        </div>
        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>