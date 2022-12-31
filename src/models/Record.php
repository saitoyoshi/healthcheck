<?php

class Record extends DatabaseModel
{
    public function fetchAllRecords()
    {
        // ["id"]=> string(1) "1" ["physical_condition"]=> string(2) "50" ["mood_state"]=> string(1) "1" ["back_pain"]=> string(1) "0" ["eyestrain"]=> string(2) "-1" ["headache"]=> string(2) "-2" ["recording_date"]=> string(10) "2022-12-31" ["created_at"]=> string(19) "2022-12-31 01:58:59"
        return $this->fetchAll('select physical_condition, mood_state, back_pain, eyestrain, headache, recording_date from healthrecords');
    }
}
