
                nom = $("#nom");
                prenom = $("#prenom");
                email = $("#email");
                telephone = $("#phone");
                phone=$("phone");
                password = $("#password");
                password_confime=$("password_confirme");
                pays=$("#pays");
                ville=$("#ville");
                rue=$("#rue");
                boite=$("$boite");
                juste= $("#juste");
                juste2= $("#juste2");
                juste3= $("#juste3");
                juste4= $("#juste4");   
                juste5= $("#juste5");
                send=$("send");
                
            $(document).ready(function(){
                $("#nom").keydown(function(){
                   if( $("#nom").val().trim().length<4){
                        $("#nom").css("border","3px solid red");
                        $("#juste").css("display","none");
                   }
                }); 
            })
            $(document).ready(function(){
                $("#prenom").keydown(function(){
                   if( $("#prenom").val().trim().length<4){
                        $("#prenom").css("border","3px solid red");
                        $("#juste2").css("display","none");
                   }else{
                       $("#prenom").css("border","3px solid green");
                   //     $("#nom").css("border","3px solid green");
                    //    $("#juste2").css("display","block");
                    //    $("#juste2").css("margin-top","-29px");
                    //    $("#juste2").css("margin-left","220px");
                   }
                }); 
            })
            $(document).ready(function(){
                $("#email").keydown(function(){
                   if( $("#email").val().trim().length<4){
                        $("#email").css("border","3px solid red");
                        $("#juste3").css("display","none");
                   }else{
                       $("#email").css("border","3px solid green");
                    //   $("#nom").css("border","3px solid green");
                    //    $("#juste3").css("display","block");
                    //    $("#juste3").css("margin-top","-29px");
                    //    $("#juste3").css("margin-left","220px");
                   }
                }); 
            })
            $(document).ready(function(){
                $("#telephone").keydown(function(){
                   if( $("#telephone").val().trim().length<8){
                        $("#telephone").css("border","3px solid red");
                        $("#juste4").css("display","none");
                   }else{
                       $("#telephone").css("border","3px solid green");
                  
                   }
                }); 
            })
            $(document).ready(function(){
                $("#password").keydown(function(){
                   if( $("#password").val().trim().length<4){
                        $("#password").css("border","3px solid red");
                        $("#juste5").css("display","none");
                   }else{
                       $("#password").css("border","3px solid green");
                  //     $("#nom").css("border","3px solid green");
                    //    $("#juste5").css("display","block");
                    //    $("#juste5").css("margin-top","-29px");
                    //    $("#juste5").css("margin-left","220px");
                     $("#send").css("margin-top","15px");
                   }
                }); 
            })  