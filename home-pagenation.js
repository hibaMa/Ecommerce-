/**
 * Created by user on 6/6/2018.
 */

(function(){


    $.get( "controller.php?action=getAllCategory", function( data ) {
        var objArray= JSON.parse(data);


        $('#pagination-container').pagination({
            dataSource: objArray,
            pageSize: 3,
            callback: function(data, pagination) {
                var html = simpleTemplating(data);
                $('#data-container').html(html);
            }
        });


    });

    function simpleTemplating(obj) {
        var html='';
        for(var i=0;i<obj.length;i++) {
             html += '<a href="allProducts.php?id=' + obj[i]["id"] +'&catName='+obj[i]['name']+'" class=\"card\">' +
                '<div class=\"name\">' + obj[i]["name"] + '</div>' +
                '<div class="description des">' +
                obj[i]["description"] +
                '</div>' +
                '</a>';
        }
        console.log(html);
        return html;
    }




})();

