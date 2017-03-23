//object with array of news letter objects
	var newsLetters = {
    "issues": [
       {
            "title": "Neighborhood Map",
            "link": "https://www.constructionofhope.org/newsletters/january_coh.pdf",
            "month": "January",
            "year": 2017
        },
        {
            "title": "Neighborhood Map",
            "link": "https://www.constructionofhope.org/newsletters/august_coh.pdf",
            "month": "August",
            "year": 2016
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8hPTOpaYgZBNnpSZUNuOXNUVFRDdFRlN3NuSjdjQkRhOHhR/view",
            "month": "May",
            "year": 2016
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6LWw5REFPTF9qNDg",
            "month": "January/February",
            "year": 2016
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6X0M4c3FyV3M5TDg",
            "month": "December",
            "year": 2015
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6QjJ3OVNlYjBZMEE",
            "month": "October/November",
            "year": 2015
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6TjRHd3VGZGhvTVU",
            "month": "September",
            "year": 2015
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6U1VOSU14YmN4dDQ",
            "month": "August",
            "year": 2015
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6YU9PX3MtVW44ZWc",
            "month": "April",
            "year": 2015
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6bC00RkxnckFMZjQ",
            "month": "March",
            "year": 2015
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6Ui1tTHRmc0J5T28",
            "month": "January - February",
            "year": 2015
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6Zzc1SVFhZFN6Ync",
            "month": "December",
            "year": 2014
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6ZWotdEtyREpnMkU",
            "month": "September - October",
            "year": 2014
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6NWpiMkZEa1hheVE",
            "month": "August",
            "year": 2014
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6cDBnUFFYcDRZYk0",
            "month": "June - July",
            "year": 2014
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6dWowWS1KcmF1M2M",
            "month": "March - May",
            "year": 2014
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6NkVNVVdtcHJRdjA",
            "month": "February",
            "year": 2014
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6c0tSLXd3SGJrMlk",
            "month": "January",
            "year": 2014
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6NXlIaEtkWDd0c3M",
            "month": "December",
            "year": 2013
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6WldHdE9HOW44OHc",
            "month": "November",
            "year": 2013
        },
        {
            "title": "Neighborhood Map",
            "link": "https://drive.google.com/file/d/0B8CCkvdFSll6OEVXWkp4R1NLLVE",
            "month": "October",
            "year": 2013
        },
        {
            "title": "Neighborhood Map",
            "link": "https://docs.google.com/file/d/0B8CCkvdFSll6TTROWjVIbWxrb28",
            "month": "September",
            "year": 2013
        },
        {
            "title": "Neighborhood Map",
            "link": "https://docs.google.com/file/d/0B8CCkvdFSll6ZlJoeXhfWHBTcWc",
            "month": "August",
            "year": 2013
        },
        {
            "title": "Neighborhood Map",
            "link": "https://docs.google.com/file/d/0B8CCkvdFSll6aEhvVnR3d2dXOEU",
            "month": "July",
            "year": 2013
        },
        {
            "title": "Neighborhood Map",
            "link": "https://docs.google.com/file/d/0B8CCkvdFSll6RmtRSk5EQk5LNms",
            "month": "June",
            "year": 2013
        }]

    };
var monthlyUpdates = function () {
	var d = new Date();
	var n = d.getFullYear();
	var posts = newsLetters.issues;
	var $postRecent = $('.monthly-updates-recent');
	var $postArchive = $('.monthly-updates-archive');
	var yearHeading = [];
	for (var i = 0; i < posts.length; i++) {
	 	var newsItem = posts[i];
	 	var newsLink = newsItem.link;
	 	var newsMonth = newsItem.month;
	 	var newsYear = newsItem.year;
	 	var postMarkUp = '<li><a href="' + newsLink + '">' + newsMonth + ' - ' + newsYear + '</a></li>';
	 	//var headingExists = (posts.indexOf(newsItem) > 3) ? ((yearHeading.indexOf(newsYear) === -1) ? (yearHeading.push(newsYear)$postArchive.append(newsYear)) : (null)) : (null);
	 	if (posts.indexOf(newsItem) > 3) {
	 		if (yearHeading.indexOf(newsYear) === -1) {
	 			$postArchive.append('<h3>' + newsYear + '</h3><ul class="' + newsYear + '"></ul>');
	 			yearHeading.push(newsYear);
	 		} else {
	 			var newsYearClass = '.' + newsYear.toString();
	 			$(newsYearClass).append(postMarkUp);

	 		}
	 		//var archiveYear = (yearHeading.indexOf(newsYear) === -1) ? (yearHeading.push(newsYear)) : (null);
	 		// $postArchive.append(postMarkUp);	
	 	} else {
	 		$postRecent.append('<p>' + postMarkUp + '</p>');
	 	}
	};
}
monthlyUpdates();