function initializeSorting() {
    var $tbody = $('.drag-handle').parents('table.data tbody');
    Sortable.create($tbody[0], {
        handle: '.drag-handle',
        animation: 150,
        onEnd: function (evt) {
            var $inputs = $(evt.from).find('td>div.drag-handle>input');
            console.log($inputs[0].value);
            $.request('onReorder', {
              data: {valuea: $inputs[0].value, valueb: $inputs[1].value},
            });
        }
    });
}

$(function () {
    initializeSorting();
});
