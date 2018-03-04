<?php

class Views extends Application
{

    public function index()
    {
        $this->data['pagetitle'] = 'Ordered TODO List';
        $tasks = $this->tasks->all();   // get all the tasks
        $this->data['content'] = 'Ok'; // so we don't need pagebody
        $this->data['leftside'] = $this->makePrioritizedPanel($tasks);
		$this->data['rightside'] = $this->makeCategorizedPanel($tasks);

        $this->render('template_secondary'); 
    }
	
	function makePrioritizedPanel($tasks) {
		$parms = ['display_tasks' => $this->tasks->getPrioritizedTasks()];
		$role = $this->session->userdata('userrole');
		$parms['completer'] = ($role == ROLE_OWNER) ? '/views/complete' : '#';
		return $this->parser->parse('by_priority',$parms,true);
	}
	
	function makeCategorizedPanel($tasks)
	{
		$parms = ['display_tasks' => $this->tasks->getCategorizedTasks()];
		return $this->parser->parse('by_category', $parms, true);
	}

	function complete()
	{
		$role = $this->session->userdata('userrole');
		if ($role != ROLE_OWNER) redirect('/views');

        // loop over the post fields, looking for flagged tasks
		foreach($this->input->post() as $key=>$value)
		{
			if (substr($key,0,4) == 'task')
			{
				$taskid = substr($key,4);
				$task = $this->tasks->get($taskid);
				$task->status = 2; // complete
				$this->tasks->update($task);
            }
        }
        $this->index();
	}
}