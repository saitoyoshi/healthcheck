<?php

class Record extends DatabaseModel
{
    public function fetchAllRecords()
    {
        return $this->fetchAll('select * from healthrecords');
    }
}
