<?php

class Action
{
    private $iterator, $children, $adults;

    /**
     * @param Persons $body
     *
     * Adding participants for time travel
     */
    public function addBody(Persons $body)
    {
        switch ($body->getCapacity()) {
            case 0.5:
                $this->children[] = $body;
                break;
            case 1:
                $this->adults[] = $body;
                break;
            default:
                $this->adults[] = $body;
        }
    }

    /**
     * Moving participants
     */
    public function move()
    {
        if (count($this->children) > 2) {

            //teleport children
            while (count($this->children) > 2) {
                //child #1, child #2 => teleport
                //child #1 <= return
                unset($this->children[count($this->children) - 1]);
                $this->iterator += 2;
            }
        }

        //teleport adults
        foreach ($this->adults as $value) {
            //child #1, child #2 => teleport
            //child #1 <= return
            //adult => teleport
            //child #2 <= return
            $this->iterator += 4;
        }

        //child #1, child #2 => teleport
        $this->iterator++;

        //write log to database
        $db_log = new DatabaseManager();
        $db_log->writeLog($this->iterator);
    }
}