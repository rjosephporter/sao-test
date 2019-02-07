<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asana;

class SaoTestController extends Controller
{

    private $asana;
    private $config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $config = [
            'accessToken'   =>  env('ASANA_TOKEN', false),
            'workspaceId'   =>  env('ASANA_WORKSPACE', null),
            'projectId'     =>  env('ASANA_PROJECT', null)
        ];
        $this->asana = new Asana($config);
    }

    public function main(Request $request)
    {
        // Get assignee email or id
        $assignee = $request->input('assignee');

        // Create Main Task
        $mainTask = $this->asana->createTask([
           'name'      => 'This is the main task', // Name of task
           'notes'     => 'Instructions go here:  <instructions>',
        ]);

        // Create Sub Task
        $subTask = $this->asana->createTask([
           'name'      => 'This is the subtask', // Name of task
           'notes'     => 'This is the task description',
           'assignee'  => $assignee // Assign task to...
        ]);

        // Set Main Task as parent of Sub Task
        $this->asana->setTaskParent($subTask->data->id, [
            'parent'    => $mainTask->data->id
        ]);

        // Assign Main Task to Project
        $result = $this->asana->addProjectToTask($mainTask->data->id);        

        // Dump main task id
        return $mainTask->data->id;

    }
}
