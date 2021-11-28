
function edittitle(){
    $.ajax({
            	       	url         : '/ajax/anh.php?edit',
    	            	type        : 'POST',
    	            	data        : $("#ducnghia_form").find("select, textarea, input").serialize(),
                  	success : function(result){

thongbao(result);
    	            	}
    	        	});
}

$(document).on('click', 'a', function (evt) {
            evt.preventDefault();
        	var href = $(this).attr('href');
        var check  = href.split("//");
        

      getContent(href);
        	


 });

    
    function getContent(url, functionx) {
        loadingView = false;
        if(!functionx) {
              //  $("html, body").animate({ scrollTop: 0 }, 50);
        }
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       $('#ducnghia').html(this.responseText);
     
    }
  };
  
xhttp.open("POST", url, true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("t=1&code=1");      
    }