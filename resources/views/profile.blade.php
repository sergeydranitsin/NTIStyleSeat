<!doctype html>
<html>

<head>
    <title>Profile</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="stylesheet" href="/css/uikit.css" />
    <link rel="stylesheet" href="/css/style.css" />

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="/js/uikit-icons.js"></script>
    <script src='/js/uikit.js'></script>
    <script src='/js/script.js'></script>

</head>

<body>
    <div class="uk-section-primary uk-preserve-color" style="background-image:url(https://d220aniogakg8b.cloudfront.net/static/uploads/2018/09/24/49ff8f3f-f05_6780123_1440x1080.jpg);">

        <div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200" class="uk-sticky">
            @include('navbar')
        </div>
        <div class="uk-sticky-placeholder" style="height: 80px; margin: 0px;" hidden=""></div>

        <div class="uk-section uk-light">
        </div>

    </div>

    <!--<div class="profile-head uk-grid-collapse uk-width-3-5 uk-margin-auto uk-child-width-expand@s" uk-grid>
        <div class="left-p uk-text-left uk-width-3-5">
        </div>
        <div class="right-p uk-light uk-width-2-5">
            <button class="bookmark-btn uk-button uk-button-default uk-button-small uk-align-right"><span class="uk-margin-small-right" uk-icon="bookmark"></span>BOOKMARK</button>

        </div>
    </div>-->
    <div class="profile-content uk-grid-collapse uk-width-3-5 uk-margin-auto uk-child-width-expand@s" uk-grid>

        <div class="left-p uk-text-left uk-width-3-5">
            <div class="pro-bio uk-section uk-grid-collapse" uk-grid>

                <div class="uk-width-auto@m pro-bio-left uk-container uk-padding-remove">

                    <a class="is-profile pro-photo uk-background-contain uk-display-inline-block uk-panel">
                        <img class="uk-border-pill" data-src="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/36c352b4-f10_6851905_200x200.jpg" width="120" height="120" alt="" uk-img>
                    </a>
                </div>
                <div class="pro-bio-right uk-container uk-width-expand@m">

                    <div class="pro-header-info">
                        <h1>
                            <p class="pro-name uk-light">Gercen S</p>
                        </h1>
                        <p class="pro-biz-name"><a class="pro-biz-name" href="https://www.styleseat.com/m/s/1399227">GS</a></p>
                    </div>
                    <p class="pro-title">Professional</p>


                    <div class="pro-description">
                        • www.gustavoshairstudio.com • Gustavo's Hair Studio has a fun and relaxing salon atmosphere. Gustavo is a PRAVANA Master Hair
                        <div class="child">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, nulla. Lorem ipsum dolor sit amet, consectetur
                        </div>

                    </div>
                    <button class="see_more_content uk-button uk-button-text">See More</button>
                    <button class="see_less_content uk-button uk-button-text">See less</button>
                </div>
            </div>

            <div class="uk-section uk-container uk-flex-center uk-padding-small">
                <hr class="uk-margin-remove">
                <div class="uk-flex-middle uk-margin-remove uk-padding-remove-left uk-background-default uk-grid" uk-grid="">
                    <div class="uk-width-3-4 uk-flex uk-padding-remove uk-first-column">
                        <div class="uk-width-5-6 uk-margin-left clh">
                            <div>Travel Fee, Wedding Sessions, Photo Editing Services</div>
                            <div>$100 for 120 minutes</div>
                        </div>
                    </div>
                    <div class="uk-width-1-4">
                        <button class="uk-button uk-button-secondary uk-button-small">REQUEST</button>
                    </div>
                </div>
                <hr class="uk-margin-remove">
                <div class="uk-flex-middle uk-margin-remove uk-padding-remove-left uk-background-default uk-grid" uk-grid="">
                    <div class="uk-width-3-4 uk-flex uk-padding-remove uk-first-column">
                        <div class="uk-width-5-6 uk-margin-left clh">
                            <div>Travel Fee</div>
                            <div>$10 0and up for 105 minutes</div>
                        </div>
                    </div>
                    <div class="uk-width-1-4">
                        <button class="uk-button uk-button-secondary uk-button-small">REQUEST</button>
                    </div>
                </div>
                <hr class="uk-margin-remove">
            </div>

        </div>


        <div class="right-p uk-width-2-5">
            <div class="uk-section-secondary uk-light">
                <div uk-lightbox="animation: slide">

                    <div class="uk-grid-collapse uk-child-width-expand@s uk-text-center" uk-grid>
                        <div>
                            <a class="uk-inline" href="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/e6c23e15-e6f_6851902_720x540.jpg">
                                <img class="" data-src="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/e6c23e15-e6f_6851902_300x300.jpg" width="" height="" alt="" uk-img>
                            </a>
                        </div>
                        <div>
                            <a class="uk-inline" href="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/0e56903f-fdf_6851907_720x540.jpg">
                                <img class="" data-src="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/0e56903f-fdf_6851907_300x300.jpg" width="" height="" alt="" uk-img>
                            </a>
                        </div>
                        <div>
                            <a class="uk-inline" href="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/fad69b5b-aa0_6851908_720x540.jpg">
                                <img class="" data-src="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/fad69b5b-aa0_6851908_300x300.jpg" width="" height="" alt="" uk-img>
                            </a>
                        </div>

                    </div>
                    <div class="uk-grid-collapse uk-child-width-expand@s uk-text-center" uk-grid>
                        <div class="uk-background-cover">
                            <a class="uk-inline" href="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/d2cd58bd-953_6851909_720x540.jpg">
                                <img class="" data-src="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/d2cd58bd-953_6851909_300x300.jpg" width="" height="" alt="" uk-img>
                            </a>
                        </div>
                        <div>
                            <a class="uk-inline" href="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/d00deb9c-34f_6851910_720x540.jpg">
                                <img class="" data-src="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/d00deb9c-34f_6851910_300x300.jpg" width="" height="" alt="" uk-img>
                            </a>
                        </div>
                        <div>
                            <a class="uk-inline" href="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/c8f95f95-623_6851911_720x540.jpg">
                                <img class="" data-src="https://d220aniogakg8b.cloudfront.net/static/uploads/2018/10/31/c8f95f95-623_6851911_300x300.jpg" width="" height="" alt="" uk-img>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="complete-locaton">



                <div id="map" style="width: 100%; height: 165px"></div>


            </div>

            <div class="addr uk-text-center uk-text-emphasis">
                <div>Gercen S</div>
                <a class="location">
                    <div>Mobile Business</div>
                    <div>Glendale,OR97442</div>
                </a>
                <div>922-039-8539</div>
            </div>
            <hr>
            <div class="active-profile-only">
                <div class="location-hours">
                    <div class="addre uk-text-center">BUSINESS HOURS</div>
                    <table class="uk-table uk-table-small">
                        <tbody>
                            <tr>
                                <td>Monday:</td>
                                <td>9:00 AM - 6:00 PM</td>
                            </tr>
                            <tr>
                                <td>Tuesday:</td>
                                <td>9:00 AM - 6:00 PM</td>
                            </tr>
                            <tr>
                                <td>Wednesday:</td>
                                <td>9:00 AM - 6:00 PM</td>
                            </tr>
                            <tr>
                                <td>Thursday:</td>
                                <td>9:00 AM - 6:00 PM</td>
                            </tr>
                            <tr>
                                <td>Friday:</td>
                                <td>9:00 AM - 6:00 PM</td>
                            </tr>
                            <tr>
                                <td>Saturday:</td>
                                <td>Closed</td>
                            </tr>
                            <tr>
                                <td>Sunday:</td>
                                <td>Closed</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="profile-profile-share uk-text-center uk-text-emphasis">
                    <div class="addre uk-margin-bottom">SHARE PROFILE</div>
                    <div class="uk-flex uk-flex-center">
                        <div class="">
                            <img class="uk-border-circle" src="https://getuikit.com/v2/docs/images/placeholder_200x200.svg" width="45" height="45" alt="">
                        </div>
                        <div class="uk-margin-left">
                            <img class="uk-border-circle" src="https://getuikit.com/v2/docs/images/placeholder_200x200.svg" width="45" height="45" alt="">
                        </div>
                        <div class="uk-margin-left">
                            <img class="uk-border-circle" src="https://getuikit.com/v2/docs/images/placeholder_200x200.svg" width="45" height="45" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="profile-breadcrumbs uk-flex uk-flex-center">
        <ul class="uk-breadcrumb">
            <li><span>{{$businessUser->profile_data->city ?? "Unknown city"}}</span></li>
            <!--<li><span>Haircut</span></li>-->
            <li><span>{{"{$businessUser->first_name} {$businessUser->second_name}"}}</span></li>
        </ul>

    </div>
</body>

</html>
