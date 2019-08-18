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
        $article1 = new Article();
        $pictureArticle1 = new Media();

        $article1->setTitle('Yvard en concert au STADE DE FRANCE');
        $article1->setContent('Depuis ses début en 2016, jamais nous n\'aurions imaginer aller jusque là.
                                      Et pourtant, on y est les gars !!! Concert au Stade de France le 23 février 2042 !!' );
        $manager->persist($article1);
        $article1->setUser($this->getReference('user_admin'));
        $article1->setConcert($this->getReference('concert_PinGalant'));

        $pictureArticle1->setName('picture_article_'. $article1->getId());
        $pictureArticle1->setType('image');
        $pictureArticle1->setUrl('fixture1.png');
        $pictureArticle1->setArticle($article1);

        $manager->persist($pictureArticle1);

        $article2 = new Article();
        $pictureArticle2 = new Media();

        $article2->setTitle('Trois nouveaux titres pour le prochain album');
        $article2->setContent('Ils nous aura fallu 4 semaines pour composer et produire ces 3 nouveaux morceaux. 
                                       restez connecté, ils arriveront dans la semaine dans la rubrique Media.' );
        $manager->persist($article2);
        $article2->setUser($this->getReference('user_admin'));
        $article2->setRecording($this->getReference('recording_1'));

        $pictureArticle2->setName('picture_article_'. $article2->getId());
        $pictureArticle2->setType('image');
        $pictureArticle2->setUrl('fixture2.png');
        $pictureArticle2->setArticle($article2);

        $manager->persist($pictureArticle2);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class];
    }
}
