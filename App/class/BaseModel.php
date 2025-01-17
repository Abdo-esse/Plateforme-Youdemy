<?php
namespace App\class;

interface BaseModel {
  public function addAction();
  public function readAll();
  public function readOne();
  public function daletAction();
  public function updateAction();
}
?>