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
    cheaker(allItems);
  });
}
function cheaker(allItems){
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
  var imgURL = "items/sets/"+eventSrc.split("/")[5].split(".")[0]+"-"+"1"+".jpg";
  
  item = build_z(imgURL);
  var row = $('#row');
  html = row.html();
  row.html(html + item);
  console.log(imgURL);
  
  var obj = new Image;
  obj.src = imgURL;
  obj.onload = Load(imgURL, 1);
}
function Load(imgURL, s){
  var imgName = "";
  var c = imgURL.split("/")[2].split(".")[0].split("");
  for(n = 0; n <= c.length; n++){
    if(c[n] == "-"){
      imgName += c[n];
      imgName += Number(s)+1;
      n = c.length;
    }else{
      imgName += c[n];
    }
  }
  var imgURL = "items/sets/"+imgName+".jpg";
  item = build_z(imgURL);
  var row = $('#row');
  html = row.html();
  row.html(html + item);
  
  var obj = new Image;
  obj.src = imgURL;
  obj.onload = Load1(imgURL, s+1);
}
function Load1(imgURL, s){
  var imgName = "";
  var c = imgURL.split("/")[2].split(".")[0].split("");
  for(n = 0; n <= c.length; n++){
    if(c[n] == "-"){
      imgName += c[n];
      imgName += Number(s)+1;
      n = c.length;
    }else{
      imgName += c[n];
    }
  }
  var imgURL = "items/sets/"+imgName+".jpg";
  item = build_z(imgURL);
  var row = $('#row');
  html = row.html();
  row.html(html + item);
  
  var obj = new Image;
  obj.src = imgURL;
  obj.onload = Load2(imgURL, s+1);
}
function Load2(imgURL, s){
  var imgName = "";
  var c = imgURL.split("/")[2].split(".")[0].split("");
  for(n = 0; n <= c.length; n++){
    if(c[n] == "-"){
      imgName += c[n];
      imgName += Number(s)+1;
      n = c.length;
    }else{
      imgName += c[n];
    }
  }
  var imgURL = "items/sets/"+imgName+".jpg";
  item = build_z(imgURL);
  var row = $('#row');
  html = row.html();
  row.html(html + item);
  console.log(imgURL);
  
  var obj = new Image;
  obj.src = imgURL;
  obj.onload = Load3(imgURL, s+1);
}
function Load3(imgURL, s){
  var imgName = "";
  var c = imgURL.split("/")[2].split(".")[0].split("");
  for(n = 0; n <= c.length; n++){
    if(c[n] == "-"){
      imgName += c[n];
      imgName += Number(s)+1;
      n = c.length;
    }else{
      imgName += c[n];
    }
  }
  var imgURL = "items/sets/"+imgName+".jpg";
  item = build_z(imgURL);
  var row = $('#row');
  html = row.html();
  row.html(html + item);
  console.log(imgURL);
  
  var obj = new Image;
  obj.src = imgURL;
  obj.onload = Load4(imgURL, s+1);
}
function Load4(imgURL, s){
  var imgName = "";
  var c = imgURL.split("/")[2].split(".")[0].split("");
  for(n = 0; n <= c.length; n++){
    if(c[n] == "-"){
      imgName += c[n];
      imgName += Number(s)+1;
      n = c.length;
    }else{
      imgName += c[n];
    }
  }
  var imgURL = "items/sets/"+imgName+".jpg";
  item = build_z(imgURL);
  var row = $('#row');
  html = row.html();
  row.html(html + item);
  console.log(imgURL);
  
 // var obj = new Image;
 // obj.onload = Load(imgURL, s+1);
 // obj.src = imgURL;
}
class Item {
  constructor(array) {
    this.id = array[0];
    this.image = array[1];
    this.description = array[2];
  }
}
