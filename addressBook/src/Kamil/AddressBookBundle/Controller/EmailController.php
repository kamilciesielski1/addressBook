<?php

namespace Kamil\AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Kamil\AddressBookBundle\Entity\Email;

class EmailController extends Controller
{
    /**
     * @Route("/{id}/addEmail", name="addEmail")
     * @Method({"POST"})
     */
    public function newEmailCreateAction(Request $request, $id)
    {
        $email = new Email();
        
        $form3 = $this->createFormBuilder($email)
                ->setAction($this->generateUrl('addEmail', ['id'=>$id]))
                ->setMethod('POST')
                ->add('emailAddress', 'email')
                ->add('emailType', 'text')
                ->add('save', 'submit')
                ->getForm();
        
        $form3->handleRequest($request);
        
        if($form3->isSubmitted())
        {
            $email = $form3->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($email);
            $em->flush();            
            
            $user = $this->getDoctrine()->getRepository('KamilAddressBookBundle:User')->find($id);
            $user->setEmail($email);
            $em->persist($user);
            $em->flush();
            
            $url = $this->generateUrl('showContact', ['id'=>$id]);

            return $this->redirect($url);
        }
    }

    /**
     * @Route("/{id}/deleteEmail", name="deleteEmail")
     */
    public function deleteEmailAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $user = $this->getDoctrine()->getRepository('KamilAddressBookBundle:User')->find($id);
            
            $user->setEmail(null);
            $em->persist($user);
            $em->flush();
            
            
            $url = $this->generateUrl('showContact', ['id'=>$id]);

            return $this->redirect($url);
    }

}
