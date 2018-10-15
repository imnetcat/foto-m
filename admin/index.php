<!DOCTYPE html>
<html><head>
  <style>
    body {
      margin-top: 0;
    }
    input {
      width: 20vw;
    }
    textarea {
      width: 20vw;
    }
    .center {
      text-align:center;
    }
    .item {
      height:200px;
      margin-left:20vw;
    }
    p {
      margin-top: 2px;
      display: block;
      -webkit-margin-before: 5px;
      -webkit-margin-after: 5px;
      -webkit-margin-start: 0;
      -webkit-margin-end: 0;
    }
    #info {
      width:20vw;
      position:fixed;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script async="">
    $( () => {
      var client_w = screen.width;
      console.log(client_w);
      if(client_w < 1024){
        $('#container').css({
          "marginLeft": "1vw",
          "width": "96vw"
        })
      }
    });
  </script>
  <script async>
    $( () => {
      $('#inshop').click( () => {
	var cost = $('#new_cost').val().split('');
	var length = cost.length;
	cost = cost.join('.');
	if(length == 2){
          cost = "0." + cost;
          cost = "0." + cost;
          cost = "0." + cost;
          cost = "0." + cost;
	}
	if(length == 3){
          cost = "0." + cost;
          cost = "0." + cost;
          cost = "0." + cost;
	}
	if(length == 4){
          cost = "0." + cost;
          cost = "0." + cost;
	}
	if(length == 5){
          cost = "0." + cost;
	}
        $.ajax({
          type: "POST",
	  url: "actions.php",
	  data: {
	    action: 'add_in_shop',
	    image: "items/"+$('#new_image').val(),
	    type: $('#new_type').val(),
	    stone: $('#new_stone').val(),
	    technology: $('#new_technology').val(),
	    cost: cost,
	    filter_5: $('#new_filter_5').val(),
	    description: $('#new_description').val()
	  },
          success: function(data){
	    $('#info').html($('#info').html() + "<br>" + data);
          }
        });
      });
	    
      $('#inarchive').click( () => {
	var cost = $('#new_cost').val().split('');
	var length = cost.length;
	cost = cost.join('.');
	if(length == 2){
          cost = "0." + cost;
          cost = "0." + cost;
          cost = "0." + cost;
          cost = "0." + cost;
	}
	if(length == 3){
          cost = "0." + cost;
          cost = "0." + cost;
          cost = "0." + cost;
	}
	if(length == 4){
          cost = "0." + cost;
          cost = "0." + cost;
	}
	if(length == 5){
          cost = "0." + cost;
	}
        $.ajax({
          type: "POST",
	  url: "actions.php",
	  data: {
	    action: 'add_in_archive',
	    image: "items/"+$('#new_image').val(),
	    type: $('#new_type').val(),
	    stone: $('#new_stone').val(),
	    technology: $('#new_technology').val(),
	    cost: cost,
	    filter_5: $('#new_filter_5').val(),
	    description: $('#new_description').val()
	  },
          success: function(data){
	    $('#info').html($('#info').html() + "<br>" + data);
          }
        });
      });
	    
      $('#get_shop').click( () => {
        $('.item').remove();
	$.ajax({
          type: "POST",
          url: "actions.php",
          data: {
            action: 'get_shop'
          },
          success: function(data){
            var raw_data = data.split('array');
            var allItems = new Array();
            for( n = 1; n < raw_data.length; n++){
              allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
            }
            for( n = 0; n < allItems.length; n++){
	      var raw_cost = allItems[n].cost.split(".");
	      var cost = Number(raw_cost[0] + "" + raw_cost[1] + "" + raw_cost[2] + "" + raw_cost[3] + "" + raw_cost[4] + "" + raw_cost[5]);
              var div = $("<div class='item'></div>");
	      var a = $("<div class='a' style='position:absolute; width:600px;'></div>");
	      a.append($("<span>ID: </span><span class='id'>"+allItems[n].id+"</span><br>"+
	      "<span>Файл: </span><span class='image'>"+allItems[n].image.split("/")[1]+"</span><br>"+
              "<span>Тип: </span><span class='type'>"+allItems[n].type+"</span><br>"+
              "<span>Камни: </span><span class='stone'>"+allItems[n].stone+"</span><br>"+
              "<span>Технология: </span><span class='technology'>"+allItems[n].technology+"</span><br>"+
              "<span>Цена: </span><span class='cost'>"+cost+"</span><br>"+
              "<span>ФИЛЬТЕР №5: </span><span class='filter_5'>"+allItems[n].filter_5+"</span><br>"+
              "<span>Описание: </span><span class='description'>"+allItems[n].description+"</span><br>"));
	      div.append(a);
	      var b = $("<img class='b' style='width:175px; height:175px; position:absolute; margin-left:600px' src='/ru/shop/"+allItems[n].image+"'>");
	      div.append(b);
	      var c = $("<div class='c' style='margin-left:900px'><br><button class='del'>Удалить</button><br><br><button class='change'>Изменить</button><br><br><button class='copy'>Скопировать</button></div>");
	      div.append(c);
	      $('#container').append(div);
	    }
	    $('.del').click( (ev) => {
	      var ID = $(ev.currentTarget).parent().parent().find('.id').text();
	      $.ajax({
                type: "POST",
                url: "actions.php",
                data: {
                  action: 'delete',
                  id: ID,
                  derectory: "shop"
                },
                success: function(data){
                  $('#info').html($('#info').html() + "<br>" + data);
                }
              });
            });
            $('.change').click( (ev) => {
	      var ID = $(ev.currentTarget).parent().parent().find('.id').text();
	      var cost = $('#new_cost').val().split('');
	      var length = cost.length;
	      cost = cost.join('.');
	      if(length == 2){
                cost = "0." + cost;
                cost = "0." + cost;
                cost = "0." + cost;
                cost = "0." + cost;
	      }
	      if(length == 3){
                cost = "0." + cost;
                cost = "0." + cost;
                cost = "0." + cost;
	      }
	      if(length == 4){
                cost = "0." + cost;
                cost = "0." + cost;
	      }
	      if(length == 5){
                cost = "0." + cost;
	      }
	      $.ajax({
                type: "POST",
                url: "actions.php",
                data: {
                  action: 'change',
                  id: ID,
                  derectory: "shop",
	          image: "items/"+$('#new_image').val(),
	          type: $('#new_type').val(),
	          stone: $('#new_stone').val(),
	          technology: $('#new_technology').val(),
	          cost: cost,
	          filter_5: $('#new_filter_5').val(),
	          description: $('#new_description').val()
                },
                success: function(data){
                  $('#info').html($('#info').html() + "<br>" + data);
                }
              });
            });
            $('.copy').on('click', (ev) => {
	      var image = $(ev.currentTarget).parent().parent().find('.image').text();
	      var type = $(ev.currentTarget).parent().parent().find('.type').text();
	      var stone = $(ev.currentTarget).parent().parent().find('.stone').text();
	      var technology = $(ev.currentTarget).parent().parent().find('.technology').text();
	      var cost = $(ev.currentTarget).parent().parent().find('.cost').text();
	      var filter_5 = $(ev.currentTarget).parent().parent().find('.filter_5').text();
	      var description = $(ev.currentTarget).parent().parent().find('.description').text();
	      $('#new_image').val(image);
	      $('#new_type').val(type);
	      $('#new_stone').val(stone);
	      $('#new_technology').val(technology);
	      $('#new_cost').val(cost);
	      $('#new_filter_5').val(filter_5);
	      $('#new_description').val(description);
            });
          }
        });
      });
	    
      $('#get_archive').click( () => {
        $('.item').remove();
	$.ajax({
          type: "POST",
          url: "actions.php",
          data: {
            action: 'get_archive'
          },
          success: function(data){
            var raw_data = data.split('array');
            var allItems = new Array();
            for( n = 1; n < raw_data.length; n++){
              allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
            }
            for( n = 0; n < allItems.length; n++){
	      var raw_cost = allItems[n].cost.split(".");
	      var cost = Number(raw_cost[0] + "" + raw_cost[1] + "" + raw_cost[2] + "" + raw_cost[3] + "" + raw_cost[4] + "" + raw_cost[5]);
              var div = $("<div class='item'></div>");
	      var a = $("<div class='a' style='position:absolute; width:600px;'></div>");
	      a.append($("<span>ID: </span><span class='id'>"+allItems[n].id+"</span><br>"+
	      "<span>Файл: </span><span class='image'>"+allItems[n].image.split("/")[1]+"</span><br>"+
              "<span>Тип: </span><span class='type'>"+allItems[n].type+"</span><br>"+
              "<span>Камни: </span><span class='stone'>"+allItems[n].stone+"</span><br>"+
              "<span>Технология: </span><span class='technology'>"+allItems[n].technology+"</span><br>"+
              "<span>Цена: </span><span class='cost'>"+cost+"</span><br>"+
              "<span>ФИЛЬТЕР №5: </span><span class='filter_5'>"+allItems[n].filter_5+"</span><br>"+
              "<span>Описание: </span><span class='description'>"+allItems[n].description+"</span><br>"));
	      div.append(a);
	      var b = $("<img class='b' style='width:175px; height:175px; position:absolute; margin-left:600px' src='/ru/archive/"+allItems[n].image+"'>");
	      div.append(b);
	      var c = $("<div class='c' style='margin-left:900px'><br><button class='del'>Удалить</button><br><br><button class='change'>Изменить</button><br><br><button class='copy'>Скопировать</button></div>");
	      div.append(c);
	      $('#container').append(div);
            }
            $('.del').click( (ev) => {
	      var ID = $(ev.currentTarget).parent().parent().find('.id').text();
	      $.ajax({
                type: "POST",
                url: "actions.php",
                data: {
                  action: 'delete',
                  id: ID,
                  derectory: "archive"
                },
                success: function(data){
                  $('#info').html($('#info').html() + "<br>" + data);
                }
              });
            });
            $('.change').click( (ev) => {
	      var ID = $(ev.currentTarget).parent().parent().find('.id').text();
	      $.ajax({
                type: "POST",
                url: "actions.php",
                data: {
                  action: 'change',
                  id: ID,
                  derectory: "archive",
	          image: "items/"+$('#new_image').val(),
	          type: $('#new_type').val(),
	          stone: $('#new_stone').val(),
	          technology: $('#new_technology').val(),
	          cost: $('#new_cost').val(),
	          filter_5: $('#new_filter_5').val(),
	          description: $('#new_description').val()
                },
                success: function(data){
                  $('#info').html($('#info').html() + "<br>" + data);
                }
              });
            });
            $('.copy').on('click', (ev) => {
	      var image = $(ev.currentTarget).parent().parent().find('.image').text();
	      var type = $(ev.currentTarget).parent().parent().find('.type').text();
	      var stone = $(ev.currentTarget).parent().parent().find('.stone').text();
	      var technology = $(ev.currentTarget).parent().parent().find('.technology').text();
	      var cost = $(ev.currentTarget).parent().parent().find('.cost').text();
	      var filter_5 = $(ev.currentTarget).parent().parent().find('.filter_5').text();
	      var description = $(ev.currentTarget).parent().parent().find('.description').text();
	      $('#new_image').val(image);
	      $('#new_type').val(type);
	      $('#new_stone').val(stone);
	      $('#new_technology').val(technology);
	      $('#new_cost').val(cost);
	      $('#new_filter_5').val(filter_5);
	      $('#new_description').val(description);
            });
          }
        });
      });
	    
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
	    
      class Item {
        constructor(array) {
          this.id = array[0];
          this.image = array[1];
          this.type = array[2];
          this.stone = array[3];
          this.technology = array[4];
          this.cost = array[5];
          this.filter_5 = array[6];
          this.description = array[7];
        }
      }
      
    });
  </script>
</head>
<body>
<div style="margin-left:15vw; position:fixed; background-color:white; z-index:10;">
  <br>
  <p><input id="new_image" placeholder="Файл"> Например image-1.jpg</p>
  <p><input id="new_type" placeholder="Тип"> Доступны только эти: rings,bracelets,necklaces,earrings,pendants,other (можно писать много, через запятую, но без пробела после запятых)</p>
  <p><input id="new_stone" placeholder="Камни">  Доступны только эти: agat,aquamarine,diamond,garnet,sapphire,opal (можно писать много, через запятую, но без пробела после запятых)</p>
  <p><input id="new_technology" placeholder="Технология"> Доступны только эти: epoxy,foundry,sketching (можно писать много, через запятую, но без пробела после запятых)</p>
  <p><input id="new_cost" placeholder="Цена"> Без точек или запятых</p>
  <p><input id="new_filter_5" placeholder="ФИЛЬТР №5"> Пока что не для чего не используется, можно оставить пустым</p>
  <p><textarea id="new_description" placeholder="Описание" multiline="true"></textarea>То что будет отображатся при наведении на изображение</p>
  <p class="center"><button id="inshop">В магазин</button><button id="inarchive">В архив</button></p>
  <p class="center"><button id="get_shop">Загрузить магазин</button><button id="get_archive">Загрузить архив</button></p>
</div>
	
	
<div id="container" style="position:absolute; top:320px;"><div id="info"></div><br><br>
</div>
</body>
</html>
