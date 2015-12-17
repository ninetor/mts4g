<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
	die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

function pagination($countAll,$currentPage,$limit,$urlTo){
	$paginationHtml = '<div class="pagination">';
	$allpages = ceil($countAll/$limit);
	if ($allpages == 1) return null;
	$url = $urlTo.'?page=';


	if ($allpages > 1) { // Всё это только если количество страниц больше 1
		/* Дальше идёт вычисление первой выводимой страницы и последней (чтобы текущая страница была где-то посредине, если это возможно, и чтобы общая сумма выводимых страниц была равна count_show_pages, либо меньше, если количество страниц недостаточно) */
		$left = $currentPage - 1;
		$right = $allpages - $currentPage;
		if ($left < floor($limit / 2)) $start = 1;
		else $start = $currentPage - floor($limit / 2);
		$end = $start + $limit - 1;
		if ($end > $allpages) {
			$start -= ($end - $allpages);
			$end = $allpages;
			if ($start < 1) $start = 1;
		}
	}

	if ($currentPage==1)
	{
		$paginationHtml .= '<span class="pagination__item pagination__item--prev">Назад</span>';
	}
	else
	{
		$paginationHtml .= '<a href="'.$url.($currentPage-1).'" class="pagination__item pagination__item--prev">Назад</a>';
	}

//	for ($i=1; $i <= $pages ; $i++) {
	for ($i=$start; $i <= $end ; $i++) {
		if ($currentPage && $currentPage == $i)
		{
			$paginationHtml .= '<span class="pagination__item">'.$i.'</span>';
		}
		else
		{
			$paginationHtml .= '<a href="'.$url.$i.'" class="pagination__item">'.$i.'</a>';
		}
	}

	if ($currentPage==$allpages)
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