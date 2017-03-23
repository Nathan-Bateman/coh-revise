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
<html lang='en'>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=EDGE">
  <!-- Latest compiled and minified CSS -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/final.min.css">
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" type="text/css">
  <title>Projects</title>
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
 <div class='header-wrapper'>
      <div id='COH' class='row'>
        
        <div class="col-sm-12">
          <div class='col-sm-6 padding-right-off pull-left'>
            <h3 class='text-left cohfont header-full'><a href="index.php">Construction of Hope</a></h3>
            <h3 class='text-left cohfont-abbr header-abbr'>COH </h3>
          </div>
  <!--end of 1st col 6 div-->
          <div id='hammy' class='col-sm-2 pull-right'>
            <a id='menu' class="hammy glyphicon glyphicon-menu-hamburger pull-right">
            </a>    
          </div>
          <div id='big-menu' class='col-sm-6 pull-right'>
            <ul class='main-menu-big'>
            </ul>
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
          <img src="images/lifesongSharp.png" class='pull-left img-responsive'>
        </div>    
      </div>
    <!--end col 12 div-->
  </div>  
  <!--end 2nd row-->
  </div>
    <!-- End of header wrapper --> 
    <!--end 2nd row-->
    <div id='bannerplace' class='row'>
      <div class='col-sm-12 banner'>
        <div data-bind="if: documentReady, visible: show" class='center-fly-other'>
          <h2><span class="font-roboto-light"> Striving for</span><span> Service</span><span class="font-roboto-light"> to please the Father</span></h2>
        </div>
        <div class='after border'>
        </div>
      </div>
    </div>
    <!--end of row 3-->
    <div id='mission' class='row'>
      <div class='mission-wrapper'>
        <div id='wrapper' class="col-sm-12 center content-bg">
          <h2 class='text-center font-roboto-bold page-title'>PROJECTS</h2>
          <span class='format-options'>
            <h3 data-bind="click:changeTwo, css:{ formatOptionsToggle: twoActive()}" class='text-center font-roboto' style="cursor:pointer;">Cambodia</h3>
            <h3 data-bind="click:changeOne, css:{ formatOptionsToggle: oneActive()}" class='text-center font-roboto' style="cursor:pointer;">Thailand</h3>
            <!-- <h3 data-bind="click:changeThree, css:{ formatOptionsToggle: threeActive()}" class='text-center font-roboto' style="cursor:pointer;">Takeo</h3> -->
          </span>
          <hr>
     <div data-bind="if: oneActive,fadeVisible: oneActive" class='center thailand-projects'>
      <div class='row'>
              <div class='col-sm-12'>
                <ul class='sub-menu'>
                  <li class='sub-menu-item'><h6></h6></li>
                  <li class='sub-menu-item'><h6>Bang Pli</h6></li>
                  <li class='sub-menu-item'><h6></h6></li>
                </ul>
              </div>
            </div>
            <div class='row'>
              <div class='col-sm-12 images-bkk'>
                <div class='col-sm-4'>
                  <span data-toggle="modal" data-target="#ministry" data-title="Indigenous Outreach" data-img="images/indigenousOutreachBig.jpg" data-linkone="news.php" data-linkonetitle="Latest News" data-captionone="Pastor Vino and his team are involved in a number of outreach activities that serve the families of the children in the school and other adults in the community, particularly those on construction sites. Activities include offering Thai language classes on construction sites after working hours, occasionally serving meals on construction sites, leading worship services on sites as well as regular worship services and meals held at the church with times that accommodate the majority of the workers. Parents are also welcomed and encouraged to attend the bi-monthly day trips the children take to the beach or park." data-captiontwo="" data-captionthree=''>
                    <img class='img-responsive' src="images/indigenousOutreachSmall.jpg">
                    <h4>Indigenous Outreach</h4>
                  </span>
                </div>
                <div class='col-sm-4'>
                  <span data-toggle="modal" data-target="#ministry" data-title="Community Education" data-img="images/learningCenterBig.jpg" data-linkone="donate.php" data-linkonetitle="Support Education" data-captionone="In October 2014, Pastor Vino started a learning center at his church for the children of migrant construction workers. Beginning with 4 Cambodian children, the school now includes children from Cambodia, Myanmar, and Pakistan. Currently, an average of 25 children come daily to the church from 8:30-4:30 to learn a variety of subjects including Thai language, Bible, math, physical education and life skills. The children are provided with two meals a day, fresh fruit, and vitamins. Every couple of months, the church takes the children on a field trip, such as the beach or the park. On Saturdays, an English class is led by a group of American missionaries and teachers. A very practical way to support this work is through donations to purchase educational resources. We would love to hear from you if you are interested in partnering with us in this way. Click the below to donate to this cause." data-captiontwo="" data-captionthree="">
                    <img class='img-responsive' src="images/learningCenterSmall.jpg">
                    <h4>Learning Center</h4>
                  </span>
                </div>
                <div class='col-sm-4'>
                  <span data-toggle="modal" data-target="#ministry" data-title="Leadership Training" data-img="images/leadershipTrainingBig.jpg" data-linkone="news.php" data-linkonetitle="Latest News" data-captionone="An extension of the school, Pastor Vino has begun a leadership program with a group of the older children to train and disciple them to take initiative and responsibility in helping others. This group of young leaders are given specific responsibilities and opportunities within the church and school, including helping teach the younger children, financial management training, and joining the adult leaders in various outreach ministries and weekend retreats. The vision and goals for this ministry is to raise up key leaders who will help break generational strongholds with the power of the Gospel." data-captiontwo='' data-captionthree=''>
                    <img class='img-responsive' src="images/leadershipTrainingSmall.jpg">
                    <h4>Leadership Training</h4>
                  </span>
                </div>
              </div>
            </div>
<!--             <div class='row'>
              <div class='col-sm-12 images-bkk'>
                <div class='col-sm-4'>
                  <span data-toggle="modal" data-target="#ministry" data-title="Making Connections" data-img="images/makingConnectionsBig.jpg" data-linkone="news.php" data-linkonetitle="Latest News" data-captionone="Our ministry in Bangkok begins with locating and connecting with children and families in need. While our focus is on helping migrant workers living on construction sites, the ministry has grown to include children and families from other areas as well, including refugees, factory workers and children living in slum communities. Due to trafficking, exploitation, and other issues, migrant workers are usually wary of outsiders, particularly foreigners. Once a relationship is formed, however, we are able to gain inside traction to multiple sites as families move from place to place. Additionally, a primary emphasis with Construction of Hope is to work through indigenous leaders as much as possible, which automatically helps eliminate some of the natural barriers to building relationships." data-captiontwo="" data-captionthree="">
                    <img class='img-responsive' src="images/makingConnectionsSmall.jpg">
                    <h4>Making Connections</h4>
                  </span>
                </div>
              </div>
            </div> -->
          </div>
        <div data-bind="if: twoActive,fadeVisible: twoActive" class='center cambodia-projects'>
            <div class='row'>
              <div class='col-sm-12'>
                <ul class='sub-menu'>
                  <li data-bind="click:changeSubOne, css:{ subFormatOptionsToggle: subOneActive() && !subAllActive()}" class='sub-menu-item'><h6>Phnom Penh</h6></li>
                  <li data-bind="click:changeSubAll, css:{ subFormatOptionsToggle: subAllActive()}" class='sub-menu-item'><h6>All</h6></li>
                  <li data-bind="click:changeSubTwo, css:{ subFormatOptionsToggle: subTwoActive() && !subAllActive()}" class='sub-menu-item'><h6>Takeo</h6></li>
                </ul>
              </div>
            </div>
            <div data-bind="fadeVisible: subOneActive" class='row phenom-penh'>
              <div class='col-sm-12 images-pp'>
                <div class='col-sm-4'>
                  <span data-toggle="modal" data-target="#ministry" data-title="Fostering Family" data-img="images/childrenLivingAtTheChurchBig.jpg" data-linkone='sponsor.php' data-linkonetitle='Sponsor a Child' data-linktwo='about.php' data-linktwotitle='COH Vision' data-captionone="Some of the children we come in contact with on construction sites and slum communities have no parents or close relatives to look after them or are victims of neglect or abuse. In certain cases, we believe the most viable solution is to help find a new home for these children. Through partnering with Pastor Somnang and The Fellowship Church of Pochentong in Phnom Penh, Cambodia, Construction of Hope currently helps support eight children who have been adopted into the church as part of the Pastor’s family. Click the link at the bottom to learn more about each child and their story. " data-captiontwo="Our main focus in sponsoring the care of these children is to not only provide for their physical needs of shelter, proper nutrition, clothing, and education but to also emphasize the discipleship of each child to equip them to become leaders that will one day transform their communities through bringing the Gospel message of hope back to their towns and villages. We believe that this hope is the key to breaking the chains of generational bondage that manifests itself in poverty and destructive life choices." data-captionthree="">
                    <img class='img-responsive' src="images/childrenLivingAtTheChurchSmall.jpg">
                    <h4>Fostering Family</h4>
                  </span>
                </div>
                <div class='col-sm-4'>
                  <span data-toggle="modal" data-target="#sustainable" data-title="Sustainable Business" data-img="images/sustainableBusinessBig.jpg" data-linkone='' data-linkonetitle='Emunah Project' data-captionone="The sustainable businesses promoted and established through Construction of Hope are part of an entrepreneurial project called ‘EMUNAH’. Currently, EMUNAH and Construction of Hope have helped establish five small businesses, including a restaurant, second-hand clothing store, sewing shop, private music instruction and a Tuk Tuk rental. Read more about the meaning and vision behind the name ‘EMUNAH’ by following the link at the below." data-captiontwo='The objectives of these businesses are tri-fold:' data-captionthree=''>
                    <img class='img-responsive' src="images/sustainableBusinessSmall.jpg">
                    <h4>Sustainable Business</h4>
                  </span>
                </div>
                <div class='col-sm-4'>
                  <span data-toggle="modal" data-target="#ministry" data-title="Local Outreach" data-img="images/outreachToLocalCommunitiesBig.jpg" data-linkone='news.php' data-linkonetitle='Latest News' data-captionone="Located in the area just behind the church in Phnom Penh is a large slum community. One of the children living in the church, Li Hou, used to beg on the streets of this neighborhood before being rescued and eventually adopted. The needs of the individual children in this community vary from those similar to Li Hou’s former situation to those who simply undergo a daily struggle through poverty and perceived hopelessness while living with their parents, many of whom struggle to find sustainable employment." data-captiontwo='Construction of Hope partners with Pastor Somnang and The Fellowship Church of Pochentong to help this community in a variety of ways, including providing food vouchers (redeemable at the EMUNAH restaurant – ) for those most in need, bags of rice for families, school supplies for children, support for some children who are unable to afford school fees, community soccer games and mentoring and discipleship in the church. For many of the children in this community, the church has become a place of refuge and relief.' data-captionthree=''>
                    <img class='img-responsive' src="images/outreachToLocalCommunitiesSmall.jpg">
                    <h4>Local Outreach</h4>
                  </span>
                </div>
              </div>
            </div> 
            <div data-bind="fadeVisible: subTwoActive" class='takeo'>
                  <div class ='row'>
                    <div class='col-sm-12 images-pp'>
                      <!-- project1 -->
                      <div class='col-sm-4'>
                        <span data-toggle="modal" data-target="#ministry" data-title="About Takeo" data-img="images/aboutTakeoBig.jpg" data-linkone='news.php' data-linkonetitle='Latest News' data-captionone="As in many rural villages across Cambodia, Takeo Province consists of numerous places where large groups of children struggle to survive with little adult presence. While some of the children in these villages are true orphans whose parents have died, many of the children have simply been abandoned by parents who seek an escape from poverty by obtaining work in Phnom Penh, about 80 kilometers away from Takeo. The poverty and struggle inside these villages combined with a lack of hope also creates a ripe environment for potential trafficking. For parents who remain in the village, a large amount of money offered in exchange for a child may seem like the only plausible way to escape. Children who are left alone in the village are exposed and vulnerable. Through local leaders, we seek to advocate and care for these children." data-captiontwo="" data-captionthree="">
                          <div class='hide-watermark'><img class='img-responsive' src="images/aboutTakeoSmall.jpg" alt="photo copyright Jill Kimberly Hartwell Geoffrion, Ph.D."></div>
                          <h4>About Takeo</h4>
                        </span>
                      </div>
                      <!-- project2 -->
                      <div class='col-sm-4'>
                        <span data-toggle="modal" data-target="#ministry" data-title="Equipping Leaders" data-img="images/leadersTakeoBig.jpg" data-linkone='news.php' data-linkonetitle='Latest News' data-captionone="Pastor Sovan Muny begins his work in Takeo’s rural villages by evangelizing and securing local leadership. Once a group of believers are established, Pastor Sovan Muny helps plant a church and disciples selected leaders to oversee and steward the provision and care for the children served through CoH. Through mp3 players and a partnership with Pastor Somnang in Phnom Penh, believers in these villages have access to a discipleship program and other Christian resources. CoH also partners with Pastor Muny to help provide housing for the local leaders which are often multi-purpose buildings also used for worship services, housing for orphans, and a community center for other children." data-captiontwo="" data-captionthree="">
                          <div class='hide-watermark'><img class='img-responsive' src="images/equippingLeadersSmall.jpg" alt="photo copyright Jill Kimberly Hartwell Geoffrion, Ph.D."></div>
                          <h4>Equipping Leaders</h4>
                        </span>
                      </div>
                      <!-- project3 -->
                      <div class='col-sm-4'>
                        <span data-toggle="modal" data-target="#ministry" data-title="Education and Food" data-img="images/educationAndFoodBig.jpg" data-linkone='news.php' data-linkonetitle='Latest News' data-captionone="CoH partners with Pastor Muny to provide for the holistic needs of the children, including food, water, housing, education and spiritual discipleship. In addition to providing English tutoring, Pastor Muny helps support education for the children in the villages by directing resources to pay for school fees and supplies, as well as providing Christian resources for receptive public schools. As some of the children live very far from the nearest school, Pastor Muny works with local leaders to provide housing accommodations to allow children to be close enough to travel daily back and forth. CoH is also partnerning with Pastor Muny to plan the construction of a new school building." data-captiontwo="" data-captionthree="">
                          <div class='hide-watermark'><img class='img-responsive' src="images/educationAndFood2.jpg" alt="photo copyright Jill Kimberly Hartwell Geoffrion, Ph.D."></div>
                          <h4>Education and Food</h4>
                        </span>
                      </div>
                    </div>
                  </div>
            <div class='row'>
              <div class='col-sm-12 images-pp'>
                <div class='col-sm-4'>
                  <span data-toggle="modal" data-target="#vision" data-title="Takeo Vision" data-img="images/visionTakeoBig.jpg" data-linkone='news.php' data-linkonetitle='Latest News' data-captionone="As in many rural villages across Cambodia, Takeo Province consists of numerous places where large groups of children struggle to survive with little adult presence. While some of the children in these villages are true orphans whose parents have died, many of the children have simply been abandoned by parents who seek an escape from poverty by obtaining work in Phnom Penh, about 80 kilometers away from Takeo. The poverty and struggle inside these villages combined with a lack of hope also creates a ripe environment for potential trafficking. For parents who remain in the village, a large amount of money offered in exchange for a child may seem like the only plausible way to escape. Children who are left alone in the village are exposed and vulnerable. Through local leaders, we seek to advocate and care for these children." data-captiontwo="" data-captionthree="">
                    <img class='img-responsive' src="images/visionTakeoSmall.jpg">
                    <h4>Takeo Vision</h4>
                  </span>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
        <h2 class="text-center scripture">
          <span class='text'>To loose the bonds of injustice...to let the oppressed go free<span> <br><span class='isaiah'>-Isaiah 58:6-</span>
        </h2>
      </div>
    </div>  
    <!--end of row 4-->
         <!-- donate section -->
  <div id='donate-section' class='row'>
    <div class='col-sm-12 donate-wrap'>
      <div class='donate-wrap'>
      <a href="donate.php"><button type="button" class="btn btn-primary font-roboto-light btn-donate">DONATE</button></a>
    </div>
    </div>
  </div>
    <div id='links' class='row'>
      <div class='col-sm-12 bottompics'>
      </div>
    </div>
    <!--end of row 5-->
    <!--Inspiration and some markup for contact form modified from Light Up the Dark LLC Belton, MO-->
    <div id='contact'>
      <div class='contact-wrapper'>
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
<!--               <h4>Email</h4>
            <p>
                English - <a href="mailto:jasong@constructionofhope.org">jasong@constructionofhope.org</a>
                <br>
                <br>
                Thai - <a href="mailto:vinoisblessed@gmail.com">vinoisblessed@gmail.com</a>
                <br>
                <br>
                Khmer - <a href="mailto:somnangs@constructionofhope.org">somnangs@constructionofhope.org</a>
            </p> -->
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
    <!--end of row 6-->

    <footer id='footer' class="row">
    <ul id="footerContacts" class="flex-box ulgeneral">
        </ul>
    </footer>
    <!--end of row 7-->

      </div>
      <!--end container-->
        <div class="modal fade modal-projects" id="ministry" tabindex="-1" role="dialog" aria-labelledby="mi" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div class="modal-parent">
                  <span><h5>Construction of Hope</h5></span>
                  <span><a id='close' class="modal-close glyphicon glyphicon-remove pull-right" data-dismiss="modal"></a></span>
                </div>
              </div>
              <div class="modal-body">
                <img class='img-responsive' src="images/lifesong.png"><br>
                <p class='caption1'></p>
                <p class='caption2'></p>
                <p class='caption3'></p>
                <div class='link-wrapper'>
                  <a class='link1' href=''><h5></h5></a>
              </div>
              </div>
              <div class="modal-footer">
                <h4 class="modal-title" id="mi"></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-projects" id="vision" tabindex="-1" role="dialog" aria-labelledby="mi" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div class="modal-parent">
                  <span><h5>Construction of Hope</h5></span>
                  <span><a id='close' class="modal-close glyphicon glyphicon-remove pull-right" data-dismiss="modal"></a></span>
                </div>
              </div>
              <div class="modal-body">
                <img class='img-responsive' src="images/visionTakeoBig.jpg"><br>
                <p>Among the villages we are connected with in Takeo, Garaline is located in the center. In 2011, 
                    Pastor Sovan Muny lead the construction of a building in this village that currently doubles as a 
                    church and a house for four widows who provide care for a group of orphaned girls. 
                    Our vision is to build on what is already established in this village through the following:</p>
                <h4 style='text-align:center'>Learning and Community Center </h4>
                <p>Use the land ajacent to the church to construct a place where children and others in the community
                    can come to learn and build relationships. </p>
                <h4 style='text-align:center'>Purchase Additional Land</h4>
                <ul>
                  <li>Use this land to build a 
                    children’s home for the orphaned children 
                    in Takeo and for Cambodian children coming from 
                    Thailand in need of rehabilitation and foster 
                    care.</li>
                  <li>Build a discipleship training center for 
                      local leaders to cultivate mission expansion 
                      across Cambodia and Thailand. </li>
                  <li>Promote sustainability and potential 
                    business ventures through agriculture development.</li>
                </ul>
                <div class='link-wrapper'>
                  <a class='link1' href='donate.php'><h5>Donate</h5></a>
              </div>
              </div>
              <div class="modal-footer">
                <h4 class="modal-title" id="mi">Takeo Vision</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-projects-sustainable" id="sustainable" tabindex="-1" role="dialog" aria-labelledby="mi" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div class="modal-parent">
                  <span><h5>Construction of Hope</h5></span>
                  <span><a id='close' class="modal-close glyphicon glyphicon-remove pull-right" data-dismiss="modal"></a></span>
                </div>
              </div>
              <div class="modal-body">
                <img class='img-responsive' src="images/sustainableBusinessBig.jpg"><br>
                <p>The sustainable businesses promoted and established 
                                    through Construction of Hope are part of an entrepreneurial 
                                    project called ‘EMUNAH’. The name EMUNAH in Hebrew means faith 
                                    which is the foundation for all of our sustainable business 
                                    projects. Currently, EMUNAH and Construction of Hope have helped 
                                    establish five small businesses, including a restaurant, 
                                    second-hand clothing store, sewing shop, private music instruction 
                                    and a Tuk Tuk rental.</p>
                
                <div class='link-wrapper'>
                  <a class='link1' href='emunah.php'><h5>Emunah</h5></a>
              </div>
              </div>
              <div class="modal-footer">
                <h4 class="modal-title" id="mi">Sustainable Business</h4>
              </div>
            </div>
          </div>
        </div>
     <div id="c-mask" class="c-mask"></div><!-- /c-mask
    <!--site wrapper close div-->
  </div>
</div>
</body>
<script src="js/final.min.js"></script>
  <script type="text/javascript" async>
      var randomBanner = function (x) {
        var randomfromarray = function (array){
          return array[Math.floor(Math.random() * array.length)]
          };
      var bannerPics = ['images/banner1.jpg','images/banner2.jpg', 'images/banner3.jpg'];
      var images = randomfromarray(bannerPics);
      $('.banner').css({'background-image': 'url(' + images + ')'});
      };
      randomBanner();
  </script>



</html>