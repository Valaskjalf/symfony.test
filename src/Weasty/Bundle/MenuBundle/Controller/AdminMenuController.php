<?php

namespace Weasty\Bundle\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Weasty\Bundle\MenuBundle\Entity\Link;
use Weasty\Bundle\MenuBundle\Form\LinkType;

class AdminMenuController extends Controller
{
    public function linksAction()
    {
        $repository = $this->getDoctrine()->getRepository('WeastyMenuBundle:Link');
        $links = $repository->findAll();
        return $this->render('WeastyMenuBundle:AdminMenu:links.html.twig', array(
            'links' => $links,
        ));
    }

    public function addAction(Request $request)
    {

        $link = new Link();
        $formType = new LinkType();
        $form = $this->createForm($formType, $link);

        $form->handleRequest($request);

        if($request->getMethod() == 'POST' && $form->isValid()){

            $em = $this->getDoctrine()->getManager();

            $em->persist($link);
            $em->flush();

            return $this->redirect($this->generateUrl('weasty_menu_links'));

        } else {

            return $this->render('WeastyMenuBundle:AdminMenu:add.html.twig', array(
                'form' => $form->createView(),
            ));
        }

    }

    public function editAction()
    {
        return $this->render('WeastyMenuBundle:AdminMenu:edit.html.twig', array(
                // ...
            ));    }

    public function deleteAction()
    {
        return $this->render('WeastyMenuBundle:AdminMenu:delete.html.twig', array(
                // ...
            ));    }

}
