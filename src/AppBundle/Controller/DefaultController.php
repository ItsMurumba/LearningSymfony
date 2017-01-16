<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @Route("/random")
     */
    public function numberAction(){
        $number=rand(0,100);

        return new Response(
            '<html><body>Lucky Number:  '.$number.'</body></html>'
        );
    }


    /**
     * @Route("api/random")
     */
    public function apiNumberAction(){
        $data=array(
            'lucky_number'=>rand(0,100),
        );
        return new Response(
            json_encode($data),
            200,
            array('Content_Type'=>'application/json')

        );
    }


    /**
     * @Route("random/{count}")
     */
    public function numberActionCount($count){
        $numbers=array(); //declare the variable numbers as an array
        for ($i=0;$i<$count;$i++){ //for loop
            $numbers[]=rand(0,100); //for each loop, a randomization is done
        }
        $numberList=implode(',',$numbers);//put the number together to form a single output

        $html=$this->render(
            '/number.html.twig',
            array('luckyNumberList'=>$numberList)
        );
//        return new Response(
//            '<html><body>Lucky Numbers are:'.$numberList.'</body></html>'
//        );
        return new Response($html);
    }

}
