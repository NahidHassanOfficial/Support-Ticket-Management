   <div class="card col-md-5 bg-light  text-start p-3 overflow-hidden d-flex flex-column justify-content-evenly">

       <div class="">
           <form enctype="multipart/form-data" action="{{ route('form.store') }}" method="post"
               class="d-flex flex-column mb-3">
               <input type="hidden" name="user_id" value="498">
               <label for="severity" class="form-label">Severity</label>
               <select class="form-select form-select-md mb-3" name="severity" id="severity">
                   <option value="Low" {{ old('severity') == 'Low' ? 'selected' : '' }}>Low</option>
                   <option value="Medium" {{ old('severity') == 'Medium' ? 'selected' : '' }}>Medium</option>
                   <option value="High" {{ old('severity') == 'High' ? 'selected' : '' }}>High</option>
               </select>
               <label for="title" class="form-label">Title</label>
               @error('title')
                   <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="text" class="form-control mb-3" name="title" id="title" placeholder=""
                   value="{{ old('title') }}" />

               <label for="description" class="form-label">Description</label>
               @error('description')
                   <span class="text-danger">{{ $message }}</span>
               @enderror
               <textarea class="form-control mb-3" name="description" id="description" rows="3">{{ old('description') }}</textarea>

               <label for="attachment" class="form-label">Attach Media (Optional)</label>
               <input type="file" name="attachments[]" id="attachment" class="col-md-5 col-sm-10" multiple>
               @error('attachments')
                   <span class="text-danger">{{ $message }}</span>
               @enderror
               @error('attachments.*')
                   <span class="text-danger">{{ $message }}</span>
               @enderror
               <button type="submit" class="btn btn-primary  mt-3">Submit</button>
           </form>
           <p class="text-success">{{ session('success') }}</p>
       </div>
   </div>
