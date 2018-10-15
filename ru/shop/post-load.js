$( () => {
  $('#filters .filters .fil-close-btn').click( () => {
    $('.filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#to_filters').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#use_filters').css({
      visibility: "visible",
      zIndex: 100
    });
  });
  
  $('#currentItem .fil-close-btn').click( () => {
    $('#currentItem').css({"visibility": "hidden"});
  });
  
  $('#to_types').click( () => {
    $('#types').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#use_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
  });
  
  $('#to_stones').click( () => {
    $('#stones').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#use_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
  });
  
  $('#to_technology').click( () => {
    $('#technology').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#use_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
  });
  
  $('#to_cost').click( () => {
    $('#cost').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#use_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
  });
  
  $('#use_filters').click( () => {
    filter_out();
  });
  
  $('#cost-up-to-down').on('change', function(){
    if ($(this).is(':checked')){
        $('#cost-down-to-up').prop('checked', false);
    }else{
        $('#cost-down-to-up').prop('checked', true);
    }
  });

  $('#cost-down-to-up').on('change', function(){
    if ($(this).is(':checked')){
       $('#cost-up-to-down').prop('checked', false);
    }else{
       $('#cost-up-to-down').prop('checked', true);
    }
  });
  
  $('.buyBtn').click( () => {
    document.location = "/ru/contacts";
  });
  
});

