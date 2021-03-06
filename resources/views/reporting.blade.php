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
</head>

<body>
    @include('navbar')
    <div class="uk-container-large uk-margin-auto">
        <hr>
        <div class="uk-flex uk-wrap">
            <div class="uk-width-1-2 uk-container">
                <div class="uk-flex uk-text-center">
                    <div class="uk-width-3-7">
                        <div>TOTAL SALES</div>
                    </div>
                    <hr class="uk-divider-vertical">
                    <div class="uk-width-2-7">
                        <div>MOUTH OF OCT</div>
                    </div>
                    <hr class="uk-divider-vertical">
                    <div class="uk-width-2-7">
                        <div>WEEK OF OCT</div>
                    </div>
                    <hr class="uk-divider-vertical">
                </div>
                <h1 class="uk-heading-line uk-text-center">
                    <div>october</div>
                </h1>
                <div class="uk-flex uk-text-center">
                    <div class="uk-width-1-2">
                        <div>PROJECTED SALES</div>
                    </div>
                    <hr class="uk-divider-vertical">
                    <div class="uk-width-1-2">
                        <div>APPTS BOOKED</div>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-2">
                <div>
                    <ul class="uk-child-width-expand" uk-tab>
                        <li class="uk-active"><a href="#">WEEKLY</a></li>
                        <li><a href="#">MOUTHLY</a></li>
                        <li><a href="#">YEARLY</a></li>
                    </ul>
                    <ul id="auth" class="uk-switcher uk-margin uk-text-center">
                        <li>
                            dne
                        </li>
                        <li>
                            n d et
                        </li>
                        <li>
                            not d y
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>
<script src='/js/script.js'></script>

</html>
