@extends('layouts.layout')

@section('content')

	<button type = "button" class="btn btn-danger" data-toggle="modal" data-target="#newModal" data-act = "new">
		<img src="/images/glyphicons-191-plus-sign.png"> NEW</button>

	<a href = "/" class="btn btn-primary offset-sm-9">
			<img src="/images/glyphicons-21-home.png"></span> HOME</a>	

	<br><br>

	<table class="table" id = "datatable" width = "100%">
	  <thead>
	    <tr>
	      <th>Name</th>
	      <th>Address</th>
	      <th>Phone</th>
	      <th>E-mail</th>
	      <th>Website</th>
	      <th>View</th>
	      <th>Edit</th>
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($donors as $donor):
		   	<tr>
		      <td>{{ $donor->name }}</td>
		      <td>{{ $donor->address }}</td>
		      <td>{{ $donor->ph_number }}</td>
		      <td>{{ $donor->email }}</td>
		      <td>{{ $donor->website }}</td>
		      <td><img src="/images/glyphicons-52-eye-open.png" data-toggle="modal" data-target="#newModal" data-whatever="{{$donor}}" data-act="view"></td>
		      <td><img src="/images/glyphicons-31-pencil.png" data-toggle="modal" data-target="#newModal" data-whatever="{{$donor}}" data-act="edit"></td>
		      <td><a href="/donors/delete/{{ $donor->id }}"><img src="/images/glyphicons-193-remove-sign.png"></a></td>
		    </tr>
	   	@endforeach
	  </tbody>
	</table>
	<div id = "newModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class = "modal-content">
				<div class="modal-header"><h3 id = "header"></h3></div>
				<div class="modal-body">
					<form class = "form-horizontal" role = "form" method="POST" action="/" id = "form_popup">
						<div class="fluid-container">  
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class = "form-group">
								<label for = "name" class = "control-label col-sm-1">Name: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name="name" id = "name" placeholder = "Enter Donor Name" required>
								</div>
							</div>	
						
							<div class = "form-group">
								<label for = "address" class = "control-label col-sm-1">Address: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "address" placeholder = "Enter the Address" required>
								</div>
							</div>
			
							<div class = "form-group">
								<label for = "phone" class = "control-label col-sm-1">Phone: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "phone" placeholder = "Enter the Phone" required>
								</div>
							</div>

							<div class = "form-group">
								<label for = "email" class = "control-label col-sm-1">Email: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "email" placeholder = "Enter the Email" required>
								</div>
							</div>

							<div class = "form-group">
								<label for = "website" class = "control-label col-sm-1">Website: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "website" placeholder = "Website" required>
								</div>
							</div>

							<div class = "form-group">
								<label for = "estDate" class = "control-label col-sm-1">Established Date: </label>
								<div class = "col-sm-12">
								   <input type = "date" class = "form-control" name = "estDate" required>
								</div>
							</div>

							<div class = "form-group">
								<label for = "description" class = "control-label col-sm-1">Description: </label>
								<div class = "col-sm-12">
								   <textarea class = "form-control" name = "description" placeholder = "Short Description" required></textarea>
								</div>
							</div>
						</div>							
				</div>
				<div class="modal-footer">
					<!-- <button type="submit" class="btn btn-primary" id="save_changes">Save Changes</button> -->
					<button type="submit" class="btn btn-primary" id="save">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					
	      		</div>
	      		</form>	
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function()
		{  
    		$('#datatable').DataTable(); 
 		});

 		$('#newModal').on('show.bs.modal', function (event) 
 		{
			var button = $(event.relatedTarget) // Button that triggered the modal
			
			if(button.data('act') == "view" || button.data('act')=="edit")
			{
				 // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				var data = button.data('whatever')
				modal.find('.modal-body input[name="name"]').val(data['name'])
				modal.find('.modal-body input[name="address"]').val(data['address'])
				modal.find('.modal-body input[name="phone"]').val(data['ph_number'])
				modal.find('.modal-body input[name="email"]').val(data['email'])
				modal.find('.modal-body input[name="website"]').val(data['website'])
				modal.find('.modal-body input[name="estDate"]').val(data['estdate'])
				modal.find('.modal-body textarea[name="description"]').val(data['description'])
				if(button.data('act') == "view")
				{
					var form = document.getElementById("form_popup");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) 
					{
					    elements[i].readOnly = true;
					}
					document.getElementById("save").style.visibility="hidden";
					$("h3").text("View donor");
					
					// document.getElementById("save_changes").style.visibility="hidden";
				}

				if(button.data('act') == "edit")
				{	
					var form = document.getElementById("form_popup");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) 
					{
					    elements[i].readOnly = false;
					}
					// document.getElementById("save_changes").style.visibility="visible";
					document.getElementById("save").style.visibility="visible";
					form.action = "/donor/update/" + data['id'];
					$("h3").text("Edit donor");
					// var link = "/donor/update/" + data['id'];
					// document.getElementById("save").onClick("location.href='"+link+"'");
				}
			}

			else if(button.data('act') == "new")
			{
				var form = document.getElementById("form_popup");
				var elements = form.elements;

				for (var i = 0, len = elements.length; i < len; ++i) 
				{
					elements[i].readOnly = false;
				    if(elements[i].name != "_token")
				    {
				    	elements[i].value = null;
				    }
				}
				// document.getElementById("save_changes").style.visibility="hidden";
				document.getElementById("save").style.visibility="visible";
				form.action="/donor/create";
				$("h3").text("Add donor");
			}
		})
	</script>

@endsection