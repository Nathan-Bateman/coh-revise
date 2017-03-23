//object with array of children objects
	var sponsorship = {
    "kids": [
        {
            "name": "Kaang",
            "age": 11,
            "image": "images/kaang.jpg",
            "hometown": "Rural village outside of Phnom Penh, Cambodia",
            "story": "Kaang and his sister were both abandoned by their parents, who left indefinitely to work in Thailand. Kaang and his sister have been living in the church since 2014 and are currently going to Salamom school in Phnom Penh. They have both professed faith in Christ and were baptised in December, 2015."
        },
          {
            "name": "Li Hou",
            "age": 7,
            "image": "images/li_hou.JPG",
            "hometown": "Rural village in Ta Keo Province ",
            "story": "Li Hou was rescued from an abusive home where her stepfather forced her to beg on the streets to support his alcohol and gambling addictions. Li Hou has been living in the church since 2013 and is thriving in school. She loves to make people laugh and enjoys singing." 
        },
          {
            "name": "Piseth",
            "age": 11,
            "image": "images/piseth.jpg",
            "hometown": "Rural village outside of Phnom Penh, Cambodia",
            "story": "Piseth is Pastor Somnang's nephew. The pastor's sister was raising him alone in an impoverished village where he did not have the opportunity to attend school.Through the partnership of Pastor Somnang and Piseth's mother, Piseth is currently in his second year of school and developing quickly as a leader among the other children in the church. Piseth has professed faith in Christ and was baptised in December, 2015."
        },
          {
            "name": "Gao",
            "age": 13,
            "image": "images/gao.jpg",
            "hometown": "Rural village outside of Phnom Penh, Cambodia",
            "story": "Gao and her brother were both abandoned by their parents, who left indefinitely to work in Thailand. Gao and her brother have been living in the church since 2014 and are currently going to Salamom school in Phnom Penh. They have both professed faith in Christ and were baptised in December, 2015."
        },
         {
            "name": "Savy",
            "age": 12,
            "image": "images/savy.JPG",
            "hometown": "Rural village in Battambong, Cambodia",
            "story": "Savy has lived most of her childhood on construction sites in Thailand. Raised by her single mother, Savy's life become even more vulnerable when her mother died of aids. Savy is in her second year of living in the church and doing very well in school. Savy is learning to play the guitar and enjoys playing soccer. She hopes to be a teacher one day. Savy has professed faith in Christ and was baptised in 2015."
        },
        {
            "name": "Yalee",
            "age": 9,
            "image": "images/yalee.JPG",
            "hometown": "Rural village in Battambong, Cambodia",
            "story": "Yalee spent most of her early childhood on construction sites in Thailand, travelling with her father who was raising her alone. We became connected to Yalee in 2014 during a visit to her village. Though our intent was to simply visit another child we were already connected with, Yalee's father heard we were coming and travelled back from Thailand to plead with Pastor Somnang to help provide care for his daughter. Without Pastor Somnang agreeing to take Yalee into the church, Yalee's father would have left her alone in the village while he travelled back to Thailand. Yalee is in her second year of school and hopes to be a doctor one day. She is quick to smile and forms quite the playful tandem with Li Hou."
         },
         {
            "name": "Yrose (Ja)",
            "age": 12,
            "image": "images/ja.jpg",
            "hometown": "Rural village in Siam Reap, Cambodia",
            "story": "Ja spent most of her childhood on construction sites in Thailand and is one of the children who first ignited the vision for Construction of Hope. We first became connected with Ja in 2013, when Ja and her brother, Jua, were part of a group of children living on a construction site adjacent to International Community School (ICS), in Bangkok. Ja is currently studying with her brother in a public school in Phnom Penh. Her favorite subject is English, and she hopes to be a doctor one day. Ja is soft spoken with a sweet spirit, and she has become a wonderful mentor for the younger children in the church. Ja and her brother have both professed faith in Christ and were both baptised in 2015."
        },
        {
            "name": "Vachana (Jua)",
            "age": 12,
            "image": "images/jua.JPG",
            "hometown": "Rural village in Siam Reap, Cambodia",
            "story": "Jua spent most of his childhood on construction sites in Thailand and is one of the children who first ignited the vision for Construction of Hope. We first became connected with Jua in 2013, when Jua and his sister, Ja, were part of a group of children living on a construction site adjacent to International Community School (ICS), in Bangkok. Jua is currently studying with his sister in a public school in Phnom Penh. He is thriving as he grows into a young man and is maturing as a leader in the church. He plays drums as part of the worship team and hopes to be a teacher one day. He and his sister have both professed faith in Christ and were baptised in 2015."
            
        }]

    };
var sponsorAChild = function () {
    var children = sponsorship.kids;
    var $postDivs = $('#sponsorship-page');
    //var openRowCol = '<div class="row"><div class="class=col-sm-12">';
    var closeRowCol = '</div></div>';
                
    var count = 0;
    for (var i = 0; i < children.length; i++) {
            var child = children[i];
            var childMarkup = '<div class=' + "col-sm-4" + '>';
                childMarkup += '<span data-toggle=' + "modal" + ' data-target="#sponsorChild" data-title="' + child.name +'"';
                childMarkup += 'data-img="' + child.image + '"'; 
                childMarkup += 'data-caption="' + child.story + '"';
                childMarkup += 'data-hometown="'+ child.hometown + '"';
                // childMarkup += 'data-grade="'+ child.grade + '"';
                childMarkup += 'data-age="'+ child.age + '">';
                childMarkup += '<img class="img-responsive" src="' + child.image  + '">';
                childMarkup += '<h4>' + child.name + '</h4>';
                childMarkup += '</span></div>';

                if (count % 3 === 0 && count !=0) {
                    $postDivs.append(closeRowCol);
                }
                if (count % 3 === 0) {
                    var openRowCol = '<div class="row"><div class="col-sm-12 child-row' + ' row-'+ count +'">';
                    var classToString = '.row-' + count.toString();
                    $postDivs.append(openRowCol);
                    var $postChildren = $( "div" ).closest( classToString ); 
                    //var $postChildren = $( openRowCol ).find( classToString );   
                }  

            //console.log($postChildren);
            $postChildren.append(childMarkup);

                if (count === children.length - 1) {
                        $postDivs.append(closeRowCol);
                    }
            count +=1;
    };

};
var sponsorModal = $('#sponsorChild').on('show.bs.modal', function (event) {
  var imgClicked = $(event.relatedTarget); // Button that triggered the modal
  var imgFiletoLoad = imgClicked.data('img'); // Extract info from data-* attributes
  var captionToLoad = imgClicked.data('caption');
  var titleToLoad = imgClicked.data('title');
  var hometownToLoad = imgClicked.data('hometown');
  var ageToLoad = imgClicked.data('age')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-name').text(titleToLoad);
  modal.find('.modal-body .modal-name-img img').attr("src",imgFiletoLoad);
  modal.find('.modal-body .modal-age').html("<span>AGE: </span>" + ageToLoad);
  modal.find('.modal-body .modal-hometown').html("<span>HOMETOWN: </span>" + hometownToLoad);
  modal.find('.modal-body .modal-story').html("<span>STORY: </span>" + captionToLoad);
});
sponsorAChild();
