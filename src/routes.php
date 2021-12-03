<?php

// src/routes.php

use Petrik\Termekek\Atvet;
use Petrik\Termekek\Termek;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//Átvétel tábla

return function(Slim\App $app) {
    $app->get('/atvetel', function(Request $request, Response $response) {
        $atvetelek = Atvet::all();
        $kimenet = $atvetelek -> toJson();

        $response->getBody()->write($kimenet);
        return $response->withHeader('Content-Type', 'application/json');
    });
    
    $app->post('/atvetel', function(Request $request, Response $response) {
        $input = json_decode($request->getBody(), true);
        // Bemenet validáció!
        $atvet = Atvet::create($input);
        $atvet->save();

        $kimenet = $atvet->toJson();

        
        $response->getBody()->write($kimenet);
        return $response
            ->withStatus(201) // "Created" status code
            ->withHeader('Content-Type', 'application/json');
    });

    $app->delete('/atvetel/{id}',
        function (Request $request, Response $response, array $args) {
            if (!is_numeric($args['id']) || $args['id'] <= 0) {
                $ki = json_encode(['error' => 'Az ID pozitív egész szám kell legyen!']);
                $response->getBody()->write($ki);
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(400);
            }
            $atvet = Atvet::find($args['id']);
            if ($atvet === null) {
                $ki = json_encode(['error' => 'Nincs ilyen ID-jű átvételi pont']);
                $response->getBody()->write($ki);
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(404);
            }
            $atvet->delete();
            return $response
                ->withStatus(204);
        });

        $app->put('/atvetel/{id}', function(Request $request, Response $response, array $args){
            if (!is_numeric($args['id']) || $args['id'] <= 0) {
                $ki = json_encode(['error' => 'Az ID pozitív egész szám kell legyen!']);
                $response->getBody()->write($ki);
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(400);
            }
            $atvet = Atvet::find($args['id']);
            if ($atvet === null) {
                $ki = json_encode(['error' => 'Nincs ilyen ID-jű átvételi pont']);
                $response->getBody()->write($ki);
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(404);
            }
            $input = json_decode($request->getBody(), true);
            $atvet->fill($input);
            $atvet->save();
            $response->getBody()->write($atvet->toJson());
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        });

        $app->get('/atvetel/{id}', function(Request $request, Response $response, array $args){
            if (!is_numeric($args['id']) || $args['id'] <= 0) {
                $ki = json_encode(['error' => 'Az ID pozitív egész szám kell legyen!']);
                $response->getBody()->write($ki);
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(400);
            }
            $atvet = Atvet::find($args['id']);
            if ($atvet === null) {
                $ki = json_encode(['error' => 'Nincs ilyen ID-jű átvételi pont']);
                $response->getBody()->write($ki);
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(404);
            }
            $response->getBody()->write($atvet->toJson());
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
        });


        //Termekek

        $app->get('/termekek', function(Request $request, Response $response) {
            $termekek = Termek::all();
            $kimenet = $termekek -> toJson();
    
            $response->getBody()->write($kimenet);
            return $response->withHeader('Content-Type', 'application/json');
        });
    
        $app->post('/termekek', function(Request $request, Response $response) {
            $input = json_decode($request->getBody(), true);
            // Bemenet validáció!
            $termek = Termek::create($input);
            $termek->save();
    
            $kimenet = $termek->toJson();
    
            
            $response->getBody()->write($kimenet);
            return $response
                ->withStatus(201) // "Created" status code
                ->withHeader('Content-Type', 'application/json');
        });
    
        $app->delete('/termekek/{id}',
            function (Request $request, Response $response, array $args) {
                if (!is_numeric($args['id']) || $args['id'] <= 0) {
                    $ki = json_encode(['error' => 'Az ID pozitív egész szám kell legyen!']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(400);
                }
                $termek = Termek::find($args['id']);
                if ($termek === null) {
                    $ki = json_encode(['error' => 'Nincs ilyen ID-jű termék']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(404);
                }
                $termek->delete();
                return $response
                    ->withStatus(204);
            });
            
    
            $app->put('/termekek/{id}', function(Request $request, Response $response, array $args){
                if (!is_numeric($args['id']) || $args['id'] <= 0) {
                    $ki = json_encode(['error' => 'Az ID pozitív egész szám kell legyen!']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(400);
                }
                $termek = Termek::find($args['id']);
                if ($termek === null) {
                    $ki = json_encode(['error' => 'Nincs ilyen ID-jű termék']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(404);
                }
                $input = json_decode($request->getBody(), true);
                $termek->fill($input);
                $termek->save();
                $response->getBody()->write($termek->toJson());
                return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(200);
            });
    
            $app->get('/termekek/{id}', function(Request $request, Response $response, array $args){
                if (!is_numeric($args['id']) || $args['id'] <= 0) {
                    $ki = json_encode(['error' => 'Az ID pozitív egész szám kell legyen!']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(400);
                }
                $termek = Termek::find($args['id']);
                if ($termek === null) {
                    $ki = json_encode(['error' => 'Nincs ilyen ID-jű termék']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(404);
                }

                $response->getBody()->write($termek->toJson());
                return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(200);
            });

            //Leiras

        $app->get('/termek_leiras', function(Request $request, Response $response) {
            $termekek = Termek::all();
            $kimenet = $termekek -> toJson();
    
            $response->getBody()->write($kimenet);
            return $response->withHeader('Content-Type', 'application/json');
        });
    
        $app->post('/termek_leiras', function(Request $request, Response $response) {
            $input = json_decode($request->getBody(), true);
            // Bemenet validáció!
            $termek = Termek::create($input);
            $termek->save();
    
            $kimenet = $termek->toJson();
    
            
            $response->getBody()->write($kimenet);
            return $response
                ->withStatus(201) // "Created" status code
                ->withHeader('Content-Type', 'application/json');
        });
    
        $app->delete('/termek_leiras/{id}',
            function (Request $request, Response $response, array $args) {
                if (!is_numeric($args['id']) || $args['id'] <= 0) {
                    $ki = json_encode(['error' => 'Az ID pozitív egész szám kell legyen!']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(400);
                }
                $termek = Termek::find($args['id']);
                if ($termek === null) {
                    $ki = json_encode(['error' => 'Nincs ilyen ID-jű termék leírás']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(404);
                }
                $termek->delete();
                return $response
                    ->withStatus(204);
            });
            
    
            $app->put('/termek_leiras/{id}', function(Request $request, Response $response, array $args){
                if (!is_numeric($args['id']) || $args['id'] <= 0) {
                    $ki = json_encode(['error' => 'Az ID pozitív egész szám kell legyen!']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(400);
                }
                $termek = Termek::find($args['id']);
                if ($termek === null) {
                    $ki = json_encode(['error' => 'Nincs ilyen ID-jű termék leírás']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(404);
                }
                $input = json_decode($request->getBody(), true);
                $termek->fill($input);
                $termek->save();
                $response->getBody()->write($termek->toJson());
                return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(200);
            });
    
            $app->get('/termek_leiras/{id}', function(Request $request, Response $response, array $args){
                if (!is_numeric($args['id']) || $args['id'] <= 0) {
                    $ki = json_encode(['error' => 'Az ID pozitív egész szám kell legyen!']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(400);
                }
                $termek = Termek::find($args['id']);
                if ($termek === null) {
                    $ki = json_encode(['error' => 'Nincs ilyen ID-jű termék leírás']);
                    $response->getBody()->write($ki);
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(404);
                }

                $response->getBody()->write($termek->toJson());
                return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(200);
            });
            
};
