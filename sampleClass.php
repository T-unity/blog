<?php
class Employee {
  public function work($name) {
    echo `${name}はEmployeeクラスのworkメソッドとして働いています` . PHP_EOL;
  }
}

$taro = new Employee;
$taro->work('たろう');
