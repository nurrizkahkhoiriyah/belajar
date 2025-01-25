
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Function Name
 *
 * Function description
 *
 * @access	public
 * @param	int/string	$id
 * @return	string 	$act
 */

if (!function_exists('actbtn')) {
	function actbtn($id, $target)
	{
		if ($id) {
			$btn = '<button class="btn btn-primary btn-sm editBtn" data-value="' . $id . '" data-target="' . $target . '" >Edit</button>
					<button class="btn btn-danger btn-sm deleteBtn" data-value="' . $id . '" data-target="' . $target . '" >Delete</button>';
		}
		return $btn;
	}
}
if(!function_exists('actBtnnnn')){
	function actBtnnnn($id, $target)
	{
		if ($id) {
			$btn = '<button class="btn btn-primary btn-sm editBtn" data-value="' . $id . '" data-target="' . $target . '" >Edit</button>
					<button class="btn btn-danger btn-sm deleteBtn" data-value="' . $id . '" data-target="' . $target . '" >Delete</button>
					<button class="btn btn-success btn-sm detailBtn" data-value="' . $id . '" data-target="' . $target . '" >Lihat Detail</button>';
		}
		return $btn;
	}
}
