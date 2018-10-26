<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    {{ csrf_field() }}
    <link rel="stylesheet" href="/css/uikit.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src='/js/uikit.js'></script>
    <script src='/js/script.js'></script>
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
    <div id="modal-client" uk-modal>
        <div class="uk-flex uk-flex uk-height-medium uk-margin uk-margin-auto uk-margin-auto-vertical" style="margin-top:calc(17vh)!important">
            <div id="regClient1" class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-medium uk-width-large uk-margin-auto uk-margin-auto-vertical">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <ul class="uk-child-width-expand" data-uk-tab="{connect:'#auth'}" uk-tab>
                    <li class="uk-active"><a href="#">SIGNUP</a></li>
                    <li><a href="#">LOGIN</a></li>
                </ul>
                <ul class="uk-switcher uk-margin">
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
                    <li>
                        <a href="login/facebook">
                            <div class="uk-flex-middle regHover" href="login/facebook" uk-grid>
                                <div class="uk-width-1-4">
                                    <img src="/img/Xf8BBzEHtwM.jpg" alt="Image">
                                </div>
                                <div class="uk-width-3-4">
                                    <p>Login with facebook?</p>
                                </div>
                            </div>
                        </a>
                        <a href="login/vk">
                            <div class="uk-flex-middle uk-margin-small-top uk-margin-remove-bottom regHover" uk-grid>
                                <div class="uk-width-1-4">
                                    <img src="/img/56df0dbaee8c9153574da261.png" alt="Image">
                                </div>
                                <div class="uk-width-3-4">
                                    <p>Login with VK?</p>
                                </div>
                            </div>
                        </a>
                        <hr class="uk-divider-icon">
                        <div class="uk-form-stacked">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="uk-form-controls">
                                <div class="uk-inline uk-width-1-1">
                                    <input class="uk-input" placeholder="Email" id="emailloginclient" name="email" type="text">
                                </div>
                            </div>
                            <div class="uk-form-controls">
                                <div class="uk-inline uk-width-1-1">
                                    <input class="uk-input" placeholder="Password" id="passwordloginclient" name="password" type="password">
                                </div>
                            </div>
                            <div class="uk-text-center uk-margin-medium-bottom uk-margin-small-top"><a id="forgotpassclient">forgot your password?</a></div>
                            <button id='loginclientbut' class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom">LOG IN</button>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="regMail1" class="uk-flex uk-margin-auto">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-large uk-width-large uk-margin-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-form-stacked">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1 uk-text-center">
                                REGISTRATION
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Phone" name="email" id="mobile_phoneregclient" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Email" name="email" id="emailregclient" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="name" name="first_name" id="first_nameregclient" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="last name" name="second_name" id="second_nameregclient" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Password" name="passwordbis" id="passwordregclient" type="password">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Confirm password" id="password_confirmationregclient" name="password_confirmation" type="password">
                            </div>
                        </div>
                        <div class="uk-text-center uk-margin-medium-bottom uk-margin-small-top"></div>
                        <button id="regclientbut" class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom">Register</button>
                    </div>
                </div>
            </div>
            <div id="sendlinkrec1" class="uk-flex uk-margin-auto">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-large uk-width-large uk-margin-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-form-stacked">
                        {{ csrf_field() }}
                        <div class="uk-inline uk-width-1-1 uk-text-center">
                            ENTER EMAIL
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Email" id="resetpassclient" type="text">
                            </div>
                        </div>
                        <button id="sendlinkrecclient" class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom">Send link</button>
                    </div>
                </div>
            </div>
            <div id="sendletterclient" class="uk-flex uk-margin-auto">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-large uk-width-large uk-margin-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-flex">
                        <div class="uk-margin-auto"><strong>Письмо отправлено</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-buisness" uk-modal>
        <div class="uk-flex uk-flex-center" style="margin-top:calc(17vh)!important">
            <div id="regClient2" class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-medium uk-width-large">
                <button class="uk-modal-close-default" type="button" uk-close></button>
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
                        <div class="uk-form-stacked">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="uk-form-controls">
                                <div class="uk-inline uk-width-1-1">
                                    <input class="uk-input" placeholder="Email" id="emailloginbis" name="email" type="text">
                                </div>
                            </div>
                            <div class="uk-form-controls">
                                <div class="uk-inline uk-width-1-1">
                                    <input class="uk-input" placeholder="Password" id="passwordloginbis" name="password" type="password">
                                </div>
                            </div>
                            <div class="uk-text-center uk-margin-medium-bottom uk-margin-small-top"><a id="forgotpassbis">forgot your password?</a></div>
                            <button id='loginbisbut' class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom">LOG IN</button>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="regMail2" class="uk-flex uk-height-medium uk-background-muted uk-margin uk-text-center">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-large uk-width-large uk-margin-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-form-stacked">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="uk-inline uk-width-1-1 uk-text-center">
                            REGISTRATION
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Phone" name="email" id="mobile_phoneregbis" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Email" name="email" id="emailregbis" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="name" name="first_name" id="first_nameregbis" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="last name" name="second_name" id="second_nameregbis" type="text">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Password" name="passwordbis" id="passwordregbis" type="password">
                            </div>
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Confirm password" id="password_confirmationregbis" name="password_confirmation" type="password">
                            </div>
                        </div>
                        <div class="uk-text-center uk-margin-medium-bottom uk-margin-small-top"></div>
                        <button id="regbisbut" class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom">Register</button>
                    </div>
                </div>
            </div>
            <div id="sendlinkrec2" class="uk-flex uk-margin-auto">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-large uk-width-large uk-margin-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-form-stacked">
                        {{ csrf_field() }}
                        <div class="uk-inline uk-width-1-1">
                            ENTER EMAIL
                        </div>
                        <div class="uk-form-controls">
                            <div class="uk-inline uk-width-1-1">
                                <input class="uk-input" placeholder="Email" id="resetpassbis" type="text">
                            </div>
                        </div>
                        <button id="sendlinkrecbis" class="uk-button uk-button-primary uk-width-1-1 uk-button-large uk-position-bottom">Send link</button>
                    </div>
                </div>
            </div>
            <div id="sendletterbis" class="uk-flex uk-margin-auto">
                <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-card-large uk-width-large uk-margin-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-flex">
                        <div class="uk-margin-auto"><strong>Письмо отправлено</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
