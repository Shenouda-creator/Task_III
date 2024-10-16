@include('site.layOut.header')
@include('site.layOut.body')

    <main>
        <h1 class="text-center my-3">@yield('content')</h1>
    </main>

@include('site.layOut.footer');

