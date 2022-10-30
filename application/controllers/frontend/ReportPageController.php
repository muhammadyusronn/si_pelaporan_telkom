<?php
class ReportPageController extends MY_Controller
{
    public function index()
    {
        $data = [];
        $this->renders('report', $data);
    }
}
