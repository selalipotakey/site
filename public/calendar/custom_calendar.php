<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"https://www.w3.org/TR/html4/strict.dtd">

<!-- this is all ripped from html source for embedded google calendars -->

<html>
    <head><meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Google Calendar</title>
        <link rel="icon" type="image/x-icon" href="https://calendar.google.com/googlecalendar/images/favicons_2020q4/calendar_31.ico">
        <script src="https://apis.google.com/_/scs/abc-static/_/js/k=gapi.lb.en.z9QjrzsHcOc.O/m=client/rt=j/sv=1/d=1/ed=1/rs=AHpOoo8359JQqZQ0dzCVJ5Ui3CZcERHEWA/cb=gapi.loaded_0?le=scs" nonce="" async=""></script><script type="text/javascript" nonce="">
            gcal$perf$serverTime=174;
            gcal$perf$headStartTime=new Date().getTime();
        </script>
        <style type="text/css">body{margin:0;padding:0;overflow-y:hidden;}
                html{overflow-y:hidden;}</style>
        <link type="text/css" rel="stylesheet" href="https://calendar.google.com/calendar/static/55bfe2a5c7047a56bc9e175e693c53dfembedcompiled_fastui.css">

        <script type="text/javascript" nonce="">
        function _DumpException(e) { throw e; }
            var baseModuleLoaded_ = false;
        </script>
        <script type="text/javascript" src="https://calendar.google.com/calendar/_/web/calendar-static/_/js/k=calendar-web.embed.en.3iqZS67q1qI.es5.O/d=1/rs=ABFko3_vdSNj2s7rw2dpTCtVQLD70NGAXA/m=embed" nonce=""></script>
        <script type="text/javascript" nonce="">
            if (!baseModuleLoaded_) {
            var loadErrorXhr = new XMLHttpRequest();
            loadErrorXhr.open('POST', "https://calendar.google.com/calendar/u/0/bmlf");
            loadErrorXhr.send();
            }
        </script>
        <script nonce="">function _onload() {
          // cameron's custom code for doc
          var mq = window.matchMedia( "(min-width: 508px" ); // since window is the window of custom_calendar.php and not the calendar index, had to do some number magic to settle on the pixel size to trigger the conditional

          // var w = window.innerWidth;
          if (mq.matches) {
            var display_mode = "month";
          } else {
            var display_mode = "agenda";
          }
          // end custom code


          window._init({"features":[],"loggedin":true,"cids":{"c_7a2j66n29m80g326io6blho2cc@group.calendar.google.com":{"color":"#2952a3","access":70,"title":"Doc Films Calendar"}},"view": display_mode,"weekstart":0,"format24hour":false,"dateFieldOrder":0,"preloadStart":"20220827","preloadEnd":"20221007","container":"container","baseUrl":"/","imagePath":"//calendar.google.com/googlecalendar/images/","hostedDomain":{"name":"docfilms.org","title":"Doc Films","maplink":null},"timezone":"America/Chicago","timezoneLocalized":"Central Time - Chicago","timezoneOffsetMs":-18000000,"nowMs":"1662828870710","timezoneNextTransitionMs":"1667718000000","timezoneNextOffsetMs":-21600000,"showNavigation":true,"showDateMarker":true,"showTabs":true,"showCalendarMenu":true,"showCurrentTime":true,"showTz":true,"showPrintButton":true,"showElementsLogo":false,"showSubscribeButton":false,"embedStyle":"WyJhdDplbWI6c3QiXQ\u003d\u003d","shouldStopOpeningWebContent":true,"proxyUrl":"https://clients6.google.com","calendarApiVersion":"v3","developerKey":"AIzaSyBNlYH01_9Hc5S1J9vuFmu2nUqBZJNAXxs"});
          }</script>
        <script type="text/javascript" nonce="">
            var pageLoaded_ = false;
            var clientLibraryLoaded_ = false;

            function clientLibraryLoaded() {
                clientLibraryLoaded_ = true;
                if (pageLoaded_ && baseModuleLoaded_) {
                _onload();
                }
            }

            function pageLoaded() {
                pageLoaded_ = true;
                if (clientLibraryLoaded_ && baseModuleLoaded_) {
                _onload();
                }
            }
            </script>
        <script type="text/javascript" src="https://apis.google.com/js/client.js?onload=clientLibraryLoaded" nonce="" gapi_processed="true"></script>
        <style type="text/css"></style>
        <link rel="stylesheet" type="text/css" href="/calendar/custom_calendar.css">
    </head>

    <body id="calendarBody">
        <script type="text/javascript" nonce="">
            document.addEventListener('DOMContentLoaded', pageLoaded);
        </script>

        <span id="calendarTitle">Autumn 2022</span>

        <noscript>
            <p></p>
            JavaScript is required to show this page. Let this site use JavaScript in your browser settings. 
            <a href="https://support.google.com/calendar?p=javascript">Learn more</a>
        </noscript>

        <div id="container" style="width: 100%; position: relative; height: 728px;" class="locale-en ">
          <div class="calendar-container">
            <div class="header" id="nav1" style="overflow:hidden;">
              <div class="date-controls">
                <table class="nav-table" cellpadding="0" cellspacing="0" border="0">
                  <tbody>
                    <tr>
                      <td class="date-nav-buttons">
                        <button class="today-button" id="todayButton1">Today</button>
                        <img id="navBack1" role="button" tabindex="0" title="Previous period" src="https://calendar.google.com/googlecalendar/images/blank.gif" width="22" height="17" class="navbutton navBack">
                        <img id="navForward1" role="button" tabindex="0" title="Next period" src="https://calendar.google.com/googlecalendar/images/blank.gif" width="22" height="17" class="navbutton navForward">
                      </td>
                      <td id="dateEditableBox1" class="date-picker-off">
                        <div class="date-top" id="currentDate1">September 2022</div>
                      </td>
                      <td id="dateMenuArrow1" class="date-picker-off">
                        <img src="https://calendar.google.com/googlecalendar/images/menu_arrow_open.gif" id="arrowImg1" class="arrowImg" width="9" height="9" alt=""></td><td class="navSpacer">&nbsp;
                      </td>
                      <td id="td-print-image-id">
                        <img src="//calendar.google.com/googlecalendar/images/icon_print.gif" style="cursor: pointer;" width="16" height="16" title="Print my calendar (shows preview)">
                      </td>
                      <td id="td-print-text-id">
                        <div class="tab-name">Print</div>
                      </td>
                      <td id="calendarTabs1">
                        <table cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td class="ui-rtsr">
                                <div class="ui-rtsr-unselected ui-rtsr-first-tab t1-embed">&nbsp;</div>
                                <div class="ui-rtsr-unselected ui-rtsr-first-tab t2-embed">&nbsp;</div>
                                <div id="tab-controller-container-week" class="ui-rtsr-unselected ui-rtsr-first-tab ui-rtsr-name">Week</div>
                              </td>
                              <td class="ui-rtsr">
                                <div class="ui-rtsr-selected t1-embed">&nbsp;</div>
                                <div class="ui-rtsr-selected t2-embed">&nbsp;</div>
                                <div id="tab-controller-container-month" class="ui-rtsr-selected ui-rtsr-name">Month</div>
                              </td>
                              <td class="ui-rtsr">
                                <div class="ui-rtsr-unselected ui-rtsr-last-tab t1-embed">&nbsp;</div>
                                <div class="ui-rtsr-unselected ui-rtsr-last-tab t2-embed">&nbsp;</div>
                                <div id="tab-controller-container-agenda" class="ui-rtsr-unselected ui-rtsr-last-tab ui-rtsr-name">Agenda</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                      <td class="calendar-nav">
                        <img id="calendarListButton1" src="https://calendar.google.com/googlecalendar/images/btn_menu6.gif" alt="" title="" width="15" height="14">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="view-cap t1-embed">&nbsp;</div>
            <div class="view-cap t2-embed">&nbsp;</div>
            <div class="view-container-border" id="calendarContainer1">
              <div id="viewContainer1" class="view-container" style="height: 674px;">
              <div class="mv-container">
                <table cellpadding="0" cellspacing="0" class="mv-daynames-table" id="mvDaynamesTable">
                  <tbody>
                    <tr>
                      <th class="mv-dayname" title="Sun">Sun</th>
                      <th class="mv-dayname" title="Mon">Mon</th>
                      <th class="mv-dayname" title="Tue">Tue</th>
                      <th class="mv-dayname" title="Wed">Wed</th>
                      <th class="mv-dayname" title="Thu">Thu</th>
                      <th class="mv-dayname" title="Fri">Fri</th>
                      <th class="mv-dayname" title="Sat">Sat</th>
                    </tr>
                  </tbody>
                </table>
                <div class="mv-event-container" id="mvEventContainer2">
                  <div class="month-row" style="top:0%;height:21%">
                    <table cellpadding="0" cellspacing="0" class="st-bg-table">
                      <tbody>
                        <tr>
                          <td class="st-bg st-bg-fc">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="st-grid">
                      <tbody>
                        <tr>
                          <td class="st-dtitle st-dtitle-fr st-dtitle-fc st-dtitle-nonmonth">
                            <span class="ca-cdp26908">28</span>
                          </td>
                          <td class="st-dtitle st-dtitle-fr st-dtitle-nonmonth">
                            <span class="ca-cdp26909">29</span>
                          </td>
                          <td class="st-dtitle st-dtitle-fr st-dtitle-nonmonth">
                            <span class="ca-cdp26910">30</span>
                          </td>
                          <td class="st-dtitle st-dtitle-fr st-dtitle-nonmonth">
                            <span class="ca-cdp26911">31</span>
                          </td>
                          <td class="st-dtitle st-dtitle-fr">
                            <span class="ca-cdp26913">Sep 1</span>
                          </td>
                          <td class="st-dtitle st-dtitle-fr">
                            <span class="ca-cdp26914">2</span>
                          </td>
                          <td class="st-dtitle st-dtitle-fr">
                            <span class="ca-cdp26915">3</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="month-row" style="top:20%;height:21%">
                    <table cellpadding="0" cellspacing="0" class="st-bg-table">
                      <tbody>
                        <tr>
                          <td class="st-bg st-bg-fc">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg st-bg-td-last">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="st-grid">
                      <tbody>
                        <tr>
                          <td class="st-dtitle st-dtitle-fc"><span class="ca-cdp26916">4</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26917">5</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26918">6</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26919">7</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26920">8</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26921">9</span></td>
                          <td class="st-dtitle st-dtitle-today st-dtitle-lc"><span class="ca-cdp26922">10</span></td>
                        </tr>
                        <tr>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="month-row" style="top:40%;height:21%">
                    <table cellpadding="0" cellspacing="0" class="st-bg-table">
                      <tbody>
                        <tr>
                          <td class="st-bg st-bg-fc">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="st-grid">
                      <tbody>
                        <tr>
                          <td class="st-dtitle st-dtitle-fc"><span class="ca-cdp26923">11</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26924">12</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26925">13</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26926">14</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26927">15</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26928">16</span></td>
                          <td class="st-dtitle st-dtitle-down"><span class="ca-cdp26929">17</span></td>
                        </tr>
                        <tr>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="month-row" style="top:60%;height:21%">
                    <table cellpadding="0" cellspacing="0" class="st-bg-table">
                      <tbody>
                        <tr>
                          <td class="st-bg st-bg-fc">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="st-grid">
                      <tbody>
                        <tr>
                          <td class="st-dtitle st-dtitle-fc"><span class="ca-cdp26930">18</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26931">19</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26932">20</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26933">21</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26934">22</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26935">23</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26936">24</span></td>
                        </tr>
                        <tr>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="month-row" style="top:80%;bottom:0">
                    <table cellpadding="0" cellspacing="0" class="st-bg-table">
                      <tbody>
                        <tr>
                          <td class="st-bg st-bg-fc">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                          <td class="st-bg">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="st-grid">
                      <tbody>
                        <tr>
                          <td class="st-dtitle st-dtitle-fc"><span class="ca-cdp26937">25</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26938">26</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26939">27</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26940">28</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26941">29</span></td>
                          <td class="st-dtitle"><span class="ca-cdp26942">30</span></td>
                          <td class="st-dtitle st-dtitle-nonmonth"><span class="ca-cdp26945">Oct 1</span></td>
                        </tr>
                        <tr>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                          <td class="st-c st-s">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <table id="footer1" class="footer" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td valign="bottom" id="timezone">Events shown in time zone: Central Time - Chicago</td>
                  <td valign="bottom" style="text-align:right;">
                    <div class="subscribe-image" style="display:inline-block;" id="subscribe-id" title="Add to Google Calendar">
                      <div class="logo-plus-button">
                        <div class="logo-plus-button-plus-icon"></div>
                        <div class="logo-plus-button-lockup"><span class="logo-plus-button-lockup-text">Calendar</span></div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div id="loading1" class="loading" style="right: 25px; display: none;">Loading...</div>
            <div style="display: none; z-index: 1001; width: 400px;" class="bubble">
              <table cellpadding="0" cellspacing="0" class="bubble-table">
                <tbody>
                  <tr>
                    <td class="bubble-cell-side">
                      <div class="bubble-corner" id="tl:0">
                        <div class="bubble-sprite bubble-tl"></div>
                      </div>
                    </td>
                    <td class="bubble-cell-main">
                      <div class="bubble-top"></div>
                    </td>
                    <td class="bubble-cell-side">
                      <div class="bubble-corner" id="tr:0">
                        <div class="bubble-sprite bubble-tr"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" class="bubble-mid">
                      <div style="overflow:hidden" id="bubbleContent:0"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="bubble-corner" id="bl:0">
                        <div class="bubble-sprite bubble-bl"></div>
                      </div>
                    </td>
                    <td>
                      <div class="bubble-bottom"></div>
                    </td>
                    <td>
                      <div class="bubble-corner" id="br:0">
                        <div class="bubble-sprite bubble-br"></div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div id="bubbleClose:0" class="bubble-closebutton"></div>
              <div class="prong" id="prong:0">
                <div class="bubble-sprite"></div>
              </div>
            </div>
            <div style="display: none; z-index: 1001; width: 400px;" class="bubble">
              <table cellpadding="0" cellspacing="0" class="bubble-table">
                <tbody>
                  <tr>
                    <td class="bubble-cell-side">
                      <div class="bubble-corner" id="tl:1">
                        <div class="bubble-sprite bubble-tl"></div>
                      </div>
                    </td>
                    <td class="bubble-cell-main">
                      <div class="bubble-top"></div>
                    </td>
                    <td class="bubble-cell-side">
                      <div class="bubble-corner" id="tr:1">
                        <div class="bubble-sprite bubble-tr"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" class="bubble-mid">
                      <div style="overflow:hidden" id="bubbleContent:1"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="bubble-corner" id="bl:1">
                        <div class="bubble-sprite bubble-bl"></div>
                      </div>
                    </td>
                    <td>
                      <div class="bubble-bottom"></div>
                    </td>
                    <td>
                      <div class="bubble-corner" id="br:1">
                        <div class="bubble-sprite bubble-br"></div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div id="bubbleClose:1" class="bubble-closebutton"></div>
              <div class="prong" id="prong:1">
                <div class="bubble-sprite"></div>
              </div>
            </div>
          </div>
          <div class="view-cap t2-embed">&nbsp;</div>
          <div class="view-cap t1-embed">&nbsp;</div>
        </div>
        <div id="dpPopup1" class="dp-popup" style="display: none;">
          <div class="dp-monthtablediv monthtableSpace">
            <table class="dp-monthtable" role="presentation" cellspacing="0" cellpadding="0" style="-moz-user-select:none;-webkit-user-select:none;">
              <tbody>
                <tr class="dp-cell dp-heading" id="dpPopup1_header">
                  <td id="dpPopup1_prev" class="dp-cell dp-prev">«</td>
                  <td colspan="5" id="dpPopup1_cur" class="dp-cell dp-cur">September 2022</td>
                  <td id="dpPopup1_next" class="dp-cell dp-next">»</td>
                </tr>
              </tbody>
            </table>
            <table class="dp-monthtable monthtableBody" summary="September 2022" cellspacing="0" cellpadding="0" id="dpPopup1_tbl" style="-moz-user-select:none;-webkit-user-select:none;">
              <colgroup span="7"></colgroup>
              <tbody>
                <tr class="dp-days">
                  <th scope="col" class="dp-cell dp-dayh dp-cell dp-weekendh" title="Sunday">S</th>
                  <th scope="col" class="dp-cell dp-dayh" title="Monday">M</th>
                  <th scope="col" class="dp-cell dp-dayh" title="Tuesday">T</th>
                  <th scope="col" class="dp-cell dp-dayh" title="Wednesday">W</th>
                  <th scope="col" class="dp-cell dp-dayh" title="Thursday">T</th>
                  <th scope="col" class="dp-cell dp-dayh" title="Friday">F</th>
                  <th scope="col" class="dp-cell dp-dayh dp-cell dp-weekendh" title="Saturday">S</th>
                </tr>
                <tr style="cursor:pointer" id="dpPopup1_row_0">
                  <td id="dpPopup1_day_26901" class="dp-cell dp-weekend dp-offmonth dp-day-left ">21</td>
                  <td id="dpPopup1_day_26902" class="dp-cell dp-weekday dp-offmonth ">22</td>
                  <td id="dpPopup1_day_26903" class="dp-cell dp-weekday dp-offmonth ">23</td>
                  <td id="dpPopup1_day_26904" class="dp-cell dp-weekday dp-offmonth ">24</td>
                  <td id="dpPopup1_day_26905" class="dp-cell dp-weekday dp-offmonth ">25</td>
                  <td id="dpPopup1_day_26906" class="dp-cell dp-weekday dp-offmonth ">26</td>
                  <td id="dpPopup1_day_26907" class="dp-cell dp-weekend dp-offmonth dp-day-right ">27</td>
                </tr>
                <tr style="cursor:pointer" id="dpPopup1_row_1">
                  <td id="dpPopup1_day_26908" class="dp-cell dp-weekend dp-offmonth dp-day-left ">28</td>
                  <td id="dpPopup1_day_26909" class="dp-cell dp-weekday dp-offmonth ">29</td>
                  <td id="dpPopup1_day_26910" class="dp-cell dp-weekday dp-offmonth ">30</td>
                  <td id="dpPopup1_day_26911" class="dp-cell dp-weekday dp-offmonth ">31</td>
                  <td id="dpPopup1_day_26913" class="dp-cell dp-weekday-selected dp-onmonth-selected ">1</td>
                  <td id="dpPopup1_day_26914" class="dp-cell dp-weekday-selected dp-onmonth-selected ">2</td>
                  <td id="dpPopup1_day_26915" class="dp-cell dp-weekend-selected dp-onmonth-selected dp-day-right ">3</td>
                </tr>
                <tr style="cursor:pointer" id="dpPopup1_row_2">
                  <td id="dpPopup1_day_26916" class="dp-cell dp-weekend-selected dp-onmonth-selected dp-day-left ">4</td>
                  <td id="dpPopup1_day_26917" class="dp-cell dp-weekday-selected dp-onmonth-selected ">5</td>
                  <td id="dpPopup1_day_26918" class="dp-cell dp-weekday-selected dp-onmonth-selected ">6</td>
                  <td id="dpPopup1_day_26919" class="dp-cell dp-weekday-selected dp-onmonth-selected ">7</td>
                  <td id="dpPopup1_day_26920" class="dp-cell dp-weekday-selected dp-onmonth-selected ">8</td>
                  <td id="dpPopup1_day_26921" class="dp-cell dp-weekday-selected dp-onmonth-selected ">9</td>
                  <td id="dpPopup1_day_26922" class="dp-cell dp-weekend-selected dp-today-selected dp-onmonth-selected dp-day-right ">10</td>
                </tr>
                <tr style="cursor:pointer" id="dpPopup1_row_3">
                  <td id="dpPopup1_day_26923" class="dp-cell dp-weekend-selected dp-onmonth-selected dp-day-left ">11</td>
                  <td id="dpPopup1_day_26924" class="dp-cell dp-weekday-selected dp-onmonth-selected ">12</td>
                  <td id="dpPopup1_day_26925" class="dp-cell dp-weekday-selected dp-onmonth-selected ">13</td>
                  <td id="dpPopup1_day_26926" class="dp-cell dp-weekday-selected dp-onmonth-selected ">14</td>
                  <td id="dpPopup1_day_26927" class="dp-cell dp-weekday-selected dp-onmonth-selected ">15</td>
                  <td id="dpPopup1_day_26928" class="dp-cell dp-weekday-selected dp-onmonth-selected ">16</td>
                  <td id="dpPopup1_day_26929" class="dp-cell dp-weekend-selected dp-onmonth-selected dp-day-right ">17</td>
                </tr>
                <tr style="cursor:pointer" id="dpPopup1_row_4">
                  <td id="dpPopup1_day_26930" class="dp-cell dp-weekend-selected dp-onmonth-selected dp-day-left ">18</td>
                  <td id="dpPopup1_day_26931" class="dp-cell dp-weekday-selected dp-onmonth-selected ">19</td>
                  <td id="dpPopup1_day_26932" class="dp-cell dp-weekday-selected dp-onmonth-selected ">20</td>
                  <td id="dpPopup1_day_26933" class="dp-cell dp-weekday-selected dp-onmonth-selected ">21</td>
                  <td id="dpPopup1_day_26934" class="dp-cell dp-weekday-selected dp-onmonth-selected ">22</td>
                  <td id="dpPopup1_day_26935" class="dp-cell dp-weekday-selected dp-onmonth-selected ">23</td>
                  <td id="dpPopup1_day_26936" class="dp-cell dp-weekend-selected dp-onmonth-selected dp-day-right ">24</td>
                </tr>
                <tr style="cursor:pointer" id="dpPopup1_row_5">
                  <td id="dpPopup1_day_26937" class="dp-cell dp-weekend-selected dp-onmonth-selected dp-day-left ">25</td>
                  <td id="dpPopup1_day_26938" class="dp-cell dp-weekday-selected dp-onmonth-selected ">26</td>
                  <td id="dpPopup1_day_26939" class="dp-cell dp-weekday-selected dp-onmonth-selected ">27</td>
                  <td id="dpPopup1_day_26940" class="dp-cell dp-weekday-selected dp-onmonth-selected ">28</td>
                  <td id="dpPopup1_day_26941" class="dp-cell dp-weekday-selected dp-onmonth-selected ">29</td>
                  <td id="dpPopup1_day_26942" class="dp-cell dp-weekday-selected dp-onmonth-selected ">30</td>
                  <td id="dpPopup1_day_26945" class="dp-cell dp-weekend dp-offmonth dp-day-right ">1</td>
                </tr>
                <tr style="cursor:pointer" id="dpPopup1_row_6">
                  <td id="dpPopup1_day_26946" class="dp-cell dp-weekend dp-offmonth dp-day-left ">2</td>
                  <td id="dpPopup1_day_26947" class="dp-cell dp-weekday dp-offmonth ">3</td>
                  <td id="dpPopup1_day_26948" class="dp-cell dp-weekday dp-offmonth ">4</td>
                  <td id="dpPopup1_day_26949" class="dp-cell dp-weekday dp-offmonth ">5</td>
                  <td id="dpPopup1_day_26950" class="dp-cell dp-weekday dp-offmonth ">6</td>
                  <td id="dpPopup1_day_26951" class="dp-cell dp-weekday dp-offmonth ">7</td>
                  <td id="dpPopup1_day_26952" class="dp-cell dp-weekend dp-offmonth dp-day-right ">8</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div style="position: absolute; display: none; z-index: 25000003;"></div>
        
      <iframe id="apiproxyf433089ce0a29f7b58f52c6e928f4069e834e6b90.2348344856" name="apiproxyf433089ce0a29f7b58f52c6e928f4069e834e6b90.2348344856" src="https://clients6.google.com/static/proxy.html?usegapi=1&amp;jsh=m%3B%2F_%2Fscs%2Fabc-static%2F_%2Fjs%2Fk%3Dgapi.lb.en.z9QjrzsHcOc.O%2Fd%3D1%2Frs%3DAHpOoo8359JQqZQ0dzCVJ5Ui3CZcERHEWA%2Fm%3D__features__#parent=https%3A%2F%2Fcalendar.google.com&amp;rpctoken=798385249" tabindex="-1" aria-hidden="true" style="width: 1px; height: 1px; position: absolute; top: -100px; display: none;"></iframe>

    </body>
</html>