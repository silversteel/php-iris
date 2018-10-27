<?php
class Klasifikasi {

	private $dataset;
	private $data_train;

	public function __construct($dataset)
	{
		$this->dataset = $dataset;
	}
	
	public function slice($percentage)
	{
		$total = count($this->dataset);
		$total_datatrain = ($percentage / 100) * $total;
		$this->data_train = array_slice($this->normalize($this->shuffle_data($this->dataset), 4), 0 , $total_datatrain);
	}

	public function knearest($datatest, $k, $class_index) 
	{
		$index = 0;
		$sorted_distance = array();
		$data_test = $this->normalize($datatest);
		$distance = 0;
		while ($index < count($this->data_train)) {
			for ($i=0; $i < count($this->data_train); $i++) {
				if($i == $class_index){
					break;
				} 
				$distance =+ pow($this->data_train[$index][$i] - $data_test[0][$i], 2);
			}
			$euclidean = sqrt($distance);
			array_push($sorted_distance, array($euclidean, $this->data_train[$index][$class_index]));
			$index++;
		}
		sort($sorted_distance);

		return $this->mode_of_class(array_slice($sorted_distance, 0, $k));
	}

	public function normalize($data, $class_index = FALSE)
	{
		$index = 0;
		$normalized_array = array();
		while ($index < count($data)) {
			$normalized_feature = array();
			for ($i=0; $i < count($data[$index]); $i++) { 
				if ($class_index != FALSE && $i == $class_index) {
					break;
				}
				array_push($normalized_feature, $data[$index][$i] / 10); 
			}
			if ($class_index != FALSE) {
				array_push($normalized_feature, $data[$index][$class_index]);
			}
			array_push($normalized_array, $normalized_feature);
			$index++;
		}
		return $normalized_array;
	}

	public function mode_of_class($dataset)
	{
		$data_class = array();

		for ($i=0; $i < count($dataset); $i++) { 
			array_push($data_class, $dataset[$i][1]);
		}

		$count_class = array_count_values($data_class);

		return array_search(max($count_class), $count_class);
	}

	public function shuffle_data($dataset)
	{
		$iris_shuffle = array();

		$keys = array_keys($dataset);
		shuffle($keys);

		$i = 0;
		foreach ($keys as $key)
		{
			$iris_shuffle[$i] = $dataset[$key];
			$i++;
		}

		return $iris_shuffle;
	}
}