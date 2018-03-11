<?php

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    private $CI;

    public function setUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('task');
        $this->task = new Task();
    }

    public function testEmptyTaskID()
    {
        $this->expectException('ArgumentCountError');
        $this->task->setTaskID();
        
    }

    public function testTaskID()
    {
        $this->task->setTaskID(5);
        $this->assertEquals(5, $this->task->taskID);
    }

    public function testEmptyTask()
    {
        $this->expectException('Error');
        $this->setTaskID();
    }

    public function testTaskName()
    {
        $this->task->setTaskName('asdf');
        $this->assertEquals('asdf', $this->task->taskName);
    }

    public function testSetPriority()
    {
        $this->task->setPriority('medium');
        $this->assertEquals('medium', $this->task->priority);
    }

    public function testEmptyPriority()
    {
        $this->expectException('ArgumentCountError');
        $this->task->setPriority();
    }

    public function testSize()
    {
        $this->task->setSize('large');
        $this->assertEquals('large', $this->task->size);
    }

    public function testEmptySize()
    {
        $this->expectException('ArgumentCountError');
        $this->task->setSize();
    }

    public function testGroup()
    {
        $this->task->setGroup('family');
        $this->assertEquals('family', $this->task->group);
    }

    public function testEmptyGroup()
    {
        $this->expectException('ArgumentCountError');
        $this->task->setGroup();
    }
}