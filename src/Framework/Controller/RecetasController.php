<?php
namespace App\Framework\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
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
                -OPCIONES DE BUSQUEDA-
            </body></html>'
        );

    }

}