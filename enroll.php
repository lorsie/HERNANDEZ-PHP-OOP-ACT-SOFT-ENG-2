<?php
class Student {
    private string $name;
    private array $courses = [];
    private float $courseFee = 1300; 

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addCourse(string $course) {
        $this->courses[] = $course;
        echo "Course '{$course}' added for {$this->name}.<br>";
    }

    public function deleteCourse(string $course) {
        $index = array_search($course, $this->courses);
        if ($index !== false) {
            unset($this->courses[$index]);
            $this->courses = array_values($this->courses); 
            echo "Course '{$course}' removed from {$this->name}.<br>";
        } else {
            echo "Course '{$course}' not found for {$this->name}.<br>";
        }
    }

    public function listCourses() {
        echo "<br>Courses enrolled by {$this->name}:<br>";
        foreach ($this->courses as $course) {
            echo "- $course <br>";
        }
    }

    public function getTotalFee(): float {
        return count($this->courses) * $this->courseFee;
    }
}

$student1 = new Student("Lorah Jyn I. Hernandez");

$student1->addCourse("Software Engineering 2 LAB");
$student1->addCourse("CS Thesis Writing 1");
$student1->addCourse("Data Analysis for Computer Science");

$student1->deleteCourse("Software Engineering 2 LAB");

$student1->listCourses();

echo "<br>Total Enrollment Fee: PHP " . number_format($student1->getTotalFee(), 2);
?>
