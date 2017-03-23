var menu = document.getElementById('menu');
var $bigMenu = $(document.querySelector('.main-menu-big'));
var container = document.getElementById('container');
var mask = document.getElementById('c-mask');
var main = document.querySelector('.container-fluid');
var drawer = document.querySelector('#drawer');
var closeMenu = document.getElementById('closeMenu');
var wrap = document.querySelector('.sitewrapper');
var body = document.getElementById('#body');
var $container = $('.container-fluid');
var $drawer = $(document.querySelector('#drawer'));
var $footer = $(document.querySelector('#footerContacts'));
var menuItem = document.getElementsByTagName('li');
var $bottomSection = $(document.querySelector('.bottompics'));
var $bottomSectionLables = $(document.querySelector('.lables'));
var banner = document.querySelector('.banner');
var clientWidth = $(window).width();
var $title = $( "title" ).text();


var randomfromarray = function (array){
  return array[Math.floor(Math.random() * array.length)]
};
console.log('hits');
//object with menu markup
var menuOptions = {
					'close':'<li id=' + '"closeMenu"' + 'style="border-top:none; border-bottom:none; background-color:#96BDE4" class=' +'"menuItem"'+'><a href="#COH" class="c-menu__link"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>',
					'home':'<li style="border-top:none;" class="menuItem"'+'><a href="index.php" class="c-menu__link"><h5 class='+'coh' +'>Home</h5></a></li>',
					'about':'<li class="menuItem"'+'><a href="about.php" class="c-menu__link"><h5 class='+'coh' +'>About</h5></a></li>',
					'projects':'<li class="menuItem"'+'><a href="projects.php" class="c-menu__link"><h5 class='+'coh' +'>Projects</h5></a></li>',
					'news':'<li class="menuItem has-children"'+
						   '><h5 class='+
						   'coh' +
						   '>News</h5>'+
						   '<ul class="main-sub-menu">'+
						   '<li><a href="http://blog.constructionofhope.org/" class="c-menu__link">Blog - Soon</a></li>'+
						   '<li><a href="news.php" class="c-menu__link">Instafeed</a></li>'+
						   '</ul>'+
						   '</li>',
					'donate':'<li style="border-bottom:none;" class="menuItem"'+'><a href="donate.php" class="c-menu__link"><h5 class='+'coh' +'>Donate</h5></a></li>'			
};
var footerOptions = {
					/*'home':'<li class='+'footerItem'+'><a href="#COH"><h5 class='+'coh' +'>Home</h5></a></li>',

					'about':'<li class='+'footerItem'+'><a href="#COH"><h5 class='+'coh' +'>About</h5></a></li>',
					'projects':'<li class='+'footerItem'+'><a href="#COH"><h5 class='+'coh' +'>Projects</h5></a></li>',
					'news':'<li class='+'footerItem'+'><a href="#COH"><h5 class='+'coh' +'>News</h5></a></li>',*/
					// 'Ytube':'<li class="footerItem"'+'><a class="footerItem" href="https://www.youtube.com/channel/UC8nhHT1xudHfwUHnRHivSmA"><img class="youtube" src="images/youtube.png" alt="Youtube"></a></li>',
					// 'Insta':'<li class="footerItem"'+'><a class="footerItem" href="https://www.instagram.com/constructionofhope/"><img class="instagram" src="images/instapiclittle.png" alt="Instagram"></a></li>',
					'COH':'<li class='+'footerItem'+'><a class="footerItem" href="index.php"><h3 class="font-roboto-light coh"' +'>Construction of Hope <span>&copy 2016</span></h3></a></li>'			
};
var bottomPics = {
				   'about':'<div class="col-sm-4 space"><div class=' + '"bottomview"><a href="about.php" class="info"><img src="images/about3.jpg" class="img-responsive fader center"><span class="border-box darken center"><h4 class="bottom-title text-center">About</h4>  <p class="text-center"> Info  |  Folks </p><span></a></div></div>',
				   'projects':'<div class="col-sm-4 space"><div class=' + '"bottomview"><a href="projects.php" class="info"><img src="images/project2.jpg" class="img-responsive fader center"><span class="border-box darken center"><h4 class="bottom-title text-center">Projects</h4>  <p class="text-center"> Cambodia  |  Thailand </p><span></a></div></div>',
				   'news':'<div class="col-sm-4 space"><div class=' + '"bottomview"><a href="news.php" class="info"><img src="images/news2.jpg" class="img-responsive fader center"><span class="border-box darken center"><h4 class="bottom-title text-center">News</h4>  <p class="text-center"> Updates  |  Media </p><span></a></div></div>'
};

var quotes = ['<div class="center-content text-center"><p>"I was once close to starvation, almost ready to die waiting on food from morning till midnight, but now I have no fear"<p></p><p>- Li Hou -</p></div>',
				'<div class="center-content text-center"><p>"If I fear to hold another to the highest goal because it is so much easier to avoid doing so, then I know nothing of Calvary love"<p></p><p>- Amy Carmichael -</p></div>',
				'<div class="center-content text-center"><p>"Are the things of God, the honor of his name, the welfare of his church, the conversion of sinners, and the profit of your own soul, your chief aim?"<p></p><p>- George Muller -</p></div>',
				'<div class="center-content text-center"><p>"You may speak but a word to a child, and in that child there may be slumbering a noble heart which shall stir the Christian Church in years to come."<p></p><p>- Charles Spurgeon -</p></div>',
				'<div class="center-content text-center"><p>"Rest in this - it is His business to lead, command, impel, send, call... It is your business to obey, follow, move, respond..."<p></p><p>- Jim Elliot -</p></div>',
				'<div class="center-content text-center"><p>"This generation of Christians is responsible for this generation of souls on earth"<p></p><p>- Keith Green -</p></div>'


				]

var postMenu = function () {
	for (item in menuOptions) {
		var listElement = menuOptions[item];
		$drawer.append(listElement);
		if (item != 'home' && item != 'close') {
			$bigMenu.append(listElement);
		};
		
	}
};
//var $toggleOverlay = $(drawer).click(function() {
//  $( this ).toggleClass( "c-mask" );
//});
var postFooter = function () {
	var yTubeInstaG ='<div><a class="footerItem" href="https://www.youtube.com/channel/UC8nhHT1xudHfwUHnRHivSmA"><img class="youtube" src="images/youtube.png" alt="Youtube"></a>';
		yTubeInstaG +='<a class="footerItem" href="https://www.instagram.com/constructionofhope/"><img class="instagram" src="images/instapiclittle.png" alt="Instagram"></a></div>';
	for (item in footerOptions) {
		var listElement = footerOptions[item];
		$footer.append(listElement);
	}
	$('footer').append(yTubeInstaG);

};
var postBottomPics = function () {
	var quote = randomfromarray(quotes);
	
	if($title != 'Home') {
		$bottomSection.append(quote);
	}else {
			 for (item in bottomPics) {
				var pic = bottomPics[item];
				$bottomSection.append(pic);
			 }
	}
};

var projectModal = $('#ministry').on('show.bs.modal', function (event) {
  var imgClicked = $(event.relatedTarget); // Button that triggered the modal
  var imgFiletoLoad = imgClicked.data('img'); // Extract info from data-* attributes
  var captionOneToLoad = imgClicked.data('captionone');
  var captionTwoToLoad = imgClicked.data('captiontwo');
  var captionThreeToLoad = imgClicked.data('captionthree');
  var titleToLoad = imgClicked.data('title');
  var linkOneToLoad = imgClicked.data('linkone');
  var linkOneTitleToLoad = imgClicked.data('linkonetitle');
  // var linkTwoToLoad = imgClicked.data('linktwo');
  // var linkTwoTitleToLoad = imgClicked.data('linktwotitle');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text(titleToLoad);
  modal.find('.modal-body .caption1').text(captionOneToLoad);
  modal.find('.modal-body .caption2').text(captionTwoToLoad);
  modal.find('.modal-body .caption3').text(captionThreeToLoad);
  modal.find('.modal-body img').attr("src",imgFiletoLoad);
  modal.find('.modal-body .link1').attr("href",linkOneToLoad);
  modal.find('.modal-body .link1 h5').text(linkOneTitleToLoad);
  // modal.find('.modal-body .link2').attr("href",linkTwoToLoad);
  // modal.find('.modal-body .link2 h5').text(linkTwoTitleToLoad);
});
var bannerMarkup = [
	'<span class="font-roboto-light"> That the</span><span> Forgotten</span><span class="font-roboto-light"> Be</span><span> Found </span><h4 style="margin-top:0;"><span class="font-roboto-light">Support the Children’s Home and Learning Center</span><br><a href="https://mystory.lifesongfororphans.org/stories/childrens-home-learning-center/#.V7ZLW7KvVhQ"><button type="button" class="btn btn-primary font-roboto-light btn-main-coh" style="background-color:#DC7E0F; border-color:#DC7E0F; margin-top:10px;">Learn More</button></a></h4>',
	'<h2><span class="font-roboto-light"> That the</span><span> Forgotten</span><span class="font-roboto-light"> Be</span><span> Found </span><a href="http://lifesongchildsponsorship.org/countries/cambodia"><button type="button" class="btn btn-primary font-roboto-light btn-main-coh" style="background-color:#DC7E0F; border-color:#DC7E0F;">Sponsor a Child</button></a></span></h2>',
	'<h2><span class="font-roboto-light"> That the</span><span> Forgotten</span><span class="font-roboto-light"> Be</span><span> Found </span><a href="http://lifesongchildsponsorship.org/countries/thailand"><button type="button" class="btn btn-primary font-roboto-light btn-main-coh" style="background-color:#DC7E0F; border-color:#DC7E0F;">Sponsor a Child</button></a></span></h2>'
	];
var randomBannerCat = function (x) {
	var callToAction = randomfromarray(bannerMarkup);
	$('.center-fly').append(callToAction);
	
};

menu.addEventListener('click', function(e) {
        drawer.classList.add('open');
        mask.classList.add('is-active');
        body.classList.add('has-active-menu');
        e.stopPropagation();
      });

main.addEventListener('click', function() {
        drawer.classList.remove('open');
        mask.classList.remove('is-active');
        body.classList.remove('has-active-menu');

      });

var hopeViewModel = function () {
  var self = this;

  	self.show = ko.observable(false);
	self.documentReady = ko.observable(false);
	self.regscreen = ko.observable(true);
	self.oneActive = ko.observable(false);
	self.twoActive = ko.observable(true);
	self.threeActive = ko.observable(false);
	self.subOneActive = ko.observable(true);
	self.subTwoActive = ko.observable(true);
	self.subAllActive = ko.observable(true);

	self.changeOne = function () {
		self.oneActive(true);
		self.twoActive(false);
		self.threeActive(false);
		
	};
	self.changeTwo = function () {
		self.oneActive(false);
		self.twoActive(true);
		self.threeActive(false);
		
	};
	self.changeThree = function () {
		self.oneActive(false);
		self.twoActive(false);
		self.threeActive(true);	
	};
	self.changeSubOne = function () {
		self.subOneActive(true);
		self.subTwoActive(false);
		self.subAllActive(false);
	};
	self.changeSubTwo = function () {
		self.subOneActive(false);
		self.subTwoActive(true);
		self.subAllActive(false);	
	};
	self.changeSubAll = function () {
		self.subOneActive(true);
		self.subTwoActive(true);
		self.subAllActive(true);	
	};
	ko.bindingHandlers.fadeVisible = {
    init: function(element, valueAccessor) {
        // Initially set the element to be instantly visible/hidden depending on the value
        var value = valueAccessor();
        $(element).toggle(ko.unwrap(value)); // Use "unwrapObservable" so we can handle values that may or may not be observable
    },
    update: function(element, valueAccessor) {
        // Whenever the value subsequently changes, slowly fade the element in or out
        var value = valueAccessor();
        ko.unwrap(value) ? $(element).fadeIn(800) : $(element).fadeOut();
    }
};
//check the size of the viewport continuously to call alternate header if too small
	var checkSize = function (width) {
		if (width <= 315) {
			self.regscreen(false)
		} else {
			self.regscreen(true)
		}
	};

	var resize = function () { 
					$( document ).ready(function() {	
						$(window).width() <= 767 ? $('.menuItem').addClass( "hvr-fade" ): $('.menuItem').removeClass( "hvr-fade" );
						//$('.menuItem').addClass( "hvr-fade" )
						
		 				$(window).resize(function() {
		 					var winWidth = $(window).width();
  		  						if (winWidth <= 767) {
  		  							$('.menuItem').addClass( "hvr-fade" );
  		  							
  		  						}
  		  						if(winWidth > 767) {
  		  							$('.menuItem').removeClass( "hvr-fade" );
  		  							console.log('>767');
  		  						}			
						});
					});
					//winWidth <= 767 ? $('.menuItem').addClass( "hvr-fade" ):$('.menuItem').removeClass( "hvr-fade" );
	};
	var hideWaterMark = function (floor, ceiling, rate, pixelheight) {
		var winWidthInit = $(window).width();
		var benchMarkView = floor;
		var heightDifference = (winWidthInit - benchMarkView);
		var benchMarkHeight = pixelheight;
		var changeIncrement = rate;
		var maxHeightCalc = benchMarkHeight + (heightDifference * changeIncrement);
		
		//set dynamic max-height based on viewport width
		$(window).resize(function() {
			if ($(window).width() >= ceiling || $(window).width() <floor) {
					$('.hide-watermark').css({"max-height": '271px'});
				} else {
					var winWidthChange = $(window).width() - winWidthInit;
					var maxHeightAdjust = winWidthChange * changeIncrement;
					var maxHeightCalcResize = maxHeightCalc + maxHeightAdjust;
					var maxHeightResize = maxHeightCalcResize.toString() + 'px';
					var setWaterMarkDynamic = $('.hide-watermark').css({"max-height": maxHeightResize});
				}
		});
//set initial height
		if (winWidthInit <= ceiling && winWidthInit >= floor) {
			var maxHeight = maxHeightCalc.toString() + "px";
			var selectWaterMark = $('.hide-watermark').css({"max-height": maxHeight});

		};
	};


//delays the timing of the initial animation on the page
  	var onloadAnimation = function() { $( document ).ready(function() {
        console.log( "document loaded" );
        self.documentReady(true);
        if (window.location.pathname === '/index.php') {
        setTimeout(function(){ self.show(true) }, 100);
        setTimeout(function(){document.querySelector('.btn-main-coh').classList.add('glow')}, 2000);
        		} else {
        			self.show(true);
        		};
    		});
	};
//instagram call for feed
	var instagram = function () {
		var $post = $('.post');
		$.ajax({
		  type: "POST",
		  url: 'scripts/instacall.php',
          dataType : 'json',
          success: function (response) {
	          	var insta = response.data;
	          	 console.log(response);
	          	for (var i = 0; i < insta.length; i++) {
	          		var rawDate = new Date(insta[i].created_time * 1000);
	          		var rawMonth = rawDate.getMonth();
	          		var month = new Array();
						month[0] = "January";
						month[1] = "February";
						month[2] = "March";
						month[3] = "April";
						month[4] = "May";
						month[5] = "June";
						month[6] = "July";
						month[7] = "August";
						month[8] = "September";
						month[9] = "October";
						month[10] = "November";
						month[11] = "December";
					var monthName = month[rawDate.getMonth()]
	          		var year = rawDate.getFullYear();
	          		var day = rawDate.getDate();
	          		var dateMarkup = '<p>' + monthName +' ' + day + ', ' + year + '</p>';
	          		//console.log(instaDate);
	          		var instaTitle = insta[i].tags[1];
	          		var instaLink = insta[i].link;
	          		var titleMarkup = '<section><h4><a href="' + instaLink + '">' +'#' + instaTitle + '</a></h4>' + dateMarkup;
	          		
	          		var instaImage = insta[i].images.standard_resolution.url;
	          		var imageMarkup = '<img src="' + instaImage + '" class="img-responsive"></section>';
	          		
	          		var instaCaptionRaw = insta[i].caption.text;
	          		var reEx = /(?:^|[ ])#([a-zA-Z]+)/gm;
	          		var instaCaption = instaCaptionRaw.replace(reEx, '');

					//console.log(instaCaption);

	          		var captionMarkup = '<section class="font-roboto">';
	          			captionMarkup +='<span><p class="cohfont-small">COH</p>';
	          			captionMarkup +='<ul class="social-wrap">';
	          			captionMarkup +='<li><a href="https://www.facebook.com/sharer/sharer.php?u=' + instaLink + '"><img src="images/glyphicons-social-31-facebook.png"></a></li>';
	          			captionMarkup +='<li><a href="https://twitter.com/share?url=' + instaLink + '"><img src="images/glyphicons-social-32-twitter.png"></a></li>';
	          			captionMarkup +='<li><a href="https://plus.google.com/share?url=' + instaLink + '"><img src="images/glyphicons-social-3-google-plus.png"></a></li>';
	          			captionMarkup +='<li><a href="mailto:?to=&subject=Construction%20of%20Hope&body=' + instaLink + '"><img src="images/glyphicons-social-14-e-mail-envelope.png"></a></li></ul></span>';
	          			captionMarkup += '<p>' + instaCaption + '</p></section>';

	          		var article = '<article>';
	          			article += titleMarkup;
	          			article += imageMarkup;
	          			article += captionMarkup;
	          			article += '</article>';
	          		$post.append (article);
	          		 

				}
          
console.log (insta);
          }, 	error: function (){
            $post.append("<Oh no! There's been an issue loading the page! Try refreshing.");
          }
		});

	};
	instagram();
	resize();
	onloadAnimation();
	postMenu();
	postFooter();
	postBottomPics();
	randomBannerCat();
	hideWaterMark(768,870,0.37,232.5);
	// hideWaterMark(220,300,1,189.5);
	
	

	};
ko.applyBindings(new hopeViewModel());

console.log('test');








