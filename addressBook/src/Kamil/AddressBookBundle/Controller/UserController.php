<?php

namespace Kamil\AddressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Kamil\AddressBookBundle\Entity\User;
use Kamil\AddressBookBundle\Entity\Address;
use Kamil\AddressBookBundle\Entity\Email;
use Kamil\AddressBookBundle\Entity\Telephone;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/new", name="newContact")
     * @Method({"GET"})
     */
    public function newEntityFormAction()
    {
        $form = $this-> userForm();
        
        return $this->render('KamilAddressBookBundle:User:new.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    /**
     * @Route("/new", name="newSave")
     * @Method({"POST"})
     */
    public function createEntityAction(Request $request)
    {
        $form = $this->userForm();
        
        $form->handleRequest($request);
        
        if($form->isSubmitted())
        {
            $user = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            $url = $this->generateUrl('showContact', ['id'=>$user->getId()]);
            
            return $this->redirect($url);
        }
        
    }
    //-----------------------------------------------------------------Formularz
    public function userForm($user = false, $url = false)
    {
        if (!$user){
            $user = new User();
        }
        if (!$url){
            $url = $this->generateUrl('newSave');
        }
        $form = $this->createFormBuilder($user)
                ->setAction($url)
                ->setMethod('POST')
                ->add('name', 'text')
                ->add('surname', 'text')
                ->add('description', 'text')
                ->add('save', 'submit')
                ->getForm();
        
        return $form;
    }
    //--------------------------------------------------------------------------
    /**
     * @Route("/{id}/modify", name="modify")
     * @Method({"GET"})
     */
    public function modifyFormAction($id)
    {
        $user = $this->getDoctrine()->getRepository('KamilAddressBookBundle:User')->find($id);
        
        $form = $this->userForm($user, $this->generateUrl('modifyEntity', ['id'=>$id]));
        //ADDING ADDRESS FORM
        if ($user->getAddress() == null){
            $address = new Address();
        } else {
            $address = $user->getAddress();
        }
        
        $form2 = $this->createFormBuilder($address)
                ->setAction($this->generateUrl('addAddress', ['id'=>$id]))
                ->setMethod('POST')
                ->add('city', 'text')
                ->add('street', 'text')
                ->add('houseNumber', 'number')
                ->add('apartmentNumber', 'number')
                ->add('save', 'submit')
                ->getForm();
        
        //ADDING EMAIL FORM
        if ($user->getEmail() == null){
            
            $email = new Email();
            
        } else {
            $email = $user->getEmail();
           
        }
        
        $form3 = $this->createFormBuilder($email)
                ->setAction($this->generateUrl('addEmail', ['id'=>$id]))
                ->setMethod('POST')
                ->add('emailAddress', 'email')
                ->add('emailType', 'text')
                ->add('save', 'submit')
                ->getForm();
        
        //ADDING TELEPHONE FORM
        if ($user->getTelephone() == null){
            
            $tel = new Telephone();
            
        } else {
            $tel = $user->getTelephone();
           
        }
        
        $form4 = $this->createFormBuilder($tel)
                ->setAction($this->generateUrl('addTelephone', ['id'=>$id]))
                ->setMethod('POST')
                ->add('telephoneNumber', 'text')
                ->add('telephoneType', 'text')
                ->add('save', 'submit')
                ->getForm();
        
        return $this->render('KamilAddressBookBundle:User:modify_form.html.twig', array(
            'form'=>$form->createView(), 'form2'=>$form2->createView(), 'form3'=>$form3->createView(),
            'form4'=>$form4->createView()
        ));
    }

    /**
     * @Route("/{id}/modify", name="modifyEntity")
     * @Method({"POST"})
     */
    public function modifyEntityAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $user = $em->getRepository('KamilAddressBookBundle:User')->find($id);
        $form = $this->userForm($user, '');
        
        $form->handleRequest($request);
        
        if($form->isSubmitted())
        {
            $user = $form->getData();
            $em->flush();
            
            return $this->redirectToRoute('showAllEntities');
        }
    }

    /**
     * @Route("/{id}/delete", name="deleteContact")
     */
    public function entityDeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $user = $em->getRepository('KamilAddressBookBundle:User')->find($id);
        
        $em->remove($user);
        $em->flush();
        
        return $this->redirectToRoute('showAllEntities');
    }

    /**
     * @Route("/{id}", name="showContact")
     */
    public function showOneEntityAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('KamilAddressBookBundle:User')->find($id);
        
        
        return $this->render('KamilAddressBookBundle:User:show_one_entity.html.twig', array(
            'user'=>$user
        ));
    }

    /**
     * @Route("/", name="showAllEntities")
     */
    public function showAllEntitiesAction()
    {
        $repository = $this->getDoctrine()->getRepository('KamilAddressBookBundle:User');
        
        $users = $repository->findAllBySurname();
        
        return $this->render('KamilAddressBookBundle:User:show_all_entities.html.twig', array(
            'users'=>$users
        ));
    }

}
