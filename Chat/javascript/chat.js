$(function(){
    $(document).on('submit','#chatForm',function(){
        var text = $.trim($("#text").val());
        var name = $.trim($("#name").val());

        if(text!="" && name !=""){
            $.post('postMessage.php',{text: text, name: name}, function(data)){
                $(".chatMessages").append(data);
                $( '#chatForm' ).each(function(){
                    this.reset();
                });
            });
        }
        else{
            alert("Data missing!");
        }
    });

    function getMess(){
        $.get("GetMess.php",function(data){
            $(".chatMessages").html(data);
        });
    }
    setInterval(function(){
        getMess();
    },500);
});
