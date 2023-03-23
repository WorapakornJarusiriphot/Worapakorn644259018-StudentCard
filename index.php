<?php

// ... (โค้ดคลาส StudentCard และคลาส ShowCard)
class ShowCard {
  public static function display(StudentCard $studentCard) {
      $output = "
      <div style='width: 18.6cm; height: 15.4cm; border: 1px solid #000; position: relative;'>
          <img src='{$studentCard->universityLogo}' style='width: 100px; height: 150px; position: absolute; top: 10px; left: 10px;' alt='University Logo'>
          <img src='{$studentCard->profilePicture}' style='width: 100px; height: 150px; position: absolute; top: 10px; right: 10px;' alt='Profile Picture'>
          <div style='display: flex; flex-direction: column; align-items: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>
              <h2>{$studentCard->name}</h2>
              <p>รหัสนักศึกษา: {$studentCard->studentID}</p>
              <p>อายุ: {$studentCard->getAge()} ปี</p>
              <p>เรียนชั้นปี: {$studentCard->getEnrollmentYear()}</p>
              <p>รหัส Visa: {$studentCard->visaCode}</p>
              <p>วันหมดอายุของบัตรนักศึกษา: {$studentCard->cardExpirationDate}</p>
          </div>
          <img src='{$studentCard->visaLogo}' style='width: 200px; height: 100px; position: absolute; bottom: 10px; right: 10px;' alt='Visa Logo'>
      </div>";
      echo $output;
  }
}

$studentCard = new StudentCard(
  "นายวรปกร จารุศิริพจน์", "644259018", 20, "ปี2",
  "logo.png", "02.png", "visa2.png",
  "4732 5285 1811 7475", "2027-08-23"
);

ShowCard::display($studentCard);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Card</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php ShowCard::display($studentCard); ?>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php

class StudentCard {
  public $name;
  public $studentID;
  public $birthYear;
  public $enrollmentYear;
  public $universityLogo;
  public $profilePicture;
  public $visaLogo;
  public $visaCode;
  public $cardExpirationDate;

  public function __construct(
      $name, $studentID, $age, $enrollmentYear,
      $universityLogo, $profilePicture, $visaLogo,
      $visaCode, $cardExpirationDate
  ) {
      $this->name = $name;
      $this->studentID = $studentID;
      $this->birthYear = date('Y') - $age;
      $this->enrollmentYear = $enrollmentYear;
      $this->universityLogo = $universityLogo;
      $this->profilePicture = $profilePicture;
      $this->visaLogo = $visaLogo;
      $this->visaCode = $visaCode;
      $this->cardExpirationDate = $cardExpirationDate;
  }

  public function getAge() {
      return date('Y') - $this->birthYear;
  }

  public function getEnrollmentYear() {
      return $this->enrollmentYear;
  }
}



?>
