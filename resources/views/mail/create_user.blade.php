<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">

        body{
            text-align: center;

        }
        div{
            margin: 2% auto;
            max-width: 20%;
            min-width: 240px;
            padding: 2%;

            background: rgb(100,100,100);
        }
        img{
            max-width: 100px;
        }
        p{
            width: auto;
            font-family:sans-serif;
            font-size: 24px;
        }
        .texteBase{
        }
        .identifiants{
            font-size: 30px;
            background: rgb(38,166,154, 0.3);
            word-wrap: break-word;
        }
        a{
            font-size: 24px;
        }

    </style>
</head>
<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
<p  class="texteBase">
    Bonjour {{ $user->name }},
    Un compte à été crée pour vous, voici vos identifiants :
</p>
<div >
    <a href="https://dev.beaumel43.com/" id="siteweb">
        <img src="https://dev.beaumel43.com/img/logo.png">
    </a>
    <p>
        Email : <br> <span class="identifiants">{{ $user->email }}</span>
    </p>
    <p>
        Mots de passe :<br> <span class="identifiants">{{ $password }}</span>
    </p>
    <a href="https://dev.beaumel43.com/" id="siteweb">aller au site web</a>
</div>
</body>

</html>
