

function lastChat(){

    var lastfecha;

    if ($('.chat').children().last().length==0) { lastfecha="0000-00-00 00:00:00"}
    else {
        lastfecha= $('.chat').children().last().data("fecha");
      //  alert(lastfecha);
    }
    return lastfecha;

};


var longichat=0;

function LoadChat(fechaultimo){    ///Optimizar para que se recargue solo cuando sea necesario.

    var uri = "./app/ajax/ajaxLoad.php?fechaultimo=" + fechaultimo ;
    var res = encodeURI(uri);

    $.ajax({
            type: "POST",
            url:res,
            async: true,
            success: function(datos){
                var dataJson = eval(datos);
                
                if (dataJson.length!=longichat){
                     
                     for (var i=0; i<dataJson.length;i++) {
                        console.log("/fotos/"+ dataJson[i].foto);

                        var df = encodeURI(dataJson[i].fecha);                   
                        $('.chat').append(      ///Aun pendiente de mostrar la hora y la foto.

                        			'<li class=\"left clearfix\" data-fecha='+ df  +' > \
                                            <span class=\"chat-img pull-left\" > \
                                                <img src=\"  ./templates/fotos/'+dataJson[i].foto +'\" alt=\"User Avatar\" class=\"img-circle\" /> \
                                            </span> \
                                            <div class=\"chat-body clearfix\"> \
                                                <div class=\"header\"> \
                                                    <strong class=\"primary-font\"> '+ dataJson[i].autor + '</strong>  \
                                                    <small class=\"pull-right text-muted\">  \
                                                        <i class=\"fa fa-clock-o fa-fw\"></i> '+ df.slice(13)+'  \
                                                    </small>  \
                                                </div> \
                                                <p>  \
                                                    '+ dataJson[i].mensaje  + ' \
                                                </p> \
                                            </div>  \
                                        </li> \
                                        '
                        	)            
                    }

                    longichat=dataJson.length;
                }
                 
            },
            error: function (obj, error, objError){
                //avisar que ocurrió un error
            }
    });

};



function sendMessage(){

    
    $.post('./app/ajax/ajaxPost.php', $('#btn-input').serialize(),function(data){});
    console.log($('#btn-input').serialize());
    $('#btn-input').val("");
    return false;
    

};

 
