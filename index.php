<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <style type="text/css">
        @font-face
        {
        font-family: 'BallparkWeiner';
        src: url('fonts/iconfont.eot');
        src: url('fonts/iconfont.eot?#iefix') format('embeddedopentype'),
        url('fonts/iconfont.woff') format('woff'),
        url('fonts/iconfont.ttf') format('truetype'),
        url('fonts/iconfont.svg#BallparkWeiner') format('svg');
        }
        #wrapper{
            width: 780px;
            margin: auto;
        }
        .log-wrapper {
            float: right;
        }
        .log {
            max-height: 300px;
            overflow: auto;
        }
        .log .log__entry {
            margin: .1em 0;
            padding: .1em .2em;
            border: 1px solid black;
            white-space: nowrap;
        }

        .timeSlot{
        	margin-bottom: 2px;
        	width: 100%;
        }
    </style>
    <title></title>
</head>
<body>
    <div id="wrapper">
    	<br><br>
        <!-- Div de la date picker -->
        <div  class="date-picker-2" placeholder="Recipient's username" id="demo2" aria-describedby="basic-addon2"></div>
        <br>
        <!-- Input prenant l'heure selectionner  -->
        <p type="text" name="heureRdzVs" id="heureRdzVs" class="text-center"></p>
        <style type="text/css">
            .prpo{
                width: 200px;
                height: 210px;
                border: 1px solid gray;
                position: absolute;
                display: none;
                border-radius: 5px;
                background: white;
                -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                right: 4px;
                overflow: auto;
            }
            .fllbtn{
                width: 100%;
                margin-bottom: 2px;
                margin-left: -2px;
                margin-right: -2px;
            }
            #hdPP{
                margin-top: -15px;
            }
            #hdPP0{
                margin-bottom: -10px;
            }
        </style>
        <div class="prpo">
            <div class="container-fluid">
                <div>fermer</div>
                <h4 id="hdPP0" class="text-center">Heures Disponibles</h4>
                <hr>
                <p id="hdPP">Rendez-vous disponible pour <strong id="dateProp"></strong></p>
            </div>
            <!-- La class fllbtn doit etre inclut pour les evenements dans le modal -->
            <div class="container-fluid" id="btnFullDispo">
                <button  class="btn btn-default fllbtn">8:00 AM – 9:00 AM</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){

            var dt;
            $('#demo2').datepicker({
                onSelect: function(dateText) { 
                    $('#dateProp').text(dateText);
                    dt = dateText;
                    var pos = $('#demo2').position();
                    $('#heureRdzVs').val("");
                    $('.prpo').css("top",pos.top);
                    $('.prpo').css("left",pos.left - 200);
                    $('.prpo').show(200); 
                    $.ajax({
                        url : "post.php",
                        method : "POST",
                        data:{sendDate:dateText},
                        success: function(data){
                            $('#btnFullDispo').empty();
                            $.each(data.hDispo,function(key,val){
                                /*console.log(val);*/
                                $('#btnFullDispo').append('<button  class="btn btn-default fllbtn">'+val+'</button><br>');
                            });
                            $('.fllbtn').on('click',function(e){
                                var h = $(this).text()
                                $('.prpo').hide(200);
                                $.ajax({
                                    url : "post.php",
                                    method : "POST",
                                    data:{date:dt,heure:h},
                                    success: function(data){
                                        $('#heureRdzVs').text(data.msj);
                                        console.log(data);
                                    }
                                });
                            });
                        }
                    }); 
                }
            });
            /*En cliquant sur un bouton du modal , on recupere le texte et on l'ajoute dans l'input*/
            

            $(window).resize(function(){
                var pos = $('#demo2').position();
                $('.prpo').css("top",pos.top);
                $('.prpo').css("left",pos.left - 200);
            });
        });
    </script>
</body>
</html>
