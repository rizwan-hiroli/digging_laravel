@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' =>'https://www.google.com/'])
            HR & SS
        @endcomponent
    @endslot

# Dear, {{$content['name']}}
Hello from HR , <br>
Congratulations!You've succesfully signed up for HR! <br>
We're delighted to welcome you to HR.

@component('mail::button', ['url' => 'https://laravelcode.com/post/how-to-send-email-in-laravel-using-markdown'])
Click Here
@endcomponent

If you did not request a signup , no further action is required.
@component('mail::table')
| Name      | Email         | Code  |
| ------------- |:-------------:| --------:|
| Rizwan      | Hiroli      | $10      |
| JJ     | Brand| $20      |
@endcomponent


Thanks,
{{ config('app.name') }}


{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} . HR Inc!
        @endcomponent
    @endslot
@endcomponent
