<div class="main_content">
  <!-- Main section header and breadcrumb -->
  <div class="mainSection-title">
      <div class="row">
          <div class="col-12">
              <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                  <div class="d-flex flex-column">
                      <h4>{{ get_phrase('Add a new video') }}</h4>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Start Admin area -->
  <div class="row">
      <div class="col-md-7">
          <div class="eSection-wrap-2">
              <div class="eForm-layouts">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <form method="POST" action="{{ route('admin.video.created') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label eForm-label">{{ get_phrase('Video title') }}</label>
                            <input type="text" class="form-control eForm-control"  id="title" name="title" placeholder="Video title">
                        </div>

                        <div class="mb-3">
                            <label for="video_category_id" class="form-label eForm-label">{{ get_phrase('Select a category') }}</label>
                            <select name="video_category_id" class="form-select eForm-control select1">
                                <option value="">{{ get_phrase('Select a category') }}</option>
                                @foreach (\App\Models\VideoCategory::all() as $category)
                                    <option value="{{ $category->id }}" {{ old('video_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="#">{{ get_phrase('Category') }}</label>
                            <select name="category" id="category" class="form-select eForm-control select1  mb-3">
                                <option value="video">{{ get_phrase('Video') }}</option>
                                <option value="shorts">{{ get_phrase('Shorts') }}</option>
                            </select>
                        </div>
                        
                        <div class="post-controls dropdown">
                            <select name="privacy" id="privacy" class="form-select eForm-control select1 mb-3">
                                <option value="public">{{ get_phrase('Public') }}</option>
                                <option value="private">{{ get_phrase('Private') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="#">{{ get_phrase('Video/Shorts') }}</label>
                            <input type="file" name="video" id="image" class="form-control bg-secondary border-0">
                        </div>
                    
                        <div class="mb-3">
                            <label for="description" class="form-label eForm-label">{{ get_phrase('Video details') }}</label>
                            <textarea id="description" name="description" class="content"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="mobile_app_image" class="form-label eForm-label">{{ get_phrase('mobile_app_image') }}</label>
                            <input id="mobile_app_image" class="form-control eForm-control-file" type="file" name="mobile_app_image">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">{{ get_phrase('Submit') }}</button>
                    </form>

                    {{-- @csrf
    <div class="entry-header d-flex justify-content-between">
        <div class="ava-info d-flex align-items-center">
            <div class="flex-shrink-0">
                <img src="{{ get_user_image(auth()->user()->photo,'optimized') }}" class="rounded-circle user_image_show_on_modal" alt="...">
            </div>
            <div class="ava-desc ms-2">
                <h3 class="mb-0 h6">{{ auth()->user()->name }}</h3>
                <span class="meta-time text-muted"><a href="#">{{ auth()->user()->profession }}</a></span>
            </div>
        </div>
        <div class="post-controls dropdown">
            <select name="privacy" id="privacy" class="form-control bg-secondary border-0">
                <option value="public">{{ get_phrase('Public') }}</option>
                <option value="private">{{ get_phrase('Private') }}</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="#">{{ get_phrase('Video/Shorts') }}</label>
        <input type="file" name="video" id="image" class="form-control bg-secondary border-0">
    </div>
    
                    --}}
              </div>
          </div>
      </div>
  </div>
  <!-- Start Footer -->
  @include('backend.footer')
  <!-- End Footer -->
</div>