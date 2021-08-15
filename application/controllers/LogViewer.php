<?php
defined('BASEPATH') or exit('No direct script access allowed');

use CILogViewer\CILogViewer;

class LogViewer extends MY_Controller
{
    private $logViewer;

    public function __construct()
    {
        parent::__construct();
        $this->logViewer = new CILogViewer();
        //...
    }

    public function index()
    {
        echo $this->logViewer->showLogs();
        return;
    }
}
