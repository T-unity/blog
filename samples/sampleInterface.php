<?php

interface Reader
{
  public function read();
}

interface Writer
{
  public function write($value);
}

class configure implements Reader, Writer
{
  public function write($value)
  {
    //
  }
  public function read()
  {
    //
  }
}
