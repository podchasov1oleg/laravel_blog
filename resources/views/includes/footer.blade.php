@if($page != 'form')

    @include('includes.social')

@endif

<footer>
    <span class="logo">web is my shepherd, 2020</span>
</footer>
<!--[if lt IE 9]>
<script src="libs/html5shiv/es5-shim.min.js"></script>
<script src="libs/html5shiv/html5shiv.min.js"></script>
<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
<script src="libs/respond/respond.min.js"></script>
<![endif]-->

<!-- Load CSS -->
<script>
    function loadCSS(hf) {
        var ms=document.createElement("link");ms.rel="stylesheet";
        ms.href=hf;document.getElementsByTagName("head")[0].appendChild(ms);
    }
    loadCSS("{{asset('assets/css/header.css')}}"); //Header Styles (compress & paste to header after release)
</script>

<!-- Load Scripts -->
<script>
    var scr = {"scripts":[
            {"src" : "{{asset('assets/js/libs.min.js')}}", "async" : false},
            {"src" : "{{asset('assets/js/common.js')}}", "async" : false}
    ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
<script>
    window.onload = function () {
        window.setTimeout(function () {
            document.body.classList.add('loaded_hiding');
            setTimeout(function () {
                document.body.classList.add('loaded');
                document.body.classList.remove('loaded_hiding');
            }, 150)
        }, 300);

    }
</script>
