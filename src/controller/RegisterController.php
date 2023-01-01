<?php

class RegisterController extends Controller
{
    public function index()
    {
        return $this->render([

        ]);
    }

    public function create()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }
        $record = $this->databaseManager->get('Record');
        $errors = $this->validation->validate($record);
        if (!count($errors)) {
            $record->insert($_POST['physical_condition'], $_POST['mood_state'], $_POST['back_pain'], $_POST['eyestrain'], $_POST['headache'], $_POST['recording_date']);
            header('Location: /');
            exit;
        }
        return $this->render([
            'errors' => $errors,
        ], 'index');
    }
}
