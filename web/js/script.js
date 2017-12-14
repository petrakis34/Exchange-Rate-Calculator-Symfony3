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

     //Currencies to capital and check
     $('.inputCur').keyup(function() {
        //input to uppercase
        $(this).val($(this).val().toUpperCase());
        $('p.error1').remove();
        var inputVal = $(this).val();
        var characterReg = /^([A-Z]{3})$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<p class="error1 text-danger">Enter a 3 letter Currency</p>');
        }
        });

      //Currency rate check
      $('.inputRate').keyup(function() {
        $('p.error2').remove();
        var inputVal = $(this).val();
        var characterReg = /^([0-9]{1,3}\.[0-9]{4})/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<p class="error2 text-danger">Enter a decimal like eg 123.1212</p>');
        }
        });

      //Amount of money check at Calculator
      $('.amountMon').keyup(function() {
        $('p.error3').remove();
        var inputVal = $(this).val();
        var characterReg = /^([0-9]{1,})/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<p class="error3 text-danger">Enter a valid number</p>');
        }
        });
        
  });
    

