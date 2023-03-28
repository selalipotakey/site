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
                <a href="/calendar/wednesday#jeanne-dielman">
                  <img class="carousel__image" src="/images/2023spring/jeanne-dielman-23-quai-du-commerce-1080-bruxelles-1975.jpeg" alt="JEANNE DIELMAN still">
                </a>
                  <div class="description">
                    <a href="/calendar/wednesday#jeanne-dielman">
                      <p class="event-title fittext">
                      Jeanne Dielman (Wed. 3/29 @ 7:00PM and Sun. 4/2 @ 4:00PM) 
                      </p>
                    </a>
                    <p class="capsule fittext">The film that changed everything. Delphine Seyrig gave her greatest contribution to cinema in Chantal Akerman’s <i>Jeanne Dielman</i> as a widowed housewife who spends her days peeling potatoes for her son's meals and trying to make ends meet. Quietly harrowing, exhilarating, and triumphant.
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
          <h1>7:00PM Tuesday, March 28th</h1>
          <img src="/images/2023spring/everything-everywhere-all-at-once-2022.jpg" alt="Everything Everywhere All at Once (2022) still">
          <h2>Everything Everywhere All at Once (2022)</h2>
          <h3>Daniel Kwan and Daniel Scheinert &middot; 139m &middot; DCP</h3>
          <p>Back on the big screen! <i>Everything Everywhere All at Once</i> is a whimsical, sci-fi, comedy-drama following Evelyn Wang (Michelle Yeoh) as her marriage to Waymond (Ke Huy Quan) and relationship with her daughter Joy (Stephanie Hsu) begin to implode. <i>EEAAO</i> swept the awards season, being nominated for 11 Academy Awards and winning Yeoh a Golden Globe for best actress.</p>
          <p><i>Co-presented with the Society of Women in Physics. All proceeds to go to Girls 4 Science, a nonprofit organization dedicated to exposing girls in Chicago, ages 10–18 years old, to STEM.</i></p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=5CEBE0DB-3026-4481-838A-297FCF538022" target="_blank">here</a></u>.</b></p>
        </div>
        
        <div id="jeanne-dielman" class="screening" style="scroll-margin-top: var(--header-height);">
          <h1>7:00PM Wednesday, March 29th; 4:00PM Sunday, April 2nd</h1>
          <img src="/images/2023spring/jeanne-dielman-23-quai-du-commerce-1080-bruxelles-1975.jpeg" alt="Jeanne Dielman, 23, quai du Commerce, 1080 Bruxelles (1975) still">
          <h2>Jeanne Dielman, 23, quai du Commerce, 1080 Bruxelles (1975)</h2>
          <h3>Chantal Akerman &middot; 201m &middot; DCP</h3>
          <p>The film that changed everything. Delphine Seyrig gave her greatest contribution to cinema in Chantal Akerman’s <i>Jeanne Dielman</i> as a widowed housewife who spends her days peeling potatoes for her son's meals and trying to make ends meet. The film’s brilliance lies in its attentiveness towards its subject, the textural duration and repetition of Jeanne’s daily tasks, and the eventual disruption that occurs. Quietly harrowing, exhilarating, and triumphant.</p>
          <p><b>March 29th tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=A2F0623E-AA14-4C83-A914-9C865DA8C6F4" target="_blank">here</a></u>.</b></p>
          <p><b>April 2nd tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=EEF242A1-5005-43D8-B784-113A5E330205" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Thursday, March 30th</h1>
          <img src="/images/2023spring/children-of-men-2006.png" alt="Children of Men (2006) still">
          <h2>Children of Men (2006)</h2>
          <h3>Alfonso Cuarón &middot; 109m &middot; 35mm</h3>
          <p>In a dystopian future where society is on the brink of collapse and mankind’s existence is threatened by infertility, <i>Children of Men</i> follows a disillusioned, former-activist bureaucrat (Clive Owen) in Britain—now a xenophobic police state—as he works to transport a miraculously pregnant woman to sanctuary. Aided by the work of cinematographer Emmanuel Lubezki, Cuarón has created a timeless visual masterpiece filled with themes that still resonate today.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=845089CA-49D6-4BEB-A8F6-F3B267691F1B" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>9:30PM Thursday, March 30th</h1>
          <img src="/images/2023spring/videodrome-1983.jpg" alt="Videodrome (1983) still">
          <h2>Videodrome (1983)</h2>
          <h3>David Cronenberg &middot; 87m &middot; DCP</h3>
          <p>A film of near apocalyptic proportions squeezed down into the horrific city of Toronto, <i>Videodrome</i> follows the president of a nearly-pornographic television station as he becomes enraptured in a mysterious, foreign TV show full of blood, sex, and murder. Enthralled as he seeks out the show's source, reality begins to collapse around him as the worlds of sex, biology, and technology coalesce into one rapturous mess. LONG LIVE THE NEW FLESH.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=27381671-63EE-4AB7-BEB1-A42ADA4138BB" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Friday, March 31st</h1>
          <img src="/images/2023spring/sunrise-a-tale-of-two-humans-1927.jpg" alt="Sunrise: A Song of Two Humans (1927) still">
          <h2>Sunrise: A Song of Two Humans (1927)</h2>
          <h3>F. W. Murnau &middot; 94m &middot; 35mm</h3>
          <p>The best German expressionist film ever made outside of Germany, <i>Sunrise: A Song of Two Humans</i> delivers on the promise of its title. A glorious, melodic wave of emotion, Murnau’s opus is a testament to what the medium of silent film could offer in its final days. <i>Sunrise</i> would go on to win the only once awarded Oscar for “Unique and Artistic Picture." It's a gorgeous film not to be missed, and in Addison's opinion, the best film in this series.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=3F366BB3-A710-40E8-8457-5ABC44329324" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>4:00PM Saturday, April 1st; 8:00PM Saturday, April 1st</h1>
          <img src="/images/2023spring/babylon-2022.png" alt="Babylon (2022) still">
          <h2>Babylon (2022)</h2>
          <h3>Damien Chazelle &middot; 189m &middot; DCP</h3>
          <p>Damien Chazelle's <i>Babylon</i> follows an ensemble cast of Margot Robbie, Brad Pitt, Diego Calva and more through the glitz, glamor, and corruption of late '20s Hollywood, in the transition from silent to sound movies. Divisive among critics upon its release, the film is both a condemnation of and a love letter to the world of movies and the Hollywood institution itself. You may love it, you may hate it, but regardless, you'll have a good time at the movies.</p>
          <p><b>4:00PM tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=26FDDE8C-A744-4DE7-85C5-B795FC1D3B71" target="_blank">here</a></u>.</b></p>
          <p><b>8:00PM tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=95A8E7DF-61A7-45D7-A201-974A123141CD" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>8:00PM Sunday, April 2nd</h1>
          <img src="/images/2023spring/fear-and-desire-1953.jpeg" alt="Fear and Desire (1953) still">
          <h2>Fear and Desire (1951) // Day of the Fight (1952)</h2>
          <h3>Stanley Kubrick // Stanley Kubrick &middot; 72m // 16m &middot; 35mm // 16mm</h3>
          <p>Stanley Kubrick’s feature directorial debut, <i>Fear and Desire</i> was produced with a small crew of 15 people and an original shoestring budget of only $10,000, raised largely by Kubrick’s family. An anti-war film released under the context of the Korean War, Kubrick reportedly quit his job as a staff photographer for <i>Look</i> Magazine to make the film. Preceded by <i>Day of the Fight</i> a short documentary produced by Kubrick during his days with <i>Look</i> Magazine.</p>
          <p><i>Preserved by the Library of Congress.</i></p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=765B7207-D7B4-4161-AEE1-DD1E0E5F0F59" target="_blank">here</a></u>.</b></p>
        </div>

      </div>

        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>