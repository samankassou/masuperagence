<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{

  /**
   *
   * @var PropertyRepository
   */
  private $repositiry;
   public function __construct(PropertyRepository $repositiry)
    {
      $this->repositiry = $repositiry;
    }
  /**
   * @Route("/biens", name="property.index")
   *
   * @return Response
   */
  public function index(): Response
  {
   
    /*$property = new Property;
    $property->setTitle('Mon premier bien')
    ->setPrice(200000)
    ->setRooms(4)
    ->setBedrooms(3)
    ->setDescription('Une petite description')
    ->setSurface(60)
    ->setFloor(4)
    ->setHeat(1)
    ->setCity('Montpellier')
    ->setAdress('15 rue de demo')
    ->setPostalCode(2407);
    $em = $this->getDoctrine()->getManager();
    $em->persist($property);
    $em->flush();*/
    $property = $this->repositiry->findAllVisible();
    dump($property);
    return $this->render("property/index.html.twig", [
      'current_menu' => 'properties'
    ]);
  }
}
