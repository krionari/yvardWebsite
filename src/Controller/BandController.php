<?php
/**
 * Created by PhpStorm.
 * User: Krionari
 * Date: 22/12/2019
 * Time: 14:10
 */

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BandController
 * @Route("/groupe")
 */
class BandController extends AbstractController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/histoire", name="band_history")
     */
    public function index()
    {
        $members = $this->userRepository->findBy(['type' => 'member']);

        return $this->render('band/history.html.twig', [
            'members' => $members,
        ]);
    }

    /**
     * @Route("/membre/{firstname}", name="membre")
     */
    public function show(User $member)
    {
        $description = $member->getDescription();
        $description = str_replace('YVARD', '<span>YVARD</span>', $description);
        $member->setDescription($description);
        return $this->render('band/member.html.twig',[
            'member' => $member
        ]);
    }

}