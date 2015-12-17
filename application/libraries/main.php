<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
	die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

function pagination($countAll,$currentPage,$limit,$urlTo){
	$paginationHtml = '<div class="pagination">';
	$pages = ceil($countAll/$limit);
	if ($pages == 1) return null;
	$url = $urlTo.'?page=';

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

function dateLogs($date) // 2015-08-02 14:23:23
{
	if (preg_match('/^(\d{4})-(\d{2})-(\d{2})(?:\s+(\d{2}):(\d{2}):(\d{2}))?$/', $date)) {
		$arr = explode(" ", $date);
		$time = explode(":", $arr[1]);
		$date = explode("-", $arr[0]);
		return $date[2] . "." . $date[1] . "." . $date[0] . ", в " . $time[0] . ":" . $time[1];
	}
	return null;
}