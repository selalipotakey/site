<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Newsletter</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <style>
      header:before {
        left: 0;
        right: 0;
      }
    </style>
  </head>

  <body>
    
    <?php include "./includes/header.html" ?>
  
    <main>

      <?php include "./includes/dropdown.html" ?>



      <!-- Begin Mailchimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/classic-071822.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
            We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div id="mc_embed_signup">
            <form action="https://docfilms.us2.list-manage.com/subscribe/post?u=96a1ccbd94eca82ffd0c80138&amp;id=adc33c78ac&amp;f_id=00d7c2e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                <h2>Join the Doc Mailing List!</h2>
                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
        <div class="mc-field-group">
            <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
        </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required>
            <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
        </div>
        <div class="mc-field-group">
            <label for="mce-FNAME">First Name </label>
            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
            <span id="mce-FNAME-HELPERTEXT" class="helper_text"></span>
        </div>
        <div class="mc-field-group">
            <label for="mce-LNAME">Last Name </label>
            <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
            <span id="mce-LNAME-HELPERTEXT" class="helper_text"></span>
        </div>
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_96a1ccbd94eca82ffd0c80138_adc33c78ac" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    <!--End mc_embed_signup-->

    </main>
    
    <?php include "./includes/footer.html" ?>

  </body>
</html>