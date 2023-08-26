<script src="https://cdnjs.cloudflare.com/ajax/libs/tarteaucitronjs/1.13.0/tarteaucitron.js" integrity="sha512-n8lzGOKIwkAfn0VU89d1wpD8A6i4hadir1+vpTIEcg2RpUOalChVZvzG9CXFHZRKVEcLoyU07koQtLjVecq+OQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    tarteaucitron.init({
        privacyUrl: "" /* Privacy policy url */,
        bodyPosition:
            "bottom" /* or top to bring it as first element for accessibility */,

        hashtag: "#tarteaucitron" /* Open the panel with this hashtag */,
        cookieName: "tarteaucitron" /* Cookie name */,

        orientation: "popup" /* Banner position (top - bottom - middle - popup) */,

        groupServices: true /* Group services by category */,
        serviceDefaultState: "wait" /* Default state (true - wait - false) */,

        showAlertSmall: false /* Show the small banner on bottom right */,
        cookieslist: false /* Show the cookie list */,

        showIcon: false /* Show cookie icon to manage cookies */,
        // "iconSrc": "", /* Optionnal: URL or base64 encoded image */
        iconPosition:
            "BottomLeft" /* Position of the icon between BottomRight, BottomLeft, TopRight and TopLeft */,

        adblocker: false /* Show a Warning if an adblocker is detected */,

        DenyAllCta: false /* Show the deny all button */,
        AcceptAllCta: true /* Show the accept all button when highPrivacy on */,
        highPrivacy: true /* HIGHLY RECOMMANDED Disable auto consent */,

        handleBrowserDNTRequest: false /* If Do Not Track == 1, disallow all */,

        removeCredit: true /* Remove credit link */,
        moreInfoLink: false /* Show more info link */,

        mandatory: false /* Show a message about mandatory cookies */,
        mandatoryCta: false /* Show the disabled accept button when mandatory on */,
    });
</script>

<script type="text/javascript">
    tarteaucitron.user.gtagUa = 'G-SQNZ6LH8XH';
    // tarteaucitron.user.gtagCrossdomain = ['example.com', 'example2.com'];
    tarteaucitron.user.gtagMore = function () { /* add here your optionnal gtag() */ };
    (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
</script>

<script type="text/javascript">
    (tarteaucitron.job = tarteaucitron.job || []).push('hotjar');
</script>

<script type="text/javascript">
    tarteaucitron.user.hotjarId = 3580055;
    tarteaucitron.user.HotjarSv = 6;
</script>
