<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * Segment Contestant Model
 *
 * @version 2.1
 */
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
    
    /**
     * Get Segment Constestant Average Score
     *
     * Description
     * 
     * @since 2.0
     */
    public function score_by_average()
    {
        $score = 0.00;
        
        if($this->id)
        {
            $sql = "SELECT 
                `segment_contestant_id`, 
                SUM(`score`) / `count` AS `score`
            FROM 
                `criteria_scores`, 
                (
                    SELECT
                        COUNT(`id`) AS `count`
                    FROM 
                        `segment_judges`
                    WHERE 
                        `segment_id` = " . $this->segment_id . "
                ) judges
            WHERE 
                `segment_contestant_id` = " . $this->id . " 
            GROUP BY 
                `segment_contestant_id`";
                
            $query = $this->db->query($sql);
            
            if($query->num_rows())
            {
                $row = $query->row_array();
                
                $score = $row["score"];
            }
            
            $score = $score + $this->sum_score_by_segment_ac();
        }
        
        return $score;
    }
    // OK
    public function create($data = array())
    {
	$segment_contestant = $this->instantiate($data);
        
        $this->db->insert(self::$table, $segment_contestant);
        
        $segment_contestant->id = $this->db->insert_id();
        
        return $segment_contestant;
    }
    
    /**
     *
     * Segment Contestant Score in
     * Segment Judge and Segments as Criteria
     *
     * @alias Total
     * @since 2.1
     */
    public function score($segment_judge_id = 0)
    {
        $score = 0.00;
        
        if($this->id)
        {
            $score = $this->score_by_segment_judge($segment_judge_id);
            
            $score = $score + $this->sum_score_by_segment_ac();
        }
        
        return $score;
    }
    /**
     * Title
     *
     * Description
     *
     * @since 2.1
     */
    public function score_by_criteria($id = 0, $segment_judge_id = 0)
    {
        $score = 0.00;
        
        if($this->id)
        {
            $this->load->model("admin/Criteria_score_model", "criteria_score_model");
	    $criteria_score = $this->criteria_score_model->get(0, $id, $segment_judge_id, $this->id);
            
            $score = $criteria_score->score;
        }
        
        return $score;
    }
    /**
     * Title
     *
     * Segment Contestant Score
     * in a Segment Judge
     * 
     * 
     * @since 2.1
     */
    public function score_by_segment_judge($segment_judge_id = 0)
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
    /**
     * Title
     *
     * The Segment Contestant Score
     * in a Segment as Criteria
     * 
     * @since 2.1
     */
    public function score_by_segment_ac($segment_ac_id = 0)
    {
        $score = 0.00;
        
        if($this->id)
        {
            $this->load->model("admim/Segment_ac_model", "segment_ac_model");
            
            $segment_ac = $this->segment_ac_model->get($segment_ac_id);
            
            $segment = $segment_ac->source();
            
            $segment_contestant = $segment->contestant($this->contestant_id);
            
            $score = $segment_contestant->score_by_average() * ($segment_ac->percentage / 100);
        }
        
        return $score;
    }
    /**
     * Title
     *
     * The Sum of Segment Contestant Scores
     * in Segments as Criteria
     * 
     * @since 2.1
     */
    public function sum_score_by_segment_ac()
    {
        $score = 0.00;
        
        if($this->id)
        {
            $segment = $this->segment();
            
            foreach($segment->segments_ac() AS $segment_ac)
            {
                // Segment
                $segment = $segment_ac->source();
                
                // Get Segment Contestant
                $segment_contestant = $segment->contestant($this->contestant_id);
                
                $score = $score + $segment_contestant->score_by_average() * ($segment_ac->percentage / 100) ;
            }
        }
        
        return $score;
    }
    /**
     * Title
     *
     * Description
     *
     * @alias Total Score
     * @since 2.1
     */
    public function sum_score_by_segment_judge_segment_ac()
    {
        $score = 0.00;
        
        if($this->id)
        {
            $segment = $this->segment();
        
            $sql = "SELECT
                segment_contestant_id,
                SUM(`score`) AS `score`,
                `count`
            FROM
                `criteria_scores`,
                (
                    SELECT
                        COUNT(`id`) AS `count` 
                    FROM
                        `segment_judges`
                    WHERE
                        `segment_id` = " . $this->segment_id . "
                ) judges
            WHERE
                `segment_contestant_id` = " . $this->id . "
            GROUP BY
                `segment_contestant_id`";
                
            $query = $this->db->query($sql);
            
            if($query->num_rows())
            {
                $row = $query->row_array();
                $score = $row["score"];
            }
            
            $score = $score + (count($segment->judges()) * $this->sum_score_by_segment_ac());
        }
        
        return $score;
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
    public function final_rank()
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
    // OK deprecated
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
    /**
     * Title
     *
     * Description
     * 
     * @alias Rank
     * @since 2.1
     */
    public function rank_by_judge($segment_judge_id = 0)
    {
        $rank_by_judge = 0.00;
        
        if($this->id)
        {
            $segment = $this->segment();
            
            $segment_contestants = array();
            
            foreach($segment->contestants() AS $segment_contestant)
                $segment_contestants[$segment_contestant->id] = $segment_contestant->score($segment_judge_id);
            
            arsort($segment_contestants);
            
            $ranking = array();
            $rank = 1;
            
            foreach($segment_contestants AS $id => $score)
            {
                $ranking[$rank] = array("id" => $id, "score" => $score);
                $rank++;
            }
            
            foreach($ranking AS $rank => $segment_contestant)
            {
                if($segment_contestant["score"] == $segment_contestants[$this->id])
                {
                    $occurence++;
                    $sum = $sum + $rank;
                }
            }
            
            $rank_by_judge = $sum / $occurence;
        }
        
        return $rank_by_judge;
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

    
    // OK depre
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
    
    /**
     * @alias Total Rank
     * @since 2.1
     */
    public function sum_rank_by_judge()
    {
        $sum = 0.00;
        
        if($this->id)
        {
            $segment = $this->segment();
            
            foreach($segment->judges() AS $segment_judge)
            {
                $sum = $sum + $this->rank_by_judge($segment_judge->id);
            }
        }
        
        return $sum;
    }
    /**
     * Title
     *
     * Description
     *
     * @alias Final Rank
     * @since 2.1
     */
    public function rank_by_sum_rank_by_judge()
    {
        $rank_by_sum = 0.00;
        
        if($this->id)
        {
            $segment = $this->segment();
            
            $segment_contestants = array();
            
            foreach($segment->contestants() AS $segment_contestant)
                $segment_contestants[$segment_contestant->id] = $segment_contestant->sum_rank_by_judge();
                
            asort($segment_contestants);
            
            $ranking = array();
            $rank = 1;
            
            $sum = $occurence = 0;
            
            foreach($segment_contestants AS $id => $sum_rank)
            {
                $ranking[$rank] = array("id" => $id, "sum" => $sum_rank);
                $rank++;
            }
            
            foreach($ranking AS $rank => $segment_contestant)
            {
                if($segment_contestant["sum"] == $segment_contestants[$this->id])
                {
                    $occurence++;
                    $sum = $sum + $rank;
                }
            }
           
            $rank_by_sum = $sum / $occurence;
        }
        
        return $rank_by_sum;
    }
    /**
     * Title
     *
     * Description
     *
     * @since 2.1
     */
    public function rank_by_average()
    {
        $rank_by_average = 0.00;
        
        if($this->id)
        {
            $segment = $this->segment();
            
            $segment_contestants = array();
            
            foreach($segment->contestants() AS $segment_contestant)
                $segment_contestants[$segment_contestant->id] = $segment_contestant->score_by_average();
            
            arsort($segment_contestants);
            
            $ranking = array();
            $rank = 1;
            
            $sum = $occurence = 0;
            
            foreach($segment_contestants AS $id => $average)
            {
                $ranking[$rank] = array("id" => $id, "average" => $average);
                $rank++;
            }
            
            foreach($ranking AS $rank => $segment_contestant)
            {
                if($segment_contestant["average"] == $segment_contestants[$this->id])
                {
                    $occurence++;
                    $sum = $sum + $rank;
                }
            }
            
            $rank_by_average = $sum / $occurence;
        }
        
        return $rank_by_average;
    }    
}