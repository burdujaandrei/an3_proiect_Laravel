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
							<h1 class="t-center" style="margin: 40px 0;color: #212121;letter-spacing: 2px;font-weight: 500;">Show Archive</h1>
					<br/>
						<center>						
						<div class="col-1-2">
									<div class="art-header">
						<img src="{{ asset('/images/'.$archive[0]->image) }} " width="75%" height="75%"/>
									</div>
						</div>
								<div class="col-1-2">
									<div class="art-content t-center">
										<h3><?php echo $archive[0]->title; ?></h3>
										<br>
										<p><?php echo $archive[0]->content; ?></p>
									</div>	
								</div>

						</center>
				<br/><br/>
					<?php echo link_to("archive",'Go to Archives');?>
						</div>
						</center>		
					</div>
				
				</div>
				<br/><br/>
			</div>
		</section>
@endsection('content')