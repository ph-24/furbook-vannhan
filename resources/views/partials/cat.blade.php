<div id='list-cat'>
	@foreach($cats as $cat)
	<div class="cat">
		<a href="{{ route('cat.show',$cat->id) }}">
			<strong>{{ $cat->name }}</strong> - {{ $cat->breed->name }}
		</a>
	</div>
	@endforeach
	{{$cats->links()}}
	<script type="text/javascript" charset="utf-8">
	$(function () {//tuong duong document.ready
		$('a.page-link').click(function(e){
			//Disable redirect page
			e.preventDefault();

			//get url from attribute href of tag a
			var url = $(this).attr('href');

			//create request
			$.get(url,function(response){
				$('#list-cat').replaceWith(response);
			});
			//console.log(url);
		});

		// User load ajax
		// $('#list-cat').load(url);
	})
</script>
</div>
