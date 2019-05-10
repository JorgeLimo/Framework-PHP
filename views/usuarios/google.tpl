<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="693124699870-sq742idpo8ekbg120msg2cl2dm1t104p.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>


<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Login Google</h1>
<br>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        c