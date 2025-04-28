<div class="main_content">
  <!-- Main section header and breadcrumb -->
  <div class="mainSection-title">
      <div class="row">
          <div class="col-12">
              <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                  <div class="d-flex flex-column">
                      <h4>{{ get_phrase('Add a new product') }}</h4>
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
                  <form method="POST" action="{{ route('admin.marketplace.created') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre *</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                            <div class="invalid-feedback" id="title-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="currency" class="form-label">Devise *</label>
                            <select class="form-select" id="currency" name="currency" required>
                                <option value="">Sélectionner une devise</option>
                                @foreach (\App\Models\Currency::all() as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }} ({{ $currency->symbol }})</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback" id="currency-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="price" class="form-label">Prix *</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                            <div class="invalid-feedback" id="price-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="location" class="form-label">Localisation *</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                            <div class="invalid-feedback" id="location-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie *</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Sélectionner une catégorie</option>
                                @foreach (\App\Models\Marketplace_category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback" id="category-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="condition" class="form-label">État *</label>
                            <select class="form-select" id="condition" name="condition" required>
                                <option value="">Sélectionner l'état</option>
                                <option value="new">Neuf</option>
                                <option value="used">Occasion</option>
                                <option value="refurbished">Reconditionné</option>
                            </select>
                            <div class="invalid-feedback" id="condition-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="brand" class="form-label">Marque</label>
                            <input type="text" class="form-control" id="brand" name="brand">
                            <div class="invalid-feedback" id="brand-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="buy_link" class="form-label">Lien d'achat</label>
                            <input type="url" class="form-control" id="buy_link" name="buy_link">
                            <div class="invalid-feedback" id="buy_link-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="status" class="form-label">Statut</label>
                            <select class="form-select" id="status" name="status">
                                <option value="available">Disponible</option>
                                <option value="sold">Vendu</option>
                                <option value="pending">En attente</option>
                            </select>
                            <div class="invalid-feedback" id="status-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                            <div class="invalid-feedback" id="description-error"></div>
                        </div>
            
                        <div class="mb-3">
                            <label for="multiple_files" class="form-label">Images (JPEG, PNG, GIF)</label>
                            <input type="file" class="form-control" id="multiple_files" name="multiple_files[]" multiple accept="image/jpeg,image/png,image/gif">
                            <div class="invalid-feedback" id="multiple_files-error"></div>
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