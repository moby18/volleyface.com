<?php

namespace Volley\Bundle\FaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // season
        $seasonID = 1;
        $season = $em->getRepository('VolleyFaceBundle:Season')->find($seasonID);

        // tournamrnt
        $tournamentID = 1;
        $tournament = $em->getRepository('VolleyFaceBundle:Tournament')->find($tournamentID);

        // rounds
        $rounds = $tournament->getRounds();

        // games
        foreach ($rounds as $round) {
            $games = $round->getGames();
            foreach ($games as $game) {
//                print_r($game->getId());
            }
        }




        return $this->render('VolleyFaceBundle:Default:index.html.twig', array());
    }

    public function tournamentAction($season_id, $tournament_id)
    {
        $em = $this->getDoctrine()->getManager();

        // season
        $seasonID = $season_id;
        $season = $em->getRepository('VolleyFaceBundle:Season')->find($seasonID);

        // tournamrnt
        $tournamentID = $tournament_id;
        $tournament = $em->getRepository('VolleyFaceBundle:Tournament')->find($tournamentID);

        // rounds
        $rounds = $tournament->getRounds();

        // games
//        foreach ($rounds as $round) {
//            $games = $round->getGames();
//            foreach ($games as $game) {
//            }
//        }

        return $this->render('VolleyFaceBundle:Default:tournament.html.twig', array(
            'season' => $season,
            'tournament' => $tournament,
            'rounds' => $rounds,
        ));
    }

    public function teamAction($team_id)
    {
        $em = $this->getDoctrine()->getManager();

        // team
        $teamID = $team_id;
        $team = $em->getRepository('VolleyFaceBundle:Team')->find($teamID);

        // players
        $players[] = $team->getPlayerOne();
        $players[] = $team->getPlayerTwo();

        return $this->render('VolleyFaceBundle:Default:team.html.twig', array(
            'team' => $team,
            'players' => $players
        ));
    }

    public function playerAction($player_id)
    {
        $em = $this->getDoctrine()->getManager();

        // player
        $playerID = $player_id;
        $player = $em->getRepository('VolleyFaceBundle:Player')->find($playerID);

        return $this->render('VolleyFaceBundle:Default:player.html.twig', array(
            'player' => $player
        ));
    }

}
