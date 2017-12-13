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
                $el.text(result);
                $el.show();
            },
            error:function(data){
                alert(data);
            }
        });
    });
})