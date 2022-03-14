<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">

        html{
            width: 100%;
        }

        body{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        div#main{
            width: 50%;
            min-width: 240px;
            padding: 50px;

            background: rgba(32, 178, 170, 0.47);
            border-radius: 10px;
        }
        img{
            max-width: 100px;
        }
        p{
            width: auto;
            font-family:sans-serif;
            font-size: 24px;
        }
        .identifiants{
            font-size: 30px;
            background: white;
            border-radius: 10px;
            padding: 5px;
            word-wrap: break-word;
        }
        a{
            font-size: 24px;
            color: black;
        }

    </style>
</head>
<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
<p>
    Bonjour {{ $user->name }},
    Un compte à été crée pour vous, voici vos identifiants :
</p>
<div id="main">
    <a href="https://dev.beaumel43.com/">
        <img src="https://dev.beaumel43.com/img/logo.png">
    </a>
    <p>
        Email : <br> <span class="identifiants">{{ $user->email }}</span>
    </p>
    <p>
        Mots de passe :<br> <span class="identifiants">{{ $password }}</span>
    </p>
    <a href="https://dev.beaumel43.com/">Accèder au site web</a>
</div>
</body>

</html>
