<aside class="main-sidebar hidden-print ">
	<section class="sidebar" id="sidebar-scroll">
		<!-- Sidebar Menu-->
		<ul class="sidebar-menu">
			<li class="nav-level">--- Home</li>
			<li class="{{ Route::is('dashboard') ? 'active' : ''}} treeview">
				<a class="waves-effect waves-dark" href="{{ route('dashboard')}}">
					<i class="icon-speedometer"></i><span> Dashboard</span>
				</a>                
			</li>
			<li class="nav-level">--- App</li>
			<!-- <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span> UI Elements</span><i class="icon-arrow-down"></i></a>
				<ul class="treeview-menu">
					<li><a class="waves-effect waves-dark" href="accordion.html"><i class="icon-arrow-right"></i> Accordion</a></li>
					
				</ul>
			</li> -->

			<li class="{{ Route::is('admin.department.index') ? 'active' : ''}} treeview">
				<a class="waves-effect waves-dark" href="{{ route('admin.department.index') }}">
					<i class="icon-speedometer"></i><span> Discipline</span>
				</a>                
			</li>

			

			<li class="{{ Route::is('admin.topic.index') ? 'active' : ''}} treeview">
				<a class="waves-effect waves-dark" href="{{ route('admin.topic.index') }}">
					<i class="icon-speedometer"></i><span> Topics</span>
				</a>                
			</li>

			<li class="{{ Route::is('admin.user.index') ? 'active' : ''}} treeview">
				<a class="waves-effect waves-dark" href="{{ route('admin.user.index') }}">
					<i class="icon-user"></i><span> User</span>
				</a>                
			</li>
		
		</ul>
	</section>
</aside>