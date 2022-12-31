<?php

class ListController extends Controller
{
    public function index()
    {
        // $mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
        // if ($mysqli->connect_error) {
        //     throw new RuntimeException('mysqli接続エラー： ' . $mysqli->connect_error);
        // }
        // $records = $mysqli->query('select * from healthrecords')->fetch_assoc();
            $records = $this->databaseManager->get('Record')->fetchAllRecords();

        return $this->render([
            'records' => $records,
        ]);
    }
}
