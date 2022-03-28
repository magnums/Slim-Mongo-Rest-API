<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app -> options('/{routes:.+}', function($request, $response, $args) {
	return $response;
});

$app -> add(function($req, $res, $next) {
	$response = $next($req, $res);
	return $response -> withHeader('Content-Type', 'application/json') -> withHeader('Access-Control-Allow-Origin', '*') -> withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization') -> withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});


// Get All Customers
$app -> get('/api/demo/{id}', function(Request $request, Response $response) {

	$id = $request -> getAttribute('id');
    try {
        
            $m = new db ;
            $db = $m->connect("MyDB_name", "MyCollection_name");  
            $criteria = array("id" => $id);        
            $cursor = iterator_to_array($db->find($criteria));
            
            $data = json_encode($cursor);

        } catch(PDOException $e) {
            echo '{"error": {"text": ' . $e -> getMessage() . '}';
        }

     return $data ;


});
