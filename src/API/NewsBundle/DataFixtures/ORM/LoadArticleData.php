<?php

namespace API\NewsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use API\NewsBundle\Entity\Article;

class LoadArticleData implements FixtureInterface{
	
	
	public function load(ObjectManager $manager) {
		$news1 = new Article();
		$news1->setTitle('The first article');
		$news1->setDescription('There is not much to say about this article really. Lets just see how this goes');
		$news1->setAuthor('Kib Ali');
		
		$news2 = new Article();
		$news2->setTitle('The second article');
		$news2->setDescription('Just another article with some content. This is just a test.');
		$news2->setAuthor('Kib Ali');
		
		$news3 = new Article();
		$news3->setTitle('Third article');
		$news3->setDescription('Yet another article with some content. THis should be the last test.');
		$news3->setAuthor('Kib Ali');
		
		$manager->persist($news1);
		$manager->persist($news2);
		$manager->persist($news3);
		
		$manager->flush();
	}
}