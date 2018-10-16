function build_z(id, src, description){
  return '<div class="item"><img id="'+id+'" class="img" style="cursor: -webkit-zoom-in; cursor:-moz-zoom-in; cursor: zoom-in;" src="'+src+'"><div class="description">'+description+'</div></div>';
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
  var html;
  row.html("");
  for( n = 0; n <  allItems.length; n++){
    if($(event.target).parent().attr("class") != "item"){
      var eventId = $(event.target).parent().parent().find("img")[0].id;
      var eventSrc = $(event.target).parent().parent().find("img")[0].src;
    }else{
      var eventId = $(event.target).parent().find("img")[0].id;
      var eventSrc = $(event.target).parent().find("img")[0].src;
    }
    if(allItems[n].id == eventId){
      if(allItems[n].subImg1){
        if(allItems[n].subDes1){ var des = allItems[n].subDes1 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg1, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg2){
        if(allItems[n].subDes2){ var des = allItems[n].subDes2 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg2, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg3){
        if(allItems[n].subDes3){ var des = allItems[n].subDes3 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg3, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg4){
        if(allItems[n].subDes4){ var des = allItems[n].subDes4 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg4, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg5){
        if(allItems[n].subDes5){ var des = allItems[n].subDes5 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg5, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg6){
        if(allItems[n].subDes6){ var des = allItems[n].subDes6 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg6, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg7){
        if(allItems[n].subDes7){ var des = allItems[n].subDes7 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg7, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg8){
        if(allItems[n].subDes8){ var des = allItems[n].subDes8 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg8, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg9){
        if(allItems[n].subDes9){ var des = allItems[n].subDes9 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg9, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg10){
        if(allItems[n].subDes10){ var des = allItems[n].subDes10 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg10, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg11){
        if(allItems[n].subDes11){ var des = allItems[n].subDes11 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg11, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg12){
        if(allItems[n].subDes12){ var des = allItems[n].subDes12 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg12, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg13){
        if(allItems[n].subDes13){ var des = allItems[n].subDes13 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg13, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg14){
        if(allItems[n].subDes14){ var des = allItems[n].subDes14 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg14, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg15){
        if(allItems[n].subDes15){ var des = allItems[n].subDes15 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg15, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg16){
        if(allItems[n].subDes16){ var des = allItems[n].subDes16 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg16, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg17){
        if(allItems[n].subDes17){ var des = allItems[n].subDes17 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg17, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg18){
        if(allItems[n].subDes18){ var des = allItems[n].subDes18 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg18, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg19){
        if(allItems[n].subDes19){ var des = allItems[n].subDes19 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg19, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg20){
        if(allItems[n].subDes20){ var des = allItems[n].subDes20 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg20, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg21){
        if(allItems[n].subDes21){ var des = allItems[n].subDes21 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg21, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg22){
        if(allItems[n].subDes22){ var des = allItems[n].subDes22 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg22, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg23){
        if(allItems[n].subDes23){ var des = allItems[n].subDes23 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg23, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg24){
        if(allItems[n].subDes24){ var des = allItems[n].subDes24 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg24, des);
        html = row.html();
        row.html(html + item);
      }
      if(allItems[n].subImg25){
        if(allItems[n].subDes25){ var des = allItems[n].subDes25 }else{ var des = "" }
        item = build_z(null, allItems[n].subImg25, des);
        html = row.html();
        row.html(html + item);
      }
    }
  }
}
class Item {
  constructor(array) {
    this.id = array[0];
    this.image = array[1];
    this.description = array[2];
    this.subImg1 = array[3];
    this.subImg2 = array[4];
    this.subImg3 = array[5];
    this.subImg4 = array[6];
    this.subImg5 = array[7];
    this.subImg6 = array[8];
    this.subImg7 = array[9];
    this.subImg8 = array[10];
    this.subImg9 = array[11];
    this.subImg10 = array[12];
    this.subImg11 = array[13];
    this.subImg12 = array[14];
    this.subImg13 = array[15];
    this.subImg14 = array[16];
    this.subImg15 = array[17];
    this.subImg16 = array[18];
    this.subImg17 = array[19];
    this.subImg18 = array[20];
    this.subImg19 = array[21];
    this.subImg20 = array[22];
    this.subImg21 = array[23];
    this.subImg22 = array[24];
    this.subImg23 = array[25];
    this.subImg24 = array[26];
    this.subImg25 = array[27];
    this.subDes1 = array[28];
    this.subDes2 = array[29];
    this.subDes3 = array[30];
    this.subDes4 = array[31];
    this.subDes5 = array[32];
    this.subDes6 = array[33];
    this.subDes7 = array[34];
    this.subDes8 = array[35];
    this.subDes9 = array[36];
    this.subDes10 = array[37];
    this.subDes11 = array[38];
    this.subDes12 = array[39];
    this.subDes13 = array[40];
    this.subDes14 = array[41];
    this.subDes15 = array[42];
    this.subDes16 = array[43];
    this.subDes17 = array[44];
    this.subDes18 = array[45];
    this.subDes19 = array[46];
    this.subDes20 = array[47];
    this.subDes21 = array[48];
    this.subDes22 = array[49];
    this.subDes23 = array[50];
    this.subDes24 = array[51];
    this.subDes25 = array[52];
  }
}
