<?php

namespace API\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;   //Lets use annotations for our FOSRest config
use FOS\RestBundle\Routing\ClassResourceInterface;   
use FOS\Rest\Util\Codes;
use FOS\RestBundle\View\View;
use API\NewsBundle\Entity\Article;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
class ArticlesController extends FOSRestController {
	
	/**
	 * @Route("/articles.{_format}", defaults={"_format" = "json"})
	 * @return array
	 */
	public function getArticlesAction(){
		$view = View::create();
		$articlesQ = $this->getDoctrine()->getRepository('NewsBundle:Article')
				->findAll();
		$articles = array();
		
		foreach($articlesQ as $article){
			$articles[] = $article;
		}
		
		$view->setData($articles);
		
		return $view;
		
	}
	
	/**
	 * 
	 * @param \API\NewsBundle\Entity\Article $article
	 * @return array
	 */
	public function getArticleAction(Article $article){
		$view = View::create();
		$view->setData($article);
		return $view;
	}
	
}
