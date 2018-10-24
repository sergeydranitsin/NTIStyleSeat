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

    <!— This is a button toggling the modal —>

    <nav class="uk-navbar-container" uk-navbar>

        <div class="uk-navbar-right">
            <?php if(auth()->guard()->guest()): ?>

            <ul class="uk-navbar-nav">
                <li> <a id="openModal1" class="uk-button uk-margin-small-right" type="button" uk-toggle="target: #modal-client">SignIN client</a></li>
                <li> <a id="openModal2" class="uk-button uk-margin-small-right" type="button" uk-toggle="target: #modal-buisness">SignIN buisness</a></li>
            </ul>
            <?php else: ?>
            <ul class="uk-navbar-nav">
                <li> <a class="uk-button uk-margin-small-right" type="button" href="logout">logout</a></li>
            </ul>
            <?php endif; ?>
        </div>

    </nav>

    <!— This is the modal —>
    <div id="modal-client" class="uk-flex-top" uk-modal>
        <div id="regClient1" class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin-auto uk-card-medium uk-width-large uk-margin-auto uk-modal-dialog uk-margin-auto-vertical">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <ul class="uk-child-width-expand" data-uk-tab="{connect:'#auth'}" uk-tab>
                <li id="signupclient" class="uk-active"><a href="#">SIGNUP</a></li>
                <li id="loginclient"><a href="#">LOGIN</a></li>
            </ul>
            <ul id="auth" class="uk-switcher uk-margin">
                <li id="clientsignup">
                    <a href="/login/facebook">
                        <div id="rFB" class="uk-flex-middle uk-margin-small-top regHover" uk-grid>
                            <div class="uk-width-1-4">
                                <img src="/img/Xf8BBzEHtwM.jpg" alt="Image">
                            </div>
                            <div class="uk-width-3-4">
                                <p>with facebook</p>
                            </div>
                        </div>
                    </a>
                    <a href="/login/vk">
                        <div id="rVK" class="uk-flex-middle uk-margin-small-top regHover" uk-grid>
                            <div class="uk-width-1-4">
                                <img src="/img/56df0dbaee8c9153574da261.png" alt="Image">
                            </div>
                            <div class="uk-width-3-4">
                                <p>with VK</p>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div id="regEmail1" class="uk-flex-middle uk-margin-small-top regHover" uk-grid>
                            <div class="uk-width-1-4">
                                <img src="/img/Sni1mok.svg" alt="Image">
                            </div>
                            <div class="uk-width-3-4">
                                <p>with email</p>
                            </div>
                        </div>
                    </a>
                    <div class="uk-text-center uk-margin-small-top uk-margin-remove-bottom uk-text-small">By signing up I agree to the Terms of Service and <a>Privacy Policy</a></div>
                </li>
                <li id="clientlogin">
                    <a href="login/facebook">
                        <div id="lFB" class="uk-flex-middle regHover" href="login/facebook" uk-grid>
                            <div class="uk-width-1-4">
                                <img src="/img/Xf8BBzEHtwM.jpg" alt="Image">
                            </div>
                            <div class="uk-width-3-4">
                                <p>Login with facebook?</p>
                            </div>
                        </div>
                    </a>
                    <a href="login/vk">
                        <div id="lVK" class="uk-flex-middle uk-margin-small-top uk-margin-remove-bottom regHover" uk-grid>
                            <div class="uk-width-1-4">
                                <img src="/img/56df0dbaee8c9153574da261.png" alt="Image">
                            </div>
                            <div class="uk-width-3-4">
                                <p>Login with VK?</p>
                            </div>
                        </div>
                    </a>
                    <hr class="uk-divider-icon">
                    <form class="uk-form-stacked" action="/login/email" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if ($errors->has('login'))
                        <span id="logincl" class="help-block">
                            <strong>{{ $errors->first('login') }}</strong>
                        </span>
                        @endif
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Email" id="email" name="email" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Password" id="password" name="password" type="password">
                            </div>
                        </div>
                        <div class="uk-text-center uk-margin-medium-bottom uk-margin-small-top"><a href="/reset_pass">forgot your password?</a></div>
                        <button class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom" type="submit">LOG IN</button>
                    </form>
                </li>
            </ul>
        </div>
        <div id="regMail1" class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin-auto uk-card-medium uk-width-large uk-margin-auto uk-modal-dialog uk-margin-auto-vertical">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <form class="uk-form-stacked" action="/register/emailClient" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if ($errors->has('regClient'))
                <span id="regclient" class="help-block">
                    <strong>{{$errors->first('regClient')}}</strong>
                </span>
                @endif
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <input class="uk-input" placeholder="Email" id="email" name="email" type="text">
                    </div>
                </div>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <input class="uk-input" placeholder="name" id="first_name" name="first_name" type="text">
                    </div>
                </div>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <input class="uk-input" placeholder="last name" id="second_name" name="second_name" type="text">
                    </div>
                </div>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <input class="uk-input" placeholder="Password" id="password" name="password" type="password">
                    </div>
                </div>
                <div class="uk-form-controls">
                    <div class="uk-inline uk-width-1-1">
                        <input class="uk-input" placeholder="Confirm password" id="password_confirmation" name="password_confirmation" type="password">
                    </div>
                </div>
                <div class="uk-text-center uk-margin-medium-bottom uk-margin-small-top"></div>
                <button class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div id="modal-buisness" uk-modal>
        <div class="uk-flex uk-margin-auto">
            <div id="regClient2" class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-medium uk-width-large uk-margin-auto uk-margin-auto-vertical">
                <button id="closeModal" class="uk-modal-close-default" type="button" uk-close></button>
                <ul class="uk-child-width-expand" data-uk-tab="{connect:'#auth'}" uk-tab>
                    <li class="uk-active"><a href="#">SIGNUP</a></li>
                    <li><a href="#">LOGIN</a></li>
                </ul>
                <ul id="auth" class="uk-switcher uk-margin">
                    <li>
                        <a href="/login/facebook">
                            <div id="rFB" class="uk-flex-middle uk-margin-small-top regHover" uk-grid>
                                <div class="uk-width-1-4">
                                    <img src="/img/Xf8BBzEHtwM.jpg" alt="Image">
                                </div>
                                <div class="uk-width-3-4">
                                    <p>with facebook</p>
                                </div>
                            </div>
                        </a>
                        <a href="/login/vk">
                            <div id="rVK" class="uk-flex-middle uk-margin-small-top regHover" uk-grid>
                                <div class="uk-width-1-4">
                                    <img src="/img/56df0dbaee8c9153574da261.png" alt="Image">
                                </div>
                                <div class="uk-width-3-4">
                                    <p>with VK</p>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div id="regEmail2" class="uk-flex-middle uk-margin-small-top regHover" uk-grid>
                                <div class="uk-width-1-4">
                                    <img src="/img/Sni1mok.svg" alt="Image">
                                </div>
                                <div class="uk-width-3-4">
                                    <p>with email</p>
                                </div>
                            </div>
                        </a>
                        <div class="uk-text-center uk-margin-small-top uk-margin-remove-bottom uk-text-small">By signing up I agree to the Terms of Service and <a>Privacy Policy</a></div>
                    </li>
                    <li>
                        <a href="login/facebook">
                            <div id="lFB" class="uk-flex-middle regHover" href="login/facebook" uk-grid>
                                <div class="uk-width-1-4">
                                    <img src="/img/Xf8BBzEHtwM.jpg" alt="Image">
                                </div>
                                <div class="uk-width-3-4">
                                    <p>Login with facebook?</p>
                                </div>
                            </div>
                        </a>
                        <a href="login/vk">
                            <div id="lVK" class="uk-flex-middle uk-margin-small-top uk-margin-remove-bottom regHover" uk-grid>
                                <div class="uk-width-1-4">
                                    <img src="/img/56df0dbaee8c9153574da261.png" alt="Image">
                                </div>
                                <div class="uk-width-3-4">
                                    <p>Login with VK?</p>
                                </div>
                            </div>
                        </a>
                        <hr class="uk-divider-icon">
                        <form class="uk-form-stacked" action="/login/email" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if ($errors->has('login'))
                            <span class="help-block">
                                <strong>{{ $errors->first('login')}}</strong>
                            </span>
                            @endif
                            <div class="uk-form-controls">
                                <div class="uk-inline uk-width-1-1">
                                    <input class="uk-input" placeholder="Email" id="email" name="email" type="text">
                                </div>
                            </div>
                            <div class="uk-form-controls">
                                <div class="uk-inline uk-width-1-1">
                                    <input class="uk-input" placeholder="Password" id="password" name="password" type="password">
                                </div>
                            </div>
                            <div class="uk-text-center uk-margin-medium-bottom uk-margin-small-top"><a>forgot your password?</a></div>
                            <button class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom" type="submit">LOG IN</button>
                        </form>

                    </li>
                </ul>
            </div>
            <div id="regMail2" class="uk-flex uk-margin-auto">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-large uk-width-large uk-margin-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <form class="uk-form-stacked" action="/register/emailClient" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if ($errors->has('regBusiness'))
                        <span class="help-block">
                            <strong>{{ $errors->first('regBusiness')}}</strong>
                        </span>
                        @endif
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Email" id="email" name="email" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="name" id="first_name" name="first_name" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="last name" id="second_name" name="second_name" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Password" id="password" name="password" type="password">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Confirm password" id="password_confirmation" name="password_confirmation" type="password">
                            </div>
                        </div>
                        <div class="uk-text-center uk-margin-medium-bottom uk-margin-small-top"></div>
                        <button class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom" type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src='/js/uikit.js'></script>
<script src='/js/script.js'></script>

</html>
