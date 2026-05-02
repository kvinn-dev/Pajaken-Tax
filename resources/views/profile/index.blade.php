<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profil - {{ config('app.name', 'Pajaken') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Profile Header Banner -->
    <div class="profile-header">
        <div class="profile-header-content">
            <a href="{{ url()->previous() != url()->current() ? url()->previous() : route('dashboard') }}" class="back-btn">
                <img width="22" height="22" src="https://img.icons8.com/ios-filled/50/ffffff/back.png" alt="back" />
                Kembali
            </a>

            <div class="nav-right-icons">

            </div>
        </div>
        <div class="avatar">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=4f46e5&color=ffffff&size=200" alt="profile" />
        </div>
    </div>

    <!-- Profile Info -->
    <div class="profile-info">
        <h1>{{ Auth::user()->name }}</h1>
        @if(Auth::user()->city && Auth::user()->province)
        <p>{{ Auth::user()->city }}, {{ Auth::user()->province }}</p>
        @else
        <p>Belum ada data alamat</p>
        @endif
        <div class="profile-actions">
            <button class="btn-primary-profile">Edit Profil</button>
            <a href="{{ route('profile.index') }}" class="btn-outline">Pengaturan</a>
        </div>
    </div>

    <!-- Forms -->
    <div class="profile-form-container">
        <!-- Informasi Profil -->
        <div class="profile-card">
            <div class="card-header">
                <h3>Informasi Profil</h3>
                <button class="edit-btn" onclick="toggleEdit(this, 'profileInfoGrid')">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Edit
                </button>
            </div>
            <form method="post" action="{{ route('profile.update') }}" id="profileInfoGrid">
                @csrf
                @method('patch')
                @php
                $nameParts = explode(' ', Auth::user()->name, 2);
                $firstName = $nameParts[0] ?? '';
                $lastName = $nameParts[1] ?? '';
                @endphp
                <div class="form-grid">
                    <div class="form-field">
                        <label>Nama Depan</label>
                        <input type="text" name="first_name" value="{{ $firstName }}" disabled />
                    </div>
                    <div class="form-field">
                        <label>Nama Belakang</label>
                        <input type="text" name="last_name" value="{{ $lastName }}" disabled />
                    </div>
                    <div class="form-field">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" disabled />
                    </div>
                    <div class="form-field">
                        <label>No. Handphone</label>
                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" disabled />
                    </div>
                </div>
                @if (session('status') === 'profile-updated')
                <p class="success-message">Profil berhasil diperbarui!</p>
                @endif
                <div class="form-actions hidden" id="profileInfoGridActions">
                    <button type="submit" class="btn-save-profile">Simpan</button>
                    <button type="button" class="btn-cancel" onclick="cancelEdit('profileInfoGrid', 'profileInfoGridActions')">Batalkan</button>
                </div>
            </form>
        </div>

        <!-- Password -->
        <div class="profile-card">
            <div class="card-header">
                <h3>Update Password</h3>
                <button type="button" class="edit-btn" onclick="toggleEdit(this, 'passwordForm')" @if($errors->updatePassword->any()) style="background: #fee2e2; color: #ef4444;" @endif>
                    @if($errors->updatePassword->any())
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Batal
                    @else
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Edit
                    @endif
                </button>
            </div>
            <form method="post" action="{{ route('password.update') }}" id="passwordForm">
                @csrf
                @method('put')
                <div class="form-grid">
                    <div class="form-field full-width">
                        <label>Password Saat Ini</label>
                        <input type="password" name="current_password" {{ $errors->updatePassword->any() ? '' : 'disabled' }} />
                        @error('current_password', 'updatePassword')
                        <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-field full-width">
                        <label>Password Baru</label>
                        <input type="password" name="password" {{ $errors->updatePassword->any() ? '' : 'disabled' }} />
                        @error('password', 'updatePassword')
                        <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-field full-width">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" {{ $errors->updatePassword->any() ? '' : 'disabled' }} />
                        @error('password_confirmation', 'updatePassword')
                        <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                @if (session('status') === 'password-updated')
                <p class="success-message">Password berhasil diperbarui!</p>
                @endif

                <div class="form-actions {{ $errors->updatePassword->any() ? '' : 'hidden' }}" id="passwordFormActions">
                    <button type="submit" class="btn-save-profile">Simpan</button>
                    <button type="button" class="btn-cancel" onclick="cancelEdit('passwordForm', 'passwordFormActions')">Batalkan</button>
                </div>
            </form>
        </div>

        <!-- Alamat -->
        <div class="profile-card">
            <div class="card-header">
                <h3>Alamat</h3>
                <button class="edit-btn" onclick="toggleEdit(this, 'addressGrid')">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Edit
                </button>
            </div>
            <form method="post" action="{{ route('profile.update') }}" id="addressGrid">
                @csrf
                @method('patch')
                <div class="form-grid">
                    <div class="form-field">
                        <label>Provinsi</label>
                        <input type="text" name="province" value="{{ Auth::user()->province }}" disabled />
                    </div>
                    <div class="form-field">
                        <label>Kab/Kota</label>
                        <input type="text" name="city" value="{{ Auth::user()->city }}" disabled />
                    </div>
                    <div class="form-field">
                        <label>Kecamatan</label>
                        <input type="text" name="district" value="{{ Auth::user()->district }}" disabled />
                    </div>
                    <div class="form-field">
                        <label>Kelurahan</label>
                        <input type="text" name="village" value="{{ Auth::user()->village }}" disabled />
                    </div>
                    <div class="form-field full-width">
                        <label>Detail Alamat</label>
                        <textarea name="address_detail" disabled>{{ Auth::user()->address_detail }}</textarea>
                    </div>
                </div>
                @if (session('status') === 'profile-updated')
                <p class="success-message">Alamat berhasil diperbarui!</p>
                @endif
                <div class="form-actions hidden" id="addressGridActions">
                    <button type="submit" class="btn-save-profile">Simpan</button>
                    <button type="button" class="btn-cancel" onclick="cancelEdit('addressGrid', 'addressGridActions')">Batalkan</button>
                </div>
            </form>
        </div>

        <!-- Hapus Akun -->
        <div class="profile-card" style="border: 1px solid #fecaca;">
            <div class="card-header">
                <h3 style="color: #dc2626;">Zona Berbahaya</h3>
            </div>
            <p style="font-size: 14px; color: #6b7280; margin-bottom: 20px;">
                Zona ini berisi tindakan yang dapat membahayakan akun Anda. Harap berhati-hati saat menggunakan fitur di bawah ini.
            </p>
            <div style="display: flex; gap: 12px; align-items: center;">
                <button onclick="openDeleteModal()" class="btn-danger">Hapus Akun</button>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="modal-overlay {{ $errors->userDeletion->any() ? '' : 'hidden' }}">
        <div class="modal-box">
            <h2>Yakin hapus akun?</h2>
            <p>Semua data akan dihapus permanen. Masukkan password untuk konfirmasi.</p>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <input type="password" name="password" placeholder="Masukkan password untuk konfirmasi" required />
                @error('password', 'userDeletion')
                <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                @enderror
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
                    <button type="submit" class="btn-danger">Hapus Akun</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleEdit(btn, formId) {
            const form = document.getElementById(formId);
            const inputs = form.querySelectorAll('input:not([type="hidden"]), select, textarea');
            const actionsId = formId + 'Actions';
            const actions = document.getElementById(actionsId);
            const isEditing = !inputs[0].disabled;

            inputs.forEach(input => input.disabled = isEditing);
            if (actions) actions.classList.toggle('hidden', isEditing);

            if (isEditing) {
                btn.innerHTML = `<svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit`;
                btn.style.background = '#f3f4f6';
                btn.style.color = '#4f46e5';
            } else {
                btn.innerHTML = `<svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg> Batal`;
                btn.style.background = '#fee2e2';
                btn.style.color = '#ef4444';
                inputs[0].focus();
            }
        }

        function cancelEdit(formId, actionsId) {
            const form = document.getElementById(formId);
            const inputs = form.querySelectorAll('input:not([type="hidden"]), select, textarea');
            const actions = document.getElementById(actionsId);
            const card = form.closest('.profile-card');
            const editBtn = card ? card.querySelector('.edit-btn') : null;

            inputs.forEach(input => input.disabled = true);
            if (actions) actions.classList.add('hidden');
            if (editBtn) {
                editBtn.innerHTML = `<svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit`;
                editBtn.style.background = '#f3f4f6';
                editBtn.style.color = '#4f46e5';
            }
        }

        function toggleNotificationDropdown() {
            const dropdown = document.getElementById('notificationDropdown');
            const overlay = document.getElementById('dropdownOverlay');
            dropdown.classList.toggle('hidden');
            overlay.classList.toggle('hidden');
        }

        function closeNotificationDropdown() {
            document.getElementById('notificationDropdown').classList.add('hidden');
            document.getElementById('dropdownOverlay').classList.add('hidden');
        }

        function openDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</body>

</html>