<html>
    <head>
        <title>Login</title>
        <?php include "parts/header.php"; ?>
    </head>

    <body>
        <img style="width:500px;height:230px;display:block;margin:50px auto 20px auto;"/>
        <div class="event-card" style="display:block;margin:0 auto;">
            <div style="text-align: center" class="form-title">Identification</div>
            <div id="login" contenteditable="true" placeholder="Username" spellcheck="false" class="form-input" style="text-align: center"></div>
            <input id="password" type="password" placeholder="Password" spellcheck="false" class="form-input" style="padding:8px 5px;font-family:Roboto,sans-serif;font-size:16px;text-align:center;width:100%;border:none;"></input>
            <button id="submit_login" class="btn">Entrer ></button>
            <div style="clear:both;"></div>
        </div>
    </body>

    <script src="js/jquery.js"></script>
    <script>
        $("#submit_login").click(function(){
            $.ajax({
                method:"POST",
                url:"traitements/login.php",
                data:{
                    login:$("#login").html(),
                    password:$("#password").val()
                },
                dataType:"json"
            }).done(function(data){
                if(data.status) window.location = "index.php";
            })
        })
    </script>

</html>