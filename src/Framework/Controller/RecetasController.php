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
    * @return JsonResponse
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
                -OPCIONES DE BUSQUEDA- <br><br>
                recetas/e/[pagina] <br>
                Ej.: recetas/e/34 <br><br>
                recetas/q/[comidas]/[pagina] <br>
                Ej.: recetas/q/omelet/2 <br><br>
                recetas/i/[ingredientes]/[pagina] <br>
                Ej.: recetas/i/potato,tomato/15 <br><br>
                recetas/[ingredientes]/[comidas]/[pagina] <br>
                Ej.: recetas/potato,tomato/omelet/15
            </body></html>'
        );

    }

    /**
    * @Route("/recetas/e/{pags}", name="recetae")
    * @Route("/recetas/q/{recips}/{pags}", name="recetaq")
    * @Route("/recetas/i/{ingredients}/{pags}", name="recetai")
    * @Route("/recetas/{ingredients}/{recips}/{pags}", name="receta")
    * @param $ingredients
    * @param $recips
    * @param $pags
    * @return JsonResponse
    */
    public function buscarAction($ingredients = "", $recips = "", int $pags =1)
    { 
        $gz = new GuzzClient;
        return new JsonResponse( \GuzzleHttp\json_decode(
                $gz->querySRV($ingredients, $recips, $pags), true)['results']
        );
    }
}