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
        $ForwardTo = 'nathan.bateman.jr@gmail.com';
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
<html lang='en'>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=EDGE">
  <!-- Latest compiled and minified CSS -->
  <link rel="shortcut icon" href="http://cdn.sstatic.net/stackoverflow/img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" type="text/css">
  <title>COHProjects</title>
</head>
<?php
   // generate a new token for the $_SESSION superglobal and put them in a hidden field
  $newToken = generateFormToken('form1');  
?>
<body id="#body">
  <!--container div required by bootstrap-->
  <div class='sitewrapper'>
      <div id='container' class="container-fluid">
        
        <nav id='drawer' class='comeout'>
        </nav>
   
        <div id='COH' class='row'>
          <div class="col-sm-12">
        <div class='col-sm-6 padding-right-off pull-left'>
          <h3 data-bind="if: regscreen" class='text-left cohfont'><a href="index.php">Construction of Hope</a> </h3>
          <h3 data-bind="ifnot: regscreen" class='text-left cohfont-abbr'><a href="index.php">COH</a> </h3>
        </div>
    <!--end of 1st col 6 div-->
    <div id='hammy' class='col-sm-2 pull-right'>
      <a id='menu' class="hammy glyphicon glyphicon-menu-hamburger pull-right">
      </a>
            
        </div>
      <!--end of 2nd col 6 div-->
        </div>
        <!--end of col 12 div-->
      </div>
      <!--end of 1st row-->
    <div id='IPWITH' class='row'>
      <div class='col-sm-12'> 

    <div class='col-sm-2 padding-right-off pull-left upsome'>
          <h6 class='text-right ipwith font-roboto-light-heading'>IN PARTNERSHIP WITH</h6>
        </div>
    <div class='col-sm-10 pull-left padding-left-off upsome'>
      <img src="images/lifesong.png" class='pull-left img-responsive'>
    </div>    
      </div>
      <!--end col 12 div-->
    </div>  
    <!--end 2nd row-->
    <div id='bannerplace' class='row'>
      <div class='col-sm-12 banner'>
        <div data-bind="if: documentReady, visible: show" class='center-fly-other'>
          <h2><span class="font-roboto-light"> Striving for</span><p></p><span> Service</span><span class="font-roboto-light"> to please the Father</span></h2>
        </div>
        <div class='after border'>
        </div>
      </div>
    </div>
    <!--end of row 3-->
    <div id='mission' class='row'>
        <div id='wrapper' class="col-sm-12 center content-bg">
          <h2 class='text-center font-roboto-bold page-title'>PROJECTS</h2>
          <span class='format-options'>
            <h3 data-bind="click:changeOne, style: { textDecoration: oneActive() ? 'underline' : 'none'}" class='text-center font-roboto' style="cursor:pointer;">Bangkok</h3>
            <h3 data-bind="click:changeTwo, style: { textDecoration: twoActive() ? 'underline' : 'none'}" class='text-center font-roboto' style="cursor:pointer;">Phnom Penh</h3>
          </span>
          <hr>
     <div data-bind="if: oneActive" class='center'>
        <div class='row'>
          <div class='col-sm-12 images-pp'>
            <div class='col-sm-4'>
              <img src="http://placehold.it/195x250" data-toggle="modal" data-target="#project2">
              <h4>Children living at the Church</h4>
            </div>
            <div class='col-sm-4'>
              <img src="http://placehold.it/195x250" data-toggle="modal" data-target="#project2">
              <h4>Sustainable Business</h4>
            </div>
            <div class='col-sm-4'>
              <img src="http://placehold.it/195x250">
              <h4>Outreach to local Children</h4>
            </div>
          </div>
          </div> 
        </div>
     <div data-bind="if: twoActive" class='center'>
            <div class='row'>
              <div class='col-sm-12 images-pp'>
                <div class='col-sm-4'>
                  <img src="http://placehold.it/195x250">
                  <h4>Children living at the Church</h4>
                </div>
                <div class='col-sm-4'>
                  <img src="http://placehold.it/195x250">
                  <h4>Sustainable Business</h4>
                </div>
                <div class='col-sm-4'>
                  <img src="http://placehold.it/195x250">
                  <h4>Outreach to local Children</h4>
                </div>
              </div>
            </div> 
          </div>
      </div>
        <h2 class="text-center scripture">
          <span class='text'>To loose the bonds of injustice...to let the oppressed go free<span> <br><span class='isaiah'>-Isaiah 58:6-</span>
        </h2>
    </div>  
    <!--end of row 4-->
    <div id='links' class='row'>
      <div class='col-sm-12 bottompics'>
      </div>
    </div>
    <!--end of row 5-->
    <!--Inspiration and some markup for contact form modified from Light Up the Dark LLC Belton, MO-->
    <div id='contact'>
      <h3 class='text-left font-roboto-bold contact-format'>Let's Connect</h3>
      <!--Markup for Contact form-->
        <form action='index.php' method='post' class='contact-format'>
          <div class="form-group row">
            <div class='fields col-sm-4'>
              <p>
                  <input type="text" class="form-control input-height" name='name' placeholder="Name" required>
              </p>
                  <br>
              <p>
                  <input type="email" class="form-control input-height" name='emailaddress' placeholder="Email" required>
              </p>
                  <br>
            </div>
            <div class='col-sm-4 text-submit'>
                <textarea class='center' cols='53' rows='10' name='message' placeholder="What's on your mind?"></textarea>
              <p>
                  <input type="hidden" name="token" value="<?php echo $newToken; ?>"></p>
              <p>
                  <button type="submit" name='submit' class="btn btn-primary button send">Send</button>
              </p>
            </div>
            <div class='col-sm-4 phone-address'>
                <h4>Phone</h4>
              <p>
                  USA - (555)-121-5555
                  <br>
                  THA - (555)-121-5555
                  <br>
                  KHB - (555)-121-5555
              </p>
                <h4>Location</h4>
              <p>
                  34509 BassFish Road
                  <br>
                  Topwater Jig, MO
                  <br>
                  44567
              </p>
            </div>
          </div>
        </form>
    </div>
    <!--end of row 6-->

    <footer id='footer' class="row">
    <ul id="footerContacts" class="flex-box ulgeneral">
        </ul>
    </footer>
    <!--end of row 7-->

      </div>
            <!--end container-->
      <div class="modal fade" id="project5" tabindex="-1" role="dialog" aria-labelledby="p5" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="p5">Neighborhood Map</h4>
      </div>
      <div class="modal-body">
        <img class="img-responsive" src="images/project5.png" alt='google map pic'>
        This was the fifth project in the curriculum and involved a ground-up production of a neighborhood map using the Google Maps API as well as one additional API (Foursquare was my choice). The app is set up to aquaint new teachers to the common places in the Bangkok area. Users may search for places in the search bar, or select the venues tag to browse common places in Bangkok where expats frequently need to find. The information window then shows an image from foursquare and a link to the venue's website. The project involved using the Knockout.js to take advantage of observables and the MVVM design pattern. jQuery, Bootstrap, and CSS are all used.
      </div>
      <div class="modal-footer">
        <a href="http://nathan-bateman.github.io/project5/">
        <button type="button" class="btn btn-default leftbutton" role="button">View Project</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

     <div id="c-mask" class="c-mask"></div><!-- /c-mask -->
    <!--site wrapper close div-->
</div>
</body>
<script src='js/knockout-3.3.0.js'></script>
<script src='js/jQuery.js'></script>
<!-- <script src='js/bootstrap.min.js'></script> -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!--<script src='js/bootstrap.js'></script>-->
<script src='js/main.js'></script>


</html>