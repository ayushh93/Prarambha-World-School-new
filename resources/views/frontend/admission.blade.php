@extends('layouts.frontend')
<style>
    @media (min-width: 1200px) {
        .container {
            max-width: 1220px;
        }
    }

    body {
        font-family: Helvetica Neue, sans-serif;
        color: #000;
        overflow-x: hidden;
    }

    a {
        text-decoration: none !important;
    }
    input:focus{
        outline: none;
    }
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: #282471;
        z-index: 1;
        color: white;
    }

    .back-to-top:hover {
        color: #D98E05;
    }

    /*header starts*/

    header {
        background: #f3f3f3;
    }

    #header {
        position: relative;
        box-shadow: 0 0 6px #00000029;
    }

    #navmenu {
        position: relative;
        padding: 10px 0 0;
    }

    #siteLogo {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
    }

    .logo-img {
        width: 160px;
        height: auto;
        background: white;
        padding: 15px 1px;
        border-radius: 0px 0px 25px 25px;
        box-shadow: 0 0 5px #00000030;
    }

    .top-contact {
        padding-right: 16px;
    }

    .top-contact,
    .top-contact a {
        font-size: 14px;
        color: #605F5F;
    }

    .top-contact a:hover {
        color: #D98E05;
    }

    .top-location:hover,
    .top-call:hover {
        color: #D98E05;
        cursor: default;
    }

    .top-contact .fa {
        background: white;
        padding: 5px;
        border-radius: 7px;
        margin-right: 5px;
    }

    .top-contact .fab {
        background: white;
        padding: 8px 10px;
        border-radius: 50%;
        margin: 5px;
        transition: all 1s ease;
    }

    .top-contact .fab:hover {
        transform: rotate(360deg);
    }

    .top-call {
        margin-bottom: 5px;
    }

    ul#menuBar {
        margin-bottom: 0;
    }

    #desktopNav li.nav-item {
        display: inline-block;
        margin: 0 3px 10px;
    }

    #desktopNav a.nav-link {
        color: #605F5F;
        position: relative;
        font-size: 15px;
        padding: 8px 16px;
    }

    a.nav-link:hover {
        color: #333;
    }

    a.nav-link.active {
        color: #333;
        font-weight: 600;
    }

    #desktopNav a.nav-link:before {
        position: absolute;
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
    }

    #desktopNav a.nav-link:before {
        bottom: 0;
        display: block;
        height: 3px;
        left: 0;
        width: 0%;
        content: "";
        background-color: #D98E05;
    }

    #desktopNav a.nav-link:hover:before,
    #desktopNav a.nav-link.active:before {
        opacity: 1;
        width: 100%;
    }

    #desktopNav .dropdown-menu {
        z-index: 1000;
        padding: 20px;
        margin: 18px 0px;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgb(255, 255, 255);
        border-radius: 2px;
        -webkit-box-shadow: 0px 3px 11px 0px rgba(0, 0, 0, 0.09);
        -moz-box-shadow: 0px 3px 11px 0px rgba(0, 0, 0, 0.09);
        box-shadow: 0px 3px 11px 0px rgba(0, 0, 0, 0.09);
    }

    .dropdown-item {
        display: block;
        width: 100%;
        padding: 5px 10px;
        clear: both;
        font-weight: 400;
        color: #282471;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
        font-size: 15px;
        line-height: 15px;
        font-weight: 600;
    }

    #desktopNav .dropdown .dropdown-menu {
        display: block;
        visibility: hidden;
        opacity: 0;
        -webkit-transform: translateY(20px);
        -ms-transform: translateY(20px);
        transform: translateY(20px);
        -webkit-transition: all .3s ease-in;
        -o-transition: all .3s ease-in;
        transition: all .3s ease-in
    }

    #desktopNav .dropdown:hover>.dropdown-menu {
        visibility: visible;
        opacity: 1;
        -webkit-transform: scaleY(1);
        -ms-transform: scaleY(1);
        transform: scaleY(1);
        opacity: 1;
        visibility: visible;
    }

    #desktopNav .dropdown-submenu {
        position: relative;
    }

    #desktopNav .dropdown-submenu .dropdown-menu {
        top: 0px;
        left: 100%;
        margin-left: 13px;
        margin-right: .1rem;
    }

    .mega-dropdown {
        position: unset;
    }

    .mega-dropdown-menu {
        width: 82%;
        margin-left: auto !important;
        top: 30px;
        right: 10px;
    }

    .mega-dropdown-menu ul {
        list-style-type: none;
    }

    .dropdown-item:focus,
    .dropdown-item:hover {
        color: #D98E05;
        text-decoration: none;
    }

    .menu-img-block {
        display: flex;
        justify-content: space-between;
        background: #f5f5f5;
        padding: 10px;
    }

    .menu-img-block img {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }

    .left-block-link a {
        display: inline-block;
        background: #D98E05;
        padding: 10px 16px;
        color: white;
        margin: 8px 0;
    }

    .left-block-link a:hover {
        background: #b76d02;
    }

    .left-block-text {
        font-size: 30px;
        font-weight: 600;
        color: #282471;
        line-height: 30px;
    }

    .menu-img-block {
        padding: 20px;
    }

    .navbar {
        padding: 0;
    }

    #mobileNav a.nav-link {
        padding: 4px 10px;
        color: #333;
        font-size: 15px;
    }

    #mobileNav .dropdown-item {
        text-align: right;
        font-size: 15px;
        color: #333;
        font-weight: 300;
    }

    @media only screen and (max-width: 992px) {
        #desktopNav {
            display: none;
        }
    }

    @media only screen and (min-width: 992px) {
        #mobileNav {
            display: none;
        }
    }

    /*header ends*/

    /*footer starts*/

    .footer-top {
        background: #f3f3f3;
        padding: 40px 0;
        margin-top: 30px;
    }

    ul.footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    ul.footer-links li {
        margin-bottom: 5px;
    }

    ul.footer-links a {
        color: #555;
    }

    ul.footer-links a:hover {
        color: #D98E05;
    }

    .footer-social .fab {
        background: white;
        padding: 10px 13px;
        border-radius: 50%;
        color: #555555;
        margin-right: 5px;
        margin-bottom: 10px;
        transition: all 1s ease;
    }

    .footer-social .fab:hover {
        transform: rotate(360deg);
    }

    .footer-social .fab:hover {
        color: #D98E05;
    }

    .footer-location,
    .footer-phone,
    .footer-mail {
        margin-bottom: 5px;
    }

    .footer-location:hover,
    .footer-phone:hover,
    .footer-mail:hover {
        color: #D98E05;
        cursor: default;
    }

    .footer-contact .fa {
        color: #D98E05;
        width: 20px;
    }

    .footer-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .quick-links {
        text-align: right;
    }

    .copyright {
        padding: 20px 0;
        color: #333333;
    }

    .copyright a {
        color: #333;
    }

    .copyright a:hover {
        color: #D98E05;
    }

    /*footer ends*/

    /*homepage CSS starts*/

    img.homeslider-img {
        height: 500px;
        object-fit: cover;
    }

    #homeSlider .owl-nav {
        position: absolute;
        width: 100%;
        top: 42%;
    }

    #homeSlider .fa {
        color: white;
        font-size: 24px;
        padding: 11px 16px;
        border: 2px solid white;
        border-radius: 50%;
    }

    #homeSliderSection .owl-theme .owl-nav [class*=owl-] {
        border-radius: 50%;
        outline: none;
    }

    #homeSliderSection .owl-theme .owl-nav [class*=owl-]:hover {
        background: #33333360;
    }

    #homeSlider .owl-prev {
        position: absolute;
        left: 50px;
    }

    #homeSlider .owl-next {
        position: absolute;
        right: 50px;
    }

    #homeSlider .item {
        position: relative;
    }

    #homeSlider .slider-caption {
        position: absolute;
        bottom: 10%;
        width: 100%;
        text-align: center;
        background: #D98E0565;
        color: white;
        font-size: 22px;
        font-weight: 600;
        padding: 10px 0;
        text-transform: uppercase;
    }

    .home-section {
        padding: 50px 0;
    }

    #since2000Section {
        background: #f3f3f3;
    }

    #since-block {
        position: relative;
        background-size: contain;
        background-repeat: no-repeat;
        background-position-x: -120px;
        height: 490px;
        padding-top: 60px;
        z-index: 0;
    }

    .gradient-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        background: linear-gradient(90deg, rgba(243, 243, 243, 0) 30%, rgba(243, 243, 243, 1) 47%);
        z-index: -1;
    }

    .since2000-block {
        padding: 40px 150px 60px 40px;
        background: #fff;
    }

    .since-title {
        font-size: 24px;
        font-weight: 600;
        line-height: 20px;
    }

    .title-bar {
        display: block;
        width: 180px;
        height: 3px;
        background: #555;
        margin: 15px 0;
    }

    .since-text {
        margin-bottom: 50px;
    }

    .learn-more-btn a {
        color: #555;
        border: 2px solid #555;
        padding: 16px 22px;
        text-transform: uppercase;
        font-weight: 600;
    }

    .learn-more-btn a:hover {
        color: #d98e05;
        border: 2px solid #d98e05;
    }

    .section-title {
        font-size: 30px;
        font-weight: 600;
        line-height: 30px;
    }

    .section-tagline {
        font-size: 17px;
        margin-bottom: 40px;
    }

    #principal-block {
        position: relative;
        background-size: contain;
        background-repeat: no-repeat;
        background-position-x: -120px;
        height: 500px;
        padding-top: 50px;
        z-index: 0;
    }

    .gradient-overlay2 {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 30%, rgba(255, 255, 255, 1) 47%);
        z-index: -1;
    }

    .principal-message-block {
        padding: 40px 90px 60px 40px;
        background: #f5f5f5;
    }

    .news-title-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .news-card-img {
        width: 100%;
        height: 320px;
        object-fit: cover;
    }

    .news-title,
    .announcement-title {
        font-size: 24px;
        color: #555;
        font-weight: 600;
    }

    .announcement-title-bar {
        width: 70px;
        height: 2px;
        background: #555;
        margin: 2px 0 20px;
    }

    .see-all a {
        color: #D98E05;
    }

    .see-all a:hover {
        text-decoration: underline !important;
    }

    .news-section {
        padding-right: 40px;
    }

    .news-block-text {
        padding: 20px 20px 30px;
        background: #F5F5F5;
    }

    .news-card-heading {
        font-size: 18px;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .news-card-demo-text {
        font-size: 14px;
        margin-bottom: 20px;
    }

    .news-card-btn a {
        text-transform: uppercase;
        color: #555;
        border: 1px solid;
        padding: 12px 15px;
        font-size: 13px;
        font-weight: 600;
    }

    .news-card-btn a:hover {
        color: #D98E05;
        border: 1px solid #D98E05;
    }

    .single-news-img {
        width: 100%;
        height: 410px;
        object-fit: cover;
        margin-bottom: 20px;
    }

    .home-gallery-section {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
    }

    .gallery-img-wrap {
        width: 100%;
        height: 320px;
        overflow: hidden;
    }

    .gallery-img-wrap img {
        width: 100%;
        height: 320px;
        object-fit: cover;
        transition: all 0.5s ease;
    }

    .gallery-img-wrap:hover img {
        transform: scale(1.1);
    }

    img.partner-img {
        height: 160px;
        object-fit: contain;
    }

    .why-block {
        padding: 20px;
    }

    .why-block-icon {
        width: 110px;
        height: 110px;
        object-fit: contain;
        padding: 20px;
        background: #4C4C5012;
        border-radius: 50%;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .why-block-icon:hover {
        transform: translateY(-5px);
    }

    .form-download h6,
    .apply-online h6 {
        color: #000;
        font-size: 20px;
        font-weight: 500;
    }

    /*homepage CSS ends*/

    #pageBanner {
        position: relative;
        height: 430px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .banner-text {
        position: absolute;
        width: 100%;
        top: 45%;
        font-size: 30px;
        color: #fff;
        text-shadow: 0 3px 6px #00000029;
        text-align: center;
        z-index: 1;
    }

    .banner-overlay {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: #26242250;
    }

    #breadcrumb {
        background: #f3f3f3;
        padding: 8px 0;
        font-size: 14px;
    }

    .history-img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        object-position: center;
    }

    .content-heading {
        font-size: 18px;
    }

    .content-heading-bar {
        width: 40px;
        height: 2px;
        background: #555;
        margin: 8px 0 20px;
    }

    .content-text {
        font-size: 14px;
        text-align: justify;
    }

    #about-section {
        padding: 50px 0;
    }

    .CBSE-img {
        width: 100%;
        object-fit: cover;
    }

    .whyrai-img {
        width: 100%;
        object-fit: cover;
        height: 500px;
    }

    #chairman-block {
        position: relative;
        background-size: contain;
        background-repeat: no-repeat;
        background-position-x: -120px;
        height: 520px;
        padding-top: 150px;
        z-index: 0;
    }

    .chairman-block-box {
        padding: 30px 30px 30px 70px;
        background: #f5f5f5;
        font-size: 32px;
    }

    .message-line {
        width: 180px;
        height: 2px;
        background: #555;
        margin: 10px 0;
    }

    .principal-block-box {
        padding: 30px 30px 30px 70px;
        background: #f5f5f5;
        font-size: 24px;
    }

    .profile-img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .profile-block {
        position: relative;
        margin: 15px 10px;
    }

    .profile-detail {
        position: relative;
        width: 90%;
        padding: 15px 5px;
        text-align: center;
        background: #f3f3f3;
        margin-top: -18px;
        z-index: 1;
    }

    .section-heading {
        font-size: 20px;
    }

    #announcementSection,
    #newsSection {
        padding: 30px 0;
    }

    .news-card {
        margin-bottom: 20px;
        transition: all 0.3s ease-out;
    }

    .news-card:hover {
        box-shadow: 0 0 7px #00000050;
    }

    .news-banner-img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        object-position: center;
    }

    #singleNewsBanner {
        margin-bottom: 40px;
    }

    .news-heading {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .news-content {
        font-size: 15px;
        margin-bottom: 50px;
    }

    #beyondBanner {
        margin-bottom: 40px;
    }

    .beyond-img {
        width: 100%;
        height: 430px;
        object-fit: cover;
    }

    .singlepage-heading {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .singlepage-content {
        font-size: 15px;
    }

    .singlepage-heading-bar {
        width: 80px;
        height: 2px;
        background: #555;
        margin-bottom: 20px;
    }

    a.download-btn {
        border: 1px solid #555;
        padding: 10px 20px;
    }

    .form-download,
    .form-download a {
        color: #fff;
    }

    #studentPage {
        padding: 40px 0;
    }

    .studentprofile-block {
        margin-bottom: 25px;
    }

    .studentprofile-img {
        width: 100%;
        height: 270px;
    }

    .studentprofile-detail {
        background: #f5f5f5;
        font-size: 15px;
        text-align: center;
        padding: 15px;
    }

    .studentprofile-name {
        font-weight: 600;
        font-size: 16px;
    }

    .academicbanner-img,
    .servicebanner-img {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }

    #academicSection {
        padding: 50px 0;
    }

    .academic-img,
    .service-img {
        width: 100%;
        height: 530px;
        object-fit: cover;
    }

    .gallery-slider-img {
        height: 460px;
        object-fit: cover;
    }

    #gallerySlider .owl-dots {
        position: absolute;
        width: 100%;
        bottom: 10px;
    }

    #gallerySlider .owl-dot span {
        width: 13px;
        height: 13px;
        margin: 5px;
    }

    .gallery-slider-overlay {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: #26242230;
    }

    #gallerySection {
        padding: 50px 0;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
    }

    .gallery-img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        transition: all 0.5s ease;
    }

    .gallery-img:hover {
        transform: scale(1.02);
    }

    #html5-watermark {
        display: none !important;
    }

    .lightbox iframe {
        min-height: 390px;
    }

    #calenderSection {
        padding: 50px 0;
    }

    form#onlineAdmissionform {
        border: 1px solid #555;
        padding: 12px;
    }

    .admission-logo {
        width: 100%;
    }

    .admission-title {
        font-size: 32px;
        font-weight: 600;
        color: #10016F;
    }

    .alert {
        text-align: center;
        margin-bottom: 0;
    }

    #preview {
        width: 100px;
        height: 110px;
        margin-left: auto;
        margin-right: auto;
        padding: 5px;
        border: 2px solid #ddd;
        margin-bottom: 5px;
    }

    #img_container {
        border-radius: 5px;
        width: 100%;
    }

    .input-group {
        width: 100%;
    }

    .imgInp {
        width: 100%;
        background-color: #d3d3d3;
    }

    .loading {
        animation: blinkingText ease 2.5s infinite;
    }

    @keyframes blinkingText {
        0% {
            color: #000;
        }

        50% {
            color: transparent;
        }

        99% {
            color: transparent;
        }

        100% {
            color: #000;
        }
    }

    .custom-file-label {
        cursor: pointer;
        overflow: hidden;
        white-space: nowrap;
        padding: 5px;
        font-size: 13px;
        height: auto;
        text-align: left;
    }

    .custom-file-label::after {
        padding: 5px 7px;
    }

    .online-form.text-center {
        padding: 10px;
        border: 2px solid #ccc;
    }

    .form-body {
        padding: 10px;
    }

    .form-div {
        text-align: left;
        margin-bottom: 10px;
    }

    #admissionForm input[type="text"],
    #admissionForm input[type="date"] {
        width: 100%;
        padding: 5px;
    }

    #admissionForm input[type="radio"] {
        margin: 5px;
    }

    .form-label {
        font-weight: 600;
    }

    .form-section-headline {
        font-size: 19px;
        font-weight: 600;
        text-align: left;
        padding-top: 8px;
        text-transform: uppercase;
    }

    .form-bar {
        width: 50px;
        height: 3px;
        background: #aaa;
        margin: 8px 0;
    }

    #admissionForm textarea {
        width: 100%;
        text-align: left;
        padding: 5px;
    }


    .back-to-top {

        background: rgb(6, 110, 37);
    }

    .back-to-top i {
        color: #fff;
    }
    /* Customize the label (the container) */
    .customcheck {
        position: relative;
        padding-left: 30px;
        margin: 5px 20px 10px 5px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .customcheck input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #fff;
    }

    /* On mouse-over, add a grey background color */
    .customcheck:hover input~.checkmark {
        background-color: #fff;
    }

    /* When the checkbox is checked, add a blue background */
    .customcheck input:checked~.checkmark {
        background-color: rgb(6, 110, 37);
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .customcheck input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .customcheck .checkmark:after {
        left: 8px;
        top: 4px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .customradio {
        position: relative;
        padding-left: 30px;
        margin: 5px 15px 10px 5px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .customradio input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .radiomark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #fff;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .customradio:hover input~.radiomark {
        background-color: #fff;
    }

    /* When the radio button is checked, add a blue background */
    .customradio input:checked~.radiomark {
        background-color: #282471;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .radiomark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .customradio input:checked~.radiomark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .customradio .radiomark:after {
        top: 6px;
        left: 6px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

    input#delarationInput {
        width: auto !important;
        padding: 0 !important;
        border: none;
        border-bottom: 1px dashed #999;
        margin: 0 8px;
        outline: none;
    }

    select#declarerRole {
        padding: 5px;
        margin: 0 8px;
        font-size: 15px;
        outline: none;
    }

    .declaration-statement {
        margin: 10px 0;
    }

    button.submit-btn {
        background: #282471;
        color: white;
        border: none;
        padding: 10px 20px;
        margin: 20px 0;
        text-transform: uppercase;
    }

    .form-footer {
        text-align: center;
    }

    .form-footer-top {
        color: #282471;
        font-size: 30px;
        font-weight: 600;
    }

    .form-footer-bottom {
        background: #282471;
        color: white;
        padding: 12px;
    }

    .form-footer-affiliation {
        font-size: 20px;
        font-weight: 800;
        text-transform: uppercase;
    }

    input#upload-documents {
        margin: 10px 0;
    }
    .copyright-text,.copyright-text a{
        color: #fff;
    }
    .footer-linksection .footer-link{
        color: #fff;
    }
    .singlepage-content,.singlepage-heading{
        color: #000;
    }
    .form-section-headline,.form-label{
        color: #000;
    }
    .customradio{
        color: #000 !important;
    }
    .customcheck,.form-label,.declaration-statement,.declaration-note{
        color: #000;
    }
    @media only screen and (max-width: 767px) {
        .admission-logo {
            width: 40% !important;
        }

        .admission-title {
            font-size: 24px !important;
        }

        .online-form {
            font-size: 14px;
        }

        #admissionForm input[type="text"],
        #admissionForm input[type="date"] {
            margin-bottom: 5px;
        }

        .form-section-headline {
            font-size: 16px;
        }

        .form-footer-top {
            font-size: 22px;
        }

        .form-footer-bottom {
            font-size: 12px;
        }

        .form-footer-affiliation {
            font-size: 13px;
        }
    }
</style>
@section('main-content')
<section class="register-online">
    <div class="container">
        <div class="admission-text admission-page-gap">
            <h5 class="form-heading">ADMISSION</h5>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, autem at porro aspernatur rem
                quaerat qui quod ab enim doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Deserunt nulla deleniti minima vel maiores nisi, rerum dolor in distinctio incidunt aliquam facilis
                adipisci quisquam reprehenderit soluta dolore quos inventore. Culpa!</p>
        </div>
        <div class="form-download admission-page-gap">
            <h5 class="form-heading">ADMISSION FORM DOWNLOAD</h5>
            <a href="https://pws.edu.np/uploads/admission/Soup-img.pdf" class="" role="button" aria-pressed="true"><i
                    class="fa fa-download"></i>
                Download</a>
        </div>
        <div class="admission-page-gap">
            <h5 class="form-heading">STUDENT'S PERSONAL INFO</h5>
            <form action="">
                <div class="form-group">
                    <label for="fname" class="label">Enter Student's Full Name</label>
                    <input type="text" class="form-control label w-lg-75 w-md-100" id="fname" aria-describedby="fullname"
                        placeholder="Enter Student's Full Name">
                </div>
                <div class="form-group">
                    <label for="dob" class="label">Enter Student's Date of Birth</label>
                    <input type="date" class="form-control label w-lg-25 w-md-100" id="dob"
                        aria-describedby="dateofbirth" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                    <label for="place" class="label">Place of Birth</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="place" aria-describedby="birthplace"
                        placeholder="Place of Birth">
                </div>
                <div class="radio-wrapper mb-2">
                    <span class="label">Gender</span>
                    <div class="d-flex align-items-center">
                        <div class="form-check align-items-center">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label label" for="exampleRadios1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check ml-2 align-items-center">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label label" for="exampleRadios2">
                                Second default radio
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nationality" class="label">Nationality</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="nationality" aria-describedby="nation"
                        placeholder="Nationality">
                </div>
                <div class="form-group">
                    <label for="language" class="label">Mother Tounge</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="language" aria-describedby="mothertounge"
                        placeholder="Moher Tounge">
                </div>
                <div class="form-group">
                    <label for="religion" class="label">Religion</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="religion"
                        aria-describedby="studentsreligion" placeholder="Religion">
                </div>
                <div class="form-group">
                    <label for="grade" class="label">Grade Applied For</label>
                    <input type="number" class="form-control label w-lg-50 w-md-100" id="grade" aria-describedby="gradefor"
                        placeholder="Grade Applied For">
                </div>
                <div class="form-group">
                    <label for="year" class="label">Academic Year</label>
                    <input type="number" class="form-control label w-lg-50 w-md-100" id="year" aria-describedby="academic year"
                        placeholder="Academic Year">
                </div>
                <div class="form-group">
                    <label for="padd" class="label">Enter Student's Permanent Address</label>
                    <input type="text" class="form-control label w-lg-75 w-md-100" id="padd" aria-describedby="permanentaddress"
                        placeholder="Enter Student's Permanent Address">
                </div>
                <div class="form-group">
                    <label for="cadd" class="label">Enter Student's Current Address</label>
                    <input type="text" class="form-control label w-lg-75 w-md-100" id="cadd" aria-describedby="currentaddress"
                        placeholder="Enter Student's Current Address">
                </div>
                <div class="form-label label mb-3">
                    <h5 class="label mb-2">Upload Student's Photo</h5>
                    <input type="file" name="upload" id="upload" required="">
                </div>
                <h5 class="form-heading">STUDENT'S MEDICAL INFO</h5>
                <div class="form-group">
                    <label for="blood" class="label">Blood Group</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="blood" aria-describedby="bloodgroup"
                        placeholder="Enter Student's Blood Group">
                </div>
                <div class="form-group">
                    <label for="height" class="label">Height</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="height" aria-describedby="sheight"
                        placeholder="Enter Student's Height">
                </div>
                <div class="form-group">
                    <label for="Weight" class="label">Weight</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="Weight" aria-describedby="sWeight"
                        placeholder="Enter Student's Weight">
                </div>
                <div class="form-group">
                    <label for="issue" class="label">Please mention if any medical issues</label>
                    <input type="text" class="form-control label w-lg-100 w-md-100" id="issue" aria-describedby="medicalissue"
                        placeholder="Please mention if any medical issues">
                </div>
                <h5 class="form-heading">SERVICES NEEDED</h5>
                <div class="radio-wrapper mb-2">
                    <span class="label">Hosel</span>
                    <div class="d-flex align-items-center">
                        <div class="form-check align-items-center">
                            <input class="form-check-input" type="radio" name="hostel" id="hostelyes"
                                value="hosteloption1" checked>
                            <label class="form-check-label label" for="hostelyes">
                                Yes
                            </label>
                        </div>
                        <div class="form-check ml-2 align-items-center">
                            <input class="form-check-input" type="radio" name="hostel" id="hostelno"
                                value="hosteloption2">
                            <label class="form-check-label label" for="hostelno">
                                No
                            </label>
                        </div>
                    </div>
                </div>
                <div class="radio-wrapper mb-2">
                    <span class="label">Transporation</span>
                    <div class="d-flex align-items-center">
                        <div class="form-check align-items-center">
                            <input class="form-check-input" type="radio" name="transportation" id="transyes"
                                value="transoption1" checked>
                            <label class="form-check-label label" for="transyes">
                                Yes
                            </label>
                        </div>
                        <div class="form-check ml-2 align-items-center">
                            <input class="form-check-input" type="radio" name="transportation" id="transno"
                                value="transoption2">
                            <label class="form-check-label label" for="transno">
                                No
                            </label>
                        </div>
                        <input type="text" class="form-control label w-lg-75 ml-3" id="pickup"
                            aria-describedby="pickuppoint" placeholder="Please Mention Pickup Point">
                    </div>
                </div>
                <div class="radio-wrapper mb-2">
                    <span class="label">Lunch</span>
                    <div class="d-flex align-items-center">
                        <div class="form-check align-items-center">
                            <input class="form-check-input" type="radio" name="lunch" id="lunchyes" value="lunchoption1"
                                checked>
                            <label class="form-check-label label" for="lunchyes">
                                Yes
                            </label>
                        </div>
                        <div class="form-check ml-2 align-items-center">
                            <input class="form-check-input" type="radio" name="lunch" id="lunchno" value="lunchoption2">
                            <label class="form-check-label label" for="lunchno">
                                No
                            </label>
                        </div>
                        <input type="text" class="form-control label w-lg-75 ml-3" aria-describedby="lunchtype"
                            placeholder="Please Mention if veg or non-veg">
                    </div>
                </div>
                <div class="radio-wrapper mb-2">
                    <h5 class="form-heading">CHEKCLIST OF DOCUMENTS</h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="check1" value="checkbox1">
                        <label class="form-check-label" for="check1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="check2" value="checkbox2">
                        <label class="form-check-label" for="check2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="check3" value="checkbox3">
                        <label class="form-check-label" for="check3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="check4" value="checkbox4">
                        <label class="form-check-label" for="check4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="check5" value="checkbox5">
                        <label class="form-check-label" for="check5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="check6" value="checkbox6">
                        <label class="form-check-label" for="check6">6</label>
                    </div>
                </div>
                <div class="form-label label mb-3">
                    <h5 class="label mb-2">Upload your documents here [ Please attach all documents in a single
                        file(.pdf/.doc/.docx/.zip) ]</h5>
                    <input type="file" name="upload" id="upload" required="">
                </div>
                <div class="form-group">
                    <label for="fathername" class="label">Enter Father's Full Name</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="fathername"
                        aria-describedby="fatherfullname" placeholder="Enter Father's Full Name">
                </div>
                <div class="form-group">
                    <label for="fphone" class="label">Father's Phone Number</label>
                    <input type="tel" class="form-control label w-lg-50 w-md-100" id="fphone" aria-describedby="fatherphone"
                        placeholder="Father's Phone Number">
                </div>
                <div class="form-group">
                    <label for="mothername" class="label">Enter Mother's Full Name</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="mothername"
                        aria-describedby="motherfullname" placeholder="Enter Mother's Full Name">
                </div>
                <div class="form-group">
                    <label for="mphone" class="label">Mothers's Phone Number</label>
                    <input type="tel" class="form-control label w-lg-50 w-md-100" id="mphone" aria-describedby="motherphone"
                        placeholder="Mothers's Phone Number">
                </div>
                <div class="form-group">
                    <label for="guardiansname" class="label">Enter Guardian's Full Name</label>
                    <input type="text" class="form-control label w-lg-50 w-md-100" id="guardiansname"
                        aria-describedby="guyardianfullname" placeholder="Enter Guardian's Full Name">
                </div>
                <div class="form-group">
                    <label for="gphone" class="label">Guiardian's Phone Number</label>
                    <input type="tel" class="form-control label w-lg-50 w-md-100" id="gphone" aria-describedby="guardianphone"
                        placeholder="Guardian's Phone Number">
                </div>
                <div class="decleration mb-3">
                    <h5 class="form-heading">DECLARATION</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">
                            <p>I will comply with the rules and regulations for student behaviour as notified by the
                                University from
                                time to time. I agree that the University shall have the right to enforce appropriate
                                standards of
                                conduct and that it may terminate my participation at any time in the University’s
                                program for
                                failure to maintain these standards or for any actions or conduct which the University
                                considers to
                                be incompatible with the interest, harmony, comfort and welfare of other students. If my
                                participation is terminated, I give my consent to be sent home at my own or my parent’s
                                expense
                                with no refund of fees. All references in the undertaking to the University shall
                                include the University
                                Vice Chancellor, and all its Officers. All reference herein to the parents of the
                                applicant shall include
                                the legal guardian or other adult responsible for the applicant. In addition to this, I
                                shall abide by all
                                the anti-ragging rules specified by the university. I agree that in case of any legal
                                dispute concerning
                                admission procedures, the same shall be subject to exclusive jurisdiction of Courts at
                                Bathinda. This
                                undertaking shall take effect from the time I am accepted by and confirmed for enrolment
                                in the
                                University. </p>
                        </label>
                    </div>
                </div>
                <h5 class="form-heading">APPLICANT'S DETAILS</h5>
                <div class="form-group">
                    <label for="aphone" class="label">Applicant's Phone Number</label>
                    <input type="tel" class="form-control label w-lg-50 w-md-100" id="aphone" aria-describedby="applicantphone"
                        placeholder="Applicant's Phone Number">
                </div>
                <a href="javascript:" class="submit-application">SUBMIT APPLICATION</a>
            </form>
            </form>
        </div>
    </div>
</section>
@endsection
