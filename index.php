<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="cal/jquery.datetimepicker.min.css"/>
    <script type="text/javascript" src="cal/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="cal/jquery.datetimepicker.min.js"></script>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- END -->
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
        <div id="demo2"></div>
        <br>
        <!-- Input prenant l'heure selectionner  -->
        <input type="text" name="heureRdzVs" id="heureRdzVs" class="text-center">
        <style type="text/css">
            .prpo{
                width: 200px;
                height: 280px;
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
        </style>
        <div class="prpo">
            <div class="container-fluid">
                <h4 class="text-center">Heures Disponibles</h4>
                <hr>
                <p>Rendez-vous disponible pour <strong id="dateProp"></strong></p>
            </div>
            <!-- La class fllbtn doit etre inclut pour les evenements dans le modal -->
            <div class="container-fluid">
                <button  class="btn btn-success fllbtn">8:00 AM – 9:00 AM</button>
                <br><button  class="btn btn-success fllbtn">10:00 AM – 12:00 PM</button>
                <br><button  class="btn btn-success fllbtn">12:00 PM – 2:00 PM</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#demo2').datetimepicker({
                date: new Date(),
                viewMode: 'YMD',
                onDateChange: function(){
                    $('#dateProp').text(this.getText('YYYY-MM-DD'));
                    var pos = $('#demo2').position();
                    $('#heureRdzVs').val("");
                    $('.prpo').css("top",pos.top);
                    $('.prpo').css("left",pos.left - 200);
                    $('.prpo').show(200);  
                },
                onClear: function(){
                    $('.prpo').hide(200);
                },
                onOk : function(){
                    $('.prpo').hide(200);
                    alert('Sending.....');
                }
            });
            /*En cliquant sur un bouton du modal , on recupere le texte et on l'ajoute dans l'input*/
            $('.fllbtn').on('click',function(e){
                    $('#heureRdzVs').val($(this).text());
                    $('.prpo').hide(200);
                });

            $(window).resize(function(){
                var pos = $('#demo2').position();
                    $('.prpo').css("top",pos.top);
                    $('.prpo').css("left",pos.left - 200);
            });
        });
    </script>
</body>
</html>
