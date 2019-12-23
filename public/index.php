<?php

// Basado en 

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

// lineas para detectar errores en donde sea #endregion
error_reporting(-1);
ini_set('display_errors', 1);


//includes globales
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/utils/printJson.php'; 
require __DIR__ . '/../src/utils/ClassToken.php';
require __DIR__ . '/../src/config/db.php';
require __DIR__ . '/../src/utils/CrearHTML.php';
require __DIR__ . '/../src/utils/sedMail.php';

// Instantiate the app
$settings = require __DIR__ . '/../src/config/settings.php';

$app = new \Slim\App($settings);



// manejo de CORS

$app->options('/{routes:.+}', function ($request, $response, $args) {
  return $response;
});
$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
          ->withHeader('Access-Control-Allow-Origin', '*')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

// Set up dependencies
require __DIR__ . '/../src/utils/dependencies.php'; // para genera el log

// Archivo de pruebas
require __DIR__ . '/../src/routes/Test.php';

// routes
require __DIR__ . '/../src/routes/Incription.php';
require __DIR__ . '/../src/routes/Contact.php';
require __DIR__ . '/../src/routes/Parameters.php';
require __DIR__ . '/../src/routes/Login.php';
require __DIR__ . '/../src/routes/Logout.php';
require __DIR__ . '/../src/routes/SelectMenu.php';

// Controllers 
require __DIR__ . '/../src/controller/Contact.php';
require __DIR__ . '/../src/controller/enlaces.php';
require __DIR__ . '/../src/controller/Login.php';
require __DIR__ . '/../src/controller/Logout.php';
require __DIR__ . '/../src/controller/SelectMenu.php';

// Models
require __DIR__ . '/../src/model/Contact.php';
require __DIR__ . '/../src/model/enlaces.php';
require __DIR__ . '/../src/model/Login.php';
require __DIR__ . '/../src/model/Logout.php';
require __DIR__ . '/../src/model/SelectMenu.php';


$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
  });
ini_set('memory_limit','1024M');  // seteo de memoria 
  

// Run app
$app->run();