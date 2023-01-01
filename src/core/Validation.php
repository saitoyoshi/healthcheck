<?php

class Validation
{
    private function isValid($number)
    {
        if (!is_numeric($number)) {
            return false;
        }
        return -2 <= $number && $number <= 2;
    }

    public function validate($record)
    {
        $errors = [];
        if ($record->isDuplicateDate($_POST['recording_date'])) {
            $errors['recording_date'] = '指定の日時の記録はすでにあります';
        }
        if (!(0 <= (int) $_POST['physical_condition'] && (int) $_POST['physical_condition'] <= 100)) {
            $errors['physical_condition'] = '体調は0~100の数値で入力してください';
        }
        if ($_POST['mood_state'] === "") {
            $errors['mood_state'] = '気分を入力してください';
        } elseif (!$this->isValid($_POST['mood_state'])) {
            $errors['mood_state'] = '気分は-2から2までの整数で入力してください';
        }
        if ($_POST['back_pain'] === "") {
            $errors['back_pain'] = '腰痛を入力してください';
        } elseif (!$this->isValid($_POST['back_pain'])) {
            $errors['back_pain'] = '腰痛は-2から2までの整数で入力してください';
        }
        if ($_POST['eyestrain'] === "") {
            $errors['eyestrain'] = '目の疲れを入力してください';
        } elseif (!$this->isValid($_POST['eyestrain'])) {
            $errors['eyestrain'] = '目の疲れは-2から2までの整数で入力してください';
        }
        if ($_POST['headache'] === "") {
            $errors['headache'] = '頭痛を入力してください';
        } elseif (!$this->isValid($_POST['headache'])) {
            $errors['headache'] = '頭痛は-2から2までの整数で入力してください';
        }

        if (!$this->isValidDateFormat($_POST['recording_date'])) {
            $errors['recording_date'] = '日付の形式が正しくありません';
        } elseif (!$this->isValidDate($_POST['recording_date'])) {
            $errors['recording_date'] = '日付が不正です';
        }
        return $errors;
    }

    private function isValidDateFormat($date)
    {
        return preg_match('/\A[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}\z/', $date) > 0;
    }

    private function isValidDate($date)
    {
        [$y, $m, $d] = explode('-', $date);
        return checkdate((int) $m, (int) $d, (int) $y);
    }
}
