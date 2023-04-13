 <?php
echo '
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" prefix="og: https://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US" prefix="og: https://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US" prefix="og: https://ogp.me/ns#" class="tcb">
<!--<![endif]-->

<head>
    <meta charset="UTF-8" />
    <script>
        if (navigator.userAgent.match(/MSIE|Internet Explorer/i) || navigator.userAgent.match(/Trident\/7\..*?rv:11/i)) {
            var href = document.location.href;
            if (!href.match(/[?&]nowprocket/)) {
                if (href.indexOf("?") == -1) {
                    if (href.indexOf("#") == -1) {
                        document.location.href = href + "?nowprocket=1"
                    } else {
                        document.location.href = href.replace("#", "?nowprocket=1#")
                    }
                } else {
                    if (href.indexOf("#") == -1) {
                        document.location.href = href + "&nowprocket=1"
                    } else {
                        document.location.href = href.replace("#", "&nowprocket=1#")
                    }
                }
            }
        }
    </script>
    <script>
        class RocketLazyLoadScripts {
            constructor() {
                this.triggerEvents = ["keydown", "mousedown", "mousemove", "touchmove", "touchstart", "touchend", "wheel"], this.userEventHandler = this._triggerListener.bind(this), this.touchStartHandler = this._onTouchStart.bind(this), this.touchMoveHandler = this._onTouchMove.bind(this), this.touchEndHandler = this._onTouchEnd.bind(this), this.clickHandler = this._onClick.bind(this), this.interceptedClicks = [], window.addEventListener("pageshow", (e => {
                    this.persisted = e.persisted
                })), window.addEventListener("DOMContentLoaded", (() => {
                    this._preconnect3rdParties()
                })), this.delayedScripts = {
                    normal: [],
                    async: [],
                    defer: []
                }, this.allJQueries = []
            }
            _addUserInteractionListener(e) {
                document.hidden ? e._triggerListener() : (this.triggerEvents.forEach((t => window.addEventListener(t, e.userEventHandler, {
                    passive: !0
                }))), window.addEventListener("touchstart", e.touchStartHandler, {
                    passive: !0
                }), window.addEventListener("mousedown", e.touchStartHandler), document.addEventListener("visibilitychange", e.userEventHandler))
            }
            _removeUserInteractionListener() {
                this.triggerEvents.forEach((e => window.removeEventListener(e, this.userEventHandler, {
                    passive: !0
                }))), document.removeEventListener("visibilitychange", this.userEventHandler)
            }
            _onTouchStart(e) {
                "HTML" !== e.target.tagName && (window.addEventListener("touchend", this.touchEndHandler), window.addEventListener("mouseup", this.touchEndHandler), window.addEventListener("touchmove", this.touchMoveHandler, {
                    passive: !0
                }), window.addEventListener("mousemove", this.touchMoveHandler), e.target.addEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "onclick", "rocket-onclick"))
            }
            _onTouchMove(e) {
                window.removeEventListener("touchend", this.touchEndHandler), window.removeEventListener("mouseup", this.touchEndHandler), window.removeEventListener("touchmove", this.touchMoveHandler, {
                    passive: !0
                }), window.removeEventListener("mousemove", this.touchMoveHandler), e.target.removeEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "rocket-onclick", "onclick")
            }
            _onTouchEnd(e) {
                window.removeEventListener("touchend", this.touchEndHandler), window.removeEventListener("mouseup", this.touchEndHandler), window.removeEventListener("touchmove", this.touchMoveHandler, {
                    passive: !0
                }), window.removeEventListener("mousemove", this.touchMoveHandler)
            }
            _onClick(e) {
                e.target.removeEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "rocket-onclick", "onclick"), this.interceptedClicks.push(e), e.preventDefault(), e.stopPropagation(), e.stopImmediatePropagation()
            }
            _replayClicks() {
                window.removeEventListener("touchstart", this.touchStartHandler, {
                    passive: !0
                }), window.removeEventListener("mousedown", this.touchStartHandler), this.interceptedClicks.forEach((e => {
                    e.target.dispatchEvent(new MouseEvent("click", {
                        view: e.view,
                        bubbles: !0,
                        cancelable: !0
                    }))
                }))
            }
            _renameDOMAttribute(e, t, n) {
                e.hasAttribute && e.hasAttribute(t) && (event.target.setAttribute(n, event.target.getAttribute(t)), event.target.removeAttribute(t))
            }
            _triggerListener() {
                this._removeUserInteractionListener(this), "loading" === document.readyState ? document.addEventListener("DOMContentLoaded", this._loadEverythingNow.bind(this)) : this._loadEverythingNow()
            }
            _preconnect3rdParties() {
                let e = [];
                document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((t => {
                    if (t.hasAttribute("src")) {
                        const n = new URL(t.src).origin;
                        n !== location.origin && e.push({
                            src: n,
                            crossOrigin: t.crossOrigin || "module" === t.getAttribute("data-rocket-type")
                        })
                    }
                })), e = [...new Map(e.map((e => [JSON.stringify(e), e]))).values()], this._batchInjectResourceHints(e, "preconnect")
            }
            async _loadEverythingNow() {
                this.lastBreath = Date.now(), this._delayEventListeners(), this._delayJQueryReady(this), this._handleDocumentWrite(), this._registerAllDelayedScripts(), this._preloadAllScripts(), await this._loadScriptsFromList(this.delayedScripts.normal), await this._loadScriptsFromList(this.delayedScripts.defer), await this._loadScriptsFromList(this.delayedScripts.async);
                try {
                    await this._triggerDOMContentLoaded(), await this._triggerWindowLoad()
                } catch (e) {}
                window.dispatchEvent(new Event("rocket-allScriptsLoaded")), this._replayClicks()
            }
            _registerAllDelayedScripts() {
                document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((e => {
                    e.hasAttribute("src") ? e.hasAttribute("async") && !1 !== e.async ? this.delayedScripts.async.push(e) : e.hasAttribute("defer") && !1 !== e.defer || "module" === e.getAttribute("data-rocket-type") ? this.delayedScripts.defer.push(e) : this.delayedScripts.normal.push(e) : this.delayedScripts.normal.push(e)
                }))
            }
            async _transformScript(e) {
                return await this._littleBreath(), new Promise((t => {
                    const n = document.createElement("script");
                    [...e.attributes].forEach((e => {
                        let t = e.nodeName;
                        "type" !== t && ("data-rocket-type" === t && (t = "type"), n.setAttribute(t, e.nodeValue))
                    })), e.hasAttribute("src") ? (n.addEventListener("load", t), n.addEventListener("error", t)) : (n.text = e.text, t());
                    try {
                        e.parentNode.replaceChild(n, e)
                    } catch (e) {
                        t()
                    }
                }))
            }
            async _loadScriptsFromList(e) {
                const t = e.shift();
                return t ? (await this._transformScript(t), this._loadScriptsFromList(e)) : Promise.resolve()
            }
            _preloadAllScripts() {
                this._batchInjectResourceHints([...this.delayedScripts.normal, ...this.delayedScripts.defer, ...this.delayedScripts.async], "preload")
            }
            _batchInjectResourceHints(e, t) {
                var n = document.createDocumentFragment();
                e.forEach((e => {
                    if (e.src) {
                        const i = document.createElement("link");
                        i.href = e.src, i.rel = t, "preconnect" !== t && (i.as = "script"), e.getAttribute && "module" === e.getAttribute("data-rocket-type") && (i.crossOrigin = !0), e.crossOrigin && (i.crossOrigin = e.crossOrigin), n.appendChild(i)
                    }
                })), document.head.appendChild(n)
            }
            _delayEventListeners() {
                let e = {};

                function t(t, n) {
                    ! function(t) {
                        function n(n) {
                            return e[t].eventsToRewrite.indexOf(n) >= 0 ? "rocket-" + n : n
                        }
                        e[t] || (e[t] = {
                            originalFunctions: {
                                add: t.addEventListener,
                                remove: t.removeEventListener
                            },
                            eventsToRewrite: []
                        }, t.addEventListener = function() {
                            arguments[0] = n(arguments[0]), e[t].originalFunctions.add.apply(t, arguments)
                        }, t.removeEventListener = function() {
                            arguments[0] = n(arguments[0]), e[t].originalFunctions.remove.apply(t, arguments)
                        })
                    }(t), e[t].eventsToRewrite.push(n)
                }

                function n(e, t) {
                    let n = e[t];
                    Object.defineProperty(e, t, {
                        get: () => n || function() {},
                        set(i) {
                            e["rocket" + t] = n = i
                        }
                    })
                }
                t(document, "DOMContentLoaded"), t(window, "DOMContentLoaded"), t(window, "load"), t(window, "pageshow"), t(document, "readystatechange"), n(document, "onreadystatechange"), n(window, "onload"), n(window, "onpageshow")
            }
            _delayJQueryReady(e) {
                let t = window.jQuery;
                Object.defineProperty(window, "jQuery", {
                    get: () => t,
                    set(n) {
                        if (n && n.fn && !e.allJQueries.includes(n)) {
                            n.fn.ready = n.fn.init.prototype.ready = function(t) {
                                e.domReadyFired ? t.bind(document)(n) : document.addEventListener("rocket-DOMContentLoaded", (() => t.bind(document)(n)))
                            };
                            const t = n.fn.on;
                            n.fn.on = n.fn.init.prototype.on = function() {
                                if (this[0] === window) {
                                    function e(e) {
                                        return e.split(" ").map((e => "load" === e || 0 === e.indexOf("load.") ? "rocket-jquery-load" : e)).join(" ")
                                    }
                                    "string" == typeof arguments[0] || arguments[0] instanceof String ? arguments[0] = e(arguments[0]) : "object" == typeof arguments[0] && Object.keys(arguments[0]).forEach((t => {
                                        delete Object.assign(arguments[0], {
                                            [e(t)]: arguments[0][t]
                                        })[t]
                                    }))
                                }
                                return t.apply(this, arguments), this
                            }, e.allJQueries.push(n)
                        }
                        t = n
                    }
                })
            }
            async _triggerDOMContentLoaded() {
                this.domReadyFired = !0, await this._littleBreath(), document.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._littleBreath(), window.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._littleBreath(), document.dispatchEvent(new Event("rocket-readystatechange")), await this._littleBreath(), document.rocketonreadystatechange && document.rocketonreadystatechange()
            }
            async _triggerWindowLoad() {
                await this._littleBreath(), window.dispatchEvent(new Event("rocket-load")), await this._littleBreath(), window.rocketonload && window.rocketonload(), await this._littleBreath(), this.allJQueries.forEach((e => e(window).trigger("rocket-jquery-load"))), await this._littleBreath();
                const e = new Event("rocket-pageshow");
                e.persisted = this.persisted, window.dispatchEvent(e), await this._littleBreath(), window.rocketonpageshow && window.rocketonpageshow({
                    persisted: this.persisted
                })
            }
            _handleDocumentWrite() {
                const e = new Map;
                document.write = document.writeln = function(t) {
                    const n = document.currentScript,
                        i = document.createRange(),
                        r = n.parentElement;
                    let o = e.get(n);
                    void 0 === o && (o = n.nextSibling, e.set(n, o));
                    const s = document.createDocumentFragment();
                    i.setStart(s, 0), s.appendChild(i.createContextualFragment(t)), r.insertBefore(s, o)
                }
            }
            async _littleBreath() {
                Date.now() - this.lastBreath > 45 && (await this._requestAnimFrame(), this.lastBreath = Date.now())
            }
            async _requestAnimFrame() {
                return document.hidden ? new Promise((e => setTimeout(e))) : new Promise((e => requestAnimationFrame(e)))
            }
            static run() {
                const e = new RocketLazyLoadScripts;
                e._addUserInteractionListener(e)
            }
        }
        RocketLazyLoadScripts.run();
    </script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Search Engine Optimization by Rank Math - https://s.rankmath.com/home -->
    <title>Fluxactive (Official) USA ,CA Site ! 85% Off</title>
    <meta name="description" content="Fluxactive is a natural prostate care product. buy from official website Flux-active.info. Get 75% off Today. Hurry up" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Fluxactive (Official) USA ,CA Site ! 85% Off" />
    <meta property="og:description" content="Fluxactive is a natural prostate care product. buy from official website Flux-active.info. Get 75% off Today. Hurry up" />
    <meta property="og:url" content="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" />
    <meta property="og:site_name" content="Fluxactive official website" />
    <meta property="og:updated_time" content="2023-04-08T12:59:22+00:00" />
    <meta property="product:price:amount" content="49" />
    <meta property="product:price:currency" content="$" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Fluxactive (Official) USA ,CA Site ! 85% Off" />
    <meta name="twitter:description" content="Fluxactive is a natural prostate care product. buy from official website Flux-active.info. Get 75% off Today. Hurry up" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="wx0zi" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="12 minutes" />
    <script type="application/ld+json" class="rank-math-schema">
        {
            "@context": "https://schema.org",
            "@graph": [{
                "@type": ["Person", "Organization"],
                "@id": "https://flux-active.info/#person",
                "name": "wx0zi"
            }, {
                "@type": "WebSite",
                "@id": "https://flux-active.info/#website",
                "url": "https://flux-active.info",
                "name": "wx0zi",
                "publisher": {
                    "@id": "https://flux-active.info/#person"
                },
                "inLanguage": "en-US",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "https://flux-active.info/?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }, {
                "@type": "ImageObject",
                "@id": "https://flux-active.info/wp-content/uploads/2022/09/prod_6_bottle.png",
                "url": "https://flux-active.info/wp-content/uploads/2022/09/prod_6_bottle.png",
                "width": "200",
                "height": "200",
                "inLanguage": "en-US"
            }, {
                "@type": "ItemPage",
                "@id": "https://flux-active.info/#webpage",
                "url": "https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359",
                "name": "Fluxactive (Official) USA ,CA Site ! 85% Off",
                "datePublished": "2022-09-07T06:24:12+00:00",
                "dateModified": "2023-04-08T12:59:22+00:00",
                "about": {
                    "@id": "https://flux-active.info/#person"
                },
                "isPartOf": {
                    "@id": "https://flux-active.info/#website"
                },
                "primaryImageOfPage": {
                    "@id": "https://flux-active.info/wp-content/uploads/2022/09/prod_6_bottle.png"
                },
                "inLanguage": "en-US"
            }, {
                "@type": "Person",
                "@id": "https://flux-active.info/author/wx0zi/",
                "name": "wx0zi",
                "url": "https://flux-active.info/author/wx0zi/",
                "image": {
                    "@type": "ImageObject",
                    "@id": "https://secure.gravatar.com/avatar/7a7097344dad22bb0855eefad2a291a5?s=96&amp;d=mm&amp;r=g",
                    "url": "https://secure.gravatar.com/avatar/7a7097344dad22bb0855eefad2a291a5?s=96&amp;d=mm&amp;r=g",
                    "caption": "wx0zi",
                    "inLanguage": "en-US"
                },
                "sameAs": ["https://flux-active.info"]
            }, {
                "@type": "Product",
                "name": "Fluxactive Official",
                "description": "Fluxactive on the Official Website for Only 49/ Bottle With Exclusive Discount Today. Save Up to $300 Today. 60-day Guarantee Last Hours with 60% off + Free Shipping",
                "offers": {
                    "@type": "Offer",
                    "url": "https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359",
                    "price": "49",
                    "priceCurrency": "$",
                    "availability": "InStock"
                },
                "review": {
                    "@type": "Review",
                    "datePublished": "2022-09-07T06:24:12+00:00",
                    "dateModified": "2023-04-08T12:59:22+00:00",
                    "author": {
                        "@id": "https://flux-active.info/author/wx0zi/",
                        "name": "wx0zi"
                    },
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "4.9"
                    }
                },
                "@id": "https://flux-active.info/#schema-1734",
                "image": {
                    "@id": "https://flux-active.info/wp-content/uploads/2022/09/prod_6_bottle.png"
                },
                "mainEntityOfPage": {
                    "@id": "https://flux-active.info/#webpage"
                }
            }]
        }
    </script>
    <!-- /Rank Math WordPress SEO plugin -->


    <link rel="alternate" type="application/rss+xml" title="Fluxactive official website &raquo; Feed" href="https://flux-active.info/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Fluxactive official website &raquo; Comments Feed" href="https://flux-active.info/comments/feed/" />
    <style>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link data-minify="1" rel=\'stylesheet\' id=\'tve_landing_page_base_css-css\' href=\'https://flux-active.info/wp-content/cache/min/1/wp-content/plugins/thrive-visual-editor/landing-page/templates/css/base.css?ver=1665039642\' media=\'all\' />
    <link rel=\'stylesheet\' id=\'wp-block-library-css\' href=\'https://flux-active.info/wp-includes/css/dist/block-library/style.min.css?ver=6.2\' media=\'all\' />
    <link rel=\'stylesheet\' id=\'classic-theme-styles-css\' href=\'https://flux-active.info/wp-includes/css/classic-themes.min.css?ver=6.2\' media=\'all\' />

    <link rel=\'stylesheet\' id=\'tve_style_family_tve_flt-css\' href=\'https://flux-active.info/wp-content/plugins/thrive-visual-editor/editor/css/thrive_flat.css?ver=2.6.2.1\' media=\'all\' />
    <link rel=\'stylesheet\' id=\'the_editor_no_theme-css\' href=\'https://flux-active.info/wp-content/plugins/thrive-visual-editor/editor/css/no-theme.css?ver=2.6.2.1\' media=\'all\' />

    <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-includes/js/jquery/jquery.min.js?ver=3.6.3\' id=\'jquery-core-js\' defer></script>
    <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.0\' id=\'jquery-migrate-js\' defer></script>
    <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-includes/js/plupload/moxie.min.js?ver=1.3.5\' id=\'moxiejs-js\' defer></script>
    <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-includes/js/plupload/plupload.min.js?ver=2.1.9\' id=\'plupload-js\' defer></script>
    <link rel="https://api.w.org/" href="https://flux-active.info/wp-json/" />
    <link rel="alternate" type="application/json" href="https://flux-active.info/wp-json/wp/v2/pages/16" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://flux-active.info/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://flux-active.info/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 6.2" />
    <link rel=\'shortlink\' href=\'https://flux-active.info/\' />
    <link rel="alternate" type="application/json+oembed" href="https://flux-active.info/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fflux-active.info%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://flux-active.info/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fflux-active.info%2F&#038;format=xml" />
    <meta name="google-site-verification" content="xLUMaCFAtV2upnFT7dl7So5bcAXT0X8BNFjKIQhU-g8" />
    <meta name="msvalidate.01" content="35577E121A42A32B0D74EB277B9111B5" />
    <style type="text/css" id="tve_global_variables">
        :root {
            --tcb-tpl-color-0: rgb(31, 10, 246);
            --tcb-tpl-color-9: rgb(149, 146, 221);
            --tcb-tpl-color-32: rgba(20, 8, 247, 0.7);
            --tcb-tpl-color-31: rgba(20, 8, 247, 0.5);
            --tcb-tpl-color-8: rgb(51, 51, 51);
            --tcb-tpl-color-5: rgb(245, 245, 245);
            --tcb-tpl-color-11: rgb(68, 68, 68);
            --tcb-tpl-color-6: rgb(255, 255, 255);
            --tcb-tpl-color-2: rgb(102, 102, 102);
            --tcb-tpl-color-28: rgb(235, 235, 235);
            --tcb-tpl-color-7: rgb(62, 62, 62);
            --tcb-tpl-color-30: rgb(62, 62, 62);
            --tcb-main-master-h: 245;
            --tcb-main-master-s: 93%;
            --tcb-main-master-l: 50%;
        }
    </style>
    <style type="text/css" class="tve_custom_style">
        @import url("//fonts.googleapis.com/css?family=Poppins:400,900,800,700,500,300,600,200,100&subset=latin");
        @import url("//fonts.googleapis.com/css?family=Roboto:400,500&subset=latin");
        @media (min-width: 300px) {
            #tcb_landing_page h3 strong {
                font-weight: 600;
            }
            #tcb_landing_page h3 {
                font-family: Poppins;
                font-weight: var(--g-bold-weight, bold);
                color: rgb(62, 62, 62);
                font-size: 24px;
                line-height: 1.3em;
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page h2 strong {
                font-weight: 600;
            }
            #tcb_landing_page h2 {
                font-family: Poppins;
                font-weight: var(--g-bold-weight, bold);
                color: rgb(62, 62, 62);
                font-size: 44px;
                line-height: 1.3em;
                text-align: center;
                --g-bold-weight: 600;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page p strong,
            #tcb_landing_page li strong {
                font-weight: 600;
            }
            #tcb_landing_page h1 strong {
                font-weight: 600;
            }
            #tcb_landing_page h1 {
                font-family: Poppins;
                font-weight: 300;
                font-size: 65px;
                line-height: 1.3em;
                color: rgb(62, 62, 62);
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            [data-css="tve-u-15e09c94f7d"] {
                background-color: rgb(255, 255, 255);
            }
            #tcb_landing_page h4 {
                font-size: 22px;
                line-height: 1.3em;
                color: rgb(62, 62, 62);
                font-family: Poppins;
                font-weight: 300;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page h5 {
                font-size: 20px;
                line-height: 1.3em;
                color: rgb(62, 62, 62);
                font-family: Poppins;
                font-weight: 300;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page [data-tag="h2"] {
                padding: 0px !important;
            }
            #tcb_landing_page [data-tag="h1"] {
                padding: 0px !important;
            }
            #tcb_landing_page h6 {
                line-height: 1.3em;
                font-size: 19px;
                color: rgb(62, 62, 62);
                font-family: Poppins;
                font-weight: 300;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page h6 strong {
                font-weight: 600;
            }
            #tcb_landing_page h4 strong {
                font-weight: 600;
            }
            #tcb_landing_page h5 strong {
                font-weight: 600;
            }
            [data-css="tve-u-16c239dc0ca"] {
                padding: 0px !important;
            }
            [data-css="tve-u-16c239f72b3"] {
                padding-top: 0px !important;
                padding-bottom: 0px !important;
            }
            [data-css="tve-u-16c239fcb85"] {
                float: right;
                z-index: 3;
                position: relative;
                min-width: 175px;
                padding: 0px !important;
                margin: 0px !important;
            }
            [data-css="tve-u-16c23a0387d"]::after {
                clear: both;
            }
            .tve_post_lp>div> :not(#tve) {
                --page-section-max-width: 1080px;
            }
            #tcb_landing_page .thrv_text_element a,
            #tcb_landing_page .tcb-styled-list a,
            #tcb_landing_page .tcb-numbered-list a {
                --eff-color: rgb(255, 51, 51);
                --eff-faded: rgba(255, 51, 51, 0.6);
                --eff-ensure-contrast: rgba(255, 51, 51, 0.6);
                --eff-ensure-contrast-complement: rgba(255, 255, 51, 0.6);
                box-shadow: none;
                border-bottom: none;
                background: none;
                text-decoration: none;
                animation: 0s ease 0s 1 normal none running none;
                transition: none 0s ease 0s;
                padding-left: 0px;
                --eff: none;
                color: rgb(31, 10, 246);
                --tcb-applied-color: var$(--tcb-tpl-color-0);
                font-weight: var(--g-regular-weight, normal) !important;
            }
            #tcb_landing_page .thrv_text_element a:hover,
            #tcb_landing_page .tcb-styled-list a:hover,
            #tcb_landing_page .tcb-numbered-list a:hover {
                text-decoration-style: initial;
                text-decoration-color: var(--eff-color, currentColor);
                background: none;
                box-shadow: none;
                --eff: thin;
                text-decoration-line: underline !important;
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-price-button-group="tve-u-price-button-group-164cb5dfffe"] .thrv-button-group-item.tcb-active-state strong {
                font-weight: 500;
            }
            .tve_lp .tcb-plain-text {
                font-size: 16px;
                color: rgb(102, 102, 102);
                line-height: 1.7em;
                font-family: Poppins;
                font-weight: 500;
            }
            #tcb_landing_page p {
                font-family: Poppins;
                font-weight: 300;
                font-size: 18px;
                line-height: 1.7em;
                color: rgb(102, 102, 102);
                --tcb-applied-color: var$(--tcb-tpl-color-2);
            }
            #tcb_landing_page li:not([class*="menu"]) {
                font-family: Poppins;
                font-weight: 300;
                font-size: 18px;
                line-height: 1.7em;
                color: rgb(102, 102, 102);
                --tcb-applied-color: var$(--tcb-tpl-color-2);
            }
            #tcb_landing_page ul:not([class*="menu"]),
            #tcb_landing_page ol {
                padding-top: 16px;
                padding-bottom: 16px;
                margin-top: 0px;
                margin-bottom: 0px;
            }
            [data-css="tve-u-17df68678d3"] {
                min-height: 1px !important;
            }
            [data-css="tve-u-17df6c322cc"] {
                width: 824px;
                --tve-alignment: center;
                float: none;
                z-index: 3;
                position: relative;
                box-shadow: rgba(248, 247, 251, 0.16) 0px 8px 12px 50px;
                --tve-applied-box-shadow: 0px 8px 12px 50px rgba(248, 247, 251, 0.16);
                margin: 0px auto !important;
                padding-top: 0px !important;
            }
            [data-css="tve-u-17df6c5c786"] {
                width: 431px;
                --tve-alignment: center;
                float: none;
                margin-top: 2px !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            :not(#tve) [data-css="tve-u-17df6c96cd1"] {
                --g-regular-weight: 400;
                --g-bold-weight: 700;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
                font-family: Poppins !important;
                color: rgba(246, 237, 237, 0.95) !important;
                --tcb-applied-color: rgba(246, 237, 237, 0.95) !important;
                --tve-applied-color: rgba(246, 237, 237, 0.95) !important;
            }
            :not(#tve) [data-css="tve-u-17df6c96cd1"] strong {
                font-weight: 700 !important;
            }
            [data-css="tve-u-17df6cb9b12"] {
                --tve-border-width: 6px;
                --tve-alignment: left;
                float: left;
                z-index: 3;
                position: relative;
                --tve-border-radius: 39px;
                overflow: hidden;
                border: 6px solid rgb(0, 0, 0) !important;
                box-shadow: rgba(0, 0, 0, 0.25) 0px 8px 12px 0px inset !important;
                --tve-applied-box-shadow: 0px 8px 12px 0px rgba(0, 0, 0, 0.25) inset !important;
                background-image: linear-gradient(rgba(248, 244, 244, 0.97), rgba(248, 244, 244, 0.97)) !important;
                --tve-applied-background-image: linear-gradient(rgba(248, 244, 244, 0.97), rgba(248, 244, 244, 0.97)) !important;
                padding: 0px !important;
                margin: 22px !important;
                --tve-applied-border: 6px solid rgb(0, 0, 0) !important;
                border-radius: 39px !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
            }
            :not(#tve) [data-css="tve-u-17df6cdc103"] {
                --g-regular-weight: 300;
                --g-bold-weight: 700;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 37px !important;
                color: rgb(241, 16, 23) !important;
                --tcb-applied-color: rgb(241, 16, 23) !important;
                --tve-applied-color: rgb(241, 16, 23) !important;
            }
            :not(#tve) [data-css="tve-u-17df6cdc103"] strong {
                font-weight: 700 !important;
            }
            [data-css="tve-u-17df6ce4bc2"] {
                width: 357px;
                --tve-alignment: center;
                float: none;
                margin: 2px auto 0px !important;
            }
            [data-css="tve-u-17df6cef5e2"] {
                margin-top: -4.887px;
                margin-left: 0px;
                width: 100% !important;
                max-width: none !important;
            }
            [data-css="tve-u-17df6d106a6"] {
                margin-top: 11px !important;
                margin-bottom: 10px !important;
            }
            [data-css="tve-u-17df6d14b04"] {
                --tve-border-radius: 272px;
                overflow: hidden;
                --tve-border-width: 5px;
                --tve-border-top-right-radius: 315px;
                margin-top: 10px !important;
                margin-bottom: 11px !important;
                background-image: linear-gradient(rgba(245, 241, 241, 0.97), rgba(245, 241, 241, 0.97)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgba(245, 241, 241, 0.97), rgba(245, 241, 241, 0.97)) !important;
                border: 5px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 5px solid rgb(0, 0, 0) !important;
                border-radius: 272px 315px 272px 272px !important;
            }
            [data-css="tve-u-17df6d1a678"] {
                --tve-border-width: 5px;
                --tve-border-radius: 383px;
                overflow: hidden;
                --tve-border-top-right-radius: 151px;
                margin: 21px 19px 11px !important;
                padding-bottom: 0px !important;
                box-shadow: rgba(0, 0, 0, 0.25) 0px 13px 26px 0px !important;
                --tve-applied-box-shadow: 0px 13px 26px 0px rgba(0, 0, 0, 0.25) !important;
                border: 5px solid rgba(11, 1, 1, 0.99) !important;
                --tve-applied-border: 5px solid rgba(11, 1, 1, 0.99) !important;
                background-image: linear-gradient(rgba(249, 244, 244, 0.98), rgba(249, 244, 244, 0.98)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgba(249, 244, 244, 0.98), rgba(249, 244, 244, 0.98)) !important;
                border-radius: 383px !important;
            }
            :not(#tve) [data-css="tve-u-17df7541f3d"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 29px !important;
                color: rgb(14, 1, 1) !important;
                --tcb-applied-color: rgb(14, 1, 1) !important;
                --tve-applied-color: rgb(14, 1, 1) !important;
            }
            :not(#tve) [data-css="tve-u-17df7541f3d"] strong {
                font-weight: 600 !important;
            }
            [data-css="tve-u-17df7550836"] {
                background-image: none !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: none !important;
                margin-bottom: 1px !important;
                margin-top: 20px !important;
            }
            [data-css="tve-u-17df757042e"] {
                width: 264px;
                --tve-alignment: center;
                float: none;
                margin: 10px auto 20px !important;
            }
            [data-css="tve-u-17df7583505"] {
                width: 199px;
                --tve-alignment: center;
                float: none;
                margin: 0px auto !important;
            }
            [data-css="tve-u-17df758e0eb"] {
                margin-top: -1px;
            }
            :not(#tve) [data-css="tve-u-17df75a96db"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 22px !important;
                color: rgb(0, 101, 104) !important;
                --tcb-applied-color: var$(--tcb-color-1) !important;
                --tve-applied-color: var$(--tcb-color-1) !important;
            }
            :not(#tve) [data-css="tve-u-17df75a96db"] strong {
                font-weight: 600 !important;
            }
            :not(#tve) [data-css="tve-u-17df75ae21a"] {
                --g-regular-weight: 300;
                --g-bold-weight: 500;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 21px !important;
                color: rgb(170, 25, 55) !important;
                --tcb-applied-color: rgb(170, 25, 55) !important;
                --tve-applied-color: rgb(170, 25, 55) !important;
            }
            :not(#tve) [data-css="tve-u-17df75ae21a"] strong {
                font-weight: 500 !important;
            }
            :not(#tve) [data-css="tve-u-17df75b2b14"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 21px !important;
                color: rgb(170, 25, 55) !important;
                --tcb-applied-color: rgb(170, 25, 55) !important;
                --tve-applied-color: rgb(170, 25, 55) !important;
            }
            [data-css="tve-u-17df75bd532"] {
                margin-bottom: 10px !important;
                margin-top: 10px !important;
            }
            [data-css="tve-u-17df75bfb28"] {
                margin-bottom: 10px !important;
            }
            [data-css="tve-u-17df75f5d6d"] {
                max-width: 33.3333%;
            }
            [data-css="tve-u-17df75f8362"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0);
                --tve-applied-border: 1px solid rgb(0, 0, 0);
                --tve-border-radius: 16px;
                border-radius: 16px;
                overflow: hidden;
                margin-bottom: 19px !important;
                margin-right: -29px !important;
                margin-left: -30px !important;
            }
            [data-css="tve-u-17df760986d"] {
                padding-right: 20px !important;
                padding-left: 20px !important;
            }
            [data-css="tve-u-17df7641da5"] {
                width: 144px;
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df764e53c"] {
                --tcb-applied-color: var$(--tcb-color-3);
                color: rgb(0, 101, 104) !important;
            }
            [data-css="tve-u-17df766ae75"] {
                background-image: linear-gradient(rgba(138, 173, 150, 0.5), rgba(138, 173, 150, 0.5)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgba(138, 173, 150, 0.5), rgba(138, 173, 150, 0.5)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-color-1), var$(--tcb-color-1)) !important;
            }
            [data-css="tve-u-17df766da38"] {
                background-image: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255)), linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto, auto !important;
                background-position: 50% 50%, 50% 50% !important;
                background-attachment: scroll, scroll !important;
                background-repeat: no-repeat, no-repeat !important;
                --background-image: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255)), linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto, auto !important;
                --background-position: 50% 50%, 50% 50% !important;
                --background-attachment: scroll, scroll !important;
                --background-repeat: no-repeat, no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255)), linear-gradient(var$(--tcb-color-1), var$(--tcb-color-1)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df7672e13"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 29px !important;
                color: rgb(0, 101, 104) !important;
                --tcb-applied-color: var$(--tcb-color-1) !important;
                --tve-applied-color: var$(--tcb-color-1) !important;
            }
            :not(#tve) [data-css="tve-u-17df7672e13"] strong {
                font-weight: 600 !important;
            }
            [data-css="tve-u-17df767794b"] {
                --tcb-applied-color: var$(--tcb-color-2);
                color: rgb(50, 153, 53) !important;
            }
            [data-css="tve-u-17df767794e"] {
                --tcb-applied-color: var$(--tcb-color-3);
                color: rgb(0, 101, 104) !important;
            }
            [data-css="tve-u-17df767a779"] {
                --tcb-applied-color: var$(--tcb-color-2);
                color: var(--tcb-color-2) !important;
            }
            [data-css="tve-u-17df767a77d"] {
                --tcb-applied-color: var$(--tcb-color-3);
                color: rgb(0, 101, 104) !important;
            }
            [data-css="tve-u-17df767cd49"] {
                --tcb-applied-color: var$(--tcb-color-2);
                color: var(--tcb-color-2) !important;
            }
            [data-css="tve-u-17df7680f08"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0);
                --tve-applied-border: 1px solid rgb(0, 0, 0);
                --tve-border-radius: 16px;
                border-radius: 16px;
                overflow: hidden;
                margin-right: -30px !important;
                margin-left: -30px !important;
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df768c421"] {
                padding-right: 20px !important;
                padding-left: 20px !important;
            }
            [data-css="tve-u-17df768fade"] {
                margin-bottom: 2px !important;
            }
            [data-css="tve-u-17df769e533"] {
                width: 591px;
                padding-bottom: 122px !important;
            }
            [data-css="tve-u-17df76b71ca"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0);
                --tve-applied-border: 1px solid rgb(0, 0, 0);
                --tve-border-radius: 16px;
                border-radius: 16px;
                overflow: hidden;
                margin-top: 20px !important;
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df76ddbf0"] {
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df76f957e"] {
                background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgba(138, 173, 150, 0.5), rgba(138, 173, 150, 0.5)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            [data-css="tve-u-17df76fbc57"] {
                --tcb-applied-color: rgb(255, 252, 252) !important;
            }
            [data-css="tve-u-17df774d63d"] {
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df7764468"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0);
                --tve-applied-border: 1px solid rgb(0, 0, 0);
                --tve-border-radius: 12px;
                border-radius: 12px;
                overflow: hidden;
            }
            [data-css="tve-u-17df77a9ce8"] {
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df77c0518"] {
                background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-color-2), var$(--tcb-color-2)) !important;
            }
            [data-css="tve-u-17df77e971a"] {
                margin-bottom: -21px !important;
                margin-top: 9px !important;
            }
            :not(#tve) [data-css="tve-u-17df77fa6fe"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 25px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            [data-css="tve-u-17df77ff17b"] {
                --tve-border-radius: 0px;
                --tve-border-top-left-radius: 12px;
                overflow: hidden;
                --tve-border-top-right-radius: 12px;
                background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-color-1), var$(--tcb-color-1)) !important;
                border-radius: 12px 12px 0px 0px !important;
            }
            [data-css="tve-u-17df78017f9"] {
                max-width: 33.3333%;
            }
            :not(#tve) [data-css="tve-u-17df781b12a"] {
                --g-regular-weight: 400;
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 24px !important;
            }
            [data-css="tve-u-17df782bd4f"] {
                width: 339px;
                --tve-alignment: left;
                float: left;
                z-index: 3;
                position: relative;
                margin: 10px 10px 10px -7px !important;
                padding-top: 16px !important;
                padding-right: 0px !important;
            }
            :not(#tve) [data-css="tve-u-17df78521ef"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 29px !important;
                color: rgb(68, 68, 68) !important;
                --tcb-applied-color: var$(--tcb-tpl-color-11) !important;
                --tve-applied-color: var$(--tcb-tpl-color-11) !important;
            }
            :not(#tve) [data-css="tve-u-17df785bae2"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 22px !important;
                color: rgb(210, 15, 38) !important;
                --tcb-applied-color: var$(--tcb-color-0) !important;
                --tve-applied-color: var$(--tcb-color-0) !important;
            }
            [data-css="tve-u-17df786674c"] {
                --tcb-applied-color: var$(--tcb-tpl-color-11) !important;
                text-decoration: line-through !important;
            }
            [data-css="tve-u-17df7870511"] {
                width: 540px;
            }
            [data-css="tve-u-17df789e173"] {
                width: 259px;
                --tve-alignment: center;
                float: none;
                margin: 24px auto 10px !important;
            }
            [data-css="tve-u-17df78cf701"] {
                width: 295px;
                --tve-alignment: right;
                float: right;
                z-index: 3;
                position: relative;
                margin: 10px auto 15px 43px !important;
                padding-left: 0px !important;
                padding-right: 28px !important;
            }
            [data-css="tve-u-17df78e92a8"] {
                --tve-border-radius: 12px;
                border-radius: 12px;
                overflow: hidden;
                background-image: linear-gradient(rgb(239, 247, 255), rgb(239, 247, 255)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(239, 247, 255), rgb(239, 247, 255)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(239, 247, 255), rgb(239, 247, 255)) !important;
                margin: 20px -30px !important;
            }
            [data-css="tve-u-17df78f8557"] {
                padding-right: 20px !important;
                padding-left: 20px !important;
            }
            [data-css="tve-u-17df7983fdd"] {
                --tcb-local-color-980bd: rgb(31, 10, 246);
                --tcb-local-related-980bd: --tcb-tpl-color-0;
                --tcb-local-default-980bd: rgb(255, 51, 51);
                padding: 0px !important;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7983fdd"] .tve-page-section-in {
                justify-content: center;
                display: flex;
                flex-direction: column;
            }
            [data-css="tve-u-17df7983fde"] {
                background-color: var(--tcb-local-color-980bd, rgb(255, 51, 51)) !important;
                background-image: none !important;
            }
            [data-css="tve-u-17df7983fdf"] {
                --tve-color: rgb(255, 255, 255);
                min-height: 124px !important;
            }
            :not(#tve) [data-css="tve-u-17df7983fdf"] p,
            :not(#tve) [data-css="tve-u-17df7983fdf"] li,
            :not(#tve) [data-css="tve-u-17df7983fdf"] blockquote,
            :not(#tve) [data-css="tve-u-17df7983fdf"] address,
            :not(#tve) [data-css="tve-u-17df7983fdf"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7983fdf"] label,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h1,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h2,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h3,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h4,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h5,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h6 {
                color: var(--tve-color, rgb(255, 255, 255));
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
            }
            [data-css="tve-u-17df7983fe6"] {
                background-image: none !important;
                padding: 0px !important;
                background-color: transparent !important;
            }
            [data-css="tve-u-17df7983fe4"] {
                font-size: 30px;
                margin-left: auto;
                margin-right: auto;
                width: 30px;
                height: 30px;
                border: 1px solid rgba(255, 255, 255, 0.5);
                float: left;
                z-index: 3;
                position: relative;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                padding: 12px !important;
            }
            [data-css="tve-u-17df7983fe2"] {
                max-width: 9.2%;
            }
            [data-css="tve-u-17df7983fe5"] {
                max-width: 90.8%;
            }
            [data-css="tve-u-17df7983fe0"] {
                margin-bottom: 0px !important;
            }
            :not(#tve) [data-css="tve-u-17df7983fe4"]> :first-child {
                color: rgb(255, 255, 255);
            }
            [data-css="tve-u-17df7983fe3"]::after {
                clear: both;
            }
            [data-css="tve-u-17df7983fe1"] {
                padding: 0px !important;
            }
            [data-css="tve-u-17df79a49c7"] {
                padding-top: 25px !important;
            }
            :not(#tve) [data-css="tve-u-17df79bf25a"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 21px !important;
            }
            [data-css="tve-u-17df7a3eebe"] {
                margin-top: 20px !important;
                margin-bottom: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df7a5ac8e"] {
                color: rgb(8, 0, 0) !important;
                --tcb-applied-color: rgb(8, 0, 0) !important;
                --tve-applied-color: rgb(8, 0, 0) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            [data-css="tve-u-17df7a61a94"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7a64a7c"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7a6df66"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-17df7ac70bf"] {
                margin-bottom: 30px !important;
            }
            [data-css="tve-u-17df7adf57e"] {
                width: 300px;
                --tve-alignment: left;
                float: left;
                z-index: 3;
                position: relative;
                margin: 0px auto -106px !important;
                padding-bottom: 24px !important;
            }
            [data-css="tve-u-17df7aeaf7a"] {
                background-image: linear-gradient(rgba(138, 173, 150, 0.5), rgba(138, 173, 150, 0.5)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgba(138, 173, 150, 0.5), rgba(138, 173, 150, 0.5)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-color-1), var$(--tcb-color-1)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7af8171"] {
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(255, 216, 0) !important;
                --tcb-applied-color: var$(--tcb-color-2) !important;
                --tve-applied-color: var$(--tcb-color-2) !important;
                font-size: 32px !important;
                line-height: 1.45em !important;
            }
            :not(#tve) [data-css="tve-u-17df7b06854"] {
                font-weight: var(--g-regular-weight, normal) !important;
                color: rgb(62, 62, 62) !important;
                --tcb-applied-color: var$(--tcb-tpl-color-30) !important;
                --tve-applied-color: var$(--tcb-tpl-color-30) !important;
                font-size: 21px !important;
            }
            [data-css="tve-u-17df7b15cce"] {
                margin-top: 20px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
                box-shadow: none !important;
                --tve-applied-box-shadow: none !important;
            }
            [data-css="tve-u-17df7b687b3"] {
                background-color: var(--tcb-local-color-980bd, rgb(255, 51, 51)) !important;
                background-image: none !important;
            }
            [data-css="tve-u-17df7b687b5"] {
                --tve-color: rgb(255, 255, 255);
                min-height: 124px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b687b5"] p,
            :not(#tve) [data-css="tve-u-17df7b687b5"] li,
            :not(#tve) [data-css="tve-u-17df7b687b5"] blockquote,
            :not(#tve) [data-css="tve-u-17df7b687b5"] address,
            :not(#tve) [data-css="tve-u-17df7b687b5"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7b687b5"] label,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h1,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h2,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h3,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h4,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h5,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h6 {
                color: var(--tve-color, rgb(255, 255, 255));
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
            }
            [data-css="tve-u-17df7b687b7"] {
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7b687b9"] {
                padding: 0px !important;
            }
            [data-css="tve-u-17df7b687bb"] {
                max-width: 9.2%;
            }
            [data-css="tve-u-17df7b687bc"]::after {
                clear: both;
            }
            [data-css="tve-u-17df7b687be"] {
                font-size: 30px;
                margin-left: auto;
                margin-right: auto;
                width: 30px;
                height: 30px;
                border: 1px solid rgba(255, 255, 255, 0.5);
                float: left;
                z-index: 3;
                position: relative;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                padding: 12px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b687be"]> :first-child {
                color: rgb(255, 255, 255);
            }
            [data-css="tve-u-17df7b687c0"] {
                max-width: 90.8%;
            }
            [data-css="tve-u-17df7b687c2"] {
                background-image: none !important;
                padding: 0px !important;
                background-color: transparent !important;
            }
            [data-css="tve-u-17df7b687ca"] {
                --tcb-local-color-980bd: rgb(31, 10, 246);
                --tcb-local-related-980bd: --tcb-tpl-color-0;
                --tcb-local-default-980bd: rgb(255, 51, 51);
                padding: 0px !important;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7b687ca"] .tve-page-section-in {
                justify-content: center;
                display: flex;
                flex-direction: column;
            }
            [data-css="tve-u-17df7b816f1"] {
                padding-top: 1px !important;
                background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-color-1), var$(--tcb-color-1)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b8989b"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 30px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            [data-css="tve-u-17df7bd281d"] {
                background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-color-1), var$(--tcb-color-1)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7bd9c49"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 41px !important;
            }
            [data-css="tve-u-17df7bdf5d3"] {
                width: 411px;
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            :not(#tve) [data-css="tve-u-17df7c02dd3"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-17df7c0566a"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 44px !important;
            }
            [data-css="tve-u-17df7c1045d"] .tcb-button-link {
                letter-spacing: 2px;
                background-image: linear-gradient(var(--tcb-local-color-62516, rgb(19, 114, 211)), var(--tcb-local-color-62516, rgb(19, 114, 211)));
                --tve-applied-background-image: linear-gradient(var$(--tcb-local-color-62516, rgb(19, 114, 211)), var$(--tcb-local-color-62516, rgb(19, 114, 211)));
                background-size: auto;
                background-attachment: scroll;
                border-radius: 5px;
                padding: 18px;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                background-color: transparent !important;
            }
            [data-css="tve-u-17df7c1045d"] .tcb-button-link span {
                color: rgb(255, 255, 255);
                --tcb-applied-color: #fff;
            }
            [data-css="tve-u-17df7c1045d"] {
                --tcb-local-color-62516: rgb(31, 10, 246) !important;
            }
            [data-css="tve-u-17df7c16d75"] {
                font-weight: var(--g-bold-weight, bold) !important;
            }
            :not(#tve) [data-css="tve-u-17df7c16d75"] {
                font-size: 40px !important;
            }
            [data-css="tve-u-17df7c27651"] {
                margin-bottom: 0px !important;
                padding-bottom: 23px !important;
                padding-top: 23px !important;
            }
            [data-css="tve-u-17df7c6c972"] {
                background-image: linear-gradient(rgb(68, 68, 68), rgb(68, 68, 68)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(68, 68, 68), rgb(68, 68, 68)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-tpl-color-11), var$(--tcb-tpl-color-11)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7c6f6f1"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            :not(#tve) [data-css="tve-u-17df7c71050"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            :not(#tve) [data-css="tve-u-17df7c7a766"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 23px !important;
            }
            :not(#tve) [data-css="tve-u-17df7c85435"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 18px !important;
            }
            [data-css="tve-u-17df7c8d11a"] {
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df7c8fc30"] {
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7cd1493"] {
                --tve-border-width: 1px;
                border: none;
                --tve-applied-border: none;
                --tve-border-radius: 16px;
                border-radius: 16px;
                overflow: hidden;
            }
            [data-css="tve-u-17df7d10838"] {
                margin-top: 10px !important;
            }
            [data-css="tve-u-17df7d10832"] {
                --tve-alignment: center;
                float: none;
                --tcb-local-default-master-h: var(--tcb-main-master-h, 220);
                --tcb-local-default-master-s: var(--tcb-main-master-s, 76%);
                --tcb-local-default-master-l: var(--tcb-main-master-l, 53%);
                --tcb-local-default-master-a: var(--tcb-main-master-a, 1);
                margin-left: auto !important;
                margin-right: auto !important;
                --tve-countdown-size: 58px !important;
                --tve-countdown-label-size: 0.21 !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] span,
            :not(#tve) [data-css="tve-u-17df7d10834"] span::before {
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
                background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                color: var(--tve-color, rgb(255, 255, 255)) !important;
                --tve-applied-color: var$(--tve-color, rgb(255, 255, 255)) !important;
            }
            [data-css="tve-u-17df7d10834"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-color: rgb(255, 255, 255);
                --tve-applied---tve-color: rgb(255, 255, 255);
                --flip-border-width: 1px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] .t-digit-part>span {
                padding: 20px !important;
            }
            [data-css="tve-u-17df7d10835"] {
                margin-top: 10px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10837"] p,
            :not(#tve) [data-css="tve-u-17df7d10837"] li,
            :not(#tve) [data-css="tve-u-17df7d10837"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10837"] address,
            :not(#tve) [data-css="tve-u-17df7d10837"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10837"] label,
            :not(#tve) [data-css="tve-u-17df7d10837"] h1,
            :not(#tve) [data-css="tve-u-17df7d10837"] h2,
            :not(#tve) [data-css="tve-u-17df7d10837"] h3,
            :not(#tve) [data-css="tve-u-17df7d10837"] h4,
            :not(#tve) [data-css="tve-u-17df7d10837"] h5,
            :not(#tve) [data-css="tve-u-17df7d10837"] h6 {
                color: var(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tve-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tcb-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
            }
            [data-css="tve-u-17df7d10837"] {
                --tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-applied---tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-font-weight: var(--g-bold-weight, bold);
                --tve-font-family: Arial, Helvetica, sans-serif;
                --tve-font-size: calc(var(--tve-countdown-size) * 0.3);
            }
            :not(#tve) [data-css="tve-u-17df7d10837"] p,
            :not(#tve) [data-css="tve-u-17df7d10837"] li,
            :not(#tve) [data-css="tve-u-17df7d10837"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10837"] address,
            :not(#tve) [data-css="tve-u-17df7d10837"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10837"] label {
                font-weight: var(--tve-font-weight, var(--g-bold-weight, bold));
                font-family: var(--tve-font-family, Arial, Helvetica, sans-serif);
            }
            :not(#tve) [data-css="tve-u-17df7d10837"] .tcb-plain-text {
                font-size: var(--tve-font-size, 30px);
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] span,
            :not(#tve) [data-css="tve-u-17df7d1083a"] span::before {
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
                background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                color: var(--tve-color, rgb(255, 255, 255)) !important;
                --tve-applied-color: var$(--tve-color, rgb(255, 255, 255)) !important;
            }
            [data-css="tve-u-17df7d1083a"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-color: rgb(255, 255, 255);
                --tve-applied---tve-color: rgb(255, 255, 255);
                --flip-border-width: 1px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] .t-digit-part>span {
                padding: 20px !important;
            }
            [data-css="tve-u-17df7d1083b"] {
                margin-top: 10px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083d"] p,
            :not(#tve) [data-css="tve-u-17df7d1083d"] li,
            :not(#tve) [data-css="tve-u-17df7d1083d"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d1083d"] address,
            :not(#tve) [data-css="tve-u-17df7d1083d"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d1083d"] label,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h1,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h2,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h3,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h4,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h5,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h6 {
                color: var(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tve-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tcb-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
            }
            [data-css="tve-u-17df7d1083d"] {
                --tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-applied---tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-font-weight: var(--g-bold-weight, bold);
                --tve-font-family: Arial, Helvetica, sans-serif;
                --tve-font-size: calc(var(--tve-countdown-size) * 0.3);
            }
            :not(#tve) [data-css="tve-u-17df7d1083d"] p,
            :not(#tve) [data-css="tve-u-17df7d1083d"] li,
            :not(#tve) [data-css="tve-u-17df7d1083d"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d1083d"] address,
            :not(#tve) [data-css="tve-u-17df7d1083d"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d1083d"] label {
                font-weight: var(--tve-font-weight, var(--g-bold-weight, bold));
                font-family: var(--tve-font-family, Arial, Helvetica, sans-serif);
            }
            :not(#tve) [data-css="tve-u-17df7d1083d"] .tcb-plain-text {
                font-size: var(--tve-font-size, 30px);
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] span,
            :not(#tve) [data-css="tve-u-17df7d1083f"] span::before {
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
                background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                color: var(--tve-color, rgb(255, 255, 255)) !important;
                --tve-applied-color: var$(--tve-color, rgb(255, 255, 255)) !important;
            }
            [data-css="tve-u-17df7d1083f"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-color: rgb(255, 255, 255);
                --tve-applied---tve-color: rgb(255, 255, 255);
                --flip-border-width: 1px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] .t-digit-part>span {
                padding: 20px !important;
            }
            [data-css="tve-u-17df7d10840"] {
                margin-top: 10px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10842"] p,
            :not(#tve) [data-css="tve-u-17df7d10842"] li,
            :not(#tve) [data-css="tve-u-17df7d10842"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10842"] address,
            :not(#tve) [data-css="tve-u-17df7d10842"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10842"] label,
            :not(#tve) [data-css="tve-u-17df7d10842"] h1,
            :not(#tve) [data-css="tve-u-17df7d10842"] h2,
            :not(#tve) [data-css="tve-u-17df7d10842"] h3,
            :not(#tve) [data-css="tve-u-17df7d10842"] h4,
            :not(#tve) [data-css="tve-u-17df7d10842"] h5,
            :not(#tve) [data-css="tve-u-17df7d10842"] h6 {
                color: var(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tve-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tcb-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
            }
            [data-css="tve-u-17df7d10842"] {
                --tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-applied---tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-font-weight: var(--g-bold-weight, bold);
                --tve-font-family: Arial, Helvetica, sans-serif;
                --tve-font-size: calc(var(--tve-countdown-size) * 0.3);
            }
            :not(#tve) [data-css="tve-u-17df7d10842"] p,
            :not(#tve) [data-css="tve-u-17df7d10842"] li,
            :not(#tve) [data-css="tve-u-17df7d10842"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10842"] address,
            :not(#tve) [data-css="tve-u-17df7d10842"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10842"] label {
                font-weight: var(--tve-font-weight, var(--g-bold-weight, bold));
                font-family: var(--tve-font-family, Arial, Helvetica, sans-serif);
            }
            :not(#tve) [data-css="tve-u-17df7d10842"] .tcb-plain-text {
                font-size: var(--tve-font-size, 30px);
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] span,
            :not(#tve) [data-css="tve-u-17df7d10844"] span::before {
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
                background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                color: var(--tve-color, rgb(255, 255, 255)) !important;
                --tve-applied-color: var$(--tve-color, rgb(255, 255, 255)) !important;
            }
            [data-css="tve-u-17df7d10844"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-color: rgb(255, 255, 255);
                --tve-applied---tve-color: rgb(255, 255, 255);
                --flip-border-width: 1px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] .t-digit-part>span {
                padding: 20px !important;
            }
            [data-css="tve-u-17df7d10845"] {
                margin-top: 10px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10848"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                font-family: Poppins !important;
                font-weight: var(--g-regular-weight, normal) !important;
                color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)) !important;
                --tcb-applied-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)) !important;
                --tve-applied-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)) !important;
                font-size: 20px !important;
                padding-bottom: 0px !important;
                margin-bottom: 0px !important;
                padding-top: 0px !important;
                margin-top: 0px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10848"] strong {
                font-weight: 500 !important;
            }
            :not(#tve)[data-css="tve-u-17df7d10833"] span,
            :not(#tve)[data-css="tve-u-17df7d10833"] .tcb-editable-label,
            :not(#tve)[data-css="tve-u-17df7d10833"] .tcb-plain-text {
                font-weight: var(--tve-font-weight, var(--g-regular-weight, normal));
                font-family: var(--tve-font-family, Poppins);
            }
            [data-css="tve-u-17df7d10833"] {
                --tve-font-weight: var(--g-regular-weight, normal);
                --tve-font-family: Poppins;
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-text-transform: uppercase;
            }
            :not(#tve) [data-css="tve-u-17df7d10833"] p,
            :not(#tve) [data-css="tve-u-17df7d10833"] li,
            :not(#tve) [data-css="tve-u-17df7d10833"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10833"] address,
            :not(#tve) [data-css="tve-u-17df7d10833"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10833"] label,
            :not(#tve) [data-css="tve-u-17df7d10833"] h1,
            :not(#tve) [data-css="tve-u-17df7d10833"] h2,
            :not(#tve) [data-css="tve-u-17df7d10833"] h3,
            :not(#tve) [data-css="tve-u-17df7d10833"] h4,
            :not(#tve) [data-css="tve-u-17df7d10833"] h5,
            :not(#tve) [data-css="tve-u-17df7d10833"] h6 {
                text-transform: var(--tve-text-transform, uppercase);
            }
            :not(#tve) [data-css="tve-u-17df7d10836"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10839"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083c"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083e"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10841"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10843"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10846"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] {
                margin-right: 2px !important;
                margin-left: 2px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] {
                margin-right: 2px !important;
                margin-left: 2px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] {
                margin-right: 2px !important;
                margin-left: 2px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] {
                margin-right: 2px !important;
                margin-left: 2px !important;
            }
            [data-css="tve-u-17df7d10847"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-181f94d8ad8"] {
                max-width: 43%;
            }
            [data-css="tve-u-181f94d8bf3"] {
                max-width: 57%;
            }
            [data-css="tve-u-181f94eaf7c"] {
                margin-top: 0px;
                margin-left: 0px;
                max-width: none !important;
            }
            [data-css="tve-u-181f95b9f04"] {
                background-image: linear-gradient(rgba(138, 173, 150, 0.5), rgba(138, 173, 150, 0.5)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgba(138, 173, 150, 0.5), rgba(138, 173, 150, 0.5)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgba(138, 173, 150, 0.5), rgba(138, 173, 150, 0.5)) !important;
            }
            [data-css="tve-u-181f9713464"] {
                max-width: 66.6662%;
            }
            :not(#tve) [data-css="tve-u-181f977e3a7"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            [data-css="tve-u-181f9781dc8"] {
                background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
            }
            [data-css="tve-u-181f9788e17"] {
                background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-color-2), var$(--tcb-color-2)) !important;
            }
            :not(#tve) [data-css="tve-u-181fbda6572"] {
                --g-regular-weight: 300;
                --g-bold-weight: 500;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 24px !important;
                color: rgb(170, 25, 55) !important;
                --tcb-applied-color: rgb(170, 25, 55) !important;
                --tve-applied-color: rgb(170, 25, 55) !important;
            }
            :not(#tve) [data-css="tve-u-181fbda6572"] strong {
                font-weight: 500 !important;
            }
            :not(#tve) [data-css="tve-u-181fbdc49f4"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                letter-spacing: 0px;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 28px !important;
                color: rgb(241, 16, 23) !important;
                --tcb-applied-color: rgb(241, 16, 23) !important;
                --tve-applied-color: rgb(241, 16, 23) !important;
                text-decoration: underline !important;
                text-transform: uppercase !important;
                line-height: 1.7em !important;
            }
            :not(#tve) [data-css="tve-u-181fbdc49f4"] strong {
                font-weight: 600 !important;
            }
            :not(#tve) [data-css="tve-u-181fbe2f6da"] {
                --g-regular-weight: 300;
                --g-bold-weight: 500;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 21px !important;
                color: rgb(170, 25, 55) !important;
                --tcb-applied-color: rgb(170, 25, 55) !important;
                --tve-applied-color: rgb(170, 25, 55) !important;
            }
            :not(#tve) [data-css="tve-u-181fbe2f6da"] strong {
                font-weight: 500 !important;
            }
            :not(#tve) [data-css="tve-u-181fbe30a2b"] {
                --g-regular-weight: 300;
                --g-bold-weight: 500;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 21px !important;
                color: rgb(170, 25, 55) !important;
                --tcb-applied-color: rgb(170, 25, 55) !important;
                --tve-applied-color: rgb(170, 25, 55) !important;
            }
            :not(#tve) [data-css="tve-u-181fbe30a2b"] strong {
                font-weight: 500 !important;
            }
            :not(#tve) [data-css="tve-u-181fbe3342b"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 21px !important;
                color: rgb(170, 25, 55) !important;
                --tcb-applied-color: rgb(170, 25, 55) !important;
                --tve-applied-color: rgb(170, 25, 55) !important;
            }
            :not(#tve) [data-css="tve-u-181fbe34924"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 21px !important;
                color: rgb(170, 25, 55) !important;
                --tcb-applied-color: rgb(170, 25, 55) !important;
                --tve-applied-color: rgb(170, 25, 55) !important;
            }
            [data-css="tve-u-181fbe3b3eb"] {
                max-width: 33.3333%;
            }
            [data-css="tve-u-181fbe43098"] {
                max-width: 33.3333%;
            }
            [data-css="tve-u-181fbe6aea9"] {
                --tcb-applied-color: var$(--tcb-color-2);
                color: rgb(50, 153, 53) !important;
            }
            [data-css="tve-u-181fbe6e917"] {
                --tcb-applied-color: var$(--tcb-color-2);
                color: rgb(50, 153, 53) !important;
            }
            [data-css="tve-u-181fbea6db1"] {
                background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            [data-css="tve-u-181fbf89167"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                padding-left: 25px !important;
            }
            :not(#tve) [data-css="tve-u-181fbf90a2c"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            [data-css="tve-u-181fbf9f360"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                padding-left: 25px !important;
            }
            [data-css="tve-u-181fbfa662a"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                padding-left: 25px !important;
            }
            [data-css="tve-u-181fbfae67e"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-color-0), var$(--tcb-color-0)) !important;
                padding-left: 25px !important;
            }
            :not(#tve) [data-css="tve-u-181fbfcbeb9"] {
                color: rgb(245, 245, 245) !important;
                --tcb-applied-color: var$(--tcb-tpl-color-5) !important;
                --tve-applied-color: var$(--tcb-tpl-color-5) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            [data-css="tve-u-181fc1ba460"] {
                margin-bottom: -2px !important;
                margin-top: 19px !important;
                padding-bottom: 0px !important;
            }
            [data-css="tve-u-181fc23a99d"] {
                height: 55px;
                bottom: 0px;
                fill: rgb(255, 255, 255);
            }
            [data-css="tve-u-181fc2440ca"] {
                height: 55px;
                bottom: 0px;
            }
            [data-css="tve-u-181fc3eda21"] {
                width: 357px;
                --tve-alignment: center;
                float: none;
                z-index: 3;
                position: relative;
                margin: 23px 23px 23px 13px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-181fc3eda5f"] {
                margin-left: -11px;
                margin-top: -0.425px;
                width: 103% !important;
                max-width: none !important;
            }
            [data-css="tve-u-181fc3eda21"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-181fc3f0d7a"] {
                width: 286px;
                --tve-alignment: center;
                float: none;
                margin: 10px auto 9px !important;
            }
            [data-css="tve-u-181fc3f0d7a"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-181fc3f0d81"] {
                margin-top: 0px;
                margin-left: -25px;
                width: 116% !important;
                max-width: none !important;
            }
            [data-css="tve-u-181fc414006"] {
                margin-left: -6.762px;
                margin-top: -0.078px;
                width: 102% !important;
                max-width: none !important;
            }
            [data-css="tve-u-17df782bd4f"] .tve_image_frame {
                height: 100%;
            }
            :not(#tve) [data-css="tve-u-181fc4925f4"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            [data-css="tve-u-181fc5dad88"] {
                max-width: 44.3%;
            }
            [data-css="tve-u-181fc5dadbd"] {
                max-width: 55.7%;
            }
            [data-css="tve-u-18203476af4"] {
                max-width: 33.333%;
            }
            :not(#tve) [data-css="tve-u-182b02e16fd"] {
                font-size: 21px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182b02e1704"] {
                font-size: 21px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182b02e1707"] {
                font-size: 21px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182b06f27c3"] {
                color: rgb(255, 252, 252) !important;
                --tcb-applied-color: rgb(255, 252, 252) !important;
                --tve-applied-color: rgb(255, 252, 252) !important;
            }
            :not(#tve) [data-css="tve-u-182b06f97df"] {
                color: rgb(254, 252, 252) !important;
                --tcb-applied-color: rgb(254, 252, 252) !important;
                --tve-applied-color: rgb(254, 252, 252) !important;
            }
            [data-css="tve-u-182b0712169"] {
                margin-bottom: 20px !important;
                background-image: linear-gradient(rgb(18, 159, 48), rgb(18, 159, 48)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(18, 159, 48), rgb(18, 159, 48)) !important;
            }
            :not(#tve) [data-css="tve-u-182b07180b7"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-182b083d063"] {
                font-size: 21px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182b0846b19"] {
                width: 291px;
                --tve-alignment: center;
                float: none;
                margin: 10px auto !important;
            }
            :not(#tve) [data-css="tve-u-182b089ad0a"] {
                font-weight: var(--g-regular-weight, normal) !important;
                color: rgb(255, 254, 254) !important;
                --tve-applied-color: rgb(255, 254, 254) !important;
            }
            :not(#tve) [data-css="tve-u-182b08a5ed4"] {
                color: rgb(251, 245, 245) !important;
                --tcb-applied-color: rgb(251, 245, 245) !important;
                --tve-applied-color: rgb(251, 245, 245) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-182b08e4e38"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-182b08f1f79"] {
                color: inherit !important;
                --tve-applied-color: inherit !important;
            }
            :not(#tve) [data-css="tve-u-182b09069d2"] {
                color: rgb(255, 254, 254) !important;
                --tcb-applied-color: rgb(255, 254, 254) !important;
                --tve-applied-color: rgb(255, 254, 254) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-182b090c6d4"] {
                color: inherit !important;
                --tve-applied-color: inherit !important;
            }
            :not(#tve) [data-css="tve-u-182b0929f5a"] {
                color: inherit !important;
                --tve-applied-color: inherit !important;
            }
            :not(#tve) [data-css="tve-u-182b093ef5a"] {
                color: inherit !important;
                --tve-applied-color: inherit !important;
            }
            :not(#tve) [data-css="tve-u-182b094a967"] {
                color: inherit !important;
                --tve-applied-color: inherit !important;
            }
            :not(#tve) [data-css="tve-u-182b0954ca7"] {
                color: inherit !important;
                --tve-applied-color: inherit !important;
            }
            :not(#tve) [data-css="tve-u-182b095e273"] {
                color: inherit !important;
                --tve-applied-color: inherit !important;
            }
            :not(#tve) [data-css="tve-u-182b0968503"] {
                color: inherit !important;
                --tve-applied-color: inherit !important;
            }
            :not(#tve) [data-css="tve-u-182b0968dd2"] {
                color: inherit !important;
                --tve-applied-color: inherit !important;
            }
            [data-css="tve-u-182b0accf1d"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(50, 153, 53), rgb(50, 153, 53)) !important;
                padding-left: 25px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d84b5e"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d87083"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d88708"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d8e0c6"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d8fb02"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d91083"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d94b51"] {
                font-size: 2px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d98d50"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d99b34"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d9be0f"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d9d0d7"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-182b0d9dec5"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-182b0da0d75"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-182b0da1b9d"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-182b0da2d75"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-182b0da8f4e"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0dad667"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0dbd215"] {
                text-transform: none !important;
                font-weight: var(--g-bold-weight, bold) !important;
                line-height: 1.7em !important;
            }
            :not(#tve) [data-css="tve-u-182b0dcd9b5"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0dd542b"] {
                line-height: 1.7em !important;
            }
            :not(#tve) [data-css="tve-u-182b0e05b79"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0e05b7c"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0e05b7f"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0e05b81"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0e05b83"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0e05b85"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0e05b88"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-182b0e2f269"] {
                font-size: 21px !important;
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-182b0e3e6f2"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            [data-css="tve-u-182b0e6c964"] {
                font-family: Roboto !important;
                font-weight: 400 !important;
                font-size: 21px !important;
            }
            [data-css="tve-u-182b0e6c966"] {
                font-family: Roboto !important;
                font-weight: 400 !important;
                font-size: 21px !important;
            }
            [data-css="tve-u-182b0e6c964"] strong {
                font-weight: 500 !important;
            }
            :not(#tve) [data-css="tve-u-182b0e6fe2d"] {
                font-size: 21px !important;
            }
            [data-css="tve-u-182b4963568"] {
                max-width: 31.7%;
            }
            :not(#tve) [data-css="tve-u-182b497eba3"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Impact, Charcoal, sans-serif !important;
                font-size: 29px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182b497eba3"] strong {
                font-weight: 900 !important;
            }
            [data-css="tve-u-182b4995f6d"] {
                max-width: 35%;
            }
            [data-css="tve-u-182b499aaf0"] {
                max-width: 33.3323%;
            }
            [data-css="tve-u-182b49bbf05"] {
                margin-left: 0px;
                width: 104% !important;
                max-width: none !important;
            }
            [data-css="tve-u-17df78cf701"] .tve_image_frame {
                height: 100%;
            }
            :not(#tve) [data-css="tve-u-182b49e4adf"] {
                font-size: 29px !important;
                font-family: Impact, Charcoal, sans-serif !important;
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-182b4a60e1f"] {
                color: rgb(14, 1, 1) !important;
                --tcb-applied-color: rgb(14, 1, 1) !important;
                --tve-applied-color: rgb(14, 1, 1) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-182d903b333"] {
                font-size: 21px !important;
            }
            [data-css="tve-u-18316bb6778"] {
                --tve-border-top-right-radius: 0px;
                overflow: hidden;
                --tve-border-width: 11px;
                box-shadow: rgba(0, 0, 0, 0.37) 0px 8px 15px -9px inset !important;
                --tve-applied-box-shadow: 0px 8px 15px -9px rgba(0, 0, 0, 0.37) inset !important;
                border-top-right-radius: 0px !important;
                background-image: linear-gradient(rgb(249, 245, 245), rgb(249, 245, 245)) !important;
                --tve-applied-background-image: linear-gradient(rgb(249, 245, 245), rgb(249, 245, 245)) !important;
                border: 11px solid rgb(245, 245, 242) !important;
                --tve-applied-border: 11px solid rgb(245, 245, 242) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
            }
            [data-css="tve-u-18316d8a064"] {
                --tcb-applied-color: rgb(14, 1, 1) !important;
            }
            :not(#tve) [data-css="tve-u-18316e1d284"] {
                font-size: 19px !important;
                line-height: 0.55em !important;
            }
            [data-css="tve-u-18316e4c379"] {
                text-decoration: underline !important;
                color: rgb(234, 11, 11) !important;
            }
            [data-css="tve-u-18316e728a6"] {
                --tcb-applied-color: rgb(14, 1, 1) !important;
            }
            :not(#tve) [data-css="tve-u-18316e8ca9a"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                letter-spacing: 0px;
                font-weight: var(--g-regular-weight, normal) !important;
                font-family: Poppins !important;
                font-size: 15px !important;
                color: rgba(21, 1, 1, 0.97) !important;
                --tcb-applied-color: rgba(21, 1, 1, 0.97) !important;
                --tve-applied-color: rgba(21, 1, 1, 0.97) !important;
                text-decoration: none !important;
                text-transform: uppercase !important;
                line-height: 1.7em !important;
            }
            :not(#tve) [data-css="tve-u-18316e8ca9a"] strong {
                font-weight: 600 !important;
            }
            [data-css="tve-u-18316fc0453"] {
                --tve-border-radius: 0px;
                border-radius: 0px;
                overflow: hidden;
                --tve-border-width: 0px;
                padding-top: 32px !important;
                border: none !important;
                --tve-applied-border: none !important;
                background-image: linear-gradient(rgba(252, 246, 246, 0.5), rgba(252, 246, 246, 0.5)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgba(252, 246, 246, 0.5), rgba(252, 246, 246, 0.5)) !important;
            }
            [data-css="tve-u-1831700a2ae"] {
                --tcb-applied-color: rgb(17, 16, 16) !important;
                font-weight: normal !important;
            }
            [data-css="tve-u-18317018e68"] {
                box-shadow: rgba(0, 0, 0, 0.35) 0px 8px 12px 0px inset;
                --tve-applied-box-shadow: 0px 8px 12px 0px rgba(0, 0, 0, 0.35) inset;
            }
            [data-css="tve-u-1831b9a3242"]::after {
                clear: both;
            }
            [data-css="tve-u-17df6c322cc"] img {
                filter: grayscale(0%) blur(0px) brightness(113%) sepia(0%) invert(0%) saturate(102%) contrast(115%) hue-rotate(0deg);
                opacity: 1;
            }
            [data-css="tve-u-1831bb8ad86"] {
                color: rgb(246, 11, 11) !important;
            }
            [data-css="tve-u-1831bc4450f"] {
                font-size: 26px !important;
            }
            :not(#tve) [data-css="tve-u-1831bc47d99"] {
                line-height: 0.9em !important;
                color: rgb(27, 25, 25) !important;
                --tcb-applied-color: rgb(27, 25, 25) !important;
                --tve-applied-color: rgb(27, 25, 25) !important;
            }
            :not(#tve) [data-css="tve-u-1831bc7a016"] {
                color: rgb(14, 1, 1) !important;
                --tcb-applied-color: rgb(14, 1, 1) !important;
                --tve-applied-color: rgb(14, 1, 1) !important;
            }
            [data-css="tve-u-17df6c5c786"] .tve_image_frame {
                height: 71.2338px;
            }
            [data-css="tve-u-1831bc944da"] {
                margin-top: -1.1375px;
                margin-left: 0px;
                max-width: none !important;
                width: 100% !important;
            }
            [data-css="tve-u-1831bd1a541"]>.tcb-flex-col {
                padding-left: 0px;
            }
            [data-css="tve-u-1831bd1a541"] {
                margin-left: 0px;
                min-height: inherit;
            }
            [data-css="tve-u-1831bd1a541"]>.tcb-flex-col>.tcb-col {
                min-height: 28px;
            }
            [data-css="tve-u-17df6ce4bc2"] .tve_image_frame {
                height: 89.0417px;
            }
            [data-css="tve-u-17df6ce4bc2"] img {
                filter: grayscale(0%) blur(0px) brightness(104%) sepia(0%) invert(0%) saturate(100%) contrast(100%) hue-rotate(0deg);
            }
            [data-css="tve-u-1831bdb69af"] {
                --tcb-applied-color: rgb(17, 16, 16) !important;
                font-weight: normal !important;
                color: rgb(11, 0, 0) !important;
            }
            [data-css="tve-u-1831bdb69b3"] {
                color: rgb(244, 24, 24) !important;
            }
            [data-css="tve-u-1831bdb69b5"] {
                --tcb-applied-color: rgb(17, 16, 16) !important;
                font-weight: normal !important;
            }
            [data-css="tve-u-1831bdb69b8"] {
                color: rgb(244, 24, 24) !important;
            }
            [data-css="tve-u-1831bde5421"] {
                font-size: 29px !important;
            }
            [data-css="tve-u-1831be2b516"] {
                font-size: 25px !important;
            }
            [data-css="tve-u-1831be384e5"] {
                color: rgb(239, 9, 9) !important;
            }
            :not(#tve) [data-css="tve-u-1831be59e2b"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 29px !important;
                color: rgb(14, 1, 1) !important;
                --tcb-applied-color: rgb(14, 1, 1) !important;
                --tve-applied-color: rgb(14, 1, 1) !important;
            }
            :not(#tve) [data-css="tve-u-1831be59e2b"] strong {
                font-weight: 600 !important;
            }
            :not(#tve) [data-css="tve-u-1831c3676d8"] {
                font-size: 21px !important;
                color: rgb(16, 0, 0) !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
                --tve-applied-color: rgb(16, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-1831c3676e3"] {
                font-size: 21px !important;
                color: rgb(16, 0, 0) !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
                --tve-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1831c3676f0"] {
                font-size: 21px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1831de7caeb"] {
                width: 477px;
                box-shadow: none;
                --tve-applied-box-shadow: none;
                padding-right: 0px !important;
                margin-top: 14px !important;
                margin-bottom: 74px !important;
            }
            [data-css="tve-u-1831de7cb07"] {
                margin-top: 0px;
                margin-left: -37px;
                width: 123% !important;
                max-width: none !important;
            }
            [data-css="tve-u-1831de7caeb"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-1831de7e5ac"] {
                max-width: 38%;
            }
            [data-css="tve-u-1831de80f0e"] {
                margin-left: -20.013px;
                margin-top: 0px;
                width: 110% !important;
                max-width: none !important;
            }
            [data-css="tve-u-17df769e533"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-1831dfa0835"] {
                font-size: 21px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1831dfa083e"] {
                font-size: 21px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1831dfa3620"] {
                font-size: 36px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1831dfa578e"] {
                max-width: 62%;
            }
            :not(#tve) [data-css="tve-u-1831dfa92e9"] {
                font-size: 28px !important;
                color: rgb(16, 0, 0) !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
                --tve-applied-color: rgb(16, 0, 0) !important;
                line-height: 1.25em !important;
            }
            [data-css="tve-u-1832157f4c1"] {
                font-size: 21px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1832157f4c5"] {
                font-size: 28px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-1832158b273"] {
                font-size: 28px !important;
                color: rgba(245, 11, 11, 0.99) !important;
                --tcb-applied-color: rgba(245, 11, 11, 0.99) !important;
                --tve-applied-color: rgba(245, 11, 11, 0.99) !important;
                line-height: 1.25em !important;
            }
            [data-css="tve-u-1832162ca24"] {
                font-size: 28px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1832162ca28"] {
                font-size: 21px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1832166808b"] {
                font-size: 21px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1832166808e"] {
                color: rgb(241, 12, 12) !important;
            }
            [data-css="tve-u-18321668097"] {
                font-size: 21px !important;
                --tcb-applied-color: rgb(16, 0, 0) !important;
            }
            [data-css="tve-u-1832166809a"] {
                color: rgb(241, 12, 12) !important;
            }
            :not(#tve) [data-css="tve-u-1832166b712"] {
                --g-regular-weight: 400;
                font-size: 34px !important;
                color: rgba(245, 11, 11, 0.99) !important;
                --tcb-applied-color: rgba(245, 11, 11, 0.99) !important;
                --tve-applied-color: rgba(245, 11, 11, 0.99) !important;
                line-height: 1.25em !important;
                font-weight: var(--g-regular-weight, normal) !important;
            }
            [data-css="tve-u-1832197b0e6"] {
                margin-left: 0px;
                margin-top: -2.238px;
                width: 100% !important;
                max-width: none !important;
            }
            [data-css="tve-u-18321983c0f"] {
                width: 455px;
                margin-bottom: 67px !important;
            }
            [data-css="tve-u-18321983c0f"] .tve_image_frame {
                height: 221.265px;
            }
            [data-css="tve-u-18321985a99"] {
                width: 591px;
                margin-top: 121px !important;
            }
            [data-css="tve-u-18321985a99"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-18321985a9d"] {
                margin-left: -20.013px;
                margin-top: 0px;
                width: 129% !important;
                max-width: none !important;
            }
            [data-css="tve-u-183260f4bb8"] {
                padding-right: 0px !important;
            }
            [data-css="tve-u-1832616dd0b"] {
                width: 100%;
            }
            [data-css="tve-u-1832616dd0b"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-183261745c5"] {
                margin-top: -0.037px;
                margin-left: -1px;
                width: 101% !important;
                max-width: none !important;
            }
            [data-css="tve-u-183269b197f"] {
                font-size: 39px !important;
            }
            [data-css="tve-u-183269bb778"] {
                font-size: 40px !important;
            }
            :not(#tve) [data-css="tve-u-183269e65c6"] {
                text-shadow: none;
                --tve-applied-text-shadow: none;
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(255, 216, 0) !important;
                --tcb-applied-color: var$(--tcb-color-2) !important;
                --tve-applied-color: var$(--tcb-color-2) !important;
                font-size: 32px !important;
                line-height: 1.45em !important;
            }
            [data-css="tve-u-18326a0c398"] {
                text-shadow: rgba(54, 110, 6, 0.98) 2px 2px 2px !important;
                color: rgba(27, 2, 2, 0.96) !important;
            }
            [data-css="tve-u-18326c2c2fd"] {
                font-size: 47px !important;
                font-weight: bold !important;
            }
            [data-css="tve-u-18326c2db80"] {
                min-height: 253px !important;
            }
            [data-css="tve-u-18326c32a56"] {
                font-weight: bold !important;
            }
            [data-css="tve-u-18326c368c2"] {
                font-size: 31px !important;
            }
            [data-css="tve-u-18326c42723"] {
                font-size: 57px !important;
            }
            [data-css="tve-u-18326c5a6be"] {
                font-weight: bold !important;
            }
            :not(#tve) [data-css="tve-u-18326c5db36"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: 49px !important;
            }
            [data-css="tve-u-18326c5db5c"] {
                font-weight: bold !important;
            }
            [data-css="tve-u-183309e5276"]::after {
                clear: both;
            }
            [data-css="tve-u-183309ed9c8"] {
                padding: 27px 27px 39px !important;
                margin: 24px -33px -34px -45px !important;
            }
            [data-css="tve-u-183309fb38e"]::after {
                clear: both;
            }
            [data-css="tve-u-18330a10359"]::after {
                clear: both;
            }
            [data-css="tve-u-18330a1ae7f"] {
                width: 540px;
                margin-bottom: 18px !important;
                padding-bottom: 0px !important;
                padding-top: 0px !important;
                margin-top: 27px !important;
            }
            [data-css="tve-u-18330a2c956"] {
                padding-top: 21px !important;
            }
            [data-css="tve-u-18330a34540"] {
                width: 540px;
                margin-top: 11px !important;
            }
            [data-css="tve-u-18330a35b12"] {
                padding-top: 11px !important;
            }
            [data-css="tve-u-18330a5c571"] {
                color: rgb(255, 255, 255) !important;
            }
            [data-css="tve-u-18330a6c1d6"] {
                color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-18330a6e39d"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 18px !important;
            }
            [data-css="tve-u-18330e41b69"] {
                width: 199px;
                --tve-alignment: center;
                float: none;
                margin: 0px auto !important;
            }
            [data-css="tve-u-18330e41b69"] .tve_image_frame {
                height: 201.522px;
            }
            [data-css="tve-u-18330e41b6e"] {
                margin-left: -0.675px;
                margin-top: -36px;
                width: 100% !important;
                max-width: none !important;
            }
            [data-css="tve-u-18330e4773d"] {
                width: 221px;
                --tve-alignment: center;
                float: none;
                margin: 0px auto !important;
            }
            [data-css="tve-u-18330e4773d"] .tve_image_frame {
                height: 198.9px;
            }
            [data-css="tve-u-18330e47743"] {
                margin-left: 0px;
                margin-top: -56px;
                width: 100% !important;
                max-width: none !important;
            }
            [data-css="tve-u-183311ff377"] {
                width: 540px;
                margin-top: 5px !important;
            }
            :not(#tve) [data-css="tve-u-18331209432"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833121218a"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-183312149b7"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-18331215da4"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833122de0c"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-183312aa56f"] {
                line-height: 1.7em !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-183312ad992"] {
                font-weight: normal !important;
            }
            [data-css="tve-u-183ac16889c"] {
                width: 540px;
            }
            [data-css="tve-u-183ac177824"] {
                width: 540px;
            }
            [data-css="tve-u-183c0bb0331"] {
                width: 1024px;
                margin-top: 31px !important;
                margin-left: 24px !important;
            }
            :not(#tve) [data-css="tve-u-18760ecdd26"] {
                color: rgb(88, 88, 88) !important;
                --tve-applied-color: rgb(88, 88, 88) !important;
            }
            :not(#tve) [data-css="tve-u-18760edcd1f"] {
                color: rgb(68, 68, 68) !important;
                --tve-applied-color: rgb(68, 68, 68) !important;
            }
            :not(#tve) [data-css="tve-u-18760ee60d8"] {
                color: rgb(75, 75, 75) !important;
                --tve-applied-color: rgb(75, 75, 75) !important;
            }
            :not(#tve) [data-css="tve-u-18760ef62ae"] {
                color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-18760f016a9"] {
                color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-18760f094f2"] {
                color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-18760f11745"] {
                color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-18760f1f2c2"] {
                color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-18760f260fa"] {
                color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-18760f347ad"] {
                color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-18760f47095"] {
                color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
        }

        @media (max-width: 1023px) {
            [data-css="tve-u-16c239f72b3"] {
                padding-top: 0px !important;
                padding-bottom: 0px !important;
            }
            #tcb_landing_page h1 {
                font-size: 44px;
            }
            #tcb_landing_page h2 {
                font-size: 38px;
            }
            [data-css="tve-u-17df7983fe2"] {
                max-width: 14.6%;
            }
            [data-css="tve-u-17df7983fe5"] {
                max-width: 85.4%;
            }
            [data-css="tve-u-17df7983fe4"] {
                font-size: 26px;
                width: 26px;
                height: 26px;
            }
            [data-css="tve-u-17df7b687bb"] {
                max-width: 14.6%;
            }
            [data-css="tve-u-17df7b687be"] {
                font-size: 26px;
                width: 26px;
                height: 26px;
            }
            [data-css="tve-u-17df7b687c0"] {
                max-width: 85.4%;
            }
            [data-css="tve-u-183ac16889c"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-181fc3eda21"] {
                float: left;
                z-index: 3;
                position: relative;
                --tve-alignment: left;
                margin-left: 216px !important;
                margin-right: auto !important;
                padding-bottom: 1px !important;
                padding-right: 0px !important;
                padding-left: 0px !important;
            }
            [data-css="tve-u-183ac16b8de"]::after {
                clear: both;
            }
            [data-css="tve-u-183311ff377"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-183ac177824"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-18330a34540"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df782bd4f"] {
                --tve-alignment: center;
                float: none;
                margin-left: 222px !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df7870511"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df78cf701"] {
                --tve-alignment: center;
                float: none;
                margin-left: 232px !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-18330a1ae7f"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-18321985a99"] {
                --tve-alignment: left;
                float: left;
                z-index: 3;
                position: relative;
                margin: 402px auto 27px !important;
            }
            [data-css="tve-u-18321985a9d"] {
                margin-top: 0px;
                margin-left: -4.337px;
                width: 106% !important;
                max-width: none !important;
            }
            [data-css="tve-u-18321985a99"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-183ac19c63e"]::after {
                clear: both;
            }
            [data-css="tve-u-18321983c0f"] {
                margin-top: 455px !important;
            }
            [data-css="tve-u-17df769e533"] {
                margin-top: 373px !important;
            }
            [data-css="tve-u-1832616dd0b"] {
                margin-top: 135px !important;
                margin-bottom: 52px !important;
            }
            [data-css="tve-u-1831de7caeb"] {
                margin-top: 137px !important;
            }
            [data-css="tve-u-183c0bb0331"] {
                margin-left: 9px !important;
            }
        }

        @media (max-width: 767px) {
            [data-css="tve-u-16c239da3ea"] {
                padding: 0px !important;
                margin-bottom: 10px !important;
            }
            [data-css="tve-u-16c239dc0ca"] {
                padding: 0px !important;
            }
            [data-css="tve-u-16c239f72b3"] {
                padding-top: 0px !important;
                padding-bottom: 0px !important;
            }
            [data-css="tve-u-16c239fcb85"] {
                float: none;
                max-width: 312px;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            #tcb_landing_page h1 {
                font-size: 32px;
            }
            #tcb_landing_page h2 {
                font-size: 28px;
            }
            #tcb_landing_page h3 {
                font-size: 22px;
            }
            #tcb_landing_page h4 {
                font-size: 21px;
            }
            [data-css="tve-u-17df7983fdd"] {
                padding: 8px 20px 13px !important;
                margin-top: 4px !important;
            }
            [data-css="tve-u-17df7983fdf"] {
                min-height: 1px !important;
            }
            [data-css="tve-u-17df7983fe4"] {
                font-size: 16px;
                width: 16px;
                height: 16px;
                padding: 6px !important;
            }
            [data-css="tve-u-17df7983fe1"] {
                flex-wrap: nowrap !important;
            }
            [data-css="tve-u-17df7b687b5"] {
                min-height: 1px !important;
            }
            [data-css="tve-u-17df7b687b9"] {
                flex-wrap: nowrap !important;
            }
            [data-css="tve-u-17df7b687be"] {
                font-size: 16px;
                width: 16px;
                height: 16px;
                padding: 6px !important;
            }
            [data-css="tve-u-17df7b687ca"] {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
            [data-css="tve-u-17df7d10838"] {
                margin-top: 5px !important;
            }
            [data-css="tve-u-17df7d10832"] {
                --tve-countdown-size: 35px !important;
                --tve-countdown-label-size: 0.29 !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] .t-digit-part>span {
                padding: 17px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] {
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            [data-css="tve-u-17df7d10835"] {
                margin-top: 5px !important;
            }
            [data-css="tve-u-17df7d10837"] {
                --tve-font-size: 22px;
            }
            :not(#tve) [data-css="tve-u-17df7d10837"] .tcb-plain-text {
                font-size: var(--tve-font-size, 22px);
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] .t-digit-part>span {
                padding: 17px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] {
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            [data-css="tve-u-17df7d1083b"] {
                margin-top: 5px !important;
            }
            [data-css="tve-u-17df7d1083d"] {
                --tve-font-size: 22px;
            }
            :not(#tve) [data-css="tve-u-17df7d1083d"] .tcb-plain-text {
                font-size: var(--tve-font-size, 22px);
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] .t-digit-part>span {
                padding: 17px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] {
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            [data-css="tve-u-17df7d10840"] {
                margin-top: 5px !important;
            }
            [data-css="tve-u-17df7d10842"] {
                --tve-font-size: 22px;
            }
            :not(#tve) [data-css="tve-u-17df7d10842"] .tcb-plain-text {
                font-size: var(--tve-font-size, 22px);
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] .t-digit-part>span {
                padding: 17px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] {
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            [data-css="tve-u-17df7d10845"] {
                margin-top: 5px !important;
            }
            :not(#tve) [data-css="tve-u-17df7541f3d"] {
                font-size: 25px !important;
            }
            :not(#tve) [data-css="tve-u-181fc4925f4"] {
                font-size: 26px !important;
            }
            :not(#tve) [data-css="tve-u-181fc4956d5"] {
                font-size: 19px !important;
            }
            :not(#tve) [data-css="tve-u-181f977e3a7"] {
                font-size: 25px !important;
            }
            :not(#tve) [data-css="tve-u-181fc4a2dc1"] {
                font-size: 19px !important;
            }
            [data-css="tve-u-17df7b687c2"] {
                padding-top: 8px !important;
                padding-bottom: 8px !important;
            }
            :not(#tve) [data-css="tve-u-17df7c16d75"] {
                font-size: 32px !important;
            }
            [data-css="tve-u-17df7c16d75"] {
                line-height: 1.15em !important;
            }
            :not(#tve) [data-css="tve-u-1831be59e2b"] {
                font-size: 25px !important;
            }
            :not(#tve) [data-css="tve-u-18326c5db36"] {
                font-size: 25px !important;
            }
            [data-css="tve-u-1831de7caeb"] {
                margin-top: -20px !important;
            }
            [data-css="tve-u-17df769e533"] {
                padding-top: 373px !important;
                margin-top: -366px !important;
            }
            [data-css="tve-u-1831de80f0e"] {
                margin-top: 0px;
                margin-left: -21px;
            }
            [data-css="tve-u-18321983c0f"] {
                padding-bottom: 455px !important;
                margin-top: 1px !important;
            }
            [data-css="tve-u-1832197b0e6"] {
                margin-top: 0px;
                margin-left: 0px;
            }
            [data-css="tve-u-18321985a99"] {
                margin-top: -467px !important;
            }
            [data-css="tve-u-181fc3eda21"] {
                --tve-alignment: center;
                float: none;
                margin-left: 14px !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df7adf57e"] {
                width: 101px;
                --tve-alignment: right;
                float: right;
                z-index: 3;
                position: relative;
                margin-top: -47px !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-183ac1f2a87"] {
                margin-top: 0px;
                margin-left: -11.85px;
                width: 115% !important;
                max-width: none !important;
            }
            [data-css="tve-u-17df7adf57e"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-183309e5276"]::after {
                clear: both;
            }
            [data-css="tve-u-17df782bd4f"] {
                float: left;
                z-index: 3;
                position: relative;
                --tve-alignment: left;
                margin-left: 19px !important;
            }
            [data-css="tve-u-183309fb38e"]::after {
                clear: both;
            }
            [data-css="tve-u-17df78cf701"] {
                margin-left: 41px !important;
            }
            [data-css="tve-u-183c0bb0331"] {
                margin-left: 2px !important;
            }
        }
    </style>
    <style type="text/css" id="tve_head_custom_css" class="tve_user_custom_style">
        .thrv_text_element p {
            margin: 0;
        }

        .thrv_heading h1,
        h2,
        h3,
        h4,
        h5 {
            margin: 0;
        }
    </style><noscript></noscript>
    <style type="text/css">
        html {
            height: auto;
        }

        html.tcb-editor {
            overflow-y: initial;
        }

        body:before,
        body:after {
            height: 0 !important;
        }

        .thrv_page_section .out {
            max-width: none
        }

        .tve_wrap_all {
            position: relative;
        }

        /* Content Width - inherit Content Width directly from LP settings */

        .thrv-page-section[data-inherit-lp-settings="1"] .tve-page-section-in {
            max-width: 1080px !important;
            max-width: var(--page-section-max-width) !important;
        }

        body.tcb-full-header .thrv_header,
        body.tcb-full-footer .thrv_footer {
            width: 100vw;
            left: 50%;
            right: 50%;
            margin-left: -50vw !important;
            margin-right: -50vw !important;
        }
    </style>

</head>

<body class="home page-template-default page page-id-16 wp-embed-responsive tve_lp" style="" data-css="tve-u-15e09c94f7d">
    <div class="wrp cnt bSe" style="display: none">
        <div class="awr"></div>
    </div>
    <div class="tve_wrap_all" id="tcb_landing_page">
        <div class="tve_post_lp tve_lp_tcb2-bright-smart-sales-page tve_lp_template_wrapper" style="">
            <div id="tve_flt" class="tve_flt tcb-style-wrap">
                <div id="tve_editor" class="tve_shortcode_editor tar-main-content" data-post-id="16">
                    <div class="thrive-group-edit-config" style="display: none !important"></div>
                    <div class="thrv_wrapper thrv-page-section tve-height-update">
                        <div class="tve-page-section-out"></div>
                        <div class="tve-page-section-in" data-css="tve-u-17df68678d3" style="">
                            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                                <div class="tve-content-box-background" style="" data-css="tve-u-181f9781dc8"></div>
                                <div class="tve-cb">
                                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-18316bb6778" style="">
                                        <h1 class="" style="text-align: center;"><strong>Fluxactive™</strong>&nbsp;<strong><b>Get&nbsp;<font>$300 Off&nbsp;</font>Today Only&nbsp;</b></strong></h1>
                                        <h2 class="" style="text-align: center;"><strong><b>*</b><b><span style="color: rgb(239, 9, 9);" data-css="tve-u-1831be384e5">Limited Time Offer</span>*</b></strong></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
                        <div class="tve-page-section-out" style="" data-css="tve-u-181f95b9f04"></div>
                        <div class="tve-page-section-in" data-css="tve-u-1831bd057c9">
                            <div class="thrv_wrapper thrv_text_element">
                                <p><br></p>
                            </div>
                            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1047; --tve-border-width:1px;" data-css="tve-u-17df7cd1493">
                                <div class="tcb-flex-row v-2 tcb-resized tcb--cols--2" style="" data-css="tve-u-1831bd1a541">
                                    <div class="tcb-flex-col" data-css="tve-u-181f94d8ad8" style="">
                                        <div class="tcb-col" style="" data-css="tve-u-18316fc0453">
                                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df6c322cc" style=""><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/10/images-removebg-preview.webp" class="tve_image entered litespeed-loaded wp-image-170" alt="Fluxactive" data-id="170" width="464" data-init-width="258" height="351" data-init-height="195" title="images-removebg-preview" data-src="https://flux-active.info/wp-content/uploads/2022/09/introducting_prodentim-1.png" data-width="464" data-height="351" style="" ml-d="-70" data-css="tve-u-181f94eaf7c" data-ll-status="loaded" loading="lazy" center-h-d="true"><noscript><img decoding="async" class="tve_image wp-image-76" alt="" data-id="76" width="451" data-init-width="700" height="385" data-init-height="597" title="introducting_prodentim (1)" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/introducting_prodentim-1.png" data-width="451" data-height="385" style="" ml-d="-3.512999999999977" data-css="tve-u-181f94eaf7c"></noscript></span></div>
                                            <div
                                                class="thrv_wrapper tve_image_caption" data-css="tve-u-17df6c5c786" style=""><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/certifications.png" class="tve_image entered litespeed-loaded wp-image-21" alt="Fluxactive" data-id="21" width="431" data-init-width="1761" height="73" data-init-height="297" title="certifications" data-src="https://flux-active.info/wp-content/uploads/2022/09/certifications.png" data-width="431" data-height="73" data-ll-status="loaded" loading="lazy" style="" ml-d="0" data-css="tve-u-1831bc944da" center-h-d="false" mt-d="-1.1375000000000028" srcset="https://flux-active.info/wp-content/uploads/2022/09/certifications.png 1761w, https://flux-active.info/wp-content/uploads/2022/09/certifications-300x51.png 300w, https://flux-active.info/wp-content/uploads/2022/09/certifications-1024x173.png 1024w, https://flux-active.info/wp-content/uploads/2022/09/certifications-768x130.png 768w" sizes="(max-width: 431px) 100vw, 431px" /><noscript><img decoding="async" class="tve_image wp-image-46" alt="" data-id="46" width="430" data-init-width="1761" height="72" data-init-height="297" title="certifications" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/certifications.png" data-width="430" data-height="72"></noscript></span></div>
                                        <div
                                            class="thrv_wrapper thrv_text_element" style="--tve-border-width:5px; border: 5px solid rgb(0, 0, 0) !important;" data-css="tve-u-17df6d14b04">
                                            <p data-css="tve-u-18316e8ca9a" style="text-align: center;"><strong><font>Order now TODAY And Save Up To</font></strong></p>
                                            <p data-css="tve-u-181fbdc49f4" style="text-align: center;"><em>$300! Save Over 50%!</em></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tcb-flex-col" data-css="tve-u-181f94d8bf3" style="">
                                <div class="tcb-col" data-css="tve-u-18317018e68" style="">
                                    <div class="thrv_wrapper thrv_text_element">
                                        <h2 data-css="tve-u-18316e1d284" style="text-align: center;" class=""><br></h2>
                                        <p><br></p>
                                        <h2 class="" style="" data-css="tve-u-1831bc47d99">
                                            <font><strong><span style="text-decoration: underline; color: rgb(234, 11, 11);" data-css="tve-u-18316e4c379">Fluxactive</span></strong></font>
                                            <font><strong><span style="color: rgb(246, 11, 11);" data-css="tve-u-1831bb8ad86">™</span></strong> <span data-css="tve-u-1831be2b516" style="font-size: 25px;">This is a type of supplement that helps you in removing all kinds of problems related to urine like a friend.<br>Fluxective will be your one-of-a-kind friend Allows you to get instant relief from your</span>
                                                <span
                                                    data-css="tve-u-1831bc4450f" style="font-size: 26px;"> troubles.</span>
                                            </font>
                                        </h2>
                                        <h3 style="text-align: center;" class="" data-css="tve-u-1831bc7a016">
                                            <font><span data-css="tve-u-18316e728a6">Formula is easy to take daily<br>natural material is used<br>You will see its effect soon and only.</span><span data-css="tve-u-18316d8a064"><br></span></font>
                                        </h3>
                                    </div>
                                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box" style="" data-css="tve-u-17df6d106a6">
                                        <p data-css="tve-u-181fbda6572" style="text-align: left;"><a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;"><b>Fluxactive</b></a>&nbsp;is a unique blend of&nbsp;<b>3.5 billion</b> probiotic strains and nutrients backed by clinical
                                            research.</p>
                                    </div>
                                    <div class="tcb-clear" data-css="tve-u-1831b9a3242">
                                        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df6cb9b12" style="padding: 0px !important;">
                                            <p data-css="tve-u-17df6c96cd1" style="text-align: center;"><span style="font-weight: normal; color: rgb(11, 0, 0);" data-css="tve-u-1831bdb69af">Try <b>Fluxactive Official</b> For Over </span><span data-css="tve-u-1831bdb69b3" style="color: rgb(244, 24, 24);"><span data-css="tve-u-1831700a2ae"><strong class=""><span style="font-size: 29px;" data-css="tve-u-1831bde5421">50%</span>                                                OFF</strong>
                                                </span>
                                                </span><span data-css="tve-u-1831bdb69b5" style="font-weight: normal;"><span style="color: rgb(244, 24, 24);" data-css="tve-u-1831bdb69b8">&nbsp;</span></span><span data-css="tve-u-1831bdb69b5"><span data-css="tve-u-1831bdb69b8" style="color: rgb(244, 24, 24);"><strong>Today</strong></span></span><strong><span data-css="tve-u-1831bdb69b5">!</span></strong></p>
                                        </div>
                                    </div>
                                    <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df6d1a678">
                                        <p data-css="tve-u-17df6cdc103" style="text-align: center;">Only for: $49/per bottle</p>
                                    </div>
                                    <div class="thrv_wrapper tve_image_caption img_style_lifted_style2 tve_ea_thrive_animation tve_anim_grow" data-css="tve-u-17df6ce4bc2" style=""><span class="tve_image_frame" style=""><a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" rel="" title="BUY NOW" class="thirstylinkimg" target="" data-linkid="242" data-nojs="false"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/buy-now2.png" class="tve_image entered litespeed-loaded tcb-moved-image tve_evt_manager_listen tve_et_tve-viewport wp-image-22" alt="Fluxactive" data-id="22" width="357" data-init-width="957" height="122" data-init-height="327" title="buy-now2" data-src="https://flux-active.info/wp-content/uploads/2022/09/buy-now2.png" data-width="357" data-height="122" mt-d="-4.8870000000000005" style="" data-css="tve-u-17df6cef5e2" data-link-wrap="true" data-ll-status="loaded" loading="lazy" ml-d="0" data-tcb-events="__TCB_EVENT_[{&quot;t&quot;:&quot;tve-viewport&quot;,&quot;config&quot;:{&quot;anim&quot;:&quot;grow&quot;,&quot;loop&quot;:0},&quot;a&quot;:&quot;thrive_animation&quot;}]_TNEVE_BCT__" srcset="https://flux-active.info/wp-content/uploads/2022/09/buy-now2.png 957w, https://flux-active.info/wp-content/uploads/2022/09/buy-now2-300x103.png 300w, https://flux-active.info/wp-content/uploads/2022/09/buy-now2-768x262.png 768w" sizes="(max-width: 357px) 100vw, 357px" /></a><noscript><img decoding="async" class="tve_image wp-image-47" alt="" data-id="47" width="411" data-init-width="957" height="140" data-init-height="327" title="buy-now2" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/buy-now2.png" data-width="411" data-height="140" mt-d="-1" style="" data-css="tve-u-17df6cef5e2" data-link-wrap="true"></noscript></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
                <div class="tve-page-section-out"></div>
                <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-181fbe2f76b">
                    <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df7550836">
                        <p data-css="tve-u-1831be59e2b" style="text-align: center;">Genuine <b><b>Fluxactive &nbsp;Official</b></b> Users<br>Genuine Changing Results</p>
                        <p data-css="tve-u-17df7541f3d" style="text-align: center;">They Ordered Fluxactive and Are Happy They Did!You Can\'t Fake These.</p>
                    </div>
                    <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1106; --tve-border-width:1px; border: 1px solid rgb(0, 0, 0);" data-css="tve-u-17df75f8362">
                        <div class="tcb-flex-row v-2 tcb--cols--3" style="" data-css="tve-u-17df760986d">
                            <div class="tcb-flex-col" data-css="tve-u-17df75f5d6d" style="">
                                <div class="tcb-col">
                                    <div class="thrv_wrapper tve_image_caption img_style_circle" data-css="tve-u-17df7583505" style=""><span class="tve_image_frame"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/testi-2.jpg" class="tve_image entered litespeed-loaded wp-image-25" alt="Fluxactive" data-id="25" width="199" data-init-width="250" height="199" data-init-height="250" title="testi-2" data-src="https://flux-active.info/wp-content/uploads/2022/09/testi-1.jpg" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style="" data-ll-status="loaded" loading="lazy" srcset="https://flux-active.info/wp-content/uploads/2022/09/testi-2.jpg 250w, https://flux-active.info/wp-content/uploads/2022/09/testi-2-150x150.jpg 150w" sizes="(max-width: 199px) 100vw, 199px" /><noscript><img decoding="async" class="tve_image wp-image-224" alt="" data-id="224" width="199" data-init-width="250" height="199" data-init-height="250" title="testi 1" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/testi-1.jpg" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style=""></noscript></span></div>
                                    <div
                                        class="thrv_wrapper tve_image_caption" data-css="tve-u-17df757042e" style=""><span class="tve_image_frame"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/star.png" class="tve_image wp-image-227 entered litespeed-loaded" alt="protetox official" data-id="227" width="264" data-init-width="920" height="49" data-init-height="171" title="star" data-src="https://flux-active.info/wp-content/uploads/2022/09/star.png" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1" data-ll-status="loaded" loading="lazy"><noscript><img decoding="async" class="tve_image wp-image-227" alt="" data-id="227" width="264" data-init-width="920" height="49" data-init-height="171" title="star" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/star.png" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1"></noscript></span></div>
                                <div
                                    class="thrv_wrapper thrv_text_element">
                                    <p data-css="tve-u-17df75a96db" style="text-align: center;">Verified Purchase</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df75bd532" style="">
                                <p data-css="tve-u-181fbe2f6da" style="text-align: center;">Sounds great, and we\'re also benefiting from Fluxactive!</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df75bfb28" style="">
                                <p style="text-align: center;" data-css="tve-u-182b0d84b5e">"This product is really amazing, I am 61 years old and I have been taking it for only 10 days and I feel great, I was upset for a long time, I have benefited a lot from it, for a while now Have seen such a good effect,
                                    I have now made a very good decision by adding it to my life, you too can enjoy your life the same way as before, as I am taking it for that today <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank">Fluxactive</a> your
                                    life include in."</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element">
                                <p data-css="tve-u-181fbe3342b" style="text-align: center;"><b>Will Perkins</b> - Dallas, USA</p>
                            </div>
                        </div>
                    </div>
                    <div class="tcb-flex-col" data-css="tve-u-18203476af4" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper tve_image_caption img_style_circle" data-css="tve-u-18330e41b69" style=""><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/pexels-photo-3831612.webp" class="tve_image entered litespeed-loaded wp-image-148" alt="Fluxactive" data-id="148" width="199" data-init-width="600" height="258" data-init-height="779" title="pexels-photo-3831612" data-src="https://flux-active.info/wp-content/uploads/2022/09/testi-2.jpg" data-width="199" data-height="258" data-css="tve-u-18330e41b6e" style="" data-ll-status="loaded" loading="lazy" ml-d="-0.6750000000000114" center-h-d="false" mt-d="-36" center-v-d="false" srcset="https://flux-active.info/wp-content/uploads/2022/09/pexels-photo-3831612.webp 600w, https://flux-active.info/wp-content/uploads/2022/09/pexels-photo-3831612-231x300.webp 231w" sizes="(max-width: 199px) 100vw, 199px" /><noscript><img decoding="async" class="tve_image wp-image-225" alt="" data-id="225" width="199" data-init-width="250" height="199" data-init-height="250" title="testi 2" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/testi-2.jpg" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style=""></noscript></span></div>
                            <div
                                class="thrv_wrapper tve_image_caption" data-css="tve-u-17df757042e" style=""><span class="tve_image_frame"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/star.png" class="tve_image wp-image-227 entered litespeed-loaded" alt="protetox official" data-id="227" width="264" data-init-width="920" height="49" data-init-height="171" title="star" data-src="https://flux-active.info/wp-content/uploads/2022/09/star.png" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1" data-ll-status="loaded" loading="lazy"><noscript><img decoding="async" class="tve_image wp-image-227" alt="" data-id="227" width="264" data-init-width="920" height="49" data-init-height="171" title="star" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/star.png" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1"></noscript></span></div>
                        <div
                            class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df75a96db" style="text-align: center;">Verified Purchase</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df75bd532" style="">
                        <p data-css="tve-u-181fbe30a2b" style="text-align: center;">You can\'t force the difference in my body...</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df75bfb28" style="">
                        <p style="text-align: center;" data-css="tve-u-182b0d87083">"Ever since I have included <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a> in my life, since then my every morning is good, every evening is good, now my every day has
                            become better, my girlfriend gave me this as a gift as she included in my life Having filled my life with happiness, today B has changed my life once in the same way by giving me this gift"</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-181fbe34924" style="text-align: center;">Portia Thompson - Florida, USA</p>
                    </div>
                </div>
            </div>
            <div class="tcb-flex-col">
                <div class="tcb-col">
                    <div class="thrv_wrapper tve_image_caption img_style_circle" data-css="tve-u-18330e4773d" style=""><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/pexels-photo-3877565.webp" class="tve_image entered litespeed-loaded wp-image-149" alt="Fluxactive" data-id="149" width="221" data-init-width="600" height="332" data-init-height="900" title="pexels-photo-3877565" data-src="https://flux-active.info/wp-content/uploads/2022/09/testi-3.jpg" data-width="221" data-height="332" data-css="tve-u-18330e47743" style="" data-ll-status="loaded" loading="lazy" ml-d="0" center-h-d="true" mt-d="-56" center-v-d="false" srcset="https://flux-active.info/wp-content/uploads/2022/09/pexels-photo-3877565.webp 600w, https://flux-active.info/wp-content/uploads/2022/09/pexels-photo-3877565-200x300.webp 200w" sizes="(max-width: 221px) 100vw, 221px" /><noscript><img decoding="async" class="tve_image wp-image-226" alt="" data-id="226" width="199" data-init-width="250" height="199" data-init-height="250" title="testi 3" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/testi-3.jpg" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style=""></noscript></span></div>
                    <div
                        class="thrv_wrapper tve_image_caption" data-css="tve-u-17df757042e" style=""><span class="tve_image_frame"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/star.png" class="tve_image wp-image-227 entered litespeed-loaded" alt="protetox official" data-id="227" width="264" data-init-width="920" height="49" data-init-height="171" title="star" data-src="https://flux-active.info/wp-content/uploads/2022/09/star.png" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1" data-ll-status="loaded" loading="lazy"><noscript><img decoding="async" class="tve_image wp-image-227" alt="" data-id="227" width="264" data-init-width="920" height="49" data-init-height="171" title="star" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/star.png" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1"></noscript></span></div>
                <div
                    class="thrv_wrapper thrv_text_element">
                    <p data-css="tve-u-17df75a96db" style="text-align: center;">Verified Purchase</p>
            </div>
            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df75bd532" style="">
                <p data-css="tve-u-17df75ae21a" style="text-align: center;">i got my life back</p>
            </div>
            <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df75bfb28" style="">
                <p style="text-align: center;" data-css="tve-u-182b0d88708">“I\'ve got my life back once again, I once felt like I wouldn\'t be able to get better, but as soon as I started using <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a>, my life
                    was like it was before. Yes, I take Rat and all my worries go away, I have got freedom of life back with this product, earlier I had to think before eating or drinking anything that now I enjoy eating things first. as soon as i started
                    taking!"</p>
            </div>
            <div class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df75b2b14" style="text-align: center;"><b>Theo Franklin</b> - Chicago, USA</p>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1" data-css="tve-u-17df768fade" style="">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df766ae75"></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-181fbe6f460">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df766da38">
                <p data-css="tve-u-17df7672e13" style="text-align: center;">Proven By Thousands</p>
            </div>
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1107;" data-css="tve-u-17df7680f08">
                <div class="tcb-flex-row v-2 tcb--cols--3" data-css="tve-u-17df768c421" style="">
                    <div class="tcb-flex-col" data-css="tve-u-181fbe43098" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7641da5"><span class="tve_image_frame"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/image1.png" class="tve_image entered litespeed-loaded wp-image-27" alt="Fluxactive" data-id="27" width="144" data-init-width="144" height="144" data-init-height="144" title="image1" data-src="https://flux-active.info/wp-content/uploads/2022/09/image1.png" data-width="144" data-height="144" data-ll-status="loaded" loading="lazy"><noscript><img decoding="async" class="tve_image wp-image-229" alt="" data-id="229" width="144" data-init-width="144" height="144" data-init-height="144" title="image1" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/image1.png" data-width="144" data-height="144"></noscript></span></div>
                            <div
                                class="thrv_wrapper thrv_text_element">
                                <p data-css="tve-u-182b0d8e0c6" style="text-align: center;"><strong><span data-css="tve-u-17df767794b" style="color: rgb(50, 153, 53);">Made In The USA</span></strong></p>
                                <p data-css="tve-u-182b0d8e0c6" style="text-align: center;"><span style="color: rgb(0, 101, 104);" data-css="tve-u-17df767794e"><b>Fluxactive &nbsp;Official</b> supplement is manufactured in a US-based facility.</span></p>
                        </div>
                    </div>
                </div>
                <div class="tcb-flex-col" data-css="tve-u-181fbe3b3eb" style="">
                    <div class="tcb-col">
                        <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7641da5"><span class="tve_image_frame"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/image-2.png" class="tve_image entered litespeed-loaded wp-image-28" alt="Fluxactive" data-id="28" width="144" data-init-width="144" height="144" data-init-height="144" title="image-2" data-src="https://flux-active.info/wp-content/uploads/2022/09/image-2.png" data-width="144" data-height="144" data-ll-status="loaded" loading="lazy"><noscript><img decoding="async" class="tve_image wp-image-230" alt="" data-id="230" width="144" data-init-width="144" height="144" data-init-height="144" title="image 2" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/image-2.png" data-width="144" data-height="144"></noscript></span></div>
                        <div
                            class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic">
                            <p data-css="tve-u-182b0d8fb02" style="text-align: center;"><span data-css="tve-u-181fbe6aea9" style="color: rgb(50, 153, 53);"><strong class="">100% All Natural</strong></span><span data-css="tve-u-17df767a779" style="color: var(--tcb-color-2);"><br></span><span data-css="tve-u-17df767a77d"
                                    style="color: rgb(0, 101, 104);"><a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-1833122de0c">Fluxactive</a><b>&nbsp;</b>All ingredients are pure, natural, and carefully sourced.</span></p>
                    </div>
                </div>
            </div>
            <div class="tcb-flex-col" data-css="tve-u-1832862d935" style="">
                <div class="tcb-col">
                    <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7641da5"><span class="tve_image_frame"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/image3.png" class="tve_image entered litespeed-loaded wp-image-29" alt="Fluxactive" data-id="29" width="144" data-init-width="144" height="144" data-init-height="144" title="image3" data-src="https://flux-active.info/wp-content/uploads/2022/09/image3.png" data-width="144" data-height="144" data-ll-status="loaded" loading="lazy"><noscript><img decoding="async" class="tve_image wp-image-231" alt="" data-id="231" width="144" data-init-width="144" height="144" data-init-height="144" title="image3" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/image3.png" data-width="144" data-height="144"></noscript></span></div>
                    <div
                        class="thrv_wrapper thrv_text_element">
                        <p style="text-align: center; color: rgb(50, 153, 53) !important; --tcb-applied-color:rgb(50, 153, 53)  !important;" data-css="tve-u-182b0d91083"><strong><span data-css="tve-u-181fbe6e917" style="color: rgb(50, 153, 53);">FDA Approved Facility</span><span data-css="tve-u-17df767cd49" style="color: var(--tcb-color-2);"><br></span></strong><span data-css="tve-u-17df764e53c"
                                style="color: rgb(0, 101, 104);"><b>Fluxactive</b> is manufactured according to the latest standards.</span></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-1831c36f668">
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1047; --tve-border-width:1px; border: 1px solid rgb(0, 0, 0);" data-css="tve-u-17df76b71ca">
                <div class="tcb-flex-row v-2 tcb--cols--2 tcb-resized">
                    <div class="tcb-flex-col" data-css="tve-u-1831de7e5ac" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper tve_image_caption tve_ea_thrive_zoom" data-css="tve-u-1831de7caeb" style=""><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1.webp" class="tve_image entered litespeed-loaded wp-image-173 tve_evt_manager_listen tve_et_click" alt="Fluxactive" data-id="173" width="492" data-init-width="1500" height="492" data-init-height="1500" title="71qYSrPK6LL._SL1500_" data-src="https://flux-active.info/wp-content/uploads/2022/09/introducting_prodentim-1.png" data-width="492" data-height="492" data-ll-status="loaded" loading="lazy" data-css="tve-u-1831de7cb07" style="" mt-d="0" ml-d="-37" center-h-d="false" data-tcb-events="__TCB_EVENT_[{&quot;t&quot;:&quot;click&quot;,&quot;a&quot;:&quot;thrive_zoom&quot;,&quot;config&quot;:{&quot;id&quot;:&quot;173&quot;,&quot;size&quot;:&quot;full&quot;}}]_TNEVE_BCT__" srcset="https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1.webp 1500w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-300x300.webp 300w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-1024x1024.webp 1024w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-150x150.webp 150w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-768x768.webp 768w" sizes="(max-width: 492px) 100vw, 492px" /><noscript><img decoding="async" class="tve_image wp-image-76" alt="" data-id="76" width="349" data-init-width="700" height="298" data-init-height="597" title="introducting_prodentim (1)" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/introducting_prodentim-1.png" data-width="349" data-height="298"></noscript></span></div>
                            <div
                                class="thrv_wrapper tve_image_caption" data-css="tve-u-17df769e533" style=""><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/download.jpg" class="tve_image entered litespeed-loaded wp-image-72" alt="Fluxactive" data-id="72" width="440" data-init-width="300" height="247" data-init-height="168" title="download" data-src="https://flux-active.info/wp-content/uploads/2022/09/prodentim-strawberry.png" data-width="440" data-height="247" data-ll-status="loaded" loading="lazy" data-css="tve-u-1831de80f0e" style="" ml-d="-20.013000000000034" center-h-d="false" mt-d="0" ml-m="-21" center-h-m="false"><noscript><img decoding="async" class="tve_image wp-image-54" alt="" data-id="54" width="349" data-init-width="1047" height="281" data-init-height="843" title="prodentim-strawberry" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/prodentim-strawberry.png" data-width="349" data-height="281"></noscript></span></div>
                        <div

                    <div
                        class="tcb-clear" data-css="tve-u-183ac19c63e">
                        <div class="thrv_wrapper tve_image_caption" data-css="tve-u-18321985a99" style="margin-bottom: 27px !important;"><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/fluxactive-prostate-wellness-happy.jpeg" class="tve_image entered litespeed-loaded wp-image-82" alt="Fluxactive" data-id="82" width="516" data-init-width="617" height="367" data-init-height="439" title="fluxactive-prostate-wellness-happy" data-src="https://flux-active.info/wp-content/uploads/2022/09/prodentim-strawberry.png" data-width="516" data-height="367" data-ll-status="loaded" loading="lazy" data-css="tve-u-18321985a9d" style="" ml-d="-20.013000000000034" center-h-d="false" mt-d="0" ml-t="-4.336999999999989" mt-t="0" srcset="https://flux-active.info/wp-content/uploads/2022/09/fluxactive-prostate-wellness-happy.jpeg 617w, https://flux-active.info/wp-content/uploads/2022/09/fluxactive-prostate-wellness-happy-300x213.jpeg 300w" sizes="(max-width: 516px) 100vw, 516px" /><noscript><img decoding="async" class="tve_image wp-image-54" alt="" data-id="54" width="349" data-init-width="1047" height="281" data-init-height="843" title="prodentim-strawberry" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/prodentim-strawberry.png" data-width="349" data-height="281"></noscript></span></div>
                </div>
            </div>
        </div>
        <div class="tcb-flex-col" data-css="tve-u-1831dfa578e" style="">
            <div class="tcb-col">
                <div class="thrv_wrapper thrv_text_element">
                    <h2 class="" style="text-align: left;">What is Fluxactive?</h2>
                </div>
                <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic">
                    <p data-css="tve-u-1831c3676d8" dir="ltr" style="text-align: justify;"><span style="font-size: 21px;" data-css="tve-u-1831c3676f0">The dietary supplement known as Fluxactive Complete is <b>designed to help maintain prostate health</b>. It is appropriate for the health of the bladder as well as the reproductive system as a whole.</span></p>
                    <p
                        data-css="tve-u-1831c3676e3" dir="ltr" style="text-align: justify;"><span data-css="tve-u-1831dfa0835" style="font-size: 21px;">It acts as a nutritious diet for the elderly. Most men develop prostate issues as they get older.<br>For the elderly, it helps like a true friend, because as the age grows, many diseases catch in the body of the person, the elderly also have a big problem of urine, they have to go to the bathroom again and again. Yes, that\'s how it works as a flux. Contains all bladder problems.<br>Fluxactive Complete is a health supplement for men that supports prostate health, helps with hormonal imbalances, assists with bladder control issues, improves sexual performance, fertility and reduces oxidative stress.<br>This many prostate issues are labeled as benign prostate BPH or hyperplasia.</span></p>
                        <p
                            data-css="tve-u-1831dfa92e9" dir="ltr" style="text-align: justify;"><strong><span data-css="tve-u-1831dfa3620" style="font-size: 36px;">How is Fluxactive Different from More Supplements?</span></strong><span data-css="tve-u-1832157f4c1" style="font-size: 21px;"><br><a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a> Complete contains only natural ingredients. It is non-GMO, gluten-free, and </span>
                            <a
                                href="https://purehealthyliving.com/blog/what-does-it-mean-to-be-vegan-friendly-a-guide-to-vegan-friendly-foods-and-products" target="_blank" class="tve-froala" style="outline: none;"><span data-css="tve-u-1832157f4c1" style="font-size: 21px;">vegan-friendly</span></a><span data-css="tve-u-1832157f4c1" style="font-size: 21px;">. Unlike many other supplements, <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a> Complete does not contain any additives, preservatives, or chemicals. It is 100 percent clean and pure.</span></p>
                                <ul
                                    class="">
                                    <li class="" data-css="tve-u-1832158b273" dir="ltr" style="text-align: justify;"><span data-css="tve-u-1832162ca24" style="font-size: 28px;"><strong class="">&nbsp; &nbsp;**</strong></span><span data-css="tve-u-1832162ca28" style="font-size: 21px;"><strong class="">Quality Ingredients of Fluxactive**;</strong></span></li>
                                    <li
                                        class="" data-css="tve-u-1831c3676e3" dir="ltr" style="text-align: justify;">Formulated with an exclusive health-intensive team of experts, Fluxactive contains all the vitamins, minerals and natural herbs needed to protect your prostate and promote normal flow.</li>
                                        </ul>
                                        <p data-css="tve-u-182b0d94b51" dir="ltr" style="text-align: justify;"><br></p>
                                        <ul class="">
                                            <li class="" data-css="tve-u-1832166b712" dir="ltr" style="text-align: justify;"><span data-css="tve-u-1832166808b" style="font-size: 21px;"><strong class=""><span data-css="tve-u-1832166808e" style="color: rgb(241, 12, 12);"><span data-css="tve-u-1832157f4c5"><strong class="">&nbsp; &nbsp;**</strong></span></span>
                                                </strong>
                                                </span><span data-css="tve-u-18321668097"><strong><span data-css="tve-u-1832166809a"><span data-css="tve-u-1831dfa083e"><strong>Source Of Origin Fluxactive**;</strong></span></span>
                                                </strong>
                                                </span>
                                            </li>
                                            <li class="" data-css="tve-u-1831c3676e3" dir="ltr" style="text-align: justify;"><a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a> is an oral dietary supplement that promises to combat prostate problems and restore confidence. If
                                                this material is bought from a good place, then its quality is also considered good.</li>
                                            <li class="" data-css="tve-u-1831c3676e3" dir="ltr" style="text-align: justify;"><span data-css="tve-u-18321668097"><strong><span data-css="tve-u-1832166809a"><span data-css="tve-u-1831dfa083e"><strong><span data-css="tve-u-1832162ca24"><strong>**</strong></span><span data-css="tve-u-1832162ca28"><strong>Fluxactive\'s Extraction Process**:</strong></span></strong>
                                                </span>
                                                </span>
                                                </strong>
                                                </span>
                                            </li>
                                            <li class="" data-css="tve-u-1831c3676e3" dir="ltr" style="text-align: justify;">The method of processing the ingredients and extracting the ingredients is very important in the making of a good supplement.</li>
                                            <li class="" data-css="tve-u-1831c3676e3" dir="ltr" style="text-align: left;"><strong><span data-css="tve-u-1832166809a"><span data-css="tve-u-1831dfa083e"><strong><span data-css="tve-u-1832162ca24"><strong>**Ratio**:</strong></span>
                                                </strong>
                                                </span>
                                                </span>
                                                </strong>
                                            </li>
                                            <li class="" data-css="tve-u-1831c3676e3" dir="ltr" style="text-align: justify;">Experts believe that if a single formula contains thousands of ingredients, it cannot be said completely whether it will be an effective product or not, on the contrary, it will have advantages or disadvantages,
                                                in the end, the ratio is a proportion of the composition of a supplement formulation. Although there is a high demand for <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a>                                                products, the right amount of ingredients also play an important role in the effectiveness of a health supplement.</li>
                                        </ul>
                                        <p data-css="tve-u-182b0d94b51" dir="ltr" style="text-align: justify;"><br></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1" data-css="tve-u-17df76ddbf0" style="">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-181f9702c6a">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-181fbea6db1">
                <h2 class="" style="text-align: center;" data-css="tve-u-182b06f97df"><strong>What happens when you take the Fluxactive supplement?</strong></h2>
            </div>
            <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic">
                <ul class="">
                    <li class="" data-css="tve-u-182b02e16fd" dir="ltr" style="">Fluxactive Complete works by enhancing blood flow, nutrient absorption and oxygen utilization. It helps to reduce inflammation, which is a contributing factor to BPH and is a common symptom of many diseases. The <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359"
                            target="_blank">Fluxactive</a> Complete formula contains organic ingredients that support the prostate by balancing hormones.</li>
                    <li class="" data-css="tve-u-182b02e1704" dir="ltr" style="">Fluxactive also benefits vaginal conditions The benefits of Fluxactive include better sleep, bladder control, prevention of frequent bladder infections and normal growth.</li>
                    <li class="" data-css="tve-u-182b02e1707" dir="ltr" style="">Daily use of <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a> tries to gradually correct whatever hormones are not right in your body, in this supplement there is no chemical
                        element added which can harm your body.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1" data-css="tve-u-17df77a9ce8" style="">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in" data-css="tve-u-181fbe95333">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df76f957e">
                <h2 class="" style="text-align: center;" data-css="tve-u-182b06f27c3"><span style="" data-css="tve-u-17df76fbc57">Pros of Fluxactive &nbsp;Official&nbsp;</span></h2>
            </div>
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1047;" data-css="tve-u-17df7764468">
                <div class="tcb-flex-row v-2 tcb--cols--2">
                    <div class="tcb-flex-col c-33" data-css="tve-u-18331277269" style="">
                        <div class="tcb-col" style="" data-css="tve-u-183260f4bb8">
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-1832616dd0b" style="margin-bottom: 52px !important;"><span class="tve_image_frame" style=""><img decoding="async" class="tve_image wp-image-99" alt="Fluxactive" data-id="99" width="353" data-init-width="500" height="353" data-init-height="500" title="Fluxactive" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20353%20353\'%3E%3C/svg%3E" data-width="353" data-height="353" style="" mt-d="-0.03699999999997772" ml-d="-1" data-css="tve-u-183261745c5" center-h-d="false" data-lazy-srcset="https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview.png 500w, https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview-300x300.png 300w, https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview-150x150.png 150w" data-lazy-sizes="(max-width: 353px) 100vw, 353px" data-lazy-src="https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview.png" /><noscript><img decoding="async" class="tve_image wp-image-99" alt="Fluxactive" data-id="99" width="353" data-init-width="500" height="353" data-init-height="500" title="Fluxactive" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview.png" data-width="353" data-height="353" style="" mt-d="-0.03699999999997772" ml-d="-1" data-css="tve-u-183261745c5" center-h-d="false" srcset="https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview.png 500w, https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview-300x300.png 300w, https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview-150x150.png 150w" sizes="(max-width: 353px) 100vw, 353px" /></noscript></span></div>
                        </div>
                    </div>
                    <div class="tcb-flex-col c-66" data-css="tve-u-181f9713464" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-182b0712169" style="">
                                <h3 class="" style="text-align: center;" data-css="tve-u-182b07180b7"><b>Pros</b></h3>
                            </div>
                            <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df774d63d" style="">
                                <p data-css="tve-u-182b083d063">*All its ingredients are natural.<br>*It has no side effects.<br>* It is certified by FDA and GMP.<br>* It helps with vitality and energy levels in your body.<br>* It is designed under the direction of well trained experts.<br>*
                                    <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a> is made in the USA in a GMP-certified plant. To ensure &nbsp; &nbsp; &nbsp; &nbsp;high-quality products, the
                                    production process of <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a> is also . * It works like a good friend for the elderly.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df7aeaf7a"></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-183269bc17b">
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1047;">
                <div class="tcb-flex-row v-2 tcb--cols--2">
                    <div class="tcb-flex-col c-33">
                        <div class="tcb-col" style="margin-bottom: -34px !important;" data-css="tve-u-183309ed9c8">
                            <div class="tcb-clear" data-css="tve-u-183309e5276">
                                <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7adf57e" style="margin-bottom: -106px !important;"><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/guarantee_badge.png" class="tve_image entered litespeed-loaded wp-image-39" alt="Fluxactive" data-id="39" width="300" data-init-width="612" height="300" data-init-height="612" title="guarantee_badge" data-src="https://flux-active.info/wp-content/uploads/2022/09/guarantee_badge.png" data-width="300" data-height="300" data-ll-status="loaded" loading="lazy" style="" data-css="tve-u-183ac1f2a87" ml-m="-11.849999999999994" mt-m="0" center-h-m="false" srcset="https://flux-active.info/wp-content/uploads/2022/09/guarantee_badge.png 612w, https://flux-active.info/wp-content/uploads/2022/09/guarantee_badge-300x300.png 300w, https://flux-active.info/wp-content/uploads/2022/09/guarantee_badge-150x150.png 150w" sizes="(max-width: 300px) 100vw, 300px" /><noscript><img decoding="async" class="tve_image wp-image-69" alt="" data-id="69" width="300" data-init-width="612" height="300" data-init-height="612" title="guarantee_badge" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/guarantee_badge.png" data-width="300" data-height="300"></noscript></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="tcb-flex-col c-66" data-css="tve-u-182b48d03af" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7b15cce" style="">
                                <p data-css="tve-u-17df7af8171" style="text-align: left; color: var(--tcb-color-0)  !important; --tcb-applied-color:var$(--tcb-color-0)  !important;"><span style="font-size: 39px;" data-css="tve-u-183269b197f">Fluxactive</span>™ Prostate Supplement</p>
                                <p data-css="tve-u-183269e65c6" style="text-align: left; color: var(--tcb-color-0)  !important; --tcb-applied-color:var$(--tcb-color-0)  !important;"><span style="font-size: 40px;" data-css="tve-u-183269bb778">100% Satisfaction</span><br><span style="text-shadow: rgba(54, 110, 6, 0.98) 2px 2px 2px; color: rgba(27, 2, 2, 0.96);" data-css="tve-u-18326a0c398">60-Day Money Back Guarantee</span></p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic">
                                <p data-css="tve-u-17df7b06854" style="text-align: left;">With <a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" target="_blank" class="tve-froala" style="outline: none;">Fluxactive</a>™ you want to know whether it\'s good for your body or not, which is why your purchase today is protected by
                                    a 60 day money back guarantee. So you can try the supplement for the next 60 days.<br>If you feel like your body isn\'t working, just send us an email or call us, and we\'ll return the product (or empty bottles) to you
                                    within 48 hours of returning it at our facility. no questions asked.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df77c0518" data-ct-name="Torn Paper 02" data-ct="fancydivider-38674" data-element-name="Fancy divider"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 72" data-position="bottom" data-ct="38674" decoration-type="Torn Paper 02" class="svg-shape-bottom" width="100%" preserveAspectRatio="none" data-css="tve-u-181fc23a99d" style=""><defs><style>.p181fc23a959{opacity:0.15;}.p181fc23a95d{opacity:0.2;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g class="p181fc23a959"><path class="p181fc23a95a" d="M1000,72V28.92c-1.37-1.17-4.54-2.37-6-3.11,2.21,1.11-5.88,3.84-5.06,2.94.61-.71-2.52,2-2.1,1.87-1.17.3-2.22-1.87-2.47-1.43a8.44,8.44,0,0,0-1.05,2.24c-.15.65-.55-1.09-1,0-.64,1.26-3.65,1.08-4.75,0-1,1.85-3.74-1.45-4.38-2.37,0,.07-7,3.73-7.42,4s-.92-1-1.3-.43c-.57.83-5-2.24-5-2.18C957.14,38,938,25.38,934.28,33.3a12.61,12.61,0,0,1-1.58,2.11c0-1.48-.59-2.06-1.76-1.74a2.46,2.46,0,0,0-1.72-2.24s-.51-3-.59-2.54a15.53,15.53,0,0,1-1.09,2.49c.27-1.66.25-2.25-1.13.05-.44-1.14-2.3-.33-2.36,0-.14.72-.67-.44-.92,0a8.66,8.66,0,0,1-.8,1c-.08-1.88-.52-.44-1.51,0,1.21-.44-4-2.18-4-2.18-1,.84-2.52.07-4.13-2-.29-1.5-1.56-1-2.56.44l-.53.58c-.46-.82-.67-.89-.65-.21-.68-1.23-1-1-1.64,0-.27.34-.92-.72-1.11-.07s-2.71.63-2.62.41-2.5-1.95-2.31-2.52c-1.27,3.74-4.95,1.72-5.82-.87,1,2.86-3.34,2.46-4,3.83-1.22,2.64-4.79.08-4.38-.85-3.21,7.47-11.67.41-14.7,5.62-.75,1.37-8.92,1.91-10.16,2v1.23c-.37-.81-.86-1.88-.73,0l-1.12.37s-.06,2.89-.59,2.79c-1.59-.21-5.48,2.75-8.69,4.3.3-.15-1.58-4.35-1.61-5.08a5.84,5.84,0,0,0-1,1.66c-.08.51-.08-1.73-.59-.78s-1.32-.74-1.51-.3c1.91-4-5.06-1.61-3.61-3.68-.73,1-1.72-.51-1.91-.16.29-.57-5.12-3-5.56-2.31s-.67.09-1.26.51-.59.48-.84-.51c-.35-1.29-2.45-.93-2.83,0,.67-1.74-3.33-.53-3.32-.53-.26.42-1.66.87-1.74,1.1-.24.71-3.91,1.55-4.27,2.32-.74,1.73-5.55-6.28-7.2,1.38.43-1.73-3.07,1-2.1-.37a4.32,4.32,0,0,0-.65.4c.12-.75-1.45-1.08-1.38-1.25s-1.89-2.9-1.85-3c-.2.82-3.2,2.16-3.4,2.82.41-1.23-3,2.39-2.78,2.15,1.33-1.41-1.78-3.48-2.47-1.64.49-1.18-1.27-5.19-2.83-1.09C796,38,792,36.59,791.71,36c.74,1.68-2.54,2-2.53,2a3.66,3.66,0,0,0,.08,2,1.19,1.19,0,0,1-.08-.16c-2.3-4.13-1.45,4-1.45-1.34a3.51,3.51,0,0,1-1.51,1.41c-.46.44-.8-.86-1.11-.65-.93.64-.15-3.65-2.25,1.38.6-1.42-7.37-2.57-9.76-1.73-2,.59-2.7-2.86-2.44-3.12-.77.81-.84-.51-1.49-.41-1.44-.78-1.85-1.86-1.21-3.23-.08.79-2.36,1.7-2.73,1.91.44-.29-3.1.08-2.69-.42.08-.08-1.58-2-1.85-1.31s.74.37-.25.74c-2.7.94-1.26-.4-4.85-.17a5.18,5.18,0,0,0-3.36-1.66c-.27-1.56-.49-1-1.11-.56-2,4.48-2.69-3.72-3.86-.44-.34.86-.47-.43-.8.35s-.38-.72-1,.07-.59-.35-1.05.37-.44-.14-1,.44-3.71-.06-4.2.14-2.29.58-1.89-.79c-.25.77-2.81-4.89-4.14-1.8-.19.42-1-1.09-1.38-.23s-.72-.65-1.05-.07c-1.59,2.92-.75-3.64-1.49-1.3-.47,1.37-6.3-.41-6.3-.37a1.34,1.34,0,0,0-1.91-.43c-.09-.1-3-2.83-3.21-2.59s-10.7-2-10.06-.83c0,0-4-6.57-4.85-4.51-.92,2.28-1.25-1.39-1.22-1.78s.09-.31-.16,0a.53.53,0,0,0-.13.16c-.46.62-2-1.12-2.54-.14-.75,1.17-8.38,2.8-9.19,3.63a4.86,4.86,0,0,1-.73-2.7c.37,1.56-3,.68-3.2,1.45-.87,3-10.08-2.27-10.64-1.45.07-.11-6.79,1-6.74.87s-.27,1-.61.44.46-1.59-.32-.57-1.11,1.43-1.25.85a1,1,0,0,0-1.37.79c-1.36.3-2.06,1.1-3.55,1.82s-8.87-3.92-11.35-4.55c.24,0-2.59-.36-2.48-.58-1.76,3.4,0-6.48-3.88-1.52-.38.5-.93-.79-1.37-.07-.31.49-3.17.69-3.09.85-.27-.48-.92-.72-1.17-.35-1.42,1.81-4.35-2.84-5.92-.87,0,0-2.9-.4-2.88-.42-1.26,1.36-1.5-2.18-2.75,1.29-.91,2-2.27,2.8-4.8,2.76-.79-.07-3-.38-3.68,0a2.05,2.05,0,0,1-.84.2c0-.31-.62-3.46-2.77-.94-.65.81-.78-.14-1.17.57s-.84-.2-1.18.24c.62-.77-3.89-3.34-5.37-1.16-.28.35-.59-.65-.93,0l-1.11,1c-.53-.18-2.43-.43-2.83.17-.51.78-.65-.44-1.12.27s-.77.23-.9-.34c-.4-1.6-1.12-.67-2.31-.1-.84.44-.71-2-1.36-1.06-.85,1.17-10.88-6.27-13.46-4.14-1.14,1-4.21-2.86-3.94-3.41-.48,1-2.78.75-3.41,1-.18.09-8.32-1.3-8.2-1.57-.38.92-1.12-.37-1.64.07s-1.18-1-1.45-.47c0-.09-6.07-2.46-5.16-2.72-1,.3-1.26-1.09-1.73-.93,2.1-.63-4.95-1.5-4-1.94-.57.3-5.16-6-8.39-1.69.17-.21-5.09.41-4.87,1.46-.57-3.25-1.08,2.58-2,.58s-1.91.72-2.31-.58c0,0-.18-1.3-.46-.72.15-.33-2.2-.69-2.22-.67.28-.37-6.18,1.69-6.09,1.53-1,1.77,1.07.58-1.26-1,1.09.72-4,2.23-4,2.19-1.45,1.85-1.64.35-2.57-.75.94,1.1-6.89,3.94-6.88,4.15-.08-.72-.54-1.09-1,.07,0,.08-3.67,1.37-4.43,2.64-.07.14-.17.09-.36-.28l-.09-.19c-.65-1.52-.77-1.66-1.17-.07a4,4,0,0,1-.17.56c-.17.53-.08-.51-.69.37-2,3.1-2.73-2.14-4.72,0-1.59,1.79-4.83.68-5.9,1.73C492.21,14,481.28,14.69,481,14c-.57-1.32-1-.9-2.42.07-.08.09-4.35,1.45-3.94.79-1.15,2-6.38-1.76-6.36-1.75,1.16,1.08-5,1.71-5.13,1.82-1.93,2.2-7.71-2.13-8.65-1.58.08,0-6.21.59-9.7,2.15,1.29-.58-4.2-3.4-3.69-4.32-1.1,2-2.57.82-3.15,1.5-1.1,1.39-1.15-5-2.08,2a5.08,5.08,0,0,1-.58-3.14c.43,2.6-3.61,1.07-4.41,1.63-.4.3.12-2.24-.65-.92-.6,1-3,.91-4-1.44-.17-.41-.34-.78-.63-.2v0c-.91,1.61-1.62,3.12-3,3.49,1.48.25-5.45-.41-5.5-.58-.34-.95-.06-1.08-.86-.3-.92,1-5.32-2-4.8-1.95,2.87.12-4.09,1.36-1.9,1.1a1.08,1.08,0,0,0-.9.37c.11-.12-1-2.36-1.85.78-.88-3.14-1.95-.9-1.84-.78a1.09,1.09,0,0,0-.91-.37c2.2.26-4.77-1-1.89-1.1.51,0-3.88,2.91-4.8,1.95-.8-.78-.53-.65-.87.3,0,.17-7,.83-5.5.58-1.38-.45-2-1.88-2.95-3.49v0c-.3-.58-.47-.21-.63.2-1,2.35-3.38,2.4-4,1.44-.78-1.32-.25,1.22-.65.92-.81-.56-4.84,1-4.41-1.63a5.08,5.08,0,0,1-.58,3.14c-.94-7-1-.63-2.09-2-.67-.79-1.9.79-3.15-1.5.41.74-4.83,3.81-3.69,4.32-3.49-1.56-9.77-2.19-9.7-2.15-1-.58-6.68,3.82-8.65,1.58.05.05-6.23-.79-5.12-1.82,0,0-5.21,3.71-6.36,1.75.4.65-3.87-.7-3.95-.79-1.41-1-1.84-1.39-2.41-.07-.33.71-11.31-.11-12.47-1.32s-4.33,0-5.9-1.73c-2-2.14-2.69,3.1-4.72,0-.61-.88-.53.16-.7-.37a4.39,4.39,0,0,1-.16-.56c-.4-1.59-.53-1.45-1.18.07a1.82,1.82,0,0,1-.08.19c-.19.37-.3.42-.36.28-.9-1.49-4.27-2.3-4.43-2.64-.5-1.16-1-.79-1.05-.07,0-.21-7.81-3-6.87-4.15-.87,1-1.43,2.21-2.58.75.13.18-5.08-1.46-4-2.19C285.9,3.83,288,5,287,3.25c.08.16-6.37-1.9-6.09-1.53,0,0-2.37.34-2.23.67-.27-.58-.46.72-.46.72-.39,1.3-1.39-1.37-2.31.58s-1.38-3.83-1.95-.58c.21-1-5-1.67-4.87-1.46-3.45-4.64-7.81,2-8.4,1.69.82.4-6.11,1.32-4.05,1.94-.46-.16-.73,1.23-1.72.93.91.26-5.21,2.63-5.17,2.72-.27-.5-.92.88-1.44.47s-1.26.85-1.64-.07c.13.29-8,1.66-8.21,1.57-.63-.28-2.92,0-3.41-1,.51,1.05-3.07,4.16-3.94,3.41-2.46-2-12.69,5.19-13.45,4.14s-.53,1.5-1.37,1.06c-1.18-.57-1.9-1.5-2.31.1-.12.57-.46,1.06-.9.34s-.61.51-1.11-.27c-.4-.6-2.3-.35-2.84-.17l-1.11-1c-.33-.65-.65.35-.92,0-1.49-2.18-6,.39-5.38,1.16-.33-.44-.79.5-1.17-.24s-.53.24-1.18-.57c-1.81-2.13-2.67.26-2.77.94a2.05,2.05,0,0,1-.84-.2c-.65-.38-2.89-.07-3.67,0-2.54,0-3.9-.8-4.81-2.76-1.25-3.47-1.48.07-2.75-1.29,0,0-2.9.38-2.87.42-1.58-2-4.46,2.73-5.92.87-.26-.37-.91-.13-1.18.35.08-.16-2.77-.36-3.09-.85-.44-.72-1,.57-1.36.07-3.51-4.48-2.37,4.45-3.88,1.52.1.22-2.72.6-2.48.58-2.4.57-9.77,5.14-11.36,4.55s-2.18-1.52-3.55-1.82a1,1,0,0,0-1.36-.79c-.15.58-.46.14-1.26-.85s0,0-.32.57-.6-.44-.6-.44-6.81-1-6.74-.87c-.57-.82-9.78,4.45-10.65,1.45-.19-.77-3.56.11-3.2-1.45a4.93,4.93,0,0,1-.72,2.7c-.84-.85-8.41-2.4-9.2-3.63-.58-1-2.08.76-2.54.14a.74.74,0,0,0-.12-.16c-.25-.33-.23-.28-.17,0s-.3,4.06-1.22,1.78c-.83-1.93-4.83,4.48-4.84,4.51.66-1.23-9.75,1.17-10.06.83s-3,2.38-3.21,2.59A1.34,1.34,0,0,0,90.7,27s-5.84,1.74-6.3.37c-.74-2.34.1,4.22-1.49,1.3-.34-.58-.67.95-1,.07s-1.2.65-1.39.23c-1.1-2.57-4,2.17-4.13,1.8.4,1.37-1.55,1.06-1.89.79-.54-.23-3.73.39-4.2-.14s-.55.28-1-.44-.46.44-1.05-.37-.67.74-1-.07-.47.51-.8-.35c-1.18-3.28-1.82,4.91-3.86.44-.62-.45-.85-1-1.12.56a6.29,6.29,0,0,0-3.36,1.66c-3.58-.23-2.15,1.11-4.84.17-1-.37,0,0-.26-.74s-1.93,1.23-1.84,1.31c.41.5-3.14.13-2.69.42-.38-.21-2.66-1.12-2.73-1.91.63,1.37.23,2.45-1.22,3.23-.65-.1-.71,1.22-1.49.41.23.23-.33,3.76-2.43,3.12-2.47-.86-10.3.46-9.77,1.73-1.53-3.67-2.14-1.31-2.24-1.38-.32-.21-.65,1.09-1.11.65A3.4,3.4,0,0,1,26,38.46c0,4.88.85-2.8-1.45,1.34,0,.07-.07.11-.09.16a3.74,3.74,0,0,0,.09-2s-3.3-.23-2.54-2c-.35.81-4.36,1.85-4.66.94-1.56-4.1-3.32-.09-2.84,1.09-.81-2.2-3.54.5-2.47,1.64-.06-.06-3.08-3.06-2.78-2.15-.2-.66-3.2-2-3.4-2.82,0,.15-2,2.84-1.84,3s-1.5.5-1.39,1.25a4.32,4.32,0,0,0-.65-.4A4.49,4.49,0,0,0,0,39.13V72Z"></path></g><path class="p181fc23a95b" d="M499.88,71.87h0s0,.06-.06.09l.38,0h0l-.37,0S499.86,71.87,499.88,71.87Z"></path><path class="p181fc23a95c" d="M500.36,71.79a.57.57,0,0,0-.7,0c-.05,0,0,.17.06.19C500.05,72.06,500.25,72,500.36,71.79Z"></path><g class="p181fc23a95d"><path class="p181fc23a95a" d="M1000,72V42.32c-.07-.15-.16-.21-.3,0a10.25,10.25,0,0,0-.6,1.18V42.21l-.55.91-.74-1v1.14s-.41-1.58-.69-1.31a3.28,3.28,0,0,0-.3.52c0-.1-.07-.16-.23-.12-.53.12-1,.91-1,.91s-.92-1.49-1.15-1.49-.74,1.32-.74,1.32-.21-1-.71-.74a4,4,0,0,0-1,.85v-.52c0,.52-.88.7-.88.7-.77-.59-1.31-.46-1.61.38,0,0-1.49,0-1.75,0s-1.36-.67-1.36-.67l-.73.67s-.49-.38-.76-.23a4.07,4.07,0,0,0-.67.83l-1.68-.54-.55.54c-.32-1-.86-1-1.61,0l-.56-.42-1.68.42q-.79-1.44-1.68-.42a16.05,16.05,0,0,0-3.66.42,10,10,0,0,1-1.27-1s-.41-1.23-.69-1.06-.66-.62-1.15-.23c.36-.31-3,0-2.55-.35-.35.23-1.36-.5-1.82-.09s-1.7,1.12-1.75.85-.62-1.76-.9-1.38-.74,1-.74,1c-.27-1-.83-1.24-1.68-.62-.2-.87-.58-1.44-1.28-.91,0,0-.42-1-.88-.62s-.74,1-1,.89-.6-1.29-.88-.89q-.83,1.17-2.37.33a3.8,3.8,0,0,1-.94.68c-.75-.75-1.51-1.47-2.3-2.19v.66s-.81-.91-1-.66-.46.78-.46.78-.34-1.32-.62-.78c-1.14,1.11-1.87,1.11-2.21,0-.35,0-.9,0-.9,0a4,4,0,0,0-1.26,0,4.13,4.13,0,0,0-.76.83l-.88.24-.67.38-.85.27c.07-.17.53-1.14,0-.71a2.93,2.93,0,0,0-.88,1c-.7-1.08-1.32-1.14-1.86-.17a.1.1,0,0,1,0-.06c.28-.5.42-1.14-.07-1s-.87.17-1.12.46-1-.06-1.29.27-.81,1.08-.81,1.08a2.29,2.29,0,0,0-2.58.24s-.39-.64-.94-.41a4.25,4.25,0,0,1-1.68.06l-.74-.51v.51L928,41l-.49,1-.66-.5L926,42.59c-.42-1-.88-1-1.36.06,0,0-.34-.44-.55-.5s-.8.29-.8.29-.4-.58-.67-.64a6.28,6.28,0,0,0-1.15.12,2.57,2.57,0,0,0-1-.06,7.7,7.7,0,0,0-1.47,1l-.55-.67L917.17,42l-.53-.74c-.87-.17-1.39.1-1.57.79l-.53-.79-.67.79a7.27,7.27,0,0,0-.55-1v1.2c-1.11-1.07-1.85-1.07-2,.73,0,0-.35-1-.46-1.14v.91c-.57,0-3.44,0-2.1-1a13.16,13.16,0,0,0-1.15,1l-.21-.64c-.11-.31-.23-.6-.27-.48s-1-.46-1-.46l-.55.88c.6-1.76-2.53,1.48-1.75-1.16-.11.45.14,1.13,0,.8q-1.08-2.52-1.47,0s-.42-1.32-.6-.91a5,5,0,0,1-.9,1s.42-1,0-.8a3.89,3.89,0,0,0-.94.74l-1.15-.58v.69l-1.2-.4v-.91l-1,.46c-.74-1-1.17-.73-1.29.68l-.74-.68v.51L893.41,41l-.55.12V40l-.67.79-.53-.6-.21-.25-.62-.29-.53.85V39.33l-.94,1-.81-.38v.73l-.9-1-.66-.83v.6c-.72-.79-1.15-.9-1,.47l-1-.41-.48.52-1.06.68-1.09.44-.69-.11-.66.69v-.52l-.6.68v-.79l-.49.63-.87-.58v.68l-1-.39-.63.51-.66-.33-.6.73-.69-.58-1.15.76-.81-.76-2.16.76s-.67-1-.88-.85S869,42.77,869,42.77l-1.29-.62-1.54.73-.83-.11-1.15.06-2,.29c-.67-.79-1.16-.69-1.47.29a2.85,2.85,0,0,0-2.51,1c-.87-.87-1.45-.69-1.75.54q-1.44-.2-1,1.47h-.59l-.63,1-.66.56h-.88v.44l-.8-.73-.63.73V47.7l-.94.73s.48-1,0-.79a3,3,0,0,0-.87.79V47.25l-.53.56-.56-1.35-1.88-.23v-1.3l-.95.06V43.35l-1.89-.52-1-1.92a4.77,4.77,0,0,1-1.08,0,7.42,7.42,0,0,1-2-.75,5.81,5.81,0,0,1-.94-1.47,8.8,8.8,0,0,1-2.1-.85,1.52,1.52,0,0,1,0-.79s-.55-.62-.94-.27a1,1,0,0,1-1,0L834.1,36l-.94-.12-.94-.58s-.07-.61-.6-.27a1.3,1.3,0,0,1-1.08.12s-.21-.91-.69-.52a2,2,0,0,1-1,.46,5.37,5.37,0,0,1-1.61.33v-.85l-.81-.06V33.39a1.33,1.33,0,0,0-.8,0c-.35.16,0-.69,0-.69a1.92,1.92,0,0,1-.83,0c-.32-.12-.88-1.59-1.15-1.2a3.49,3.49,0,0,1-.81.79l-.87-.85-.46-.62h-1a1.26,1.26,0,0,0-1.08,0l-.94-1.24-1.08-1.08L816.81,27l-1.54,1.12s.39-1.52,0-1.12c-3.83,3.58-.77-.86-1.36-.46s-1.29.85-1.29.85c-.22-1.26-.7-1.85-1.88-.62,0,0-.07-.95-.33-.87a8.51,8.51,0,0,0-1.08.58l-.83-.58h-.59v-.66l-.53.68-.69-.68L805.6,26l-.53-.74H803l-.67-.91-.62,1c.07-.23.18-.6-.07-.48a9,9,0,0,0-1.22,1.25v-.91l-.53,1L799,25.6l-.76,1.45c.13-.31.5-1.22,0-.87q-1.91,2-1.22-.58c-.28.12-1.08-.15-1.08-.15V24.36h-.55V23l-.47.45L794.32,22l-1.68,1.18V22l-.67.62s-.41-2.07-.87-1.57c-1.73,1.73-.32.83-2.58,1.33-1.13.36-1.72.81-2.3-.15L785,22.9l-.62-1-.74,1.24-.59-.56-2.1.05c-1.09,1.87-1.7,1.65-1.89-.29l-1.15-.44-.62,1.18V21.46l-1,1.61-.6-.64-.62.64-1-1.61v1.65l-.59-1.18-1.16.44c-.19,1.94-.79,2.16-1.88.29l-2.1-.05-.6.56-.76-1.24-.6,1L765,22.22c-.42,1.53-.82,1.42-1.22-.35,0-.29-1.06.5-1.06.5a11.15,11.15,0,0,0-.9-1.33c1,1.3-.17,1.51-1.68,0-.46-.5-.88,1.57-.88,1.57l-.66-.62v1.18L756.91,22l-.53,1.47L755.9,23v1.35h-.53v1.09s-.81.27-1.08.15c.45,1.7.05,1.89-1.22.58-.56-.35-.19.56-.05.87l-.76-1.45-.87.58-.56-1v.91c-.86-1.49-1.29-1.74-1.29-.77l-.59-1-.67.91h-2.1l-.55.74-1.08-.74-.67.68-.53-.68v.66h-.62l-.81.58c-.91-.88-1.38-.79-1.42.29a9,9,0,0,1-1.06-.85c-.21-.23-.83,1.47-.83,1.47s-.81-.5-1.27-.85,2.48,4-1.36.46c-.41-.4,0,1.12,0,1.12L734.42,27l-.6,1.47-1.08,1.08-1,1.24a1.25,1.25,0,0,0-1.08,0h-1l-.46.62-.32.29c-.39-.12-.6.37-.76.41a3.8,3.8,0,0,1-.62-.64c-.23-.33-.65.66-1,1-1.56-.42-6.79,1-7,.5.23.45-3.82-1.6-2.6.78a2.43,2.43,0,0,1-.37-.5c-.9-1.3-1.87.13-1.87.13a3.2,3.2,0,0,1-.32.31A.79.79,0,0,0,714,34a.4.4,0,0,1-.57-.29c-.12-.27-.19-.25-.26-.11-.28.12-.57.26-.85.4a.74.74,0,0,0-.37-.25,3.2,3.2,0,0,1-.32-.31s-1-1.43-1.84-.13a2.9,2.9,0,0,1-.37.5c.85-1.2.36-1.43-1.5-.72-.71,1-.87-.54-1.1-.06s-8.07-1.47-8.52-.94c-.32.34-2.27-.17-2.6-.47,0,0-1-.81-1.52-.52-.67.43-4.66.26-3.69,2-.14-.26-3.74.57-6.83-.54-5.73-1.49-14.4,2.06-18.33,3.69a3.65,3.65,0,0,1-2,.24c.75-.21-6,2.83-5.48,2.28-.87.94-.87-.06-.87-.06a9.79,9.79,0,0,0-1.45-.79c-.4-.1-1.13-.08-1,.23s-2-.66-2.51,0c-2.23,3.18-11.36-.77-12.89,3.25a3.54,3.54,0,0,0-.69.44c-.16-.15-.32-.33-.49-.31V41a8.48,8.48,0,0,0-.55,1l-.67-.79-.55.79c-.16-.7-.67-1-1.54-.79l-.55.74-1.2.23-.46.56a4.1,4.1,0,0,0-.46-.19,5.36,5.36,0,0,0-1.11-.72,2.53,2.53,0,0,0-1,.06,6.62,6.62,0,0,0-1.15-.12c-.28.06-.69.64-.69.64s-.6-.35-.81-.29-.43.39-.5.48,0,0,0,0c-.48-1-.93-1.06-1.33-.06l-.88-1.17-.67.5-.48-1-1,.41v-.51l-.74.51a4.35,4.35,0,0,1-1.7-.06c-.53-.23-1,.41-1,.41a2.25,2.25,0,0,0-2.55-.24s-.56-.73-.81-1.08-1,0-1.29-.27-.67-.29-1.15-.46-.34.46-.07,1a.2.2,0,0,0,0,.06c-.13-.19-.43-.6-.69-.68-.41-.11-1.15.85-1.15.85-.69-.88-1.35-1.4-.89-.25l-.86-.27-.69-.38-.87-.24a3.87,3.87,0,0,0-.74-.83,4.19,4.19,0,0,0-1.29,0s-.53,0-.87,0c-.34,1.12-1.09,1.12-2.24,0-.25-.54-.59.78-.59.78a7.64,7.64,0,0,0-.49-.78c-.18-.25-1,.66-1,.66v-.66c-.78.72-1.53,1.45-2.28,2.19a3.8,3.8,0,0,1-.94-.68c-1,.56-1.82.45-2.38-.33-.27-.4-.59.79-.87.89q-.84-1.64-1.89-.27l-.34-.41c-.35-.38-1,1.32-1,1.32a5.65,5.65,0,0,1-.87-.35c-.35-.17-.81,1-.81,1-1-.34-3.5.82-5.2-.41-1.11-.68-3,1.06-3.73.58-.25-.17-.67,1.06-.67,1.06a9,9,0,0,1-1.29,1c-.14,0-2-.25-2.28-.36s-1.15.27-1.35-.06q-.91-1-1.68.42L571.4,44l-.53.42c-.75-1-1.29-1-1.63,0l-.53-.54-1.68.54a4,4,0,0,0-.69-.83c-.28-.15-.74.23-.74.23l-.74-.67a3.56,3.56,0,0,1-3.1.67,3.45,3.45,0,0,1-.7-.73c-.18-.35-.94.35-.94.35s-.87-.18-.87-.7v.52a3.75,3.75,0,0,0-1-.85c-.51-.29-.71.74-.71.74a6,6,0,0,0-.74-1.32c-.23,0-1.15,1.49-1.15,1.49-.31-.88-.72-1.14-1.25-.79a1.71,1.71,0,0,0-.32-.52c-.25-.27-.67,1.31-.67,1.31V42.15l-.73,1-.55-.91V43.5s-.28-.62-.6-1.18-.49.74-.49.74v-.79s-.87.32-1.08-.35-.49-.54-.94.11l-.33-.67c-.34-.68-.69.62-.69.62-.16-2-.93-2-2.09-.74l-1-1.18c-1,.3-2.68.19-2.32,1-.21-.27-.65-.87-.95-1s0,1.3,0,1.3l-.62-1-.74,2.11s-.34-.79-.55-1.37-.53,1-.53,1a7.83,7.83,0,0,0-.73-1.29c-.46-.66-.17.4,0,.79-.16-.23-.46-.74-.58-.91s-.46.85-.46.85a1.91,1.91,0,0,0-1-.73c-.3-.14-.37,0-.37.19.22.6-2.06-2-1.79.48l-.62-1.25s-.81.79-1,.46-.53,1.18-.53,1.18l-.73-1.35c-.49-.85-.83.85-.83.85a13.93,13.93,0,0,0,0-1.76c0-.56-.88,1-.88,1a3.46,3.46,0,0,0-.67-1.2c-.41-.38-.8.64-.8.64-.26-.86-.58-1.2-.94-.4,0,0-.28-.74-.56-1.36s-.73.58-.73.58c-1.1-1.23-1.5-1.22-1.11,0-.16-.19-.83-1-1.2-1.58s-1,1.6-1,1.6c-.61-1.51-1.29-1.54-2-.4.1-2.24-.32-1-.6-.12,0,0-.56-1-.63-1.26s-.94,1-.94,1c-.63-1.73-1.23-1.58-1.82-.29-.52-1.59-1-1.73-1.33-.45l-1-.85c-.21-.27-4.59.41-4.74.18-1.86-3.13-4.83,2.29-7.37-1-.32-.46-.39,1.59-.8,1.35a1.07,1.07,0,0,0-.55,0V37a1.17,1.17,0,0,1-.47.14h-.7a1.17,1.17,0,0,1-.47-.14v.09a1.07,1.07,0,0,0-.55,0c-.41.24-.48-1.81-.8-1.35-2.54,3.26-5.51-2.16-7.37,1-.15.23-4.53-.45-4.74-.18l-1,.85c-.36-1.28-.81-1.14-1.33.45-.59-1.29-1.19-1.44-1.82.29,0,0-.9-1.24-.95-1a12.41,12.41,0,0,1-.62,1.26c-.28-.86-.7-2.12-.6.12-.73-1.14-1.41-1.11-2,.4,0,0-.62-2.22-1-1.6s-1,1.39-1.2,1.58c.39-1.2,0-1.21-1.11,0,0,0-.48-1.2-.73-.58s-.56,1.36-.56,1.36c-.36-.8-.68-.46-.94.4,0,0-.39-1-.81-.64a3.54,3.54,0,0,0-.66,1.2s-.83-1.58-.88-1a13.93,13.93,0,0,0,0,1.76s-.34-1.7-.83-.85l-.73,1.35s-.35-1.53-.53-1.18-1-.46-1-.46l-.62,1.25c.44-3.07-2.2.66-1.79-.48,0-.21-.07-.33-.37-.19a1.91,1.91,0,0,0-1,.73s-.33-1.08-.46-.85-.42.68-.58.91c.11-.39.41-1.45,0-.79a7.83,7.83,0,0,0-.73,1.29s-.35-1.53-.53-1-.55,1.37-.55,1.37l-.74-2.11-.62,1s.41-1.47,0-1.3-.74.72-.95,1c.25-.6-1.06-.38-2.32-1l-1,1.18C452.9,40,452.13,40,452,42c0,0-.35-1.3-.69-.62L451,42c-.45-.65-.76-.69-.94-.11s-1.08.35-1.08.35v.79s-.14-1.3-.49-.74-.6,1.18-.6,1.18V42.21l-.55.91-.73-1v1.14s-.42-1.58-.67-1.31a1.71,1.71,0,0,0-.32.52c-.53-.35-.94-.09-1.25.79,0,0-.92-1.49-1.15-1.49a6,6,0,0,0-.74,1.32s-.2-1-.71-.74a3.75,3.75,0,0,0-1,.85v-.52c0,.52-.87.7-.87.7s-.76-.7-.94-.35a3.45,3.45,0,0,1-.7.73,3.56,3.56,0,0,1-3.1-.67l-.74.67s-.46-.38-.74-.23a4,4,0,0,0-.69.83l-1.68-.54-.53.54c-.34-1-.88-1-1.63,0L428.6,44l-1.71.42q-.76-1.43-1.68-.42c-.2.33-1.08-.06-1.35.06s-2.14.32-2.28.36a9,9,0,0,1-1.29-1s-.42-1.23-.67-1.06c-.76.48-2.62-1.26-3.73-.58-1.9,1.37-3.81-.32-5.2.41,0,0-.46-1.14-.81-1a5.65,5.65,0,0,1-.87.35s-.6-1.7-.95-1.32l-.34.41q-1.05-1.36-1.89.27c-.28-.1-.6-1.29-.87-.89-.56.78-1.35.89-2.38.33a3.8,3.8,0,0,1-.94.68c-.75-.74-1.5-1.47-2.28-2.19v.66s-.83-.91-1-.66a7.64,7.64,0,0,0-.49.78s-.34-1.32-.59-.78c-1.15,1.12-1.9,1.12-2.24,0-.34,0-.87,0-.87,0a4.19,4.19,0,0,0-1.29,0,3.87,3.87,0,0,0-.74.83l-.87.24-.69.38-.86.27c.46-1.15-.2-.63-.89.25,0,0-.74-1-1.15-.85s-.56.49-.69.68a.2.2,0,0,0,0-.06c.27-.5.39-1.14-.07-1s-.88.17-1.15.46-1-.06-1.29.27-.81,1.08-.81,1.08a2.25,2.25,0,0,0-2.55.24s-.42-.64-.95-.41a4.35,4.35,0,0,1-1.7.06l-.74-.51v.51l-1-.41-.48,1-.67-.5-.88,1.17c-.4-1-.85-1-1.33.06,0,0,0,0-.05,0s-.32-.42-.5-.48-.81.29-.81.29-.41-.58-.69-.64a6.62,6.62,0,0,0-1.15.12,2.53,2.53,0,0,0-1-.06,5.36,5.36,0,0,0-1.11.72,4.1,4.1,0,0,0-.46.19l-.46-.56-1.2-.23-.55-.74c-.87-.17-1.38.09-1.54.79l-.55-.79-.67.79a8.48,8.48,0,0,0-.55-1v.52c-.17,0-.33.16-.49.31a3.54,3.54,0,0,0-.69-.44c-1.53-4-10.66-.07-12.89-3.25-.48-.66-2.58.33-2.51,0s-.64-.33-1-.23a9.79,9.79,0,0,0-1.45.79s0,1-.87.06c.54.55-6.23-2.49-5.48-2.28a3.65,3.65,0,0,1-2-.24C330.77,34.64,322,31,316.32,32.56c-3,1.09-6.74.37-6.83.54,1-1.83-2.87-1.47-3.69-2-.48-.29-1.52.52-1.52.52-.33.3-2.28.81-2.6.47s-8.23,1.47-8.52.94-.39,1.09-1.1.06c-1.86-.71-2.35-.48-1.5.72a2.9,2.9,0,0,1-.37-.5c-.87-1.3-1.84.13-1.84.13a3.2,3.2,0,0,1-.32.31.74.74,0,0,0-.37.25c-.28-.14-.57-.28-.85-.4-.07-.14-.14-.16-.26.11A.4.4,0,0,1,286,34a.79.79,0,0,0-.37-.25,3.2,3.2,0,0,1-.32-.31s-1-1.43-1.87-.13a2.43,2.43,0,0,1-.37.5c1.22-2.38-2.83-.33-2.6-.78-.22.44-5.45-.92-7-.5-.32-.38-.74-1.37-1-1a3.8,3.8,0,0,1-.62.64c-.16,0-.37-.53-.76-.41l-.32-.29-.46-.62h-1a1.25,1.25,0,0,0-1.08,0l-.95-1.24-1.08-1.08-.6-1.47L264,28.15s.42-1.52,0-1.12c-3.83,3.58-.76-.86-1.35-.46s-1.27.85-1.27.85-.62-1.7-.83-1.47a9,9,0,0,1-1.06.85c0-1.08-.51-1.17-1.42-.29l-.81-.58h-.62v-.66l-.53.68-.67-.68-1.08.74-.55-.74h-2.1l-.67-.91-.59,1c0-1-.43-.72-1.29.77v-.91l-.56,1-.87-.58L247,27.05c.14-.31.51-1.22,0-.87-1.27,1.31-1.67,1.12-1.22-.58-.27.12-1.08-.15-1.08-.15V24.36h-.53V23l-.48.45L243.09,22l-1.71,1.18V22l-.66.62s-.42-2.07-.88-1.57c-1.51,1.51-2.69,1.3-1.68,0a11.15,11.15,0,0,0-.9,1.33s-1-.79-1.06-.5c-.4,1.77-.8,1.88-1.22.35l-1.28.68-.6-1-.76,1.24-.6-.56-2.1.05c-1.09,1.87-1.69,1.65-1.88-.29l-1.16-.44L226,23.11V21.46l-1,1.61-.62-.64-.6.64-1-1.61v1.65l-.62-1.18-1.15.44c-.19,1.94-.8,2.16-1.89.29l-2.1-.05-.59.56-.74-1.24-.62,1-1.27-.68c-.58,1-1.17.51-2.3.15-1.42.11-1.08.17-2.58-1.33-.46-.5-.87,1.57-.87,1.57l-.67-.62v1.18L205.68,22l-.55,1.47-.47-.45v1.35h-.55v1.09s-.8.27-1.08.15q.69,2.55-1.22.58c-.55-.35-.18.56-.05.87L201,25.6l-.87.58-.53-1v.91a9,9,0,0,0-1.22-1.25c-.25-.12-.14.25-.07.48l-.62-1-.67.91h-2.09l-.53.74-1.09-.74-.69.68-.53-.68v.66h-.59l-.83.58a8.51,8.51,0,0,0-1.08-.58c-.26-.08-.33.87-.33.87-1.18-1.23-1.66-.64-1.89.62,0,0-.82-.5-1.28-.85s2.47,4-1.36.46c-.39-.4,0,1.12,0,1.12L183.19,27l-.63,1.47-1.08,1.08-.94,1.24a1.26,1.26,0,0,0-1.08,0h-1l-.46.62-.87.85a3.49,3.49,0,0,1-.81-.79c-.27-.39-.83,1.08-1.15,1.2a1.92,1.92,0,0,1-.83,0s.35.85,0,.69a1.33,1.33,0,0,0-.8,0v1.16l-.81.06v.85a5.37,5.37,0,0,1-1.61-.33,2,2,0,0,1-.95-.46c-.48-.39-.69.52-.69.52a1.3,1.3,0,0,1-1.08-.12c-.53-.34-.6.27-.6.27l-.94.58-.94.12-.49.74a1,1,0,0,1-1,0c-.39-.35-.94.27-.94.27a1.52,1.52,0,0,1,0,.79,8.8,8.8,0,0,1-2.1.85,5.81,5.81,0,0,1-.94,1.47,7.42,7.42,0,0,1-2,.75,4.77,4.77,0,0,1-1.08,0l-1,1.92-1.89.52V45l-.95-.06v1.3l-1.88.23L151,47.81l-.53-.56v1.18a3,3,0,0,0-.87-.79c-.48-.21,0,.79,0,.79l-.94-.73v.73l-.63-.73-.8.73V48h-.88l-.66-.56-.63-1h-.59q.42-1.66-1-1.47c-.3-1.23-.88-1.41-1.75-.54a2.85,2.85,0,0,0-2.51-1c-.31-1-.8-1.08-1.47-.29l-2-.29-1.15-.06-.83.11-1.54-.73-1.29.62s-1.26-1-1.47-1.06-.88.85-.88.85l-2.16-.76-.81.76-1.15-.76-.69.58-.6-.73-.66.33-.63-.51-1,.39v-.68l-.87.58-.49-.63v.79l-.6-.68v.52l-.66-.69-.69.11-1.09-.44-1.06-.68-.48-.52L114,40c.2-1.37-.23-1.26-.95-.47v-.6l-.66.83-.9,1V40l-.81.38-.94-1v1.12l-.53-.85-.62.29-.21.25-.53.6-.67-.79v1.12l-.55-.12-1.08.47v-.51l-.74.68c-.12-1.41-.55-1.64-1.29-.68l-1-.46v.91l-1.2.4v-.69l-1.15.58a3.89,3.89,0,0,0-.94-.74c-.42-.17,0,.8,0,.8a5,5,0,0,1-.9-1c-.18-.41-.6.91-.6.91q-.39-2.52-1.47,0c-.14.33.11-.35,0-.8.78,2.64-2.35-.6-1.75,1.16l-.55-.88s-1,.67-1,.46-.16.17-.27.48l-.21.64a14.9,14.9,0,0,0-1.15-1c1.34.93-1.53,1-2.1,1V41.8c-.11.18-.46,1.14-.46,1.14-.17-1.8-.91-1.8-2-.73V41a7.36,7.36,0,0,0-.56,1l-.66-.79-.53.79c-.18-.69-.7-1-1.57-.79l-.53.74-1.22.23-.55.67a7.7,7.7,0,0,0-1.47-1,2.57,2.57,0,0,0-1,.06,6.28,6.28,0,0,0-1.15-.12c-.27.06-.67.64-.67.64s-.62-.35-.8-.29-.55.5-.55.5c-.48-1-.94-1.06-1.36-.06l-.88-1.17-.66.5L72,41l-1,.41v-.51l-.74.51a4.25,4.25,0,0,1-1.68-.06c-.55-.23-.94.41-.94.41a2.29,2.29,0,0,0-2.58-.24s-.53-.73-.81-1.08-1,0-1.29-.27-.66-.29-1.12-.46-.35.46-.07,1a.1.1,0,0,1,0,.06c-.54-1-1.16-.91-1.86.17a2.93,2.93,0,0,0-.88-1c-.55-.43-.09.54,0,.71l-.85-.27L57.51,40l-.88-.24a4.13,4.13,0,0,0-.76-.83,4,4,0,0,0-1.26,0s-.55,0-.9,0c-.34,1.11-1.07,1.11-2.21,0-.28-.54-.62.78-.62.78s-.28-.51-.46-.78-1,.66-1,.66v-.66c-.79.72-1.55,1.44-2.3,2.19a3.8,3.8,0,0,1-.94-.68q-1.54.84-2.37-.33c-.28-.4-.6.79-.88.89s-.53-.5-1-.89-.88.62-.88.62c-.7-.53-1.08,0-1.28.91-.85-.62-1.41-.42-1.68.62,0,0-.49-.62-.74-1s-.83,1.09-.9,1.38-1.27-.47-1.75-.85-1.47.32-1.82.09c.48.3-2.91,0-2.55.35-.49-.39-.9.41-1.15.23s-.69,1.06-.69,1.06a10,10,0,0,1-1.27,1A16.05,16.05,0,0,0,23.53,44q-.88-1-1.68.42L20.17,44l-.56.42c-.75-1-1.29-1-1.61,0l-.55-.54-1.68.54a4.07,4.07,0,0,0-.67-.83c-.27-.15-.76.23-.76.23l-.73-.67s-1.09.73-1.36.67-1.75,0-1.75,0c-.3-.84-.84-1-1.61-.38,0,0-.88-.18-.88-.7v.52a4,4,0,0,0-1-.85c-.5-.29-.71.74-.71.74s-.53-1.26-.74-1.32-1.15,1.49-1.15,1.49-.48-.79-1-.91c-.16,0-.23,0-.23.12a3.28,3.28,0,0,0-.3-.52c-.28-.27-.69,1.31-.69,1.31V42.15l-.74,1L.9,42.21V43.5a10.25,10.25,0,0,0-.6-1.18c-.14-.21-.23-.15-.3,0V72Z"></path></g><path class="p181fc23a95a" d="M1000,63.54V57.63a1.18,1.18,0,0,0-.84,0l-.31.2s-1-.78-1.16-.29c.28.88-.28,1.1-1.67.67-.62.36-1.36-.83-1.36-.83,0-.72-1.37-3-2.51-2.66-.52.17-.42-1.76-.72-1.29s-.32-2.28-.95-.88c-.46,1.31-1.47,1.82-3,1.54-3.37,1.64-8.52.15-8.52-1.62-.74-.23-5.48,2-5.53,2.31.18-1.06-6.88-2-9.29-.42.41-.28-4.94,1.51-3.65.2a3.85,3.85,0,0,0-.83,1c-.12.3-.44-.51-.84,0-.6.69-3,.42-3.78,0,0-.05-7.85.09-9.41.77-.32.13-.74-.47-1-.21-1.61,1.36-1.77-1.22-2.51-.56,0,0-2.24.68-3,1,0,0-2-.7-1.58-1-2.93,2.41-14.06-2.63-16.89.86a7.71,7.71,0,0,1-1.25,1,1.05,1.05,0,0,0-1.41-.81c0-.61-.48-1-1.37-1,0,0-.4-1.4-.47-1.18a6.76,6.76,0,0,1-.87,1.16c.24-.87.09-1-.9,0-.36-.55-.76-.55-1.21,0-.2.3-.57-.35-.67,0s-.53-.21-.73,0a6.26,6.26,0,0,1-.64.47c-.23-.65-.64-.65-1.2,0,.41-.09-2.54-1-3.19-1-.87.44-2.14.09-3.29-.91-.3-.83-1.25-.47-2,.21l-.42.26c-.35-.39-.52-.43-.52-.09-.55-.6-1-.6-1.31,0-.21.16-.73-.33-.88,0s-2.12.23-2.1.19c-.08.12-8-1.73-9.69.2-1,1.26-7.54.45-9,1.71s-4.45-1.23-6.17.49c-.14.15-3.49,0-3.72.61s-.47-1.33-1-.43a1.63,1.63,0,0,1-1.67,1.06,2.43,2.43,0,0,1-1.72-.33v.57c-.54-.69-.73-.69-.59,0l-.89.17s-.05,1.34-.47,1.3c-.64,0-3.29,1.19-3.19.84-.15.6-.2-.44-.77.3-1.58,2-4.16-.69-4.25-1.51,0,0-.72.54-.77.77s-.07-.8-.47-.36-1.06-.34-1.21-.14.3-1.9,0-1.34c-.82,1.47-3-.3-2.88-.36-.58.46-1.37-.24-1.52-.08s-.52-.86-.79-.46a4.1,4.1,0,0,1-1.77-.37,3.15,3.15,0,0,0-1.88-.24c-.43.35-.53,0-1,.24s-.47.22-.67-.24a2.38,2.38,0,0,0-2.26,0c-.25.38-.42-1-.74-.49-.89-.3-1.52-.22-1.9.25a1.41,1.41,0,0,1-1.39.51c-.25.44-.67-.43-.94.14s-.37,0-.74.5c-.58.13-1.15.27-1.72.43s-1.1.19-1.36-.3a1.89,1.89,0,0,1-1.45-.36c-.42.78-1.8-1.75-2.93,1.3a1.35,1.35,0,0,0-1.68-.17s-.33.1-.51.18c.07-.27-1-.75-1.11-.57.29-.32-2.33-2.25-2.63-1-.15.71-.3-.36-.52.2,0,.56-.31.79-1,.7a15.63,15.63,0,0,0-2.63.67c-.14-.33-.84-1.55-1.56-.44.23-.32-1.14-2.21-2.26-.5a15.94,15.94,0,0,1-3.6-.06c-.23-.59-1.11.25-1.25.6s-.59-.6-.89-.07a1,1,0,0,0,.07.94l-.07-.07c-1.44-1.51-1.15,1-1.15-.62a2.57,2.57,0,0,1-1.21.65c.17-.1-3.62-2-3,.17-.33-1.11-2.16-.88-2.88,0-.64-.14-1.27-.31-1.89-.5C795,58.87,792,59,792,59c-.38.07-2.81-.94-1.94-1.44-.62.37-.67-.24-1.19-.2-3.34.21,1.55-2.1-3.15-.61a17,17,0,0,1-2.14-.19c-.22.13-.69-.67-.74-.53s-.52-.41-.73-.08c-.33.56-3.07.26-4.07.27a5,5,0,0,0-2.68-.77c-.24-.73-.44-.45-.89-.26a5.27,5.27,0,0,1-.41.4c-1,.13-1.42-.12-1.21-.74-.79.68-1.2-.27-1.46.14s-.36-.2-.63.16-.3-.33-.79,0-.47-.16-.83.17-.36-.06-.79.21-2.68-.1-3.35.06c0,0-.72.5-.89.07s-.47-.73-.62-.43-.73-.14-.78,0c.19-.5-1.51-2.18-2.51-.84-.15.2-.79-.5-1.11-.1s-.57-.3-.83,0c-.64.22-1,0-1.19-.59a8,8,0,0,1-2.68.2s-2.44-1.15-2.34-.38a1.58,1.58,0,0,0-1.53-.2,14.65,14.65,0,0,0-2.56-1.2c-.42.27-1.25-.72-1.72,0s-8.67-2.06-8.54-2.13q-.93-1.11-1.62-.3c-.71,1-1-.48-1-.82.05-.12.06-.14-.14,0l-.1.08c-.64.5-1.15-.92-2-.07s-4.46-.07-5.56,1a14.21,14.21,0,0,0-1.46.19c-.31.44-.31.74-.63.08s-.15-1.45-.72-.65a2.5,2.5,0,0,0-2.09.44c-.12.24-3.6.57-3.72.27a18.35,18.35,0,0,0-4.77-.94c-.2.17-3.9-.6-3.65.61a2.64,2.64,0,0,0-1.72-.2s-.22.47-.49.2.37-.74-.25-.27-.89.66-1,.4a1,1,0,0,0-1.09.36,16.55,16.55,0,0,0-2.83.85s-6.55-1.85-6-1.12c-.17-.2-2.7-.78-3.1-1a16.16,16.16,0,0,1-2-.27c-.55.62-.6-2.55-3.1-.7-.3.23-.73-.37-1.09,0a10.54,10.54,0,0,1-2.46.4.83.83,0,0,0-.93-.16,5.17,5.17,0,0,0-2,.06,4.21,4.21,0,0,1-1.67-.63c-.47.54-.47-.27-1,.16-.22.17-2.06-.35-2.3-.19-1.09.68-1-.83-2.19.6-1.83,2.62-.14-.7-1.21.57a3.61,3.61,0,0,1-2.62.7,14,14,0,0,0-3.6.1c-.54-.76-1.09-1.2-2.21-.44-.52.37-.62-.06-.94.27s-.67-.1-.94.1c-.1.08-2.26-1.33-2.41-1.14a2.9,2.9,0,0,1-1.87.61c-.22.16-.47-.3-.74,0l-.88.46a3,3,0,0,0-1.16-.1c-.37.37-.67-.2-1.1.17s-.52-.2-.89.13a.4.4,0,0,1-.72-.16c-.29-.66-.88-.31-1.84,0-.67.2-.57-.93-1.09-.49-1,.79-8-3.25-10.73-1.92a4.27,4.27,0,0,1-2-.41c-.42-.76-1.6-1.27-3.82-.69.67-.19-6-1-5.59-.27-.32-.5-.63-.87-.95-.46s-.89-.17-1.31,0-.93-.45-1.15-.22a6.7,6.7,0,0,0-3.08-.58,4.85,4.85,0,0,0-2.41-1.11c-.37.07.73-1.41-.84-.7-1.07.45-1.87.38-2.39-.2a2,2,0,0,1-2-1.41c-.22-.14-1.16-.74-1.73,0-1,.22-1.95.43-2.93.63-.07,0-4.06.17-3.88.68a1.5,1.5,0,0,0-1.56.26,1.88,1.88,0,0,0-1.84-.26s-.15-.6-.37-.33-.42,0-.47-.14a2.58,2.58,0,0,0-1.3-.17c-.16.12-4.79.63-4.86.7-.47.48-2.9-.43-4.18.57.06-.05-2.77.33-2.58.06-.35.51-5,1.35-4.95,1.51-.07-.33-.44-.5-.84,0A16.53,16.53,0,0,0,579.49,46c0,.07-.13,0-.29-.13s-.05,0-.06-.08c-.52-.71-.62-.77-.94,0a1.76,1.76,0,0,1-.13.25c-.14.25-.07-.23-.56.17a3.33,3.33,0,0,1-2,.44,1.07,1.07,0,0,0-1.74-.44c-.48.32-3.48.31-3.72.68s-.4-.21-1,.13c0,0-3.5.46-3.24.17-.71.19-1.42.36-2.15.5a6.53,6.53,0,0,0-1.87.3c.23-.17-3.16-1-2.68-.37-.3-.4,0-1-.67-.26s-.58,0-1.25.3c0,0-.3.09-.61.21-.59-.09-.87.05-.84.44a.69.69,0,0,1-.43,0,.87.87,0,0,0-.3-.42.83.83,0,0,0-.61,0c-.77-.81-9.61-2.32-11.32-2.09a10.37,10.37,0,0,0-1.36.47,3.34,3.34,0,0,1-2.5-.7c-.66-.26-2.58-1-3-1.09-6.32-1.2-10.82-3.27-17.77-3.57a18,18,0,0,1-10.63-1.18c-1.7.16-8.61.84-8.78.6a9.64,9.64,0,0,0-2.21-.16c-1.54-.64-2-.5-1.37.43-.88,0-.7-1.12-1.95-.37l-.31.21a.8.8,0,0,0-.38.14,5.51,5.51,0,0,0-.7-.31c-.26.07-.51.14-.76.23a.93.93,0,0,0-.34-.18c-.15-.12-.26-.23-.26-.23-1.09-.86-1.11.2-2,.16.11-.13-10.15-1.84-12-2.11,0,0-.86-.59-1.32-.41a1.49,1.49,0,0,0-1.32.23c-1.49,1.57-5.26,1.5-8.16.27-2.83-.18-11.89-.8-13.89.53-.71.47-.17-.42-1.19.81.25-.3-1.65,1.17-1.54.31a4.25,4.25,0,0,1-1.81.07l-3.19.78a3.58,3.58,0,0,1-2.65.43,9.53,9.53,0,0,0-1.21-.6c-5.61-1.39-15.15,1.23-20.19,2.67-3.49-.41-5.71,0-7.36.71l-.3,0c-.46-.5-.82-.61-1.07-.35-.1,0-.19,0-.42-.3-.5-.67-.62-.48-.68.13a2,2,0,0,0-.4.29q-.41-.9-1.5-.48c-.15-.12-.32-.05-.5,0H408a10.92,10.92,0,0,1-3.58-.58c-.23-.24-4.58-.49-4.86-.7a2.58,2.58,0,0,0-1.3.17c0,.14-.27.4-.47.14s-.37.33-.37.33a1.88,1.88,0,0,0-1.84.26A1.5,1.5,0,0,0,394,42.5c.18-.51-3.81-.63-3.88-.68-1-.2-2-.41-2.93-.63-.57-.74-1.51-.14-1.73,0a2,2,0,0,1-2,1.41c-.52.58-1.32.65-2.39.2-1.57-.71-.47.77-.84.7a4.85,4.85,0,0,0-2.41,1.11,6.7,6.7,0,0,0-3.08.58c-.22-.23-.73.41-1.15.22s-1,.39-1.31,0-.63,0-.95.46c.44-.73-6.23.09-5.59.27-2.36-.62-3.42,0-3.82.69a4.27,4.27,0,0,1-2,.41c-2.86-1.37-9.58,2.84-10.73,1.92-.52-.44-.42.69-1.09.49-1-.27-1.55-.62-1.84,0a.4.4,0,0,1-.72.16c-.37-.33-.48.24-.89-.13s-.73.2-1.1-.17a3,3,0,0,0-1.16.1l-.88-.46c-.27-.3-.52.16-.74,0a2.9,2.9,0,0,1-1.87-.61c-.15-.19-2.31,1.22-2.41,1.14-.27-.2-.64.24-.94-.1s-.42.1-.94-.27c-1.44-1-2-.22-2.21.44a14,14,0,0,0-3.6-.1,3.61,3.61,0,0,1-2.62-.7c-1.07-1.27.62,2-1.21-.57-1.19-1.43-1.1.08-2.19-.6-.24-.16-2.08.36-2.3.19-1-.75-3.52,1.29-4.72.41a.83.83,0,0,0-.93.16,10.54,10.54,0,0,1-2.46-.4c-.36-.33-.79.27-1.09,0-2.5-1.85-2.55,1.32-3.1.7a16.16,16.16,0,0,1-2,.27c-.4.21-2.93.79-3.1,1,.59-.73-5.92,1.12-6,1.12a16.55,16.55,0,0,0-2.83-.85,1,1,0,0,0-1.09-.36c-.11.26-.36.06-1-.4s0,0-.25.27-.49-.2-.49-.2a2.64,2.64,0,0,0-1.72.2c.25-1.21-3.45-.44-3.65-.61s-4.74.88-4.77.94c-.12.3-3.6,0-3.72-.27a2.5,2.5,0,0,0-2.09-.44c-.57-.8-.42,0-.72.65s-.32.36-.63-.08a14.21,14.21,0,0,0-1.46-.19c-1.1-1.11-4.54-.12-5.56-1s-1.38.57-2,.07l-.1-.08c-.2-.15-.19-.13-.14,0,.06.34-.26,1.83-1,.82q-.69-.81-1.62.3c.15.09-8,2.91-8.54,2.13s-1.3.31-1.72,0a14.65,14.65,0,0,0-2.56,1.2,1.58,1.58,0,0,0-1.53.2c.1-.77-2.37.35-2.34.38a8,8,0,0,1-2.68-.2c-.15.61-.55.81-1.19.59-.26-.26-.53.44-.83,0s-1,.3-1.11.1c-1-1.34-2.7.34-2.51.84,0-.14-.62.3-.78,0s-.47,0-.62.43-.89-.07-.89-.07c-.67-.16-2.78.32-3.35-.06s-.43.13-.79-.21-.36.21-.83-.17-.54.35-.79,0-.37.24-.63-.16-.67.54-1.46-.14c.21.62-.19.87-1.21.74a5.27,5.27,0,0,1-.41-.4c-.45-.19-.65-.47-.89.26a5,5,0,0,0-2.68.77c-1.16,0-3.72.32-4.07-.27-.21-.33-.68.21-.73.08s-.52.66-.74.53a17,17,0,0,1-2.14.19c-4.7-1.49.19.82-3.15.61-.52,0-.57.57-1.19.2.87.5-1.56,1.51-1.94,1.44,0,0-3-.17-2.66.1-.62.19-1.25.36-1.89.5-.72-.85-2.55-1.08-2.88,0,.58-2.14-3.2-.26-3-.17a2.57,2.57,0,0,1-1.21-.65c0,1.66.29-.89-1.15.62l-.07.07a1,1,0,0,0,.07-.94c-.3-.53-.67.57-.89.07s-1-1.19-1.25-.6a13.17,13.17,0,0,1-3.6.06c-.87-1.32-2.62,0-2.26.5-.72-1.11-1.42.11-1.56.44A15.63,15.63,0,0,0,183,58.4c-.72.09-1.07-.14-1-.7-.22-.56-.37.51-.52-.2-.31-1.3-2.89.73-2.63,1-.12-.18-1.18.3-1.11.57-.18-.08-.51-.18-.51-.18a1.35,1.35,0,0,0-1.68.17c-.61-1.65-2.89-1.23-2.93-1.3a1.89,1.89,0,0,1-1.45.36c-.26.49-.71.59-1.36.3s-1.14-.3-1.72-.43c-.37-.47-.49.07-.74-.5s-.69.3-.94-.14a1.41,1.41,0,0,1-1.39-.51c-.38-.47-1-.55-1.9-.25-.32-.53-.49.87-.74.49a2.38,2.38,0,0,0-2.26,0c-.2.46-.2.44-.67.24s-.57.11-1-.24c-.59-.49-4.42,1.1-4.44,1.07s-.94.54-1.52.08c.07.06-2.06,1.83-2.88.36-.3-.56.17,1.54,0,1.34s-.77.57-1.21.14-.4.6-.47.36-.77-.77-.77-.77c-.09.82-2.67,3.47-4.25,1.51-.57-.74-.62.3-.77-.3.05.17-2.27-.92-3.19-.84-.42,0-.47-1.3-.47-1.3l-.89-.17c.14-.69-.05-.69-.59,0V58a2.43,2.43,0,0,1-1.72.33,1.63,1.63,0,0,1-1.67-1.06c-.52-.9-.79,1-1,.43s-3.58-.46-3.72-.61c-1.62-1.62-4.8.63-6.17-.49s-8.08-.51-9-1.71c-1.67-1.93-9.61-.08-9.69-.2,0,.05-1.9.15-2.1-.19s-.67.19-.88,0c-.33-.6-.76-.6-1.31,0,0-.34-.17-.3-.52.09l-.42-.26c-.79-.68-1.74-1-2-.21a3.39,3.39,0,0,1-3.3.91,10.35,10.35,0,0,0-3.18,1q-.86-1-1.2,0a6.26,6.26,0,0,1-.64-.47c-.2-.21-.62.33-.73,0s-.47.3-.67,0c-.45-.55-.85-.55-1.21,0-1-1-1.14-.89-.9,0A6.76,6.76,0,0,1,84,54.42c-.07-.22-.47,1.18-.47,1.18-.89.08-1.38.42-1.37,1a1.05,1.05,0,0,0-1.41.81,7.71,7.71,0,0,1-1.25-1C76.67,53,65.44,58,62.57,55.6c.4.33-1.6,1-1.58,1-.7-.3-3-1-3-1-.74-.66-.9,1.92-2.51.56-.3-.26-.72.34-1,.21-1.72-.75-9.34-.7-9.41-.77-.61.27-3.25.61-3.78,0s-.72.3-.84,0a3.85,3.85,0,0,0-.83-1c.44.45-3.38,0-3.65-.2-1.27-.81-11.38-.13-11.52-.47.05.13-3.68-1.29-3.3-1.42,0,3.3-12,1.62-12.5,1-.3-.47-.2,1.46-.72,1.29-1.1-.34-2.46,2-2.51,2.66,0,0-.74,1.19-1.36.83-1.4.43-1.95.21-1.67-.67-.12-.49-1.16.29-1.16.29l-.31-.2a1.18,1.18,0,0,0-.84,0V72H1000Z"></path></g></g></svg></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-18326c2db80" style="">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-181fc1ba460">
                <h2 class="" data-css="tve-u-18326c5db36" style=""><span data-css="tve-u-18326c5a6be" style="font-weight: bold;"><br></span><span data-css="tve-u-18326c32a56" style="font-weight: bold;">*Flat Sale ONLY For Today - Special Offer*</span><span data-css="tve-u-18326c5db5c" style="font-weight: bold;">&nbsp;</span></h2>
                <h2
                    class="" data-css="tve-u-181f977e3a7"><span data-css="tve-u-18326c2c2fd" style="font-weight: bold; font-size: 47px;">*</span><span data-css="tve-u-18326c368c2">Order Fluxactive™ &amp; Save Upto $300 + 60 Day Money Back* *<span style="font-size: 57px;" data-css="tve-u-18326c42723">Guarantee*</span></span>
                    </h2>
                    <p><strong></strong><br></p>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone">
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1107;" data-css="tve-u-17df78e92a8">
                <div class="tcb-flex-row v-2 tcb-resized tcb--cols--3" data-css="tve-u-17df78f8557" style="">
                    <div class="tcb-flex-col" data-css="tve-u-182b4995f6d" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df77ff17b">
                                <p data-css="tve-u-17df77fa6fe" style="text-align: center;">1 Bottle</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element">
                                <p data-css="tve-u-17df781b12a" style="text-align: center;">1 Month Supply</p>
                            </div>
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df789e173" style=""><span class="tve_image_frame"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview.png" class="tve_image entered litespeed-loaded wp-image-99" alt="Fluxactive" data-id="99" width="259" data-init-width="500" height="259" data-init-height="500" title="Fluxactive" data-src="https://flux-active.info/wp-content/uploads/2022/09/prod_1_bottle.png" data-width="259" data-height="259" data-css="tve-u-18330a0377c" style="" data-ll-status="loaded" loading="lazy" srcset="https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview.png 500w, https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview-300x300.png 300w, https://flux-active.info/wp-content/uploads/2022/09/71qYSrPK6LL._SL1500_-removebg-preview-150x150.png 150w" sizes="(max-width: 259px) 100vw, 259px" /><noscript><img decoding="async" class="tve_image wp-image-59" alt="" data-id="59" width="170" data-init-width="414" height="275" data-init-height="669" title="prod_1_bottle" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/prod_1_bottle.png" data-width="170" data-height="275" data-css="tve-u-17df789e20a" style=""></noscript></span></div>
                            <div
                                class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-18330a35b12">
                                <p data-css="tve-u-182b497eba3" style="text-align: center;">$59 per Bottal</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df78521ef" style="text-align: center;">Total: <span data-css="tve-u-17df786674c" style="text-decoration: line-through;">$199</span>&nbsp;$69</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df785bae2" style="text-align: center;">You Save $130</p>
                        </div>
                        <div class="thrv_wrapper tve_image_caption" data-css="tve-u-18330a34540" style=""><span class="tve_image_frame"><a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" rel="" title="ORDER NOW" class="thirstylinkimg" target="" data-linkid="243" data-nojs="false"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png" class="tve_image entered litespeed-loaded wp-image-36" alt="Fluxactive" data-id="36" width="364" data-init-width="540" height="112" data-init-height="166" title="Order-Now-2" data-src="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png" data-width="364" data-height="112" data-link-wrap="true" data-ll-status="loaded" loading="lazy" srcset="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png 540w, https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2-300x92.png 300w" sizes="(max-width: 364px) 100vw, 364px" /><noscript><img decoding="async" class="tve_image wp-image-246" alt="" data-id="246" width="357" data-init-width="540" height="110" data-init-height="166" title="Order-Now-2" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png" data-width="357" data-height="110" data-link-wrap="true"></noscript></a></span></div>
                    </div>
                </div>
                <div class="tcb-flex-col" data-css="tve-u-182b4963568" style="">
                    <div class="tcb-col">
                        <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df77ff17b">
                            <p data-css="tve-u-17df77fa6fe" style="text-align: center;">6 Bottle</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df781b12a" style="text-align: center;">6 Month Supply</p>
                        </div>
                        <div class="tcb-clear" data-css="tve-u-183309fb38e">
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df782bd4f" style="margin-right: 10px !important; padding-right: 0px !important;"><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/10/images-removebg-preview.webp" class="tve_image entered litespeed-loaded wp-image-170" alt="Fluxactive" data-id="170" width="345" data-init-width="258" height="261" data-init-height="195" title="images-removebg-preview" data-src="https://flux-active.info/wp-content/uploads/2022/09/prod_6_bottle.png" data-width="345" data-height="261" data-css="tve-u-181fc414006" style="" ml-d="-6.7620000000000005" data-ll-status="loaded" mt-d="-0.07799999999997453" loading="lazy"><noscript><img decoding="async" class="tve_image wp-image-60" alt="" data-id="60" width="371" data-init-width="993" height="268" data-init-height="717" title="prod_6_bottle" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/prod_6_bottle.png" data-width="371" data-height="268" data-css="tve-u-181fc414006" style="" ml-d="-14.262"></noscript></span></div>
                        </div>
                        <div class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-182b497eba3" style="text-align: center;">$39 per Bottal</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df78521ef" style="text-align: center;">Total: <span data-css="tve-u-17df786674c" style="text-decoration: line-through;">$1194</span>&nbsp;$294</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df785bae2" style="text-align: center;">You Save $900</p>
                        </div>
                        <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7870511"><span class="tve_image_frame"><a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" rel="" title="ORDER NOW" class="thirstylinkimg" target="" data-linkid="243" data-nojs="false"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png" class="tve_image entered litespeed-loaded wp-image-36" alt="Fluxactive" data-id="36" width="328" data-init-width="540" height="101" data-init-height="166" title="Order-Now-2" data-src="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png" data-width="328" data-height="101" data-link-wrap="true" data-ll-status="loaded" style="" data-css="tve-u-182b4a47df5" loading="lazy" srcset="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png 540w, https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2-300x92.png 300w" sizes="(max-width: 328px) 100vw, 328px" /><noscript><img decoding="async" class="tve_image wp-image-246" alt="" data-id="246" width="357" data-init-width="540" height="110" data-init-height="166" title="Order-Now-2" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png" data-width="357" data-height="110" data-link-wrap="true"></noscript></a></span></div>
                    </div>
                </div>
                <div class="tcb-flex-col" data-css="tve-u-182b499aaf0">
                    <div class="tcb-col">
                        <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df77ff17b">
                            <p data-css="tve-u-17df77fa6fe" style="text-align: center;">3 Bottle</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df781b12a" style="text-align: center;">3 Month Supply</p>
                        </div>
                        <div class="tcb-clear" data-css="tve-u-18330a10359">
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df78cf701" style="padding-left: 0px !important;"><span class="tve_image_frame" style=""><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/10/fluxactive-2.webp" class="tve_image entered litespeed-loaded wp-image-180" alt="Fluxactive" data-id="180" width="278" data-init-width="824" height="239" data-init-height="709" title="fluxactive-2" data-src="https://flux-active.info/wp-content/uploads/2022/09/prod_3_bottle-1.png" data-width="278" data-height="239" data-css="tve-u-182b49bbf05" style="" data-ll-status="loaded" ml-d="0" loading="lazy" center-h-d="false" srcset="https://flux-active.info/wp-content/uploads/2022/10/fluxactive-2.webp 824w, https://flux-active.info/wp-content/uploads/2022/10/fluxactive-2-300x258.webp 300w, https://flux-active.info/wp-content/uploads/2022/10/fluxactive-2-768x661.webp 768w" sizes="(max-width: 278px) 100vw, 278px" /><noscript><img decoding="async" class="tve_image wp-image-81" alt="" data-id="81" width="264" data-init-width="744" height="254" data-init-height="717" title="prod_3_bottle (1)" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/prod_3_bottle-1.png" data-width="264" data-height="254" data-css="tve-u-181fc4166ae" style=""></noscript></span></div>
                        </div>
                        <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-18330a2c956">
                            <p data-css="tve-u-182b497eba3" style="text-align: center;">$49 per Bottal</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df78521ef" style="text-align: center;">Total: <span data-css="tve-u-17df786674c" style="text-decoration: line-through;">$567</span>&nbsp;$177</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df785bae2" style="text-align: center;">You Save $420</p>
                        </div>
                        <div class="thrv_wrapper tve_image_caption" data-css="tve-u-18330a1ae7f" style="margin-bottom: 18px !important; padding-top: 0px !important;"><span class="tve_image_frame"><a href="https://8mekb.bemobtrcks.com/go/8b196ee9-40fd-4a0c-92bd-9b9b39197359" rel="" title="ORDER NOW" class="thirstylinkimg" target="" data-linkid="243" data-nojs="false"><img decoding="async" data-lazyloaded="1" src="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png" class="tve_image entered litespeed-loaded tcb-moved-image wp-image-36" alt="Fluxactive" data-id="36" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2" data-src="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png" data-width="346" data-height="106" data-link-wrap="true" data-ll-status="loaded" style="" data-css="tve-u-183355bbb90" loading="lazy" srcset="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png 540w, https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2-300x92.png 300w" sizes="(max-width: 346px) 100vw, 346px" /><noscript><img decoding="async" class="tve_image wp-image-246" alt="" data-id="246" width="357" data-init-width="540" height="110" data-init-height="166" title="Order-Now-2" loading="lazy" src="https://flux-active.info/wp-content/uploads/2022/09/Order-Now-2.png" data-width="357" data-height="110" data-link-wrap="true"></noscript></a></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
                </div>
            </div>
        </div>
    </div>
   
        </div>
    </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df7c6c972"></div>
        <div class="tve-page-section-in" data-css="tve-u-18330a6e8e0">
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-17df7c8fc30" style="">
                <div class="tve-content-box-background"></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1007;">
                        <div class="tcb-flex-row tcb--cols--2 tcb-resized" data-css="tve-u-16c239f72b3">
                            <div class="tcb-flex-col" data-css="tve-u-181fc5dad88" style="">
                                <div class="tcb-col">
                                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-16c239da3ea">
                                        <p style="" data-css="tve-u-17df7c6f6f1">© <span class="thrive-shortcode-content" data-attr-id="Y" data-extra_key="Y" data-option-inline="1" data-shortcode="thrv_dynamic_data_date" data-shortcode-name="Year (2029)">2023</span>, <span style="color: rgb(255, 255, 255);"
                                                data-css="tve-u-18330a5c571"><a href="http://www.trbcards.us/" </a></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tcb-flex-col" data-css="tve-u-181fc5dadbd" style="">
                                <div class="tcb-col">
                                    <div class="tcb-clear" data-css="tve-u-16c23a0387d">
                                        <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-16c239fcb85">
                                            <div class="tve-content-box-background"></div>
                                            <div class="tve-cb">
                                                <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-16c239dc0ca">
 | <a href="https://fluxactive.net/help/privacy.php" class="tve-froala fr-basic"
                                                            style="outline: none;">Privacy Policy</a> | <a href="https://fluxactive.net/help/disclaimer.php" class="tve-froala" style="outline: none;">Disclaimer</a> | <a href="https://fluxactive.net/help/terms.php" class="tve-froala"
                                                            style="outline: none;">Terms &amp; Conditions</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df7c7a766" style="text-align: center;">FDA Compliance</p>
            </div>
            <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7c8d11a" style="">
                <p data-css="tve-u-17df7c85435" style="text-align: center;"><span data-css="tve-u-182b0daf382">All content and information found on this page are for informational purposes only and are not intended to diagnose, treat, cure or prevent any disease. The FDA hasn\'t evaluated the statements provided on this page. Make sure you consult with a licensed doctor before taking any supplement or making any changes to your diet or exercise plan. Individual results may vary . </span>
                    <a
                      
            </div>
        </div>
    </div>


























    </div>
    </div>
    </div>
    <div class="fr-dropdown-holder tcb-style-wrap"></div>
    </div>
    <script type="rocketlazyloadscript" id="generate-a11y">!function(){"use strict";if("querySelector"in document&&"addEventListener"in window){var e=document.body;e.addEventListener("mousedown",function(){e.classList.add("using-mouse")}),e.addEventListener("keydown",function(){e.classList.remove("using-mouse")})}}();</script>
    <script
        type="rocketlazyloadscript" data-rocket-type="text/javascript">window.addEventListener(\'DOMContentLoaded\', function() {var TVE_Event_Manager_Registered_Callbacks = TVE_Event_Manager_Registered_Callbacks || {};TVE_Event_Manager_Registered_Callbacks.thrive_animation = function(trigger, action, config) {var $element
        = jQuery( this ), $at = $element.closest( \'.tcb-col, .thrv_wrapper\' ); if ( $at.length === 0 ) { $at = $element; } if ( ! config.loop && $at.data( \'a-done\' ) ) { return; } $at.data( \'a-done\', 1 ); $at.removeClass( function ( i, cls ) { return
        cls.split( \' \' ).filter( function ( item ) { return item.indexOf( \'tve_anim_\' ) === 0; } ).join( \' \' ); } ).addClass( \'tve_anim_\' + config.anim ).removeClass( \'tve_anim_start\' ); if ( config.loop ) { $at.addClass( \'tve_anim_start\' ); if ( trigger
        === \'mouseover\' ) { $element.one( \'mouseleave\', function () { $at.removeClass( \'tve_anim_start\' ); } ); } if ( trigger === \'tve-viewport\' ) { $element.one( \'tve-viewport-leave\', function () { /** * double check for viewport * animation in animation
        triggers weird behaviors */ if ( ! TCB_Front.isInViewport( $element ) ) { $at.removeClass( \'tve_anim_start\' ); } } ); } } else { setTimeout( function () { $at.addClass( \'tve_anim_start\' ); }, 50 ); } return false; };TVE_Event_Manager_Registered_Callbacks.thrive_zoom
        = function(trigger,action,config){var $target = jQuery( this ), offset = $target.offset(), target_w = $target.outerWidth(), target_h = $target.outerHeight(), $element = $target, sameImage = ( config.url && $element.attr( \'src\' ) && $element.attr(
        \'src\' ) === config.url ) || ( config.id && $element.attr( \'data-id\' ) && $element.attr( \'data-id\' ) == config.id ); if ( config.id ) { $fullSize = jQuery( "#tcb-image-zoom-" + config.id + " img" ); if ( $fullSize.length ) { $element = $fullSize;
        } } /* If it is the same img but set from Anim&Action work like Open full size image on click*/ if ( ! sameImage || ( sameImage && config.sizeChanged ) ) { if ( config.id ) { $element = jQuery( "#tcb-image-zoom-" + config.id + " img" ) } else
        if ( $element.find( "img" ).length ) { $element = $element.find( "img" ) } } $element = $element.first(); var imageSrc = $element.attr( "data-opt-src" ) || $element.attr( "src" ), imgAlt = $target.attr( \'alt\' ) || \'\', $lightbox = jQuery( \'#tve_zoom_lightbox\'
        ), $overlay = jQuery( \'#tve_zoom_overlay\' ), windowWidth = window.innerWidth, windowHeight = window.innerHeight, img_size = $element.data( "tve-zoom-clone" ), resizeScale = windowWidth
        < 600 ? 0.8 : 0.9; if ( imageSrc.indexOf( \'data:image\' ) !==-
            1 && $element.attr( \'data-src\' ) ) { imageSrc=$ element.attr( \'data-src\' ); } /** * Force lazy load of the image */ if ( window.lazySizes ) { lazySizes.loader.unveil( $element[ 0 ] ); } if ( typeof img_size===\'undefined\' ) { var $clone=$ element.clone()
            .css( { position: "absolute", width: "", height: "", left: "-8000px", top: "-8000px" } ).removeAttr( "width height" ); $clone.appendTo( "body" ); /** * `.one()` ensures this will not get executed multiple times. */ $clone.one( \'load\', function
            () { var $parent=$ element.parent(), height=p arseFloat( $element.attr( \'data-init-height\' ) ) || parseFloat( $element.attr( \'height\' ) || $element.height() ), width=p arseFloat( $element.attr( \'data-init-width\' ) ) || parseFloat( $element.attr(
            \'width\' ) || $element.width() ); /** * If we cant get the size try to make the parent visible until we get img props */ if ( ! ( height && width ) ) { $parent.css( {display: \'block\', visibility: \'hidden\'} ); height=$ element.height(); width=$ element.width();
            $parent.css( {display: \'hidden\', visibility: \'\'} ); } img_size={ "originalWidth": width, "width": width, "originalHeight": height, "height": height }; if ( img_size.originalWidth> windowWidth * resizeScale || img_size.originalHeight > windowHeight * resizeScale ) { var widthPercent = img_size.originalWidth / windowWidth, heightPercent = img_size.originalHeight / windowHeight; img_size.width = ( ( widthPercent > heightPercent
            ) ? ( windowWidth * resizeScale ) : ( windowHeight * resizeScale * ( img_size.originalWidth / img_size.originalHeight ) ) ); img_size.height = ( ( widthPercent > heightPercent ) ? ( windowWidth * resizeScale * ( img_size.originalHeight / img_size.originalWidth
            ) ) : ( windowHeight * resizeScale ) ); img_size.width += 30; img_size.height += 30; } $element.data( "tve-zoom-clone", img_size ); show_lightbox(); } ); /** * Firefox doesnt trigger load event for the clone when is open full size image */
            if ( TCB_Front.browser.mozilla && ( sameImage || typeof sameImage === \'undefined\' ) ) { $clone.trigger( \'load\' ); } else if ( imageSrc.includes( \'.optimole.com/\' ) ) { /** * Optimole w/ lazy-load will actually trigger loading of this image
            URL earlier. * Image is already loaded at this point. Just need to trigger the load event manually */ $clone.trigger( \'load\' ); } else { /** * Finally, some failsafe mechanism, trigger the load event with a delay. There have been cases reported
            where it does not "always" work. */ setTimeout( function () { $clone.trigger( \'load\' ); }, 500 ); } } else { show_lightbox(); } function show_lightbox() { if ( $lightbox.length ) { $lightbox.show(); } else { $lightbox = jQuery( "
            <div id=\'tve_zoom_lightbox\'>
                <div class=\'tve_close_lb thrv-icon-cross\'></div>
                <div id=\'tve_zoom_image_content\'></div>
            </div>" ) .appendTo( \'body\' ); $overlay = jQuery( "
            <div id=\'tve_zoom_overlay\'></div>" ).hide() .appendTo( \'body\' ); var tve_close_lb = function () { $lightbox.hide(); $overlay.hide(); }; /* set listeners for closing the lightbox */ jQuery( document ).on( "click", ".tve_close_lb", tve_close_lb ); jQuery( document ).on(
            "click", "#tve_zoom_overlay", tve_close_lb ); jQuery( document ).on( "keyup", function ( e ) { if ( e.keyCode == 27 ) { tve_close_lb(); } } ); jQuery( window ).resize( function () { var _sizes = $lightbox.data( "data-sizes" ), windowWidth
            = window.innerWidth, windowHeight = window.innerHeight, resizeScale = windowWidth
            < 600 ? 0.8 : 0.9; if ( _sizes.originalWidth> windowWidth * resizeScale || _sizes.originalHeight > windowHeight * resizeScale ) { var widthPercent = _sizes.originalWidth / windowWidth, heightPercent = _sizes.originalHeight / windowHeight; _sizes.width = ( ( widthPercent > heightPercent
                ) ? ( windowWidth * resizeScale ) : ( windowHeight * resizeScale * ( _sizes.originalWidth / _sizes.originalHeight ) ) ); _sizes.height = ( ( widthPercent > heightPercent ) ? ( windowWidth * resizeScale * ( _sizes.originalHeight / _sizes.originalWidth
                ) ) : ( windowHeight * resizeScale ) ); } $lightbox.width( _sizes.width ); $lightbox.css( "margin-left", - ( _sizes.width + 30 ) / 2 ); $lightbox.css( "margin-top", - ( _sizes.height + 30 ) / 2 ); } ); } $lightbox.data( "data-sizes", img_size
                ); jQuery( "#tve_zoom_image_content" ).html( "<img src=\'" + imageSrc + "\' alt=\'" + imgAlt + "\' />" ); $lightbox.css( { left: offset.left + target_w / 2, top: offset.top + target_h / 2, marginLeft: 0, marginTop: 0, width: 0, opacity: 0
                } ).animate( { opacity: 1, left: \'50%\', top: \'50%\', marginLeft: - ( img_size.width + 30 ) / 2, marginTop: - ( img_size.height + 30 ) / 2, width: img_size.width }, 150 ); $overlay.fadeIn( 150 ); } return false;};});</script>
                <script type="rocketlazyloadscript"
                    data-rocket-type="text/javascript">
                    window.addEventListener(\'DOMContentLoaded\', function() {
                        (function($) {
                            var _DELTA = 200, //for slide top animation {transform: translateY(-200px)}
                                $window = $(window),
                                trigger_elements = function(elements) {
                                    elements.each(function() {
                                        var $elem = $(this),
                                            lb_content = $elem.parents(\'.tve_p_lb_content\'),
                                            ajax_content = $elem.parents(\'.ajax-content\'),
                                            inViewport = TCB_Front.isInViewport($elem, _DELTA) || isOutsideBody($elem) || isAtTheBottomOfThePage($elem);

                                        if (lb_content.length) {
                                            lb_content.on(\'tve.lightbox-open\', function() {
                                                if (!$elem.hasClass(\'tve-viewport-triggered\')) {
                                                    $elem.trigger(\'tve-viewport\').addClass(\'tve-viewport-triggered\');
                                                }
                                            });
                                            return;
                                        }
                                        if (ajax_content.length) {
                                            ajax_content.on(\'content-inserted.tcb\', function() {
                                                if (inViewport && !$elem.hasClass(\'tve-viewport-triggered\')) {
                                                    $elem.trigger(\'tve-viewport\').addClass(\'tve-viewport-triggered\');
                                                }
                                            });
                                            return;
                                        }

                                        if (inViewport) {
                                            $elem.trigger(\'tve-viewport\').addClass(\'tve-viewport-triggered\');
                                        }
                                    });
                                },
                                trigger_exit = function(elements) {
                                    elements.each(function() {
                                        var $elem = $(this);

                                        if (!(TCB_Front.isInViewport($elem, _DELTA) || isOutsideBody($elem))) {
                                            $elem.trigger(\'tve-viewport-leave\').removeClass(\'tve-viewport-triggered\');
                                        }
                                    });
                                },
                                /**
                                 * Returns true if the element is located at the bottom of the page and the element is in viewport
                                 */
                                isAtTheBottomOfThePage = function($elem) {
                                    return TCB_Front.isInViewport($elem, 0) && $window.scrollTop() >= parseInt($elem.offset().top + $elem.outerHeight() - window.innerHeight);
                                },
                                /**
                                 * Check if element is always outside of the viewport, is above the top scroll
                                 * @param element
                                 * @returns {boolean}
                                 */
                                isOutsideBody = function(element) {
                                    if (element.jquery) {
                                        element = element[0];
                                    }

                                    var rect = element.getBoundingClientRect();

                                    /* we\'ve scrolled maximum to the top, but the element is above */
                                    return window.scrollY + rect.bottom < 0;

                                    /* leaving this commented, can be added if more bugs appear. it checks for bottom elements
                                    var $window = ThriveGlobal.$j( window ),
                                    	scrolledToBottom = $window.scrollTop() + $window.height() === ThriveGlobal.$j( document ).height();

                                    return ( scrolledToBottom && rect.top > ( window.innerHeight - delta ) );

                                     */
                                };
                            $(document).ready(function() {
                                window.tar_trigger_viewport = trigger_elements;
                                window.tar_trigger_exit_viewport = trigger_exit;

                                var $to_test = $(\'.tve_et_tve-viewport\');
                                $window.scroll(function() {
                                    trigger_elements($to_test.filter(\':not(.tve-viewport-triggered)\'));
                                    trigger_exit($to_test.filter(\'.tve-viewport-triggered\'));

                                });
                                setTimeout(function() {
                                    trigger_elements($to_test);
                                }, 200);
                            });
                        })
                        (jQuery);
                    });
                </script>
                <div class="tcb-image-zoom" style="display: none" id="tcb-image-zoom-173"><img width="1500" height="1500" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%201500%201500\'%3E%3C/svg%3E" class="attachment-full size-full" alt="Fluxactive" decoding="async" data-lazy-srcset="https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1.webp 1500w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-300x300.webp 300w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-1024x1024.webp 1024w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-150x150.webp 150w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-768x768.webp 768w"
                        data-lazy-sizes="(max-width: 1500px) 100vw, 1500px" data-lazy-src="https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1.webp" /><noscript><img width="1500" height="1500" src="https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1.webp" class="attachment-full size-full" alt="Fluxactive" decoding="async" srcset="https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1.webp 1500w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-300x300.webp 300w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-1024x1024.webp 1024w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-150x150.webp 150w, https://flux-active.info/wp-content/uploads/2022/10/71qYSrPK6LL._SL1500_-1-768x768.webp 768w" sizes="(max-width: 1500px) 100vw, 1500px" /></noscript></div>
                <script
                    id=\'ta_main_js-js-extra\'>
                    var thirsty_global_vars = {"home_url":"\/\/flux-active.info","ajax_url":"https:\/\/flux-active.info\/wp-admin\/admin-ajax.php","link_fixer_enabled":"yes","link_prefix":"recommends","link_prefixes":["recommends"],"post_id":"16","enable_record_stats":"yes","enable_js_redirect":"yes","disable_thirstylink_class":""};
                    </script>
                    <script type="rocketlazyloadscript" data-minify="1" src=\'https://flux-active.info/wp-content/cache/min/1/wp-content/plugins/thirstyaffiliates/js/app/ta.js?ver=1672899537\' id=\'ta_main_js-js\' defer></script>
                    <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-includes/js/imagesloaded.min.js?ver=4.1.4\' id=\'imagesloaded-js\' defer></script>
                    <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-includes/js/masonry.min.js?ver=4.2.2\' id=\'masonry-js\' defer></script>
                    <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-includes/js/jquery/jquery.masonry.min.js?ver=3.1.2b\' id=\'jquery-masonry-js\' defer></script>
                    <script id=\'tve_frontend-js-extra\'>
                        var tve_frontend_options = {
                            "ajaxurl": "https:\/\/flux-active.info\/wp-admin\/admin-ajax.php",
                            "is_editor_page": "",
                            "page_events": [],
                            "is_single": "1",
                            "social_fb_app_id": "",
                            "dash_url": "https:\/\/flux-active.info\/wp-content\/plugins\/thrive-visual-editor\/thrive-dashboard",
                            "translations": {
                                "Copy": "Copy",
                                "empty_username": "ERROR: The username field is empty.",
                                "empty_password": "ERROR: The password field is empty.",
                                "empty_login": "ERROR: Enter a username or email address.",
                                "min_chars": "At least %s characters are needed",
                                "no_headings": "No headings found",
                                "registration_err": {
                                    "required_field": "<strong>Error<\/strong>: This field is required",
                                    "required_email": "<strong>Error<\/strong>: Please type your email address.",
                                    "invalid_email": "<strong>Error<\/strong>: The email address isn&#8217;t correct.",
                                    "passwordmismatch": "<strong>Error<\/strong>: Password mismatch"
                                }
                            },
                            "routes": {
                                "posts": "https:\/\/flux-active.info\/wp-json\/tcb\/v1\/posts"
                            },
                            "post_request_data": [],
                            "ip": "194.26.135.17",
                            "current_user": [],
                            "post_id": "16",
                            "post_title": "Home Page",
                            "post_type": "page",
                            "post_url": "https:\/\/flux-active.info\/",
                            "is_lp": "tcb2-bright-smart-sales-page"
                        };
                    </script>
                    <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-content/plugins/thrive-visual-editor/editor/js/dist/frontend.min.js?ver=2.6.2.1\' id=\'tve_frontend-js\' defer></script>
                    <script type="rocketlazyloadscript" id=\'rocket-browser-checker-js-after\'>
                        "use strict";var _createClass=function(){function defineProperties(target,props){for(var i=0;i
                        <props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||!1,descriptor.configurable=!0, "value"in descriptor&&(descriptor.writable=!0),Object.defineProperty(target,descriptor.key,descriptor)}}return
                            function(Constructor,protoProps,staticProps){return protoProps&&defineProperties(Constructor.prototype,protoProps),staticProps&&defineProperties(Constructor,staticProps),Constructor}}();function _classCallCheck(instance,Constructor){if(!(instance
                            instanceof Constructor))throw new TypeError( "Cannot call a class as a function")}var RocketBrowserCompatibilityChecker=function(){function RocketBrowserCompatibilityChecker(options){_classCallCheck(this,RocketBrowserCompatibilityChecker),this.passiveSupported=!1,this._checkPassiveOption(this),this.options=!!this.passiveSupported&&options}return
                            _createClass(RocketBrowserCompatibilityChecker,[{key: "_checkPassiveOption",value:function(self){try{var options={get passive(){return!(self.passiveSupported=!0)}};window.addEventListener( "test",null,options),window.removeEventListener(
                            "test",null,options)}catch(err){self.passiveSupported=!1}}},{key: "initRequestIdleCallback",value:function(){!1 in window&&(window.requestIdleCallback=function(cb){var start=Date.now();return setTimeout(function(){cb({didTimeout:!1,timeRemaining:function(){return
                            Math.max(0,50-(Date.now()-start))}})},1)}),!1 in window&&(window.cancelIdleCallback=function(id){return clearTimeout(id)})}},{key: "isDataSaverModeOn",value:function(){return "connection"in navigator&&!0===navigator.connection.saveData}},{key:
                            "supportsLinkPrefetch",value:function(){var elem=document.createElement( "link");return elem.relList&&elem.relList.supports&&elem.relList.supports( "prefetch")&&window.IntersectionObserver&& "isIntersecting"in IntersectionObserverEntry.prototype}},{key:
                            "isSlowConnection",value:function(){return "connection"in navigator&& "effectiveType"in navigator.connection&&( "2g"===navigator.connection.effectiveType|| "slow-2g"===navigator.connection.effectiveType)}}]),RocketBrowserCompatibilityChecker}();
                            </script>
                            <script id=\'rocket-preload-links-js-extra\'>
                                var RocketPreloadLinksConfig = {
                                    "excludeUris": "\/(?:.+\/)?feed(?:\/(?:.+\/?)?)?$|\/(?:.+\/)?embed\/|\/(index\\.php\/)?wp\\-json(\/.*|$)|\/wp-admin\/|\/logout\/|\/wp-login.php|\/recommends\/",
                                    "usesTrailingSlash": "1",
                                    "imageExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif",
                                    "fileExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif|php|pdf|html|htm",
                                    "siteUrl": "https:\/\/flux-active.info",
                                    "onHoverDelay": "100",
                                    "rateThrottle": "3"
                                };
                            </script>
                            <script type="rocketlazyloadscript" id=\'rocket-preload-links-js-after\'>
                                (function() { "use strict";var r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e=function(){function
                                i(e,t){for(var n=0;n
                                <t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0, "value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,n){return
                                    t&&i(e.prototype,t),n&&i(e,n),e}}();function i(e,t){if(!(e instanceof t))throw new TypeError( "Cannot call a class as a function")}var t=function(){function n(e,t){i(this,n),this.browser=e,this.config=t,this.options=this.browser.options,this.prefetched=new
                                    Set,this.eventTime=null,this.threshold=1111,this.numOnHover=0}return e(n,[{key: "init",value:function(){!this.browser.supportsLinkPrefetch()||this.browser.isDataSaverModeOn()||this.browser.isSlowConnection()||(this.regex={excludeUris:RegExp(this.config.excludeUris,
                                    "i"),images:RegExp( ".("+this.config.imageExt+ ")$", "i"),fileExt:RegExp( ".("+this.config.fileExt+ ")$", "i")},this._initListeners(this))}},{key: "_initListeners",value:function(e){-1<this.config.onHoverDelay&&document.addEventListener(
                                    "mouseover",e.listener.bind(e),e.listenerOptions),document.addEventListener( "mousedown",e.listener.bind(e),e.listenerOptions),document.addEventListener( "touchstart",e.listener.bind(e),e.listenerOptions)}},{key: "listener",value:function(e){var
                                    t=e.target.closest( "a"),n=this._prepareUrl(t);if(null!==n)switch(e.type){case "mousedown":case "touchstart":this._addPrefetchLink(n);break;case "mouseover":this._earlyPrefetch(t,n, "mouseout")}}},{key: "_earlyPrefetch",value:function(t,e,n){var
                                    i=this,r=setTimeout(function(){if(r=null,0===i.numOnHover)setTimeout(function(){return i.numOnHover=0},1e3);else if(i.numOnHover>i.config.rateThrottle)return;i.numOnHover++,i._addPrefetchLink(e)},this.config.onHoverDelay);t.addEventListener(n,function e(){t.removeEventListener(n,e,{passive:!0}),null!==r&&(clearTimeout(r),r=null)},{passive:!0})}},{key:"_addPrefetchLink",value:function(i){return
                                    this.prefetched.add(i.href),new Promise(function(e,t){var n=document.createElement("link");n.rel="prefetch",n.href=i.href,n.onload=e,n.onerror=t,document.head.appendChild(n)}).catch(function(){})}},{key:"_prepareUrl",value:function(e){if(null===e||"object"!==(void
                                    0===e?"undefined":r(e))||!1 in e||-1===["http:","https:"].indexOf(e.protocol))return null;var t=e.href.substring(0,this.config.siteUrl.length),n=this._getPathname(e.href,t),i={original:e.href,protocol:e.protocol,origin:t,pathname:n,href:t+n};return
                                    this._isLinkOk(i)?i:null}},{key:"_getPathname",value:function(e,t){var n=t?e.substring(this.config.siteUrl.length):e;return n.startsWith("/")||(n="/"+n),this._shouldAddTrailingSlash(n)?n+"/":n}},{key:"_shouldAddTrailingSlash",value:function(e){return
                                    this.config.usesTrailingSlash&&!e.endsWith("/")&&!this.regex.fileExt.test(e)}},{key:"_isLinkOk",value:function(e){return null!==e&&"object"===(void 0===e?"undefined":r(e))&&(!this.prefetched.has(e.href)&&e.origin===this.config.siteUrl&&-1===e.href.indexOf("?")&&-1===e.href.indexOf("#")&&!this.regex.excludeUris.test(e.href)&&!this.regex.images.test(e.href))}}],[{key:"run",value:function(){"undefined"!=typeof
                                    RocketPreloadLinksConfig&&new n(new RocketBrowserCompatibilityChecker({capture:!0,passive:!0}),RocketPreloadLinksConfig).init()}}]),n}();t.run(); }());
                            </script>
                            <!--[if lte IE 11]>
<script src=\'https://flux-active.info/wp-content/themes/generatepress/assets/js/classList.min.js?ver=3.3.0\' id=\'generate-classlist-js\'></script>
<![endif]-->
                            <script id=\'generate-menu-js-extra\'>
                                var generatepressMenu = {
                                    "toggleOpenedSubMenus": "1",
                                    "openSubMenuLabel": "Open Sub-Menu",
                                    "closeSubMenuLabel": "Close Sub-Menu"
                                };
                            </script>
                            <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-content/themes/generatepress/assets/js/menu.min.js?ver=3.3.0\' id=\'generate-menu-js\' defer></script>
                            <script id=\'tve-dash-frontend-js-extra\'>
                                var tve_dash_front = {
                                    "ajaxurl": "https:\/\/flux-active.info\/wp-admin\/admin-ajax.php",
                                    "force_ajax_send": "1",
                                    "is_crawler": "",
                                    "recaptcha": []
                                };
                            </script>
                            <script type="rocketlazyloadscript" src=\'https://flux-active.info/wp-content/plugins/thrive-visual-editor/thrive-dashboard/js/dist/frontend.min.js?ver=2.3.4.1\' id=\'tve-dash-frontend-js\' defer></script>
                            <script type="rocketlazyloadscript" data-rocket-type="text/javascript">
                                var tcb_post_lists = JSON.parse(\'[]\');
                            </script>
                            <script>
                                window.lazyLoadOptions = {
                                    elements_selector: "img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",
                                    data_src: "lazy-src",
                                    data_srcset: "lazy-srcset",
                                    data_sizes: "lazy-sizes",
                                    class_loading: "lazyloading",
                                    class_loaded: "lazyloaded",
                                    threshold: 300,
                                    callback_loaded: function(element) {
                                        if (element.tagName === "IFRAME" && element.dataset.rocketLazyload == "fitvidscompatible") {
                                            if (element.classList.contains("lazyloaded")) {
                                                if (typeof window.jQuery != "undefined") {
                                                    if (jQuery.fn.fitVids) {
                                                        jQuery(element).parent().fitVids()
                                                    }
                                                }
                                            }
                                        }
                                    }
                                };
                                window.addEventListener(\'LazyLoad::Initialized\', function(e) {
                                    var lazyLoadInstance = e.detail.instance;
                                    if (window.MutationObserver) {
                                        var observer = new MutationObserver(function(mutations) {
                                            var image_count = 0;
                                            var iframe_count = 0;
                                            var rocketlazy_count = 0;
                                            mutations.forEach(function(mutation) {
                                                for (var i = 0; i < mutation.addedNodes.length; i++) {
                                                    if (typeof mutation.addedNodes[i].getElementsByTagName !== \'function\') {
                                                        continue
                                                    }
                                                    if (typeof mutation.addedNodes[i].getElementsByClassName !== \'function\') {
                                                        continue
                                                    }
                                                    images = mutation.addedNodes[i].getElementsByTagName(\'img\');
                                                    is_image = mutation.addedNodes[i].tagName == "IMG";
                                                    iframes = mutation.addedNodes[i].getElementsByTagName(\'iframe\');
                                                    is_iframe = mutation.addedNodes[i].tagName == "IFRAME";
                                                    rocket_lazy = mutation.addedNodes[i].getElementsByClassName(\'rocket-lazyload\');
                                                    image_count += images.length;
                                                    iframe_count += iframes.length;
                                                    rocketlazy_count += rocket_lazy.length;
                                                    if (is_image) {
                                                        image_count += 1
                                                    }
                                                    if (is_iframe) {
                                                        iframe_count += 1
                                                    }
                                                }
                                            });
                                            if (image_count > 0 || iframe_count > 0 || rocketlazy_count > 0) {
                                                lazyLoadInstance.update()
                                            }
                                        });
                                        var b = document.getElementsByTagName("body")[0];
                                        var config = {
                                            childList: !0,
                                            subtree: !0
                                        };
                                        observer.observe(b, config)
                                    }
                                }, !1)
                            </script>
                            <script data-no-minify="1" async src="https://flux-active.info/wp-content/plugins/wp-rocket/assets/js/lazyload/17.5/lazyload.min.js"></script>
                            <script>
                                function lazyLoadThumb(e) {
                                    var t = \'<img data-lazy-src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"><noscript><img src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"></noscript>\',
                                        a = \'<button class="play" aria-label="play Youtube video"></button>\';
                                    return t.replace("ID", e) + a
                                }

                                function lazyLoadYoutubeIframe() {
                                    var e = document.createElement("iframe"),
                                        t = "ID?autoplay=1";
                                    t += 0 === this.parentNode.dataset.query.length ? \'\' : \'&\' + this.parentNode.dataset.query;
                                    e.setAttribute("src", t.replace("ID", this.parentNode.dataset.src)), e.setAttribute("frameborder", "0"), e.setAttribute("allowfullscreen", "1"), e.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"), this.parentNode.parentNode.replaceChild(e, this.parentNode)
                                }
                                document.addEventListener("DOMContentLoaded", function() {
                                    var e, t, p, a = document.getElementsByClassName("rll-youtube-player");
                                    for (t = 0; t < a.length; t++) e = document.createElement("div"), e.setAttribute("data-id", a[t].dataset.id), e.setAttribute("data-query", a[t].dataset.query), e.setAttribute("data-src", a[t].dataset.src), e.innerHTML = lazyLoadThumb(a[t].dataset.id), a[t].appendChild(e), p = e.querySelector(\'.play\'), p.onclick = lazyLoadYoutubeIframe
                                });
                            </script>
</body>

</html>

<!-- Page generated by LiteSpeed Cache 5.3.3 on 2023-04-10 09:57:30 -->
<!-- This website is like a Rocket, isn\'t it? Performance optimized by WP Rocket. Learn more: https://wp-rocket.me -->
';
?>