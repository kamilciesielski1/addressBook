<?php

namespace Kamil\AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Kamil\AddressBookBundle\Entity\Telephone;

class TelephoneController extends Controller
{
    /**
     * @Route("/{id}/addTelephone", name="addTelephone")
     * @Method({"POST"})
     */
    public function newTelephoneCreateAction(Request $request, $id)
    {
        $tel = new Telephone();
        
        $form4 = $this->createFormBuilder($tel)
                ->setAction($this->generateUrl('addTelephone', ['id'=>$id]))
                ->setMethod('POST')
                ->add('telephoneNumber', 'text')
                ->add('telephoneType', 'text')
                ->add('save', 'submit')
                ->getForm();
        
        $form4->handleRequest($request);
        
        if($form4->isSubmitted())
        {
            $tel = $form4->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($tel);
            $em->flush();            
            
            $user = $this->getDoctrine()->getRepository('KamilAddressBookBundle:User')->find($id);
            $user->setTelephone($tel);
            $em->persist($user);
            $em->flush();
            
            $url = $this->generateUrl('showContact', ['id'=>$id]);

            return $this->redirect($url);
        }
    }

    /**
     * @Route("/{id}/deleteTelephone", name="deleteTelephone")
     */
    public function deleteTelephoneAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $user = $this->getDoctrine()->getRepository('KamilAddressBookBundle:User')->find($id);
            
            $user->setTelephone(null);
            $em->persist($user);
            $em->flush();
            
            
            $url = $this->generateUrl('showContact', ['id'=>$id]);

            return $this->redirect($url);
    }

}
