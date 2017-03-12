    <?php

    // Require composer autoloader
    require __DIR__ . '/../../vendor/autoload.php';
    require __DIR__ . '/../../dotenv-loader.php';

    use Auth0\SDK\API\Authentication;

    define('root', $_SERVER['DOCUMENT_ROOT'] . getenv('env'));

    $domain        = getenv('AUTH0_DOMAIN');
    $client_id     = getenv('AUTH0_CLIENT_ID');
    $client_secret = getenv('AUTH0_CLIENT_SECRET');
    $redirect_uri  = getenv('AUTH0_CALLBACK_URL');

    $auth0 = new Authentication($domain, $client_id);

    $auth0Oauth = $auth0->get_oauth_client($client_secret, $redirect_uri, [
        'persist_id_token' => true,
        'persist_refresh_token' => true,
    ]);


    $userInfo = $auth0Oauth->getUser();
    ?>

    <?php 
    require root . 'db/User.php';
    ?>
    <script>
        var AUTH0_CLIENT_ID = '<?php echo getenv('AUTH0_CLIENT_ID'); ?>';
        var AUTH0_DOMAIN = '<?php echo getenv('AUTH0_DOMAIN'); ?>';
        var AUTH0_CALLBACK_URL = '<?php echo getenv('AUTH0_CALLBACK_URL'); ?>';
    </script>
        <head>
        <script src="http://code.jquery.com/jquery-3.1.0.min.js" type="text/javascript"></script>
        <script src="http://cdn.auth0.com/js/lock/10.2/lock.min.js"></script>

        <script type="text/javascript" src="//use.typekit.net/iws6ohy.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- font awesome from BootstrapCDN -->
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

    </head>

    <body class="home">
    <?php include_once("nav.php");?>
