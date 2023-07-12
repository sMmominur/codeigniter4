return view('name');
 return view('header')
            . view('menu')
            . view('content', $data)
            . view('footer');

return view('directory_name/file_name');
return view('Example\Blog\Views\blog_view');

// Cache the view for 60 seconds
return view('file_name', $data, ['cache' => 60]);

// Cache the view for 60 seconds
return view('file_name', $data, ['cache' => 60, 'cache_name' => 'my_cached_view']);

$data = [
    'title'   => 'My title',
    'heading' => 'My Heading',
    'message' => 'My Message',
];

return view('blog_view', $data, ['saveData' => false]);


<?= $this->renderSection('content') ?>

<?= $this->extend('default') ?>

<?= $this->section('content') ?>
    <h1>Hello World!</h1>
<?= $this->endSection() ?>

https://www.codeigniter.com/user_guide/outgoing/response.html