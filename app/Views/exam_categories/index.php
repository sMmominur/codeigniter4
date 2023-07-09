<!-- exam_categories/index.php -->

<h2>Exam Categories</h2>

<a href="<?= site_url('exam-category/create') ?>" class="btn btn-primary">Create Category</a>

<?php if (!empty($categories)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Exam Category Name</th>
                <th>School ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['exam_category_name'] ?></td>
                    <td><?= $category['school_id'] ?></td>
                    <td>
                        <a href="<?= site_url('exam-category/edit/' . $category['id']) ?>">Edit</a>
                        <a href="<?= site_url('exam-category/delete/' . $category['id']) ?>" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No exam categories found.</p>
<?php endif; ?>
