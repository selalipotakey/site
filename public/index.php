<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/style.css?ver=1.1">
  </head>

  <body>
    
    <?php include "./includes/header.html" ?>
  
    <main>

      <?php include "./includes/dropdown.html" ?>
      
      <div class="information">
        <h1>
          Happening this quarter:
        </h1>

        <div class="carousel">

          <button class="carousel__button carousel__button--left is-hidden">
            <img src="/images/site/chevron_left.svg" alt="left carousel button">
          </button>

          <div class="carousel__track-container">
            <ul class="carousel__track">

              <li class="carousel__slide current-slide">
                <a href="/tsai/">
                  <img class="carousel__image" src="/images/2022fall/light-2018.png" alt="">
                </a>
                <div class="description">
                  <a href="/tsai/">
                    <p class="event-title fittext">
                    Friday 10/1 @ 6:00PM: LIGHT (光), YOUR FACE (你的臉) and Q+A with director Tsai Ming-Liang!
                    </p>
                  </a>
                    <p class="capsule fittext"><i>Light</i> captures changes in the natural light streaming through Taipei’s Zhongshan Hall, where Japanese forces in Taiwan surrendered at the end of WWII, and where Tsai volunteered, won a film award, ran a café, held screenings of classic films, and shot his feature-length film <i>Your Face</i>. <i>Your Face</i> is composed of thirteen portraits of citizens of Taipei, including actor Lee Kang-Sheng, and explores the depth of lit faces, and the stories they convey.</p>
                </div>
              </li>
              
              <li class="carousel__slide">
                <a href="/90th">
                  <img class="carousel__image" src="/images/2022fall/funeral-parade-of-roses-1969.jpeg" alt="FUNERAL PARADE OF ROSES still">
                </a>
                  <div class="description">
                    <a href="/90th">
                      <p class="event-title fittext">
                      Friday 10/21 - Sunday 10/23: Celebrating 90 Years of Doc
                      </p>
                    </a>
                    <p class="capsule fittext">Rockefeller Chapel celebrates the 100th anniversary of <i>Nosferatu</i>, welcoming back celebrated organist Dennis James to provide the silent film score. Come experience this cinematic classic, in which mysterious Count Orlok summons Thomas Hutter to his remote Transylvanian castle in the mountains. After Orlok reveals his vampiric nature, Hutter struggles to escape the castle. Join us inside one of UChicago's most iconic spaces to see how the story ends… </p>
                  </div>
              </li>

              <li class="carousel__slide">
                <a href="/calendar/special-events#nosferatu">
                  <img class="carousel__image" src="/images/2022fall/nosferatu-1922.jpg" alt="nosferatu still">
                </a>
                  <div class="description">
                    <a href="/calendar/special-events#nosferatu">
                      <p class="event-title fittext">
                      Sunday 10/30 @ 7:00PM: Nosferatu at 100, in Rockefeller Chapel!
                      </p>
                    </a>
                    <p class="capsule fittext">Rockefeller Chapel celebrates the 100th anniversary of <i>Nosferatu</i>, welcoming back celebrated organist Dennis James to provide the silent film score. Come experience this cinematic classic, in which mysterious Count Orlok summons Thomas Hutter to his remote Transylvanian castle in the mountains. After Orlok reveals his vampiric nature, Hutter struggles to escape the castle. Join us inside one of UChicago's most iconic spaces to see how the story ends… </p>
                  </div>
              </li>

              <!-- <li class="carousel__slide">
                <a href="#">
                  <img class="carousel__image" src="/images/2022fall/nosferatu-1922.jpg" alt="nosferatu still">
                </a>
                  <div class="description">
                    <a href="#">
                      <p class="event-title fittext">
                      Buy your quarter pass now!
                      </p>
                    </a>
                    <p class="capsule fittext">Quarter passes get you into all 80+ screenings per quarter FREE! Plus, you get a cool new card for your wallet. Click the picture to purchase online, or wait till your next screening and purchase at our theater. Note: we cannot provide <u><a href="/visit#tickets">our pass discounts</a></u> on our online purchases.</p>
                  </div>
              </li> -->

            </ul>
          </div>

          <button class="carousel__button carousel__button--right">
            <img src="/images/site/chevron_right.svg" alt="right carousel button">
          </button>

          <div class="carousel__nav">
            <button class="carousel__indicator current-slide"></button>
            <button class="carousel__indicator"></button>
            <button class="carousel__indicator"></button>
            <!-- <button class="carousel__indicator"></button> -->
          </div>
          
        </div>

        <br><br><br><br><br><br>

      </div>

      <div class="screenings-list">

        <div class="text-section">
          <h1>Playing this week:</h1>
          <h3><i>$7 tickets, theater opens 30 minutes before the screening.</i></h3>
        </div>

        <div class="screening">
          <h1>6:30PM Sunday, September 25th</h1>
          <img src="/images/2022fall/jurassic-park-1993.jpeg" alt="Jurassic Park still">
          <h2>Doc Films & Night Owls Presents: Jurassic Park (1993)</h2>
          <h3>Steven Spielberg &middot; 127m &middot; DCP</h3>
          <p>Despite being set on a fictional island, <i>Jurassic Park</i> is anything but a tranquil beach vacation. Steven Spielberg transports us to an amusement park of prehistoric dinosaurs restored from extinction by a wealthy entrepreneur. But the paleontological pet project is doomed from the start; even before the grand opening, security systems fail, setting the dinosaurs loose and forcing those touring the park to run—and hide—for their lives.</p>
          <p>With post-film discussion hosted by Professors Dan Morgan & Agnes Callard.</p>
          <p><i>Note: all patrons that show a UChicagoID (UCID) get in for free!</i></p>
        </div>

        <div class="screening">
          <h1>7:00PM Tuesday, September 27th</h1>
          <img src="/images/2022fall/black-coal-thin-ice-2014.jpg" alt="Black Coal, Thin Ice still">
          <h2>Black Coal, Thin Ice (2014)</h2>
          <h3>Diao Yinan &middot; 110m &middot; Digital</h3>
          <p>Stomach-turning, erotic, isolating, and comic, all in equal measure. <i>Black Coal, Thin Ice</i> centers Zhang, a drunken former police officer, trapped in a game of cat-and-mouse after attempting to hunt down a serial killer who has dismembered and scattered bodies across Heilongjiang’s industrial landscape. What results is a masterful whodunit that melds neo-noir genre fare with biting social commentary. NOTE: Uncensored, international version.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=D8138BBA-0699-4ECA-A2DA-A74576AE0D2C" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Wednesday, September 28th</h1>
          <img src="/images/2022fall/police-story-1985.jpeg" alt="Police Story still">
          <h2>Police Story (1985)</h2>
          <h3>Jackie Chan &middot; 100m &middot; DCP</h3>
          <p>Featuring Maggie Cheung in one of her earliest roles as his put-upon girlfriend, Jackie Chan’s <i>Police Story </i>is widely considered one of the greatest action movies ever made. Chan himself plays super-cop Ka-kui, who must protect star witness Salina Fong (Brigitte Lin) before she testifies against the drug cartel she works for. With reams of broken glass and death-defying stunts galore, this is one of the purest slices of entertainment ever put to film.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=B8A75D91-2745-4CE9-9A93-406E763F39AA" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Thursday, September 29th</h1>
          <img src="/images/2022fall/10-things-i-hate-about-you-1999.jpg" alt="10 Things I Hate About You still">
          <h2>10 Things I Hate About You (1999)</h2>
          <h3>Gil Junger &middot; 97m &middot; DCP</h3>
          <p>Julia Stiles and Heath Ledger co-star as the icy Kat Stratford and impish bad-boy Patrick Verona in this charming teen rom-com set in a '90s Seattle high school, based on "The Taming of the Shrew." New student Cameron (Joseph Gordon-Levitt) falls for Kat’s younger sister Bianca (Larisa Oleynik), but her protective father forbids Bianca from dating until her anti-social older sister does. Accordingly, Cameron hires Patrick to seduce Kat.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=37B1DAAB-F73A-4A27-9ED7-9771A68B4510" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>9:30PM Thursday, September 29th</h1>
          <img src="/images/2022fall/the-adventures-of-prince-achmed-1926.jpg" alt="The Adventures of Prince Achmed still">
          <h2>The Adventures of Prince Achmed (1926)</h2>
          <h3>Lotte Reiniger &middot; 65m &middot; 35mm</h3>
          <p>Considered by many to be the oldest surviving animated film in the world, <i>The Adventures of Prince Achmed</i> is a masterful work of cutout, silhouette animation by German director Lotte Reiniger. Drawing from Hanna Diyab's contributions to the "Arabian Nights," the film focuses on the many adventures of its titular character, who embarks on a demon-slaying, princess-wooing escapade after a wicked sorcerer tricks him into riding a magical, flying horse.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=CEB2435B-B355-44D8-9720-7EF1A7CBADE4" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Friday, September 30th</h1>
          <img src="/images/2022fall/perfect-blue-1997.png" alt="Perfect Blue still">
          <h2>Perfect Blue (1997)</h2>
          <h3>Satoshi Kon &middot; 81m &middot; DCP</h3>
          <p>She’s the real thing! Mima’s about ready to give up her idol career; she’s spent too long being the good girl, and acting’s her way out. But Mima quickly realizes she’s got more than she ever asked for. Satoshi Kon’s brain-melting anime thriller is a film wholly of its own, a brutally violent fever dream of stalkers, psychosis, serial murders, and dissociation. Nevertheless, we’re sure Mima will figure it out. Question is: Who’s the real Mima?</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=9866C09F-DD73-41B2-943D-F7BA7E4412E5" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>6:00PM Saturday, October 1st</h1>
          <img src="/images/2022fall/your-face-2018.jpg" alt="Your Face still">
          <a href="../tsai"><h2>Chicago Premiere: Light (光) and Your Face (你的臉) with Director Q&A</h2></a>
          <h3>Tsai Ming-Liang &middot; 94min &middot; DCP</h3>
          <p>For more information about this event, please visit our dedicated <a href="../tsai"><u>Tsai 2022 event page!</u></a></p>
        </div>

        <div class="screening">
          <h1>5:00PM Sunday, October 2nd</h1>
          <img src="/images/2022fall/the-nun-1966.jpg" alt="THE NUN still">
          <h2>The Nun (1966)</h2>
          <h3>Jacques Rivette &middot; 140m &middot; DCP</h3>
          <p>Rivette’s second feature is an incendiary feminist masterpiece banned in France and condemned by the Catholic Church. It tells the story of a young woman (a radiant Anna Karina) forced to enter a convent. She fights for her freedom, but finds tyranny and brutality at every turn. The intensity and formal rigor of Rivette’s technique and the striking contemporary score make <i>The Nun</i> one of the most exhilarating and essential films of the French New Wave.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=66D6651B-3914-445C-B09E-A82A44A8D844" target="_blank">here</a></u>.</b></p>
        </div>

      </div>

        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>