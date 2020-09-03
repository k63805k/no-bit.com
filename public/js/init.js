$(document).ready(function(){
	$(".send").click(function(){
		var text = $(".send_text").val();
                $(".send_text").val("");
		$.ajax({
			type:"post",
			url:location.pathname,
			data:{ajax_text:text},
			success:function(res){
				if(res == 1){
					
				}
				else if(res == 0){
					
				}
			}
		})
	})
        setInterval(function(){message()}, 1000);
        
});



function message(){
    $.ajax({
        type:"post",
        dataType:"json",
        url:location.pathname,
        data:{ajax_mess: last},
        success:function(res){
           // $('.mass').empty();
             $.each(res, function(){
                 if(this.avatar.length == "")
                     var image = "images.png";
                 else
                     var image = this.avatar;
                 $('.mass').append('<div class="row">'
                            +'<div class="col-lg-12">'
                                +'<div class="media">'
                                    +'<a class="pull-left" href="#">'
                                        +'<img class="media-object img-circle" src="/public/images/'
                                        +image+'" width="30px" alt="">'
                                    +'</a>'
                                    +'<div class="media-body">'
                                        +'<h4 class="media-heading">'+this.fname
                                            +'<span class="small pull-right">'+this.date+'</span>'
                                        +'</h4>'
                                        +'<p>'+this.body+'</p>'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                        +'</div>');
                last = this.id;
             });

        }
    })
}