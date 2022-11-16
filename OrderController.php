<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Order;
use App\Form\OrderType;
/**
 * Order controller.
 * @Route("/api", name="api_")
 */
class OrderController extends FOSRestController
{
  /**
   * Lists all Orders.
   * @Rest\Get("/orders")
   *
   * @return Response
   */
  public function getOrderAction()
  {
    $repository = $this->getDoctrine()->getRepository(Order::class);
    $movies = $repository->findall();
    return $this->handleView($this->view($movies));
  }
  /**
   * Create Order.
   * @Rest\Post("/order")
   *
   * @return Response
   */
  public function postMovieAction(Request $request)
  {
    $order = new Order();
    $form = $this->createForm(OrderType::class, $order);
    $data = json_decode($request->getContent(), true);
    $form->submit($data);
    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($order);
      $em->flush();
      return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }
    return $this->handleView($this->view($form->getErrors()));
  }
}