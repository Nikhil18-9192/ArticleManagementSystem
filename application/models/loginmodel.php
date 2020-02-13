<?php
	/**
	 * 
	 */
	class Loginmodel extends CI_Model
	{
		
		public function isvalidate($username,$password)
		{
			$q=$this->db->where(['username'=>$username,'password'=>$password])
						->get('user');
				
						if($q->num_rows())
						{
							return $q->row()->id;

						}
						else
						{
							return false;
						}
		}
		public function articleList($limit,$offset)
		{
			$id=$this->session->userdata('id');
			$q=$this->db->select()
						->from('article')
						->where(['user_id'=>$id])
						->limit($limit,$offset)
						->get();
						return ($q->result());
		}
		public function find_article($articleid)
  {
   $q=$this->db->select(['article_title','article_body','id'])
            ->where('id',$articleid)
            ->get('article');
            return $q->row();
  }
		 
		public function add_articles($array)
		{
			return $this->db->insert('article',$array);
		}
		public function useradd($array)
		{
			return $this->db->insert('user',$array);
		}
		public function article_del($id)
		{
			return $this->db->delete('article',['id'=>$id]);
		}
		public function article_edit($artid)
		{
			$q=$this->db->select(['article_title','article_body','id'])
						->where('id',$artid)
						->get('article');
						return $q->row();
		}
		public function article_update($articleid,Array $article)
		{
			$q=$this->db->where('id',$articleid)
						->update('article',$article);
						 

						return $q;
		}
	}
?>