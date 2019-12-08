@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div style="padding-top:100px;">
				<center>
					<div style="display: inline-flex; text-align: center;">
						<h3 class="resulttablehead">Menaxhimi i kategorive</h3>

						<a href="/categories/create" class="btn btn-primary navbar-btn ml-0 ml-lg-3">
							Krijo
						</a>
					</div>
				</center>

				<br/>

				<table class="resulttable">
					<tr class="resulttablerow">
						<th class="resulttablehead">Emri</th>
						<th class="resulttablehead" style="text-align: center;">Veprime</th>
					</tr>
					@foreach($categories as $category)
						<tr class="resulttablerow">
							<td class="resulttabledata">{{$category->name}}</td>
							<td class="resulttabledata" style="text-align: center;">
								<a href="/categories/{{$category->id}}" class="btn btn-primary btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Shiko detajet">
									<i class="fa fa-eye"></i>
								</a>
								<a href="/categories/{{$category->id}}/edit" class="btn btn-success btn-circle btn-sm edit-buttons" data-toggle="tooltip" title="Modifiko">
									<i class="fa fa-edit"></i>
								</a>
								<form method="POST" action="/categories/{{$category->id}}" style="display:inline; margin:0px; padding:0px;">
									@method('DELETE')
									@csrf

									<button type="submit" class="btn btn-danger btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Fshi" onclick="areYouSure(event, this);">
										<i class="fa fa-trash"></i>
									</button>
								</form>
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