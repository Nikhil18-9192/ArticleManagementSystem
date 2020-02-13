<?php
class usermodel extends CI_Model
{
    public function all_articles($limit,$offset)
    {
        $q=$this->db->select()
                    ->from('article')
                    ->limit($limit,$offset)
                    ->get();
                    return $q->result();
    }
    public function article_row()
    {
        $q=$this->db->select()
                ->from('article')
                
                ->get();

                return $q->num_rows();
    }
}

?>