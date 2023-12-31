@extends("layout")

@section("content")
<div class="p-3">
    <div data-role="panel" data-title-caption="{{ trans('cruds.user.index') }}" data-collapsible="true" data-title-icon="<span class='mif-chart-line'></span>">

		<div class="grid">
			<div class="row">
				<div class="cell-5">
				</div>

				<div class="cell-7" align="right">
					@if (Auth::User()->role==1)
					<form action="/users/create">
						<button class="button primary" onclick="location.href = '/users/create';">
				            <span class="mif-plus"></span>
				            &nbsp;
							{{ trans('common.new') }}
						</button>
					</form>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="cell-12">

			<table class="table striped row-hover cell-border"
		       data-role="table"
		       data-rows="10"
			   data-show-search="false"
		       data-show-activity="true"
		       data-rownum="false"
		       data-check="false"
		       data-check-style="1">
			    <thead>
			    <tr>
					<th 
						data-sortable="true"
						data-sort-dir="asc"
						data-format="string"
						width="50"
						>{{ trans('cruds.user.fields.login') }}</th>
					<th 
						data-sortable="true"
						data-sort-dir="asc"
						data-format="string"
						width="50"
						>{{ trans('cruds.user.fields.name') }}</th>
					<th 
						data-sortable="true"
						data-sort-dir="asc"
						data-format="string"
						width="50"
						>{{ trans('cruds.user.fields.title') }}</th>
					<th 
						data-sortable="true"
						data-format="string"
						data-format="string"
						width="200">{{ trans('cruds.user.fields.email') }}</th>
			    </tr>
			    </thead>
			    <tbody>
			@foreach($users as $user)
				<tr>
					<td><a href="/users/{{ $user->id}}">{{ $user->login==null ? "N/A" : $user->login }}</a></td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->title }}</td>
					<td>{{ $user->email }}</td>
				</tr>
			@endforeach
				</tbody>
			</table>
			<br>
		</div>
	</div>
</div></div>
@endsection

