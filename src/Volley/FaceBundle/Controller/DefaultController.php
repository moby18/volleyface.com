<?php

namespace Volley\FaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // news
        $news = $em->getRepository('VolleyFaceBundle:Post')->findBy(array('category' => 1), array('id' => 'DESC'));

        return $this->render('VolleyFaceBundle:Default:index.html.twig', array(
            'news' => $news
        ));
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

    public function postAction($post_id)
    {
        $em = $this->getDoctrine()->getManager();

        // post
        $post = $em->getRepository('VolleyFaceBundle:Post')->find($post_id);

        return $this->render('VolleyFaceBundle:Default:post.html.twig', array(
            'post' => $post
        ));
    }

    public function blogAction($category_id)
    {
        $em = $this->getDoctrine()->getManager();

        // post
        $posts = $em->getRepository('VolleyFaceBundle:Post')->findBy(array('category' => $category_id), array('id' => 'DESC'));

        return $this->render('VolleyFaceBundle:Default:blog.html.twig', array(
            'posts' => $posts
        ));
    }

    public function zayavkaAction()
    {

        return $this->render('VolleyFaceBundle:Default:zayavka.html.twig', array(
        ));
    }

    public function statTournamentAction($season_id, $tournament_id)
    {
        $em = $this->getDoctrine()->getManager();

        /**
         * @var Season $season
         */
        $seasonID = $season_id;
        $season = $em->getRepository('VolleyStatBundle:Season')->find($seasonID);

        // tournamrnt
        $tournamentID = $tournament_id;
        $tournament = $em->getRepository('VolleyStatBundle:Tournament')->find($tournamentID);

        // rounds
//        $rounds = $tournament->getRounds();

        $teams = $season->getTeams();

        $games = $season->getGames();

        $table = array();
        foreach ($teams as $team) {
            $table[$team->getID()] = array('team' => $team, 'points' => 0, 'games' => 0, 'win' => 0, 'loss' => 0, 'win_sets' => 0, 'loss_sets' => 0, 'win_points' => 0, 'loss_points' => 0);
        }

        /**
         * @var Game $game
         */
        foreach ($games as $game) {

            if (!$game->getPlayed())
                continue;
            if ($game->getHomeTeam()) {
                $homeTeamId = $game->getHomeTeam()->getId();
                $table[$homeTeamId]['games'] += 1;
            }
            else
                $homeTeamId = 0;
            if ($game->getAwayTeam()) {
                $awayTeamId = $game->getAwayTeam()->getId();
                $table[$awayTeamId]['games'] += 1;
            }
            else
                $awayTeamId = 0;

            $homeTeamSets = $game->getScoreSetHome();
            $awayTeamSets = $game->getScoreSetAway();

            if ($homeTeamSets > $awayTeamSets) {
                if ($homeTeamId) $table[$homeTeamId]['win'] += 1;
                if ($homeTeamId) $table[$homeTeamId]['win_sets'] += $homeTeamSets;
                if ($awayTeamId) $table[$awayTeamId]['loss'] += 1;
                if ($awayTeamId) $table[$awayTeamId]['loss_sets'] += $awayTeamSets;
                if ($homeTeamSets - $awayTeamSets >= 2) {
                    if ($homeTeamId) $table[$homeTeamId]['points'] += 3;
                    if ($awayTeamId) $table[$awayTeamId]['points'] += 0;
                } else {
                    if ($homeTeamId) $table[$homeTeamId]['points'] += 2;
                    if ($awayTeamId) $table[$awayTeamId]['points'] += 1;
                }
            } else {
                if ($homeTeamId) $table[$homeTeamId]['loss'] += 1;
                if ($homeTeamId) $table[$homeTeamId]['loss_sets'] += $homeTeamSets;
                if ($awayTeamId) $table[$awayTeamId]['win'] += 1;
                if ($awayTeamId) $table[$awayTeamId]['win_sets'] += $awayTeamSets;
                if ($awayTeamSets - $homeTeamSets >= 2) {
                    if ($homeTeamId) $table[$homeTeamId]['points'] += 0;
                    if ($awayTeamId) $table[$awayTeamId]['points'] += 3;
                } else {
                    if ($homeTeamId) $table[$homeTeamId]['points'] += 1;
                    if ($awayTeamId) $table[$awayTeamId]['points'] += 2;
                }
            }
        }

        usort($table, function ($a, $b) {
//            return strcmp($b['points'], $a['points']);
            if($a['points']==$b['points']) return 0;
            return $a['points'] > $b['points']?1:-1;
        });

        $tours = $season->getTours();

        return $this->render('VolleyFaceBundle:Stat:tournament.html.twig', array(
            'season' => $season,
            'tournament' => $tournament,
            'table' => $table,
            'tours' => $tours
        ));
    }

    public function statTeamAction($team_id)
    {
        $em = $this->getDoctrine()->getManager();

        // team
        $teamID = $team_id;
        $team = $em->getRepository('VolleyStatBundle:Team')->find($teamID);

        return $this->render('VolleyFaceBundle:Stat:team.html.twig', array(
            'team' => $team
        ));
    }

    public function genAction()
    {
//        for ($i = 1; $i <=98; $i++) {
//            print_r('<p><img src="../../../web/uploads/images/2014/12/07/Image'.str_pad($i, 5, '0', STR_PAD_LEFT).'.jpg" alt="" width="1140" height="auto"></p>');
//        }
        for ($i = 1; $i <=200; $i++) {
            $path = '../../../web/uploads/images/2015/01/24/Image'.str_pad($i, 5, '0', STR_PAD_LEFT).'.jpg';
            print_r('<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3"><a class="thumbnail fancybox" rel="ligthbox" href="'.$path.'"><img class="img-responsive" alt="" src="'.$path.'"/></a></div>');
        }
        exit;
    }

}
