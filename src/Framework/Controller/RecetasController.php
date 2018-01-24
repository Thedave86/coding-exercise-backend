<?php
namespace App\Framework\Controller;

use App\Domain\GuzzClient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RecetasController extends Controller
{
    /**
    * @Route("/"), name="index"
    */
    public function indexAction()
    {
        return $this->redirectToRoute(
                           'homefaq'
                        );
    }

    /**
     * @Route("/recetas", name="homefaq")
     *
     * @return JsonResponse
     */
    public function HomeAction()
    {
        return new Response(
            '<html><body>
                -OPCIONES DE BUSQUEDA-<br><br>
                recetas/[ingredientes]/[comidas]/[pagina] <br>
                Ej.: recetas/potato,tomato/omelet/15
            </body></html>'
        );

    }
    /**
    * @Route("/recetas/{ingredients}/{recips}/{pags}", name="receta")
    * @param $ingredients
    * @param $recips
    * @param $pags
    * @return JsonResponse
    */
    public function buscarAction($ingredients, $recips,$pags)
    { 
        $gz = new GuzzClient;

        //ACCESO A RECETAS:
        //return new JsonResponse( \GuzzleHttp\json_decode(
        //        $gz->querySRV($ingredients, $recips, $pags),
        //                      true)['results'][2]['title'] );

        return new JsonResponse( \GuzzleHttp\json_decode(
                $gz->querySRV($ingredients, $recips, $pags), true)['results']
        );
    }
}