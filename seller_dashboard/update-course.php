<?php
include('../config.php');

if (!isset($_SESSION['user_admin'])) {
    // echo redirect('index.php?logout');
  }


$course_id = isset($_GET['id']) ? $_GET['id'] : 0;
$db->where('course_id', $course_id);
$course = $db->getOne('courses');

if (isset($_POST['course-title']) && $_POST['course-title'] != "") {

    $course_title = $_POST['course-title'];
    $description = $_POST['course-description'];
    $price = $_POST['course-price'];

    $data = [
        'title' => $course_title,
        'description' => $description,
        'price' => $price
    ];

    $course = $db->update('courses', $data);
    if ($course) {
        echo redirect('course.php?updated');
    }
}


include('header.php');
?>

<div class="container">
    <h2 class="mb-4"> Update Course</h2>
    <form method="post" action='#'>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="course-title">Course Title:</label>
                    <input type="text" value="<?php echo $course['title'] ?>" id="course-title" name="course-title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="course-description">Course Description:</label>
                    <input type="text" id="course-description" value="<?php echo $course['description'] ?>" name="course-description" class="form-control" required>
                </div>
                <!-- <div class="form-group">
                    <label for="course-image">Course Image:</label>
                    <input type="file" id="course-image" name="course-image" class="form-control-file" accept="image/*" required>
                </div> -->
                <div class="form-group">
                    <label for="course-price">Price:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" value="<?php echo $course['price'] ?>" id="course-price" name="course-price" class="form-control" min="0" step="0.01" required>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <input type="submit" value="Update" name="submit" class="btn btn-primary" required>
                </div>
            </div>
        </div>
    </form>
</div>



<?php include 'footer.php'; ?>