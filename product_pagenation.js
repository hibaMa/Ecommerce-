/**
 * Created by user on 6/10/2018.
 */

/**
 * Created by user on 6/6/2018.
 */

(function(){


    $.get( "controller.php?action=getAllProducts&id="+$('#catId').val(), function( data ) {
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
            html += '<a href="product.php?id='+obj[i]['id']+'" class="card">'+
            '<div class="imgDiv"><img class="image" src="'+obj[i]['images']+'"></div>'+
            '<div class="info">'+
            '<div class="name">'+obj[i]['name']+'</div>'+
            '<div class="price">'+obj[i]['price']+'$</div>'+
            '</div>'+
            '<div class="clearFix"></div>'+
            '</a>';
        }
        console.log(html);
        return html;
    }




})();

