var menu = document.getElementById('#menu');
var main = document.querySelector('.container-fluid');
var drawer = document.querySelector('#drawer');
var $body = $('body');
var $container = $('.container-fluid');
var $drawer = $(document.querySelector('#drawer'));
var $footer = $(document.querySelector('#footerContacts'));
var menuItem = document.getElementsByTagName('li');
var $bottomSection = $(document.querySelector('.bottompics'));
var $bottomSectionLables = $(document.querySelector('.lables'));


var menuOptions = {
					'close':'<li style="border-top:none; border-bottom:none; background-color:#96BDE4" class='+'menuItem'+'><a href="#COH" class="c-menu__link"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>',
					'home':'<li style="border-top:none;" class="menuItem hvr-fade"'+'><a href="https://www.google.com/" class="c-menu__link"><h5 class='+'coh' +'>Home</h5></a></li>',
					'about':'<li class="menuItem hvr-fade"'+'><a href="#COH" class="c-menu__link"><h5 class='+'coh' +'>About</h5></a></li>',
					'projects':'<li class="menuItem hvr-fade"'+'><a href="#COH" class="c-menu__link"><h5 class='+'coh' +'>Projects</h5></a></li>',
					'news':'<li class="menuItem hvr-fade"'+'><a href="#COH" class="c-menu__link"><h5 class='+'coh' +'>News</h5></a></li>',
					'donate':'<li style="border-bottom:none;" class="menuItem hvr-fade"'+'><a href="#COH" class="c-menu__link"><h5 class='+'coh' +'>Donate</h5></a></li>'			
};
var footerOptions = {
					'home':'<li class='+'footerItem'+'><a href="#COH"><h5 class='+'coh' +'>Home</h5></a></li>',

					'about':'<li class='+'footerItem'+'><a href="#COH"><h5 class='+'coh' +'>About</h5></a></li>',
					'projects':'<li class='+'footerItem'+'><a href="#COH"><h5 class='+'coh' +'>Projects</h5></a></li>',
					'news':'<li class='+'footerItem'+'><a href="#COH"><h5 class='+'coh' +'>News</h5></a></li>',
					'donate':'<li class='+'footerItem'+'><a href="#COH"><h5 class='+'coh' +'>Donate</h5></a></li>'			
};
var bottomPics = {
				   'about':'<div class=' + 'col-sm-4 ' + 'bottom' +'><img src="images/about.jpg" class=' + 'img-responsive' + '></div>',
				   'projects':'<div class=' + 'col-sm-4 ' + 'bottom' +'><img src="images/project.jpg" class=' + 'img-responsive' + '></div>',
				   'news':'<div class=' + 'col-sm-4 ' + 'bottom' +'><img src="images/news.jpg" class=' + 'img-responsive' + '></div>'
};
var bottomPicsLables = {
				   'about':'<div class=' + 'col-sm-4 ' + 'bottomLable' +'><h3 class=' + 'text-center' + '>About</h3></div>',
				   'projects':'<div class=' + 'col-sm-4 ' + 'bottomLable' +'><h3 class=' + 'text-center' + '>Projects</h3></div>',
				   'news':'<div class=' + 'col-sm-4 ' + 'bottomLable' +'><h3 class=' + 'text-center' + '>News</h3></div>'
};

var postMenu = function () {
	for (item in menuOptions) {
		var listElement = menuOptions[item];
		$drawer.append(listElement);
	}
};
var postFooter = function () {
	for (item in footerOptions) {
		var listElement = footerOptions[item];
		$footer.append(listElement);
	}
};
var postBottomPics = function () {
	for (item in bottomPics) {
		var pic = bottomPics[item];
		$bottomSection.append(pic);

	}
};
var postBottomPicsLables = function () {
	for (item in bottomPicsLables) {
		var lable = bottomPicsLables[item];
		$bottomSectionLables.append(lable);

	}
};


menu.addEventListener('click', function(e) {
        drawer.classList.toggle('open');
        e.stopPropagation();
      });
main.addEventListener('click', function() {
        drawer.classList.remove('open');
      });
var hopeViewModel = function () {
  var self = this;
	postMenu();
	postFooter();
	postBottomPics();
	postBottomPicsLables();

};
ko.applyBindings(new hopeViewModel());