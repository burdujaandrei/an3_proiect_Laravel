@extends('template')
@section('content')

	<section id="container">
			<div class="wrap-container clearfix">
				<div id="main-content">
					<div class="crumbs">
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
						</ul>
					</div>
					<center>	
					<div class="zerogrid">
						<div class="wrap-content" style="padding: 60px;">
							<h1 class="t-center" style="margin: 40px 0;color: #212121;letter-spacing: 2px;font-weight: 500;">Show Image</h1>
						<table>
							<tr>
								<th>Image</th>
							</tr>
							<tr>

								<td colspan="3" align="center">
									<img src="{{asset('/images/'.$image->title)}}" width="200" height="200"></td>

								</tr>
						</table>

				<br/><br/>
					<?php echo link_to("showall",'Go to Images');?>
						</div>
						</center>		
					</div>
				
				</div>
				<br/><br/>
			</div>
		</section>
@endsection('content')