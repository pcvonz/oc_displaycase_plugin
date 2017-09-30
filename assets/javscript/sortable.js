function initializeSorting() {
    var $tbody = $('.drag-handle').parents('table.data tbody');
    sort = Sortable.create($tbody[0], {
        handle: '.drag-handle',
        animation: 150,
        onEnd: function (evt) {
            var $inputs = $('.index_reposition').map(function () {
              return $(this).val(); 
            }).get();
            $.request('onReorder', {
              data: {vals: $inputs},
              success: initializeSorting()
            });
        }
    });

}


$(window).ready(function (){
  var sort;
  var target = document.querySelector('#Items-update-RelationController-description');
  console.log(target);
  //observer stuff
  initializeSorting();
  var observer = new MutationObserver(function(mutations) {
    initializeSorting();
  });

  var config = { attributes: true, childList: true, characterData: true, subtree: true};
  observer.observe(target, config);
  
});


