$('#itemGrid').jscroll({
  contentSelector: '.itemRow',
  nextSelector: '.nextPage:last',
  debug: true
});
function updatePage () {
  if (!endOfPage){
    $.request('onUpdatePartial', {
      data: {skip: 0},
      loading: '#infiniLoader',
      success: function (data) {
        onSuccess(data) 
      }
    });
    //offset += 1
  }
}

function onSuccess (data) {
  $.each(data, function (index, value) {
    $('#itemGrid').append(value);
  });
  // if (data['.itemContainer'] == '') {
  //   endOfPage = true;
  // }
}
