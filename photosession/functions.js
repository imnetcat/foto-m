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
  }, 1000);
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
    imgURL += n+".jpg";
    console.log(imgURL);
    item = build_z(imgURL);
    row.html(row.html() + item);
  }
}

class Item {
  constructor(array) {
    this.id = array[0];
    this.image = array[1];
    this.description = array[2];
    this.count = array[3];
  }
}
