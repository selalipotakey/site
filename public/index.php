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
      <div class="information" style="width: 80%;">
        <h1>
          Upcoming Screenings:
        </h1>
        <div class="carousel">

          <button class="carousel__button carousel__button--left is-hidden">
            <img src="/images/site/chevron_left.svg" alt="left carousel button">
          </button>

          <div class="carousel__track-container">
            <ul class="carousel__track">

              <li class="carousel__slide current-slide">
                <a href="/calendar/Fall_2023/special-events#caligari">
                  <img class="carousel__image" src="/images/2023fall/caligari-1920.jpg" alt="The Cabinet of Dr. Caligari (1920) still">
                  <div class="top-right">
                    <h2 style="color: white; font-size: 2vw;">The Cabinet of Dr. Caligari (1920) &middot; Robert Wiene &middot; 78m &middot; 10/29 7:00PM</h2>
                  </div>
                </a>
              </li>

              <li class="carousel__slide">
                <a href="/calendar/Fall_2023/special-events#exorcist">
                  <img class="carousel__image" src="/images/2023fall/the-exorcist-1973.jpg" alt="The Exorcist (1973) still">
                  <div class="top-right">
                      <h2 style="color: white; font-size: 2vw;">The Exorcist (1973) &middot; William Friedkin &middot; 122m &middot; 10/31 9:30PM</h2>
                  </div>
                </a>
              </li>

              <li class="carousel__slide">
                <a href="/calendar/Fall_2023/wednesday#ice-storm">
                  <img class="carousel__image" src="/images/2023fall/the-ice-storm-1997.jpg" alt="The Ice Storm (1997) still">
                  <div class="top-right">
                      <h2 style="color: white; font-size: 2vw;">The Ice Storm (1997) &middot; Ang Lee &middot; 112m &middot; 10/25 7:00PM &middot 10/28 4:00PM</h2>
                    </div>
                </a>
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
      <div class="screenings-list" style="width: 65%;">

        <div class="text-section">
          <h1>This Week: </h1>
          <h3><i>$7 tickets, theater opens 30 minutes before the screening.</i></h3> 
          <h3><i>We are Cash Only at the moment.</i></h3> 
          <br>
          <h3>One of our 35mm projectors is down.</h3>
          <h3>Monday’s film will be played on one projector with pauses in between each reel.</h3>
          <h3>Wednesday’s film (which also plays Saturday) may have to be digital.</h3> 
          <h3>We will keep you updated @docfilmschicago on Twitter and Instagram.</h3>
          <h3>We are trying to solve this issue as soon as possible and are very sorry for the inconvenience.</h3>
          </h3>
        </div>

        <div id="fugitive" class="anchor screening">
          <a href="calendar/Fall_2023/monday#fugitive">
            <h2>I Am a Fugitive From a Chain Gang (1932)</h2>
            <img src="/images/2023fall/i-am-a-fugitive-from-a-chain-gang-1932.jpg" alt="I Am a Fugitive From a Chain Gang (1932) still">
          </a>
          <h3>Mervyn LeRoy &middot; 92m &middot; 35mm</h3>          
          <p><i>Preserved by the Library of Congress</i></p><p>Down-on-his-luck World War I vet James Allen is railroaded onto a brutal Southern chain gang for a crime he didn’t commit. He escapes to Chicago, but after his past catches up to him, he is forced back to a life on the run. Based on a true story, this gripping and harrowing film is probably the best of the Warner Brothers’ hardboiled Depression-era social conscience pictures. Its gut-punch of an ending is one of the greatest in Hollywood history.</p>
          <h3><u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=CDC099D2-EE9A-4D7C-911B-6BDB70402279" target="_blank">7:00PM</a></u> Monday, October 23rd</h3>
        </div>

        <div id="marjoe" class="anchor screening">
          <a href="/calendar/Fall_2023/tuesday#marjoe-1972">
            <h2>Marjoe (1972)</h2>
            <img src="/images/2023fall/marjoe-1972.jpg" alt="Marjoe (1972) still">
          </a>
          <h3>Howard Smith and Sarah Kernochan &middot; 88m &middot; Digital</h3>
          <p>Marjoe Gortner started preaching in Pentecostal revivals when he was four years old. Now in his late 20’s, Marjoe doesn’t believe in God - but continues to make his living on the revival circuit. In this Academy Award winning documentary, Marjoe takes camera crews behind the scenes of Pentecostal revivals, explaining the tricks of the trade while coming clean about his double life.</p>
          <h3><u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=A6FA7653-3CB7-4A11-A375-EF4E86D66714" target="_blank">7:00PM</a></u> Tuesday, October 24th</h3>
        </div>

        <div id=catalyst class="anchor screening">
          <a href="/calendar/Fall_2023/special-events#catalyst">
            <h2>Catalyst (2024)</h2>
            <img src="/images/2023fall/catalyst-2024.png" alt="Catalyst (2024) still">
          </a>
          <h3>Dave Steck &middot; 42m &middot; DCP</h3>
          <p><i>The film will be followed by a post-screening Q&A with people involved in the movie on both sides of the camera. The talkback panel includes: Dave Steck (filmmaker), Duro Wicks (co-producer, featured subject), and Sara Chapman (Media Burn Archive).</i></p>
          <p>An independent documentary film about how Duro “Shame Love Tempo” Wicks fell in love with Hip Hop and helped give it a home on the Chicago music scene of the early 1990's. It examines what made Hip Hop blow up in Chicago so much later than in other cities, how a tiny 100 watt college station became Chicago’s Hip Hop radio powerhouse, why it was so difficult for a young Black entrepreneur to get a party started, and a time when social, political and economic conditions ultimately proved to make Duro’s dream unsustainable, even though it was more successful than anyone ever imagined it could be.</p>
          <h3><u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=74CBB65B-6CBB-4CCF-87DE-AB961CC30770" target="_blank">4:00PM</a></u> Wednesday, October 25th</h3>
        </div>
        
        <div id="ice-storm" class="anchor screening">
          <a href="/calendar/Fall_2023/wednesday#ice-storm">
            <h2>The Ice Storm (1997)</h2>
            <img src="/images/2023fall/the-ice-storm-1997.jpg" alt="The Ice Storm (1997) still">
          </a>
          <h3>Ang Lee &middot; 112m &middot; 35mm</h3>
          <p>With a plot containing enough family dysfunction to rival, and to some—<i>surpass</i>— <i>American Beauty</i>, <i>The Ice Storm</i> is a study on bleak, melancholic suburbia. Over the course of a Thanksgiving weekend (and under the threat of a severe ice storm), two families deal with adultery, substance abuse, and isolation in a time of personal and social unrest. <i>The Ice Storm</i> is not only among the best of Lee’s work, but is also one the finest films of its decade.</p>
          <h3><u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=00FE2409-114E-4771-8D86-168821B37588" target="_blank">7:00PM</a></u> Wednesday, October 25th&middot; 
          <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=65DD554C-37CC-4BB9-A78F-42DBEBCA0423" target="_blank">4:00PM</a></u> Saturday, October 28th</h3>
        </div>

        <div id="irreversible" class="anchor screening">
          <a href="calendar/Fall_2023/thursday-1#irreversible">
            <h2>Irréversible (2002)</h2>
            <img src="/images/2023fall/irreversible-2002.jpg" alt="Irréversible (2002) still">
          </a>
          <h3>Gaspar Noé &middot; 97m &middot; DCP</h3>
          <p>Inverting the rape-revenge genre, <i>Irréversible</i> combines dizzying camerawork and a stomach-churning score by Daft Punk’s Thomas Bangalter. Infamously unwatchable, it dwells on the most base forms of hatred and disgust and makes us reckon with humanity’s id in the face of modernity. Noé’s tapestry of two men (Vincent Cassel, Albert Dupontel) avenging their lover (Monica Bellucci) is canonized and shunned for its onslaught of cruelty towards the viewer.</p>
          <h3><u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=329D6497-32FA-4425-8500-406CCCE090CD" target="_blank">7:00PM</a></u> Thursday, October 26th</h3>
        </div>

        <div id="ganja" class="anchor screening">
          <a href="/calendar/Fall_2023/thursday-2#ganja">
            <h2> Ganja & Hess (1973)</h2>
            <img src="/images/2023fall/ganja-and-hess-1973.jpg" alt="Ganja & Hess (1973) still">
          </a>
          <h3>Bill Gunn &middot; 112m &middot; DCP</h3>
          <p>An anthropologist stabbed with an ancient dagger by his assistant turns into a vampire. When the assistant’s wife comes looking for her husband, she finds out the anthropologist's secret and falls in love. Tasked with creating a ‘Black vampire film,’ Bill Gunn created one of the most unique pieces of horror (and art) with beautiful, experimental cinematography, structure, and a distinct atmosphere birthed partly from its low budget. Not to be missed.</p>
          <h3><u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=D6C3C9A1-1251-4C0C-A2E7-7E7425274754" target="_blank">9:30PM</a></u> Thursday, October 26th</h3>
        </div>

        <div id="thirst" class="anchor screening">
          <a href="/calendar/Fall_2023/friday#thirst">
            <h2>Thirst (2009)</h2>
            <img src="/images/2023fall/thirst-2009.jpg" alt="Thirst (2009) still">
          </a>
          <h3>Park Chan-wook &middot; 134m &middot; DCP</h3>
          <p>When Sang-hyun, a respected priest, selflessly volunteers for an experimental procedure to cure a deadly virus, he is infected and killed--only to be brought back as a vampire through a mysterious blood transfusion. Now, his increasingly waning faith must face his new insatiable craving for blood, as well as his newfound desire for the wife of his childhood friend, Tae-ju. <i>Thirst</i> is an erotic thriller about losing control of one’s sinful impulses.</p>
          <h3><u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=5511B7BA-AD7D-4290-B654-AA055AE314EB" target="_blank">7:00PM</a></u> Friday, October 27th</h3>
        </div>

        <div id="passages" class="anchor screening">
          <a href="calendar/Fall_2023/saturday#passages">
            <h2>Passages (2023)</h2>
            <img src="/images/2023fall/passages-2023.jpg" alt="Passages (2023) still">
          </a>
          <h3>Ira Sachs &middot; 92m &middot; DCP</h3>
          <p>Director Tomas (Franz Rogowski) creates a maelstrom when he leaves his husband (Ben Whishaw) for a woman he meets at his film’s wrap party, Agathe (Adèle Exarchopolous). Of course, he is unable to completely end his marriage or his affair. Rogowski, clad in mesh and crop tops against a backdrop of artist abodes and Parisian parties, makes Tomas a fascinating, if not slightly repulsive, character. In other words, <i>Passages</i> fucks. Literally (rated NC-17).</p>
          <h3><u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=A9B02C55-4FBF-420C-A060-F073B8F6B103" target="_blank">7:00PM</a></u> Saturday, October 28th &middot; 
          <u><a href="https://tickets.uchicago.edu/Online/seatSelect.asp?createBO::WSmap=1&BOparam::WSmap::loadBestAvailable::performance_ids=DFA6729B-2CD8-40B9-AC91-9205C5E482EB" target="_blank">3:00PM</a></u>  Sunday, October 29th</h3>
        </div>

        <div id="manila" class="anchor screening">
          <a href="calendar/Fall_2023/sunday#manila">
            <h2>Manila in the Claws of Light (1975)</h2>
            <img src="/images/2023fall/manila-in-the-claws-of-light-1975.jpg" alt="Manila in the Claws of Light (1975) still">
          </a>
          <h3>Lino Brocka &middot; 125m &middot; DCP</h3>
          <p>Directed by a titan of Filipino cinema, Lino Brocka, <i>Manila</i> confronts urban strife with melodramatic flair as provincial Julio (Bembol Roco) makes his way into Manila in search of his missing love Ligaya (Hilda Koronel). A recounting of one man’s attempt to fight against the gargantua of city life and a record of 70s Manila, Brocka’s epic is a masterclass in the characterization of urbanity’s ability to suffocate those who enter its darkness.</p>
          <h3>6:30PM Sunday, October 29th</h3>
        </div>

        <div id="caligari" class="anchor screening">
          <a href="calendar/Fall_2023/special-events#caligari">
            <h2>The Cabinet of Dr. Caligari (1920)</h2>
            <img src="/images/2023fall/caligari-1920.jpg" alt="The Cabinet of Dr. Caligari (1920) still">
          </a>
          <h3>Robert Wiene &middot; 78m &middot; DCP</h3>
          <p><i>Free admission to UChicago students or anyone with a Docfilms pass.</i></p>
          <p>Rockefeller Memorial Chapel presents The Cabinet of Dr. Caligari (1920) as their annual Halloween silent film screening with musical score on the chapel's E.M. Skinner organ. $8 in advance, $10 at the door.</p>
          <h3><u><a href="https://www.google.com/url?q=https://tickets.uchicago.edu/Online/default.asp?doWork::WScontent::loadArticle%3DLoad%26BOparam::WScontent::loadArticle::article_id%3D4F9D6D11-692F-4729-A711-AD0F302CC536&sa=D&source=calendar&ust=1698368812456224&usg=AOvVaw0mfWo7w2X6P7GPIYmFTQAv" target="__blank">7:00PM</a></u> Sunday, October 29th</h3>
        </div>

      </div>

    <h1 style="text-align: center; margin-bottom: 1vw;">Doc Films Fall 2023 Calendar</h1>
    <img src="images/2023fall/Autumn Calendar Pictures/FULLcal.jpg" style="max-width: 95vw; margin: auto; margin-bottom: 2vw; display: block;"></img>
    <img src="images/2023fall/Autumn Calendar Pictures/FULLseries.jpg" style="max-width: 95vw; margin: auto; display: block;"></img>
    <h2 style="text-align: center; font-size: 1.5rem; margin-top: 1vw; margin-bottom: 1vw;">Designed by Eli Harrell</h2>
        
    </main>
    
    <?php include "./includes/footer.html" ?>


    <script src="/js/carousel.js"></script>
    <script src="/js/fit-carousel-slide.js"></script>
    <script src="/js/resize-menu.js"></script>
    
  </body>
</html>