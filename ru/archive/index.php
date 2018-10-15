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
      <li><a href="/ru/shop/">Магазин</a></li>
      <li><a href="#" style="background-image: none; cursor: default;">Архив</a></li>
      <li><a href="/ru/contacts/">Контакты</a></li>
    </ul>
  </nav>
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
  <footer>
  </footer>
</body>
</html>
