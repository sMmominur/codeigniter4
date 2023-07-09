<div class="sidebar-inner slimscroll">
	<div id="sidebar-menu" class="sidebar-menu">

		<!-- Load the language file -->
		<?php lang('en/left_menu');?>

		<ul>
		    <li> 
				<a href=""><i class="la la-home"></i> <span>
					<?= lang('left_menu.dashboard');?>
				</span></a>
			</li>



			<li class="menu-title"> 
				<span><?= lang('left_menu.main');?></span>
			</li>

			<li class="submenu">
				<a href="#"><i class="las la-database"></i> <span><?= lang('left_menu.configuration');?></span>
				 <span class="menu-arrow"></span></a>
				<ul style="display: none;">
					<li><a href="#"><?= lang('left_menu.exam_category');?></a></li>
					<li><a href="#"><?= lang('left_menu.subject');?></a></li>
					<li><a href="#"><?= lang('left_menu.others');?></a></li>
				</ul>
			</li>


			<li class="menu-title"> 
				<span><?= lang('left_menu.others');?></span>
			</li>

			<li> 
				<a href="activities.html"><i class="la la-bell"></i> <span><?= lang('left_menu.activities');?></span></a>
			</li>
			<li> 
				<a href="settings.html"><i class="la la-cog"></i> <span><?= lang('left_menu.setting');?></span></a>
			</li>

		</ul>
	</div>
</div>