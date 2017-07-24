@extends('layouts.layout')

@section('content')

	
	<button type = "button" class="btn btn-danger" data-toggle="modal" data-target="#newModal">
		<img src="/images/glyphicons-191-plus-sign.png">   NEW</button>

	

	<a href = "/" class="btn btn-primary offset-sm-9">
			<img src="/images/glyphicons-21-home.png"></span>   HOME</a>	
	

	<br><br>

	<table class="table" id="datatable"  width = "100%">
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
	    @foreach($orgs as $org)
            <tr>
		      <td>{{$org->name}}</td>
		      <td>{{$org->address}}</td>
		      <td>{{$org->phone}}</td>
		      <td>{{$org->email}}</td>
		      <td>{{$org->website}}</td>
		      <td><img src="/images/glyphicons-52-eye-open.png" data-toggle="modal" data-target="#newModal"></td>
		      <td><img src="/images/glyphicons-31-pencil.png" data-toggle="modal" data-target="#newModal"></td>
		      <td><a href="/ngo_ingo/destroy/{{$org->id}}"><img src="/images/glyphicons-193-remove-sign.png"></a></td>
		    </tr>      
        @endforeach
	  </tbody>
	</table>

	<div id = "newModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class = "modal-content">
				<div class="modal-header">Add New NGO/INGO</div>
				<div class="modal-body">
					<form class = "form-horizontal" role = "form" method="POST" action="verify.php">
						<div class="fluid-container">  
							<div class = "form-group">
								<label for = "name" class = "control-label col-sm-1">Name: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name="name" placeholder = "Enter NGO/INGO Name" required>
								</div>
							</div>	
						

							<div class = "form-group">
								<label for = "swcNumber" class = "control-label col-sm-1">SWC Number: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "swcNumber" placeholder = "Enter the SWC Number" required>
								</div>
							</div>

							<div class = "form-group">
								<label for = "Address" class = "control-label col-sm-1">Address: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "Address" placeholder = "Enter the Address" required>
								</div>
							</div>

							<div class = "form-group">
								<label for = "contact" class = "control-label col-sm-1">Contact Person: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "contact" placeholder = "Enter the Contact Person" required>
								</div>
							</div>
							
							<div class = "form-group">
								<label for = "Phone" class = "control-label col-sm-1">Phone: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "Phone" placeholder = "Enter the Phone" required>
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
								<label for = "description" class = "control-label col-sm-1">Description: </label>
								<div class = "col-sm-12">
								   <textarea class = "form-control" name = "description" placeholder = "Short Description" required></textarea>
								</div>
							</div>

							<div class = "form-group">
								<label for = "affilation" class = "control-label col-sm-1">Affilation: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "affilation" placeholder = "Affilated to..." required>
								</div>
							</div>

							 <div class = "form-group ">   
						        <label for = "category" class = "control-label col-sm-1" >Category: </label>
						           <div class = "col-sm-12">
						              <select class="form-control" name= "role">
						                <option value="NGO">NGO</option>
						                <option value="INGO">INGO</option>
						        </select>
						           </div>   
							  </div> 
						</div>

					</form>			
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-primary">Save</button>
	      		</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){  
    		$('#datatable').DataTable();  
 		});
	 </script>
@endsection