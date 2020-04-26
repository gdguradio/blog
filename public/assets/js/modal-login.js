/* #####################################################################
   #
   #   Project       : Modal Login with jQuery Effects
   #   Author        : Rodrigo Amarante (rodrigockamarante)
   #   Version       : 1.0
   #   Created       : 07/29/2015
   #   Last Change   : 08/04/2015
   #
   ##################################################################### */
   
   $(function() {
    
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 5000;
    var $siteurl = site_url;
    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
                var formData = new FormData();
        
        
                formData.append('strUserName',$lg_username);
                formData.append('strPassWord',$lg_password);
                $.ajax({
                    type:'POST',
                    url: $siteurl + '/Register/retrieve' ,
                    dataType:"json",
                    data:formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success:function(data)
                    {
                        if(data.errstatus == 'true'){
                            msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", data.msg);
                        }else{
                            msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", data.msg);
                            setTimeout(function() {
                                $(".infoemail").text("Email : " +data.email)
                                $(".inforole").text("Role : " +data.role)
                                $('#login-modal').modal('toggle');
                                $(".alogin").remove()
                                console.log(data.role)
                                if(data.role == 'Admin'){
                                    // $("header nav").prepend('<a href="'+$siteurl+'/Register/logout" class="alogout">Logout</a>')
                                    $("#navbarResponsive").append('<ul class="navbar-nav ml-auto"><li class="nav-item"><li class="nav-item"><a class="nav-link" href="<?=site_url("/")?>Home</a></li><li class="nav-item"><a class="nav-link" href="about.html">About</a></li><li class="nav-item"><a class="nav-link" href="'+$siteurl+'/postlist">Post List</a></li><li class="nav-item"><a class="nav-link" href="'+$siteurl+'/newpost">Create Post</a></li><li class="nav-item"><a href="'+$siteurl+'/Register" class="nav-link acreg" >Check Register</a></li><li class="nav-item"><a href="'+$siteurl+'/Register/logout" class="nav-link alogout">Logout</a></li></ul>')

                                }else{
                                    $("#navbarResponsive").append('<ul class="navbar-nav ml-auto"><li class="nav-item"><li class="nav-item"><a class="nav-link" href="<?=site_url("/")?>Home</a></li><li class="nav-item"><a class="nav-link" href="about.html">About</a></li><li class="nav-item"><a class="nav-link" href="'+$siteurl+'/postlist">Post List</a></li><li class="nav-item"><a class="nav-link" href="'+$siteurl+'/newpost">Create Post</a></li><li class="nav-item"><a href="'+$siteurl+'/Register/logout" class="nav-link alogout">Logout</a></li></ul>')
                                }
                                $("header nav a[href='#menu']").text(data.name)
                              }, $msgShowTime);
                            
                        }   
                    }
                });
                // if ($lg_username == "ERROR") {
                //     msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                // } else {
                //     msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                // }
                return false;
                break;
            case "lost-form":
                var $ls_email=$('#lost_email').val();
                if ($ls_email == "ERROR") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                } else {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                }
                return false;
                break;
            case "register-form":
                var $rg_username=$('#register_username').val();
                var $rg_email=$('#register_email').val();
                var $rg_password=$('#register_password').val();
                var $rg_fullname=$('#register_fullname').val();
                var $rg_age=$('#register_age').val();

                var formData = new FormData();
        
        
                formData.append('strUserName',$rg_username);
                formData.append('strEmail',$rg_email);
                formData.append('strPassWord',$rg_password);
                formData.append('strFullName',$rg_fullname);
                formData.append('intAge',$rg_age);
                $.ajax({
                    type:'POST',
                    url: $siteurl + '/Register/store' ,
                    dataType:"json",
                    data:formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success:function(data)
                    {
                        if(data.errstatus == 'true'){
                            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", data.msg);
                        }else{
                            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", data.msg);
                            document.getElementById('register-form').reset();
                        }   
                    }
                });

                // if ($rg_username == "ERROR") {
                //     msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Register error");
                // } else {
                //     msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
                // }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });
    
    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
    $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
    $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
    
    

    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }
    
    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).html($msgText).fadeIn($msgAnimateTime);
        });
    }
    
    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
  		}, $msgShowTime);
    }
});