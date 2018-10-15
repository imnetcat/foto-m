<!DOCTYPE html>
<html><head>
  <link rel="stylesheet" href="styles.css" type="text/css">
  <link rel="stylesheet" href="menu.css" type="text/css">
  <link rel="stylesheet" href="use_filters.css" type="text/css">
  <link rel="stylesheet" href="to_filters.css" type="text/css">
  <link rel="stylesheet" href="filters-1.css" type="text/css">
  <link rel="stylesheet" href="filters-2.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="functions.js"></script>
  <script src="pre-load.js"></script>
  <script src="post-load.js"></script>
</head>
<body>
  <nav role='navigation' id="menu">
    <ul>
      <li><a href="/ru/">Главная</a></li>
      <li><a href="#" style="cursor: default;">Про</a>
        <ul>
          <li><a href="/ru/about/me/">Меня</a></li>
          <li><a href="/ru/about/">Мои выставки</a></li>
        </ul>
      </li>
      <li><a href="#" style="background-image: none; cursor: default;">Магазин</a></li>
      <li><a href="/ru/archive/">Архив</a></li>
      <li><a href="/ru/contacts/">Контакты</a></li>
    </ul>
  </nav>
  <div id="currentItem"><img id='currentImg'><div id="currentISim"></div><div id="currentDes"></div><div class="buyBtn">Купить</div><div class="buyBtn" style="margin-top:40px">Заказать</div><div class="fil-close-btn" style="top: 550px;"><div></div><div></div></div></div>
  <div id="container">
    <div id="items">
      <div class="row">
        <div class="btn left"><span></span></div>
        <div id="row">
        </div>
        <div class="btn right"><span></span></div>
      </div>
    </div>
    <div id="filtersHead"><p>  </p></div>
    <div id="filters">
     <? include "filters.html"; ?>
    </div>
    <div id="to_filters">
     <? include "to_filters.html"; ?>
    </div>
    <div id="use_filters">
      <div class="use_filters">сортировать</div>
    </div>
  </div>
  <div id="fullImg">
    <img src=""/>
    <div id="floatingCirclesG">
      <div class="f_circleG" id="frotateG_01"></div>
      <div class="f_circleG" id="frotateG_02"></div>
      <div class="f_circleG" id="frotateG_03"></div>
      <div class="f_circleG" id="frotateG_04"></div>
      <div class="f_circleG" id="frotateG_05"></div>
      <div class="f_circleG" id="frotateG_06"></div>
      <div class="f_circleG" id="frotateG_07"></div>
      <div class="f_circleG" id="frotateG_08"></div>
    </div>
    <div class="fil-close-btn" style="top: 80vh; left: 49%;">
      <div></div>
      <div></div>
    </div>
  </div>
  <footer>
  </footer>
</body>
</html>
