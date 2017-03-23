<?php 
session_start();

    $data = array();
    $errors = array(); 
    //echo '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.form.css"></head>';
    function generateFormToken($form) {
    
        // generate a token from an unique value, took from microtime, you can also use salt-values, other crypting methods...
      $token = md5(uniqid(microtime(), true));  
      
      // Write the generated token to the session variable to check it against the hidden field when the form is sent
      $_SESSION[$form.'_token'] = $token; 
      return $token;
    }
    
    function verifyFormToken($form) {
        
        // check if a session is started and a token is transmitted, if not return an error
      if(!isset($_SESSION[$form.'_token'])) { 
        return false;
        }
      
      // check if the form is sent with token in it
      if(!isset($_POST['token'])) {
        return false;
        }
      
      // compare the tokens against each other if they are still the same
      if ($_SESSION[$form.'_token'] !== $_POST['token']) {
        return false;
        }
      return true;
    }
    function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
   if (isset($_POST['submit']))

    { 
    if (verifyFormToken('form1')) {
      $name = check_input($_POST["name"]);
        $email = check_input($_POST["emailaddress"]);
        $message = check_input($_POST["message"]);
        $ForwardTo = 'tonyr@constructionofhope.org';
        $details='Name: '.$name."\n".'Email: '.$email."\n".'Message: '.$message."\n";

        $data['success'] = true;
        $data['message'] = 'Success!';
        mail($ForwardTo,"Construction of Hope Contact",$details,"From:$email");
        
    } else {
    
      $data['success'] = false;
        $data['errors']  = $errors;
        
    }
    exit('
      <body>

    <div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" style="top:4em">
      <div class="modal-header">
        <h4 class="modal-title" style="border-top:none; border-bottom:none; Color:#003D7A">Thanks for writing in!</h4>
      </div>
      <div class="modal-body">
        <p>Someone will get back to you within 24 hrs.<br><br> Blessings!<br><br>Construction of Hope Team </p>
      </div>
      <div class="modal-footer">
<form action="index.php" style="text-align:left">
    <button type="submit" class="btn btn-primary">Back to site</button>
</form>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>'
);
    }

?> <!doctype html><html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width,height=device-height,initial-scale=1,maximum-scale=1,user-scalable=no"><meta http-equiv="X-UA-Compatible" content="IE=EDGE"><!-- Latest compiled and minified CSS --><link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"><link rel="stylesheet" type="text/css" href="css/final.min.css"><link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" type="text/css"><title>Home</title></head> <?php
   // generate a new token for the $_SESSION superglobal and put them in a hidden field
  $newToken = generateFormToken('form1');  
?> <body id="#body"><!--container div required by bootstrap--><div class="sitewrapper"><div id="container" class="container-fluid"><nav id="drawer" class="comeout"></nav><div class="header-wrapper"><div id="COH" class="row"><div class="col-sm-12"><div class="col-sm-6 padding-right-off pull-left"><h3 class="text-left cohfont header-full"><a href="index.php">Construction of Hope</a></h3><h3 class="text-left cohfont-abbr header-abbr">COH</h3></div><!--end of 1st col 6 div--><div id="hammy" class="col-sm-2 pull-right"><a id="menu" class="hammy glyphicon glyphicon-menu-hamburger pull-right"></a></div><div id="big-menu" class="col-sm-6 pull-right"><ul class="main-menu-big"></ul></div><!--end of 2nd col 6 div--></div><!--end of col 12 div--></div><!--end of 1st row--><div id="IPWITH" class="row"><div class="col-sm-12"><div class="col-sm-2 padding-right-off pull-left upsome"><h6 class="text-right ipwith font-roboto-light-heading">IN PARTNERSHIP WITH</h6></div><div class="col-sm-10 pull-left padding-left-off upsome"><img src="images/lifesongSharp.png" class="pull-left img-responsive"></div></div><!--end col 12 div--></div><!--end 2nd row--></div><!-- End of header wrapper --><div id="bannerplace" class="row"><div class="col-sm-12 banner"><div data-bind="if: documentReady, visible: show" class="center-fly"><h2><span class="font-roboto-light">That the</span><span> Forgotten</span><span class="font-roboto-light"> Be</span><span> Found </span><a href="news.php"><button type="button" class="btn btn-primary font-roboto-light btn-main-coh">See the Work</button></a></h2></div><div class="after border"></div></div></div><!--end of row 3--><div id="mission" class="row"><div class="mission-wrapper"><div id="wrapper" class="table-responsive col-sm-12 center-table table-bg"><h2 class="text-center font-roboto-bold page-title">OUR MISSION</h2><h4 class="text-center font-roboto-bold">Equipping disadvantaged families to succeed through:</h4><table class="table center-table"><tr><td class="table-text-left-left font-roboto-light">Biblical Evangelism</td><td class="table-text-left-right font-roboto-light">Indigenous Leadership</td></tr><tr><td class="table-text-left-left font-roboto-light">Messiah's Love</td><td class="table-text-left-right font-roboto-light">Discipleship</td></tr><tr><td class="table-text-left-left font-roboto-light">Christian Education</td><td class="table-text-left-right font-roboto-light">Sustainable Business</td></tr></table><!-- <div class='sponsor-wrap'>
            <button type="button" class="btn btn-primary font-roboto-light btn-donate">Sponsor a Child</button>
          </div> --></div><h2 class="text-center scripture"><span class="text">To loose the bonds of injustice...to let the oppressed go free<span><br><span class="isaiah">-Isaiah 58:6-</span></span></span></h2></div></div><!-- donate section --><div id="donate-section" class="row"><div class="col-sm-12"><div class="donate-wrap"><a href="donate.php"><button type="button" class="btn btn-primary font-roboto-light btn-donate">DONATE</button></a></div></div></div><!--end of row 4--><div id="links" class="row"><div class="front-page-bottom-pics-wrapper"><div class="col-sm-12 bottompics"></div></div></div><!--end of row 5--><!--Inspiration and some markup for contact form modified from Light Up the Dark LLC Belton, MO--><div id="contact"><div class="contact-wrapper"><h3 class="text-left font-roboto-bold contact-format">Let's Connect</h3><!--Markup for Contact form--><form action="index.php" method="post" class="contact-format"><div class="form-group row"><div class="fields col-sm-4"><p><input type="text" class="form-control input-height" name="name" placeholder="Name" required></p><br><p><input type="email" class="form-control input-height" name="emailaddress" placeholder="Email" required></p><br></div><div class="col-sm-4 text-submit"><textarea class="center" cols="53" rows="10" name="message" placeholder="What's on your mind?"></textarea><p><input type="hidden" name="token" value="<?php echo $newToken; ?>"></p><p><button type="submit" name="submit" class="btn btn-primary button send">Send</button></p></div><div class="col-sm-4 phone-address"><!--               <h4>Email</h4>
            <p>
                English - <a href="mailto:jasong@constructionofhope.org">jasong@constructionofhope.org</a>
                <br>
                <br>
                Thai - <a href="mailto:vinoisblessed@gmail.com">vinoisblessed@gmail.com</a>
                <br>
                <br>
                Khmer - <a href="mailto:somnangs@constructionofhope.org">somnangs@constructionofhope.org</a>
            </p> --><h4>Location</h4><ul><li>Fellowship Church of Pochentong<br>Sangkat Kakab, Khan Dangkor<br>Phnom Penh, Cambodia<br></li><li>Lifesong For Orphans<br>PO Box 40<br>Gridley, IL 61744<br></li><li>In Christ Church International<br>Samut Prakan, Thailand</li></ul></div></div></form></div></div><!--end of row 6--><footer id="footer" class="row"><ul id="footerContacts" class="flex-box ulgeneral"></ul></footer><!--end of row 7--></div><!--end container--><div id="c-mask" class="c-mask"></div><!-- /c-mask --><!--site wrapper close div--></div></body><script src="js/final.min.js"></script><script type="text/javascript" async>var randomBanner = function (x) {
        var randomfromarray = function (array){
          return array[Math.floor(Math.random() * array.length)]
          };
      var bannerPics = ['images/banner1.jpg','images/banner2.jpg', 'images/banner3.jpg'];
      var images = randomfromarray(bannerPics);
      $('.banner').css({'background-image': 'url(' + images + ')'});
      };
      randomBanner();</script></html>