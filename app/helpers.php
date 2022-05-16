<?php

function flash($title = null, $message = null) {
	$flash = app('App\Http\Flash');

	if (func_num_args() == 0) {
		return $flash;
	}

	return $flash->info($title, $message);
}

function converter() {
	return $converter = array(
		'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
		'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
		'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
		'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
		'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
		'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
		'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
	);
}

function translit($value)
{
	$converter = converter();

	$keys = array_keys($converter); 
	$values = array_values($converter); 

	$value = str_replace($keys, $values, $value);
	$value = strtr($value, ' ', '-');

	return $value;
}

function translit_reverse($value)
{
	$converter = converter();

	$keys = array_keys($converter); 
	$values = array_values($converter); 

	$value = str_replace($values, $keys, $value);
	$value = strtr($value, '-', ' ');

	return $value;
}