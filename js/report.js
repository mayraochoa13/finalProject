$(document).ready(function(){
  
    
var volunteers_num = 0;
        //Retrieves average score
        $.ajax({
            type : "GET",
            url  : "submitReport.php",            
            dataType : "json",
            data : {"volunteersAvg" : volunteers_num },            
            success : function(data){
                console.log(data);
                var status = "The average of the volunteers in our ministries is " + data.volunteersAvg;
                if(data){
                      $("#report").html(status);  
                 } else{
                      $("#report").html(" ");  
                 }
            
            },
            complete: function(data,status) { //optional, used for debugging purposes
             //   alert(status);
            }

        });//AJAX
    
}); //documentReady       