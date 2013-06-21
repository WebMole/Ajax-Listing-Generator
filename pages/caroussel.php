<?php
/*
    WebMole, an automated explorer and tester for Web 2.0 applications
    Copyright (C) 2012-2013 Gabriel Le Breton, Fabien Maronnaud,
    Sylvain Hallé et al.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/* Prevent direct access to this file. */
if ($access != 'authorized')
    die('You are not allowed to view this file');
?>

<script>
    $('#myCarousel').carousel({
                interval: 5000
        });
    
        $('#carousel-text').html($('#slide-content-0').html());
    
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click( function(){
                var id_selector = $(this).attr("id");
                var id = id_selector.substr(id_selector.length -1);
                var id = parseInt(id);
                $('#myCarousel').carousel(id);
        });
    
    
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
</script>

  <!-- Slider -->
  <div class="row-fluid">
    <div class="span12" id="slider">
      <!-- Top part of the slider -->
      <div class="row-fluid">
        <div class="span8" id="carousel-bounding-box">
          <div id="myCarousel" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">
              <div class="active item" data-slide-number="0"><img src="http://placehold.it/770x300&amp;text=one"></div>
              <div class="item" data-slide-number="1"><img src="http://placehold.it/770x300&amp;text=two"></div>
              <div class="item" data-slide-number="2"><img src="http://placehold.it/770x300&amp;text=three"></div>
              <div class="item" data-slide-number="3"><img src="http://placehold.it/770x300&amp;text=four"></div>
              <div class="item" data-slide-number="4"><img src="http://placehold.it/770x300&amp;text=five"></div>
              <div class="item" data-slide-number="5"><img src="http://placehold.it/770x300&amp;text=six"></div>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
          </div>
        </div>
        <div class="span4" id="carousel-text"></div>
        
        <div style="display: none;" id="slide-content">
          <div id="slide-content-0">
            <h2>Slider One</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-1">
            <h2>Slider Two</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-2">
            <h2>Slider Three</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-3">
            <h2>Slider Four</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-4">
            <h2>Slider Five</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
          <div id="slide-content-5">
            <h2>Slider Six</h2>
            <p>Lorem Ipsum Dolor</p>
            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
          </div>
        </div>
      </div>
      
    </div>
  </div> <!--/Slider-->
  
  <div class="row-fluid hidden-phone" id="slider-thumbs">
    <div class="span12">
      <!-- Bottom switcher of slider -->
      <ul class="thumbnails">
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-0">
            <img src="http://placehold.it/170x100&amp;text=one">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-1">
            <img src="http://placehold.it/170x100&amp;text=two">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-2">
            <img src="http://placehold.it/170x100&amp;text=three">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-3">
            <img src="http://placehold.it/170x100&amp;text=four">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-4">
            <img src="http://placehold.it/170x100&amp;text=five">
          </a>
        </li>
        <li class="span2">
          <a class="thumbnail" id="carousel-selector-5">
            <img src="http://placehold.it/170x100&amp;text=six">
          </a>
        </li>
      </ul>
    </div>
  </div>
