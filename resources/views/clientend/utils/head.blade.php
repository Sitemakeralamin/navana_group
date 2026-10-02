@php($seo = $layout->section('seo'))
<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-repeat" />
        <!-- Primary SEO Meta Tags -->
        
        <meta name="title" content="{{ $seo->title }}" />
        <meta name="description" content="{{ $seo->body }}" />
        <meta name="keywords" content="{{ $seo->value('keywords') }}" />
        <meta name="author" content="Nanova Groups" />
        <meta name="robots" content="index, follow" />

        <!-- Open graph / Facebook Default -->

        <meta property="og:title" content="{{ $seo->title }}" />
        <meta property="og:description" content="{{ $seo->body }}" />
        <meta property="og:image" content="{{ $seo->src() }}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:url" content="http://www.nanovagroups.com/aboutus">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Nanova Groups">
        <meta property="og:locale" content="en_US">

        <!-- Open graph / Twitter Card -->

        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="{{ $seo->title }}" />
        <meta name="twitter:description" content="{{ $seo->body }}" />
        <meta name="twitter:image" content="{{ $seo->src() }}" />
        <meta property="twitter:url" content="http://www.nanovagroups.com/aboutus">