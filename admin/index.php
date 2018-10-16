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
      $('#inphotosession').click( () => {
        $.ajax({
          type: "POST",
	  url: "actions.php",
	  data: {
	    action: 'add_in',
	    image: "photosession/"+$('#new_image').val(),
	    derectory: "photosession",
	    description: $('#new_description').val()
	  },
          success: function(data){
	    $('#info').html($('#info').html() + "<br>" + data);
          }
        });
      });
	   
      $('#get_photosession').click( () => {
        $('.item').remove();
	$.ajax({
          type: "POST",
          url: "actions.php",
          data: {
            action: 'get',
	    derectory: "photosession"
          },
          success: function(data){
            var raw_data = data.split('array');
            var allItems = new Array();
            for( n = 1; n < raw_data.length; n++){
              allItems[n-1] = new Item(php_array_to_js_array(raw_data[n]));
            }
            for( n = 0; n < allItems.length; n++){
	      var div = $("<div class='item'></div>");
	      var a = $("<div class='a' style='position:absolute; width:600px;'></div>");
	      a.append($("<span>ID: </span><span class='id'>"+allItems[n].id+"</span><br>"+
	      "<span>Файл: </span><span class='image'>"+allItems[n].image.split("/")[1]+"</span><br>"+
              "<span>Описание: </span><span class='description'>"+allItems[n].description+"</span><br>"));
	      div.append(a);
	      var b = $("<img class='b' style='width:175px; height:175px; position:absolute; margin-left:600px' src='/photosession/"+allItems[n].image+"'>");
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
                  derectory: "photosession"
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
                  derectory: "photosession",
	          image: "photosession/"+$('#new_image').val(),
	          description: $('#new_description').val()
                },
                success: function(data){
                  $('#info').html($('#info').html() + "<br>" + data);
                }
              });
            });
            $('.copy').on('click', (ev) => {
	      var image = $(ev.currentTarget).parent().parent().find('.image').text();
	      var description = $(ev.currentTarget).parent().parent().find('.description').text();
	      $('#new_image').val(image);
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
          this.description = array[2];
        }
      }
      
    });
  </script>
</head>
<body>
<div style="margin-left:15vw; position:fixed; background-color:white; z-index:10;">
  <br>
  <p><input id="new_image" placeholder="Файл"> Например image-1.jpg</p>
  <p><textarea id="new_description" placeholder="Описание" multiline="true"></textarea>То что будет отображатся при наведении на изображение</p>
  <p class="center"><button id="inphotosession">В фотосессии</button><button id="">В архив</button></p>
  <p class="center"><button id="get_photosession">Загрузить фотосессии</button><button id="">Загрузить архив</button></p>
</div>
	
	
<div id="container" style="position:absolute; top:320px;"><div id="info"></div><br><br>
</div>
</body>
</html>
