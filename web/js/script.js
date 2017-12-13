$(document).ready(function(){
    
    $("#calculateBtn").click(function(e){
        
        var valuePrice = $("#valuePrice").val();
        var valueId = $("#cur_select option:selected").val();
        e.preventDefault();
        $.ajax({
           
            url:"calculate",
            type:"POST",
            data:{ 
                amount:valuePrice,
                currency_id:valueId
            },
            success: function(data){ 
                var result = data.result;
                var $el = $('.showResult');
                $el.text(result.toFixed(2));
                $el.show();
            },
            error:function(data){
                alert(data);
            }
        });
    });

    //Delete articles
    $(".deleteBtn").click(function(){ 

       var currencyId = $(this).val();
        
           $.ajax({
              url:"delete",
              method:"POST",
              data:{
                  id:currencyId
              },
              success:function(data){  
                window.location.reload();
              },
              error:function(data){
                alert(data);
              }
           });
        });



})