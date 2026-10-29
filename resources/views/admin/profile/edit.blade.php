@extends('admin.layouts.app')

@section('title', 'Admin Profile Settings - Heal Go Fly Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <div class="flex items-center gap-2 mb-1 text-xs font-bold text-slate-500">
                <a href="{{ route('admin.dashboard') }}" class="text-[#27797D] hover:underline">&larr; Dashboard</a>
                <span>&bull;</span>
                <span class="text-slate-400">Account Management</span>
            </div>
            <h1 class="text-2xl font-black text-[#112347] tracking-tight">Admin Profile & Security</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage your personal administrator credentials, contact information, avatar, and password.</p>
        </div>
    </div>

    <!-- Profile Overview Card -->
    <div class="bg-gradient-to-r from-[#112347] via-[#1D4B6C] to-[#27797D] p-6 sm:p-8 rounded-3xl text-white shadow-md relative overflow-hidden">
        <div class="absolute -right-8 -bottom-8 w-48 h-48 rounded-full bg-white/5 pointer-events-none"></div>
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-5 relative z-10">
            <!-- Avatar Display -->
            <div class="w-20 h-20 rounded-2xl bg-white/10 border-2 border-white/20 p-1 shrink-0 overflow-hidden shadow-inner flex items-center justify-center">
                @if ($admin->avatar)
                    <img src="{{ asset($admin->avatar) }}" alt="{{ $admin->name }}" class="w-full h-full object-cover rounded-xl">
                @else
                    <span class="text-3xl font-black text-[#EF7415] uppercase">
                        {{ strtoupper(substr($admin->name ?? 'A', 0, 1)) }}
                    </span>
                @endif
            </div>

            <div class="text-center sm:text-left space-y-1">
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2">
                    <h2 class="text-xl font-black tracking-tight text-white">{{ $admin->name }}</h2>
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-[#EF7415] text-white">
                        Super Administrator
                    </span>
                </div>
                <p class="text-xs text-teal-100/90 font-mono">{{ $admin->email }}</p>
                @if ($admin->phone)
                    <p class="text-xs text-teal-200/80">📞 {{ $admin->phone }}</p>
                @endif
                <p class="text-[11px] text-teal-200/60 pt-1">
                    System Control Account &bull; Central Command Access
                </p>
            </div>
        </div>
    </div>

    <!-- 1. Edit Personal Information -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
        <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
            <div class="w-10 h-10 rounded-xl bg-teal-50 text-[#27797D] flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347]">
                    Personal Information & Avatar
                </h3>
                <p class="text-[11px] text-slate-400">Update your name, contact phone, login email, and profile avatar.</p>
            </div>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Name -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Administrator Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name', $admin->name) }}" 
                        required 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                    @error('name') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Login Email Address <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $admin->email) }}" 
                        required 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                    @error('email') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Contact Phone Number
                    </label>
                    <input 
                        type="text" 
                        name="phone" 
                        value="{{ old('phone', $admin->phone) }}" 
                        placeholder="e.g. +91 9129846542" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>

                <!-- Avatar Upload -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Upload Profile Photo / Avatar
                    </label>
                    <input 
                        type="file" 
                        name="avatar" 
                        accept="image/*"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-[#27797D] hover:file:bg-teal-100 cursor-pointer"
                    >
                    <p class="text-[11px] text-slate-400 mt-1">Recommended: Square image (JPG, PNG, WebP up to 4MB).</p>
                </div>
            </div>

            <div class="pt-4 flex justify-end">
                <button 
                    type="submit" 
                    class="bg-[#27797D] hover:bg-[#1f6366] text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#27797D]/20 transition-all cursor-pointer"
                >
                    Update Profile Details
                </button>
            </div>
        </form>
    </div>

    <!-- 2. Security & Password Update -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-5">
        <div class="flex items-center gap-3 border-b border-slate-100 pb-3">
            <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <div>
                <h3 class="text-sm font-black uppercase tracking-wider text-[#112347]">
                    Change Account Password
                </h3>
                <p class="text-[11px] text-slate-400">Ensure your administrative account is secured with a strong passphrase.</p>
            </div>
        </div>

        <form action="{{ route('admin.profile.password.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Current Password -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Current Password <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="password" 
                        name="current_password" 
                        required 
                        placeholder="••••••••" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                    @error('current_password') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- New Password -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        New Password <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        required 
                        placeholder="Min. 6 characters" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                    @error('password') <p class="text-[11px] text-rose-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Confirm New Password <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        placeholder="Repeat new password" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-semibold text-[#112347] focus:ring-2 focus:ring-[#27797D]/30 focus:border-[#27797D]"
                    >
                </div>
            </div>

            <div class="pt-4 flex justify-end">
                <button 
                    type="submit" 
                    class="bg-[#EF7415] hover:bg-[#d9640d] text-white text-xs font-bold px-6 py-2.5 rounded-xl shadow-md shadow-[#EF7415]/20 transition-all cursor-pointer"
                >
                    Update Password
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

