<?php


function refract_custom_login() {
    $highlight = '#c09124';
    $highlightHover = '#5f6062';
    $textColor = '#282f33';
    $backgroundColor = '#fff';
    $formBackground = '#efefef';
    $logoWidth = "300px";
    $logoHeight = "150px";

    echo '<style type="text/css">
        h1 a {
            background-image: url("'.get_stylesheet_directory_uri().'/images/login.svg") !important;
            background-size: 100% !important;
            width: '.$logoWidth.' !important;
            height: '.$logoHeight.' !important;
        }
        /* Background Color */
        body.login {
            background: '.$backgroundColor.' !important;
            background-image: url("'.get_stylesheet_directory_uri().'/images/Stars-A-min.webp") !important;
        }
        /* Button Color */
        .wp-core-ui .button-primary {
            background: '.$highlight.';
            border-color: '.$highlight.';
            text-shadow: none;
            border-radius: 0;
            box-shadow: none;
            transition: .3s;
            color: #fff;
        }
        .wp-core-ui .button-primary.hover, 
        .wp-core-ui .button-primary:hover, 
        .wp-core-ui .button-primary.focus, 
        .wp-core-ui .button-primary:focus {
            background: '.$highlightHover.';
            border-color: '.$highlightHover.';
            outline: none;
            box-shadow: none;
            color: #fff;
        }
        /* Form  */
        .login form {
            background: '.$formBackground.';
            box-shadow: none;
        }
        .login form label {
            color: '.$textColor.';
        }
        .login p,
        .login h2,
        .login h3,
        .login button {
            color: '.$textColor.'
        }
        input[type=text], input[type=search], input[type=radio], input[type=tel], input[type=time], input[type=url], input[type=week], input[type=password], input[type=checkbox], input[type=color], input[type=date], input[type=datetime], input[type=datetime-local], input[type=email], input[type=month], input[type=number], select, textarea{
            box-shadow: none;
            background: #fff;
        }
        
        input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus{
            border-color: '.$highlightHover.';
            outline: none;
            box-shadow: none;
        }
        
        .login #login_error,
        div.updated, 
        .login .message, 
        .press-this #message {
            border-left-color: '.$highlight.';
        }

        .login #nav {
          background-color: #fff!important;
          border-radius: 5px;
          padding: 10px 20px;
        }
    </style>';
}
add_action('login_head', 'refract_custom_login');
