<?php 
session_start();

    $data = array();
    $errors = array(); 
    echo '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.form.css"></head>';
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

?> <?php
//$feed = file_get_contents("https://api.instagram.com/v1/users/self/media/recent/?access_token=1965235043.f3e333b.e898493cfa6143dda4098fa3192302b9");
//$feed = @json_decode($feed, true);
//$created_on = $feed['data'][0]['created_time'];
//echo date('M j, Y', $created_on);
?> <!doctype html><html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width,height=device-height,initial-scale=1,maximum-scale=1,user-scalable=no"><meta http-equiv="X-UA-Compatible" content="IE=EDGE"><!-- Latest compiled and minified CSS --><link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"><link rel="stylesheet" type="text/css" href="css/final.min.css"><link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" type="text/css"><title>Donate</title></head> <?php
   // generate a new token for the $_SESSION superglobal and put them in a hidden field
  $newToken = generateFormToken('form1');  
?> <body id="#body"><!--container div required by bootstrap--><div class="sitewrapper"><div id="container" class="container-fluid"><nav id="drawer" class="comeout"></nav><div class="header-wrapper"><div id="COH" class="row"><div class="col-sm-12"><div class="col-sm-6 padding-right-off pull-left"><h3 class="text-left cohfont header-full"><a href="index.php">Construction of Hope</a></h3><h3 class="text-left cohfont-abbr header-abbr">COH</h3></div><!--end of 1st col 6 div--><div id="hammy" class="col-sm-2 pull-right"><a id="menu" class="hammy glyphicon glyphicon-menu-hamburger pull-right"></a></div><div id="big-menu" class="col-sm-6 pull-right"><ul class="main-menu-big"></ul></div><!--end of 2nd col 6 div--></div><!--end of col 12 div--></div><!--end of 1st row--><div id="IPWITH" class="row"><div class="col-sm-12"><div class="col-sm-2 padding-right-off pull-left upsome"><h6 class="text-right ipwith font-roboto-light-heading">IN PARTNERSHIP WITH</h6></div><div class="col-sm-10 pull-left padding-left-off upsome"><img src="images/lifesongSharp.png" class="pull-left img-responsive"></div></div><!--end col 12 div--></div><!--end 2nd row--></div><div id="donate-page" class="border_news"><div class="row"><div class="col-sm-12 donate-heading"><h1 class="font-roboto-bold">Giving to Construction of Hope</h1><p>Construction of Hope Ministries is a sponsored ministry project of <a href="http://www.lifesongfororphans.org/">Lifesong for Orphans</a>, a registered 501(c)(3) organization in the U.S. Any gift given through Lifesong is tax deductible in the US.</p><p>100% of all donations given to Lifesong Cambodia - Construction of Hope Ministries will be used to run Cambodian outreach ministry projects. Lifesong and/or Construction of Hope Ministries does not take an administration fee from donors. The only fees taken are the processing fees charged by Paypal and any bank related fees for the international transfer. Click the link below to see the monthly expense/project reports for the ministry.</p><h4><a href="https://drive.google.com/folderview?id=0B8hPTOpaYgZBTTRuczc5THBuSUU&usp=sharing">Financial Reports</a></h4></div></div><div class="row donate-onetime"><div class="col-sm-12 sponsor-wrap donate-cta"><h2 class="font-roboto-bold">One-time Gifts</h2><div class="sponsor-wrap"><a href="https://www.lifesongfororphans.org/give/donate/?gift=3&orphan_care=3"><button type="button" class="btn btn-primary font-roboto-light btn-donate">Give Online</button></a><p class="note">*Select Cambodia-Construction of Hope under “Orphan Care Gift Preference: Country”</p></div><h3 class="font-roboto-bold">Send a Check to:</h3><p>Lifesong For Orphans<br>PO Box 40<br>Gridley, IL 61744</p><p class="note">*Make sure to include Lifesong Cambodia or Construction of Hope in the Memo.</p></div></div><div class="row donate-recurring"><div class="col-sm-12 donate-recurring-online"><h2 class="font-roboto-bold">Recurring Gifts</h2><div class="sponsor-wrap"><a href="https://www.lifesongfororphans.org/give/donate/?gift=3&orphan_care=3&recurring=1"><button type="button" class="btn btn-primary font-roboto-light btn-donate">Monthly Gift Online</button></a></div></div><div class="col-sm-12 donate-recurring-eft"><h3 class="font-roboto-bold">Electronic Monthly Transfer</h3><p><a class='et-link' href="http://www.lifesongfororphans.org/wp-content/uploads/2016/07/monthly-giving-form.pdf">Complete this form</a> and email to:</p><ul><li><a href="info@lifesongfororphans.org">info@lifesongfororphans.org</a></li><li>309.747.4527</li></ul></div></div><div class="row donate-ct-sponsorship-row"><div class="col-sm-12 donate-ct-sponsorship"><div class="col-sm-6 donate-ct"><h2 class="font-roboto-bold">Cambodia/Thailand Gifts</h2><h3 class="font-roboto-bold">Thailand</h3><p>Contact Jason Glass</p><p><a href="mailto:jasong@constructionofhope.org">jasong@constructionofhope.org</a></p><p>International transfers to the church are performed once or twice a month for our Thailand-based donors. Donations given in Thailand are not tax deductible at this time. We hope to offer tax deductible status to our Thailand based donors soon.</p><h3 class="font-roboto-bold">Cambodia</h3><p>Contact Pastor Somnang</p><p><a href="mailto:somnangs@constructionofhope.org">somnangs@constructionofhope.org</a></p><p>Fellowship Church of Pochentong<br>No.331, St. 2011<br>Sangkat Kakab, Khan Dangkor<br>Phnom Penh, Cambodia<br>(855) 92589018</p><p>Let them know you would like to contribute to Construction of Hope Ministries.</p></div><div class="col-sm-6 donate-sponsorship"><h2 class="font-roboto-bold">Child Sponsorship</h2><p>Construction of Hope is happy to be under the covering of Lifesong for Orphans. Thus, all gifts going towards child sponsorship must be specified as such through the lifesong giving process. Simply insert the name of the child you would like to sponsor in the memo field and your gift will be used to support that child. Follow the link below to learn more</p><h4><a href="sponsor.php">Sponsor a Child</a></h4></div></div></div><!--end #donate-page--></div><!--end #donate-page--><!-- donate section --><!--   <div id='donate-section' class='row'>
    <div class='col-sm-12 donate-wrap'>
      <div class='donate-wrap'>
      <button type="button" class="btn btn-primary font-roboto-light btn-donate">DONATE</button>
    </div>
    </div>
  </div>
    <div id='links' class='row'>
      <div class='col-sm-12 bottompics'>
      </div>
    </div> --><!--end of row 5--><footer id="footer" class="row"><ul id="footerContacts" class="flex-box ulgeneral"></ul></footer><!--end of row 7--></div><!--end container--><div id="c-mask" class="c-mask"></div><!-- /c-mask --><!--site wrapper close div--></div></body><script src="js/final.min.js"></script></html>