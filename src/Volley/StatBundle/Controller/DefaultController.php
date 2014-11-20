<?php

namespace Volley\StatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("stat/tournament/{tournament_id}/season/{season_id}", name="volley_face_stat_tournament")
     * @Template()
     */
    public function tournamentAction($tournament_id, $season_id)
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
            return strcmp($a['points'], $b['points']);
        });

        $tours = $season->getTours();

        return $this->render('VolleyStatBundle:Default:tournament.html.twig', array(
            'season' => $season,
            'tournament' => $tournament,
            'table' => $table,
            'tours' => $tours
        ));
    }

    /**
     * @Route("stat/team/{team_id}", name="volley_face_stat_team")
     * @Template()
     */
    public function teamAction($team_id)
    {
        $em = $this->getDoctrine()->getManager();

        // team
        $teamID = $team_id;
        $team = $em->getRepository('VolleyStatBundle:Team')->find($teamID);

        return $this->render('VolleyStatBundle:Default:team.html.twig', array(
            'team' => $team
        ));
    }
}
