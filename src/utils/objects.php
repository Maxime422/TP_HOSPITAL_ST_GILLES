<?php

class Patient
{
  protected $id;
  protected $lastName;
  protected $firstName;
  protected $birthDate;
  protected $phone;
  protected $mail;

  public function __construct($idPara, $lastNamePara, $firstNamePara, $birthDatePara, $phonePara, $mailPara)
  {
    $this->id = $idPara;
    $this->lastName = $lastNamePara;
    $this->firstName = $firstNamePara;
    $this->birthDate = $birthDatePara;
    $this->phone = $phonePara;
    $this->mail = $mailPara;
  }

  // Getters
  public function getId()
  {
    return $this->id;
  }

  public function getLastName()
  {
    return $this->lastName;
  }

  public function getFirstName()
  {
    return $this->firstName;
  }

  public function getBirthDate()
  {
    return $this->birthDate;
  }

  public function getPhone()
  {
    return $this->phone;
  }

  public function getMail()
  {
    return $this->mail;
  }
}

class Rdv
{
  protected $id;
  protected $dateHour;
  protected $idPatients;

  public function __construct($idPara, $dateHourPara, $idPatientsPara)
  {
    $this->id = $idPara;
    $this->dateHour = $dateHourPara;
    $this->idPatients = $idPatientsPara;
  }

  // Getters
  public function getId()
  {
    return $this->id;
  }

  public function getDate()
  {
    return $this->dateHour;
  }

  public function getIdPatient()
  {
    return $this->idPatients;
  }
}
