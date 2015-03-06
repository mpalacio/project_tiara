<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_contestant_model extends PT_Model {
    public static $table = "segment_contestants";
    
    public $id = 0;
    
    public $segment_id = 0;
    
    public $contestant_id = 0;
    
    public $number = 0;
    
    public function __construct()
    {
        parent::__construct();
    }
    // OK
    public function average()
    {
        $segment_contestant_scores = $this->scores();
    
        $average = $sum = 0.00;
        
        foreach($segment_contestant_scores AS $segment_contestant_score)
            $sum += $segment_contestant_score->sum();
            
        $average = $sum / count($segment_contestant_scores);
        
        return $average;
    }
    // OK
    public function create($data = array())
    {
	$segment_contestant = $this->instantiate($data);
        
        $this->db->insert(self::$table, $segment_contestant);
        
        $segment_contestant->id = $this->db->insert_id();
        
        return $segment_contestant;
    }
    // OK
    public function contestant()
    {
        $contestant = NULL;
        
        if($this->contestant_id)
        {
            $this->load->model("admin/Contestant_model", "contestant_model");
            
            $contestant = $this->contestant_model->get($this->contestant_id);
        }
        
        return $contestant;
    }
    
    // OK
    public function get($id = 0, $contestant_id = 0, $segment_id = 0)
    {
        $segment_contestants = $where = array();
        
        if($id)
            $where["id"] = $id;
        
        if($contestant_id)
            $where["contestant_id"] = $contestant_id;
        
        if($segment_id)
            $where["segment_id"] = $segment_id;
        
        $this->db->order_by("number", "asc");
            
        $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $segment_contestants[] = $this->instantiate($row);
        }
        
        return ($id OR ($contestant_id AND $segment_id)) ? array_shift($segment_contestants) : $segment_contestants;
    }
    // 
    public function get_by_ranking($segment_id = 0, $limit = 0)
    {
        $segment_contestants = $this->get(0, 0, $segment_id);
        
        for($b = 0; $b < count($segment_contestants); $b++)
        {
            $base = $segment_contestants[$b];
            
            for($s = $b + 1; $s < count($segment_contestants); $s++)
            {
                $subject = $segment_contestants[$s];
                
                if($subject->average() > $base->average())
                {
                    $segment_contestants[$s] = $base;
                    $segment_contestants[$b] = $base = $subject;
                }
            }
            
        }
        
        return ($limit) ? array_splice($segment_contestants, 0, $limit) : $segment_contestants;
    }
    // OK
    public function segment()
    {
        $segment = NULL;
	
	if($this->segment_id)
	{
	    $this->load->model("admin/Segment_model", "segment_model");
	    
	    $segment = $this->segment_model->get($this->segment_id);
	}
	
	return $segment;
    }

    
    // OK
    public function scores()
    {
        $segment_contestant_scores = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_contestant_score_model", "segment_contestant_score_model");
            
            /**
             * Array: Segment Contestant Score Object
             * get(:segment-contestant-id)
             */
            $segment_contestant_scores = $this->segment_contestant_score_model->get($this->id);
        }
        
        return $segment_contestant_scores;
    }
    // OK
    public function score($segment_judge_id = 0)
    {
	$score = 0.00;
        
        if($this->id)
        {
            $sql = "SELECT 
                `segment_contestant_id`, 
                `segment_judge_id`, 
                SUM(`score`) AS `score`
            FROM 
                `criteria_scores` 
            WHERE 
                `segment_judge_id` = " . $segment_judge_id . " AND
                `segment_contestant_id` = " . $this->id . "
            GROUP BY
                `segment_contestant_id`";
                
            $query = $this->db->query($sql);
            
            if($query->num_rows())
            {
                $row = $query->row_array();
                
                $score = $row["score"];
            }
        }
        
        return $score;
    }
    // OK
    public function criteria_score($criteria_id = 0, $segment_judge_id = 0)
    {
	$score = 0.00;
	
	if($this->id)
	{
	    $this->load->model("admin/Criteria_score_model", "criteria_score_model");
	    $criteria_score = $this->criteria_score_model->get(0, $criteria_id, $segment_judge_id, $this->id);
	    
	    $score = $criteria_score->score;
	}
	
	return $score;
    }
    public function total_rank()
    {
        $total = 0.00;
        
        if($this->id)
        {
            $segment = $this->segment();
            
            foreach($segment->judges() AS $segment_judge)
            {
                $total = $total + $this->rank($segment_judge->id);
            }
        }
        
        return $total;
    }
    
    function final_rank()
    {
        $final = 0.00;
        
        if($this->id)
        {
            $segment = $this->segment();
            
            $segment_contestants = $segment->contestants();
            
            $ranks = array();
            
            foreach($segment_contestants AS $segment_contestant)
            {
                $ranks[$segment_contestant->id] = $segment_contestant->total_rank();
            }
            
            asort($ranks);
            
            $ranking = array();
            $rank = 1;
            
            $sum = $occurence = 0;
            
            foreach($ranks AS $id => $total)
            {
                $ranking[$rank] = array("id" => $id, "total" => $total);
                $rank++;
            }
            
            foreach($ranking AS $rank => $group)
            {
                if($group["total"] == $ranks[$this->id])
                {
                    $occurence++;
                    $sum = $sum + $rank;
                }
            }
            
            $final = $sum / $occurence;
        }
        
        return $final;
    }
    
    public function rank($segment_judge_id = 0)
    {
        $average = 0.00;
        
        if($this->id)
        {
            $sql = "SELECT
                RK.*
            FROM 
                (
                    SELECT 
			TS.*, 
			@rank := @rank + 1 AS rank
                    FROM 
			(
			    SELECT 
				`segment_contestant_id`, 
				`segment_judge_id`, 
				SUM(`score`) AS `score` 
			    FROM 
				`criteria_scores` 
			    WHERE 
				`segment_judge_id` = " . $segment_judge_id . " 
			    GROUP BY 
				`segment_contestant_id` 
			    ORDER BY 
				`score` DESC
			) TS, 
			(
			    SELECT 
                                @rank := 0
			) S
                ) RK 
            ORDER BY 
                RK.`segment_contestant_id` ASC";
                
            $query = $this->db->query($sql);
            
            if($query->num_rows())
            {
                $ranking = array();
                
                foreach($query->result_array() AS $row)
                {
                    $ranking[$row["rank"]] = $row["score"];
                    
                    if($row["segment_contestant_id"] == $this->id)
                        $score = $row["score"];
                }
               
                $sum = $occurence = 0;
            
                foreach($ranking AS $rank => $s)
                {
                    if($score == $s)
                    {
                        $sum = $sum + $rank;
                        $occurence++;
                    }
                }
                
                if($sum AND $occurence)
                    $average = $sum / $occurence;
            }
        }
        
        return $average;
    }
}