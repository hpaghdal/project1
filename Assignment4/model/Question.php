<?php
class Question{

    private $owneremail,$ownerid, $questionTitle,$questionbody,$skills ,$datetime, $id;

    public function __construct( $owneremail,$ownerid,$datetime, $questionTitle,$questionbody,$skills)
    {
        $this ->owneremail=$owneremail;
        $this ->ownerid=$ownerid;
        $this ->datetime=$datetime;
        $this ->questionTitle=$questionTitle;
        $this ->questionbody=$questionbody;
        $this ->skills=$skills;
    }

    public function getOwneremail(){
        return $this ->owneremail;
    }

    public function setOwneremail($value) {
        $this->owneremail = $value;
    }


    public function getOwnerid(){
        return $this ->ownerid;
    }

    public function setOwnerid($value) {
        $this->ownerid = $value;
    }


    public function getQuestionTitle(){
        return $this ->questionTitle;
    }

    public function setQuestionTitle($value) {
        $this->questionTitle = $value;
    }


    public function getQuestionbody(){
        return $this ->questionbody;
    }

    public function setQuestionbody($value) {
        $this->questionbody = $value;
    }


    public function getSkills(){
        return $this ->skills;
    }

    public function setSkills($value) {
        $this->skills = $value;
    }

    public function getDateTime(){
        return $this ->datetime;
    }

    public function setDateTime($value) {
        $this->datetime = $value;
    }

    public function getId(){
        return $this ->id;
    }

    public function setId($value) {
        $this->id = $value;
    }



}
?>