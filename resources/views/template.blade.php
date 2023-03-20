<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eCounter</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
            
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">    <style>

        /* The snackbar - position it at the bottom and in the middle of the screen */
        #snackbar {
        visibility: hidden; /* Hidden by default. Visible on click */
        min-width: 250px; /* Set a default minimum width */
        margin-left: -125px; /* Divide value of min-width by 2 */
        background-color: #333; /* Black background color */
        color: #fff; /* White text color */
        text-align: center; /* Centered text */
        border-radius: 2px; /* Rounded borders */
        padding: 16px; /* Padding */
        position: fixed; /* Sit on top of the screen */
        z-index: 1; /* Add a z-index if needed */
        left: 50%; /* Center the snackbar */
        bottom: 50px; 
        }

        /* Show the snackbar when clicking on a button (class added with JavaScript) */
        #snackbar.show {
        visibility: visible; /* Show the snackbar */
        /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
        However, delay the fade out process for 2.5 seconds */
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        /* Animations to fade the snackbar in and out */
        @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
        }
    </style>
    </head>
    <body>
        <div class="container">
            @yield("content")
        </div>
        <div id="snackbar"></div>

        <script src="/js/jquery-3.1.0.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    </body>
    <script>
        function toast(mensagem) {
            // Get the snackbar DIV
            var x = document.getElementById("snackbar");

            // Add the "show" class to DIV
            x.innerHTML = mensagem;
            x.className = "show";
                
            // After 3 seconds, remove the show class from DIV
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
       }
       $(document).ready(function() {
             @yield("script")
             @if (Session::has('err'))
                toast('{!! \Session::get('err') !!}');
             @endif
       });

       function rota(r) {
            document.location.href=r;        
       }
       function deleteEvento(id) {
        $.confirm({
            title: 'Confirme',
            content: 'Confirma a exclusão do evento?',
            buttons: {
                confirm: function () {
                    rota('/evento.delete.'+id);
                },
                cancel: function () {
                    toast('Evento mantido no banco')
                }
            }
        });
       }
       function up(id) {
            $.ajax({
                method: "get",
                url: "/evento.inc."+id,
                success: function (data) {
                    $('#sp' + id).html(parseInt($('#sp1').html()) + 1);
		    $('#spUltimo' + id).html(data);
                }
            });
       }
       function down(id) {
            $.ajax({
                method: "get",
                url: "/evento.dec."+id,
                success: function (data) {
		    if ($('#sp1').html() >  0) {
	                $('#sp' + id).html(parseInt($('#sp1').html()) - 1);
		        $('#spUltimo' + id).html(data);
		    }
                }
            });
       }
	   function novoUsuario() {
		   rota('/novoUsuario');
	   }
       
    </script>

</html>
