@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div style="padding-top:100px;">
				<center>
					<div style="display: inline-flex; text-align: center;">
						<h3 class="resulttablehead">Historiku i planeve të investimit</h3>
                    </div>
                </center>

                <br/>

                <table class="resulttable">
					<tr class="resulttablerow">
						<th class="resulttablehead">Aplikanti</th>
						<th class="resulttablehead">Data e krijimit</th>
						<th class="resulttablehead" style="text-align: center;">Veprime</th>
					</tr>
					@foreach($plans as $plan)
						<tr class="resulttablerow">
							<td class="resulttabledata">{{$plan->applicant}}</td>
							<td class="resulttabledata">{{$plan->created_at}}</td>
							<td class="resulttabledata" style="text-align: center;">
								<a href="/plans/{{$plan->id}}" class="btn btn-primary btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Shiko detajet">
									<i class="fa fa-eye"></i>
                                </a>
                                <a href="/plans/{{$plan->id}}/edit" class="btn btn-info btn-circle btn-sm edit-buttons" data-toggle="tooltip" title="Modifiko">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form method="POST" action="/plans/{{$plan->id}}/export/excel" style="display:inline; margin:0px; padding:0px;">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Eksport në Excel">
                                        <i class="fa fa-file-excel-o"></i>
                                    </button>
                                </form>
                                <form method="POST" action="/plans/{{$plan->id}}/export/pdf" style="display:inline; margin:0px; padding:0px;">
                                    @csrf
                                    <button type="submit" class="btn btn-dark btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Eksport në PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </button>
                                </form>
								<form method="POST" action="/plans/{{$plan->id}}" style="display:inline; margin:0px; padding:0px;">
									@method('DELETE')
									@csrf

									<button type="submit" class="btn btn-danger btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Fshi" onclick="areYouSure(event, this);">
										<i class="fa fa-trash"></i>
									</button>
								</form>
							</td>
						</tr>
                    @endforeach

                    @if(sizeof($plans) == 0)
                        <tr class="resulttablerow">
                            <td colspan="3" class="resulttabledata" style="text-align: center;">Nuk ka asnjë të dhënë</td>
                        </tr>
                    @endif
				</table>

				<div>
					{{ $plans->links() }}
				</div>

			</div>
		</div>
	</div>
</div>

@endsection
