<?php
use PHPUnit\Framework\TestCase;

//API
//https://documenter.getpostman.com/view/1760427/2s8Z6u3tyg

//tests
//php phpunit-9.5.27.phar tests

class APITest extends TestCase
{

  public function testAPI()
  {

    $base='https://350dd2a0-b6e1-4dd4-b678-921cee0b9ec4.mock.pstmn.io/';

    //1. обнови координаты для такого то участка с таким то кадастром (автоматический ввод)
    $jsonData = json_decode(file_get_contents($base.'renewauto'));
    $this->assertSame("OK", $jsonData->status);

    //2. обнови координаты для такого то участка с таким то набором (ручной ввод)
    $jsonData = json_decode(file_get_contents($base.'renewmanual'));
    $this->assertSame("OK", $jsonData->status);

    //3. покажи координаты для такого то участка
    $jsonData = json_decode(file_get_contents($base.'showsite'));
    $this->assertSame("OK", $jsonData->status);

    //4. покажи координаты всех участков для такого то проекта
    $jsonData = json_decode(file_get_contents($base.'showproject'));
    $this->assertSame("OK", $jsonData->status);

    //5. удали такой то участок
    $jsonData = json_decode(file_get_contents($base.'deletesite'));
    $this->assertSame("OK", $jsonData->status);
  }

}
