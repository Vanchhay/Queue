<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Predis\Client;

$redis = new Client('tcp://localhost:6379');

$data = [
	"kirirom"=> [
		"google"=> [
			"bid"=>10,
			"volume"=>"high"
		],
		"yahoo"=> [
			"bid"=>10,
			"volume"=>"high"
		]
	],
	"flash"=> [
		"google"=> [
			"bid"=>10,
			"volume"=>"high"
		],
		"yahoo"=> [
			"bid"=>10,
			"volume"=>"high"
		]
	]
];

// $i = 1;
// while($i <= 50000){

// 	$redis->set("data:$i", json_encode($data));
// 	$i++;
// }
$list_data_keyword = array();

$searched = json_decode($redis->get('searched'),true);
$searched_keys = array_keys($searched);
$data_keys = array_keys($data);

$data_keys = ['kirirom', 'rana', 'heng', 'vinei', 'noob', 'miracle'];

$intersect = array_intersect($data_keys, $searched_keys);

if($intersect !== []){
	// pull data from redis to append to list_data_keyword
	foreach($intersect as $key => $value){
		$list_data_keyword[$value] = $searched[$value];
	}
}
$redis->set('Done:Searched', json_encode($list_data_keyword));
$differKeyword = array_diff_key($data_keys, $intersect);
// echo($searched_value);
print_r(array_values($differKeyword));



echo 'Done\n\n';
