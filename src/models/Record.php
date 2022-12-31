<?php

class Record extends DatabaseModel
{
    public function fetchAllRecords()
    {
        return $this->fetchAll('select physical_condition, mood_state, back_pain, eyestrain, headache, recording_date from healthrecords');
    }

    public function insert($physical_condition, $mood_state, $back_pain, $eyestrain, $headache, $recording_date)
    {
        $this->execute('insert into healthrecords (physical_condition, mood_state, back_pain, eyestrain, headache, recording_date) values (?, ?, ?, ?, ?, ?)', ['iiiiis', $physical_condition, $mood_state, $back_pain, $eyestrain, $headache, $recording_date]);
    }
}
