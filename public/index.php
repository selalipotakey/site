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
        <h1 style="width: 90% ! important;">
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

      </div>

        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>