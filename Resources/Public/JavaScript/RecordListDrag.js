require(['jquery', '/typo3conf/ext/moduleview_draggable/Resources/Public/JavaScript/JqueryUi.js'], function ()
{

    function onCreate(e, ui) {
        $(this).find('span.draggable').css('cursor', 'move');
    }

    /*
     * Set CSS on helper.
     */
    function onDragStart(e, ui) {
        $(ui.helper).css('display', 'table');
    }


    function makeAjaxCall(url, data, async = true)
    {
        $.ajax({
            type: 'GET',
            url: url,
            async: async,
        });
    }

    function onDragStop(e, ui) {
        var trTable = $(ui.item[0]);
        var preview = trTable.prev();
        var baseURL = trTable.find('span.draggable').data('url');
        var table = trTable.find('span.draggable').data('table');
        var sourceID = trTable.find('span.draggable').data('uid');
        var targetID = preview.length === 0 ? trTable.find('span.draggable').data('pid') : -preview.find('span.draggable').data('uid');
        var params = '&cmd[' + table + '][' + sourceID + '][move]=' + targetID;

        makeAjaxCall(baseURL + params);
    }

    function enableDragging()
    {
        var $tables = $('form[name*="list-table-form"] table');

        $tables.each(function ()
        {
            // var $table = $(this);

            // Enable Dragging for draggable items
            $(this).find('tbody').sortable({
                appendTo: document.body,
                helper: 'clone',
                cursor: 'move',
                items: 'tr:has(span.draggable)',
                revert: true,
                create: onCreate,
                start: onDragStart,
                stop: onDragStop,
            }).disableSelection();
        });
    }

    enableDragging();
});
