<?php

class MainController extends Controller
{
    public function searchAction($searchString)
    {
        $result = Container::get('youtubeParser')->getVideos($searchString);
//        $this->mainModel->saveResult($searchString, $result);

        $result = Container::get('youtubeParser')->parseVideosDescriptionToHTML($result);

        return Container::get('response')->json($result);
    }

    public function matchWithExistingQueriesAction($searchString)
    {
        return Container::get('response')->json(
            $this->mainModel->getMatchedQueries($searchString)
        );
    }

    public function getQueryInfo($queryString)
    {
        return Container::get('response')->json(
            Container::get($this->mainModel->getVideosInfoBySearchQuery($queryString))
        );
    }

    public function indexAction()
    {
        return Container::get('response')->json(['asd' => 'asd']);
    }
}