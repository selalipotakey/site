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

        <div id="the-maltese-falcon" class="anchor screening">
          <h2>The Maltese Falcon (1941)</h2>
          <img src="/images/2023summer/the-maltese-falcon-1941.jpg" alt="The Maltese Falcon (1941) still">
          <h3>John Huston &middot; 100m &middot; DCP</h3>
          <p><i>The Maltese Falcon</i> follows private detective Sam Spade (Humphrey Bogart) as his search for the Maltese Falcon statuette entangles him in a web of deceit and murder. With a stellar cast including Mary Astor, Peter Lorre, and Sydney Greenstreet, the film is filled to the brim with twists, double-crosses, and moral ambiguity. Written and directed by John Huston, this film noir classic will provide the perfect escape from the summer heat with its chilling atmospheric cinematography and sharp dialogue. </p>
          <p><b>Tickets: July 14th 4:00PM (Coming Soon)
                &middot; July 15th 7:00PM (Coming Soon)
          </b></p>
        </div>
        
        <div id="welcome-to-la" class="anchor screening">
          <h2>Welcome to L.A. (1976)</h2>
          <img src="/images/2023summer/welcome-to-la-1976.jpg" alt="Welcome to L.A. (1976) still">
          <h3>Alan Rudolph &middot; 106m &middot; DCP</h3>
          <p>Want to get to know the city of one-night stands? Here’s your ticket. Keith Carradine, Sissy Spacek, and Harvey Keitel will take you on quite the tour of trysts, affairs, break-ups, and flings. Ostensibly a tale of the music world’s hollow core and a great excuse to look at absolutely miserable hot people, <i>Welcome to L.A.</i> is the cinematic embodiment of <i>summertime sadness</i> (I had to do it). A directorial debut for Alan Rudolph, the AD who cut his teeth on <i>The Long Goodbye</i> and <i>Nashville</i>, this one explodes with a wicked ensemble and a memorable score.</p>
          <p><b>Tickets: July 14th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=03E9A5AC-12E9-42DB-96AB-E1B77B35A7B8" target="_blank">7:00PM</a></u>
                &middot; July 15th <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=E7FA8C23-49B7-4B25-961C-7DE98BF6668A" target="_blank">4:00PM</a></u>
          </b></p>
        </div>
        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>