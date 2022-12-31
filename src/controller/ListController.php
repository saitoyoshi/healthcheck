<?php

class ListController extends Controller
{
    public function index()
    {
        $records = $this->databaseManager->get('Record')->fetchAllRecords();

        return $this->render([
            'records' => $records,
        ]);
    }
}
