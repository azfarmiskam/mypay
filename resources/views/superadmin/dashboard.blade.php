@extends('layouts.admin')

@section('title', 'Super Admin Dashboard')
@section('page-title', 'Super Admin Dashboard')
@section('page-description', 'Welcome back, ' . auth()->user()->name)

@section('content')
<!-- Dashboard Content -->
<div x-show="activeSection === 'dashboard'" x-cloak>
    @include('superadmin.sections.dashboard-content')
</div>

<!-- Admin Management Content -->
<div x-show="activeSection === 'admins'" x-cloak>
    @include('superadmin.sections.admin-management')
</div>

<!-- System Settings Content -->
<div x-show="activeSection === 'settings'" x-cloak>
    @include('superadmin.sections.system-settings')
</div>

<!-- Sellers Content -->
<div x-show="activeSection === 'sellers'" x-cloak>
    @include('superadmin.sections.sellers')
</div>

<!-- Plans Content -->
<div x-show="activeSection === 'plans'" x-cloak>
    @include('superadmin.sections.plans')
</div>

<!-- Analytics Content -->
<div x-show="activeSection === 'analytics'" x-cloak>
    @include('superadmin.sections.analytics')
</div>

<!-- Modals -->
@include('superadmin.admins.partials.add-modal')
@include('superadmin.admins.partials.edit-modal')
@include('superadmin.admins.partials.delete-modal')
@endsection
