<x-layouts.shop title="帳戶資料查詢 / 修改">

<div class="container py-5" style="max-width:520px;">
    <h2 class="mb-4 text-center">👤 帳戶資料查詢 / 修改</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm p-4">

        <form method="POST" action="{{ route('change.update') }}">
            @csrf

            {{-- 姓名 --}}
            <div class="mb-3">
                <label class="form-label">帳戶名稱</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', auth()->user()->name) }}">
            </div>

            {{-- 信箱 --}}
            <div class="mb-3">
                <label class="form-label">信箱</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', auth()->user()->email) }}">
            </div>

            {{-- 新密碼 --}}
            <div class="mb-3">
                <label class="form-label">新密碼</label>

                <div class="input-group">
                    <input type="password"
                           name="password"
                           id="passwordInput"
                           class="form-control"
                           disabled>

                    <button type="button"
                            id="togglePassword"
                            class="btn btn-outline-secondary">
                        👁
                    </button>
                </div>
            </div>

            {{-- 確認新密碼 --}}
            <div class="mb-3">
                <label class="form-label">確認新密碼</label>
                <input type="password"
                       name="password_confirmation"
                       id="passwordConfirm"
                       class="form-control"
                       disabled>
            </div>

            <button type="submit"
                    id="submitBtn"
                    class="btn btn-success w-100">
                修改資料
            </button>
        </form>

        <a href="{{ route('shop.index') }}"
           class="btn btn-secondary w-100 mt-3">
            回首頁
        </a>
    </div>
</div>

<script>
    const toggleBtn = document.getElementById('togglePassword');
    const passInput = document.getElementById('passwordInput');
    const passConfirm = document.getElementById('passwordConfirm');

    let enabled = false;

    toggleBtn.addEventListener('click', () => {
        enabled = !enabled;

        passInput.disabled = !enabled;
        passConfirm.disabled = !enabled;

        passInput.type = enabled ? 'text' : 'password';
        passConfirm.type = enabled ? 'text' : 'password';

        toggleBtn.innerText = enabled ? '🙈' : '👁';
    });
</script>

</x-layouts.shop>
