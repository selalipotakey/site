<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/style.css?ver=1.1">
  </head>

  <body>
    
    <?php $version='1.2'; include "./includes/header.html";?>
  
    <main>

      <?php $version='1.2'; include "./includes/dropdown.html";?>
      
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
              
              <!-- <li class="carousel__slide current-slide">
                <a href="/calendar/special-events#the-janes">
                  <img class="carousel__image" src="/images/2023winter/the-janes-2022.jpg" alt="THE JANES still">
                </a>
                  <div class="description">
                    <a href="/calendar/special-events#the-janes">
                      <p class="event-title fittext">
                      THE JANES, with Heather Booth (Thursday 1/26 @ 6:30PM)
                      </p>
                    </a>
                    <p class="capsule fittext">Nearly 50 years before Roe v. Wade was overturned in 2022, seven Chicago women were arrested and charged with building an underground network to provide illegal abortions—each facing up to 110 years in prison. These were 'the Janes,' and this is their story.
                    <i>Presented by YWCA Metropolitan Chicago, Chicago  Foundation for Women, and the Center for the Study of Gender and Sexuality (CSGS).</i></p>
                  </div>
              </li> -->

              <li class="carousel__slide current-slide">
                <a href="/calendar/special-events#who-killed-captain-alex">
                  <img class="carousel__image" src="/images/2023winter/who-killed-captain-alex-2010.jpg" alt="WHO KILLED CAPTAIN ALEX? still">
                </a>
                  <div class="description">
                    <a href="/calendar/special-events#who-killed-captain-alex">
                      <p class="event-title fittext">
                      WHO KILLED CAPTAIN ALEX? A Wakaliwood Production (Sat. 3/4 @ 7:00PM)
                      </p>
                    </a>
                    <p class="capsule fittext">A Wakaliwood production made on a shoestring budget of around $200, <i>Who Killed Captain Alex?</i> gives any Hollywood blockbuster an inferiority complex. We promise you, this is the most entertaining film on the calendar, so come check it out!
                    </p>
                  </div>
              </li>

              <li class="carousel__slide">
                <a href="https://tickets.uchicago.edu/Online/default.asp?doWork::WScontent::loadArticle=Load&BOparam::WScontent::loadArticle::article_id=B1177605-76C2-4F9C-9CE4-536219964821" target='_blank'>
                  <img class="carousel__image" src="/images/2023winter/placeholder_quarter_pass.jpg" alt="quarter pass">
                </a>
                  <div class="description">
                    <a href="https://tickets.uchicago.edu/Online/default.asp?doWork::WScontent::loadArticle=Load&BOparam::WScontent::loadArticle::article_id=B1177605-76C2-4F9C-9CE4-536219964821" target='_blank'>
                      <p class="event-title fittext">
                      Buy your Winter 2023 quarter pass now!
                      </p>
                    </a>
                    <p class="capsule fittext">Quarter passes get you into all 70+ screenings each quarter for FREE! Plus, you get a cool new card for your wallet. Click the picture to purchase online, or wait till your next screening and purchase at our theater. Note: we cannot provide <u><a href="/visit#tickets">our pass discounts</a></u> on online purchases.</p>
                  </div>
              </li>

            </ul>
          </div>

          <button class="carousel__button carousel__button--right">
            <img src="/images/site/chevron_right.svg" alt="right carousel button">
          </button>

          <div class="carousel__nav">
            <!-- <button class="carousel__indicator current-slide"></button> -->
            <button class="carousel__indicator current-slide"></button>
            <button class="carousel__indicator"></button>
          </div>
          
        </div>

        <br><br><br><br><br>

      </div>

      <div class="screenings-list">

        <div class="text-section">
          <h1>Playing this week:</h1>
          <h3><i>$7 tickets, theater opens 30 minutes before the screening.</i></h3>
        </div>

        <!-- <div class="screening">
          <h1>7:00PM Monday, February 27th</h1>
          <img src="/images/2023winter/forty-guns-1957.jpeg" alt="Forty Guns (1957) still">
          <h2>Forty Guns (1957)</h2>
          <h3>Samuel Fuller &middot; 80m &middot; DCP</h3>
          <p>In the last of her many forays into the Western genre, Barbara Stanwyck plays authoritarian rancher Jessica Drummond in Samuel Fuller’s boldly feminist <i>Forty Guns</i>. Featuring gunfights and snarky dialogue galore, the film was shot in breathtaking CinemaScope and utilizes the widescreen frame to its fullest. <i>Forty Guns</i> (and Stanwyck’s fiery turn in it) traffics in the same jagged psychological complexity that would define much of American cinema to come.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=32A70215-3469-41B8-9FD0-DC377DCBF880" target="_blank">here</a></u>.</b></p>
        </div>
        
        <div class="screening">
          <h1>7:00PM Tuesday, February 28th</h1>
          <img src="/images/2023winter/terminal-usa-1994.jpg" alt="The Distance from Here (2010) // Terminal USA (1994) still">
          <h2>The Distance from Here (2010) // Terminal USA (1994)</h2>
          <h3>Bani Abidi // Jon Moritsugu &middot; 12m // 54m &middot; DCP // 16mm</h3>
          <p>From embassy waiting rooms to public-access TV, our series concludes with two interventions to the main program, to remind us of all the representations still lacking, and to avoid the construction of grand narratives in the act of programming itself. Abidi’s video is a window into Islamabad visa waiting rooms, while Moritsugu’s anarchic punk vision of a dysfunctional Japanese-American family sitcom is both merry mockery and vital, delightful outsider art.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=6A10362C-CA62-46BC-96FF-668BD7F586AF" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Wednesday, March 1st</h1>
          <img src="/images/2023winter/swamp-water-1941.jpg" alt="Swamp Water (1941) still">
          <h2>Swamp Water (1941)</h2>
          <h3>Jean Renoir &middot; 88m &middot; 35mm</h3>
          <p>This film was Renoir's American debut, filmed while he was learning the constraints of Hollywood. While looking for his dog deep within Georgia's Okeefenokee Swamp, Ben discovers the fugitive Keefer hiding out. Keefer convinces Ben that he's innocent of the murder he was convicted for, and they join to catch the real killers. A lovely daughter, a doubting sheriff, and a pair of mean rural goons are among the colorful characters that enliven <i>Swamp Water</i>.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=48361576-2423-42AA-A39F-B69AA40962C0" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Thursday, March 2nd</h1>
          <img src="/images/2023winter/the-china-syndrome-1979.jpg" alt="The China Syndrome (1979) still">
          <h2>The China Syndrome (1979)</h2>
          <h3>James Bridges &middot; 122m &middot; DCP</h3>
          <p>A reporter (Jane Fonda) and her cameraman (Michael Douglas) accidentally film an incident at a plant in California and try to get the story on air, while plant supervisor (Jack Lemmon) conducts his own investigation of the plant. Released 12 days before the Three Mile Island nuclear accident, <i>The China Syndrome</i> is a chilling thriller based on actual incidents with intense performances that raises the question: how close are we at any time from disaster?</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=E086581F-1785-45F5-A9CD-6FD3F02AC0A5" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>9:30PM Thursday, March 2nd</h1>
          <img src="/images/2023winter/trash-humpers-2009.jpeg" alt="Trash Humpers (2009) still">
          <h2>Trash Humpers (2009)</h2>
          <h3>Harmony Korine &middot; 78m &middot; 35mm</h3>
          <p>Winner of the DOX Award at the 2009 Copenhagen International Documentary Festival, <i>Trash Humpers</i> follows a group of depraved elderly misfits on their nocturnal ramblings. Arthouse provocateur Harmony Korine’s stark imagery on worn home video tape gives the story a bizarre, scary sense of humor. Critic Amy Taubin called the movie “a throwback to the nursery, where the id reigns without social inhibition, and pleasure is focused on the present moment.”</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=EB299C26-B194-4D96-985D-31D326153304" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Friday, March 3rd</h1>
          <img src="/images/2023winter/a-most-wanted-man-2014.jpg" alt="A Most Wanted Man (2014) still">
          <h2>A Most Wanted Man (2014)</h2>
          <h3>Anton Corbijn &middot; 122m &middot; 35mm</h3>
          <p>The last film Philip Seymour Hoffman completed before his death, <i>A Most Wanted Man</i> is an espionage thriller about a tortured Chechen migrant (Grigoriy Dobrygin) who settles in Hamburg and becomes a person of interest for a German agent’s (Philip Seymour Hoffman) rogue counterterrorism work. Based on John le Carre’s novel of the same name, this is a tense, cerebral tale of intrigue, rivalry, and politics—right through to its final hair-raising scene.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=B5E2E339-FB39-4D40-B886-1D396FA9C50D" target="_blank">here</a></u>.</b></p>
        </div> -->

        <div class="screening" id="who-killed-captain-alex" style="scroll-margin-top: var(--header-height);">
          <h1>7:00PM Saturday, March 4th</h1>
          <img src="/images/2023winter/who-killed-captain-alex-2010.jpg" alt="Who Killed Captain Alex? (2010) still">
          <h2>Who Killed Captain Alex? (2010)</h2>
          <h3>Nabwana Isaac Godfrey Geoffrey &middot; 64m &middot; DCP</h3>
          <p>What makes <i>Who Killed Captain Alex?</i> one of "DA BEST OF DA BEST MOVIES?!?!" Is it Ugandan Bruce Lee? A helicopter dogfight between the Tiger Mafia and the “Ugandan Ghetto Air Force?” Video Joker Emmie? A Wakaliwood production made on a shoestring budget of around $200, <i>Who Killed Captain Alex?</i> gives any Hollywood blockbuster an inferiority complex. We promise you, this is the most entertaining film on the calendar, so come check it out!</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=3BE9DE50-D84D-4BEC-96EF-D3391FB51D41" target="_blank">here</a></u>.</b></p>
        </div>

        <div class="screening">
          <h1>7:00PM Sunday, March 5th</h1>
          <img src="/images/2023winter/destiny-1921.jpeg" alt="Destiny (1921) still">
          <h2>Destiny (1921)</h2>
          <h3>Fritz Lang &middot; 98m &middot; DCP</h3>
          <p><i>Destiny</i> tells the story of two young lovers, one of whom is abducted by Death. The young woman of the pair approaches Death in a bargain for her fiancé's life, and he in turn shows her three tragic romances similar to her own: one set in the Middle East, one in Venice, and one in the Chinese Empire. Death promises to reunite the main couple, so long as the woman can save a life from one of these three stories, proving that love is stronger than death.</p>
          <p><b>Tickets can be bought <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=3DE49DCB-7BC8-460A-ABC2-E37B0E868A54" target="_blank">here</a></u>.</b></p>
        </div>

      </div>

        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>