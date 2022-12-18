<!-- Modal Structure -->
  <div id="post1" class="modal">
    <div class="modal-content">
      
	  <div class="row">
		<form class="col s12" method="POST" action="thanks.php">
		    <div class="row">
			<div class="input-field col s6">
			  <input placeholder="" id="name" name="name" type="text" class="validate">
			  <label for="first_name">Name</label>
			</div>
			  <div class="input-field col s6">
				<input placeholder="" id="phone" type="text" name="phone" class="validate">
				<label for="phone">Phone(Optional)</label>
			  </div>	  
			</div>
			
			<div class="row">	
			  <div class="input-field col s6">
				 <input id="email" type="email" name="email" class="validate">
				 <label for="email">Email</label>
			  </div>	
			 <div class="input-field col s6">
				<input placeholder="" id="website" type="text" name="website">
				<label for="website">Website(Optional)</label>
			  </div>
			</div>
			
			<div class="row">
			  <div class="input-field col s6">
				<select name="category">
				  <option value="1" disabled selected>Select Category</option>
				  <option value="Photography">Photography</option>
				  <option value="Events">Events</option>
				  <option value="GraphicsDesign">Graphics & Design</option>
				  <option value="ContentWriting">Content Writing</option>
				  <option value="WebDevelopment">Web Development</option>
				  <option value="AppDevelopment">App Development</option>
				  <option value="SoftwareDevelopment">Software Development</option>
				  <option value="BusinessAdmin">Business & Admin</option>
				  <option value="FashionLifestyle">Fashion & Lifestyle</option>
				  <option value="PetCare">Pet Care</option>
				  <option value="Fitness">Fitness</option>
				  <option value="LegalIssues">Legal Issues</option>
				  <option value="TaxPlanning">Tax Planning</option>
				  <option value="Astrology">Astrology</option>
				  <option value="BrideGroom">Bride & Groom</option> 
				  <option value="HomeTutor">Home Tutor</option>
				  <option value="YogaTrainer">Yoga Trainer</option>
				  <option value="Electrician">Electrician</option>
				  <option value="Plumber">Plumber</option>
				  <option value="Cook">Cook</option>
				  <option value="Babysitter">Babysitter</option>
				  <option value="Driver">Driver</option>
				  <option value="Painter">Painter</option>
				  <option value="ComputerRepair">Computer Repair</option>
				  <option value="WalkInJobs">WalkIn Jobs</option>
				  <option value="Other">Other</option>
				</select>
				<label></label>
			  </div>			
			
			    <div class="input-field col s6">
				    <input placeholder="" id="address" name="address" type="text" class="validate">
					<label for="address">Address</label>
				</div>
			</div>
			
			<div class="input-field col s12">
			  <textarea id="textarea1" class="materialize-textarea" name="requirement"></textarea>
			  <label for="textarea1">Write Your Requirements Here</label>
			</div>
			
			<button class="waves-effect waves-light btn" type="submit" name="action">Post
				<i class="material-icons right">send</i>
			</button>
		</form>
	  </div>
	 </div>
</div>