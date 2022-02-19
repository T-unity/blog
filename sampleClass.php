<?php
class Employee {
  public $name;
  // public $state = '労働中';
  private $state = '労働中';
  public function getState() {
    return $this->state;
  }
  public function setState($state) {
    $this->state = $state;
  }
  public function work($name) {
    echo `${name}はEmployeeクラスのworkメソッドとして働いています` . PHP_EOL;
    // echo `${name}はEmployeeクラスのworkメソッドとして${state}` . PHP_EOL;
  }
}

$taro = new Employee;
$taro->name = '田中';
// echo $taro->state;
// $taro->work($taro->name);
$taro->setState('働きたくない');
echo $taro->name , 'さんは' , $taro->getState() , PHP_EOL;
