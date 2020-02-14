<?php

namespace App\Controller;

use App\Entity\Topic;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use App\Repository\TopicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CategoryRepository $categoryRepository)
    {
        $allCategories = $categoryRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'categories' => $allCategories
        ]);
    }

    /**
     * @Route("/category/{topicId}", name="category_list")
     */
    public function listPostByCategorie($topicId, TopicRepository $topicRepository) {
        $topic = $topicRepository->find($topicId);
        return $this->render('home/posts.html.twig', [
            'controller_name' => 'HomeController',
            'topic' => $topic
        ]);
    }

    /**
     * @Route("/post/{postId}", name="post_view")
     */
    public function showPost($postId, PostRepository $postRepository) {
        $post = $postRepository->find($postId);
        return $this->render('home/show_post.html.twig', [
            'controller_name' => 'HomeController',
            'post' => $post
        ]);
    }
}
