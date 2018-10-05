<?php
/**
 * Created by PhpStorm.
 * User: yiming
 * Date: 05/10/2018
 * Time: 11:45
 */

namespace AppBundle\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }
}