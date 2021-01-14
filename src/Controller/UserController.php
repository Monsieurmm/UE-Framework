<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

class UserController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param EntityManagerInterface $em
     * @param UserService $userService
     */
    public function __construct(EntityManagerInterface $em, UserService $userService)
    {
        $this->em = $em;
        $this->userService = $userService;
    }

    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user, [
            'action' => $this->generateUrl('home'),
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $this->em->persist($user);
            $this->em->flush();

            return $this->redirectToRoute('hello');
        }

        return $this->render('_nav_login.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/users", name="getUsers")
     * @return JsonResponse
     */
    public function getUsers(): JsonResponse
    {
        $users = $this->userService->getAllUsers();

        return $this->json($users, 200, ["Content-Type" => "application/json"]);
    }
}