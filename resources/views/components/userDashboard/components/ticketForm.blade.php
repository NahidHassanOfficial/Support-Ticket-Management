   <div class="card col-md-5 bg-light  text-start p-3 overflow-hidden d-flex flex-column justify-content-evenly">

       <div class="">
           <form enctype="multipart/form-data" action="{{ route('create-ticket.store') }}" method="post"
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

               {{-- <img class="w-25" id="newImg" src="" /> --}}
               {{-- <div class="d-flex gap-2 " id='previewImg'>
                   <img src="{{ asset('images/image-preview.jpg') }}" class="w-25" alt="">
               </div>
               <label for="attachment"
                   class="form-label border border-2 rounded border-dashed mt-3 p-3 text-center">Attach
                   Media (Optional Max:3)</label> --}}

               <div class="d-flex gap-2 " id='previewImg'>

               </div>
               <label for="attachment"
                   class="form-label border border-1 rounded border-dashed mt-3 p-3 text-center d-col">
                   <img src="{{ asset('images/cloud-upload-svgrepo.svg') }}" class="w-25" alt="">
                   <div>
                       Attach
                       Media (Optional Max:3)
                   </div>
               </label>

               <input type="file" accept="image/*" name="attachments[]" id="attachment"
                   class="col-md-5 col-sm-10 d-none" multiple>
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

   <script>
       let imgInput = document.getElementById('attachment');
       let previewImgDiv = document.getElementById('previewImg');

       imgInput.addEventListener('input', () => {
           previewImgDiv.innerHTML = '';
           for (let i = 0; i < imgInput.files.length; i++) {
               const reader = new FileReader();
               reader.onload = () => {
                   const img = document.createElement('img');
                   img.src = reader.result;
                   img.className = 'w-25';
                   previewImgDiv.appendChild(img);
               };
               reader.readAsDataURL(imgInput.files[i]);
           }
       })
   </script>
