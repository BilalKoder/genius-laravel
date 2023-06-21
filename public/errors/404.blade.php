<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page Not Found</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<style>
   
    .error-404.not-found {
    text-align: center;
    height: 100%;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    left: 0%;
    margin-left: 0vw;
    position: relative;
    background-image: unset;
    background-size: cover;
}
.not_found_inner {
    max-width: 100%;
}
.error404 #masthead, .error404 #colophon {
    display: none;
}
.logo a {
    outline: 0 !important;    
}
.error-404.not-found .logo {
    padding: 0;
     background-color: transparent;   
}    
.error-404.not-found h1 {
    font-size: 200px;
    line-height: 1;
    color: #0b829f;
    margin: 30px 0;
    font-weight: 800;
}
.error-404.not-found h1 span {
    color: #faa31a;
}
.page-header h3 {
    color: #0b829f;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 40px;
}
.page-header p {
    font-size: 22px !important;
    color: #0b829f;
    margin-bottom: 20px;
}
.page-content .return_home {
    padding: 15px 30px !important;
    font-size: 14px !important;
    /* background: #0b829f !important; */
    color: #faa31a!important;
    font-weight: bold;
    font-family: inherit;
    letter-spacing: 1px;
    /* border-color: transparent !important; */
    border-radius: 25px !important;
    border-top-right-radius: 0 !important;
    text-decoration: none !important;
    transition: 0.5s;
    position: relative;
    border: 1px solid #faa31a;
}
.page-content .return_home:before {
    content: '';
    position: absolute;
    right: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background: #faa31a;
    z-index: -1;
    border-radius: 25px;
    border-top-right-radius: 0;
    transition: all .4s ease-in-out;
    transform: rotateX(90deg);
}
.page-content .return_home:hover {
    color: #fff !important;
}
.page-content .return_home:hover:before {
    right: 0;
    top: 0;
    transform: rotateX(0deg);
    
}


@media only screen and (max-width: 1199px){
    .error-404.not-found h1 {
        font-size: 200px;
    }
}
@media only screen and (max-width: 991px){
    .error-404.not-found h1 {
        font-size: 150px;
    }
    .page-content .return_home {
        padding: 13px 40px;
    }
    .error-404.not-found {
        background-position: center;
        padding: 250px 0;
    }
}
@media only screen and (max-width: 767px){
    .not_found_inner {
        max-width: 100%;
    }
}
@media only screen and (max-width: 640px){
    .error-404.not-found {
        background-position: center;
        background: none;
    }
    .not_found_inner {
        max-width: 100%;
        padding: 0px 20px;
    }
}
@media only screen and (max-width: 479px){
    .error-404.not-found h1 {
        font-size: 100px;
    }
    .page-header h3 {
        font-size: 30px;
    }
    .page-header p {
        font-size: 16px !important;
    }
    .page-content .return_home {
        padding: 13px 30px;
    }
}

    </style>
</head>

<body>
<main id="primary" class="site-main">

<section class="error-404 not-found">
<div class="not_found_inner">
<div class="logo">
<a href="{{ url('/') }}"><img src="{{asset('frontend/images/logo.png')}}"></a>
</div>
<header class="page-header">
<h1 class="page-title">4<span>0</span>4</h1>
<h3>Oops!</h3>
<p>The Page you are looking for does not exist. </p>
</header><!-- .page-header -->

<div class="page-content">
<a class="return_home" href="/">Return to Home</a>





</div><!-- .page-content -->
</div>
</section><!-- .error-404 -->

</main><!-- #main -->

</body>

</html>