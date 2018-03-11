<?php

use PHPUnit\Framework\TestCase;

class TaskListTest extends TestCase
{
    private $CI;

    // Setup
    public function setUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('tasks');
        $this->tasks = new Tasks();
    }

    public function testComplete()
    {
        $completed = $this->tasks->getComplete();
        $incomplete = $this->tasks->getIncomplete();
        $this->assertLessThan($completed, $incomplete);
    }
}