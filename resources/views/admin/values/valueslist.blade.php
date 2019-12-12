@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div style="padding-top:100px;">
				<center>
					<div style="display: inline-flex; text-align: center;">
						<h3 class="resulttablehead">Menaxhimi i koefiçentëve të kategorive</h3>
					</div>
				</center>

				<br/>

				<table class="resulttable">
					<tr class="resulttablerow">
						<th class="resulttablehead">Kategoria</th>
						<th class="resulttablehead" style="text-align: center;">Veprime</th>
					</tr>
					@foreach($categories as $category)
						<tr class="resulttablerow">
							<td class="resulttabledata">{{$category->name}}</td>
							<td class="resulttabledata" style="text-align: center;">
								<a href="/values/{{$category->id}}" class="btn btn-primary btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Shiko detajet">
									<i class="fa fa-eye"></i>
								</a>
								<a href="/values/{{$category->id}}/edit" class="btn btn-success btn-circle btn-sm edit-buttons" data-toggle="tooltip" title="Modifiko koefiçentët">
									<i class="fa fa-edit"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</table>

				<div>
					{{ $categories->links() }}
				</div>

			</div>
		</div>
	</div>
</div>

@endsection
