<?php
class Employee {
  public $name;
  // private $name;

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

  public static $company = 'HOGE & co';
  // public function getCompany() {
  public static function getCompany() {
    return self::$company;
  }
  public static function setCompany($value) {
    self::$company = $value;
  }

  const PARTTIME = 0x01;
  const REGULAR  = 0x02;
  const CONTRACT = 0x04;
  private $type;

  public function __construct($name, $type) {
    $this->name = $name;
    $this->type = $type;
  }
}

// $taro = new Employee;
$taro = new Employee('初期化', Employee::REGULAR);
// $taro->name = '田中';
// echo $taro->state;
// $taro->work($taro->name);
$taro->setState('働きたくない');
echo $taro->name , 'さんは' , $taro->getState() , PHP_EOL;

// echo '我々は', Employee::$company, 'の従業員です';

// echo $taro->getCompany();

echo Employee::getCompany();
Employee::setCompany('FUGA.co');
echo Employee::getCompany();

class Programmer extends Employee {
  public function __construct($name, $type)
  {
    parent::__construct($name, $type);
  }
  public function work($name) {
    echo $name , 'はコードを書いている' , PHP_EOL;
  }
}

$kana = new Programmer('カナ', Employee::REGULAR);
$kana->work($kana->name);
