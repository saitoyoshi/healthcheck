<?php

class Record extends DatabaseModel
{
    public function fetchAllRecords()
    {
        return $this->fetchAll('select physical_condition, mood_state, back_pain, eyestrain, headache, recording_date from healthrecords order by created_at desc');
    }

    public function insert($physical_condition, $mood_state, $back_pain, $eyestrain, $headache, $recording_date)
    {
        $this->execute('insert into healthrecords (physical_condition, mood_state, back_pain, eyestrain, headache, recording_date) values (?, ?, ?, ?, ?, ?)', ['iiiiis', $physical_condition, $mood_state, $back_pain, $eyestrain, $headache, $recording_date]);
    }

    public function isDuplicateDate($date)
    {
        $records = $this->fetchAll('select recording_date from healthrecords');
        $datesSet = array_map(function ($array) {
            return $array['recording_date'];
        }, $records);
        if (in_array($date, $datesSet)) {
            return true;
        }
        return false;
    }
}
