<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\OpenApi(
 *     @OA\Info(title="PRUEBA API REST", version="v1.0")
 * )
 * @OA\Server(url="http://localhost/api")
 */
class HomeController extends Controller
{
    const VERSION = '1.0';
    protected $name;
    public function __construct()
    {

        $this->name = HomeController::VERSION;
    }

/**
 * @OA\Get(
 *     path="/api/home",
 *     summary="SHOW JSON FORM WELCOME",
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa"
 *     )
 * )
 */
    public function getHome(){
        return response()->json([
            'version' => $this->name,
            'PROYECT' => 'API REST Directors and Films',
            'PHP_VERSION' => '8.1',
            'LARAVEL_VERSION' => '10.0',
            'MYSQL_VERSION' => '10.4.28-MariaDB',
        ]);
    }

}
