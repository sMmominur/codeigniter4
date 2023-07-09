<!-- exam_categories/edit.php -->

<h2>Edit Exam Category</h2>

<?= \Config\Services::validation()->listErrors() ?>

<form action="<?= site_url('exam-category/edit/' . $category['id']) ?>" method="post">
    <label for="exam_category_name">Exam Category Name:</label>
    <input type="text" name="exam_category_name" id="exam_category_name" value="<?= old('exam_category_name', $category['exam_category_name']) ?>">

    <label for="school_id">School ID:</label>
    <input type="text" name="school_id" id="school_id" value="<?= old('school_id', $category['school_id']) ?>">

    <button type="submit">Update</button>
</form>

<a href="<?= site_url('exam-category') ?>">Back to Exam Categories</a>
