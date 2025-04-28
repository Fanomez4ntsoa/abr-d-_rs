<div class="main_content">
  <!-- Main section header and breadcrumb -->
  <div class="mainSection-title">
      <div class="row">
          <div class="col-12">
              <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                  <div class="d-flex flex-column">
                      <h4>{{ get_phrase('Edit Product') }}</h4>
                  </div>
                  <div class="export-btn-area">
                      <a href="{{ route('admin.marketplace') }}" class="export_btn"><i class="fas fa-arrow-left me-2"></i> {{ get_phrase('Back to Products') }}</a>
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
                  <form method="POST" action="{{ route('admin.marketplace.updated', $marketplace_details->id) }}" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label for="title" class="form-label eForm-label">{{ get_phrase('Titre') }}</label>
                        <input type="text" class="form-control eForm-control" id="title" name="title" value="{{ old('title', $marketplace_details->title) }}" placeholder="{{ get_phrase('Titre du produit') }}" required>
                        <div class="invalid-feedback" id="title-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="currency" class="form-label eForm-label">{{ get_phrase('Devise') }}</label>
                        <select class="form-select eForm-control select1" id="currency" name="currency" required>
                            <option value="">{{ get_phrase('Sélectionner une devise') }}</option>
                            @foreach (\App\Models\Currency::all() as $currency)
                                <option value="{{ $currency->id }}" {{ old('currency', $marketplace_details->currency_id) == $currency->id ? 'selected' : '' }}>
                                    {{ $currency->name }} ({{ $currency->symbol }})
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="currency-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="price" class="form-label eForm-label">{{ get_phrase('Prix') }}</label>
                        <input type="number" class="form-control eForm-control" id="price" name="price" step="0.01" value="{{ old('price', $marketplace_details->price) }}" required>
                        <div class="invalid-feedback" id="price-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="location" class="form-label eForm-label">{{ get_phrase('Localisation') }}</label>
                        <input type="text" class="form-control eForm-control" id="location" name="location" value="{{ old('location', $marketplace_details->location) }}" required>
                        <div class="invalid-feedback" id="location-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="category" class="form-label eForm-label">{{ get_phrase('Catégorie') }}</label>
                        <select class="form-select eForm-control select1" id="category" name="category" required>
                            <option value="">{{ get_phrase('Sélectionner une catégorie') }}</option>
                            @foreach (\App\Models\Marketplace_category::all() as $category)
                                <option value="{{ $category->id }}" {{ old('category', $marketplace_details->marketplace_category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="category-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="condition" class="form-label eForm-label">{{ get_phrase('État') }}</label>
                        <select class="form-select eForm-control select1" id="condition" name="condition" required>
                            <option value="">{{ get_phrase('Sélectionner l\'état') }}</option>
                            <option value="new" {{ old('condition', $marketplace_details->condition) == 'new' ? 'selected' : '' }}>{{ get_phrase('Neuf') }}</option>
                            <option value="used" {{ old('condition', $marketplace_details->condition) == 'used' ? 'selected' : '' }}>{{ get_phrase('Occasion') }}</option>
                            <option value="refurbished" {{ old('condition', $marketplace_details->condition) == 'refurbished' ? 'selected' : '' }}>{{ get_phrase('Reconditionné') }}</option>
                        </select>
                        <div class="invalid-feedback" id="condition-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="brand" class="form-label eForm-label">{{ get_phrase('Marque') }}</label>
                        <input type="text" class="form-control eForm-control" id="brand" name="brand" value="{{ old('brand', $marketplace_details->brand) }}" placeholder="{{ get_phrase('Marque du produit') }}">
                        <div class="invalid-feedback" id="brand-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="buy_link" class="form-label eForm-label">{{ get_phrase('Lien d\'achat') }}</label>
                        <input type="url" class="form-control eForm-control" id="buy_link" name="buy_link" value="{{ old('buy_link', $marketplace_details->buy_link) }}" placeholder="{{ get_phrase('URL d\'achat') }}">
                        <div class="invalid-feedback" id="buy_link-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="status" class="form-label eForm-label">{{ get_phrase('Statut') }}</label>
                        <select class="form-select eForm-control select1" id="status" name="status">
                            <option value="available" {{ old('status', $marketplace_details->status) == 'available' ? 'selected' : '' }}>{{ get_phrase('Disponible') }}</option>
                            <option value="sold" {{ old('status', $marketplace_details->status) == 'sold' ? 'selected' : '' }}>{{ get_phrase('Vendu') }}</option>
                            <option value="pending" {{ old('status', $marketplace_details->status) == 'pending' ? 'selected' : '' }}>{{ get_phrase('En attente') }}</option>
                        </select>
                        <div class="invalid-feedback" id="status-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="description" class="form-label eForm-label">{{ get_phrase('Description') }}</label>
                        <textarea class="form-control eForm-control content" id="description" name="description" rows="5">{{ old('description', $marketplace_details->description) }}</textarea>
                        <div class="invalid-feedback" id="description-error"></div>
                    </div>
        
                    <div class="mb-3">
                        <label for="multiple_files" class="form-label eForm-label">{{ get_phrase('Images (JPEG, PNG, GIF)') }}</label>
                        <input type="file" class="form-control eForm-control-file" id="multiple_files" name="multiple_files[]" multiple accept="image/jpeg,image/png,image/gif">
                        <div class="invalid-feedback" id="multiple_files-error"></div>
                        @if($marketplace_details->image)
                            <p class="mt-2 small">{{ get_phrase('Image principale actuelle') }}: <a href="{{ asset('storage/marketplace/thumbnail/' . $marketplace_details->image) }}" target="_blank">{{ get_phrase('Voir l\'image') }}</a></p>
                        @endif
                        @if($marketplace_details->mediaFiles?->count() > 0)
                            <p class="mt-2 small">{{ get_phrase('Images supplémentaires') }}:</p>
                            <ul>
                                @foreach($marketplace_details->mediaFiles as $media)
                                    <li>
                                        <a href="{{ asset('storage/marketplace/thumbnail/' . $media->file_name) }}" target="_blank">{{ $media->file_name }}</a>
                                        <button type="button" class="btn btn-sm btn-danger delete-media" data-id="{{ $media->id }}">{{ get_phrase('Supprimer') }}</button>
                                    </li>
                                @endforeach
                            </ul>
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