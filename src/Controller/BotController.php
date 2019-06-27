<?php
namespace App\Controller;

use App\Entity\Expowiska;
use App\Entity\Mapy;
use App\Entity\MapyGlowne;
use App\Entity\Moby;
use App\Entity\Questy;
use App\Entity\Sklepy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;



class BotController extends AbstractController {


    /**
     * @Route("/sklepy/nowy", name="nowy_sklep")
     */
    public function nowySklep(){
        $result = false;
        $request = Request::createFromGlobals();

        if($request->query->has('mapa') && $request->query->has('nick')&& $request->query->has('x') && $request->query->has('y') && $request->query->has('shopId')&& $request->query->has('procent')){
            $mapa = str_replace(' ', '_', $request->query->get('mapa'));
            $nick = $request->query->get('nick');
            $x = $request->query->getInt('x');
            $y = $request->query->getInt('y');
            $shopId = $request->query->getInt('shopId');
            $procent = $request->query->getInt('procent');

            $menedzer = $this->getDoctrine()->getManager();
            $repozytorium = $this->getDoctrine()->getRepository(Sklepy::class);

            $wynik = $repozytorium->findOneBy(['mapa'=>$mapa,'nick'=>$nick]);
            if(!$wynik){
                $bot = new Sklepy;
                $bot->setMapa($mapa);
                $bot->setNick($nick);
                $bot->setX($x);
                $bot->setY($y);
                $bot->setShopId($shopId);
                $bot->setProcent($procent);

                $menedzer->persist($bot);
                $menedzer->flush();
                $result = true;
            }


        }
        return new Response();
    }
    /**
     * @Route("/sklepy/{mapa}", name="pobierz_sklep")
     */
    public function pobierzSklep($mapa){
        $mapa = str_replace(' ', '', $mapa);
        $repozytorium = $this->getDoctrine()->getRepository(Sklepy::class);
        $wynik = $repozytorium->findOneBy(['mapa'=>$mapa]);
        if(!$wynik){
            $bot = array();
        }else{
            $bot["nick"] = $wynik->getNick();
            $bot["x"] = $wynik->getX();
            $bot["y"] = $wynik->getY();
            $bot["shopId"] = $wynik->getShopId();
        }

        $response = new Response($this->renderView('newShop.js.twig',$bot),200);
        $response->headers->set('Content-Type','application/javascript');

        return $response;
    }
    /**
     * @Route("/mapy/nowa",name="nowa_mapa")
     */
    public function nowaMapa(){
        $result = false;
        $request = Request::createFromGlobals();
        if($request->query->has('mapa') && $request->query->has('mapaId')&& $request->query->has('pvp')&& $request->query->has('przejscia')){
            $mapa = str_replace(' ', '_', $request->query->get('mapa'));
            $mapaId = $request->query->getInt('mapaId');
            $pvp = $request->query->get('pvp');
            $przejscia = $request->query->get('przejscia');

            $menedzer = $this->getDoctrine()->getManager();
            $repozytorium = $this->getDoctrine()->getRepository(Mapy::class);

            $wynik = $repozytorium->findOneBy(['mapa'=>$mapa,'mapaId'=>$mapaId]);
            if(!$wynik){
                $bot = new Mapy;
                $bot->setMapa($mapa);
                $bot->setMapaId($mapaId);
                $bot->setPrzejscia($przejscia);
                $bot->setPvp($pvp);

                $menedzer->persist($bot);
                $menedzer->flush();
                $result = true;
            }


        }
        return new Response();
    }
    /**
     * @Route("/mapy/glowne/aktualizuj",name="aktualizuj_glowne_mapy")
     */
    public function aktualizujGlowneMapy(){
        $request = Request::createFromGlobals();
        if($request->query->has('mapa')){
            $json = $request->query->get('mapa');
            $jsonArray = json_decode($json,true);
            $menedzer = $this->getDoctrine()->getManager();
            $repozytorium = $this->getDoctrine()->getRepository(MapyGlowne::class);
            $wynik = $repozytorium->findOneBy(['mapID'=>$jsonArray['id']]);

            if(!$wynik){
                $glownaMapa = new MapyGlowne;
                $glownaMapa->setMapId($jsonArray['id']);
                $glownaMapa->setNazwaMapy($jsonArray['name']);

                $menedzer->persist($glownaMapa);
                $menedzer->flush();
            }else{
                $wynik->setMapId($jsonArray['id']);
                $wynik->setNazwaMapy($jsonArray['name']);

                $menedzer->flush();
            }
        }
        return new Response();
    }
    /**
     * @Route("/przejscia/proponowane",name="pobierz_proponowane_przejscia")
     */
    public function pobierzProponowanePrzejscia(){
        $requset = Request::createFromGlobals();
        $przejscia = array();
        if($requset->query->has('przejscia')){
            $przejscia = json_decode($requset->query->get('przejscia'));
            $menedzer = $this->getDoctrine()->getManager();
            $mapyGlowneRep = $menedzer->getRepository(MapyGlowne::class);
            $mapyRep = $menedzer->getRepository(Mapy::class);

            foreach ($przejscia as $key => $value){
                $name = $przejscia[$key]->name;
                $przejscia[$key]->pvp = "null";
                $wynik = $mapyRep->findOneBy(["mapa"=>$name]);
                if(!$wynik){
                    $przejscia[$key]->odwiedzona = 0;
                }else{
                    $przejscia[$key]->odwiedzona = 1;
                    $przejscia[$key]->pvp = $wynik->getPvp();
                }

                $wynik = $mapyGlowneRep->findOneBy(["nazwaMapy"=>$name]);

                if(!$wynik){
                    $przejscia[$key]->glowna = 0;
                }else{
                    $przejscia[$key]->glowna = 1;
                }
                $przejscia[$key]->name = str_replace('_',' ',$przejscia[$key]->name);
            }
        }
        $response = new Response($this->renderView('przejscia.js.twig',["przejscia"=>$przejscia]),200);
        $response->headers->set('Content-Type','application/javascript');
        $response->headers->set('charset','utf-8');
        return $response;
    }
    /**
     * @Route("/moby/nowe",name="nowe_moby")
     */
    public function noweMoby(){
        $request = Request::CreateFromGlobals();
        if($request->query->has('mapa') && $request->query->has('max') && $request->query->has('min') && $request->query->has('unikalneMoby')){

            $mapa = $request->query->get('mapa');
            $min = $request->query->get('min');
            $max = $request->query->get('max');
            $unikalneMoby = $request->query->get('unikalneMoby');

            $menadzer = $this->getDoctrine()->getManager();
            $repozytroium = $menadzer->getRepository(Moby::class);

            $wynik = $repozytroium->findOneBy(['mapa'=>$mapa]);

            if(!$wynik){
                $mob = new Moby;
                $mob->setMapa($mapa);
                $mob->setMax($max);
                $mob->setMin($min);
                $mob->setUnikalneMoby($unikalneMoby);
                $menadzer->persist($mob);
                $menadzer->flush();
            }else{
                if($max>$wynik->getMax())$wynik->setMax($max);
                if($min<$wynik->getMin())$wynik->setMin($min);
                $menadzer->flush();
            }
        }
        return new Response();
    }

    /**
     * @Route("/expowiska/aktualizuj",name="expowiska_nowe")
     */
    public function expowiska(){
        $request = Request::createFromGlobals();

        if($request->query->has('moby') && $request->query->has('mapa')&& $request->query->has('od')&& $request->query->has('do')){
            $moby = $request->query->get('moby');
            $mapa = str_replace(' ', '_', $request->query->get('mapa'));
            $od = $request->query->getInt('od');
            $do = $request->query->getInt('do');

            $manadzer = $this->getDoctrine()->getManager();

            $exp = new Expowiska;
            $exp->setMapa($mapa);
            $exp->setMoby($moby);
            $exp->setOd($od);
            $exp->setDo($do);

            $manadzer->persist($exp);
            $manadzer->flush();
        }
        return new Response();
    }
    /**
     * @Route("/expowiska/{lvl}",name="pobierz_exp")
     */
    public function pobierzExpowiska($lvl){
        $repozytorium = $this->getDoctrine()->getRepository(Expowiska::class);
        $expowiska = $repozytorium->findBy(['od'=>$lvl]);
        $odpowiedz = [];
        foreach ($expowiska as $key => $value){
            $mapa = $value->getMapa();
            $mapa = preg_replace("/_/"," ",$mapa);
            $moby = $value->getMoby();
            $odpowiedz[$key]['moby'] = $moby;
            $odpowiedz[$key]['mapa'] = $mapa;
        }
        $response = new Response($this->renderView('exp.js.twig',["expowiska"=>$odpowiedz]),200);
        $response->headers->set('Content-Type','application/javascript');
        $response->headers->set('charset','utf-8');
        return $response;
    }
    /**
     * @Route("/questy/nowy",name="nowy_quest")
     */
    public function nowyQuest(){
        $request = Request::createFromGlobals();
        if($request->query->has('nazwa') && $request->query->has('lvl') && $request->query->has('mapa')){
            $nazwa = $request->query->get('nazwa');
            $lvl = $request->query->get('lvl');
            $mapa = $request->query->get('mapa');

            $manadzer = $this->getDoctrine()->getManager();

            $quest = new Questy;
            $quest->setMapa($mapa);
            $quest->setLvlMin($lvl);
            $quest->setNazwa($nazwa);

            $manadzer->persist($quest);
            $manadzer->flush();
        }

        return new Response();
    }
    /**
     * @Route("/questy/{lvl}",name="pobierz_questy")
     */
    public function pobierzQuesty($lvl){
        $response = new Response();
        $response->headers->set('Content-Type','application/javascript');
        $response->headers->set('charset','utf-8');
        return $response;
    }


}
