<link rel="stylesheet" href="../../CSS/allCSS.css"/>

<?php
	include("../../PHP/Utils/Util.php");

	echo '<div class="flex-container">';
	printButtonSorting("Sorting_Menu.php?Sort=".$sortBy["Franchise"], "Sort by Franchise");
	printButtonSorting("Sorting_Menu.php?Sort=".$sortBy["Purpose"], "Sort by Purpose");
	printButtonSorting("Sorting_Menu.php?Sort=".$sortBy["Size"], "Sort by Size");
	echo '</div>';


	function printButtonSorting($path, $content)
	{
		echo '
		<a class="none" href="' . $path . '" style="color:white">
			<div class="Button_Sorting">
					<span> ' . $content . ' </span>
			</div>
		</a>';
	}
?>