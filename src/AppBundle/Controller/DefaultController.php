<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TestEntity;
use AppBundle\Service\Datagrid;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Template()
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return ['data' => 'hello'];
    }

    /**
     * @Route("/demo", name="demo")
     */
    public function demoAction(Request $request)
    {
        /** @var Datagrid $datagrid */
        $datagrid = $this->get('app.datagrid');
        return new Response($datagrid->getDatagridData("TestEntity", ['id','date', 'testfieldone', 'testfieldtwo']));
    }

    /**
     * @Template()
     * @Route("/create", name="create_test_data")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        for($i = 0;$i<20; $i++){
            $testItem = new TestEntity();
            $testItem->setTestfieldone("test content " . $i);
            $testItem->setTestfieldtwo($i);
            $testItem->setDate(new DateTime());
            $em->persist($testItem);
        }
        $em->flush();
        return new Response("тестовые данные созданы");
    }
}

