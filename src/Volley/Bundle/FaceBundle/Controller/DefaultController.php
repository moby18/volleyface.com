<?php

namespace Volley\Bundle\FaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VolleyFaceBundle:Default:index.html.twig', array('name' => $name));
    }
}
