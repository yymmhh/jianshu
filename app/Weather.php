<?php

namespace App;

use \App\Main;

class Weather extends Main
{

protected  $table="weather";
  public $fillable=['date','city','quality','wendu'];
//  private  $date;
//
//  private $city;
//
//  private $quality;
//
//  private $wendu;
//
//  /**
//   * Weather constructor.
//   * @param $date
//   * @param $city
//   * @param $quality
//   * @param $wendu
//   */
//  public function __construct($date, $city, $quality, $wendu)
//  {
//    $this->date = $date;
//    $this->city = $city;
//    $this->quality = $quality;
//    $this->wendu = $wendu;
//  }
//
//  /**
//   * @return mixed
//   */
//  public function getWendu()
//  {
//    return $this->wendu;
//  }
//
//  /**
//   * @param mixed $wendu
//   */
//  public function setWendu($wendu)
//  {
//    $this->wendu = $wendu;
//  }
//
//  /**
//   * @return mixed
//   */
//  public function getDate()
//  {
//    return $this->date;
//  }
//
//  /**
//   * @param mixed $date
//   */
//  public function setDate($date)
//  {
//    $this->date = $date;
//  }
//
//  /**
//   * @return mixed
//   */
//  public function getCity()
//  {
//    return $this->city;
//  }
//
//  /**
//   * @param mixed $city
//   */
//  public function setCity($city)
//  {
//    $this->city = $city;
//  }
//
//  /**
//   * @return mixed
//   */
//  public function getQuality()
//  {
//    return $this->quality;
//  }
//
//  /**
//   * @param mixed $quality
//   */
//  public function setQuality($quality)
//  {
//    $this->quality = $quality;
//  }



}
