doctype 5
html(xmlns="http://www.w3.org/1999/xhtml", xmlns:og="http://ogp.me/ns#", xmlns:fb="http://www.facebook.com/2008/fbml")
  head
    title= title
    link(rel='stylesheet', href='/bootstrap/css/bootstrap.min.css')
    link(rel='stylesheet', href='/css/application.css')
    script(src='//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js', type='text/javascript')
    script(src='/application.js', type='text/javascript')

    meta(name='description', content='')
    meta(name='keywords', content='')

    meta(name="apple-mobile-web-app-capable", content="yes")
    meta(name="apple-mobile-web-app-status-bar-style",content="black")

    // Facebook
    meta(property="og:title", content="Sleepy Time Bed Time Calculator")
    meta(property="og:type", content="website")
    meta(property="og:url", content="http://seanfisher.co/")
    meta(property="og:site_name", content="Sleepy Time - Find out when to sleep to wake up feeling refreshed!")
    meta(property="og:fb:admins", content="100000055958759")
    meta(property="og:description", content="Sleepy Time - Find out when to sleep to wake up feeling refreshed and not groggy!")
    meta(name='viewport', content="width=device-width, initial-scale=1.0")
  body
    script
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-8742360-28', 'sleep.seanfisher.co');
        ga('send', 'pageview');

    block content