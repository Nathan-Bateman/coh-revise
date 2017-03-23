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

?>
<!doctype html>
<html lang=en>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8" />
<meta name=viewport content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv=X-UA-Compatible content="IE=EDGE">
<link rel="shortcut icon" href=images/favicon.ico type=image/x-icon>
<link rel=stylesheet type=text/css href=css/final.min.css>
<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700" rel=stylesheet type=text/css>
<title>About</title>
</head>
<?php
   // generate a new token for the $_SESSION superglobal and put them in a hidden field
  $newToken = generateFormToken('form1');  
?>
<body id=#body>
<div class=sitewrapper>
<div id=container class=container-fluid>
<nav id=drawer class=comeout>
</nav>
<div class=header-wrapper>
<div id=COH class=row>
<div class=col-sm-12>
<div class='col-sm-6 padding-right-off pull-left'>
<h3 class='text-left cohfont header-full'><a href=index.php>Construction of Hope</a></h3>
<h3 class='text-left cohfont-abbr header-abbr'>COH </h3>
</div>
<div id=hammy class='col-sm-2 pull-right'>
<a id=menu class="hammy glyphicon glyphicon-menu-hamburger pull-right">
</a>
</div>
<div id=big-menu class='col-sm-6 pull-right'>
<ul class=main-menu-big>
</ul>
</div>
</div>
</div>
<div id=IPWITH class=row>
<div class=col-sm-12>
<div class='col-sm-2 padding-right-off pull-left upsome'>
<h6 class='text-right ipwith font-roboto-light-heading'>IN PARTNERSHIP WITH</h6>
</div>
<div class='col-sm-10 pull-left padding-left-off upsome'>
<img src=images/lifesongSharp.png class='pull-left img-responsive'>
</div>
</div>
</div>
</div>
<div id=bannerplace class=row>
<div class='col-sm-12 banner'>
<div data-bind="if: documentReady, visible: show" class=center-fly-other>
<h2><span class=font-roboto-light> God-Centered</span><span> Indigenous</span><span class=font-roboto-light> Missions</span></h2>
</div>
<div class='after border'>
</div>
</div>
</div>
<div id=mission class=row>
<div class=mission-wrapper>
<div id=wrapper class="col-sm-12 center content-bg">
<h2 class='text-center font-roboto-bold page-title'>ABOUT</h2>
<span class=format-options>
<h3 data-bind="click:changeTwo, css:{ formatOptionsToggle: twoActive()}" class='text-center font-roboto' style=cursor:pointer>Info</h3>
<h3 data-bind="click:changeOne, css:{ formatOptionsToggle: oneActive()}" class='text-center font-roboto' style=cursor:pointer>Folks</h3>
</span>
<hr>
<div data-bind="if: twoActive,fadeVisible: twoActive" class='center info-wrapper'>
<p class=center-content>
<span style=font-weight:bold>History: </span>Construction of Hope began in 2012 in Thailand with the desire to share God’s love with migrant construction workers from Cambodia. This desire developed into partnerships with indigenous churches in Thailand and Cambodia to provide education, discipleship, and holistic care for children and to support families through biblical teaching and sustainable business opportunities.
</p>
<br>
<br>
<p class=center-content>
<span style=font-weight:bold>Mission: </span>Empowered by Christ’s love, we partner with indigenous leaders in Thailand and Cambodia to share the Gospel, disciple, and develop sustainable opportunities for disadvantaged men, women, and children.
</p>
<br>
<br>
<p class=center-content>
<span style=font-weight:bold>Vision: </span>To continue in expanding current projects through additional facilities to accommodate more children in need, to see young leaders discipled and sent out from current projects to new areas, and to continuously support and build a network of indigenous leaders.
</p>
</div>
<div data-bind="if: oneActive,fadeVisible: oneActive" class='center folks-wrapper'>
<div class=row>
<div class='col-sm-6 folks'>
<img class=img-responsive src=images/somnang.jpg>
<h4>Sin Somnang <a href=mailto:somnangsmile@gmail.com><span class="glyphicon glyphicon-envelope"></span></a></h4>
<h5>Indigenous Pastor - Cambodia
</h5>
</div>
<div class=col-sm-6>
<p>Pastor Somnang Sin is the Senior Pastor of Fellowship Church of Pochentong. He has served in that capacity since 2003. Pastor Somnang has a Bachelor's Degree in Khmer Literature from the Royal University of Phnom Penh and a Master of Religious Education from Asia Biblical Theological Seminary of Cornerstone University. He was born and raised in Phnom Penh. He became a Christian in 1995 and God has placed a real burden on his heart for the poor, needy and uneducated in his community. He believes that educating his people, with a biblical foundation, is the key to rebuilding Cambodia. He has a wife, Lean Chanthy, and a son, Seng Josiah.
</p>
</div>
</div>
<div class=row>
<div class='col-sm-6 folks'>
<img class=img-responsive src=images/vino.jpg>
<h4>Jatupong (Vino) Srikhao <a href=mailto:vinoisblessed@gmail.com><span class="glyphicon glyphicon-envelope"></span></a></h4>
<h5>Indigenous Pastor - Thailand
</h5>
</div>
<div class=col-sm-6>
<p>Pastor Vino became a Christian in 2005 and has been a pastor since 2012 when he planted what is now In Christ Church International. He has a vision and heart for the poor and migrant workers in Thailand. He believes in the guidance and power of the Holy Spirit in all aspects of his ministry. Pastor Vino also has a burden for Thai people who are living overseas. Pastor Vino and his wife, Vicky, live in Bangpli, just outside of Bangkok.
</p>
</div>
</div>
<div class=row>
<div class='col-sm-6 folks'>
<img class=img-responsive src=images/jasong.jpg>
<h4>Jason Glass <a href=mailto:jason_glass@constructionofhope.org><span class="glyphicon glyphicon-envelope"></span></a></h4>
<h5>Country Director
</h5>
</div>
<div class=col-sm-6>
<p>Jason Glass was born and raised in North Carolina, graduated from Liberty University with a degree in education in 2008, and immediately began teaching in Bangkok, Thailand. With the vision of one day being part of starting a school, Jason completed a graduate program online through Liberty University and earned a Master’s degree in Educational Administration while teaching English at a small Thai school to grades kindergarten through grade six, before moving to International Community School to teach middle school Science. After teaching Science for four years, Jason is currently teaching middle school PE and Bible. While Jason’s desire for working overseas in missions stems from his childhood, his burden for migrant construction workers was formed after a prayer in the summer of 2012 for the Lord to give vision for his future led him to a construction site full of children near his home. Jason currently resides in Bangna, Bangkok with his wife, Christy, and daughter, Malia.
</p>
</div>
</div>
<div class=row>
<div class='col-sm-6 folks'>
<img class=img-responsive src=images/tony.jpg>
<h4>Tony Randall <a href=mailto:randalltr@msn.com><span class="glyphicon glyphicon-envelope"></span></a></h4>
<h5>North American Liason
</h5>
</div>
<div class=col-sm-6>
<p>Tony Randall was born and raised on the west coast of the United States. He has an undergrad degree in Business Administration from Western Baptist College (Corban University) and a Master's in Teaching from Willamette University. Tony is an ordained minister through Commission Ministers Network. Education is a second career for Tony; he worked for a software development company prior to becoming a teacher. After teaching for 5 years in public schools, he was called into Christian education. That call brought he and his family (wife Angela and 2 kids Alathea and Azariah) to Bangkok, Thailand. Tony worked at International Community School as a high school math/computer teacher for four years. His family grew by one while living oversees, for his third child (Zechariah) was born in Bangkok. Tony has recently been called back to the US and is currently working as a 7th Grade Teacher at Native American Christian Academy in Arizona.
</p>
</div>
</div>
<div class=row>
<div class='col-sm-6 folks'>
<img class=img-responsive src=images/jasons.jpg>
<h4>Jason Son <a href=mailto:jason.son@yisseoul.org><span class="glyphicon glyphicon-envelope"></span></a></h4>
<h5>Board Member
</h5>
</div>
<div class=col-sm-6>
<p>Jason Son fully committed his life to the Lord while attending the University of Calgary in Calgary, Alberta, Canada. He received a degree in Mathematics as well as one in Education and during the course of a few mission trips to Thailand, he felt the Lord prompting him to move there permanently. Jason has been working in Thailand since 2011, but in July of 2016 will be moving to Seoul, South Korea with his fiance, Joanne Benjathikul.
</p>
</div>
</div>
</div>
</div>
<h2 class="text-center scripture"><span class=text>To loose the bonds of injustice...to let the oppressed go free<span> <br><span class=isaiah>-Isaiah 58:6-</span>
</h2>
</div>
</div>
<div id=donate-section class=row>
<div class='col-sm-12 donate-wrap'>
<div class=donate-wrap>
<a href=donate.php><button type=button class="btn btn-primary font-roboto-light btn-donate">DONATE</button></a>
</div>
</div>
</div>
<div id=links class=row>
<div class='col-sm-12 bottompics'>
</div>
</div>
<div id=contact>
<div class=contact-wrapper>
<h3 class='text-left font-roboto-bold contact-format'>Let's Connect</h3>
<form action=index.php method=post class=contact-format>
<div class="form-group row">
<div class='fields col-sm-4'>
<p>
<input type=text class="form-control input-height" name=name placeholder=Name required>
</p>
<br>
<p>
<input type=email class="form-control input-height" name=emailaddress placeholder=Email required>
</p>
<br>
</div>
<div class='col-sm-4 text-submit'>
<textarea class=center cols=53 rows=10 name=message placeholder="What's on your mind?"></textarea>
<p>
<input type=hidden name=token value=<?php echo $newToken; ?>></p>
<p>
<button type=submit name=submit class="btn btn-primary button send">Send</button>
</p>
</div>
<div class='col-sm-4 phone-address'>
<h4>Location</h4>
<ul>
<li> Fellowship Church of Pochentong<br>
Sangkat Kakab, Khan Dangkor<br>
Phnom Penh, Cambodia<br>
</li>
<li> Lifesong For Orphans<br>
PO Box 40<br>
Gridley, IL 61744<br>
</li>
<li> In Christ Church International<br>
Samut Prakan, Thailand
</li>
</ul>
</div>
</div>
</form>
</div>
</div>
<footer id=footer class=row>
<ul id=footerContacts class="flex-box ulgeneral">
</ul>
</footer>
</div>
<div id=c-mask class=c-mask></div>
</div>
</body>
<script src=js/final.min.js></script>
<script type=text/javascript async>var randomBanner=function(b){var d=function(e){return e[Math.floor(Math.random()*e.length)]};var c=["images/banner1.jpg","images/banner2.jpg","images/banner3.jpg"];var a=d(c);$(".banner").css({"background-image":"url("+a+")"})};randomBanner();</script>
</html>