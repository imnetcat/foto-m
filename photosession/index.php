<!DOCTYPE html>
<html><head>
  <link rel="stylesheet" href="styles.css" type="text/css">
  <link rel="stylesheet" href="menu.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="/jquery_mobile/jquery.mobile-1.4.5.min.js"></script>
  <script src="functions.js"></script>
  <script src="pre-load.js"></script>
</head>
<body>
  <div data-role="page" data-url="/photosession/" tabindex="0" class="ui-page ui-page-theme-a ui-page-active" style="">
  <nav role='navigation' id="menu">
    <ul>
      <li><a href="">Пейзаж</a></li>
      <li><a href="/photosession/">Фотосессия</a></li>
      <li><a href="">Репортаж</a></li>
      <li><a href="">Ретуш</a></li>
      <li><a href="">Другое</a></li>
    </ul>
  </nav>
  
  <div id="row"></div>
  
  <div id="fullImg">
    <div class="close-mask">
      <div class="fil-close-btn">
        <div></div>
        <div></div>
      </div>
    </div>
    <div class="carousel">
      <div class="btn left"><div></div><span></span></div>
      <img src=""/>
      <div class="floatingCirclesG">
      <div class="f_circleG" id="frotateG_01"></div>
      <div class="f_circleG" id="frotateG_02"></div>
      <div class="f_circleG" id="frotateG_03"></div>
      <div class="f_circleG" id="frotateG_04"></div>
      <div class="f_circleG" id="frotateG_05"></div>
      <div class="f_circleG" id="frotateG_06"></div>
      <div class="f_circleG" id="frotateG_07"></div>
      <div class="f_circleG" id="frotateG_08"></div>
    </div>
      <div class="btn right"><div></div><span></span></div>
    </div>
  </div>
  </div>
</body>
</html>
