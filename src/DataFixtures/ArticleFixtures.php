<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $pictureArticle = new Media();
        $article->setTitle('Yvard en concert au STADE DE FRANCE');
        $article->setContent('Depuis ses débute en 2016, jamais nous n\'aurions imaginer aller jusque là.
                                      Et pourtant, on y est les gars !!! Concert au Stade de France le 23 février 2042 !!' );
        $manager->persist($article);
        $article->setUser($this->getReference('user_admin'));

        $manager->flush();

        $pictureArticle->setName('picture_article_'. $article->getId());
        $pictureArticle->setType('image');
        $pictureArticle->setUrl('fixture1.png');
        $pictureArticle->setArticle($article);

        $manager->persist($pictureArticle);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class];
    }
}
