@extends("admin.layouts.app")
@section('css')
@endsection
@section('script')
@include('UEditor::head');
<script type="text/javascript">
	window.onload=function(){
		document.getElementById("indexbar").setAttribute('class','');
		document.getElementById("singerbar").setAttribute('class','');
		document.getElementById("albumbar").setAttribute('class','');
		document.getElementById("userbar").setAttribute('class','');
		document.getElementById("musicbar").setAttribute('class','active');
	}
</script>
@parent
@endsection
@section('content')  
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Music</h3>
			<div class="row">
			<div class="col-md-8">
					<!-- BASIC TABLE -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Show Details</h3>
						</div>
						<div class="panel-body">
							<table class="table">
								<tbody>
									<tr>
										<th>m_id</th>
										<th>0000</th>
									</tr>
									<tr>
										<th>name</th>
										<th>firework</th>
									</tr>
									<tr>
										<th colspan="2">
											<img src="a.jpg" width="200" height="200" />
											<img src="b.jpg" width="200" height="200" />
										</th>
									</tr>
									<tr>
										<th>singer</th>
										<th>kety perry</th>
									</tr>
									<tr>
										<th>album</th>
										<th>null</th>
									</tr>
									<tr>
										<th>language</th>
										<th>English</th>
									</tr>
									<tr>
										<th>download</th>
										<th>0</th>
									</tr>
									<tr>
										<th>scource</th>
										<th>music/firework</th>
									</tr>
								</tbody>
							</table>
							<table class="table">
								<tr>
									<th>
										<button type="button" >gai</button>
									</th>
									<th>
										<button type="button" >back</button>
									</th>
								</tr>
							</table>
							<div>lrc:
								<pre>
									Do you ever feel
									Like a plastic bag
									Drifting through the wind
									Wanting to start again
									Do you ever feel
									Feel so paper-thin
									Like a house of cards
									One blow from caving in
									Do you ever feel
									Already buried deep
									Six feet under
									Screams but no one seems to hear a thing
									Do you know that there's
									Still a chance for you
									'Cause there's a spark in you
									You just gotta
								</pre>
								<button type="button">gai</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection