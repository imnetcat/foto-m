function build_z(src){
  return '<div class="item"><img class="img" style="cursor: -webkit-zoom-in; cursor:-moz-zoom-in; cursor: zoom-in;" src="'+src+'"></div>';
}
function build(id, src, description){
  return '<div class="item"><img id="'+id+'" class="img" src="'+src+'"><div class="description">'+description+'</div></div>';
}
function build_shadow(){
  return '<div class="shadowItem"></div>';
}
function adaptation_1(){
  var client_w = $("body").width();
  var client_h = $("body").height();
}
function adaptation_2(){
}
function adaptation(){
  if($('body').width() < screen.width){
    var client_w = $('body').width();
  }else{
    var client_w = screen.width;
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
      console.log("nice");
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
    item = build(allItems[n].id, allItems[n].image, allItems[n].description);
    html = row.html();
    row.html(html + item);
  }
  $('.img').on('click touch', (event) => {
    set(allItems);
  });
  $('#back, #logo').on('click touch', () => {
    $("html, body").animate({
        scrollTop: $("#row").offset().top
    }, 1000);
    if($('body').width() < screen.width){
      var client_w = $('body').width();
    }else{
      var client_w = screen.width;
    } 
    var item;
    var row = $('#row');
    console.log(row);
    row.html("");
    var html;
    for( n = 0; n <  allItems.length; n++){
      item = build(allItems[n].id, allItems[n].image, allItems[n].description);
      html = row.html();
      row.html(html + item);
    }
    if(($(".item").length + $(".shadowItem").length) % 2 == 1){$("#row").append(build_shadow)}
    $('.img').on('click touch', (event) => {
      set(allItems);
    });
  });		   
}
function set(allItems){
  $("html, body").animate({
    scrollTop: $("#row").offset().top
  }, 1000);
  var item;
  var row = $('#row');
  row.html("");
  for( n = 0; n < 25; n++){
    if($(event.target).parent().attr("class") != "item"){
      var eventSrc = $(event.target).parent().parent().find("img")[0].src;
    }else{
      var eventSrc = $(event.target).parent().find("img")[0].src;
    }
    item = build_z(eventSrc.split("/")[1]+"-"+n);
    html = row.html();
    row.html(html + item);
  }
}
class Item {
  constructor(array) {
    this.id = array[0];
    this.image = array[1];
    this.description = array[2];
  }
}
