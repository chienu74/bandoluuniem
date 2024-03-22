@extends('layouts.admin')

@section('content')
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Overview</h1>
			<a href="create">Tạo mới menu</a>
			<div class="tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade active show" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">#</th>
											<th class="cell">Tên menu</th>
											<th class="cell">Menu cha</th>
											<th class="cell">Người tạo</th>
											<th class="cell">Ngày tạo</th>
											<th class="cell">Người sửa</th>
											<th class="cell">Ngày sửa</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($menus as $menu)
										<tr>
											<td class="cell">{{ $menu->MenuID }}</td>
											<td class="cell"><span class="truncate">{{ $menu->MenuName }}</span></td>
											<td>{{ $menu->ParentID }}</td>
											<td>{{ $menu->CreateBy }}</td>
											<td>{{ $menu->CreateDate }}</td>
											<td>{{ $menu->ModifyBy }}</td>
											<td>{{ $menu->ModifyDate }}</td>
											<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div><!--//table-responsive-->
						</div><!--//app-card-body-->
					</div><!--//app-card-->
					<nav class="app-pagination">
						<ul class="pagination justify-content-center">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav><!--//app-pagination-->
				</div><!--//tab-pane-->
			</div>
		</div><!--//container-fluid-->
	</div><!--//app-content-->

	@include('admins.partials.footer')

</div><!--//app-wrapper-->
@endsection