jQuery(document).ready(function($){

    $(window).on("message",function(e) {
        var data = null;
        try {
            if(e.originalEvent)
                data = JSON.parse(e.originalEvent.data);
        } catch (e){
            data = null;
        }

        if(data && data.wizshop) {
            if(data.cpPainted){
                if(data.id === "product-container"){
                    responsiveTables();
                    $(window).resize(function(){
                        responsiveTables();
                    });
                }
            }
        }
    });

    function responsiveTables() {
        $('.wiz-table').each(function(){
            var $table = $(this);

            var col_length = [];
            $table.find('.wiz-table-row').each(function(){
                var $row = $(this);
                var $cells = $row.find('.wiz-table-cell');

                $cells.each(function(){
                    var $cell = $(this);
                    var $cell_title = $cell.find('.table-cell-mobile-title');
                    var cell_title_width = $cell_title.outerWidth();
                    col_length.push(parseInt(cell_title_width));
                });

                var widest_cell = Math.max.apply(Math, col_length);console.log(widest_cell);

                $cells.find('.table-cell-mobile-title').outerWidth(widest_cell).data('test', widest_cell);
            });
        });
    }
});