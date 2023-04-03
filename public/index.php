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
                <a href="/calendar/thursday-2#the-fly">
                  <img class="carousel__image" src="/images/2023spring/the-fly-1986.jpg" alt="The Fly (1986) still">
                </a>
                <div clas="description">
                  <a href="/calendar/thursday-2#the-fly">
                    <p class="event-title fittext">
                      The Fly (Thurs. 4/20 @ 9:30PM)
                    </p>
                  </a>
                  <p class="capsule fittext">Cronenberg's <i>The Fly</i> takes the question “would you still love me if I were a worm?” a bit too literally. This 1986 film follows the hubristic Dr. Seth Brundle (Jeff Goldblum). However, when something goes horribly wrong with his newest and greatest invention, he very quickly finds that such an idea is not just mere absurdity, but blasphemy too. This grotesque and iconic adaptation of the 1958 original is a masterpiece—in all its gooey pus-filled glory.
                  </p>
                </div>
              </li>

              <li class="carousel__slide">
                <a href="/calendar/special-events#pacific-rim">
                  <img class="carousel__image" src="/images/2023spring/pacific-rim-2013.jpg" alt="PACIFIC RIM still">
                </a>
                  <div class="description">
                    <a href="/calendar/special-events#pacific-rim">
                      <p class="event-title fittext">
                      PACIFIC RIM in 3D!!! (Thurs. 4/27 @ 7:30PM in Logan 201)
                      </p>
                    </a>
                    <p class="capsule fittext">With impressive special effects and thrilling action sequences, Pacific Rim is an entertaining and visually stunning blockbuster that delivers on its core premise: giant robots fighting giant monsters.
                    </p>
                  </div>
              </li>

              <li class="carousel__slide">
                <a href="/calendar/thursday-1#y-tu-mama-tambien">
                  <img class="carousel__image" src="/images/2023spring/y-tu-mama-tambien-2001.jpeg" alt="quarter pass">
                </a>
                  <div class="description">
                    <a href="/calendar/thursday-1#y-tu-mama-tambien">
                      <p class="event-title fittext">
                      Y tu mamá también (Thurs. 5/11 @ 7:00PM)
                      </p>
                    </a>
                    <p class="capsule fittext">Tenoch and Julio attempt to seduce an older Spanish woman by embarking on a road trip to a mythical and totally non-existent beach: the “Boca del Cielo.” Set against a backdrop of political upheaval and social change, Cuarón’s film explores sexuality, manhood, and youth in a way that has forever changed Mexican cinema.</p>
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
          <h1>Screening this week:</h1>
          <h3><i>$7 tickets, theater opens 30 minutes before the screening.</i></h3>
        </div>

        <div class="screening">
          <h1>7:00PM Monday, April 3rd</h1>
          <img src="/images/2023spring/pride-and-prejudice-2005.png" alt="Pride and Prejudice (2005) still">
          <h2>Pride and Prejudice (2005)</h2>
          <h3>Joe Wright &middot; 127m &middot; DCP</h3>
          <p>It is a truth universally acknowledged that a Doc Films theatergoer in possession of a quarter pass must be in want of a dreamy period romance. An adaptation of a beloved classic, <i>Pride and Prejudice</i> follows headstrong Elizabeth Bennet as she becomes acquainted with Mr. Darcy, a wealthy, dour bachelor. Amidst encounters with impossible sisters, bumbling clergymen, and rakish strangers, Elizabeth comes to find that first impressions can be misleading.</p>
          <p><i>Event sponsored by the English Department, in honor of Emily Cheng’s BA Thesis on re-reading and the feminine gaze in both Austen's and Wright's </i>Pride and Prejudice<i>.</i></p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=2031A7FE-8464-4688-B9DB-EC23F083DBD0" target="_blank">here</a></u>.</b></p>
        </div>
        
        <div class="screening">
          <h1>7:00PM Wednesday, April 5th</h1>
          <img src="/images/2023spring/muriel-or-the-time-of-return-1963.jpg" alt="Muriel, or the Time of Return (1963) still">
          <h2>Muriel, or the Time of Return (1963)</h2>
          <h3>Alain Resnais &middot; 116m &middot; DCP</h3>
          <p>Resnais exchanges Seyrig’s dreamy character in <i>Marienbad</i> for Hélenè, an agitated widow who lives in an antique shop with her stepson Bernard. He is deeply haunted by his time in the Algerian war, just as Hélenè is haunted by an ex-lover’s visit. Characters are trapped in their own histories as they confuse memories or obsess over them. Do they realize the futility of their perpetual forgetting and remembering? Perhaps, but they persist, or cannot escape.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=BEA9FEF5-E107-4CCD-9CE0-404277F574C4" target="_blank">here</a></u>.</b></p>
        </div>

        <div id="pans-labyrinth" class="anchor screening">
          <h1>7:00PM Thursday, April 6th; 4:00PM Sunday, April 16th</h1>
          <img src="/images/2023spring/pans-labyrinth-2006.jpg" alt="Pan's Labyrinth (2006) still">
          <h2>Pan's Labyrinth (2006)</h2>
          <h3>Guillermo del Toro &middot; 119m &middot; 35mm</h3>
          <p><i>Pan’s Labyrinth</i> may very well be the film that truly put Guillermo del Toro on the map. While living In the countryside of Franco's Spain with her mother and dictatorial stepfather, 10-year-old Ofelia encounters an abandoned labyrinth, home to a mysterious faun who lays out a gauntlet of three trials Ofelia must complete to fulfill her only wish: to return to her real father. Destiny, fate, and mortality make strange bedfellows in this fantastical tale.</p>
          <p><i>Screening subsidized for members of the organization of Latin American Students (OLAS) in conjunction with its cultural show. However, all are welcome!</i></p>
          <p><b>April 6th tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=398748C3-5E7C-4FBD-9A24-36D9AFFE0128" target="_blank">here</a></u>.</b></p>
          <p><b>April 16th tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=A13CF48F-3A03-46ED-9806-2C21529A84EB" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>9:30PM Thursday, April 6th</h1>
          <img src="/images/2023spring/crimes-of-the-future-2022.jpeg" alt="Crimes of the Future (2022) still">
          <h2>Crimes of the Future (2022)</h2>
          <h3>David Cronenberg &middot; 107m &middot; DCP</h3>
          <p>The second film by Cronenberg to be titled <i>Crimes of the Future</i> makes this a kind of return to form. This is a cold, delirious, and orgasmic journey into the future of human evolution that seeks to ask who can and should control the physicality of human expression. "Body is Reality"—so said Cronenberg during the film's premiere at Cannes. And so control over one's flesh, and the extremes of that control, are at the very heart of the film.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=721DC3C0-BB86-46B1-9D7D-15FE731E0BED" target="_blank">here</a></u>.</b></p>
        </div>

        <div id="singin-in-the-rain" class="anchor screening">
          <h1>7:00PM Friday, April 7th; 4:00PM Sunday, April 9th</h1>
          <img src="/images/2023spring/singin-in-the-rain-1952.jpg" alt="Singin' in the Rain (1952) still">
          <h2>Singin' in the Rain (1952)</h2>
          <h3>Gene Kelly and Stanley Donen &middot; 115m &middot; 35mm</h3>
          <p>If you didn’t know any better, you might think this film was 115 minutes of Gene Kelly doing nothing but, well, singing in the rain. After all, that is by and large the only image that people use nowadays to reference the damn thing. But <i>Singin’ in the Rain</i> has more to offer than that—a lot more. It’s a bombastic whirlwind: gaudy, colorful, loud, and ever so entertaining in all the right ways. All you <i>La La Land</i> fiends had better show up to this one...</p>
          <p><b>April 7th tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=4B3A0778-1C33-4E7D-A502-6817EF0C319F" target="_blank">here</a></u>.</b></p>
          <p><b>April 9th tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=06AB5611-72C8-47AE-B92A-4F2AE4910D44" target="_blank">here</a></u>.</b></p>
        </div>

        <div id="tar" class="anchor screening">
          <h1>4:00PM Saturday, April 8th; 8:00PM Saturday, April 8th</h1>
          <img src="/images/2023spring/tar-2022.jpeg" alt="Tár (2022) still">
          <h2>Tár (2022)</h2>
          <h3>Todd Field &middot; 158m &middot; DCP</h3>
          <p>Lydia Tár has it all—fast cars, a hot wife, and acclaim as the first female chief conductor of the Berlin Philharmonic. She stands in front of her orchestra to give the downbeat to Mahler's Fifth, but a young cellist catches her eye. Shadows and sounds linger in her periphery... genius turned arrogance, past deeds, paranoia, and the rumblings of an orchestrated downfall. Can Tár face her orchestra and her ghosts? Can she obliterate herself for her music?</p>
          <p><b>4:00PM tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=8642B635-A847-4CDF-921B-FE3051AABDBB" target="_blank">here</a></u>.</b></p>
          <p><b>8:00PM tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=D874FB78-DE0B-454C-97CA-CCE5F0799408" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Sunday, April 9th</h1>
          <img src="/images/2023spring/la-pointe-courte-1955.jpeg" alt="La Pointe Courte (1955) still">
          <h2>La Pointe Courte (1955)</h2>
          <h3>Agnès Varda &middot; 80m &middot; DCP</h3>
          <p>A professional photographer before becoming a filmmaker, Varda cited a fluid relationship between her photography and filmmaking. Of <i>La Pointe Courte</i>, Varda recounted “I started making films with the sole experience of photography, that's to say, where to place the camera, at what distance, with which lens and what lights?” The film moseys through a port city in France, loosely following a couple contemplating their marriage, a fisherman, and a regatta.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=634D871D-E964-4EAD-9884-DC7EF0A93C52" target="_blank">here</a></u>.</b></p>
        </div>

      </div>

        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>