<?php
/**
 * Created by PhpStorm.
 * User: Krionari
 * Date: 22/12/2019
 * Time: 14:10
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BandController
 * @Route("/groupe")
 */
class BandController extends AbstractController
{

    /**
     * @Route("/histoire", name="band_history")
     */
    public function index()
    {
        return $this->render('band/history.html.twig');
    }

}