<?php
class Function_model extends Model {

	function Function_model()
	{
		parent::Model();
	}

	function getSearchResults ($function_name, $description = TRUE)
	{
		$this->db->like('NAMA', $function_name);
		$this->db->orderby('NAMA');
		$query = $this->db->get('barang');
		if ($query->num_rows() > 0) {
			$output = '<ul>';
			foreach ($query->result() as $function_info) {
				if ($description) {
					$output .= '<li><strong>' . $function_info->NAMA . '</strong><br />';
					$output .= $function_info->HARGA . '</li>';
				} else {
					$output .= '<li>' . $function_info->NAMA . '</li>';
				}
			}
			$output .= '</ul>';
			return $output;
		} else {
			return '<p>Sorry, no results returned.</p>';
		}
	}

}
?>