$(document).ready(function() {

    var lock = new Auth0Lock(AUTH0_CLIENT_ID, AUTH0_DOMAIN, {
        auth: {
            redirectUrl: AUTH0_CALLBACK_URL,
            responseType: 'code',
            params: {
                scope: 'openid'
            }
        }
    });

    $('.btn-login').click(function(e) {
        e.preventDefault();
        lock.show();
    });

    $('.btn-logout').click(function(e) {
        e.preventDefault();
        console.log("logout");
        window.location = 'logout.php';
    });
});