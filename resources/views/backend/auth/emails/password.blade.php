Click here to reset your password: <a href="{{ $link = route('backend.password.reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
