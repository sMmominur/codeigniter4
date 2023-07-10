<!-- exam_categories/edit.php -->

<h2>Edit Exam Category</h2>

<?= \Config\Services::validation()->listErrors() ?>

<form action="<?= base_url('exam-category/edit/' . $category['id']) ?>" method="post">
    <label for="exam_category_name">Exam Category Name:</label>
    <input type="text" name="exam_category_name" id="exam_category_name" value="<?= old('exam_category_name', $category['exam_category_name']) ?>">

    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>

    <input type="submit" name="submit" value="Update">
</form>

<a href="<?= base_url('exam-category') ?>">Back to Exam Categories</a>
