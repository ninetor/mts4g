<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
	die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

function pagination($countAll,$currentPage,$limit){
	$paginationHtml = '<div class="pagination">';
	$pages = ceil($countAll/$limit);
	$url = '/members?page=';

	if ($currentPage==1)
	{
		$paginationHtml .= '<span class="pagination__item pagination__item--prev">Назад</span>';
	}
	else
	{
		$paginationHtml .= '<a href="'.$url.($currentPage-1).'" class="pagination__item pagination__item--prev">Назад</a>';
	}

	for ($i=1; $i <= $pages ; $i++) {
		if ($currentPage && $currentPage ==$i)
		{
			$paginationHtml .= '<span class="pagination__item">'.$i.'</span>';
		}
		else
		{
			$paginationHtml .= '<a href="'.$url.$i.'" class="pagination__item">'.$i.'</a>';
		}
	}

	if ($currentPage==$pages)
	{
		$paginationHtml .= '<span class="pagination__item pagination__item--next">Вперед</span>';
	}
	else
	{
		$paginationHtml .= '<a href="'.$url.($currentPage+1).'" class="pagination__item pagination__item--next">Вперед</a>';
	}

	$paginationHtml .='</div>';
	return $paginationHtml;
}