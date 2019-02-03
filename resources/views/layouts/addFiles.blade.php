<div class="col-md-6">
    <div class="row card bg-kenons">
        <div class="card-body bg-kenons">
        	<form action="{{ route('files.memes') }}" method="Post" role="form" class="col-12 form" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
        		<h2 class="text-center">Upload meme from disk</h2>
        		<div class="form-goup m-3">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="far fa-hdd"></i></span>
                        </div>
                    	<input type="text" name="title" class="form-control" placeholder="Title">

                	</div>
                </div>
                <div class="form-goup m-3">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-cloud-upload-alt"></i></span>
                        </div>
                    	<div class="custom-file">
						 	<input type="file" class="custom-file-input" name="upload_meme">
						  	<label class="custom-file-label" for="upload_meme">Choose file</label>
						</div>
                	</div>
                </div>
                <div class="form-group">
			    <div class="form-check m-3">
			      	<input class="form-check-input" type="checkbox" id="gridCheck" name="home" value='1'>
			      	<label class="form-check-label" for="gridCheck">
			        	Home Page
			      	</label>
			    	</div>
			  	</div>
			  	 <div class="form-check m-3 pl-0">
			       <button type="submit" class="btn btn-primary w-100">
                         <i class="fas fa-cloud-upload-alt"></i>
                    </button>
			  	</div>
        	</form>
        </div>
    </div>
</div>