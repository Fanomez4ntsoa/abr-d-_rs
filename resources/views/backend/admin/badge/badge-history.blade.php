<style>
  /* Styles généraux pour une apparence professionnelle */
  .main_content {
      background-color: #f5f6fa;
      padding: 20px;
  }
  .mainSection-title h4 {
      font-size: 1.5rem;
      font-weight: 600;
      color: #333;
      margin-bottom: 15px;
  }
  .eSection-wrap-2 {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      padding: 20px;
      margin-bottom: 20px;
  }
  .column-title {
      font-size: 1.1rem;
      font-weight: 600;
      color: #555;
      margin-bottom: 15px;
  }

  /* Styles pour les formulaires de prix */
  .price-card {
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 20px;
      background-color: #fff;
      transition: border-color 0.3s ease;
  }
  .price-card.simple-border {
      border-left: 4px solid #007bff;
  }
  .price-card.pro-border {
      border-left: 4px solid #d4af37;
  }
  .price-card label.eForm-label {
      font-size: 0.95rem;
      font-weight: 500;
      color: #444;
      margin-bottom: 8px;
  }
  .price-card .form-control {
      border-radius: 5px;
      border: 1px solid #ced4da;
      padding: 8px 12px;
      font-size: 0.9rem;
      transition: border-color 0.3s ease;
  }
  .price-card .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
  }
  .price-card .btn-form {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 8px 20px;
      border-radius: 5px;
      font-weight: 500;
      transition: background-color 0.3s ease;
  }
  .price-card .btn-form:hover {
      background-color: #0056b3;
  }

  /* Styles pour le tableau */
  .table.eTable {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.9rem;
  }
  .table.eTable thead {
      background-color: #f8f9fa;
      color: #333;
      font-weight: 600;
  }
  .table.eTable thead th {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
  }
  .table.eTable tbody tr {
      border-bottom: 1px solid #e0e0e0;
      transition: background-color 0.3s ease;
  }
  .table.eTable tbody tr:hover {
      background-color: #f9f9f9;
  }
  .table.eTable tbody td {
      padding: 12px 15px;
      color: #555;
  }
  .table.eTable .dAdmin_info_name a {
      color: #007bff;
      text-decoration: none;
      font-weight: 500;
  }
  .table.eTable .dAdmin_info_name a:hover {
      text-decoration: underline;
  }
  .table.eTable .acbtn {
      height: 27px;
      padding: 0 10px;
      font-size: 0.85rem;
      border-radius: 4px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
  }
  .btn-primary.acbtn {
      background-color: #28a745 !important;
      border: none;
  }
  .btn-danger.acbtn {
      background-color: #dc3545 !important;
      border: none;
  }

  /* Styles pour les actions */
  .adminTable-action .eBtn-black {
      background-color: #333;
      color: #fff;
      border: none;
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 0.85rem;
      transition: background-color 0.3s ease;
  }
  .adminTable-action .eBtn-black:hover {
      background-color: #555;
  }
  .adminTable-action .dropdown-menu {
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }
  .adminTable-action .dropdown-item {
      font-size: 0.9rem;
      padding: 8px 15px;
      color: #333;
  }
  .adminTable-action .dropdown-item:hover {
      background-color: #f1f3f5;
  }
</style>

<div class="main_content">
  <!-- Main section header -->
  <div class="mainSection-title">
      <div class="row">
          <div class="col-12">
              <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                  <div class="d-flex flex-column">
                      <h4>{{ get_phrase('Badge Management') }}</h4>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Message de succès ou d'erreur -->
  @if (session('success'))
      <div class="alert alert-success" role="alert">
          {{ session('success') }}
      </div>
  @endif

  @if ($errors->any())
      <div class="alert alert-danger" role="alert">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  @if (session('error'))
      <div class="alert alert-danger" role="alert">
          {{ session('error') }}
      </div>
  @endif

  <!-- Section pour les prix des badges -->
  <div class="row">
      <div class="col-12">
          <div class="eSection-wrap-2">
              <div class="eMain">
                  <div class="row">
                      <!-- Prix pour Badge Simple -->
                      <div class="col-md-6 pb-3">
                          <div class="price-card simple-border">
                              <p class="column-title">{{ get_phrase('Badge Fondateur (particulier)') }}</p>
                              <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.badge.price.save') }}">
                                  @csrf
                                  <input type="hidden" name="type" value="simple">
                                  <div class="fpb-7">
                                      <label class="eForm-label">{{ get_phrase('Prix (par an)') }}</label>
                                      <input type="text" class="form-control eForm-control" name="badge_price" value="{{ $badge_price }}" required>
                                  </div>
                                  <div class="fpb-7 pt-2">
                                      <button type="submit" class="btn-form">{{ get_phrase('Sauveguarder') }}</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                      <!-- Prix pour Badge Pro -->
                      <div class="col-md-6 pb-3">
                          <div class="price-card pro-border">
                              <p class="column-title">{{ get_phrase('Badge Embassendeur') }}</p>
                              <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.badge.price.save') }}">
                                  @csrf
                                  <input type="hidden" name="type" value="pro">
                                  <div class="fpb-7">
                                      <label class="eForm-label">{{ get_phrase('Prix (par an)') }}</label>
                                      <input type="text" class="form-control eForm-control" name="badge_price" value="{{ $badge_price_pro }}" required>
                                  </div>
                                  <div class="fpb-7 pt-2">
                                      <button type="submit" class="btn-form">{{ get_phrase('Sauveguarder') }}</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Section pour l'historique des badges -->
  <div class="row">
      <div class="col-12">
          <div class="eSection-wrap-2">
              <div class="table-responsive">
                  <table class="table eTable" id="">
                      <thead>
                          <tr>
                              <th scope="col">{{ get_phrase('Sl No') }}</th>
                              <th scope="col">{{ get_phrase('Name') }}</th>
                              <th scope="col">{{ get_phrase('Badge Type') }}</th>
                              <th scope="col">{{ get_phrase('Start Date') }}</th>
                              <th scope="col">{{ get_phrase('End Date') }}</th>
                              <th scope="col">{{ get_phrase('Status') }}</th>
                              <th scope="col">{{ get_phrase('Action') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($badges as $key => $badge)
                              @php
                                  $user_info = App\Models\User::where('id', $badge->user_id)->first();
                              @endphp
                              <tr>
                                  <th scope="row">
                                      <p class="row-number">{{ ++$key }}</p>
                                  </th>
                                  <td>
                                      <div class="dAdmin_info_name min-w-100px">
                                          <a href="{{ route('user.profile.view', $badge->user_id) }}" class="text-dark" target="_blank">
                                              {{ $user_info->name }}
                                              @if ($user_info->user_role == 'admin')
                                                  {{ get_phrase('(Admin)') }}
                                              @endif
                                          </a>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="dAdmin_info_name min-w-100px">
                                          <p>{{ ucfirst($badge->type) }}</p>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="dAdmin_info_name min-w-100px">
                                          <p>{{ date('d M Y', strtotime($badge->start_date)) }}</p>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="dAdmin_info_name min-w-100px">
                                          <p>{{ date('d M Y', strtotime($badge->end_date)) }}</p>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="dAdmin_info_name min-w-100px">
                                          @php
                                              $currentDate = \Carbon\Carbon::now();
                                              $isActive = $currentDate >= $badge->start_date && $currentDate <= $badge->end_date;
                                          @endphp
                                          @if ($isActive)
                                              <p class="btn btn-primary acbtn">{{ get_phrase('Active') }}</p>
                                          @else
                                              <p class="btn btn-danger acbtn">{{ get_phrase('Expired') }}</p>
                                          @endif
                                      </div>
                                  </td>
                                  <td class="text-center">
                                      <div class="adminTable-action">
                                          <button type="button" class="eBtn eBtn-black dropdown-toggle table-action-btn-2" data-bs-toggle="dropdown" aria-expanded="false">
                                              {{ get_phrase('Actions') }}
                                          </button>
                                          <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                                              <li>
                                                  <a class="dropdown-item" target="_blank" href="{{ route('user.profile.view', $badge->user_id) }}">
                                                      {{ get_phrase('View on frontend') }}
                                                  </a>
                                              </li>
                                              <li>
                                                  <a class="dropdown-item" onclick="return confirm('{{ get_phrase('Are You Sure Want To Delete?') }}')" href="{{ route('admin.badge.delete', $badge->id) }}">
                                                      {{ get_phrase('Delete') }}
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>