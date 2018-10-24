<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    {{ csrf_field() }}
    <link rel="stylesheet" href="/css/uikit.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-medium uk-width-large uk-margin-auto uk-margin-auto-vertical">
        <div class="col-md-8 col-md-offset-2">
            <div class="uk-flex uk-flex-center">
                <div class="panel-heading">Reset Password</div>
                <form class="uk-card uk-card-default uk-card-body" method="POST" action="/password/reset">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                            <input class="uk-input" placeholder="Email" name="email" id="emailregclient" type="text">
                        </div>
                    </div>
                    <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                            <input class="uk-input" placeholder="Password" name="password" id="passwordregclient" type="password">
                        </div>
                    </div>
                    <div class="uk-form-controls">
                        <div class="uk-inline uk-width-1-1">
                            <input class="uk-input" placeholder="Confirm password" id="password_confirmation" name="password_confirmation" type="password">
                        </div>
                    </div>
                    <div class="uk-text-center uk-margin-medium-bottom uk-margin-small-top"></div>
                    <button id="regclientbut" class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom" type="submit">Reset</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
