<div class="main_content">
  <!-- Main section header and breadcrumb -->
  <div class="mainSection-title">
      <div class="row">
          <div class="col-12">
              <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                  <div class="d-flex flex-column">
                      <h4>{{ get_phrase('Edit Video') }}</h4>
                  </div>
                  <div class="export-btn-area">
                      <a href="{{ route('admin.video') }}" class="export_btn"><i class="fas fa-arrow-left me-2"></i> {{ get_phrase('Back to Videos') }}</a>
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
                  <form method="POST" action="{{ route('admin.video.edit', $video_details->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                          <label for="title" class="form-label eForm-label">{{ get_phrase('Video title') }}</label>
                          <input type="text" class="form-control eForm-control" value="{{ old('title', $video_details->title) }}" id="title" name="title" placeholder="{{ get_phrase('Video title') }}" required>
                      </div>

                      <div class="mb-3">
                          <label for="video_category_id" class="form-label eForm-label">{{ get_phrase('Select a category') }}</label>
                          <select name="video_category_id" class="form-select eForm-control select1" required>
                              <option value="">{{ get_phrase('Select a category') }}</option>
                              @foreach (\App\Models\VideoCategory::all() as $category)
                                  <option value="{{ $category->id }}" {{ old('video_category_id', $video_details->video_category_id) == $category->id ? 'selected' : '' }}>
                                      {{ $category->type }}
                                  </option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="category">{{ get_phrase('Category') }}</label>
                          <select name="category" id="category" class="form-select eForm-control select1 mb-3" required>
                              <option value="video" {{ old('category', $video_details->category) == 'video' ? 'selected' : '' }}>{{ get_phrase('Video') }}</option>
                              <option value="shorts" {{ old('category', $video_details->category) == 'shorts' ? 'selected' : '' }}>{{ get_phrase('Shorts') }}</option>
                          </select>
                      </div>

                      <div class="post-controls dropdown">
                          <label for="privacy">{{ get_phrase('Privacy') }}</label>
                          <select name="privacy" id="privacy" class="form-select eForm-control select1 mb-3" required>
                              <option value="public" {{ old('privacy', $video_details->privacy) == 'public' ? 'selected' : '' }}>{{ get_phrase('Public') }}</option>
                              <option value="private" {{ old('privacy', $video_details->privacy) == 'private' ? 'selected' : '' }}>{{ get_phrase('Private') }}</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="video">{{ get_phrase('Video/Shorts') }}</label>
                          <input type="file" name="video" id="video" class="form-control bg-secondary border-0" accept="video/mp4,video/mov,video/wmv,video/mkv,video/webm,video/avi,video/m4v">
                          @if($video_details->file)
                              <p class="mt-2 small">{{ get_phrase('Current Video') }}: <a href="{{ asset($video_details->file) }}" target="_blank">{{ get_phrase('View Video') }}</a></p>
                          @endif
                      </div>

                      <div class="mb-3">
                          <label for="description" class="form-label eForm-label">{{ get_phrase('Video details') }}</label>
                          <textarea id="description" name="description" class="content">{{ old('description', $video_details->description) }}</textarea>
                      </div>

                      <div class="mb-3">
                          <label for="mobile_app_image" class="form-label eForm-label">{{ get_phrase('mobile_app_image') }}</label>
                          <input id="mobile_app_image" class="form-control eForm-control-file" type="file" name="mobile_app_image" accept="image/*">
                          @if($video_details->mobile_app_image)
                              <p class="mt-2 small">{{ get_phrase('Current Mobile App Image') }}: <a href="{{ asset($video_details->mobile_app_image) }}" target="_blank">{{ get_phrase('View Image') }}</a></p>
                          @endif
                      </div>

                      <button type="submit" class="btn btn-primary">{{ get_phrase('Update Video') }}</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- Start Footer -->
  @include('backend.footer')
  <!-- End Footer -->
</div>