<?php
interface StudentInterface
{
  public function CalDateofBirthAge();
  public function CalClassYear();
  public function ShowCard();
}

class StudentClass implements StudentInterface
{
  // กำหนด properties ของ class
  public $Name; // ชื่อของนักเรียน
  public $Surname; // นามสกุลของนักเรียน
  public $StudentID; // เลขรหัสนักเรียน
  public $StudentBirthDate; // วันเกิดของนักเรียน
  public $Picture; // ภาพถ่ายของนักเรียน
  public $Faculty; // ชื่อคณะของนักเรียน
  public $Department; // ชื่อสาขาของนักเรียน
  public $UniversityName; // ชื่อมหาวิทยาลัย
  public $UniversityLogo;  // logoมหาวิทยาลัย
  public $CardNumber;  // หมายเลขบัตร 
  public $Username;  // ชื่อผู้ใช้
  public $CardLogo;  // ชื่อยี้ห้อบัตร

  public function __construct()
  {
    // กำหนดค่าเริ่มต้นให้ properties
    $this->Name = "Worapakorn";
    $this->Surname = "Jarusiriphot";
    $this->StudentID = "644239018";
    $this->StudentBirthDate = "2003-03-17";
    $this->Picture = "Worapakorn.jpg";
    $this->Faculty = "Faculty of Science and Technology";
    $this->Department = "Software Engineering";
    $this->UniversityName = "มหาวิทยาลัยราชภัฏนครปฐม";
    $this->UniversityLogo = "npru_logo.jpg";
    $this->CardNumber = "4732 5285 1811 7475";
    $this->Username = "W. JARUSIRIPHOT";
    $this->CardLogo = "visa_logo.png";
  }

  public function CalDateofBirthAge()
  {
    // คำนวณอายุจากวันเกิด
    $now = new DateTime(); // วันปัจจุบัน
    $dob = new DateTime($this->StudentBirthDate); // วันเกิดของนักเรียน
    $diff = $now->diff($dob); // คำนวณวันที่ต่างๆ
    $age = $diff->y; // ดึงค่าอายุออกมา
    return $age; // ส่งค่าอายุกลับ
  }

  public function CalClassYear()
  {
    // คำนวณชั้นปีของนักเรียน
    $year = substr($this->StudentID, 0, 2); // เลขปีของรหัสนักเรียน
    $class = $year - 62; // คำนวณหาชั้นปี
    if ($class >= 1 && $class <= 5) { // ถ้าชั้นปีอยู่ในช่วง 1-5
      return "ชั้นปี " . $class; // ส่งค่าชั้นปีกลับ
    } else { // ถ้าไม่อยู่ในช่วงนี้
      return "Unknown"; // ส่งค่า Unknown กลับ
    }
  }

  public function Showcard()
  {
    echo '<table style="width:8.5cm; height:5.4cm; border:0px solid black; background-image:url(CardBackground.png); background-repeat:no-repeat; background-size:100% 100%;">';

    echo '<tr style="height:30%;">'; // ลดความสูงของเซลล์ลง
    echo '<td style="width:20%; border:0px solid black;"><img src="' . $this->UniversityLogo . '" style="max-width:70%; max-height:120%; display:block; margin:0 auto;"></td>'; // เพิ่ม CSS เพื่อแสดงผลรูปภาพขนาดเล็กและให้แสดงกลางเซลล์
    echo '<td style="width:60%; border:0px solid black; text-align:left; font-size:15px;">' . $this->UniversityName . '</td>'; // เพิ่ม CSS เพื่อแสดงผลข้อความกลางเซลล์และกำหนดขนาดตัวอักษร
    echo '<td style="width:20%; border:0px solid black;" rowspan="2"><img src="' . $this->Picture . '" style="max-width:100%; max-height:100%;"></td>'; // เพิ่ม CSS เพื่อแสดงผลรูปภาพให้เต็มเซลล์แนวตั้งและใช้ rowspan เพื่อรวมเซลล์
    echo '</tr>';
    echo '<tr style="height:30%;">';
    echo '<td style="width:20%; border:0px solid black;"></td>';
    echo '<td style="width:60%; border:0px solid black; text-align:left; font-size:5px;">
    <strong>Name:</strong> ' . $this->Name . ' ' . $this->Surname . '<br>
    <strong>Student ID:</strong> ' . $this->StudentID . '<br>
    <strong>Date of Birth:</strong> ' . $this->StudentBirthDate . '<br>
    <strong>Age:</strong> ' . $this->CalDateofBirthAge() . '<br>
    <strong>Class Year:</strong> ' . $this->CalClassYear() . '<br>
    <strong>Faculty:</strong> ' . $this->Faculty . '<br>
    <strong>Department:</strong> ' . $this->Department . '<br>
    
    </td>';

    echo '</tr>';
    echo '<tr style="height:20%;">';
    echo '<td style="width:20%; border:0px solid black; text-align:center; font-size:25px" colspan="3">' . $this->CardNumber . '</td>';
    echo '</tr>';

    echo '<tr style="height:20%;">';
    echo '<td style="width:80%; border:0px solid black; text-align:center; font-size:15px " colspan="2">' . $this->Username . '</td>';
    echo '<td style="width:20%; border:0px solid black;"><img src="' . $this->CardLogo . '" style="max-width:100%; max-height:100%; display:block; margin:0 auto;"></td>';
    echo '</tr>';
    echo '</table>';
  }
}
// <div class="card-img-overlay --card-img-overlay-purple2
$student = new StudentClass(); // สร้าง object ของ class StudentClass
$student->ShowCard(); // เรียกใช้ method ShowCard() เพื่อแสดงข้อมูลบัตรประจำตัวของนักเรียน
?> 