<h2>Create Exam Category</h2>

<?= \Config\Services::validation()->listErrors() ?>

<form action="<?= base_url('exam-category/store') ?>" method="post">
    <?= csrf_field() ?>
    <label for="exam_category_name">Exam Category Name:</label>
    <input type="text" name="exam_category_name" id="exam_category_name" value="<?= old('exam_category_name') ?>">

    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>

    <input type="submit" name="submit" value="Create">
</form>

<a href="<?= base_url('exam-category') ?>">Back to Exam Categories</a>
