function build_z(src){
  return '<div class="item"><img class="img" style="z-index: 10; cursor: -webkit-zoom-in; cursor:-moz-zoom-in; cursor: zoom-in;" src="'+src+'"><div class="floatingCirclesG"><div class="f_circleG" id="frotateG_01"></div><div class="f_circleG" id="frotateG_02"></div><div class="f_circleG" id="frotateG_03"></div><div class="f_circleG" id="frotateG_04"></div><div class="f_circleG" id="frotateG_05"></div><div class="f_circleG" id="frotateG_06"></div><div class="f_circleG" id="frotateG_07"></div><div class="f_circleG" id="frotateG_08"></div></div></div>';
}
function build(id, src, description){
  return '<div class="item"><img id="'+id+'" class="img" src="'+src+'"><div class="description">'+description+'</div></div>';
}
function build_shadow(){
  return '<div class="shadowItem"></div>';
}
function adaptation_2(){
  $('.ui-loader-default').remove();
  $(':focus').css({
    "outline": ""
  });
}
function adaptation_1(){
  console.log($('body').width());
  console.log(screen.width);
  if($('body').width() < screen.width){
    var client_w = $('body').width();
  }else{
    var client_w = screen.width;
  }
  console.log(client_w);
  if(client_w <= 800){
    $('.right:hover').css({
      "background-position": ""
    });
    $('.left:hover').css({
      "background-position": ""
    });
    $('.right').css({   
      "background-image": "linear-gradient(to right, #FFFFFF 81%, #000000 100%);"
    });
    $('.left').css({   
      "background-image": "linear-gradient(to right, #FFFFFF 81%, #000000 100%);"
    });
    $('.btn').css({   
      "width": "50%",
      "opacity": "0",
      "cursor": "default"
    });
    $('.btn').html("");
    $('.carosel').css({
      "max-width": ""
    });
  }
}

function load_all(){
  $.ajax({
    type: "POST",
    url: "actions.php",
    data: {
      action: 'load_all'
    },
    success: function(data){
      var raw_data = data.split('array');
      var allItems = new Array();
      for( n = 1; n < raw_data.length; n++){
        allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
      }
      setFirst(allItems);
    }
  });
}

function php_array_to_js_array(array){
  var splited = array.split('"');
  var js_array = splited[1] + "-_-";
  var length = splited.length;
  length -= 2
  for( x = 3; x < length; x += 2){
    js_array += splited[x] + "-_-";
  }
  js_array += splited[length];
  return js_array.split('-_-');
}

function setFirst(allItems){
  // загрузка начальной страница
  if($('body').width() < screen.width){
    var client_w = $('body').width();
  }else{
    var client_w = screen.width;
  }
  var item;
  var row = $('#row');
  var html;
  for( n = 0; n <  allItems.length; n++){
    item = build(allItems[n].id, "/"+allItems[n].image.split("/")[0]+"/items/"+allItems[n].image.split("/")[1], allItems[n].description);
    html = row.html();
    row.html(html + item);
  }
  if($(".item").length % 2 == 1){$("#row").append($(build_shadow()))}
  $('.img').on('click touch', (event) => {
    var flag = true;
    var i = 0;
    while(flag){
      if($(event.target)[0].src.split("/")[5] == allItems[i].image.split("/")[1]){
        set(allItems[i].count);
        flag = false;
      }
      if(i == allItems.length){
        flag = false;
      }
      i++;
    }
  });
}
function set(max){
  $("html, body").animate({
    scrollTop: $("#row").offset().top
  }, 200);
  var item;
  var row = $('#row');
  row.html("");
  if($(event.target).parent().attr("class") != "item"){
    var eventSrc = $(event.target).parent().parent().find("img")[0].src;
  }else{
    var eventSrc = $(event.target).parent().find("img")[0].src;
  } 
  var imgURL = "items/sets/"+eventSrc.split("/")[5].split(".")[0]+"-";
  for(n = 1; n <= max; n++){
    item = build_z(imgURL + n +".jpg");
    row.html(row.html() + item);
  }
  if($(".item").length % 2 == 1){$("#row").append($(build_shadow()))}
  $(".img").click( function() {
    var Othis = $(this);
    var current;
    var all = Othis.parent().parent().children(".item").length;
    for(n = 1; n <= all; n++){
      if(Othis.parent().parent().children(".item:nth-child("+n+")").children(1).attr("src") == Othis.attr('src')){
        current = n;
      }
    }
    var REimage = new Image();
    REimage.src = "/photosession/items/sets/"+Othis.attr('src').split('/')[2];
    REimage.onload = function() {
      console.log('height: ' + REimage.height);
      console.log('width: ' + REimage.width);
      console.log('WIN width: ' + $('#fullImg').width());
      console.log('WIN height: ' + $('#fullImg').height());
      var x = ($('#fullImg').height() * REimage.width) / REimage.height;
      if(x <= $('#fullImg').width()){
        var y = (x * REimage.height) / REimage.width;
      }else{
        var y = ($('#fullImg').width() * REimage.height) / REimage.width;
        x = (y * REimage.width) / REimage.height;
      }
      console.log('x : ' + x);
      console.log('y : ' + y);
      $('#fullImg > div > img').css({
        "height": y,
        "width": x
      });
    $('#fullImg > div > img').attr("src", "/photosession/items/sets/"+Othis.attr('src').split('/')[2]);
    $('#fullImg').css({ "visibility": "visible"});
    $(".left").on('click touch swiperight', () => {
      if(current==1){ current = all }else{ current-- }
      var REimage = new Image();
      REimage.src = "/photosession/items/sets/"+Othis.parent().parent().children(".item:nth-child("+current+")").children(1).attr('src').split('/')[2];
      REimage.onload = function() {
        console.log('height: ' + REimage.height);
        console.log('width: ' + REimage.width);
        console.log('WIN width: ' + $('#fullImg').width());
        console.log('WIN height: ' + $('#fullImg').height());
        var x = ($('#fullImg').height() * REimage.width) / REimage.height;
        if(x <= $('#fullImg').width()){
          var y = (x * REimage.height) / REimage.width;
        }else{
          var y = ($('#fullImg').width() * REimage.height) / REimage.width;
          x = (y * REimage.width) / REimage.height;
        }
        console.log('x : ' + x);
        console.log('y : ' + y);
        $('#fullImg > div > img').css({
          "height": y,
          "width": x
        });
        $('#fullImg > div > img').attr("src", "");
        $('#fullImg > div > img').attr("src", "/photosession/items/sets/"+Othis.parent().parent().children(".item:nth-child("+current+")").children(1).attr('src').split('/')[2]);
      }
    });
    $(".right").on('click touch swipeleft', () => {
      if(current==all){ current = 1 }else{ current++ }
      var REimage = new Image();
      REimage.src = "/photosession/items/sets/"+Othis.parent().parent().children(".item:nth-child("+current+")").children(1).attr('src').split('/')[2];
      REimage.onload = function() {
        console.log('height: ' + REimage.height);
        console.log('width: ' + REimage.width);
        console.log('WIN width: ' + $('#fullImg').width());
        console.log('WIN height: ' + $('#fullImg').height());
        var x = ($('#fullImg').height() * REimage.width) / REimage.height;
        if(x <= $('#fullImg').width()){
          var y = (x * REimage.height) / REimage.width;
        }else{
          var y = ($('#fullImg').width() * REimage.height) / REimage.width;
          x = (y * REimage.width) / REimage.height;
        }
        console.log('x : ' + x);
        console.log('y : ' + y);
        $('#fullImg > div > img').css({
          "height": y,
          "width": x
        });
        $('#fullImg > div > img').attr("src", "");
        $('#fullImg > div > img').attr("src", "/photosession/items/sets/"+Othis.parent().parent().children(".item:nth-child("+current+")").children(1).attr('src').split('/')[2]);
      }
    });
    $('.fil-close-btn, .close-mask').click( () => {
      $('#fullImg').css('visibility', 'hidden');
      $('#fullImg > div > img').attr("src", "none");
      $(".left").off("click");
      $(".right").off("click");
      $('#fullImg .fil-close-btn').off("click");
    });
    }
  });
}

class Item {
  constructor(array) {
    this.id = array[0];
    this.image = array[1];
    this.description = array[2];
    this.count = array[3];
  }
}
