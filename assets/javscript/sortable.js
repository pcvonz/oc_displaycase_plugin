var sort;
function initializeSorting() {
    var $tbody = $('.drag-handle').parents('table.data tbody');
    if($tbody.length > 0) {
      sort = Sortable.create($tbody[0], {
          handle: '.drag-handle',
          animation: 150,
          onEnd: function (evt) {
              var $inputs = $('.index_reposition').map(function () {
                return $(this).val(); 
              }).get();
              $.request('onRelationReorder', {
                data: {vals: $inputs},
                success: initializeSorting()
              });
          }
      });
    }

}


$(window).ready(function (){
  var target = $("[id$=-RelationController-section]").get()[0];
  console.log(target);
  initializeSorting();
  
  //Mutation Observer
  var observer = new MutationObserver(function(mutations) {
    initializeSorting();
  });

  var config = { attributes: true, childList: true, characterData: true, subtree: true};
  observer.observe(target, config);
  
});


