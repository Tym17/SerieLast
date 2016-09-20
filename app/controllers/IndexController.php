<?php

class IndexController extends Controller
{

    function index()
    {
        if (!isset($_SESSION['id']))
        {
            $this->_template->setRedirection(APP_URL . '/login');
            return ;
        }

        // Get user's series
        $serie = new SerieModel;
        $series = $serie->getSeriesFromOwnerId($_SESSION['id']);
        // Pass series to the template
        $this->set('series', $series);
    }
}
