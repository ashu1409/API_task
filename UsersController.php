<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\{Request, Response};
use Symfony\Component\Config\Definition\Exception\Exception;
use AppBundle\Utils\PaginatorUtil;



class UsersController extends FOSRestController
{
  /**
   * @Route("test", name="test")
   */
  public function testAction(Request $request)
  {
    //$request = $this->get('request');
      $hi = $this->get('app.OrderService')->getServiceConstant('ORDERS_PER_PAGE');

      return new Response($hi);
  }
}
