<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->include('component/head') ?>
    <title><?= $this->renderSection('title_bar_title') ?></title>
    <style type="text/css"><?= $this->renderSection('page_specific_css') ?></style>
</head>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        
        <!-- Header -->
        <div class="header">
            <?= $this->include('component/header') ?>
        </div>
        <!-- /Header -->
        
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <?= $this->include('component/leftsidebar') ?>
        </div>
        <!-- /Sidebar -->
        
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            
            <!-- Page Content -->
            <div class="content container-fluid">
                
                <!-- Page main content will inject here -->
                <?= $this->renderSection('main_content') ?>
                
            </div>
            <!-- /Page Content -->
            
        </div>
        <!-- /Page Wrapper -->
        
    </div>
    <!-- /Main Wrapper -->
    
    <?= $this->include('component/script') ?>
    
    <!-- Add page specific script if needed -->
    <?= $this->renderSection('page_specific_script') ?>
    
</body>
</html>
