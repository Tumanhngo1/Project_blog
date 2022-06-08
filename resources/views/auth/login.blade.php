<!DOCTYPE html>
<html lang="en">

<head>
    @include('users.layouts.header')
</head>

<body>

    <section class="px-6 py-8">
        <main class="col-md-4 " style="margin: 20px auto;">
            <h1 class="text-center font-bold">LOGIN</h1>
            <form action="/login" method="POST">
                @csrf

                <div class="form-group mt-3">
                    <label for="email">email</label>
                    <input type="text" value="{{ old('email') }}" class="form-control" style="background:bisque"
                        id="email" name="email" required>
                    @error('email')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-gruop mt-3">
                    <label for="password">password</label>
                    <input type="password" class="form-control" style="background:bisque" id="password" name="password"
                        required>
                    @error('password')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-success" type="submit">login</button>
                </div>
                <a style="text-decoration: none" href="{{ route('forget.password.get') }}">Quen mat khau</a>
            </form>

        </main>

    </section>


</body>

</html>
