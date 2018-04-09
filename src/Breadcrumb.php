<?php
declare(strict_types=1);

class Breadcrumb
{
	private $menu;

	public function setMenu($menu)
	{
		$this->menu = $menu;
	}

	private function find_current_page($array, $currentPage, $find)
	{
		$path = [];
		$recup= [];

		foreach ($array as $value) {
			if (strcmp($value['name'], $currentPage) == 0) {
				$path[] = $value['name'];
				$find = 1;
				break;
			}
			if ($value['child']) {
				$recup = $this->find_current_page($value['child'], $currentPage, $find);
				$path = $recup[0];
				$find = $recup[1];
			}
			if ($find == 1) {
				$path[] = $value['name'];
				break;
			}
		}
		if ($find == 1)
			return array($path, $find);
	}

	public function getBreadcrumb($currentPage)
	{
		$path = [];
		$path_to_page = [];
		$find = 0;

		if ($currentPage == NULL)
			return (NULL);
		$path_to_page = $this->find_current_page($this->menu, $currentPage, $find);
		if ($path_to_page[1] == 0)
			return (NULL);
		$path = array_reverse($path_to_page[0]);
		return ($path);
	}
}
?>
