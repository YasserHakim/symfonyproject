<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    Private $authors = array(
        array('id'=>1,'picture'=>'/images/victor-Hugo.jpg','username'=>'Victor Hugo','email'=>'victor.hugo@gmail.com','nb_books'=>100),
        array('id'=>2,'picture'=>'/images/william-shakespeare.jpg','username'=>'William Shakespear','email'=>'william.shakespear@gmail.com','nb_books'=>200),
        array('id'=>3,'picture'=>'/images/Taha_Hussein.jpg','username'=>'Taha Hussein','email'=>'Taha.husseine@gmail.com','nb_books'=>300)
    );
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return new Response("Bonjour");
    }
    #[Route('/showauthor/{name}', name: 'app_showauthor')]
    public function showauthor($name)
    {
        return $this->render('/author/show.html.twig',['n'=>$name]);
    }
    #[Route('/list', name: 'app_list')]
    public function list(){
        $auth = $this->authors;
        return $this->render('/author/list.html.twig',['Auth'=>$auth]);
    }
    #[Route('/authordetails/{id}', name:'app_authdetails')]
    public function authorDetails($id)
    {
        $selectedAuthor = null;
        foreach ($this->authors as $auteur) {
            if ($auteur['id'] == $id) {
                $selectedAuthor = $auteur;
                break;
            }
        }
        return $this->render('/author/showAuthor.html.twig',['author' => $selectedAuthor]);
    }
}
