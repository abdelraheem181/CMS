@extends('admin.theme.default')

@section('title')
    الاحصائيات
@endsection

@section('content')
<div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              عدد المنشورات</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $post_nu }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-book-open fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                             عدد المستخدمين</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user_nu }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                             عدد التعليقات</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $comment_nu }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-comment fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                             عدد التصنيفات</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category_nu }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-table fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection