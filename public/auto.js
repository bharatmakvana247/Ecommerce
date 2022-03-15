$(document).ready(function() {
    $( "#search" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: siteUrl + '/' +"product",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
                console.log(data);
               var resp = $.map(data,function(obj){
                    return obj.name;

               }); 
               response(resp);
            }
        });
    },
    minLength: 2   
 });
});