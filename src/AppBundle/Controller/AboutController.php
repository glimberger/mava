<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class AboutController
 * @package AppBundle\Controller
 */
class AboutController extends Controller
{
    /**
     * @param string $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aboutAction($name)
    {
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findOneByName($name);

        return $this->render(
            'About/user.html.twig',
            array('user' => $user)
        );
    }

    /**
     * @param string $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailsAction($name)
    {
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findOneByName($name);

        return $this->render(
            'About/more.html.twig',
            array('user' => $user)
        );
    }
}
