<?php

class Task extends Entity
{
    public $taskID;
    public $taskName;
    public $priority;
    public $size;
    public $group;

    public function setTaskID($id)
    {
        if (empty($id))
        {
            throw new InvalidArgumentException('Empty ID');
        }
        $this->taskID = $id;
        return $this;
    }

    public function setTaskName($name)
    {
        if (empty($name))
        {
            throw new InvalidArgumentException('Empty name');
        }
        if (strlen($name) <= 0 || strlen($name) > 50)
        {
            throw new InvalidArgumentException('Invalid name.');
        }

        $this->taskName = $name;
        return $this;
    }

    public function setPriority($priority)
    {
        if (empty($priority))
        {
            throw new InvalidArgumentException('Empty priority.');
        }
        $valid = ['high', 'medium', 'low'];
        if (!in_array($priority, $valid))
        {
            throw new InvalidArgumentException('Invalid priority.');
        }

        $this->priority = $priority;
        return $this;
    }

    public function setSize($size)
    {
        if (empty($size))
        {
            throw new InvalidArgumentException('Empty size.');
        }
        $valid = ['large', 'medium', 'small'];
        if (!in_array($size, $valid))
        {
            throw new InvalidArgumentException('Invalid size.');
        }
        $this->size = $size;
        return $this;
    }

    public function setGroup($group)
    {
        if ($empty($group))
        {
            throw new InvalidArgumentException('Empty group.');
        }
        $valid = ['family', 'house', 'work', 'school'];
        if (!in_array($group, $valid))
        {
            throw new InvalidArgumentException('Invalid group');
        }
        $this->group = $group;
        return $this;
    }
}

