<?php

namespace Kamil\AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Kamil\AddressBookBundle\Entity\Address;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Kamil\AddressBookBundle\Entity\User;

class AddressController extends Controller
{
    
    /**
     * @Route("/{id}/addAddress", name="addAddress")
     * @Method({"POST"})
     */
    public function newAddressCreateAction(Request $request, $id)
    {
        
        $address = new Address();
        
        $form2 = $this->createFormBuilder($address)
                ->setAction($this->generateUrl('addAddress', ['id'=>$id]))
                ->setMethod('POST')
                ->add('city', 'text')
                ->add('street', 'text')
                ->add('houseNumber', 'number')
                ->add('apartmentNumber', 'number')
                ->add('save', 'submit')
                ->getForm();
        
        $form2->handleRequest($request);
        
        if($form2->isSubmitted())
        {
            $address = $form2->getData();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();            
            
            $user = $this->getDoctrine()->getRepository('KamilAddressBookBundle:User')->find($id);
            $user->setAddress($address);
            $em->persist($user);
            $em->flush();
            
            $url = $this->generateUrl('showContact', ['id'=>$id]);

            return $this->redirect($url);
        }
    }
    

    /**
     * @Route("/{id}/deleteAddress", name="deleteAddress")
     */
    public function deleteAddressAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $user = $this->getDoctrine()->getRepository('KamilAddressBookBundle:User')->find($id);
            
            $user->setAddress(null);
            $em->persist($user);
            $em->flush();
            
            
            $url = $this->generateUrl('showContact', ['id'=>$id]);

            return $this->redirect($url);
            
    }


}
